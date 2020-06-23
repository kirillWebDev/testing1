<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class UpdateTagsSeeder extends Seeder
{
    /**
     * Delete tags that have the same case sensitive name,
     * rename all tags name to lowercase, reattach articles
     *
     * @return void
     */

    public function run()
    {
        $deleted = [];

        $tags = DB::select(
            DB::raw("
                SELECT tags.id AS id, 
                       t1.id AS copy_id,
                       tags.name AS name
                FROM tags
                LEFT JOIN tags AS t1 ON LOWER(TRIM(t1.name)) = LOWER(TRIM(tags.name))
                WHERE tags.id <> t1.id
            ")
        );

        foreach ($tags as $key => $tag) {
            dump($key);

            $name = mb_strtolower(trim($tag->name));

            $copies = Tag::where(DB::raw('LOWER(TRIM(name))'), '=', $name)
                ->where('id', '<>', $tag->id)
                ->pluck('id')
                ->toArray();

            if (empty($copies) || isset($deleted[$tag->id])) {
                continue;
            }
            else {
                $articles = DB::table('article_tag')
                    ->whereIn('tag_id', $copies)
                    ->orWhere ('tag_id', $tag->id)
                    ->pluck('article_id')
                    ->toArray();

                DB::table('article_tag')
                    ->whereIn('tag_id', $copies)
                    ->orWhere ('tag_id', $tag->id)
                    ->delete();

                $data = [];

                foreach ($articles as $article) {
                    $data[] = [
                        'article_id' => $article,
                        'tag_id' => $tag->id
                    ];
                }

                DB::table('article_tag')->insert(array_unique($data, SORT_REGULAR));

                DB::table('tags')->whereIn('id', $copies)->delete();

                foreach ($copies as $copy) {
                    $deleted[$copy] = true;
                }
            }
        }

        DB::statement("
            UPDATE tags 
            SET name = LOWER(TRIM(name))
        ");
    }
}

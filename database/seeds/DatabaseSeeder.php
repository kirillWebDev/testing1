<?php

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        factory(Category::class)->create(['name' => 'tttttt', 'slug' => 'tttttt', 'path' => 'ttttt']);
//
//        factory(Tag::class, 10)->create();
//
//        $tag_ids = Tag::all();
//
//        factory(User::class, 10)->create()->each(function (User $user) use ($tag_ids) {
//            factory(Article::class, mt_rand(0, 10))->make(
//                ['category_id' => mt_rand(1, 7)]
//            )->each(function ($article) use ($user, $tag_ids) {
//                /** @var Article $article */
//                $article = $user->articles()->save($article);
//                $count = mt_rand(1, 4);
//
//                $ids = [];
//                for ($i = 0; $i < $count; $i++) {
//                    array_push($ids, $tag_ids[mt_rand(1, 9)]->id);
//                }
//
//                $article->tags()->sync($ids);
//            });
//        });
    }
}

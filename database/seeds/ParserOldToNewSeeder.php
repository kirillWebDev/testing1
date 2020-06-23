<?php

use Illuminate\Database\Seeder;
use App\Http\Repositories\ParserRepository;
use App\Models\User;

/**
 * Class ParserOldToNewSeeder
 *
 * Is for manual run. Migrate Old Parser data from old parser db structure to new one. Once.
 */
class ParserOldToNewSeeder extends Seeder
{

    private $parser;
    private $repository;

    public function __construct(ParserRepository $repository)
    {
        $this->repository = $repository;
        $this->parser = $this->repository->model();
    }

    /**
     * Run the database seeds.
     *
     * @param $runManually boolean
     * @return void
     */
    public function run($runManually = 0)
    {
        echo "ParserOldToNewSeeder - is for manual run, see inside";
        $runManually = $this->command->ask("Enter 0 , for other option see inside", 0);

        if(!$runManually) {
            return false;
        }

        // Parser
        $parser = null;

        // Get parser User
        $user = User::all()->first();// Admin

        // Get Old Parsers
        $oldParsers = $this->getOldParsers();

        // Seed from Old DB structure to New
        foreach($oldParsers as $parserName => $oldSettings){

            // Add parser
            $parser = $this->parser->create([
                'name' => $parserName,
                'url' => $parserName,
                'parse_url' => $parserName,
                'status' => 0,
                'user_id' => isset($user->id) ? $user->id : 1,
                'category_id' => 1,
                'start_at' => date("Y-m-d", time()),
                'finish_at' => date("Y-m-d", time()),
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time()),
            ]);

            // Add parser-settings
            foreach($oldSettings as $oldParser){

                $parser->update(['parse_url' => $oldParser->parse_url]);

                $parser->settings()->create([
                    'parser_id' => $parser->id,
                    'is_publish' => false,
                    'is_translate' => false,
                    'is_has_image' => false,
                    'is_delete_links' => ($oldParser->remove_links) ? true : false,
                    'min_chars' => $oldParser->min_chars,
                    'rule_article_links' => $oldParser->links_rule,
                    'rule_keywords' => $oldParser->keywords_rule,
                    'rule_description' => $oldParser->description_rule,
                    'rule_purge_tags' => $oldParser->remove_links,
                    'rule_image' => $oldParser->image_rule,
                    'rule_title' => $oldParser->title_rule,
                    'rule_content' => $oldParser->text_rule,
                ]);
            }

        }

    }

    /**
     * @return array
     */
    public function getOldParsers()
    {
        // Mysql connection using old DB
        $parsers = DB::connection('mysql')->select("SELECT * FROM slc_parser2");

        if(!$parsers) exit;

        $arrParsers = [];
        foreach($parsers as $parser){
            $arrParsers[$parser->url][] = $parser;
        }

        return $arrParsers;
    }
}

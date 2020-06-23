<?php
/**
 * Created by PhpStorm.
 * User: vasylisk
 * Date: 2018/11/29
 * Time: 10:52
 */

namespace App\Services;


use App\Http\Repositories\ArticleRepository;
use App\Models\Article;
use Modules\Article\ArticleHelper;

/**
 * Class ArticleService
 * @package App\Services
 */
class ArticleService
{
    protected $articleRepository;
    use ArticleHelper;

    /**
     * ArticleService constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param null $page_size
     * @return mixed
     */
    public function getArticles($page_size = null)
    {
        if ($page_size == null)
            $page_size = get_config('page_size', 7);
        return $this->articleRepository->pagedArticles($page_size);
    }

    /**
     * @return mixed
     */
    public function getAllArticles()
    {
        return $this->articleRepository->achieve();
    }

    /**
     * @param Article $article
     * @param int $limit
     * @return mixed
     */
    public function getRecommendedArticles(Article $article, $limit = 5)
    {
        return $this->articleRepository->recommendedArticles($article, $limit);
    }

    /**
     * @param $slug
     * @return Article
     */
    public function getArticle($slug)
    {
        $article = $this->articleRepository->get($slug);
        $this->onArticleShowing($article);
        return $article;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return Article::count();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getArticleById($id)
    {
        return $this->articleRepository->find($id);
    }
}
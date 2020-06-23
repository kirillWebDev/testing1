<?php
/**
 * Created by PhpStorm.
 * User: vasylisk
 * Date: 2018/3/18
 * Time: 11:13
 */

namespace App\Services;


use App\Comment;
use App\Http\Repositories\CommentRepository;

/**
 * Class CommentService
 * @package App\Services
 */
class CommentService
{
    protected $commentRepository;

    /**
     * CommentService constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param $commentable_type
     * @param $commentable_id
     * @return mixed
     */
    public function getComments($commentable_type, $commentable_id)
    {
        return $this->commentRepository->getByCommentable($commentable_type, $commentable_id);
    }

    /**
     * @param $comment_id
     * @param bool $force
     * @return bool|null
     * @throws \Exception
     */
    public function delete($comment_id, $force = false)
    {
        if ($force) {
            $comment = Comment::withTrashed()->findOrFail($comment_id);
        } else {
            $comment = Comment::findOrFail($comment_id);
        }
        return $this->commentRepository->delete($comment, $force);
    }
}
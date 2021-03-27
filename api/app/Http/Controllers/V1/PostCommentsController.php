<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
// use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
use App\Criteria\PostCommentsCriteria;

/**
 * Users Controller
 */
class PostCommentsController extends Controller
{
    protected $repository;

    public function __construct(CommentRepository $repository) {
        $this->repository = $repository;
    }

    public function find($postId, $commentId) {
        $parser = $this->resultParser();

        try {
            $comment = $this->repository->firstOrFail([
                'postId' => $postId,
                'id' => $commentId
            ]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find post comment successfully.',
                'data' => $comment,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Comment not found.',
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 402,
                'message' => 'Unable to process at the moment.',
            ], 402);
        }
    }

    public function list($postId) {
        $parser = $this->resultParser();

        $this->repository->pushCriteria(new PostCommentsCriteria($postId));
        $comments = $this->repository->{$parser}();

        $meta = $comments['meta'] ?? [];
        unset($comments['meta']);

        return response([
            'status_code' => 200,
            'message' => 'Comments lists.',
            'data' => $comments,
            'meta' => $meta,
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;

/**
 * Comments Controller
 */
class CommentsController extends Controller
{
    protected $repository;

    public function __construct(CommentRepository $repository) {
        $this->repository = $repository;
    }

    public function find($commentId) {
        $parser = $this->resultParser();

        try {
            $comments = $this->repository->find($commentId);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find Comment successfully.',
                'data' => $comments,
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

    public function list() {
        $parser = $this->resultParser();

        $comments = $this->repository->{$parser}();

        $meta = $comments['meta'] ?? [];
        unset($comments['meta']);

        return response()->json([
            'status_code' => 200,
            'data' => $comments,
            'meta' => $meta,
        ], 200);
    }
}
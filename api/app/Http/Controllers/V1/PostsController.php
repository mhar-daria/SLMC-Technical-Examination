<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

/**
 * Users Controller
 */
class PostsController extends Controller
{
    protected $repository;

    public function __construct(PostRepository $repository) {
        $this->repository = $repository;
    }

    public function find($postId) {
        $parser = $this->resultParser();

        try {
            $posts = $this->repository->find($postId);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find Post successfully.',
                'data' => $posts,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Post not found.',
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

        $posts = $this->repository->{$parser}();

        return response()->json([
            'status_code' => 200,
            'data' => $posts,
        ], 200);
    }
}
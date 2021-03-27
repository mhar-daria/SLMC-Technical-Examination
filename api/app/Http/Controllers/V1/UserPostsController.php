<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use App\Criteria\UserPostCriteria;

/**
 * Users Controller
 */
class UserPostsController extends Controller
{
    protected $repository;

    public function __construct(PostRepository $repository) {
        $this->repository = $repository;
    }

    public function list($userId) {
        $parser = $this->resultParser();

        $this->repository->pushCriteria(new UserPostCriteria($userId));

        $posts = $this->repository->{$parser}();

        return response()->json([
            'status_code' => 200,
            'data' => $posts,
        ], 200);
    }

    public function find($userId, $postId) {
        $parser = $this->resultParser();

        try {
            $users = $this->repository->firstOrFail(['userId' => $userId, 'id' => $postId]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find posts successfully.',
                'data' => $users,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Posts not found.',
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 402,
                'message' => 'Unable to process at the moment.',
            ], 402);
        }
    }
}
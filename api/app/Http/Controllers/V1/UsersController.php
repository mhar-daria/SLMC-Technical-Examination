<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

use App\Models\User;

/**
 * Users Controller
 */
class UsersController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function find($userId) {
        $parser = $this->resultParser();

        try {
            $users = $this->repository->find($userId);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find User successfully.',
                'data' => $users,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'User not found.',
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

        $users = $this->repository->skipPresenter(false)->{$parser}();

        return response()->json([
            'status_code' => 200,
            'data' => $users,
        ], 200);
    }
}
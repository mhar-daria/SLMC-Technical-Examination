<?php

namespace App\Http\Controllers\V1;

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

    public function list() {
        // echo phpinfo();
        // return;
        $parser = $this->resultParser();

        $users = $this->repository->{$parser}();

        return response()->json([
            'status_code' => 200,
            'data' => $users,
        ], 200);
    }
}
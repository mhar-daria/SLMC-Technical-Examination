<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Helpers\HttpResponse;

use App\Http\Requests\RegisterUserFormRequest;

class AuthController extends Controller {
    /**
     * @var object
     */
    protected $repository;

    /**
     * @constructor
     *
     * @param \App\Repositories\UserRepository $repository
     */
    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * User registration
     *
     * @param \App\Http\Requests\RegisterUserFormRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserFormRequest $request) {
        try {
            
        } catch (Exception $e) {
            return response()->json([

            ], HttpResponse::SUCCESS_CODE);
        }
    }
}
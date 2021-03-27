<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\AddressRepository;

/**
 * Users Controller
 */
class AddressesController extends Controller
{
    protected $repository;

    public function __construct(AddressRepository $repository) {
        $this->repository = $repository;
    }

    public function find($userId) {
        $parser = $this->resultParser();

        try {
            $users = $this->repository->firstOrFail(['userId' => $userId]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find Address successfully.',
                'data' => $users,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Address not found.',
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 402,
                'message' => 'Unable to process at the moment.',
            ], 402);
        }
    }
}
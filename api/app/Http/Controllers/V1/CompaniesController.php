<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;

/**
 * Users Controller
 */
class CompaniesController extends Controller
{
    protected $repository;

    public function __construct(CompanyRepository $repository) {
        $this->repository = $repository;
    }

    public function find($userId) {
        $parser = $this->resultParser();

        try {
            $company = $this->repository->firstOrFail(['userId' => $userId]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find Company successfully.',
                'data' => $company,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Company not found.',
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 402,
                'message' => 'Unable to process at the moment.',
            ], 402);
        }
    }
}
<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\TodoRepository;

/**
 * Users Controller
 */
class TodosController extends Controller
{
    protected $repository;

    public function __construct(TodoRepository $repository) {
        $this->repository = $repository;
    }

    public function find($todoId) {
        try {
            $todo = $this->repository->find($todoId);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find Todos successfully.',
                'data' => $todo,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Todo not found.',
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

        $todos = $this->repository->skipPresenter(false)->{$parser}();

        return response()->json([
            'status_code' => 200,
            'data' => $todos,
        ], 200);
    }
}
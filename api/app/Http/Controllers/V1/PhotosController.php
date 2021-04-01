<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\PhotoRepository;

/**
 * Comments Controller
 */
class PhotosController extends Controller
{
    protected $repository;

    public function __construct(PhotoRepository $repository) {
        $this->repository = $repository;
    }

    public function find($photoId) {
        $parser = $this->resultParser();

        try {
            $photos = $this->repository->find($photoId);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find Photo successfully.',
                'data' => $photos,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Photo not found.',
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

        $photos = $this->repository->{$parser}();

        $meta = $photos['meta'] ?? [];
        unset($photos['meta']);

        return response()->json([
            'status_code' => 200,
            'data' => $photos,
            'meta' => $meta,
        ], 200);
    }
}
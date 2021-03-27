<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response;

use App\Repositories\AlbumRepository;

/**
 * Users Controller
 */
class AlbumsController extends Controller
{
    protected $repository;

    public function __construct(AlbumRepository $repository) {
        $this->repository = $repository;
    }

    public function find($albumId) {
        $parser = $this->resultParser();

        try {
            $album = $this->repository->firstOrFail([
                'id' => $albumId,
            ]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find album successfully.',
                'data' => $album,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Album not found.',
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

        $albums = $this->repository->{$parser}();

        $meta = $albums['meta'] ?? [];
        unset($albums['meta']);

        return Response([
            'status_code' => 200,
            'message' => 'Albums lists.',
            'data' => $albums,
            'meta' => $meta,
        ], 200);

        return response()->json([
            'status_code' => 200,
            'message' => 'Albums lists.',
            'data' => $albums,
        ], 200);
    }
}

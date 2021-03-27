<?php

namespace App\Http\Controllers\V1;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\AlbumRepository;
use App\Criteria\UserAlbumCriteria;

/**
 * Users Controller
 */
class UserAlbumsController extends Controller
{
    protected $repository;

    public function __construct(AlbumRepository $repository) {
        $this->repository = $repository;
    }

    public function list($userId) {
        $parser = $this->resultParser();

        $this->repository->pushCriteria(new UserAlbumCriteria($userId));

        $albums = $this->repository->{$parser}();

        $meta = $albums['meta'];
        unset($albums['meta']);

        return response()->json([
            'status_code' => 200,
            'data' => $albums,
            'meta' => $meta,
        ], 200);
    }

    public function find($userId, $albumId) {
        $parser = $this->resultParser();

        try {
            $album = $this->repository->firstOrFail([
                'userId' => $userId,
                'id' => $albumId
            ]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Find albums successfully.',
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
}
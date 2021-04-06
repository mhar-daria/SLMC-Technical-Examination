<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['address', 'company'];
    protected $availableIncludes = ['albums', 'posts', 'account'];

    /**
     * Transform the User entity.
     *
     * @param \App\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'username' => $model->username,
            'email' => $model->email,
            'phone' => $model->phone,
            'website' => $model->website,
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->updated_at)),
        ];
    }

    public function includeAddress(User $model) {
        // dd($model->address);
        if ($model->address) {
            return $this->item($model->address, new AddressTransformer());
        }
        return $this->null();
    }

    public function includeCompany(User $model) {
        if ($model->company) {
            return $this->item($model->company, new CompanyTransformer());
        }
        return $this->null();
    }

    public function includePosts(User $model) {
        if ($model->posts) {
            return $this->collection($model->posts, new PostTransformer());
        }
        return [];
    }

    public function includeAlbums(User $model) {
        if ($model->albums) {
            return $this->collection($model->albums, new AlbumTransformer());
        }
        return [];
    }

    public function includeAccount(User $model) {
        if ($model->account) {
            return $this->item($model->account, new AccountTransformer());
        }

        return $this->null();
    }
}

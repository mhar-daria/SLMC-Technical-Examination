<?php

namespace App\Traits;

trait FirstOrFailTrait {

    /**
     * find first data or return error
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     */
    public function firstOrFail($where, $columns = ['*']) {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->where($where)->firstOrFail();
        $this->resetModel();

        return $this->parserResult($model);
    }
}

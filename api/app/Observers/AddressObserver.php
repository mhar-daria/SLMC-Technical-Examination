<?php

namespace App\Observers;

use App\Models\Address;

class AddressObserver
{

    /**
     * Handle the address "creating" event.
     *
     * @param \App\Models\Address $model
     *
     * @return void
     */
    public function creating(Address $model) {
        if (isset($model->geo) && is_array($model->geo)) {
            $model->geo = json_encode($model->geo);
        }
    }

    /**
     * Handle the address "saving" event.
     *
     * @param \App\Models\Address $model
     *
     * @return void
     */
    public function saving(Address $model) {
        if (isset($model->geo) && is_array($model->geo)) {
            $model->geo = json_encode($model->geo);
        }
    }



}

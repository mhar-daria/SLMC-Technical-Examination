<?php

namespace App\Transformers;

use League\Fractal\Serializer\ArraySerializer;

class CustomArraySerializer extends ArraySerializer
{

    /**
     * Alter collection method in ArraySerializer
     *
     * @param string $resourceKey
     * @param array $data
     *
     * @return array
     */
    public function collection( $resourceKey, array $data )
    {
        return $data;
    }

    /**
     * Serialize null resource
     *
     * @return array
     */
    public function null()
    {
        return null;
    }

}

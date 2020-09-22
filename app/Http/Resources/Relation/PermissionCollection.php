<?php

namespace App\Http\Resources\Relation;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\Relation\PermissionResource';

    public function toArray($request)
    {
        return  $this->collection;
    }
}

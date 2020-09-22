<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'parent_id'     => $this->parent_id,
            'parent'        => $this->parent,
            'children'      => $this->children,
            'created_at'    => date(Controller::DATE_FORMAT,strtotime($this->created_at)),
            'updated_at'    => date(Controller::DATE_FORMAT,strtotime($this->updated_at)),
        ];
    }
}

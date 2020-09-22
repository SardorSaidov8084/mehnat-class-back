<?php

namespace Mehnat\Role\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use App\Models\Role;


class RoleRepository
{
    private $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }
    public function filter(Builder $query): Builder
    {
        if ($filter = request()->get('id', null)){
            $query = $query->where('id','like','%'. $filter . '%');
        }
        if ($filter = request()->get('name',null)){
            $query = $query->where('name','like','%' .  $filter . '%');
        }
        if ($filter = request()->get('slug', null)){
            $query = $query->where('slug','like','%'. $filter . '%');
        }
        return $query;
    }

    public function sort($query): Builder
    {
        $key = request()->get('sort_key', 'id');
        $order = request()->get('sort_order', 'asc');
        $query->orderBy($key, $order);

        return $query;
    }
    public function getAll(Builder $query = null): Collection
    {
        if ($query)
            return $query->get();
        else
            return $this->model->all();
    }
    public function create($input)
    {
        $model = $this->model;
        try {
            $model->name = $input['name'];
            $model->slug = $input['slug'];
            $model->save();

            return $model;
        } catch (\Exception $e) {
            return null;
        }

    }

    public function getById($query, $id): Role
    {
        return $query->findOrFail($id);
    }
    public function destroy($model, $input)
    {
        return $model->delete();
    }

    public function getQuery(): Builder
    {
        return $this->model->query();
    }
    public function update($data, $id): Role
    {
        $model = $this->getById($this->model, $id);
        $model->update($data);
        
        return $model;
    }

}

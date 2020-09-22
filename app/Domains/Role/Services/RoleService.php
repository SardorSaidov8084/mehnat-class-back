<?php

namespace Mehnat\Role\Services;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Collection;
use App\Http\Resources\RoleCollection;
use Illuminate\Database\Eloquent\Builder;
use Mehnat\Role\Repositories\RoleRepository;

class RoleService
{
    private $roleRepo;
    protected $per_page;

    public function __construct(RoleRepository $repo)
    {
        $this->roleRepo = $repo;
        $this->per_page = request()->get('per_page',10000);
    }

    public function getAll(): Object
    {
        $roles = $this->roleRepo->getQuery();
        $roles = $this->roleRepo->filter($roles);
        $roles = $this->roleRepo->sort($roles);
        $roles = $roles->orderBy('id', 'desc')->paginate($this->per_page);
        return new RoleCollection($roles);
    }

    public function getShow($id)
    {
        $role = $this->roleRepo->getQuery();
        $role = $this->roleRepo->getById($role, $id);
        return new RoleResource($role,true);
    }
    public function getCreate($input):Object
    {
        $role = $this->roleRepo->create($input);

        if ($input['permissions'])
        {
            $permissions = $input['permissions'];
            if (is_array($permissions)){
                $role->permissions()->sync($permissions);
            }
        }
        return new RoleResource($role);
    }
    public function getUpdate($input,int $id):Object
    {
        $role = $this->roleRepo->update($input, $id);
        
        if ($permissions = $input['permissions'])
        {
            if (is_array($permissions)){
                $role->permissions()->sync($permissions);
            }
        }else{
            $role->permissions()->detach();
        }
        return new RoleResource($role);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use Mehnat\Role\Services\RoleService;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiResponse\ApiResponse;
use EllipseSynergie\ApiResponse\Laravel\Response;

class RoleController extends Controller
{

    protected $response;

    protected $apiResponse;

    private $roleService;

    private $message_not_found;

    public function __construct(Response $response, ApiResponse $apiResponse, RoleService $service)
    {
        $this->response = $response;
        $this->roleService = $service;
        $this->apiResponse = $apiResponse;
        $this->message_not_found = trans('strings.not_found',['name' => __('messages.role')]);
    }

    public function index()
    {
        $roles = $this->roleService->getAll();
        
        return $this->response->withArray([
           'result' => [
               'success' => true,
               'data'    => $roles
           ]
        ]);
    }

    public function show($id)
    {
        $role = $this->roleService->getShow($id);
        return $this->response->withArray([
            'result' => [
                'success' => true,
                'data'    => [
                    'role'  => $role,
                ]
            ]
        ]);
    }

    public function store(RoleRequest $request)
    {
        $input = $request->all();
        $role = $this->roleService->getCreate($input);

        return $this->response->withArray([
            'result' => [
                'success' => true,
                'message' => __('messages.store_success',['name' => __('messages.role')]),
                'data'    => [
                    'role'  => $role
                ]
            ]
        ]);
    }

    public function update(RoleRequest $request, $id)
    {
        $input = $request->all(); 

        $result = $this->roleService->getUpdate($input, $id);

        return $this->response->withArray([
            'result' => [
                'success' => true,
                'message' => __('messages.update_success',['name' => __('messages.role')]),
                'data'    => [
                    'role'  => $result
                ]
            ]
        ]);
    }
}

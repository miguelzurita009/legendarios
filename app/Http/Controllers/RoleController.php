<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('roles.index');
    }

    public function getData()
    {
        return response()->json($this->service->getAll());
    }

    public function store(RoleRequest $request)
    {
        $role = $this->service->create($request->validated());
        return response()->json($role);
    }

    public function edit($id)
    {
        return response()->json($this->service->find($id));
    }

    public function update(RoleRequest $request, $id)
    {
        $role = $this->service->update($id, $request->validated());
        return response()->json($role);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['success' => true]);
    }
}

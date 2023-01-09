<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name'
        ]);

        Permission::create($request->only('name'));

        return redirect()->route('admin.permissions.index')
            ->withSuccess(__('Permission created successfully.'));
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(string $locale, Permission $permission)
    {
        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * @param string $locale
     * @param Request $request
     * @param Permission $permission
     * @return mixed
     */
    public function update(string $locale, Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);

        $permission->update($request->only('name'));

        return redirect()->route('admin.permissions.index')
            ->withSuccess(__('Permission updated successfully.'));
    }

    /**
     * @param string $locale
     * @param Permission $permission
     * @return mixed
     */
    public function destroy(string $locale, Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->withSuccess(__('Permission deleted successfully.'));
    }
}

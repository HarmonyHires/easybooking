<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct() {
        $this->middleware('permission:create-permission|edit-permission|delete-permission', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view ('admin.permissions.index', [
            'permissions' => Permission::orderBy('id', 'DESC')->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        Permission::create(['name' => $request->name]);

        return redirect()->route('permissions.index')
            ->withSuccess('New permission is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.permissions.edit', [
            'permissions' => Permission::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(StorePermissionRequest $request, string $id): RedirectResponse
    {
        $permission = Permission::find($id);
        $permission->update(['name' => $request->name]);

        return redirect()->route('permissions.index')
            ->withSuccess('Permission is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = DB::table('role_has_permissions')->where('permission_id', $id)->exists();
        $permission = Permission::find($id);

        if ($role) {
            return redirect()->route('permissions.index')
                ->withError('Permission is assigned to role(s).');
        }

        $permission->delete();

        return redirect()->route('permissions.index')
            ->withSuccess('Permission is deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param RoleDataTable $dataTable
     * @return Response
     */
    public function index(RoleDataTable $dataTable)
    {

        return $dataTable->render('admin.roles.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'admin'
        ]);

        $role->syncPermissions([$request->input('permission')]);


        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();

        return view('admin.roles.edit', compact('role', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrfail($id);
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$role->id,
            'permission' => 'required',
        ]);

        $role->update([
            'name' => $request->input('name'),
            'guard_name' => 'admin'
        ]);

        $role->syncPermissions([$request->input('permission')]);


        session()->flash('success', 'تمت عملية الإضافة بنجاح');
        return redirect()->route('roles.index');
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $author = Author::findOrFail($request->id);
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }

    public function delete(Request $request)
    {
        $author = Role::findOrFail($request->id);
        $author->delete();
        return response()->json([
            'success' => 'تمت عملية الحذف بنجاح'
        ]);
        // return redirect()->route('authors.index')->with('success', 'تمت عملية الحذف بنجاح');
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Companies;
use App\Roles;

class UserController extends Controller
{
    protected $fields = [
        'name' => '',
        'email' => '',
        'role_id' => '',
        'password' => ''
    ];

    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show form for creating new user
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
     
        $roles = Roles::all();
        $companies = Companies::all();
     
        $selectedCompany = '';
        $myCompanies = [];
        $selectedRole = '';
        $data = (object)$data;
     
        return view('admin.user.create', compact('roles','data','companies','selectedCompany','selectedRole','myCompanies'));
    }

    /**
     * Store the newly created user in the database.
     *
     * @param TagCreateRequest $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        $user = new User();
        foreach (array_keys($this->fields) as $field) {
            $user->$field = $request->get($field);
        }
        $user->password = bcrypt($user->password);
        $user->companies = implode (", ", $request->get('companies'));

        $user->save();
        return redirect('/admin/users')
            ->withSuccess("The user '$user->name' was created.");
    }

    /**
     * Show the form for editing a user
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $user->$field);
        }

        $data = (object) $data;

        $selectedRole = $user->role_id;
        //$selectedCompany = $user->company_id;

        $roles = Roles::all();
        $companies = Companies::all();

        $myCompanies = explode(',', $user->companies);

        return view('admin.user.edit', compact('id','roles', 'data','companies','selectedRole','myCompanies'));
    }

    /**
     * Update the user in storage
     *
     * @param TagUpdateRequest $request
     * @param int  $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

        $user = user::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['user'])) as $field) {
            $user->$field = $request->get($field);
        }
        $user->password = bcrypt($user->password);
        
        $user->companies = implode (", ", $request->get('companies'));

        $user->save();

        return redirect("/admin/users/$id/edit")->withSuccess("Changes saved.");
    }

    /**
     * Delete the user
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect('/admin/users')
            ->withSuccess("The '$user->user' user has been deleted.");
    }
}

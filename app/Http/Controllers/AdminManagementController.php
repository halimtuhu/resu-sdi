<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin-management.index')->with([
            'admins' => User::where('role', 'admin')->orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin-management.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'uid' => 'required|unique:users,uid',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'position' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = new User();
        $user->fill($request->except('_token'));
        $user->password = bcrypt($request->password);
        $user->role = 'admin';
        $user->save();

        return redirect(route('admin-management.index'))->with([
            'status' => 'Admin successfully created'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin-management.edit')->with([
            'admin' => User::find($id)
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'uid' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'position' => 'required'
        ]);

        $user->uid = $request->uid;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;
        if ($request->password) {
            $request->validate([
                'password' => 'min:8'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect(route('admin-management.index'))->with([
            'status' => 'Admin successfully updated'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with([
            'status' => 'Admin successfully deleted'
        ]);
    }
}

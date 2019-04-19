<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TechnicianManagementController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('technician-management.index')->with([
            'technicians' => User::whereNull('role')->orWhere('role', 'technician')->orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('technician-management.create');
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
            'phone_number' => 'required|unique:users,phone_number',
            'work_locations' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = new User();
        $user->fill($request->except('_token'));
        $user->password = bcrypt($request->password);
        $user->role = 'technician';
        $user->save();

        return redirect(route('technician-management.index'))->with([
            'status' => 'Technician successfully created'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('technician-management.edit')->with([
            'technician' => User::find($id)
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
            'phone_number' => 'required|unique:users,phone_number,'.$user->id,
            'work_locations' => 'required'
        ]);

        $user->uid = $request->uid;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->work_locations = $request->work_locations;
        if ($request->password) {
            $request->validate([
                'password' => 'min:8'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect(route('technician-management.index'))->with([
            'status' => 'Technician successfully updated'
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
            'status' => 'Technician successfully deleted'
        ]);
    }
}

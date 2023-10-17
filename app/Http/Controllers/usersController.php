<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class usersController extends Controller
{

    public function index()
    {
        $data = User::all();

        return view('user.index', ['data' => $data]);
    }

    public function create()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'username' => 'required',
            'email' =>'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required'
        ],[
            'username.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'no_telepon.required' => 'No Telepon harus diisi!',
            'password.required' => 'Password harus diisi!',
            'roles_id.required' => 'Roles harus diisi!'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('user.index');
    }

    public function edit(string $id)
    {
        $data =User::findOrFail($id);

        return view('user.edit', ['data' => $data]);
    }

    public function update(Request $request,  $id)
    {
        // dd($id);
        $validator = $request->validate([
            'username' => 'required',
            'email' =>'required|email',
            // 'password' => 'required',
            'role_id' => 'required'
        ],[
            'username.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'no_telepon.required' => 'No Telepon harus diisi!',
            // 'password.required' => 'Password harus diisi!',
            'roles_id.required' => 'Roles harus diisi!'
        ]);

        $data = User::findOrFail($id);
        $data->update([
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => $request->password ? Hash::make($request->password) : $data->password,
        ]);

        return redirect()->route('user.index')->with('success', 'data berhasil di edit');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->withInput();
    }
}

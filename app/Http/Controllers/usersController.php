<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();

        return view('user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $data =User::findOrFail($id);

    //     return view('user.', ['data' => $data]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =User::findOrFail($id);

        return view('user.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // dd($id);
        $validator = $request->validate([
            'username' => 'required',
            'email' =>'required|email',
            'password' => 'required',
            'role_id' => 'required'
        ],[
            'username.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'no_telepon.required' => 'No Telepon harus diisi!',
            'password.required' => 'Password harus diisi!',
            'roles_id.required' => 'Roles harus diisi!'
        ]);

        $data = User::findOrFail($id);
        $data->update([
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->withInput();
    }
}

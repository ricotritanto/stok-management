<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = Auth::user()->level;
        $data['title'] = 'Data User';
        $cari= $request->q;
        $data = User::where('name', 'like', '%' . $request->q . '%')->get();
        return view('user.index', compact('data','role', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['role'] = Auth::user()->level;
        $data['title'] = 'Tambah User';
        $data['levels'] = ['admin' => 'Admin', 'user' => 'User'];
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'level' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect(route('user.index'))->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = Auth::user()->level;
        print_r($role);exit();   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['role'] = Auth::user()->level;
        $data['title'] = 'Ubah User';
        $data['row'] = $user;
        $data['levels'] = ['admin' => 'Admin', 'user' => 'User'];
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect(route('user.index'))->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'))->with('success', 'Hapus Data Berhasil');
    }
}

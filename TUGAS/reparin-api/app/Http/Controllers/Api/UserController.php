<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // Get all users
        $users = User::latest()->paginate(5);

        // Return collection of services as a resource
        return new UserResource(true, 'List of Users', $users);
    }
    
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Simpan data user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new UserResource(true, 'User berhasil disimpan!', $user);
    }

    public function show($id)
    {
        // Cari user berdasarkan ID
        $user = User::find($id);

        return new UserResource(true, 'User ditemukan!', $user);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cari user berdasarkan ID
        $user = User::find($id);

        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new UserResource(true, 'User berhasil diupdate!', $user);
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $user = User::find($id);

        // Hapus data user
        $user->delete();

        return new UserResource(true, 'User berhasil dihapus!', null);
    }
}

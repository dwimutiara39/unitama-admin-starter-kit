<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index',[
            'title' => 'Dashboard',
        ]);
    }
    public function show()
    {
        return view('dashboard.show',[
            'title' => 'Detail User',
            'user'=>Auth::user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
            return view('dashboard.edit',[
            'title' => 'Edit User',
            'user'=>Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $user = Auth::user();
        $validated = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
    'password' => 'nullable|string|min:8',
    'passwordconfirm' => 'nullable|same:password',
    'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Diubah ke 2048 jika ingin maksimal 2MB
], [
    'name.required' => 'Nama tidak boleh kosong.',
    'name.max' => 'Nama maksimal 255 karakter.',
    
    'email.required' => 'Email tidak boleh kosong.',
    'email.email' => 'Format email tidak valid.',
    'email.max' => 'Email maksimal 255 karakter.',
    'email.unique' => 'Email sudah terdaftar.',
    
    'password.required' => 'Password tidak boleh kosong.',
    'password.min' => 'Password minimal terdiri dari 8 karakter.',
    
    'passwordconfirm.required' => 'Konfirmasi password tidak boleh kosong.',
    'passwordconfirm.same' => 'Konfirmasi password harus sama dengan password.',
    
    'avatar.image' => 'Avatar harus berupa gambar.',
    'avatar.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
    'avatar.max' => 'Ukuran gambar maksimal adalah 2MB.', // Pesan error untuk max ukuran file
]);
DB::beginTransaction();
    try {
        if($request->file('avatar')){
            $validated['avatar']=$request->file('avatar')->store('avatar', 'public');
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }
        }
        if($request->password){
            $validated['password']=bcrypt($request->password);
            
        }else{
            unset($validated['password']);
        }

        $user->update($validated);
        DB::commit();
        return to_route('dashboard.show')->withSuccess('Data Berhasil Diubah');
    
    }catch(\Exception $e){
        DB::rollBack();
    return to_route('dashboard.edit')->withError('Data Gagal Diubah');
    }
    }

    public function destroy(string $id)
    {
        //
    }
}

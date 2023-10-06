<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Menampilkan halaman index user
     */
    public function index()
    {
        $data = [
            'user' => User::all()
        ];

        return view('user.index', $data);
    }

    /**
     * Menampilkan halaman tambah user
     */
    public function indexCreate()
    {
        return view('user.tambah');
    }

    /**
     * Menampilkan halaman edit user
     */
    public function indexEdit(Request $request)
    {
        $data = [
            'user' => User::where('id', $request->id)->first()
        ];

        return view('user.edit', $data);
    }

    /**
     * function untuk menambahkan user
     */
    public function create(Request $request)
    {
        //
        $data = $request->validate([
            'username' => ['required', 'max:40'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect('/dashboard/user')
            ->with('success', 'User baru berhasil ditambahkan!');
    }

    public function edit(int $id, Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'max:40'],
            // 'password' => ['required'],
            'role' => ['required']
        ]);

        $user = User::query()->find($id);
        $user->fill($data);
        $user->save();

        return redirect('/dashboard/user')
            ->with('success', 'User baru berhasil diupdate!');
    }

    public function delete(User $user, Request $request)
    {
        // $user = User::query()->find($request['id'])->delete();
        $id_user = $request->id;
        //Hapus 
        $aksi = $user->where('id', $id_user)->delete();

        if ($aksi) :
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'User berhasil dihapus'
            ];
        else :
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'User gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Menampilkan halaman jenis surat
     */
    public function index()
    {
        $data = [
            'jenis_surat' => JenisSurat::all()
        ];

        return view('jenis-surat.index', $data);
    }

    /**
     * Menampilkan halaman tambah jenis surat
     */
    public function indexCreate()
    {
        return view('jenis-surat.tambah');
    }

    /**
     * Menampilkan halaman edit jenis surat
     */
    public function indexEdit(Request $request)
    {
        $data = [
            'jenis_surat' => JenisSurat::where('id', $request->id)->first()
        ];

        return view('jenis-surat.edit', $data);
    }

    /**
     * function untuk menambahkan atau mengedit jenis surat
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'jenis_surat' => ['required', 'max:40']
        ]);

        if ($data) {
            if ($request->input('id') != null) {
                $jenisSurat = JenisSurat::query()->find($request->input('id'));
                $jenisSurat->fill($data);
                $jenisSurat->save();

                if ($jenisSurat) {
                    return redirect('/dashboard/jenis_surat')
                        ->with('success', 'Jenis Surat berhasil diupdate!');
                } else {
                    return redirect('/dashboard/jenis_surat')
                        ->with('success', 'Jenis Surat gagal diupdate!');
                }
            }

            $dataInsert = JenisSurat::create($data);
            if ($dataInsert) {
                return redirect('/dashboard/jenis_surat')
                    ->with('success', 'Jenis Surat baru berhasil ditambahkan!');
            } else {
                return redirect('/dashboard/jenis_surat')
                    ->with('error', 'Jenis Surat baru gagal ditambahkan!');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function delete(JenisSurat $jenisSurat, Request $request)
    {
        //
        $jenisSurat = JenisSurat::query()->find($request['id'])->delete();

        if ($jenisSurat) :
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'Jenis Surat berhasil dihapus'
            ];
        else :
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'Jenis Surat gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSurat $jenisSurat)
    {
        //
    }
}

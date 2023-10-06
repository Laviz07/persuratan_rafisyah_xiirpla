<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratCreateRequest;
use App\Models\JenisSurat;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'surat' => Surat::with(['jenis', 'user'])->get(),
            // 'jenis_surat' => JenisSurat::all(),
            // 'user' => User::all()
        ];

        return view('surat.index', $data);
    }

    public function indexCreate()
    {
        //
        $data = [
            'jenis_surat' => JenisSurat::all(),
            'user' => User::all()
        ];

        return view('surat.tambah', $data);
    }

    public function indexEdit(Request $request)
    {
        //
        $data = [
            'surat' => Surat::where('id', $request->id)->first(),
            'jenis_surat' => JenisSurat::all(),
            'user' => User::all()
        ];

        return view('surat.edit', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $data = $request->validate(
            [
                'id_jenis_surat' => ['required'],
                'tanggal_surat' => ['required'],
                'ringkasan' => ['nullable'],
                'id_user' => ['required'],
                'file' => ['nullable', 'mimes:pdf']
            ]
        );

        if ($path = $request->file('file')) {
            $path = $path->storePublicly('', 'public');
            $data['file'] = $path;
        }

        $dataInsert = Surat::query()->create($data);
        if (!$dataInsert) {
            return redirect('/dashboard/surat')
                ->with('error', ' Surat baru gagal ditambahkan!');
        }

        return redirect('/dashboard/surat')
            ->with('success', ' Surat baru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = $request->validate([
            'id_jenis_surat' => ['required'],
            'tanggal_surat' => ['required'],
            'ringkasan' => ['nullable'],
            'id_user' => ['required'],
            'file' => ['nullable', 'mimes:pdf']
        ]);

        $surat = Surat::query()->find($request->id);


        if ($path = $request->file('file')) {
            // Delete old file
            if ($surat->file) {
                Storage::delete("public/$surat->file");
            }

            // Store new file
            $path = $path->storePublicly('', 'public');
            $data['file'] = $path;
        }

        $surat->update($data);

        return redirect('/dashboard/surat')
            ->with('success', 'Surat berhasil diupdate!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function download(Request $request)
    {
        //
        return Storage::disk("public")->download("$request->path");
    }

    /**
     * Display the specified resource.
     */
    public function delete(Surat $surat, Request $request)
    {
        //
        $surat = Surat::query()->find($request['id']);

        Storage::delete("public/$surat->file");
        $surat->delete();

        if ($surat) :
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => ' Surat berhasil dihapus'
            ];
        else :
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => ' Surat gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        //
    }
}

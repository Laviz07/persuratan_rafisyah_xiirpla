<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratCreateRequest;
use App\Models\JenisSurat;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;

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
        if ($dataInsert) {
            return redirect('/surat')
                ->with('success', ' Surat baru berhasil ditambahkan!');
        } else {
            return redirect('/surat')
                ->with('error', ' Surat baru gagal ditambahkan!');
        }
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
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        //
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

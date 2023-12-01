<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = layanan::all();
        return view('layanan.index', compact('layanan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required'
        ]);
        $layanan = new layanan;
        $layanan->nama = $request->nama;
        $layanan->email = $request->email;
        $layanan->subject = $request->subject;
        $layanan->pesan = $request->pesan;

        $layanan->save();
        return redirect('/layanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $layanan = layanan::find($id);
        return view('layanan.detail', compact('layanan'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = layanan::find($id);
        return view('layanan.update', compact('id', 'layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required'
        ]);
        layanan::where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'pesan' => $request->pesan,
        ]);
        return redirect('/layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = layanan::destroy($id);

        if ($deleted) {
            return back()->with('message:success', 'Deleted');
        } else {
            return back()->with('message:error', 'Error');
        }
    }
}

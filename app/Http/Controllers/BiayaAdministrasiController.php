<?php

namespace App\Http\Controllers;

use App\Models\BiayaAdministrasi;
use Illuminate\Http\Request;

class BiayaAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BiayaAdministrasi::paginate(20);
        return view('biayaAdministrasi.index', ['biayaAdministrasi' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biayaAdministrasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nominal'    => 'required',
        ]);
        $template = new BiayaAdministrasi();
        $template->nominal = $request->input('nominal');
        $template->save();
        $request->session()->flash('message', 'Successfully created BiayaAdministrasi');
        return redirect()->route('biayaAdministrasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiayaAdministrasi  $biayaAdministrasi
     * @return \Illuminate\Http\Response
     */
    public function show(BiayaAdministrasi $biayaAdministrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BiayaAdministrasi  $biayaAdministrasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biayaAdministrasi = BiayaAdministrasi::find($id);
        return view('biayaAdministrasi.edit', ['biayaAdmin' => $biayaAdministrasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiayaAdministrasi  $biayaAdministrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nominal'    => 'required',
        ]);
        $template = BiayaAdministrasi::find($id);
        $template->nominal = $request->input('nominal');
        $template->save();
        $request->session()->flash('message', 'Successfully update BiayaAdministrasi');
        return redirect()->route('biayaAdministrasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BiayaAdministrasi  $biayaAdministrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $template = BiayaAdministrasi::find($id);
        if ($template) {
            $template->delete();
        }
        $request->session()->flash('message', 'Successfully deleted biayaAdministrasi');
        return redirect()->route('biayaAdministrasi.index');
    }
}

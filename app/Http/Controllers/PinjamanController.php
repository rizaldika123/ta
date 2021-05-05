<?php

namespace App\Http\Controllers;

use App\Models\BiayaAdministrasi;
use App\Models\Bunga;
use App\Models\Kategori;
use App\Models\Pinjaman;
use App\Models\Tempo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pinjaman::paginate(20);
        $user = User::get();
        return view('pinjaman.index', ['pinjaman' => $data, 'users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::get();
        $kategori = Kategori::get();
        $bunga = Bunga::get();
        $biayaAdministrasi = BiayaAdministrasi::get();
        $tempo = Tempo::get();
        return view('pinjaman.create', ['users' => $user, 'kategoris' => $kategori, 'bungas' => $bunga, 'biayaAdministrasis' => $biayaAdministrasi, 'tempos' => $tempo]);
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
        $template = new Pinjaman();
        $date = Carbon::now();
        $template->user_id = $request->input('nasabahInput');
        $template->nominal = $request->input('nominal');
        $template->tanggal_pengajuan = $date;
        $template->biayaAdministrasi_id = $request->input('biayaAdministrasiId');
        $template->bunga_id = $request->input('bungaId');
        $template->tempo_id = $request->input('tempoId');
        $template->kategori_Id = $request->input('kategoriId');

        $template->save();
        $request->session()->flash('message', 'Successfully created Pinjaman');
        return redirect()->route('pinjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjaman = Pinjaman::find($id);
        return view('pinjaman.edit', ['pinjam' => $pinjaman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'    => 'required|min:1|max:64',
        ]);
        $template = Pinjaman::find($id);
        $template->tanggal_pengajuan = $request->input('tanggal_pengajuan');
        $template->biayaAdministrasi = $request->input('biayaAdministrasi');
        $template->bunga = $request->input('bunga');
        $template->jatuhTempo = $request->input('jatuhTempo');
        $template->user = $request->input('user');
        $template->save();
        $request->session()->flash('message', 'Successfully update Pinjaman');
        return redirect()->route('pinjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $template = Pinjaman::find($id);
        if ($template) {
            $template->delete();
        }
        $request->session()->flash('message', 'Successfully deleted pinjaman');
        return redirect()->route('pinjaman.index');
    }
}

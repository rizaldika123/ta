<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Angsuran::paginate( 20 );
        return view('angsuran.index',['angsuran'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('angsuran.create');
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
            'name'    => 'required|min:1|max:64',
        ]);
        $template = new Angsuran();
        $template->tanggal_angsuran = $request->input('tanggal_angsuran');
        $template->nominal = $request->input('nominal');
        $template->jatuhTempo = $request->input('jatuhTempo');
        $template->save();
        $request->session()->flash('message', 'Successfully created Angsuran');
        return redirect()->route('angsuran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function show(Angsuran $angsuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $angsuran = Angsuran::find($id);
        return view('angsuran.edit',['angsur' => $angsuran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'    => 'required|min:1|max:64',
        ]);
        $template = Angsuran::find($id);
        $template->tanggal_angsuran = $request->input('tanggal_angsuran');
        $template->nominal = $request->input('nominal');
        $template->jatuhTempo = $request->input('jatuhTempo');
        $template->save();
        $request->session()->flash('message', 'Successfully update Angsuran');
        return redirect()->route('angsuran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $template = Angsuran::find($id);
        if($template){
            $template->delete();
        }
        $request->session()->flash('message', 'Successfully deleted angsuran');
        return redirect()->route('angsuran.index');
    }
}

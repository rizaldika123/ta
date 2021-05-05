<?php

namespace App\Http\Controllers;

use App\Models\Tempo;
use Illuminate\Http\Request;

class TempoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tempo::paginate(20);
        return view('tempo.index', ['tempos' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tempo.create');
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
            'bulan'    => 'required',
        ]);
        $template = new Tempo();
        $template->bulan = $request->input('bulan');
        $template->save();
        $request->session()->flash('message', 'Successfully created Tempo');
        return redirect()->route('tempo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tempo  $tempo
     * @return \Illuminate\Http\Response
     */
    public function show(Tempo $tempo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tempo  $tempo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempo = Tempo::find($id);
        return view('tempo.edit', ['tempoo' => $tempo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tempo  $tempo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bulan'    => 'required',
        ]);
        $tempo = Tempo::find($id);
        $tempo->bulan = $request->input('bulan');
        $tempo->save();
        $request->session()->flash('message', 'Successfully update tempo');
        return redirect()->route('tempo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tempo  $tempo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $template = Tempo::find($id);
        if ($template) {
            $template->delete();
        }
        $request->session()->flash('message', 'Successfully deleted tempo');
        return redirect()->route('tempo.index');
    }
}

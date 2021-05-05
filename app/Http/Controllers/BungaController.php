<?php

namespace App\Http\Controllers;

use App\Models\Bunga;
use Illuminate\Http\Request;

class BungaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bunga::paginate( 20 );
        return view('bunga.index',['bunga'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bunga.create');
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
        $template = new Bunga();
        $template->nominal = $request->input('nominal');
        $template->save();
        $request->session()->flash('message', 'Successfully created Bunga');
        return redirect()->route('bunga.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function show(Bunga $bunga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bunga = Bunga::find($id);
        return view('bunga.edit',['bung' => $bunga]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nominal'    => 'required',
        ]);
        $template = Bunga::find($id);
        $template->nominal = $request->input('nominal');
        $template->save();
        $request->session()->flash('message', 'Successfully update Bunga');
        return redirect()->route('bunga.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bunga  $bunga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $template = Bunga::find($id);
        if($template){
            $template->delete();
        }
        $request->session()->flash('message', 'Successfully deleted bunga');
        return redirect()->route('bunga.index');
    }
}
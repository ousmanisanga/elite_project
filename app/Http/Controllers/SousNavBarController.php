<?php

namespace App\Http\Controllers;

use App\Models\SousNavBar;
use Illuminate\Http\Request;

class SousNavBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sousnavbars = SousNavBar::All();

        return view('sousnavbars.index', compact('sousnavbars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sousnavbars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'navbar_id'=> 'required'


        ]);

        $sousnavbar = new SousNavBar([
            'title' => $request->get('title'),
            'navbar_id' => $request->get('navbar_id')


        ]);


        $sousnavbar->save();
        return redirect('/')
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousNavBar  $sousNavBar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sousnavbar = SousNavBar::findOrFail($id);
        return view('sousnavbars.show', compact('sousnavbar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousNavBar  $sousNavBar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sousnavbar = SousNavBar::findOrFail($id);
        return view('sousnavbars.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SousNavBar  $sousNavBar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $sousnavbar = SousNavBar::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'navbar_id' => 'required',



        ]);

        $sousnavbar->title = $request->get('tilte');
        $sousnavbar->navbar_id = $request->get('navbar_id');


        $sousnavbar->update();

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousNavBar  $sousNavBar
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $sousnavbar = SousNavBar::findOrFail($id);

        $sousnavbar->delete($id);
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = footer::all();
        return view('footers.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('footers.create');
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
            'categorie' => 'required'


        ]);

        $footer = new footer([

            'categorie' => $request->get('categorie'),



        ]);


        $footer->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer= footer::findOrFail($id);
        return view('footers.show', compact('footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(footer $footer)
    {
        $footer= footer::findOrFail($id);
        return view('footers.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $footer = footer::findOrFail($id);

        $request->validate([
            'categorie' => 'required',


        ]);



        $footer->categorie = $request->get('categorie');





        $footer->update();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = footer::findOrFail($id);

        $footer->delete($id);
        return redirect('/');
    }
}

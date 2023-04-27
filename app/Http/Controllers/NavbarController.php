<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Illuminate\Http\Request;

class NavBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navbars = Navbar::all();
        return view('navbars.index', compact('navbars'));
    }


    public function create()
    {
        return view('navbars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $navbar = new Navbar([
            'title' => $request->get('title'),
            'url' => $request->get('url')

        ]);

        $navbar->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NavModel  $navModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $navbar = NavModel::findOrFail($id);
        return view('navbars.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NavModel  $navModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $navbar = Navbar::findOrFail($id);
        return view('navbars.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NavModel  $navModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $navbar = Navbar::find($id);

        $navbar->title = $request->get('title');
        $navbar->url = $request->get('url');
        $navbar->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NavModel  $navModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $navbar = Navbar::findOrFail($id);
    }
}

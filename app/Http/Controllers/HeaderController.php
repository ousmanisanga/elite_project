<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Header::all();
        return view('headers.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('headers.create');
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
            'content' => 'required',

        ]);

        $header = new Header([

            'title' => $request->get('title'),
            'content' => $request->get('content'),


        ]);


        $header->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = Header::findOrFail($id);
        return view('headers.show', compact('header'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = Header::findOrFail($id);
        return view('headers.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $header = Header::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required'

        ]);



        $header->title = $request->get('title');
        $header->content = $request->get('content');




        $header->update();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $header = Header::findOrFail($id);

        $header->delete($id);
        return redirect('/');
    }
}

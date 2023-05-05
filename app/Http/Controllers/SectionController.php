<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.create');
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
            'content'     => 'required|string',
            'image'   => 'required|string',
            'description' => 'required|string|max:200',
            'title'       => 'required|string|max:200'
        ]);


        $section = new Section([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image'=> $request->get('image'),
            'content' => $request->get('content')

        ]);


        $section->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        $section = Section::findOrFail($section);
        return view('sections.show', compact('section'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $section = Section::findOrFail($section);
        return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $section = Section::findOrFail($section);

        $request->validate([
            'title'> 'required',
            'description' => 'required',
            'image' => 'required',
            'content' => 'required',


        ]);



        $section->title = $request->get('title');
        $section->description = $request->get('description');
        $section->image = $request->get('image');
        $section->content= $request->get('content');

        $section->DB::update('update users set votes = 100 where name = ?', ['John']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section = Section::findOrFail($section);
        $section->delete($section);
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SousNavBar;
use Illuminate\Http\Request;

class SousNavBarController extends Controller
{
    public function index()
    {
        $sousnavbars = SousNavBar::all();

        return view('sousnavbars.index', compact('sousnavbars'));
    }

    public function create()
    {
        return view('sousnavbars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'navbar_id' => 'required'
        ]);

        $sousnavbar = new SousNavBar();
        $sousnavbar->title = $request->input('title');
        $sousnavbar->navbar_id = $request->input('navbar_id');
        $sousnavbar->save();

        return redirect()->route('sousnavbars.index');
    }

    public function show($id)
    {
        $sousnavbar = SousNavBar::findOrFail($id);
        return view('sousnavbars.show', compact('sousnavbar'));
    }

    public function edit($id)
    {
        $sousnavbar = SousNavBar::findOrFail($id);
        return view('sousnavbars.edit', compact('sousnavbar'));
    }

    public function update(Request $request, $id)
    {
        $sousnavbar = SousNavBar::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'navbar_id' => 'required'
        ]);

        $sousnavbar->title = $request->input('title');
        $sousnavbar->navbar_id = $request->input('navbar_id');
        $sousnavbar->save();

        return redirect()->route('sousnavbars.index');
    }

    public function destroy($id)
    {
        $sousnavbar = SousNavBar::findOrFail($id);
        $sousnavbar->delete();

        return redirect()->route('sousnavbars.index');
    }
}

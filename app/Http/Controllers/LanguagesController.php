<?php

namespace App\Http\Controllers;

use App\Models\languages;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = languages::all();

        $title = 'Delete row '.'!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dasboard.pages.Lang.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(languages $languages, $id)
    {
        $lang = languages::find($id);
        // dd($lang);
        return view('dasboard.pages.Lang.edit', compact('lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, languages $languages, $id)
    {
        // dd($request->all());
        $lang = languages::find($id);
        $lang->en = $request->en;
        $lang->ar = $request->ar;
        $lang->update();

        return redirect()->route('dashboard.lang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(languages $languages, $id)
    {
        $lang = languages::find($id)->delete();
        return redirect()->back();
    }
}

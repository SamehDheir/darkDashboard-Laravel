<?php

namespace App\Http\Controllers;

use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:operate-sections', ['only' => ['store', 'edit', 'create', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = section::all();

        return view('backEnd.sections.allSections', compact('sections'));
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
        $sections = new section();
        // $request->validate([
        //     'name' => 'required',
        //     'desc' => 'required',
        // ]);

        $sections->name = $request->name;
        $sections->desc = $request->desc;
        $sections->created_by = Auth::user()->name;
        $sections->save();

        toastr()->success('The Data Has Been Created Successfully!');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $section = section::findOrFail($id);
        return view('backEnd.sections.editSection', compact('section'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $section = section::find($id);
        $section->name = $request->input('name');
        $section->desc = $request->input('desc');

        toastr()->success('The Data Has Been Updated Successfully!', 'UPDATE');
        $section->update();
        return redirect()->route('sections.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = section::find($id);
        $section->delete();
        toastr()->error('The Data Has Been Deleted Successfully!');

        return redirect()->route('sections.index');
        // ->with('delete', 'Section deleted successfully');
    }
}

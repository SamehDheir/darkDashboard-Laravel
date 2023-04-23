<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:operate-books', ['only' => ['store', 'edit', 'create', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::all();
        return view('backEnd.books.allbooks', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = section::all();
        return view('backEnd.books.addBook', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $books = books::all();
        $book = new books();
        // $request->validate([
        //     'name' => 'required',
        //     'desc' => 'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // Uploude Images

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('assets/backEnd/img/books', $fileName);
            $book->image = $fileName;
        }
        // Uploude Images

        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->price = $request->price;

        $book->section_id = $request->section_id;
        $book->save();

        toastr()->success('The Data Has Been Created Successfully!');

        return redirect()->route('books.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(books $books, $id)
    {
        $book = books::findOrFail($id);
        $sections = section::all();

        return view('backEnd.books.editBook', compact('book', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $books = books::findOrFail($id);
        $books->name = $request->input('name');
        $books->desc = $request->input('desc');
        $books->price = $request->input('price');

        // Update Images
        $oldImagePath = $books->image;
        $path = 'assets/backEnd/img/books/' . $oldImagePath;

        if ($request->hasFile('image')) {

            if (file_exists($path)) {
                unlink($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('assets/backEnd/img/books/', $fileName);

            $books->image = $fileName;

        }
        // Update Images

        $books->section_id = $request->input('section_id');

        toastr()->success('The Data Has Been Updated Successfully!', 'UPDATE');
        $books->update();
        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $books = books::find($id);
        // Delete Image In File

        // $oldImagePath = $books->image;
        // $path = 'assets/backEnd/img/books/' . $oldImagePath;
        // if (file_exists($path)) {
        //     unlink($path);
        // }

        // Delete Image In File

        $books->delete();
        toastr()->error('The Data Has Been Deleted Successfully!', 'asd');

        return redirect()->route('books.index');

    }
}

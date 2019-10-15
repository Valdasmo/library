<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Author;
use Intervention\Image\ImageManagerStatic as Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter', '');
        $authors = Author::all();
        if ($filter) {
            $books = Book::where('author_id', $filter)->get(); // db
 
        } else {
            $books = Book::all(); //<<-- šita eilutė čia įdedama //paėmus ją iš viršaus (buvo po šia eilute: public function index())
        }

        // $books = Book::all();

        return view('book.index', ['books' => $books,
        'authors' => $authors,
        'filter' => $filter ?? 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
//foto start
$file = $request->file('book_photo');
$img = Image::make($file);
// resize the image to a width of 300 and constrain aspect ratio (auto height)
$img->resize(300, null, function ($constraint) {
    $constraint->aspectRatio();
});
$photo = basename($file->getClientOriginalName());// failo vardas
$img->save(public_path('/img/'.$photo));
//foto end
        $book->title = $request->book_title;
        $book->publisher = $request->book_publisher;
        $book->critic = $request->book_critic;
        $book->author_id = $request->author_id;
        $book->file = $photo; //foto
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->book_title;
        $book->publisher = $request->book_publisher;
        $book->critic = $request->book_critic;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}

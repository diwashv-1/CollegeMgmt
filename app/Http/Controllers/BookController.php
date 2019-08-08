<?php

namespace College\Http\Controllers;

use College\BookQuantity;
use College\Books;
use College\Http\Requests\createAddBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('library.addBook');


        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(createAddBookRequest $request)
    {

//add Book
        $book = Books::create([

            'bookName' => $request->bookName,
            'authorName' => $request->authorName,
            'facultyId' => $request->selectFac,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'entryDate' => $request->entryDate,
            'bookCode' => $request->bookCode,
            'bookType' => 1,
            'isbnCode' => $request->isbnCode,
            'quantity' => $request->quantity
        ]);

        $bookId = $book->id;
        $bookQuantity = $book->quantity;

        //add Dummy
        BookQuantity::create([
            'book_id' => $bookId,
            'quantity' => $bookQuantity
        ]);


        session()->flash('success', 'Books Added Succesfully');
        return redirect('/Books');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

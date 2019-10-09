<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $books = Book::where(['id' => $id])->first();

       return New \App\Http\Resources\Book($books);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\Book as ResourcesBook;
use App\Models\Book;
use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function index(){
        // $books = DB::select('select * from books');
        // $books = DB::table('books')->get();
        $books = Book::all();

        return $books;
    }

    public function view($id) {
        // $book = DB::select('select * from books where id = ?', [$id]);
        // $book = DB::select('select * from books where id = :id', ['id'=> $id]);
        $book = new ResourcesBook(Book::find($id));
        return $book;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function index(){
        // $books = DB::select('select * from books');
        $books = DB::table('books')->get();
        return $books;
    }

    public function view($id) {
        // $book = DB::select('select * from books where id = ?', [$id]);
        $book = DB::select('select * from books where id = :id', ['id'=> $id]);
        return $book;
    }
}

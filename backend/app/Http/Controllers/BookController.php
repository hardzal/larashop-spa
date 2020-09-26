<?php

namespace App\Http\Controllers;

use App\Http\Resources\Books as BookResourceCollection;
use App\Models\Book;
use App\Http\Resources\Book as BookResource;
use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function index(){
        // $books = DB::select('select * from books');
        // $books = DB::table('books')->get();
        // $books = Book::all();
        $books = Book::paginate(6);

        return new BookResourceCollection($books);
    }

    public function view($id) {
        // $book = DB::select('select * from books where id = ?', [$id]);
        // $book = DB::select('select * from books where id = :id', ['id'=> $id]);
        $book = new BookResourceCollection(Book::find($id));
        return $book;
    }

    public function top($count) {
        $criteria = Book::select('*')
            ->orderBy('views', 'DESC')
            ->limit($count)
            ->get();

        return new BookResourceCollection($criteria);
    }

    public function slug($slug) {
        $criteria = Book::where('slug', $slug)->first();
        $criteria->views = $criteria->views + 1;
        $criteria->save();
        return new BookResource($criteria);
    }

    public function search($keyword) {
        $criteria = Book::select('*')
            ->where('title', 'LIKE', "%". $keyword. "%")
            ->orderBy('views', 'DESC')
            ->get();

        return new BookResourceCollection($criteria);
    }
}

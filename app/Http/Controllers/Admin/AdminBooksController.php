<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBooksController extends AdminBaseController
{
    public function index()
    {
        $books = Book::with('category', 'author', 'image')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.books.index', compact('books'));
    }
}

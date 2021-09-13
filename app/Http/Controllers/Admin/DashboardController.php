<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{

    public function index(){

        $categories = Category::count();
        $books = Book::count();
        $authors = Author::count();
        $users = User::count();
        return view('admin.index', compact('categories', 'books', 'authors', 'users'));
    }
}

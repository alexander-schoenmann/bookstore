<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ruft methode index im controller auf
Route::get('/', [BookController::class, 'index']);

Route::get('/books/{book}', [BookController::class, 'show']);


//Route::get('/', function () {
    //FOLGENDES LIEFERT DAS GLEICHE ERGEBNIS
    //$books = DB::table('books')->get();
    //$books = DB::select("select * from books");

    /*
     * //UM NUR DAS BUCH MIT DEM BESTIMMTEN TITEL AUSGEBEN
    $title = "iR8EPTWv57VREot6Z5ofLDWhGHyT743fpoaaPRUdHuOUMyxnDfzL6uaR2vYCRXNVvzVahIAg3dDglDI8MxdARAcJ8zJF8IYBpxLl";
    $books = DB::table('books')
        ->where('title', $title)
        ->get();
    */

    //$books = Book::all(); //umstellung auf eloquent

    //return view('books.index', compact('books'));
//});

/*
Route::get('books/{id}', function ($id) {
    //$book = DB::table('books')->find($id);
    $book = Book::find($id); //macht das gleiche wie zeile darüber
    return view('books.show', compact('book'));
});
*/

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Client;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function search(Request $request)
    {
        if ($request->has('title')) {
            $books = Book::where('title', 'LIKE', '%' . $request->input('title') . '%')->paginate(20);
            if (count($books) === 0)
                response("Not found", 404);

            return $books;
        }

        if ($request->has('author')) {
            $books = Book::where('author', 'LIKE', '%' . $request->input('author') . '%')->paginate(20);
            if (count($books) === 0)
                response("Not found", 404);

            return $books;
        }

        if ($request->has('first_name') or $request->has('first_name')) {
            $books = Book::where('first_name', 'LIKE', '%' . $request->input('first_name') . '%')
                ->where('last_name', 'LIKE', '%' . $request->input('last_name') . '%')->paginate(20);

            if (count($books) === 0)
                response("Not found", 404);
            return $books;
        }

        return Book::paginate(20);
    }


    public function details(int $id)
    {
        // mozna krocej zaznaczajac wszystko

        // Book::with('client)->->where('id', $id)->get()


        return Book::with('client:id,first_name,last_name')
            ->select('id', 'title', 'author', 'published_year', 'publisher', 'is_borrowed', 'client_id')
            ->where('id', $id)
            ->get();
    }


    public function borrowBook(Request $request, int $book_id)
    {
        if (!$request->has('client_id'))
            response("No client_id", 422);

        if (count(Client::find($request->input('client_id'))) === 0)
            response("client not found", 404);


        $book = Book::find($book_id);

        if ($book->is_borrowed)
            response("book already borrowed");

        $book->client_id = $request->input('client_id');
        $book->is_borrowed = true;

        $book->save();

        return response("book borrowed");
    }

    public function returnBook(Request $request, int $book_id)
    {
        if (!$request->has('client_id'))
            response("No client_id", 422);

        if (count(Client::find($request->input('client_id'))) === 0)
            response("client not found", 404);


        $book = Book::find($book_id);

        if (!$book->is_borrowed)
            response("book not borrowed", 400);

        if ($book->client_id !== $request->input('client_id'))
            response("book doesn't belong to this client", 403);



        $book->client_id = null;
        $book->is_borrowed = false;

        $book->save();

        return response("book returned");
    }
}

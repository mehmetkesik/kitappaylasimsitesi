<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookRequest;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookController extends Controller
{
    function book($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            abort(404);
        }
        $data = ["book" => $book];
        return view("book", $data);
    }

    function bookRequestPost(Request $req)
    {
        if (Auth::user()->phone == null || Auth::user()->address == null) {
            return back()->with("noInfo", "noInfo");
        }
        $book = Book::find($req->kitap_id);
        $book->active = false;
        $book->update();

        //adın slug'ına göre sayma işlemi
        $sum_by_slug = 0;
        $slug = Str::slug(Book::find($req->kitap_id)->name, "-");
        $books = BookRequest::all();
        foreach ($books as $b) {
            if (Str::slug($b->getBook->name, "-") == $slug) {
                $sum_by_slug++;
            }
        }

        $bookReq = new BookRequest;
        $bookReq->user_id = Auth::id();
        $bookReq->book_id = $req->kitap_id;
        $bookReq->sum_by_slug = $sum_by_slug;
        $bookReq->save();

        return back();
    }

    function bookUpload()
    {
        return view("book_upload");
    }

    function bookUploadPost(Request $req)
    {
        $rules = Validator::make($req->all(), [
            "ad" => "required | min:1 | max:100",
            "yazar" => "required | min:1 | max:100",
            "kapak_resmi" => "required | image | max:2048",
            "sayfa_sayisi" => "nullable | digits_between:1,5",
            "basim_yili" => "nullable | date",
            "aciklama" => "nullable | max:1000",
        ]);

        if ($rules->fails()) {
            return redirect()->back()
                ->withErrors($rules)
                ->withInput();
        }
        $image = $req->file('kapak_resmi');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/books'), $imageName);

        //adın slug'ına göre sayma işlemi
        $sum_by_slug = 0;
        $books = Book::all();
        foreach ($books as $b) {
            if (Str::slug($b->name, "-") == Str::slug($req->ad, "-")) {
                $sum_by_slug++;
            }
        }

        $id = Auth::user()->id;
        $book = new Book;
        $book->user_id = $id;
        $book->name = $req->ad;
        $book->author = $req->yazar;
        $book->image = $imageName;
        $book->page = $req->sayfa_sayisi;
        $book->year = $req->basim_yili;
        $book->explanation = $req->aciklama;
        $book->active = true;
        $book->sum_by_slug = $sum_by_slug + 1;
        $book->save();

        return redirect("/kitap/{$book->id}");
    }

    function bookDelete(Request $req)
    {
        if ($req->kitap_user_id == Auth::id()) {
            $book = Book::find($req->kitap_id);
            $book->delete();
            File::delete(public_path("images/books/" . $book->image));
            if (!$book->active) { //eğer kitap verilmişte istektende silecek.
                $book->getRequest->delete();
            }
            return redirect("/profil");
        }
        return back();
    }

    function search($text, $page = 0)
    {
        $data = [];
        $linkPerPage = 6;

        if ($text == null) {
            $data["books"] = Book::orderBy("id", "desc")->take($linkPerPage)->get();
            $data["search"] = false;
        } else {
            $data["search"] = true;
            $data["text"] = $text;
            $books = Book::where("name", 'LIKE', "%{$text}%")->orWhere("author", 'LIKE', "%{$text}%")->get();

            $page = (int)$page; //sayı gelmezse 0 verir.
            if ($page < 0) {
                $page = 0;
            }

            $geriLink = "#";
            if ($page > 0) {
                $geriLink = "/kitap-ara/$text/" . ($page - 1);
            }

            $ileriLink = "#";
            $toplam = count($books);
            if (($page + 1) < ceil($toplam / $linkPerPage)) {
                $ileriLink = "/kitap-ara/$text/" . ($page + 1);
            }

            $data["books"] = Book::where("name", 'LIKE', "%{$text}%")->orWhere("author", 'LIKE', "%{$text}%")->
            skip($linkPerPage * $page)->take($linkPerPage)->get();
            $data["geriLink"] = $geriLink;
            $data["ileriLink"] = $ileriLink;
            $data["sayfa"] = $page;
            $data["toplam"] = $toplam;
        }

        return view("search", $data);
    }

    function new_added()
    {
        $data = ["books" => Book::orderBy("id", "desc")->take(6)->get()];
        return view("new_added", $data);
    }

    function most_loved()
    {
        $data = ["books" => BookRequest::orderBy("sum_by_slug", "desc")->take(6)->get()];

        $bookTable = [];
        $books = BookRequest::orderBy("sum_by_slug", "desc")->get();

        $sum = 0;
        foreach ($books as $book) {
            $slug = Str::slug($book->getBook->name);
            $varmi = false;
            foreach ($bookTable as $bt) {
                if ($slug == Str::slug($bt->getBook->name)) {
                    $varmi = true;
                    break;
                }
            }
            if (!$varmi) {
                array_push($bookTable, $book);
                $sum++;
            }
            if ($sum >= 6) {//6 tane getirecek.
                break;
            }
        }

        $data = ["books" => $bookTable];

        return view("most_loved", $data);
    }

    function much_read()
    {
        $bookTable = [];
        $books = Book::orderBy("sum_by_slug", "desc")->get();

        $sum = 0;
        foreach ($books as $book) {
            $slug = Str::slug($book->name);
            $varmi = false;
            foreach ($bookTable as $bt) {
                if ($slug == Str::slug($bt->name)) {
                    $varmi = true;
                    break;
                }
            }
            if (!$varmi) {
                array_push($bookTable, $book);
                $sum++;
            }
            if ($sum >= 6) {//6 tane getirecek.
                break;
            }
        }

        $data = ["books" => $bookTable];

        return view("much_read", $data);
    }

}

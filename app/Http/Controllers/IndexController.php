<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    function index()
    {
        return view("index");
    }

    function profile()
    {
        $data = ["myBooks" => Book::where("user_id", Auth::id())->get(),
            "myBookRequests" => BookRequest::where("user_id", Auth::id())->get()];
        return view("profile", $data);
    }

    function profileEdit()
    {
        return view("profile_edit");
    }

    function profileEditPost(Request $req)
    {
        $id = Auth::user()->id;
        $rules = Validator::make($req->all(), [
            "ad" => "required | min:3 | max:50",
            "email" => "required | email | max:100 | unique:App\User,email," . $id,
            "telefon" => "nullable | digits:10",
            "adres" => "nullable | min:5 | max: 255",
        ]);

        if ($rules->fails()) {
            return redirect()->back()
                ->withErrors($rules, "profileErrors")
                ->withInput();
        }

        $user = Auth::user();
        $user->name = $req->ad;
        $user->email = $req->email;
        $user->phone = $req->telefon;
        $user->address = $req->adres;
        $user->update();

        return back()->withInput()->with("profileMessage", "Profil Başarıyla Kaydedildi.");
    }

    function passwordEdit()
    {
        return view("password_edit");
    }

    function passwordEditPost(Request $req)
    {
        $rules = Validator::make($req->all(), [
            "sifre" => "required | confirmed | min:8 | max:50",
        ]);

        if ($rules->fails()) {
            return redirect()->back()
                ->withErrors($rules, "passwordErrors");
        }

        $user = Auth::user();
        $user->password = Hash::make($req->sifre);
        $user->update();

        return back()->with("passwordMessage", "Şifre Başarıyla Değiştirildi.");
    }
}

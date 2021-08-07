@extends('layouts.main')

@section("title","| İletişim")

@section("menu-contact","current")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>İletişim</span></h3>
            <div>
                @include("inc.contact_content")
            </div>
        </div>
    </div>
@endsection

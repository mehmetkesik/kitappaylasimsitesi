@extends('layouts.main')

@section("title","| Hakkında")

@section("menu-about","current")

@section("content")
    <div><span class="background"></span>
        <div id="about">
            <h3><span>Hakkımızda</span></h3>
            @include("inc.about_content")
        </div>
    </div>
@endsection

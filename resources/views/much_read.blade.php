@extends('layouts.main')

@section("title","| Çok Okunanlar")

@section("menu-much-read","current")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>Çok Okunanlar</span></h3>
            <div>
                @for($i=0;$i<count($books);$i+=2)
                    <ul>
                        <li class="first"><a class="thumbnail" href="/kitap/{{$books[$i]->id}}">
                                <img class="book-img" src="{{asset('images/books/'.$books[$i]->image)}}" alt=""></a>
                            <h2 style="max-height: 40px;overflow: hidden;">
                                <a href="/kitap/{{$books[$i]->id}}">
                                    {{substr($books[$i]->name.", ".$books[$i]->author,0,40)}}
                                </a>
                            </h2>
                            <p style="max-height: 113px;overflow: hidden;">
                                {{substr($books[$i]->explanation,0,200)."..."}}
                            </p>
                            <div><a href="/kitap/{{$books[$i]->id}}">Kitabı Gör</a></div>
                        </li>
                        @if(count($books) > $i+1)
                            <li><a class="thumbnail" href="/kitap/{{$books[$i+1]->id}}">
                                    <img class="book-img" src="{{asset('images/books/'.$books[$i+1]->image)}}"
                                         alt=""></a>
                                <h2 style="max-height: 40px;overflow: hidden;">
                                    <a href="/kitap/{{$books[$i+1]->id}}">
                                        {{substr($books[$i+1]->name.", ".$books[$i+1]->author,0,40)}}
                                    </a>
                                </h2>
                                <p style="max-height: 113px;overflow: hidden;">
                                    {{substr($books[$i+1]->explanation,0,200)."..."}}
                                </p>
                                <div><a href="/kitap/{{$books[$i]->id}}">Kitabı Gör</a></div>
                            </li>
                        @endif
                    </ul>
                @endfor
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section("title","| En Sevilenler")

@section("menu-most-loved","current")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>En Sevilenler</span></h3>
            <div>
                @for($i=0;$i<count($books);$i+=2)
                    <ul>
                        <li class="first"><a class="thumbnail" href="/kitap/{{$books[$i]->getBook->id}}">
                                <img class="book-img" src="{{asset('images/books/'.$books[$i]->getBook->image)}}"
                                     alt=""></a>
                            <h2 style="max-height: 40px;overflow: hidden;">
                                <a href="/kitap/{{$books[$i]->getBook->id}}">
                                    {{substr($books[$i]->getBook->name.", ".$books[$i]->getBook->author,0,40)}}
                                </a>
                            </h2>
                            <p style="max-height: 113px;overflow: hidden;">
                                {{substr($books[$i]->getBook->explanation,0,200)."..."}}
                            </p>
                            <div><a href="/kitap/{{$books[$i]->getBook->id}}">Kitabı Gör</a></div>
                        </li>
                        @if(count($books) > $i+1)
                            <li><a class="thumbnail" href="/kitap/{{$books[$i+1]->getBook->id}}">
                                    <img class="book-img"
                                         src="{{asset('images/books/'.$books[$i+1]->getBook->image)}}"
                                         alt=""></a>
                                <h2 style="max-height: 40px;overflow: hidden;">
                                    <a href="/kitap/{{$books[$i+1]->getBook->id}}">
                                        {{substr($books[$i+1]->getBook->name.", ".$books[$i+1]->getBook->author,0,40)}}
                                    </a>
                                </h2>
                                <p style="max-height: 113px;overflow: hidden;">
                                    {{substr($books[$i+1]->getBook->explanation,0,200)."..."}}
                                </p>
                                <div><a href="/kitap/{{$books[$i]->getBook->id}}">Kitabı Gör</a></div>
                            </li>
                        @endif
                    </ul>
                @endfor
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section("title","| Kitap")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>{{$book->name}}, {{$book->author}}</span></h3>
            <div>
                @if(Auth::check() && Auth::user()->id == $book->getUser->id && !$book->active)
                    <div class="talepkar">
                        <h2>Talep Edenin Bilgileri</h2>
                        <hr style="color: #7A6B4E"/>
                        <p style="padding: 0;margin:0;">*Talep eden kişinin telefon numarasını kullanarak iletişime
                            geçebilirsiniz. Adres bilgisine göre karşı ödemeli olarak kargo ile kitabınızı
                            yollayabilirsiniz.</p>
                        <h2 style="display: inline-block;">Adı:</h2> {{$book->getRequestor()->name}}<br/>
                        <h2 style="display: inline-block;">Telefonu:</h2> {{$book->getRequestor()->phone}}<br/>
                        <h2 style="display: inline-block;">Adresi:</h2> {{$book->getRequestor()->address}}<br/>
                    </div>
                @endif
                <ul style="@if(Auth::check() && Auth::user()->id == $book->getUser->id && !$book->active)
                    width: 640px;
                @endif">
                    @if(session()->has("noInfo"))
                        <li style="margin-left: 0;width: 100%;height: auto;">
                            <p style="font-size: 17px;color: darkred;">
                                !! Telefon ve Adres bilgilerini girmeden kitap talep edemezsiniz. !!</p>
                        </li>
                    @endif
                    <li style="margin-left: 0;width: 100%;height: auto;">
                        <h2 style="display: inline-block">Yayınlayan:</h2>
                        {{$book->getUser->name}}
                    </li>
                    <li style="margin-left: 0;width: 100%;height: auto;">
                        <a class="thumbnail" href="#">
                            <img class="book-img" src="{{asset('images/books/'.$book->image)}}" alt="">
                        </a>
                        @if(!$book->active)
                            <button class="benimbuton">Verildi</button>
                            @if(Auth::check() && Auth::user()->id == $book->getUser->id)
                                <form style="display: inline-block;" method="post" action="{{route('book.delete')}}">
                                    @csrf
                                    <input type="hidden" name="kitap_id" value="{{$book->id}}">
                                    <input type="hidden" name="kitap_user_id" value="{{$book->user_id}}">
                                    <button class="benimbuton" type="submit"
                                            style="background-color: darkred;color: white;width: 100px;">
                                        Sil
                                    </button>
                                </form>
                            @endif
                        @else
                        <!-- eğer kitap kendi kitabımızsa -->
                            @if(Auth::check() && Auth::user()->id == $book->getUser->id)
                                <button class="benimbuton">Yayında</button>
                                <form style="display: inline-block;" method="post" action="{{route('book.delete')}}">
                                    @csrf
                                    <input type="hidden" name="kitap_id" value="{{$book->id}}">
                                    <input type="hidden" name="kitap_user_id" value="{{$book->user_id}}">
                                    <button class="benimbuton" type="submit"
                                            style="background-color: darkred;color: white;width: 100px;">
                                        Sil
                                    </button>
                                </form>
                            @else
                                <form action="{{route('book.request.post')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="kitap_id" value="{{$book->id}}">
                                    <button class="benimbuton" type="submit">Talep Et</button>
                                </form>
                            @endif
                        @endif
                        <br/>
                        <br/>
                        <h2 style="display: inline-block">Kitabın adı:</h2>
                        <p style="display: inline-block">{{$book->name}}</p>
                        <br/>
                        <h2 style="display: inline-block">Kitabın yazarı:</h2>
                        <p style="display: inline-block">{{$book->author}}</p>
                        <br/>
                        <h2 style="display: inline-block">İlk yayınlanma tarihi:</h2>
                        <p style="display: inline-block">{{\App\Book::turkce_tarih('d M, Y', $book->year)}}</p>
                        <br/>
                        <h2 style="display: inline-block">Sayfa sayısı:</h2>
                        <p style="display: inline-block">{{$book->page}}</p>
                        <br/>
                        <h2 style="display: inline-block">Açıklama:</h2>
                        <p style="white-space: pre-wrap;">{{$book->explanation}}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

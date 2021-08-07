@extends('layouts.main')

@section("title","| Profil")

@section("menu-profile","current")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>Profil</span></h3>
            <ul style="float: right;list-style-type: none;text-align: center;">
                <li>
                    <a href="{{route('book.upload')}}" class="benimbuton">Kitap Yükle</a>
                </li>
                <li>
                    <a href="{{route('profile.edit')}}" class="benimbuton">Profili Düzenle</a>
                </li>
            </ul>

            <div>
                <table>
                    <tr>
                        <td>Ad:</td>
                        <td><h4>{{Auth::user()->name}}</h4></td>
                    </tr>
                    <tr>
                        <td>E-Mail:</td>
                        <td><h4>{{Auth::user()->email}}</h4></td>
                    </tr>
                    <tr>
                        <td>Telefon:</td>
                        <td>
                            <h4>
                                @if(empty(Auth::user()->phone))
                                    <span style="color: darkred;font-size: 13px;">Girilmedi!</span>
                                @else
                                    {{Auth::user()->phone}}
                                @endif
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td>Adres:</td>
                        <td>
                            <h4>
                                @if(empty(Auth::user()->address))
                                    <span style="color: darkred;font-size: 13px;">Girilmedi!</span>
                                @else
                                    {{Auth::user()->address}}
                                @endif
                            </h4>
                        </td>
                    </tr>
                    @if(empty(Auth::user()->phone) || empty(Auth::user()->address))
                        <td colspan="2" style="color: darkred">
                            Uyarı: Telefon ve Adres girilmeden kitap talebinde bulunamazsınız!
                        </td>
                    @endif
                </table>
                <hr style="color: #f5ddaf;">
                <h4>Kitaplarım:</h4>
                <table class="kitap-tablo">
                    <thead>
                    <tr>
                        <th>Kitap Adı</th>
                        <th>Yazar</th>
                        <th>Sayfa Sayısı</th>
                        <th>Basım Yılı</th>
                        <th>Durum</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($myBooks as $myBook)
                        <tr>
                            <td><a href="/kitap/{{$myBook->id}}" class="forum-nick"><b>{{$myBook->name}}</b></a></td>
                            <td>{{$myBook->author}}</td>
                            <td>{{$myBook->page}}</td>
                            <td>{{App\Book::turkce_tarih("d M, y",$myBook->year)}}</td>
                            <td>@if($myBook->active) Yayında @else Verildi @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br/>
                <h4>Talep Ettiğim Kitaplar:</h4>
                <table class="kitap-tablo">
                    <thead>

                    <tr>
                        <th>Kitap Adı</th>
                        <th>Yazar</th>
                        <th>Sayfa Sayısı</th>
                        <th>Basım Yılı</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($myBookRequests as $myBookRequest)
                        <tr>
                            <td>
                                <a href="/kitap/{{$myBookRequest->getBook->id}}" class="forum-nick">
                                    <b>
                                        {{$myBookRequest->getBook->name}}
                                    </b>
                                </a>
                            </td>
                            <td>{{$myBookRequest->getBook->author}}</td>
                            <td>{{$myBookRequest->getBook->page}}</td>
                            <td>{{App\Book::turkce_tarih("d M, y",$myBookRequest->getBook->year)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

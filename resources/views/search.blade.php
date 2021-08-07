@extends('layouts.main')

@section("title","| Arama")

@section("menu-search","current")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>Kitap Ara</span></h3>
            <div>
                <form action="/kitap-ara/" method="post" onsubmit="return arama()">
                    <table>
                        <tr>
                            <td><input id="book-text" type="text" name="text" placeholder="Kitap adı, yazar"
                                       style="width: 200px;font-size: 19px;padding: 5px;border-radius: 5px;
                                    font-family: 'Comic Sans MS',serif" maxlength="50" required></td>
                            <td>
                                <button class="benimbuton" type="submit" style="width: 100px;">Ara</button>
                            </td>
                        </tr>
                    </table>
                    <script type="text/javascript">
                        function arama() {
                            window.location = "/kitap-ara/" + document.getElementById("book-text").value;
                            return false;
                        }
                    </script>
                </form>
                <br/>
                <p>
                    <b>
                        @if($search)
                            Arama: {{$text}}, Sayfa: {{$sayfa+1}}, Toplam: {{$toplam}}
                        @else
                            Son Eklenen Kitaplar
                        @endif
                    </b>
                </p>
                <br/>
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
                                <div><a href="#">Kitabı Gör</a></div>
                            </li>
                        @endif
                    </ul>
                @endfor
                @if($search)
                    <div id="paging"><a href="{{$geriLink}}" class="prev">Geri</a> <a href="{{$ileriLink}}"
                                                                                      class="next">İleri</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section("title","| Forum")

@section("menu-forum","current")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>Forum</span></h3>
            @if(Auth::check())
                <div style="display: inline-block;width: auto;padding-top: 0;float:right;">
                    <form method="post" action="{{route('forum.post')}}">
                        @csrf
                        <input name="baslik" placeholder="Forum başlığı.."
                               style="width: 250px;font-size: 19px;padding: 5px;border: 1px solid #C2B6A8;
                               border-radius: 5px;font-family: 'Comic Sans MS',serif" maxlength="100" required/>
                        <button type="submit" class="benimbuton" style="width: auto;font-size: 20px;">Forum Oluştur
                        </button>
                    </form>
                </div>
            @endif
            <div id="blog">
                <form action="/forum-ara/" method="post" onsubmit="return arama()">
                    <table>
                        <tr>
                            <td><input id="book-text" type="text" name="text" placeholder="Forum başlığı"
                                       style="width: 200px;font-size: 19px;padding: 5px;border-radius: 5px;
                                    font-family: 'Comic Sans MS',serif" maxlength="50" required></td>
                            <td>
                                <button class="benimbuton" type="submit" style="width: 100px;">Ara</button>
                            </td>
                        </tr>
                    </table>
                    <script type="text/javascript">
                        function arama() {
                            window.location = "/forum-ara/" + document.getElementById("book-text").value;
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
                            Son Oluşturulan Forumlar
                        @endif
                    </b>
                </p>
                <br/>
                <div>
                    <ul class="sidebar" style="width: 610px;float: left;">
                        @foreach($forums as $forum)
                            <li>
                                <h4 style="font-size: 21px;padding: 20px 0 0;">
                                    <a class="forum-nick" href="/forum/{{$forum->id}}" style="color: #133e73;">
                                        {{$forum->title}}
                                    </a>
                                </h4>
                                <br/>
                                <div>
                                    {{\App\Book::turkce_tarih("d M, y",$forum->updated_at)}} |
                                    Toplam {{$forum->getComments->count()}} yorum
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div id="paging"><a href="#" class="prev">Geri</a> <a href="#" class="next">İleri</a></div>
                </div>
                <ul class="sidebar">
                    @foreach($lastForums as $lastForum)
                        <li>
                            <h6 style="color: #133e73">
                                <a class="forum-nick" href="/forum/{{$lastForum->id}}" style="color: #133e73;">
                                    {{$lastForum->title}}
                                </a>
                            </h6>
                            <br/>
                            @if($lastForum->getComments->count() != 0)
                                <h6>{{$lastForum->getComments[0]->getUser->name}}</h6>
                                <p>{{substr($lastForum->getComments[0]->comment,0,200)."..."}}</p>
                                <div><a href="#">{{\App\Book::turkce_tarih("d M, y",$lastForum->updated_at)}}</a>
                                    <span class="separator">|</span>
                                    <a href="#">Toplam {{$lastForum->getComments->count()}} yorum</a></div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

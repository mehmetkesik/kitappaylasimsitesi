@extends('layouts.main')

@section("title","| Forum")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>Forum</span></h3>
            @if(Auth::check())
                <div style="display: inline-block;width: 75%;padding-top: 0;margin-left: 50px;">
                    @if($errors)
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                    <form action="{{route('forum.comment.post')}}" method="post">
                        @csrf
                        <input type="hidden" name="forum_id" value="{{$forum->id}}">
                        <textarea name="yorum" rows="5" cols="75" maxlength="1000"
                                  placeholder="Foruma yorum girin.." style="border-radius: 10px;padding: 5px;
                                resize: none;border: 1px solid #7A6B4E;" required></textarea>
                        <br/>
                        <input class="benimbuton" type="submit" value="Gönder" style="width: auto;font-size: 17px;"/>
                    </form>
                </div>
            @endif
            <div id="blog">
                <div>
                    <h4 style="font-size: 21px;">{{$forum->title}}</h4>
                    <br/>
                    <div>{{\App\Book::turkce_tarih("d M, y",$forum->updated_at)}},
                        Sayfa: {{$sayfa+1}}, Toplam: {{$toplam}}</div>
                    <br/><br/>
                    <ul class="sidebar" style="width: 610px;float: left;">
                        @foreach($comments as $comment)
                            <li>
                                <h6>{{$comment->getUser->name}}</h6>
                                <p>{{$comment->comment}}</p>
                                <div>{{\App\Book::turkce_tarih("d M, y",$comment->updated_at)}}</div>
                            </li>
                        @endforeach
                    </ul>
                    <div id="paging"><a href="{{$geriLink}}" class="prev">Geri</a>
                        <a href="{{$ileriLink}}" class="next">İleri</a></div>
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

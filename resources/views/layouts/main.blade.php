<!DOCTYPE html>
<html>
<head>
    <title>Kitap Paylaşım Flatformu @yield("title")</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/style.css')}}">
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="{{asset('styles/ie6.css')}}"><![endif]-->
    <style type="text/css">
        .auth-link {
            text-decoration: none;
            color: #5a534d;
            font-weight: bold;
            font-size: 17px;
            margin-left: 10px;
        }

        .auth-link:hover {
            color: #02327c;
        }

        .book-img {
            width: 188px;
            height: 188px;
        }

        .forum-nick {
            color: #7A6B4E;
            text-decoration: none;
        }

        .forum-nick:hover {
            text-decoration: underline;
        }

        .benimbuton {
            display: inline-block;
            padding: 7px 22px;
            border: 0.1em solid #FFFFFF;
            margin: 0.2em 0.3em 0.3em 0;
            border-radius: 5px;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            font-size: 20px;
            color: #FFFFFF;
            background-color: #1b1e21;
            text-align: center;
            transition: all 0.2s;
            cursor: pointer;
            width: 180px;
        }

        .benimbuton:hover {
            color: #000000;
            background-color: #FFFFFF;
            border: 0.1em solid #000000;
        }

        .profilbuton {
            background: url(../images/bg-inner-page-heading.gif) repeat-x;
            display: inline-block;
            padding: 7px 22px;
            border: 0.1em solid #FFFFFF;
            margin: 0.2em 0.3em 0.3em 0;
            border-radius: 5px;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            font-size: 17px;
            color: #FFFFFF;
            text-align: center;
            transition: all 0.2s;
            cursor: pointer;
        }

        .profilbuton:hover {
            font-size: 19px;
        }

        .kitap-tablo {
            border-collapse: collapse;
            width: 930px;
            table-layout: fixed;
        }

        .kitap-tablo tr td {
            border: 1px solid #a2854d;
            text-align: center;
            word-wrap: break-word;
        }

        .kitap-tablo th {
            border: 1px solid #a2854d;
            word-wrap: break-word;
        }

        .dy-input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .dy-label {
            margin: 5px 0 0 20px;
            padding: 0 5px 0 5px;
            font-size: 16px;
            width: auto;
            height: auto;
        }

        .talepkar {
            position: absolute;
            height: auto;
            padding: 10px !important;
            left: 850px;
            width: 250px !important;
            border: 1px solid #7A6B4E;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div id="header">
    <div style="float: right;margin-right: 50px;">
        @if(Auth::check())
            <a class="auth-link" href="{{route("profile")}}">Profil</a>
            <a class="auth-link" href="{{route("logout")}}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Çıkış</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a class="auth-link" href="{{route("login")}}">Giriş</a>
            <a class="auth-link" href="{{route("register")}}">Üye Ol</a>
        @endif
    </div>
    <div class="section"><span id="ribbon"></span> <span id="button"></span>
        <div>
            <div id="logo"><a href="{{route('index')}}"><img src="{{asset('images/logo2.gif')}}" alt=""></a></div>
            <div id="navigation">
                <ul class="primary">
                    <li class="@yield('menu-index')"><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="@yield('menu-search')"><a href="{{route('search')}}">Kitap Ara</a></li>
                    <li class="@yield('menu-forum')"><a href="{{route('forum.search')}}">Forum</a></li>
                    <li class="@yield('menu-about')"><a href="{{route('about')}}">Hakkımızda</a></li>
                    <li class="@yield('menu-contact')"><a href="{{route('contact')}}">İletişim</a></li>
                </ul>
                <ul class="secondary">
                    <li class="@yield('menu-new_added')"><a href="{{route('new_added')}}">Yeni Eklenenler</a></li>
                    <li class="@yield('menu-most_loved')"><a href="{{route('most_loved')}}">En Sevilenler</a></li>
                    <li class="@yield('menu-much_read')"><a href="{{route('much_read')}}">Çok Okunanlar</a></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('entry')

</div>
<div id="content">
    @yield("content")
</div>
<div id="footer">
    @include("inc.footer")
</div>
</body>
</html>

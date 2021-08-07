@extends('layouts.main')

@section("title","| Profil")

@section("menu-profile","current")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>Profili Düzenle</span></h3>
            <a href="{{route('profile')}}" class="benimbuton" style="float: right;width: 120px;">Profil</a>
            <div>
                <table>
                    <tr>
                        <td style="font-weight: bold;font-size: 18px;">Profili Düzenle</td>
                        <td style="font-weight: bold;font-size: 18px;">Şifre Değiştir</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 50px;">
                            <form action="{{route('profile.edit.post')}}" method="post">
                                @csrf
                                <table>
                                    @if($errors)
                                        @foreach($errors->profileErrors->all() as $error)
                                            <tr>
                                                <td colspan="2" style="color: darkred;">** {{$error}} **</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if(session()->has('profileMessage'))
                                        <tr>
                                            <td colspan="2" style="color: darkgreen;">
                                                ** {{session()->get('profileMessage')}} **
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Ad</td>
                                        <td><input type="text" name="ad" maxlength="50"
                                                   value="{{Auth::user()->name}}" required></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="email" name="email" maxlength="100"
                                                   value="{{Auth::user()->email}}" required></td>
                                    </tr>
                                    <tr>
                                        <td>Telefon</td>
                                        <td><input type="tel" name="telefon" maxlength="10"
                                                   value="{{Auth::user()->phone}}"></td>
                                    </tr>
                                    <tr>
                                        <td>Adres</td>
                                        <td><input type="text" name="adres" maxlength="255"
                                                   value="{{Auth::user()->address}}"></td>
                                    </tr>
                                </table>
                                <p>
                                    <input class="benimbuton" style="width: 120px;" type="submit" value="Kaydet">
                                </p>
                            </form>
                        </td>
                        <td>
                            <form action="{{route("password.edit.post")}}" method="post">
                                @csrf
                                <table>
                                    @if($errors)
                                        @foreach($errors->passwordErrors->all() as $error)
                                            <tr>
                                                <td colspan="2" style="color: darkred;">** {{$error}} **</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if(session()->has('passwordMessage'))
                                        <tr>
                                            <td colspan="2" style="color: darkgreen;">
                                                ** {{session()->get('passwordMessage')}} **
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Yeni Şifre</td>
                                        <td><input type="password" name="sifre" max="50" required></td>
                                    </tr>
                                    <tr>
                                        <td>Yeni Şifreyi Onayla</td>
                                        <td><input type="password" name="sifre_confirmation" max="50" required></td>
                                    </tr>
                                    <tr style="visibility: hidden">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                        <tr style="visibility: hidden">
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                </table>
                                <p>
                                    <input class="benimbuton" style="width: 120px;" type="submit" value="Kaydet">
                                </p>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

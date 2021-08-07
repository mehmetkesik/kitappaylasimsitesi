@extends('layouts.main')

@section("title","| Kitap Yükle")

@section("content")
    <div><span class="background"></span>
        <div class="section">
            <h3><span>Kitap Yükle</span></h3>
            <div>
                <form action="{{route('book.upload.post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td style="font-weight: bold;font-size: 18px;">Kitap Bilgileri</td>
                            <td style="font-size: 18px;">Açıklama</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 10px;">

                                <table>
                                    @if($errors)
                                        @foreach($errors->all() as $error)
                                            <tr>
                                                <td colspan="2" style="color: darkred;">** {{$error}} **</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if(session()->has('message'))
                                        <tr>
                                            <td colspan="2" style="color: darkgreen;">
                                                ** {{session()->get('message')}} **
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Ad*</td>
                                        <td><input type="text" name="ad" maxlength="100" placeholder="Kitabın adı"
                                                   required></td>
                                    </tr>
                                    <tr>
                                        <td>Yazar*</td>
                                        <td>
                                            <input type="text" name="yazar" maxlength="100" placeholder="Yazarın adı"
                                                   required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sayfa Sayısı</td>
                                        <td>
                                            <input type="text" name="sayfa_sayisi" maxlength="5"
                                                   placeholder="Sayfa sayısı">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Baskı Yılı</td>
                                        <td>
                                            <input type="date" name="basim_yili">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kapak Resmi*</td>
                                        <td>
                                            <input id="dy-input" class="dy-input" type="file"
                                                   name="kapak_resmi" accept="image/*" required>
                                            <label for="dy-input" class="benimbuton dy-label">Resim Seç</label>
                                            <strong><span id="dy-span"></span></strong>
                                            <script type="text/javascript">
                                                let input = document.getElementById("dy-input");
                                                input.addEventListener("change", function (e) {
                                                    document.getElementById("dy-span").innerHTML =
                                                        e.target.value.split('\\').pop();
                                                });
                                            </script>
                                        </td>
                                    </tr>
                                </table>
                                <p style="margin-top: 15px;">
                                    <button class="benimbuton" style="width: 100px;" type="submit">Yükle</button>
                                </p>
                            </td>
                            <td>
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
                                        <td>
                                            <textarea rows="17" cols="55" name="aciklama"
                                                      placeholder="Kitap hakkında açıklama, arka kapak yazısı vs.."
                                                      maxlength="1000"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection

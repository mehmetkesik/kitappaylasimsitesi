@extends('layouts.main')
{{-- en yeniler - en sevilenler(en çok alınanlar) - en çok okunanlar(en çok yüklenenler) --}}
@section('entry')
    <span id="tagline"></span>
    <div id="featured">
        <ul>
            <li class="first">
                <h2><a href="#">1. Yeni Eklenenler</a></h2>
                <div><span></span><a href="#"><img src="images/themes.jpg" alt=""></a></div>
                <a href="{{route('new_added')}}" class="view"><span>Yeni Eklenenleri Gör...</span></a></li>
            <li>
                <h2><a href="#">2. En Sevilenler</a></h2>
                <div><span></span><a href="#"><img src="images/accessories.jpg" alt=""></a></div>
                <a href="{{route('most_loved')}}" class="view"><span>En Sevilenleri Gör...</span></a></li>
            <li>
                <h2><a href="#">3. Çok Okunanlar</a></h2>
                <div><span></span><a href="#"><img src="images/print.jpg" alt=""></a></div>
                <a href="{{route('much_read')}}" class="view"><span>Çok Okunanları Gör...</span></a></li>
        </ul>
    </div>
@endsection

@section("menu-index","current")

@section("content")
    <div><span class="background"></span>
        <div id="section">
            <div id="article">
                <h4>Hakkımızda Bilgi Sahibi Olun</h4>
                <ul>
                    <li class="first">
                        <h2>Herkes İçin Ücretsiz Kitaplarımız Var.</h2>
                        <p>Paylaşmayı seven kitap severlerin okudukları kitaplarını paylaştıkları bir platform düşünün..
                            Üstelik bu paylaşım tamamen ücretsiz. Sizde istediğiniz kitabı bulup okuyabilir
                            ardından ihtiyacı olan birisine ulaştırabilirsiniz.</p>
                    </li>
                    <li>
                        <h2>Topluluğumuzun Bir Parçası Olun.</h2>
                        <p>Kitap paylaşım platformu hakkında sorunlar ve endişeler yaşıyorsanız forumumuzdaki tartışmaya
                            katılın ve topluluk içinde sizinle aynı ilgi alanlarını paylaşan diğer insanlarla tanışın.</p>
                    </li>
                    <li>
                        <h2>Kitap Paylaşım Platformunun Detayları.</h2>
                        <p>Paylaşmayı seven insanlar kitaplarını rafa koymak yerine platformumuza yüklerler.</p>
                        <p>Paylaşılan kitabı okumak isteyen kitapseverler kitabı almak istediklerini bildirirler.</p>
                        <p>Kitabı paylaşan kişi almak isteyen kişiye kitabı kargo yardımıyla karşı ödemeli olarak gönderir.</p>
                        <p>Kitabı almak isteyen kişi sadece kargo ücreti karşılığında kitabın sahibi olur.</p>
                        <p>Onlar erer muradına biz çıkalım kerevetine :)).</p>
                    </li>
                </ul>
            </div>

            <div id="contact">
                <h4>Temasta Ol</h4>
                @include("inc.contact_content")
            </div>
        </div>
    </div>
@endsection

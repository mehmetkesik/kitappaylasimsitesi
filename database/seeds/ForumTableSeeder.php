<?php

use Illuminate\Database\Seeder;
use App\Forum;
use App\ForumComment;

class ForumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forums = ["Da Vinci Şifresi", "Karamazov Kardeşler", "Saatleri Ayarlama Enstitüsü", "Tutunamayanlar"];
        $forumIds = [];

        $i = 1;
        foreach ($forums as $f) {
            $forum = new Forum;
            $forum->user_id = $i;
            $forum->title = $f;
            $forum->save();

            array_push($forumIds, $forum->id);
            $i++;
        }

        //Da Vinci Şifresi yorumları
        $da_vinci_sifresi_comments = ["türkiyede da vinci şifresi adıyla yayınlanan ve petek demir tarafından çevirisi
        yapılan dan brown un gerilim romanı.",
            "dan brown tarafından yazılan daha sonra filmi de çekilen macera ve polisiye romanı. kitabın en büyük
            özelliği okurda yarattığı merak duygusu. bu merak duygusu kitabın okunmasını sağlayan en önemli faktör.
            şahsen bunun dışında kitabın çok üst seviyede bir edebi değerinin olduğunu düşünmüyorum.
            (cümlem yanlış anlaşılmasın edebi değeri yok demiyorum) onun dışında kitabın sonu beni pek tatmin etmedi.",
            "Dan Brown'ın okuduğum 2. Romanı. Daha önce Başlangıç'ı okumuş çok beğenmiştim. Bu da çok akıcı ve güzel
            bir kurguyla yazılmış bir eser olmuş.",
            "Spoiler icerir..her sayfasinda action ve gerilimin gitgide arttigi ve en sonunda mukemmel bir
            patlamayla sizi dumura ogreten bir efsane.kesinlikle filminden once kitabini okumalasiniz.cunku
            kitap filme bin basar.",
            "Kurgusu, olay döngüsü, anlatım tarzı, dili ve işleyişi kesinlikle çok başarılı bir kitap.
            Bu kadar iç içe olaylar dizgisini kurgulayabilmek, her şeyin yerli yerinde olması ve okurun
            merakını her an diri tutup okuduğundan zevk alması gerçekten büyük bir zeka gerektiriyor.
            Yazarın bu zekaya fazlasıyla sahip olduğu kanaatindeyim. Kitabı tavsiye ederim. İyi okumalar."];

        for ($i = 0; $i < 5; $i++) {
            $forumComment = new ForumComment;
            $forumComment->user_id = $i + 1;
            $forumComment->forum_id = 1;
            $forumComment->comment = $da_vinci_sifresi_comments[$i];
            $forumComment->save();
        }

        //Karamazov Kardeşler yorumları
        $karamazov_kardesler_comments = ["dilimizde, birbirinden beter bir suru cevirisi olan, mustesna eser.
        nedense kendimi hep alyosa'ya yakin hissetmisimdir! ",
            "şuan okuduğum kitap kalınlığı ile göz korkutmasına rağmen beni korkularımın üstüne gitmeye güden duygu
            ile ilk sırama aldigim kitap okumak için. ",
            "kitabı bitirip kenara koyarken, kitabın adına atıfla \"yaramazov kardeşler\" demiştim, türkçeye bu
            isimle çevrilmiş olsa daha bir anlamlı olacağını düşünmüştüm.",
            "hayatımda okuduğum en iyi roman diyebilirim.insan psikolojisini bu kadar iyi yansıtan,edebi dili bu kadar
            doyurucu olan başka bir roman okuduğumu hatırlamıyorum.romanda mutlaka kendinizden bir parça bulursunuz,
            dinine bağlı,iyi kalpli,geleneksel bizim değimimizle şakirt alyosa,gururlu,babasından nefret eden dimitri,
            inançları olmayan,çelişkili ivan,asil,gururlu ve güzel katerina.romanın birinci cildi ikinci cildine oranla
            daha sıkıcı.zoisima'nın olduğu bölümlerde bayılacak gibi olmuştum ama romanın dilinin ağır olmasına ve
            karakterlerin birden fazla ismine rağmen akıcıydı.ha 1 ayda bitirdim orası ayrı konu ama her okuduğunuzda
            farklı anlamlar çıkarıyorsunuz.kesinlikle tek okumayla kalınmaması gerek.şu sınavlar bitsin ikinci kez
            okumayı düşünüyorum.illuşeçka'nın olduğu bölümlerde -hele babasıyla konuştukları bölüm-resmen ağladım
            amk ve çok zor ağlayan bir tip olmama rağmen.ama sonunda ıvan'a ne olduğunu çok merak ediyorum onunla
            ilgili kesin bir bilgi yok,keşke iyileşip katerina'yla evlenselerdi."];

        for ($i = 0; $i < 4; $i++) {
            $forumComment = new ForumComment;
            $forumComment->user_id = $i + 1;
            $forumComment->forum_id = 2;
            $forumComment->comment = $karamazov_kardesler_comments[$i];
            $forumComment->save();
        }

        //Saatleri Ayarlama Enstitüsü yorumları
        $saatleri_ayarlama_enstitusu_comments = ["ahmet hamdi tanpinar'in romani.",
            "s.a.e, şunun ispatıdır bence: şarkla garp arasında milletçe yaşadığımız tereddüt o kadar ezeli,
            o kadar trajiktir ki, arada kalıp neticede delirmemek için tek bir çıkış yolu görünür bize: o çıkış da
            mizahtır. ironidir. inceliktir. yaşadığımız çelişkiler bir membadır bu manada, bir mizah madenidir.",
            "'saatin kendisi mekan , yürüyüşü zaman , ayarı insandır..'",
            "okunması zor kitaplar arasında sayıldığı için başlamakta tereddüt ettiğim ama okuduktan sonra bitmesine
            üzüldüğüm ahmet hamdi tanpınar’ın harikulade eseri.

            hayata dair çok güzel tespitler var. etkilenmemek elde değil. ayrıca dili o kadar hoşuma gitti ki, bu
            kitabı başka dillerdeki çevirisiyle okuyacak olanlara üzüldüm. çünkü türkçe okumanın verdiği lezzeti
            alamayacaklardır. ",
            "bir hocamın tavsiyesinden beş yıl sonra okuyabilmiştim bu şaheseri, zihnimde yer edemediği yıllar için
            hayıflanıyorum hala. her kitaplıkta olması gereken , her gence okutulması gereken bu topraklardan çıkmış
            en iyi romanlardan."];

        for ($i = 0; $i < 5; $i++) {
            $forumComment = new ForumComment;
            $forumComment->user_id = $i + 1;
            $forumComment->forum_id = 3;
            $forumComment->comment = $saatleri_ayarlama_enstitusu_comments[$i];
            $forumComment->save();
        }

        //Tutunamayanlar yorumları
        $tutunamayanlar_comments = ["turkçe'de yazilmiş en iyi romanlardan biri. ama etrafta \"biz kaybedeniz abi\",
        \"hepimiz disconnectus erectuslardan geliyoruz\" vb. diyerek dolaşan ve paçalarindan samimiyetsizlik akan
        insanlar görmek iyi hisler uyandirmiyor adamda, o da baska bir mesele..",
            "inanılmaz bir kitap. söylicek o kadar çok şey varki hiç bişey yok. ",
            "her gün şehirler arası yol alırken adım adım bitirmeye yaklaştığım kitap. ben storytel uygulamasından
            dinliyorum yolculukta aynı zamanda şoför olarak da görev aldığım için. ama nedense korkuyorum,
            sanki tutunamayanlara başlayan herkes bitiremeden ölüyor ve ben de bitmesine 1 sayfa 1 dakika belki de
            10 saniye kala bir kazada öleceğim. daha önce basılı halini ve e kitap halini en az 3 kez okumaya çalışmış
            bırakmıştım. yaş ve yaşananlar da etkili sanırım bir yerde, sonuçta 18 yaş okumaları ile selimciğimin
            öldüğü yaşım olan 28 yaş okuması aynı olmaz. ben hayatımda iz bırakan bir kitap olduğunu şimdiden
            söyleyebilirim, oğuz atay eminim çok keyif alarak yazmıştır hatta ara ara kahkaha atmamaya çalışarak
            yazmış, öyle hissettiriyor. opus magnus gibi opus magnus..."];

        for ($i = 0; $i < 3; $i++) {
            $forumComment = new ForumComment;
            $forumComment->user_id = $i + 1;
            $forumComment->forum_id = 4;
            $forumComment->comment = $tutunamayanlar_comments[$i];
            $forumComment->save();
        }

    }
}

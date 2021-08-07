<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Book;
use App\BookRequest;
use Illuminate\Support\Facades\Hash;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ["name" => "1984", "author" => "George Orwell", "image" => "1984.jpg", "page" => 328,
                "year" => new DateTime("08-06-1949"), "explanation" => "George Orwell’ın “Hayvan Çiftliği” romanından
            sonra kaleme aldığı “1984” romanı 20. yüzyılın en etkileyici distopyalarından sayılır.
            1947-1948 yıllarında yazılan roman 1984 yıllarındaki hayali bir dünyayı konu alır.
            1984 yılını anlatan romanda bu yıllar hiçte iç açıcı anlatılmaz. Özgürlüğün olmadığı,
            yaşam kalitesinin diplerde olduğu ve buna rağmen bu durumların eskisinden çok daha iyi
            olduğuna inandırıldığı bir dünya mevcuttur."],
            ["name" => "Da Vinci Şifresi", "author" => "Dan Brown", "image" => "da-vinci-sifresi.jpg", "page" => 528,
                "year" => new DateTime("01-01-2003"), "explanation" => "Harvard Üniversitesi Simge-Bilim Profesörü
                Robert Langdon, Paris'te iş gezisindeyken, gece yarısı, Louvre'un yaşlı müdürünün ölü bulunduğu
                haberini alır. Langdon ve yetenekli Fransız kriptoloji uzmanı Sophie Neveu, cesedin etrafındaki
                izleri takip ederek bu garip esrar perdesini araladıkça, ipuçlarının onları Da Vinci'nin tablosuna
                götürdüğünü keşfederler. Büyük usta bu sırrı herkesin görebileceği bir yere, ünlü eseri Mona Lisa
                tablosunun içine gizlemiştir.
                Langdon bu garip bağlantıyı açığa çıkarınca tehlike artar. Cinayete kurban giden müze müdürü de,
                Sir Isaac Newton, Botticelli, Victor Hugo, Da Vinci ve aralarında diğer ünlülerin de bulunduğu gizli
                bir kuruluş olan Sion Manastırı Derneği'nin bir üyesidir.
                Langdon, aydınlatmaya çalıştıkları bu tehlikeli sırrın yüz yıllardır tarihin derinliklerinde
                gizlendiğinden şüphelenir. Böylece Paris ve Londra sokaklarında amansız bir kovalamaca başlar.
                Langdon ve Neveu, kendilerini, atacakları her adımı önceden bilen esrarengiz olduğu kadar da
                çok zeki olan bir adamla karşı karşıya bulurlar. Eğer bu karmaşık bilmeceyi çözemezlerse Priory'nin
                büyük yankılar uyandıracak bu çok eski gerçeği ebediyen kaybolacaktır."],
            ["name" => "Karamazov Kardeşler", "author" => "Fyodor Dostoyevski", "image" => "karamazov-kardesler.jpg",
                "page" => 840, "year" => new DateTime("01-11-1880"),
                "explanation" => "Dostoyevski, yaşamının son yıllarında başyapıtı Karamazov Kardeşler'i
                tamamladığında, Rus yazınında 'felsefe düzeyinde roman-tragedya denen türün de temelini
                attığının bilincinde değildi. Dostoyevski'nin yaşam birikiminin tümünü ve sanat gücünün
                doruğunu içeren bu roman, gerçekte insanı insan yapan ne varsa, onlara adanmış bir destan
                niteliğini taşır. Yazar, hiçbir romanında \"Karamazov Kardeşler\"de olduğu denli insan ruhuna
                inmemiş, insanoğlunu bu denli kesitler biçiminde, içgüdülerinin ve istencinin tüm görünümüyle
                sergilenmiştir. Bir aileyi konu alan ve bir felaketler zinciri olarak gelişen olay örgüsü,
                bireysel öğelerin yanı sıra, ondokuzuncu yüzyılın ikinci yarısındaki Rus toplumunu da geçirdiği
                sarsıntıların tümüyle, dünya edebiyatında bir eşi daha bulunmayan bir sanat aynasından yansıtır."],
            ["name" => "Tutunamayanlar", "author" => "Oğuz Atay", "image" => "tutunamayanlar.jpg",
                "page" => 724, "year" => new DateTime("01-01-1972"),
                "explanation" => "Selim Işık'ın intihar ettiğini öğrenen Turgut Özben, ihmal ettiğini düşündüğü
                arkadaşının geçmişinin izini sürmeye ve Selim'in tanıdığı insanlar aracılığıyla onu tanımaya çalışır.
                Her insana farklı bir yönünü gösteren Selim'in görüntüsü, Turgut'un bu insanlarla konuşması sonucu
                okuyucunun ve Turgut'un gözünde netlik kazanacaktır. Romanda bir çok kişi vardır ama her biri aslında
                Selim'in hayatındaki kişilerdir ve tüm anlatılanlar Selim Işık'ı aydınlatır. Selim Işık \"düşünen ve
                sorgulayan insan\"ın simgesidir ve bu yüzden \"tutunamamış\"tır."],
            ["name" => "Saatleri Ayarlama Enstitüsü", "author" => "Ahmet Hamdi Tanpınar",
                "image" => "saatleri-ayarlama-enstitusu.jpg",
                "page" => 400, "year" => new DateTime("01-01-1954"),
                "explanation" => "Saatleri Ayarlama Enstitüsü’nün olay örgüsü, fakir bir ailede büyüyen ve saatlere
                büyük bir ilgi duyan Hayri İrdal adlı genç bir adamın çevresinde şekilleniyor. Kalabalık bir şahıs
                kadrosuna sahip olan romanda, başkahraman Hayri İrdal’dan sonra en baskın karakteri ise Halit Ayarcı
                oluşturuyor. Öyle ki başkahraman da kendi yaşamını, Halit Ayarcı ile tanışmadan öncesi ve sonrası
                olmak üzere iki farklı şekilde değerlendiriyor.
                “Büyük Ümitler”, “Küçük Hakikatler”, “Sabaha Doğru” ve “Her Mevsimin Bir Sonu Vardır” adlı dört
                bölümden oluşan romanın ilk kısmında Hayri İrdal, çocukluğundan başlayarak yaşamını ayrıntılı bir
                şekilde okurla paylaşıyor. Halit Ayarcı ile eserin ikinci bölümünde tanışan başkahraman, sonrasında
                onunla birlikte Saatleri Ayarlama Enstitüsü’nün temellerini atıyor. Eserin son bölümünde ise enstitünün
                beklenmedik akıbeti, o dönemden günümüze devam eden sorunların bir habercisi olarak okurlarını
                düşünmeye sevk ediyor. "],
            ["name" => "Aylak Adam", "author" => "Yusuf Atılgan", "image" => "aylak-adam.jpg",
                "page" => 156, "year" => new DateTime("01-01-1959"),
                "explanation" => "Aylak Adam, Türk yazar Yusuf Atılgan'ın 1959'da yayımlanan ilk romanıdır.
                \"Kış\", \"ilkyaz\", \"yaz\" ve \"güz\" olmak üzere dört \"mevsim\" başlığından oluşan
                eserde mevsimlerden kış, ilkyaz ve yaz kendi içlerinde yedi bölüme ayrılırken güz mevsimi
                dört bölüme ayrılmaktadır. 28 yaşlarında, içerisinde hizmetçilerin olduğu evde çocukluğunun
                geçtiği söylenen, kumar düşkünü babaya sahip bir roman karakteri olan C.'nin hayatına anlam
                verecek değeri arama çabası romanda anlatılmaktadır."],
        ];

        $i = 0;
        $j = 3;
        foreach ($books as $book) {
            $b = new Book;
            $b->user_id = ($i % 2) + 1;
            $b->name = $book["name"];
            $b->author = $book["author"];
            $b->image = $book["image"];
            $b->page = $book["page"];
            $b->year = $book["year"];
            $b->explanation = preg_replace('!\s+!', ' ', $book["explanation"]);
            $b->active = false;
            $b->save();

            $br = new BookRequest;
            $br->user_id = $j;
            $br->book_id = $b->id;
            $br->save();

            $i++;
            $j++;
            if ($j == 6) {
                $j = 3;
            }
        }
    }
}

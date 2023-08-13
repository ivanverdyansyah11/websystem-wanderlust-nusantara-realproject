<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chef;
use App\Models\City;
use App\Models\CityTranslation;
use App\Models\Destination;
use App\Models\DestinationTranslation;
use App\Models\Feedback;
use App\Models\FeedbackTranslation;
use App\Models\Gallery;
use App\Models\History;
use App\Models\Location;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        City::create([
            'name' => 'Semarapura',
            'image' => 'city-images/semarapura-thumbnail.jpg',
            'history_1' => 'Semarakura dulunya adalah ibu kota kerajaan Klungkung yang kuat, yang mencapai puncaknya di abad ke -17.Kerajaan itu diperintah oleh keluarga kerajaan Klungkung, yang dikenal sebagai Dewa Agung, yang memiliki pengaruh besar atas pulau itu.',
            'history_2' => "Salah satu peristiwa paling terkenal dalam sejarah Semarapura adalah Pertempuran Klungkung, juga dikenal sebagai Puputan Klungkung, yang terjadi pada tahun 1908. Menghadapi pasukan kolonial Belanda, keluarga kerajaan dan pengikut mereka yang setia memilih untuk berjuang sampai mati daripada menyerah.Puputan dianggap sebagai pendirian terakhir yang heroik dan simbol perlawanan terhadap pemerintahan kolonial.",
        ]);

        CityTranslation::create([
            'cities_id' => '1',
            'language' => 'id',
            'name' => 'Semarapura',
            'image' => 'city-images/semarapura-thumbnail.jpg',
            'history_1' => 'Semarakura dulunya adalah ibu kota kerajaan Klungkung yang kuat, yang mencapai puncaknya di abad ke -17.Kerajaan itu diperintah oleh keluarga kerajaan Klungkung, yang dikenal sebagai Dewa Agung, yang memiliki pengaruh besar atas pulau itu.',
            'history_2' => "Salah satu peristiwa paling terkenal dalam sejarah Semarapura adalah Pertempuran Klungkung, juga dikenal sebagai Puputan Klungkung, yang terjadi pada tahun 1908. Menghadapi pasukan kolonial Belanda, keluarga kerajaan dan pengikut mereka yang setia memilih untuk berjuang sampai mati daripada menyerah.Puputan dianggap sebagai pendirian terakhir yang heroik dan simbol perlawanan terhadap pemerintahan kolonial.",
        ]);

        CityTranslation::create([
            'cities_id' => '1',
            'language' => 'en',
            'name' => 'Semarapura',
            'image' => 'city-images/semarapura-thumbnail.jpg',
            'history_1' => 'Semarapura was once the capital of the powerful Klungkung Kingdom, which reached its peak in the 17th century. The kingdom was ruled by the royal family of Klungkung, known as the Dewa Agung, who held great influence over the island.',
            'history_2' => "One of the most renowned events in Semarapura's history is the Battle of Klungkung, also known as the Puputan Klungkung, which took place in 1908. Facing the Dutch colonial forces, the royal family and their loyal followers chose to fight to the death rather than surrender. The puputan is regarded as a heroic last stand and a symbol of resistance against colonial rule.",
        ]);

        City::create([
            'name' => 'Sangkan Gunung',
            'image' => 'city-images/sangkan-gunung-thumbnail.jpg',
            'history_1' => "Kabupaten Klungkung, yang meliputi Desa Sangkan Gunung, memiliki signifikansi historis di Bali karena dulunya adalah kursi kerajaan Klungkung yang kuat, juga dikenal sebagai Kerajaan Gelgel.Kerajaan gelgel menjadi terkenal di abad ke -17 dan memainkan peran penting dalam membentuk lanskap politik dan budaya Bali.",
            'history_2' => 'Di bawah pemerintahan Kerajaan Gelgel, Klungkung menjadi pusat penting untuk seni, budaya, dan pemerintahan.Itu dikenal karena pengadilan kerajaan, istana, kuil, dan pencapaian artistik.Namun, pada akhir abad ke -19, kerajaan Klungkung menghadapi tantangan yang signifikan dengan kedatangan pasukan kolonial Belanda.',
        ]);

        CityTranslation::create([
            'cities_id' => '2',
            'language' => 'id',
            'name' => 'Sangkan Gunung',
            'image' => 'city-images/sangkan-gunung-thumbnail.jpg',
            'history_1' => "Kabupaten Klungkung, yang meliputi Desa Sangkan Gunung, memiliki signifikansi historis di Bali karena dulunya adalah kursi kerajaan Klungkung yang kuat, juga dikenal sebagai Kerajaan Gelgel.Kerajaan gelgel menjadi terkenal di abad ke -17 dan memainkan peran penting dalam membentuk lanskap politik dan budaya Bali.",
            'history_2' => 'Di bawah pemerintahan Kerajaan Gelgel, Klungkung menjadi pusat penting untuk seni, budaya, dan pemerintahan.Itu dikenal karena pengadilan kerajaan, istana, kuil, dan pencapaian artistik.Namun, pada akhir abad ke -19, kerajaan Klungkung menghadapi tantangan yang signifikan dengan kedatangan pasukan kolonial Belanda.',
        ]);

        CityTranslation::create([
            'cities_id' => '2',
            'language' => 'en',
            'name' => 'Mountain Sangkan',
            'image' => 'city-images/sangkan-gunung-thumbnail.jpg',
            'history_1' => "Klungkung regency, which includes Desa Sangkan Gunung, has historical significance in Bali as it was once the seat of the powerful Klungkung Kingdom, also known as the Kingdom of Gelgel. The Gelgel Kingdom rose to prominence in the 17th century and played a significant role in shaping the political and cultural landscape of Bali.",
            'history_2' => 'Under the rule of the Gelgel Kingdom, Klungkung became an important center for arts, culture, and governance. It was known for its royal court, palaces, temples, and artistic achievements. However, in the late 19th century, the Klungkung Kingdom faced a significant challenge with the arrival of the Dutch colonial forces.',
        ]);

        City::create([
            'name' => 'Dawan',
            'image' => 'city-images/dawan-thumbnail.jpg',
            'history_1' => "Dawan secara tradisional dikenal sebagai daerah pantai yang strategis dan merupakan rumah bagi komunitas nelayan yang berkembang dengan sumber daya laut yang berlimpah.Desa -desa pesisir memainkan peran penting dalam ekonomi dan jaringan perdagangan di kawasan itu, berkontribusi pada keseluruhan kemakmuran Klungkung.",
            'history_2' => 'Selama era kolonial Belanda, Dawan, seperti yang lain dari Bali, berada di bawah pengaruh Belanda.Belanda menetapkan kehadiran mereka di Bali dan memperkenalkan sistem administrasi baru.Namun, Dawan mempertahankan identitas budayanya dan melestarikan praktik tradisionalnya meskipun ada pengaruh eksternal.',
        ]);

        CityTranslation::create([
            'cities_id' => '3',
            'language' => 'id',
            'name' => 'Dawan',
            'image' => 'city-images/dawan-thumbnail.jpg',
            'history_1' => "Dawan secara tradisional dikenal sebagai daerah pantai yang strategis dan merupakan rumah bagi komunitas nelayan yang berkembang dengan sumber daya laut yang berlimpah.Desa -desa pesisir memainkan peran penting dalam ekonomi dan jaringan perdagangan di kawasan itu, berkontribusi pada keseluruhan kemakmuran Klungkung.",
            'history_2' => 'Selama era kolonial Belanda, Dawan, seperti yang lain dari Bali, berada di bawah pengaruh Belanda.Belanda menetapkan kehadiran mereka di Bali dan memperkenalkan sistem administrasi baru.Namun, Dawan mempertahankan identitas budayanya dan melestarikan praktik tradisionalnya meskipun ada pengaruh eksternal.',
        ]);

        CityTranslation::create([
            'cities_id' => '3',
            'language' => 'en',
            'name' => 'Dawan',
            'image' => 'city-images/dawan-thumbnail.jpg',
            'history_1' => "Dawan was traditionally known as a strategic coastal area and was home to fishing communities that thrived on the abundant marine resources. The coastal villages played a vital role in the region's economy and trade networks, contributing to the overall prosperity of Klungkung.",
            'history_2' => 'During the Dutch colonial era, Dawan, like the rest of Bali, came under Dutch influence. The Dutch established their presence in Bali and introduced new administrative systems. However, Dawan maintained its cultural identity and preserved its traditional practices despite external influences.',
        ]);

        Destination::create([
            'id' => '1',
            'cities_id' => '1',
            'name' => 'Taman Kertha Gosa Tourist',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/taman-wisata-kertha-gosa-thumbnail.jpg',
            'history_1' => "Sejarah Kertha Gosa berasal dari abad ke -18 ketika berfungsi sebagai pengadilan kerajaan Kerajaan Klungkung.Itu adalah tempat di mana raja dan anggota dewannya berkumpul untuk membahas masalah pemerintahan, keadilan, dan urusan budaya.",
            'history_2' => 'Salah satu fitur paling terkenal dari Kertha Gosa adalah paviliun Kerta Gosa.Kerta Gosa, yang berarti "tempat di mana keadilan diadakan," digunakan sebagai pengadilan di mana perselisihan diselesaikan dan keadilan dikelola berdasarkan prinsip -prinsip hukum tradisional Bali.Paviliun ini terkenal dengan langit -langitnya yang dicat rumit yang menggambarkan adegan -adegan dari epos Hindu seperti Mahabharata dan Ramayana, serta berbagai ajaran moral dan etika.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '1',
            'language' => 'id',
            'cities_id' => '1',
            'name' => 'Taman Kertha Gosa Tourist',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/taman-wisata-kertha-gosa-thumbnail.jpg',
            'history_1' => "Sejarah Kertha Gosa berasal dari abad ke -18 ketika berfungsi sebagai pengadilan kerajaan Kerajaan Klungkung.Itu adalah tempat di mana raja dan anggota dewannya berkumpul untuk membahas masalah pemerintahan, keadilan, dan urusan budaya.",
            'history_2' => 'Salah satu fitur paling terkenal dari Kertha Gosa adalah paviliun Kerta Gosa.Kerta Gosa, yang berarti "tempat di mana keadilan diadakan," digunakan sebagai pengadilan di mana perselisihan diselesaikan dan keadilan dikelola berdasarkan prinsip -prinsip hukum tradisional Bali.Paviliun ini terkenal dengan langit -langitnya yang dicat rumit yang menggambarkan adegan -adegan dari epos Hindu seperti Mahabharata dan Ramayana, serta berbagai ajaran moral dan etika.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '1',
            'language' => 'en',
            'cities_id' => '1',
            'name' => 'Kertha Gosa Tourist Park',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/taman-wisata-kertha-gosa-thumbnail.jpg',
            'history_1' => "The history of Kertha Gosa dates back to the 18th century when it served as the royal court of the Klungkung Kingdom. It was a place where the king and his councilors gathered to discuss matters of governance, justice, and cultural affairs.",
            'history_2' => 'One of the most notable features of Kertha Gosa is the Kerta Gosa pavilion. Kerta Gosa, meaning "place where justice is held," was used as a court of law where disputes were settled and justice was administered based on traditional Balinese legal principles. The pavilion is renowned for its elaborately painted ceilings depicting scenes from Hindu epics such as the Mahabharata and Ramayana, as well as various moral and ethical teachings.',
        ]);

        Gallery::create([
            'destinations_id' => '1',
            'image' => 'destination-images/gallery-1.jpg,destination-images/gallery-2.jfif,destination-images/gallery-3.jfif,destination-images/gallery-4.jpg,destination-images/gallery-5.jpg,destination-images/gallery-6.jpg',
        ]);

        Destination::create([
            'id' => '2',
            'cities_id' => '1',
            'name' => 'Monumen Puputan Klungkung',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/monumen-puputan-klungkung-thumbnail.jpg',
            'history_1' => "Puputan Klungkung adalah peristiwa tragis dalam sejarah Bali yang terjadi selama era kolonial Belanda.Menghadapi ancaman invasi dan tuntutan untuk menyerah oleh pasukan Belanda, keluarga kerajaan Klungkung, bersama dengan pengikut mereka, memilih untuk terlibat dalam pertempuran putus asa daripada tunduk pada pemerintahan kolonial.",
            'history_2' => 'Pertempuran terjadi di dalam kompleks Istana Klungkung, yang merupakan kursi kerajaan Klungkung.Keluarga kerajaan, yang dipimpin oleh penguasa, Dewa Agung Jambe, berjuang dengan gagah berani melawan pasukan Belanda yang luar biasa.Meskipun kalah jumlah dan kalah, mereka menunjukkan keberanian dan tekad yang tak tergoyahkan.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '2',
            'language' => 'id',
            'cities_id' => '1',
            'name' => 'Monumen Puputan Klungkung',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/monumen-puputan-klungkung-thumbnail.jpg',
            'history_1' => "Puputan Klungkung adalah peristiwa tragis dalam sejarah Bali yang terjadi selama era kolonial Belanda.Menghadapi ancaman invasi dan tuntutan untuk menyerah oleh pasukan Belanda, keluarga kerajaan Klungkung, bersama dengan pengikut mereka, memilih untuk terlibat dalam pertempuran putus asa daripada tunduk pada pemerintahan kolonial.",
            'history_2' => 'Pertempuran terjadi di dalam kompleks Istana Klungkung, yang merupakan kursi kerajaan Klungkung.Keluarga kerajaan, yang dipimpin oleh penguasa, Dewa Agung Jambe, berjuang dengan gagah berani melawan pasukan Belanda yang luar biasa.Meskipun kalah jumlah dan kalah, mereka menunjukkan keberanian dan tekad yang tak tergoyahkan.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '2',
            'language' => 'en',
            'cities_id' => '1',
            'name' => 'Puputan Klungkung Monument',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/monumen-puputan-klungkung-thumbnail.jpg',
            'history_1' => "The Puputan Klungkung was a tragic event in Bali's history that unfolded during the Dutch colonial era. Facing threats of invasion and demands for surrender by the Dutch forces, the royal family of Klungkung, along with their followers, chose to engage in a desperate battle rather than submit to colonial rule.",
            'history_2' => 'The battle took place within the Klungkung Palace complex, which was the seat of the Klungkung Kingdom. The royal family, led by the ruler, Dewa Agung Jambe, fought valiantly against the overwhelming Dutch forces. Despite being outnumbered and outgunned, they displayed unwavering bravery and determination.',
        ]);

        Gallery::create([
            'destinations_id' => '2',
            'image' => 'destination-images/gallery-7.jpg,destination-images/gallery-8.JPG,destination-images/gallery-9.jpg,destination-images/gallery-10.jpg,destination-images/gallery-11.jpg,destination-images/gallery-12.jpg',
        ]);

        Destination::create([
            'id' => '3',
            'cities_id' => '1',
            'name' => 'Museum Seni Klasik dan Modern Nyoman Gunarsa',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.9',
            'image' => 'destination-images/museum-seni-klasik-dan-modern-nyoman-gunarsa-thumbnail.jpg',
            'history_1' => "Museum ini menampilkan koleksi besar karya seni klasik dan modern, terutama berfokus pada bentuk seni tradisional Bali.Nyoman Gunarsa mendedikasikan hidupnya untuk pelestarian dan promosi seni Bali, dan museum berfungsi sebagai bukti hasrat dan visi artistiknya.",
            'history_2' => 'Nyoman Gunarsa lahir di Klungkung pada tahun 1944 dan mengembangkan apresiasi yang mendalam terhadap seni dan budaya Bali sejak usia muda.Dia berlatih dalam teknik melukis tradisional Bali dan kemudian mengeksplorasi berbagai gaya dan media artistik.Karya -karya seninya sering menggambarkan adegan -adegan dari mitologi Bali, cerita rakyat, dan kehidupan sehari -hari, menangkap esensi dan semangat budaya Bali.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '3',
            'language' => 'id',
            'cities_id' => '1',
            'name' => 'Museum Seni Klasik dan Modern Nyoman Gunarsa',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.9',
            'image' => 'destination-images/museum-seni-klasik-dan-modern-nyoman-gunarsa-thumbnail.jpg',
            'history_1' => "Museum ini menampilkan koleksi besar karya seni klasik dan modern, terutama berfokus pada bentuk seni tradisional Bali.Nyoman Gunarsa mendedikasikan hidupnya untuk pelestarian dan promosi seni Bali, dan museum berfungsi sebagai bukti hasrat dan visi artistiknya.",
            'history_2' => 'Nyoman Gunarsa lahir di Klungkung pada tahun 1944 dan mengembangkan apresiasi yang mendalam terhadap seni dan budaya Bali sejak usia muda.Dia berlatih dalam teknik melukis tradisional Bali dan kemudian mengeksplorasi berbagai gaya dan media artistik.Karya -karya seninya sering menggambarkan adegan -adegan dari mitologi Bali, cerita rakyat, dan kehidupan sehari -hari, menangkap esensi dan semangat budaya Bali.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '3',
            'language' => 'en',
            'cities_id' => '1',
            'name' => 'Museum Seni Klasik dan Modern Nyoman Gunarsa',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.9',
            'image' => 'destination-images/museum-seni-klasik-dan-modern-nyoman-gunarsa-thumbnail.jpg',
            'history_1' => "The museum showcases a vast collection of classical and modern artworks, primarily focusing on traditional Balinese art forms. Nyoman Gunarsa dedicated his life to the preservation and promotion of Balinese art, and the museum serves as a testament to his passion and artistic vision.",
            'history_2' => 'Nyoman Gunarsa was born in Klungkung in 1944 and developed a deep appreciation for Balinese art and culture from a young age. He trained in traditional Balinese painting techniques and went on to explore various artistic styles and mediums. His artworks often depict scenes from Balinese mythology, folklore, and daily life, capturing the essence and vibrancy of Balinese culture.',
        ]);

        Gallery::create([
            'destinations_id' => '3',
            'image' => 'destination-images/gallery-13.jfif,destination-images/gallery-14.jpg,destination-images/gallery-14.jpg,destination-images/gallery-15.jpg,destination-images/gallery-16.jpg,destination-images/gallery-17.webp',
        ]);

        Destination::create([
            'id' => '4',
            'cities_id' => '1',
            'name' => 'Pura Taman Sari',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.7',
            'image' => 'destination-images/pura-taman-sari-thumbnail.jpg',
            'history_1' => "Pura Taman Sari dibangun pada masa pemerintahan Kerajaan Klungkung pada abad ke -18.Itu berfungsi sebagai bagian dari kompleks kerajaan dan didedikasikan untuk penyembahan para dewa Hindu.Kuil ini awalnya dibangun sebagai tempat bagi keluarga kerajaan untuk melakukan upacara dan ritual keagamaan.",
            'history_2' => "Salah satu fitur paling terkenal dari Pura Taman Sari adalah Paviliun Kertha Gosa, yang terletak di dalam kompleks candi.Paviliun berfungsi sebagai pengadilan selama era Kerajaan Klungkung.Di sinilah keputusan penting dibuat, perselisihan diselesaikan, dan keadilan dikelola.",
        ]);

        DestinationTranslation::create([
            'destinations_id' => '4',
            'language' => 'id',
            'cities_id' => '1',
            'name' => 'Pura Taman Sari',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.7',
            'image' => 'destination-images/pura-taman-sari-thumbnail.jpg',
            'history_1' => "Pura Taman Sari dibangun pada masa pemerintahan Kerajaan Klungkung pada abad ke -18.Itu berfungsi sebagai bagian dari kompleks kerajaan dan didedikasikan untuk penyembahan para dewa Hindu.Kuil ini awalnya dibangun sebagai tempat bagi keluarga kerajaan untuk melakukan upacara dan ritual keagamaan.",
            'history_2' => "Salah satu fitur paling terkenal dari Pura Taman Sari adalah Paviliun Kertha Gosa, yang terletak di dalam kompleks candi.Paviliun berfungsi sebagai pengadilan selama era Kerajaan Klungkung.Di sinilah keputusan penting dibuat, perselisihan diselesaikan, dan keadilan dikelola.",
        ]);

        DestinationTranslation::create([
            'destinations_id' => '4',
            'language' => 'en',
            'cities_id' => '1',
            'name' => 'Tamansari Temple',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.7',
            'image' => 'destination-images/pura-taman-sari-thumbnail.jpg',
            'history_1' => "Pura Taman Sari was built during the reign of the Klungkung Kingdom in the 18th century. It served as part of the royal complex and was dedicated to the worship of the Hindu gods. The temple was originally constructed as a place for the royal family to perform religious ceremonies and rituals.",
            'history_2' => "One of the most notable features of Pura Taman Sari is the Kertha Gosa Pavilion, which is located within the temple complex. The pavilion served as a court of justice during the Klungkung Kingdom era. It was here that important decisions were made, disputes were settled, and justice was administered.",
        ]);

        Gallery::create([
            'destinations_id' => '4',
            'image' => 'destination-images/gallery-18.jfif,destination-images/gallery-19.jpg',
        ]);

        Destination::create([
            'id' => '5',
            'cities_id' => '1',
            'name' => 'Puri Klungkung',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.8',
            'image' => 'destination-images/puri-klungkung-thumbnail.jpg',
            'history_1' => "Puri Klungkung adalah kediaman dinasti yang berkuasa di Kerajaan Klungkung, juga dikenal sebagai Kerajaan Gelgel.Kerajaan Gelgel naik ke kekuasaan pada abad ke -17 dan memainkan peran penting dalam membentuk lanskap politik dan budaya Bali.",
            'history_2' => "Kerajaan Klungkung mencapai puncak kekuasaan dan pengaruhnya di bawah pemerintahan Dewa Agung Jambe, juga dikenal sebagai Dewa Agung yang dibuat.Dia adalah raja yang dihormati yang menerapkan berbagai reformasi dan kemajuan selama pemerintahannya.Dewa Agung Jambe sangat diingat karena perlindungan seni, sastra, dan pelestarian budaya Bali.",
        ]);

        DestinationTranslation::create([
            'destinations_id' => '5',
            'language' => 'id',
            'cities_id' => '1',
            'name' => 'Puri Klungkung',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.8',
            'image' => 'destination-images/puri-klungkung-thumbnail.jpg',
            'history_1' => "Puri Klungkung adalah kediaman dinasti yang berkuasa di Kerajaan Klungkung, juga dikenal sebagai Kerajaan Gelgel.Kerajaan Gelgel naik ke kekuasaan pada abad ke -17 dan memainkan peran penting dalam membentuk lanskap politik dan budaya Bali.",
            'history_2' => "Kerajaan Klungkung mencapai puncak kekuasaan dan pengaruhnya di bawah pemerintahan Dewa Agung Jambe, juga dikenal sebagai Dewa Agung yang dibuat.Dia adalah raja yang dihormati yang menerapkan berbagai reformasi dan kemajuan selama pemerintahannya.Dewa Agung Jambe sangat diingat karena perlindungan seni, sastra, dan pelestarian budaya Bali.",
        ]);

        DestinationTranslation::create([
            'destinations_id' => '5',
            'language' => 'en',
            'cities_id' => '1',
            'name' => 'Puri Klungkung',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.8',
            'image' => 'destination-images/puri-klungkung-thumbnail.jpg',
            'history_1' => "Puri Klungkung was the residence of the ruling dynasty of the Klungkung Kingdom, also known as the Kingdom of Gelgel. The Gelgel Kingdom rose to power in the 17th century and played a significant role in shaping the political and cultural landscape of Bali.",
            'history_2' => "The Klungkung Kingdom reached its peak of power and influence under the reign of Dewa Agung Jambe, also known as Dewa Agung Made. He was a revered king who implemented various reforms and advancements during his rule. Dewa Agung Jambe is particularly remembered for his patronage of arts, literature, and the preservation of Balinese culture.",
        ]);

        Gallery::create([
            'destinations_id' => '5',
            'image' => 'destination-images/gallery-20.jpg,destination-images/gallery-21.jpeg,destination-images/gallery-22.jpg,destination-images/gallery-23.jpg',
        ]);

        Destination::create([
            'id' => '6',
            'cities_id' => '3',
            'name' => 'Goa Jepang',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.6',
            'image' => 'destination-images/goa-jepang-thumbnail.jpeg',
            'history_1' => "Selama Perang Dunia II, pasukan Jepang menduduki Indonesia, termasuk pulau Bali.Mereka menggunakan Goa Jepang sebagai basis dan bunker bawah tanah yang strategis.Gua itu dibangun oleh Angkatan Darat Jepang sebagai pos dan tempat penampungan defensif.",
            'history_2' => "Goa Jepang menjabat sebagai kompleks militer dengan terowongan, kamar, dan area penyimpanan.Itu terutama digunakan untuk operasi militer, komunikasi, dan penyimpanan senjata dan persediaan.Lokasi strategis Goa Jepang memungkinkan pasukan Jepang untuk memantau daerah sekitarnya dan mempertahankan kendali atas wilayah tersebut.",
        ]);

        DestinationTranslation::create([
            'destinations_id' => '6',
            'language' => 'id',
            'cities_id' => '3',
            'name' => 'Goa Jepang',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.6',
            'image' => 'destination-images/goa-jepang-thumbnail.jpeg',
            'history_1' => "Selama Perang Dunia II, pasukan Jepang menduduki Indonesia, termasuk pulau Bali.Mereka menggunakan Goa Jepang sebagai basis dan bunker bawah tanah yang strategis.Gua itu dibangun oleh Angkatan Darat Jepang sebagai pos dan tempat penampungan defensif.",
            'history_2' => "Goa Jepang menjabat sebagai kompleks militer dengan terowongan, kamar, dan area penyimpanan.Itu terutama digunakan untuk operasi militer, komunikasi, dan penyimpanan senjata dan persediaan.Lokasi strategis Goa Jepang memungkinkan pasukan Jepang untuk memantau daerah sekitarnya dan mempertahankan kendali atas wilayah tersebut.",
        ]);

        DestinationTranslation::create([
            'destinations_id' => '6',
            'language' => 'en',
            'cities_id' => '3',
            'name' => 'Goa Jepang',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.6',
            'image' => 'destination-images/goa-jepang-thumbnail.jpeg',
            'history_1' => "During World War II, the Japanese forces occupied Indonesia, including the island of Bali. They used Goa Jepang as a strategic underground base and bunker. The cave was constructed by the Japanese army as a defensive outpost and shelter.",
            'history_2' => "Goa Jepang served as a military complex with tunnels, rooms, and storage areas. It was primarily used for military operations, communications, and storage of weapons and supplies. The strategic location of Goa Jepang allowed the Japanese forces to monitor the surrounding areas and maintain control over the region.",
        ]);

        Gallery::create([
            'destinations_id' => '6',
            'image' => 'destination-images/gallery-24.jpg,destination-images/gallery-25.jpeg,destination-images/gallery-26.jpg',
        ]);

        Destination::create([
            'id' => '7',
            'cities_id' => '3',
            'name' => 'Pura Goa Lawah',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.8',
            'image' => 'destination-images/pura-goa-lawah-thumbnail.jfif',
            'history_1' => "Sejarah Pura Goa Lawah berasal dari zaman kuno dan terkait erat dengan mitologi dan cerita rakyat Bali.Legenda mengatakan bahwa kuil itu diciptakan oleh orang bijak Empu Kuturan selama misinya untuk membangun kuil -kuil di seluruh Bali.Menurut mitologi, gua di bawah kuil diyakini sebagai lorong bagi dewa ular mitos yang disebut Naga Basuki, yang melindungi pulau itu dari roh jahat.",
            'history_2' => 'Nama "Goa Lawah" diterjemahkan menjadi "gua kelelawar" dalam bahasa Indonesia.Kuil mendapatkan namanya dari ribuan kelelawar yang berada di dalam gua, menciptakan pemandangan yang unik dan menakjubkan bagi pengunjung.Kelelawar dianggap sakral dan diyakini sebagai penjaga kuil.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '7',
            'language' => 'id',
            'cities_id' => '3',
            'name' => 'Pura Goa Lawah',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.8',
            'image' => 'destination-images/pura-goa-lawah-thumbnail.jfif',
            'history_1' => "Sejarah Pura Goa Lawah berasal dari zaman kuno dan terkait erat dengan mitologi dan cerita rakyat Bali.Legenda mengatakan bahwa kuil itu diciptakan oleh orang bijak Empu Kuturan selama misinya untuk membangun kuil -kuil di seluruh Bali.Menurut mitologi, gua di bawah kuil diyakini sebagai lorong bagi dewa ular mitos yang disebut Naga Basuki, yang melindungi pulau itu dari roh jahat.",
            'history_2' => 'Nama "Goa Lawah" diterjemahkan menjadi "gua kelelawar" dalam bahasa Indonesia.Kuil mendapatkan namanya dari ribuan kelelawar yang berada di dalam gua, menciptakan pemandangan yang unik dan menakjubkan bagi pengunjung.Kelelawar dianggap sakral dan diyakini sebagai penjaga kuil.',
        ]);

        DestinationTranslation::create([
            'destinations_id' => '7',
            'language' => 'en',
            'cities_id' => '3',
            'name' => 'Pura Goa Lawah',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.8',
            'image' => 'destination-images/pura-goa-lawah-thumbnail.jfif',
            'history_1' => "The history of Pura Goa Lawah dates back to ancient times and is closely tied to Balinese mythology and folklore. Legend has it that the temple was created by the sage Empu Kuturan during his mission to establish temples across Bali. According to the mythology, the cave beneath the temple is believed to be a passageway for a mythical snake god called Naga Basuki, who protects the island from evil spirits.",
            'history_2' => 'The name "Goa Lawah" translates to "bat cave" in Indonesian. The temple gets its name from the thousands of bats that reside within the cave, creating a unique and awe-inspiring sight for visitors. The bats are considered sacred and are believed to be the guardians of the temple.',
        ]);

        Gallery::create([
            'destinations_id' => '7',
            'image' => 'destination-images/gallery-27.jfif,destination-images/gallery-28.jfif,destination-images/gallery-29.jfif,destination-images/gallery-30.jpg,destination-images/gallery-31.jpg,destination-images/gallery-32.jpg,destination-images/gallery-33.jpg,destination-images/gallery-34.jpg',
        ]);

        Feedback::create([
            'username' => 'Rebecca Amessa',
            'position' => 'History Educator',
            'message' => 'I stumbled upon this historical tourism website while planning my trip, and it turned out to be a game-changer.',
        ]);

        Feedback::create([
            'username' => 'Andrew Laurist',
            'position' => 'Archaeologist',
            'message' => 'I highly recommend this historical tourism website to all history buffs out there. Meticulously curated content.',
        ]);

        Feedback::create([
            'username' => 'Sophia Divana',
            'position' => 'History Enthusiast',
            'message' => 'I can confidently say that this historical tourism website is a goldmine of knowledge.',
        ]);

        Feedback::create([
            'username' => 'Jonathan Ronny',
            'position' => 'Museum Curator',
            'message' => 'I cannot thank this historical tourism website enough for the invaluable insights it provided during my travels.',
        ]);
    }
}

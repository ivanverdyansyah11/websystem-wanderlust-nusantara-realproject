<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chef;
use App\Models\City;
use App\Models\Destination;
use App\Models\Feedback;
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
            'name' => 'Jakarta',
            'image' => 'city-image',
            'history_1' => 'The history of Jakarta, the capital city of Indonesia, is a fascinating tale that spans centuries and reflects the influences of different cultures and empires. The area that is now Jakarta has been inhabited since ancient times. The region witnessed the rise and fall of several Hindu-Buddhist kingdoms, including Tarumanagara and Sunda. These kingdoms played a significant role in trade and maritime activities in the region.',
            'history_2' => 'In the 13th century, the region came under the influence of the powerful Majapahit Empire, which was based in East Java. The Majapahit Empire brought prosperity and cultural development to the area, leaving behind important archaeological sites.',
        ]);

        City::create([
            'name' => 'West Sumatra',
            'image' => 'city-image',
            'history_1' => 'The region of West Sumatra has been inhabited since prehistoric times. The earliest known kingdom in the area was the Dharmasraya Kingdom, which thrived in the 11th century. It was followed by the Pagaruyung Kingdom, known for its distinctive Minangkabau culture.',
            'history_2' => 'During the 14th century, the Minangkabau people, renowned for their matrilineal society and unique architectural style, established the Minangkabau Kingdom. The kingdom reached its peak under the rule of Adityawarman, who was known for his contributions to literature and the arts.',
        ]);

        City::create([
            'name' => 'Bali',
            'image' => 'city-image',
            'history_1' => "The earliest traces of human habitation on the island of Bali date back to at least 2000 BCE. The Austronesian-speaking people settled in Bali, bringing with them their customs, beliefs, and agricultural practices.",
            'history_2' => 'Bali was influenced by Indian traders and Hindu-Buddhist kingdoms from the neighboring island of Java. The Majapahit Empire, based in East Java, had a significant impact on Bali, introducing Hinduism and the Javanese courtly culture in the 14th century. During the 16th century, Bali experienced a series of fragmented kingdoms and principalities. These small kingdoms were often in conflict with each other, competing for power and influence on the island.',
        ]);

        City::create([
            'name' => 'Central Java',
            'image' => 'city-image',
            'history_1' => "The history of Jawa Tengah can be traced back to ancient times. The area was inhabited by various indigenous communities, including the Kalingga Kingdom in the 6th century. During the classical period, Jawa Tengah was part of the powerful Sailendra and Mataram Kingdoms, which were centers of Buddhism and Hinduism in the region.",
            'history_2' => "In the 16th century, Islam began to spread in Jawa Tengah, and several Islamic Sultanates emerged, such as the Sultanate of Demak and the Sultanate of Pajang. These Sultanates played a crucial role in the spread of Islam in Java and became influential centers of trade and culture.",
        ]);

        Destination::create([
            'id' => '1',
            'cities_id' => '4',
            'name' => 'Candi Borobudur',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '5.0',
            'image' => 'destination-image',
            'history_1' => "Candi Borobudur was built during the Sailendra Dynasty in the 8th and 9th centuries. It is believed that the construction began around 780 AD and took several decades to complete. The temple was commissioned by the ruling dynasty to showcase their devotion to Buddhism and serve as a place of worship and pilgrimage.",
            'history_2' => "Candi Borobudur is an exceptional example of Mahayana Buddhist architecture. It consists of nine stacked platforms, topped by a central dome. The temple is adorned with intricate relief carvings that depict various scenes from Buddhist teachings and Javanese life. The design of the temple reflects a fusion of Indian and indigenous Indonesian architectural styles.",
        ]);

        Gallery::create([
            'destinations_id' => '1',
        ]);

        Destination::create([
            'id' => '2',
            'cities_id' => '4',
            'name' => 'Candi Prambanan',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '4.8',
            'image' => 'destination-image',
            'history_1' => "Candi Prambanan was built during the 9th century by the rulers of the Mataram Kingdom, specifically during the reign of Rakai Pikatan. The temple complex was dedicated to the Trimurti, the Hindu trinity of Brahma, Vishnu, and Shiva. It is believed that Candi Prambanan was constructed as a grand royal project to showcase the power and influence of the Mataram Kingdom.",
            'history_2' => "Candi Prambanan is renowned for its stunning architecture, characterized by tall and intricately carved spires (shikharas) that reach towards the sky. The temple complex consists of several individual temples, with the central compound dedicated to Lord Shiva. The temples are adorned with elaborate relief carvings depicting scenes from Hindu epics, such as the Ramayana and Mahabharata.",
        ]);

        Gallery::create([
            'destinations_id' => '2',
        ]);

        Destination::create([
            'id' => '3',
            'cities_id' => '4',
            'name' => 'Keraton Kasunanan Solo',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '4.6 ',
            'image' => 'destination-image',
            'history_1' => "The Keraton Kasunanan Solo was founded in 1745 by Susuhunan Pakubuwono II, who established the Kasunanan Kingdom in Solo after a period of political and territorial disputes in the Mataram Sultanate. The palace served as the residence of the royal family and the center of Javanese court culture and governance.",
            'history_2' => "The Kasunanan Kingdom of Solo was an offshoot of the Mataram Sultanate, which played a significant role in shaping the Javanese culture and history. The Keraton Kasunanan Solo adopted many of the courtly traditions, rituals, and architectural styles of the Mataram Sultanate.",
        ]);

        Gallery::create([
            'destinations_id' => '3',
        ]);

        Destination::create([
            'id' => '4',
            'cities_id' => '4',
            'name' => 'Candi Sukuh',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '4.5',
            'image' => 'destination-image',
            'history_1' => "Candi Sukuh was built during the 15th century, towards the end of the Majapahit Empire's rule in Java. It is believed to have been constructed under the patronage of King Brawijaya V, who was known for his interest in mysticism and esoteric beliefs. The temple's architecture and design deviate from the typical Javanese Hindu temple style, showcasing a blend of Hindu-Buddhist and indigenous Javanese influences.",
            'history_2' => "Candi Sukuh is known for its distinctive pyramid-like structure, reminiscent of Mesoamerican stepped pyramids. The temple's design includes various stone reliefs, sculptures, and symbolic motifs that depict scenes from Hindu mythology and Javanese cosmology. It is believed that Candi Sukuh served as a place for spiritual rituals and ceremonies associated with fertility and ancestral worship.",
        ]);

        Gallery::create([
            'destinations_id' => '4',
        ]);

        Destination::create([
            'id' => '5',
            'cities_id' => '1',
            'name' => 'Old Town Jakarta',
            'location' => 'Taman Sari, West Jakarta',
            'rating' => '4.3',
            'image' => 'destination-image',
            'history_1' => "Is a historical gem that reflects the city's colonial past. This area was once the heart of Batavia, the capital of the Dutch East Indies. Strolling through Kota Tua, you will encounter well-preserved buildings that showcase Dutch architectural influences, such as the Fatahillah Square, Jakarta History Museum, and the iconic Batavia Café.",
            'history_2' => "These structures transport you back to the 17th century, allowing you to imagine the bustling trading port that Jakarta once was. Kota Tua is not only a visual delight but also a hub of cultural activities, including street performances, art exhibitions, and traditional culinary experiences, offering visitors a unique glimpse into Jakarta's historical and cultural heritage.",
        ]);

        Gallery::create([
            'destinations_id' => '5',
        ]);

        Destination::create([
            'id' => '6',
            'cities_id' => '1',
            'name' => 'National Monument',
            'location' => 'Gambir, Central Jakarta',
            'rating' => '5.0',
            'image' => 'destination-image',
            'history_1' => "The construction of the monument began in 1961 under the direction of Indonesia's first President, Sukarno, and was completed in 1975. The purpose of the monument was to commemorate the country's struggle for independence and symbolize the spirit of unity and nationalism.",
            'history_2' => 'The design of the Monumen Nasional is inspired by Indonesian culture and symbolism. The monument stands at a height of 132 meters and is topped with a flame-shaped gold-covered bronze statue, representing the spirit of freedom. The shape of the monument resembles a rice pestle, known as "lempung" in the local language, which holds cultural significance in Indonesian society.',
        ]);

        Gallery::create([
            'destinations_id' => '6',
        ]);

        Destination::create([
            'id' => '7',
            'cities_id' => '2',
            'name' => 'Istana Pagaruyung',
            'location' => 'Tanah Datar, West Sumatra',
            'rating' => '4.6',
            'image' => 'destination-image',
            'history_1' => "Located in Tanjung Emas, Batusangkar, Istana Pagaruyung is a reconstruction of the royal palace of the ancient Pagaruyung Kingdom. The original palace was believed to have been built in the 17th century but was tragically destroyed by fire in 2007.",
            'history_2' => 'The current palace showcases the traditional Minangkabau architecture, characterized by its distinctive curved roofs. Visitors can explore the grand halls, traditional artifacts, and historical displays within the palace, immersing themselves in the regal heritage of West Sumatra.',
        ]);

        Gallery::create([
            'destinations_id' => '7',
        ]);

        Destination::create([
            'id' => '8',
            'cities_id' => '2',
            'name' => 'Jam Gadang',
            'location' => 'Bukittinggi, West Sumatra',
            'rating' => '4.5',
            'image' => 'destination-image',
            'history_1' => "Situated in the heart of Bukittinggi, Jam Gadang is a prominent landmark and a symbol of the city. This iconic clock tower was built by the Dutch colonial government in 1926 and serves as a reminder of the region's historical ties with the colonial era.",
            'history_2' => 'The tower features a unique blend of architectural styles, combining Indonesian, European, and Minangkabau influences. Visitors can admire the intricate details of the clock tower, climb to its top for panoramic views of the surrounding area, and learn about its historical significance through informative displays.',
        ]);

        Gallery::create([
            'destinations_id' => '8',
        ]);

        Destination::create([
            'id' => '9',
            'cities_id' => '3',
            'name' => 'Pura Besakih',
            'location' => 'Karangasem, Bali',
            'rating' => '5.0',
            'image' => 'destination-image',
            'history_1' => "Pura Besakih, also known as the Besakih Temple or the Mother Temple of Bali, holds significant historical and cultural importance in the island's heritage. The temple's history dates back more than a thousand years, making it one of the oldest and holiest Hindu temples in Bali.",
            'history_2' => 'Legend has it that Pura Besakih was built during the 8th century, believed to be a sacred site chosen by the gods. Over the centuries, the temple complex has undergone several expansions and renovations, reflecting the cultural and religious evolution of Bali. Pura Besakih has survived numerous volcanic eruptions and natural disasters, symbolizing the resilience and devotion of the Balinese people.',
        ]);

        Gallery::create([
            'destinations_id' => '9',
        ]);

        Destination::create([
            'id' => '10',
            'cities_id' => '3',
            'name' => 'Taman Ayun Temple',
            'location' => 'Mengwi, Bali',
            'rating' => '4.8',
            'image' => 'destination-image',
            'history_1' => "Taman Ayun, which translates to 'beautiful garden,' was originally built as a private temple for the Mengwi Kingdom's royalty. It served as a sacred site for the kings and their families to worship their ancestors and the Hindu deities. The temple's unique architectural style, known as the Mengwi architectural style, showcases a fusion of Balinese and Javanese influences.",
            'history_2' => 'The temple complex is characterized by its spacious and well-manicured gardens, surrounded by a large moat that symbolizes the cosmic ocean. The main temple structure, known as the Pura Utama, is elevated and features multiple layers of intricately carved wooden gates and shrines. The exquisite carvings depict mythological figures, floral motifs, and scenes from Hindu epics.',
        ]);

        Gallery::create([
            'destinations_id' => '10',
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chef;
use App\Models\City;
use App\Models\Destination;
use App\Models\Feedback;
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
            'name' => 'East Java',
            'image' => 'city-image',
            'history_1' => "The region's history dates back to ancient times when it was inhabited by indigenous communities. During the 8th and 9th centuries, East Java witnessed the rise of the powerful Mataram Kingdom, which played a crucial role in the spread of Buddhism and Hinduism in the region. The kingdom left behind notable archaeological sites, including the majestic temples of Prambanan and Candi Sukuh.",
            'history_2' => 'In the 13th century, East Java was ruled by the Majapahit Empire, one of the largest and most powerful empires in Southeast Asia. Under the leadership of King Hayam Wuruk and his prime minister, Gajah Mada, the Majapahit Empire reached its peak, embracing Hindu-Buddhist culture and spreading its influence across the archipelago.',
        ]);

        City::create([
            'name' => 'South Sumatra',
            'image' => 'city-image',
            'history_1' => "The region of South Sumatra has been inhabited since prehistoric times, with evidence of human settlements dating back thousands of years. Throughout history, the area was influenced by various kingdoms and empires.",
            'history_2' => 'During the 7th to 14th centuries, the region was part of the Srivijaya Empire, a powerful maritime kingdom that controlled trade in the Southeast Asian region. Srivijaya, with its capital in Palembang, left a significant impact on the culture and trade routes of the region. In the 14th century, the Majapahit Empire from Java gained influence over South Sumatra. This Hindu-Buddhist empire brought its rich cultural traditions to the region, leaving behind remnants such as temple ruins and inscriptions.',
        ]);

        City::create([
            'name' => 'Yogyakarta',
            'image' => 'city-image',
            'history_1' => "Yogyakarta traces its roots back to the Mataram Sultanate, which was established in the late 16th century. The Mataram Sultanate played a crucial role in the spread of Islam in Java and was a powerful kingdom in Central Java. It experienced its golden age during the reign of Sultan Agung, who expanded the empire's territories and constructed notable architectural landmarks.",
            'history_2' => 'In the 18th century, the Mataram Sultanate split into two rivaling courts, the Surakarta Sultanate (Kasunanan) and the Yogyakarta Sultanate (Pakualaman). Yogyakarta became the capital of the latter and remains the seat of the current Sultan of Yogyakarta.',
        ]);

        City::create([
            'name' => 'Bali',
            'image' => 'city-image',
            'history_1' => "The earliest traces of human habitation on the island of Bali date back to at least 2000 BCE. The Austronesian-speaking people settled in Bali, bringing with them their customs, beliefs, and agricultural practices.",
            'history_2' => 'Bali was influenced by Indian traders and Hindu-Buddhist kingdoms from the neighboring island of Java. The Majapahit Empire, based in East Java, had a significant impact on Bali, introducing Hinduism and the Javanese courtly culture in the 14th century. During the 16th century, Bali experienced a series of fragmented kingdoms and principalities. These small kingdoms were often in conflict with each other, competing for power and influence on the island.',
        ]);

        City::create([
            'name' => 'West Java',
            'image' => 'city-image',
            'history_1' => "The region of West Java has been inhabited since prehistoric times. Archaeological evidence suggests that human settlements existed in the area as early as the Neolithic period. During the classical period, West Java was part of the Tarumanagara Kingdom, which flourished from the 4th to the 7th century.",
            'history_2' => 'In the 7th century, the Sunda Kingdom emerged as a powerful Hindu-Buddhist kingdom in West Java. It reached its peak of influence in the 14th century under the rule of King Hayam Wuruk. The Sunda Kingdom had close ties with the Majapahit Empire from East Java.',
        ]);

        City::create([
            'name' => 'Central Java',
            'image' => 'city-image',
            'history_1' => "The history of Jawa Tengah can be traced back to ancient times. The area was inhabited by various indigenous communities, including the Kalingga Kingdom in the 6th century. During the classical period, Jawa Tengah was part of the powerful Sailendra and Mataram Kingdoms, which were centers of Buddhism and Hinduism in the region.",
            'history_2' => "In the 16th century, Islam began to spread in Jawa Tengah, and several Islamic Sultanates emerged, such as the Sultanate of Demak and the Sultanate of Pajang. These Sultanates played a crucial role in the spread of Islam in Java and became influential centers of trade and culture.",
        ]);

        Destination::create([
            'cities_id' => '8',
            'name' => 'Candi Borobudur',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '5.0',
            'image' => 'destination-image',
            'history_1' => "Candi Borobudur was built during the Sailendra Dynasty in the 8th and 9th centuries. It is believed that the construction began around 780 AD and took several decades to complete. The temple was commissioned by the ruling dynasty to showcase their devotion to Buddhism and serve as a place of worship and pilgrimage.",
            'history_2' => "Candi Borobudur is an exceptional example of Mahayana Buddhist architecture. It consists of nine stacked platforms, topped by a central dome. The temple is adorned with intricate relief carvings that depict various scenes from Buddhist teachings and Javanese life. The design of the temple reflects a fusion of Indian and indigenous Indonesian architectural styles.",
        ]);

        Destination::create([
            'cities_id' => '8',
            'name' => 'Candi Prambanan',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '4.8',
            'image' => 'destination-image',
            'history_1' => "Candi Prambanan was built during the 9th century by the rulers of the Mataram Kingdom, specifically during the reign of Rakai Pikatan. The temple complex was dedicated to the Trimurti, the Hindu trinity of Brahma, Vishnu, and Shiva. It is believed that Candi Prambanan was constructed as a grand royal project to showcase the power and influence of the Mataram Kingdom.",
            'history_2' => "Candi Prambanan is renowned for its stunning architecture, characterized by tall and intricately carved spires (shikharas) that reach towards the sky. The temple complex consists of several individual temples, with the central compound dedicated to Lord Shiva. The temples are adorned with elaborate relief carvings depicting scenes from Hindu epics, such as the Ramayana and Mahabharata.",
        ]);

        Destination::create([
            'cities_id' => '8',
            'name' => 'Keraton Kasunanan Solo',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '4.6 ',
            'image' => 'destination-image',
            'history_1' => "The Keraton Kasunanan Solo was founded in 1745 by Susuhunan Pakubuwono II, who established the Kasunanan Kingdom in Solo after a period of political and territorial disputes in the Mataram Sultanate. The palace served as the residence of the royal family and the center of Javanese court culture and governance.",
            'history_2' => "The Kasunanan Kingdom of Solo was an offshoot of the Mataram Sultanate, which played a significant role in shaping the Javanese culture and history. The Keraton Kasunanan Solo adopted many of the courtly traditions, rituals, and architectural styles of the Mataram Sultanate.",
        ]);

        Destination::create([
            'cities_id' => '8',
            'name' => 'Candi Sukuh',
            'location' => 'Magelang, Jawa Tengah',
            'rating' => '4.5',
            'image' => 'destination-image',
            'history_1' => "Candi Sukuh was built during the 15th century, towards the end of the Majapahit Empire's rule in Java. It is believed to have been constructed under the patronage of King Brawijaya V, who was known for his interest in mysticism and esoteric beliefs. The temple's architecture and design deviate from the typical Javanese Hindu temple style, showcasing a blend of Hindu-Buddhist and indigenous Javanese influences.",
            'history_2' => "Candi Sukuh is known for its distinctive pyramid-like structure, reminiscent of Mesoamerican stepped pyramids. The temple's design includes various stone reliefs, sculptures, and symbolic motifs that depict scenes from Hindu mythology and Javanese cosmology. It is believed that Candi Sukuh served as a place for spiritual rituals and ceremonies associated with fertility and ancestral worship.",
        ]);
    }
}

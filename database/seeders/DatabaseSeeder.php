<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chef;
use App\Models\City;
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
            'name' => 'Aceh',
            'image' => 'city-image',
            'history_1' => "The region of Aceh has a rich history dating back to ancient times. It was an important hub for maritime trade, connecting the Indian Ocean with the East Asian trade routes. The area was influenced by various cultures, including Indian, Arab, and Chinese traders.",
            'history_2' => "In the 13th century, Islam was introduced to Aceh, and the region eventually became a powerful Islamic Sultanate. The Sultanate of Aceh reached its peak during the 16th and 17th centuries, becoming a major center of Islamic learning and trade. Aceh's Sultanate was known for its strong navy and played a significant role in regional politics.",
        ]);
    }
}

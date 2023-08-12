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
            'name' => 'Semarapura',
            'image' => 'city-images/semarapura-thumbnail.jpg',
            'history_1' => 'Semarapura was once the capital of the powerful Klungkung Kingdom, which reached its peak in the 17th century. The kingdom was ruled by the royal family of Klungkung, known as the Dewa Agung, who held great influence over the island.',
            'history_2' => "One of the most renowned events in Semarapura's history is the Battle of Klungkung, also known as the Puputan Klungkung, which took place in 1908. Facing the Dutch colonial forces, the royal family and their loyal followers chose to fight to the death rather than surrender. The puputan is regarded as a heroic last stand and a symbol of resistance against colonial rule.",
        ]);

        City::create([
            'name' => 'Sangkan Gunung',
            'image' => 'city-images/sangkan-gunung-thumbnail.jpg',
            'history_1' => "Klungkung regency, which includes Desa Sangkan Gunung, has historical significance in Bali as it was once the seat of the powerful Klungkung Kingdom, also known as the Kingdom of Gelgel. The Gelgel Kingdom rose to prominence in the 17th century and played a significant role in shaping the political and cultural landscape of Bali.",
            'history_2' => 'Under the rule of the Gelgel Kingdom, Klungkung became an important center for arts, culture, and governance. It was known for its royal court, palaces, temples, and artistic achievements. However, in the late 19th century, the Klungkung Kingdom faced a significant challenge with the arrival of the Dutch colonial forces.',
        ]);

        City::create([
            'name' => 'Dawan',
            'image' => 'city-images/dawan-thumbnail.jpg',
            'history_1' => "Dawan was traditionally known as a strategic coastal area and was home to fishing communities that thrived on the abundant marine resources. The coastal villages played a vital role in the region's economy and trade networks, contributing to the overall prosperity of Klungkung.",
            'history_2' => 'During the Dutch colonial era, Dawan, like the rest of Bali, came under Dutch influence. The Dutch established their presence in Bali and introduced new administrative systems. However, Dawan maintained its cultural identity and preserved its traditional practices despite external influences.',
        ]);

        Destination::create([
            'id' => '1',
            'cities_id' => '1',
            'name' => 'Taman Wisata Kertha Gosa',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/taman-wisata-kertha-gosa/taman-wisata-kertha-gosa-thumbnail.jpg',
            'history_1' => "The history of Kertha Gosa dates back to the 18th century when it served as the royal court of the Klungkung Kingdom. It was a place where the king and his councilors gathered to discuss matters of governance, justice, and cultural affairs.",
            'history_2' => 'One of the most notable features of Kertha Gosa is the Kerta Gosa pavilion. Kerta Gosa, meaning "place where justice is held," was used as a court of law where disputes were settled and justice was administered based on traditional Balinese legal principles. The pavilion is renowned for its elaborately painted ceilings depicting scenes from Hindu epics such as the Mahabharata and Ramayana, as well as various moral and ethical teachings.',
        ]);

        Gallery::create([
            'destinations_id' => '1',
        ]);

        Destination::create([
            'id' => '2',
            'cities_id' => '1',
            'name' => 'Monumen Puputan Klungkung',
            'location' => 'Semarapura, Klungkung',
            'rating' => '5.0',
            'image' => 'destination-images/monumen-puputan-klungkung/monumen-puputan-klungkung-thumbnail.jpg',
            'history_1' => "The Puputan Klungkung was a tragic event in Bali's history that unfolded during the Dutch colonial era. Facing threats of invasion and demands for surrender by the Dutch forces, the royal family of Klungkung, along with their followers, chose to engage in a desperate battle rather than submit to colonial rule.",
            'history_2' => 'The battle took place within the Klungkung Palace complex, which was the seat of the Klungkung Kingdom. The royal family, led by the ruler, Dewa Agung Jambe, fought valiantly against the overwhelming Dutch forces. Despite being outnumbered and outgunned, they displayed unwavering bravery and determination.',
        ]);

        Gallery::create([
            'destinations_id' => '2',
        ]);

        Destination::create([
            'id' => '3',
            'cities_id' => '1',
            'name' => 'Museum Seni Klasik dan Modern Nyoman Gunarsa',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.9',
            'image' => 'destination-images/museum-seni-klasik-dan-modern-nyoman-gunarsa/museum-seni-klasik-dan-modern-nyoman-gunarsa-thumbnail.jpg',
            'history_1' => "The museum showcases a vast collection of classical and modern artworks, primarily focusing on traditional Balinese art forms. Nyoman Gunarsa dedicated his life to the preservation and promotion of Balinese art, and the museum serves as a testament to his passion and artistic vision.",
            'history_2' => 'Nyoman Gunarsa was born in Klungkung in 1944 and developed a deep appreciation for Balinese art and culture from a young age. He trained in traditional Balinese painting techniques and went on to explore various artistic styles and mediums. His artworks often depict scenes from Balinese mythology, folklore, and daily life, capturing the essence and vibrancy of Balinese culture.',
        ]);

        Gallery::create([
            'destinations_id' => '3',
        ]);

        Destination::create([
            'id' => '4',
            'cities_id' => '1',
            'name' => 'Pura Taman Sari',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.7',
            'image' => 'destination-images/pura-taman-sari/pura-taman-sari-thumbnail.jpg',
            'history_1' => "Pura Taman Sari was built during the reign of the Klungkung Kingdom in the 18th century. It served as part of the royal complex and was dedicated to the worship of the Hindu gods. The temple was originally constructed as a place for the royal family to perform religious ceremonies and rituals.",
            'history_2' => "One of the most notable features of Pura Taman Sari is the Kertha Gosa Pavilion, which is located within the temple complex. The pavilion served as a court of justice during the Klungkung Kingdom era. It was here that important decisions were made, disputes were settled, and justice was administered.",
        ]);

        Gallery::create([
            'destinations_id' => '4',
        ]);

        Destination::create([
            'id' => '5',
            'cities_id' => '1',
            'name' => 'Puri Klungkung',
            'location' => 'Semarapura, Klungkung',
            'rating' => '4.8',
            'image' => 'destination-images/puri-klungkung/puri-klungkung-thumbnail.jpg',
            'history_1' => "Puri Klungkung was the residence of the ruling dynasty of the Klungkung Kingdom, also known as the Kingdom of Gelgel. The Gelgel Kingdom rose to power in the 17th century and played a significant role in shaping the political and cultural landscape of Bali.",
            'history_2' => "The Klungkung Kingdom reached its peak of power and influence under the reign of Dewa Agung Jambe, also known as Dewa Agung Made. He was a revered king who implemented various reforms and advancements during his rule. Dewa Agung Jambe is particularly remembered for his patronage of arts, literature, and the preservation of Balinese culture.",
        ]);

        Gallery::create([
            'destinations_id' => '5',
        ]);

        Destination::create([
            'id' => '6',
            'cities_id' => '3',
            'name' => 'Goa Jepang',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.6',
            'image' => 'destination-images/goa-jepang/goa-jepang-thumbnail.jpeg',
            'history_1' => "During World War II, the Japanese forces occupied Indonesia, including the island of Bali. They used Goa Jepang as a strategic underground base and bunker. The cave was constructed by the Japanese army as a defensive outpost and shelter.",
            'history_2' => "Goa Jepang served as a military complex with tunnels, rooms, and storage areas. It was primarily used for military operations, communications, and storage of weapons and supplies. The strategic location of Goa Jepang allowed the Japanese forces to monitor the surrounding areas and maintain control over the region.",
        ]);

        Gallery::create([
            'destinations_id' => '6',
        ]);

        Destination::create([
            'id' => '7',
            'cities_id' => '3',
            'name' => 'Pura Goa Lawah',
            'location' => 'Dawan, Klungkung',
            'rating' => '4.8',
            'image' => 'pura-goa-lawah-thumbnail.jfif',
            'history_1' => "The history of Pura Goa Lawah dates back to ancient times and is closely tied to Balinese mythology and folklore. Legend has it that the temple was created by the sage Empu Kuturan during his mission to establish temples across Bali. According to the mythology, the cave beneath the temple is believed to be a passageway for a mythical snake god called Naga Basuki, who protects the island from evil spirits.",
            'history_2' => 'The name "Goa Lawah" translates to "bat cave" in Indonesian. The temple gets its name from the thousands of bats that reside within the cave, creating a unique and awe-inspiring sight for visitors. The bats are considered sacred and are believed to be the guardians of the temple.',
        ]);

        Gallery::create([
            'destinations_id' => '7',
        ]);
    }
}

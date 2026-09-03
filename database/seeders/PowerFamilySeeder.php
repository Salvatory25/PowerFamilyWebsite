<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Enquiry;
use App\Models\GalleryItem;
use App\Models\House;
use App\Models\HouseImage;
use App\Models\Location;
use App\Models\Plot;
use App\Models\PlotImage;
use App\Models\PlotType;
use App\Models\Setting;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PowerFamilySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@powerfamily.co.tz'],
            [
                'name' => 'Power Family Admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Also ensure default admin
        User::updateOrCreate(
            ['email' => 'admin@reland.co.tz'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings (ACF-like Dynamic Website Content)
        $settings = [
            // Brand & Topbar
            'company_name' => 'Power Family Investment',
            'tagline' => 'Wekeza Leo. Jenga Kesho.',
            'top_bar_location_badge' => 'Tanzania & East Africa',
            'top_bar_tagline_sw' => 'Suluhisho la Uhakika la Viwanja, Nyumba za Kisasa na Magari',
            'top_bar_tagline_en' => 'Reliable Solutions for Plots, Modern Houses & Quality Vehicles',

            // Hero Section
            'hero_headline_sw' => 'WEKEZA LEO. JENGA KESHO.',
            'hero_headline_en' => 'INVEST TODAY. BUILD TOMORROW.',
            'hero_subtitle_sw' => 'Gundua na miliki viwanja vilivyopimwa vyenye hati safi, nyumba za kisasa za familia na magari yenye ubora wa juu Tanzania nzima.',
            'hero_subtitle_en' => 'Discover and own surveyed plots with verified title deeds, modern family houses and top quality vehicles across Tanzania.',
            'hero_bg_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2400&q=85',
            'hero_badge_sw' => 'Huduma ya Uhakika & Nyaraka Rasmi za Kisheria',
            'hero_badge_en' => 'Trusted Property & Verified Legal Documentation',

            // "What Are You Looking For?" 4 Pillars
            'what_looking_title_sw' => 'What are you looking for?',
            'what_looking_title_en' => 'What are you looking for?',
            'what_looking_subtitle_sw' => 'Chagua huduma au fursa unayohitaji kuanza nayo leo kwa urahisi na uhakika.',
            'what_looking_subtitle_en' => 'Choose your desired investment category and explore verified opportunities.',
            'pillar_1_title_sw' => 'Viwanja vya Makazi',
            'pillar_1_desc_sw' => 'Residential Plots',
            'pillar_2_title_sw' => 'Viwanja vya Biashara',
            'pillar_2_desc_sw' => 'Commercial Plots',
            'pillar_3_title_sw' => 'Nyumba za Kisasa',
            'pillar_3_desc_sw' => 'Modern Family Houses',
            'pillar_4_title_sw' => 'Magari ya Uhakika',
            'pillar_4_desc_sw' => 'Premium Vehicles',

            // Trust & Why Choose Us Pillars
            'why_us_badge' => '★ KWA NINI POWER FAMILY?',
            'why_us_title' => 'Tunakupa Uhakika, Usalama na Mikataba Safi ya Kisheria.',
            'why_us_description' => 'Tangu kuanzishwa kwetu, Power Family Investment imewasaidia mamia ya Watanzania ndani na nje ya nchi (Diaspora) kumiliki ardhi, nyumba na magari bila hofu yoyote ya migogoro au utapeli.',
            'why_us_image' => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=1200&q=80',
            'why_metric_value' => '100%',
            'why_metric_title' => 'Ulinzi wa Uwekezaji',
            'why_metric_subtitle' => 'Mikataba rasmi na wanasheria',
            'why_feat_1_title' => 'Viwanja Vilivyopimwa',
            'why_feat_1_desc' => 'Vigingi vya kisasa vimewekwa na ramani zimesajiliwa.',
            'why_feat_2_title' => 'Hati Miliki za Uhakika',
            'why_feat_2_desc' => 'Taratibu zote za uhamisho wa umiliki zinasimamiwa.',
            'why_feat_3_title' => 'Malipo kwa Awamu',
            'why_feat_3_desc' => 'Mpango rahisi wa kulipa kidogo kidogo unaoendana na bajeti yako.',
            'why_feat_4_title' => 'Huduma za Diaspora',
            'why_feat_4_desc' => 'Ukaguzi wa video mubashara na mikataba salama ya kidijitali.',

            // CTA Consultation Banner
            'cta_banner_title' => 'Je, uko tayari kuanza safari yako ya umiliki leo?',
            'cta_banner_subtitle' => 'Wasiliana na timu yetu ya wataalamu upate ushauri wa bure na kuratibu ziara ya bure ya kutembelea miradi yetu (Site Visit).',
            'cta_banner_btn1_text' => 'Wasiliana Nasi Sasa →',
            'cta_banner_btn2_text' => 'Piga Simu Moja kwa Moja',

            // Contact & Social Media
            'company_phone' => '+255 759 423 626',
            'company_phone_2' => '+255 658 003 626',
            'whatsapp_number' => '255759423626',
            'company_email' => 'info@powerfamilyinvestment.co.tz',
            'company_address' => 'Tanzania',
            'working_hours' => 'Jumatatu - Jumamosi: 2:00 Asubuhi - 11:30 Jioni',
            'social_facebook' => 'https://facebook.com/power_family_investment',
            'social_instagram' => 'https://www.instagram.com/power_family_investment/',
            'social_tiktok' => 'https://tiktok.com/@power_family_investment',
            'social_youtube' => 'https://youtube.com/@power_family_investment',

            // SEO & Meta
            'site_title' => 'Power Family Investment — Wauzaji wa Viwanja, Nyumba na Magari Tanzania',
            'meta_description' => 'Tunakuunganisha na chaguo sahihi. Wauzaji wa Viwanja vilivyopimwa, Nyumba za kisasa na Magari yenye ubora Tanzania.',
            'meta_keywords' => 'wauzaji viwanja, nyumba, magari, uwekezaji tanzania, power family investment, +255 759 423 626, +255 658 003 626',
        ];

        foreach ($settings as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // 3. Plot Types
        $typeResidential = PlotType::updateOrCreate(
            ['slug' => 'makazi'],
            [
                'name_sw' => 'Viwanja vya Makazi',
                'name_en' => 'Residential Plots',
                'description' => 'Viwanja vilivyopimwa kwa ajili ya ujenzi wa makazi ya familia.',
                'is_active' => true,
                'display_order' => 1,
            ]
        );

        $typeCommercial = PlotType::updateOrCreate(
            ['slug' => 'biashara'],
            [
                'name_sw' => 'Viwanja vya Biashara',
                'name_en' => 'Commercial Plots',
                'description' => 'Viwanja vya kimkakati kando ya barabara kwa ajili ya vitega uchumi na biashara.',
                'is_active' => true,
                'display_order' => 2,
            ]
        );

        // 4. Locations
        $loc1 = Location::updateOrCreate(
            ['slug' => 'kigamboni-dar-es-salaam'],
            [
                'area_name' => 'Kigamboni',
                'district' => 'Kigamboni',
                'region' => 'Dar es Salaam',
                'description' => 'Eneo tulivu na zuri kando ya bahari lenye ukuaji wa haraka na huduma zote za kijamii karibu.',
                'featured_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'is_popular' => true,
                'display_order' => 1,
            ]
        );

        $loc2 = Location::updateOrCreate(
            ['slug' => 'kerege-bagamoyo'],
            [
                'area_name' => 'Kerege',
                'district' => 'Bagamoyo',
                'region' => 'Pwani',
                'description' => 'Eneo la kimkakati kando ya barabara kuu, linafaa sana kwa uwekezaji wa kibiashara na makazi.',
                'featured_image' => 'https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=1200&q=80',
                'is_popular' => true,
                'display_order' => 2,
            ]
        );

        $loc3 = Location::updateOrCreate(
            ['slug' => 'chamwino-dodoma'],
            [
                'area_name' => 'Chamwino',
                'district' => 'Chamwino',
                'region' => 'Dodoma',
                'description' => 'Mji mkuu wa kiserikali wenye fursa kubwa ya kupanda kwa thamani ya ardhi kwa haraka.',
                'featured_image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
                'is_popular' => true,
                'display_order' => 3,
            ]
        );

        // 5. Plots
        $plot1 = Plot::updateOrCreate(
            ['plot_reference' => 'PFI-PLT-001'],
            [
                'title' => 'Kiwanja cha Makazi — Kigamboni',
                'slug' => 'kiwanja-cha-makazi-kigamboni',
                'plot_type_id' => $typeResidential->id,
                'location_id' => $loc1->id,
                'street_address' => 'Kigamboni Mwasonga',
                'listing_status' => 'available',
                'price' => 8500000,
                'currency' => 'TZS',
                'plot_size' => 900,
                'size_unit' => 'SQM',
                'dimension_details' => '30m × 30m',
                'ownership_title_type' => 'Kimepimwa (Surveyed)',
                'short_description' => 'Kiwanja kizuri cha makazi kilichopimwa vizuri chenye ufikiaji mzuri wa barabara.',
                'description' => "Kiwanja kizuri sana cha makazi kilichopimwa vizuri kwa vigingi vya kisasa.\nKipo kwenye mazingira tulivu ya Kigamboni yenye ufikiaji mzuri wa barabara, umeme na maji karibu.\nNyaraka zote zipo tayari kwa ajili ya uhamisho wa umiliki.",
                'has_electricity' => true,
                'has_water' => true,
                'road_accessibility' => 'Barabara nzuri inafika moja kwa moja',
                'topography' => 'Tambarare',
                'latitude' => -6.8667,
                'longitude' => 39.3167,
                'featured_image' => 'plots/plot1.jpg',
                'is_featured' => true,
                'is_published' => true,
            ]
        );

        $plot2 = Plot::updateOrCreate(
            ['plot_reference' => 'PFI-PLT-002'],
            [
                'title' => 'Kiwanja cha Biashara — Kerege',
                'slug' => 'kiwanja-cha-biashara-kerege',
                'plot_type_id' => $typeCommercial->id,
                'location_id' => $loc2->id,
                'street_address' => 'Kerege Barabara Kuu ya Bagamoyo',
                'listing_status' => 'available',
                'price' => 18000000,
                'currency' => 'TZS',
                'plot_size' => 1400,
                'size_unit' => 'SQM',
                'dimension_details' => '40m × 35m',
                'ownership_title_type' => 'Hati Miliki Safi',
                'short_description' => 'Kiwanja cha kimkakati kando ya barabara kuu, linafaa kwa maduka na fremu za biashara.',
                'description' => "Kiwanja cha kimkakati chenye nafasi kubwa kando ya barabara kuu ya Bagamoyo.\nLinafaa sana kwa ujenzi wa maduka ya biashara, fremu, gereji au kituo cha biashara.\nMzunguko mzuri wa watu na magari.",
                'has_electricity' => true,
                'has_water' => true,
                'road_accessibility' => 'Kando ya barabara kuu',
                'topography' => 'Tambarare',
                'latitude' => -6.4833,
                'longitude' => 38.9000,
                'featured_image' => 'plots/plot2.jpg',
                'is_featured' => true,
                'is_published' => true,
            ]
        );

        $plot3 = Plot::updateOrCreate(
            ['plot_reference' => 'PFI-PLT-003'],
            [
                'title' => 'Kiwanja cha Makazi — Chamwino, Dodoma',
                'slug' => 'kiwanja-cha-makazi-chamwino-dodoma',
                'plot_type_id' => $typeResidential->id,
                'location_id' => $loc3->id,
                'street_address' => 'Chamwino Ikulu Ndogo',
                'listing_status' => 'available',
                'price' => 12000000,
                'currency' => 'TZS',
                'plot_size' => 1225,
                'size_unit' => 'SQM',
                'dimension_details' => '35m × 35m',
                'ownership_title_type' => 'Kimepimwa',
                'short_description' => 'Kiwanja kikubwa chenye mandhari nzuri na hewa safi kwa ajili ya makazi ya familia.',
                'description' => "Kiwanja chenye nafasi kubwa na mandhari ya kuvutia sana hapa Chamwino Dodoma.\nKinafaa kwa ujenzi wa nyumba ya kifahari yenye eneo kubwa la bustani na maegesho ya magari.",
                'has_electricity' => true,
                'has_water' => true,
                'road_accessibility' => 'Barabara inafika vizuri',
                'topography' => 'Mwinuko mpole wenye mandhari nzuri',
                'latitude' => -6.1833,
                'longitude' => 35.8500,
                'featured_image' => 'plots/plot1.jpg',
                'is_featured' => true,
                'is_published' => true,
            ]
        );

        // 6. Houses
        $house1 = House::updateOrCreate(
            ['slug' => 'nyumba-ya-kisasa-vyumba-4'],
            [
                'title' => 'Nyumba ya Kisasa ya Familia (Vyumba 4)',
                'house_reference' => 'PFI-HOU-001',
                'location_id' => $loc1->id,
                'price' => 145000000,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'plot_size' => '30m × 30m',
                'house_size' => '240 SQM',
                'listing_status' => 'available',
                'ownership_title_type' => 'Hati Miliki Kamili',
                'description' => "Nyumba maridadi ya kisasa iliyojengwa kwa viwango vya juu.\nIna sebule kubwa ya wazi, jiko la kisasa lenye makabati, chumba kikuu chenye choo na bafu (Master Bedroom), uzio wa ukuta na geti salama.",
                'features' => ['Vyumba 4 vya kulala (2 Master)', 'Sebule na Dinning kubwa', 'Jiko la kisasa lenye makabati', 'Uzio na geti salama', 'Maegesho ya magari 4', 'Tangi kubwa la maji'],
                'featured_image' => 'houses/house1.jpg',
                'is_featured' => true,
                'is_published' => true,
            ]
        );

        $house2 = House::updateOrCreate(
            ['slug' => 'nyumba-vyumba-3-bustani'],
            [
                'title' => 'Nyumba ya Vyumba 3 yenye Bustani Nzuri',
                'house_reference' => 'PFI-HOU-002',
                'location_id' => $loc3->id,
                'price' => 98000000,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'plot_size' => '25m × 30m',
                'house_size' => '180 SQM',
                'listing_status' => 'available',
                'ownership_title_type' => 'Hati Miliki',
                'description' => "Nyumba tulivu iliyopo katika mtaa mzuri wa makazi.\nIna bustani nzuri ya kijani, paving blocks za kisasa na mazingira salama kwa watoto.",
                'features' => ['Vyumba 3 (1 Master)', 'Bustani ya kijani', 'Paving blocks', 'Maji ya uhakika na Kisima', 'LUKU yako peke yako'],
                'featured_image' => 'houses/house1.jpg',
                'is_featured' => true,
                'is_published' => true,
            ]
        );

        // 7. Vehicles
        $veh1 = Vehicle::updateOrCreate(
            ['slug' => 'toyota-land-cruiser-prado-tx-l'],
            [
                'title' => 'Toyota Land Cruiser Prado TX-L',
                'vehicle_reference' => 'PFI-VEH-001',
                'make' => 'Toyota',
                'model' => 'Land Cruiser Prado TX-L',
                'year' => 2018,
                'price' => 88000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Diesel',
                'mileage' => '64,000 km',
                'color' => 'Pearl White',
                'body_type' => 'SUV',
                'listing_status' => 'available',
                'description' => "Gari lipo katika hali safi sana (Clean condition).\nHalijawahi kupata ajali yoyote, service imefanyika kwa wakati.\nLina sifa za 4WD, Sunroof, Viti vya ngozi na Push to Start.",
                'features' => ['4WD / AWD', 'Sunroof', 'Leather Seats', 'Reverse Camera', 'Push to Start', '7 Seater'],
                'featured_image' => 'vehicles/veh1.jpg',
                'is_featured' => true,
                'is_published' => true,
            ]
        );

        $veh2 = Vehicle::updateOrCreate(
            ['slug' => 'toyota-harrier-premium'],
            [
                'title' => 'Toyota Harrier Premium',
                'vehicle_reference' => 'PFI-VEH-002',
                'make' => 'Toyota',
                'model' => 'Harrier Premium',
                'year' => 2017,
                'price' => 49500000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'mileage' => '58,000 km',
                'color' => 'Black Metallic',
                'body_type' => 'Crossover',
                'listing_status' => 'available',
                'description' => "Gari la kifahari lenye matumizi mazuri ya mafuta.\nViti vya ngozi, screen ya kisasa, rim nzuri za alloy na mfumo bora wa sauti.",
                'features' => ['Alloy Wheels', 'Leather Interior', 'Cruise Control', 'Touch Screen Display', 'Fog Lights'],
                'featured_image' => 'vehicles/veh2.jpg',
                'is_featured' => true,
                'is_published' => true,
            ]
        );

        // 8. Articles
        Article::updateOrCreate(
            ['slug' => 'mambo-muhimu-ya-kuzingatia-kabla-ya-kununua-kiwanja'],
            [
                'title' => 'Mambo Muhimu ya Kuzingatia Kabla ya Kununua Kiwanja Tanzania',
                'category' => 'Mwongozo wa Viwanja',
                'excerpt' => 'Mwongozo kamili wa ukaguzi wa eneo, uhakiki wa nyaraka halisi na mipaka kabla ya kulipa fedha zako.',
                'content' => "Kununua ardhi au kiwanja ni moja ya uwekezaji mkubwa zaidi maishani.\n\n1. Kutembelea Eneo Halisi (Site Visit): Fika eneo ujionee hali ya ardhi na miundombinu.\n2. Uhakiki wa Nyaraka: Thibitisha uhalali wa mmiliki na nyaraka za serikali.\n3. Ushirikishwaji wa Wataalamu: Fanya kazi na kampuni inayoaminika kama Power Family Investment.\n4. Kuweka Mipaka/Vigingi: Hakikisha vigingi vinawekwa mara moja baada ya mkataba.",
                'image_url' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        Article::updateOrCreate(
            ['slug' => 'tofauti-kati-ya-kiwanja-cha-makazi-na-biashara'],
            [
                'title' => 'Tofauti Kati ya Kiwanja cha Makazi na Kiwanja cha Biashara',
                'category' => 'Uwekezaji',
                'excerpt' => 'Jinsi matumizi ya ardhi yanavyoathiri thamani, vibali vya ujenzi na faida ya uwekezaji wako wa muda mrefu.',
                'content' => "Kabla ya kuchagua kiwanja cha kununua, ni muhimu kuelewa mgawanyo wa matumizi ya ardhi (Zoning):\n\n- Viwanja vya Makazi: Hupangwa mahususi kwa ajili ya kuishi familia katika utulivu.\n- Viwanja vya Biashara: Hupatikana kando ya barabara kuu na vituo vya huduma vikiwa na thamani kubwa ya kibiashara.",
                'image_url' => 'https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=1200&q=80',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        // 9. Gallery Items
        GalleryItem::updateOrCreate(
            ['title' => 'Upimaji wa Viwanja Eneo la Kwanza'],
            [
                'category' => 'viwanja',
                'image_path' => 'gallery/survey.jpg',
                'description' => 'Upimaji na uwekaji wa vigingi vya viwanja.',
                'display_order' => 1,
                'is_active' => true,
            ]
        );

        GalleryItem::updateOrCreate(
            ['title' => 'Nyumba ya Kisasa ya Familia'],
            [
                'category' => 'nyumba',
                'image_path' => 'gallery/house.jpg',
                'description' => 'Muonekano wa mbele wa nyumba ya kisasa.',
                'display_order' => 2,
                'is_active' => true,
            ]
        );

        GalleryItem::updateOrCreate(
            ['title' => 'Magari Safi ya Kifahari'],
            [
                'category' => 'magari',
                'image_path' => 'gallery/cars.jpg',
                'description' => 'Magari yenye ubora tayari kwa wateja.',
                'display_order' => 3,
                'is_active' => true,
            ]
        );

        GalleryItem::updateOrCreate(
            ['title' => 'Ziara ya Wateja Kwenye Mradi'],
            [
                'category' => 'matukio',
                'image_path' => 'gallery/visit.jpg',
                'description' => 'Wateja wakikagua viwanja kwa furaha na uhakika.',
                'display_order' => 4,
                'is_active' => true,
            ]
        );

        // 10. Sample Inquiries
        Enquiry::updateOrCreate(
            ['phone' => '+255 712 345 678'],
            [
                'tracking_reference' => 'PFI-REQ-101',
                'name' => 'Juma Hassan',
                'email' => 'juma.hassan@example.com',
                'category' => 'kiwanja',
                'plot_id' => $plot1->id,
                'message' => 'Habari, nahitaji kujua kama naweza kulipa kwa awamu na lini naweza kwenda kukagua kiwanja hiki?',
                'status' => 'new',
                'admin_notes' => 'Mteja anataka ratiba ya ukaguzi wiki hii.',
            ]
        );

        Enquiry::updateOrCreate(
            ['phone' => '+255 754 987 654'],
            [
                'tracking_reference' => 'PFI-REQ-102',
                'name' => 'Amina Salum',
                'email' => 'amina.salum@example.com',
                'category' => 'nyumba',
                'house_id' => $house1->id,
                'message' => 'Nimevutiwa na hii nyumba. Je, kuna punguzo lolote endapo nitalipa taslimu?',
                'status' => 'contacted',
                'admin_notes' => 'Amepewa maelezo na amepanga kuitembelea kesho.',
            ]
        );
    }
}

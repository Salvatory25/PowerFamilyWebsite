<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use App\Models\Location;
use App\Models\Plot;
use App\Models\PlotImage;
use App\Models\PlotType;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RelandSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@reland.co.tz'],
            [
                'name' => 'RELAND Administrator',
                'password' => Hash::make('Admin@Reland2026'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings
        $settings = [
            'site_name' => 'RELAND',
            'site_tagline' => 'Premium Plots & Land Opportunities in Arusha',
            'whatsapp_number' => '+255742448965',
            'contact_phone' => '+255 742 448 965',
            'contact_phone_secondary' => '+255 784 123 456',
            'contact_email' => 'info@reland.co.tz',
            'sales_email' => 'sales@reland.co.tz',
            'office_address' => 'Floor 3, TFA Complex, Sokoine Road, Arusha, Tanzania',
            'working_hours' => 'Mon - Sat: 8:00 AM - 6:00 PM',
            'hero_title_en' => 'Find the Right Plot for Your Future.',
            'hero_subtitle_en' => 'Discover verified plots and prime land opportunities in Arusha with RELAND. Clean title deeds, transparent boundary verification, and zero fraud.',
            'hero_title_sw' => 'Pata Kiwanja Sahihi kwa Ajili ya Mustakabali Wako.',
            'hero_subtitle_sw' => 'Gundua viwanja vilivyohakikiwa na fursa bora za ardhi jijini Arusha kupitia RELAND. Hati safi za miliki, ukaguzi wa mipaka, na uhakika bila utapeli.',
            'facebook_url' => 'https://facebook.com/relandtz',
            'instagram_url' => 'https://instagram.com/relandtz',
            'linkedin_url' => 'https://linkedin.com/company/relandtz',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // 3. Plot Types
        $plotTypes = [
            [
                'name_en' => 'Residential',
                'name_sw' => 'Makazi',
                'slug' => 'residential',
                'description' => 'Prime land zoned for luxury homes, estates, private residences, and housing projects.',
                'icon' => 'home',
                'display_order' => 1,
            ],
            [
                'name_en' => 'Commercial',
                'name_sw' => 'Biashara',
                'slug' => 'commercial',
                'description' => 'High-visibility strategic land located along major highways and business nodes for commercial development.',
                'icon' => 'building-storefront',
                'display_order' => 2,
            ],
            [
                'name_en' => 'Mixed Use',
                'name_sw' => 'Mseto (Makazi na Biashara)',
                'slug' => 'mixed-use',
                'description' => 'Versatile plots suitable for combined retail, office, hospitality, and residential development.',
                'icon' => 'squares-plus',
                'display_order' => 3,
            ],
            [
                'name_en' => 'Agricultural',
                'name_sw' => 'Kilimo',
                'slug' => 'agricultural',
                'description' => 'Fertile arable parcels with water access, suitable for horticulture, farming, agro-processing, and country lodges.',
                'icon' => 'sparkles',
                'display_order' => 4,
            ],
        ];

        $createdPlotTypes = [];
        foreach ($plotTypes as $typeData) {
            $createdPlotTypes[$typeData['slug']] = PlotType::updateOrCreate(
                ['slug' => $typeData['slug']],
                $typeData
            );
        }

        // 4. Locations in Arusha
        $locations = [
            [
                'region' => 'Arusha',
                'district' => 'Arusha City',
                'ward' => 'Njiro',
                'area_name' => 'Njiro',
                'slug' => 'njiro-arusha-city',
                'featured_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80',
                'description' => 'Arusha’s most prestigious residential suburb with top international schools, shopping malls, tarmac accessibility, and serene green surroundings.',
                'is_popular' => true,
                'display_order' => 1,
            ],
            [
                'region' => 'Arusha',
                'district' => 'Arusha City',
                'ward' => 'Sakina',
                'area_name' => 'Sakina',
                'slug' => 'sakina-arusha-city',
                'featured_image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80',
                'description' => 'Vibrant, high-demand area with panoramic Mount Meru views, close proximity to Arusha CBD and the Namanga bypass road.',
                'is_popular' => true,
                'display_order' => 2,
            ],
            [
                'region' => 'Arusha',
                'district' => 'Arumeru',
                'ward' => 'Kisongo',
                'area_name' => 'Kisongo',
                'slug' => 'kisongo-arumeru',
                'featured_image' => 'https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?auto=format&fit=crop&w=800&q=80',
                'description' => 'Fast-growing western hub of Arusha near Arusha Airport, Braeburn International, and St. Constantine with high capital appreciation.',
                'is_popular' => true,
                'display_order' => 3,
            ],
            [
                'region' => 'Arusha',
                'district' => 'Arumeru',
                'ward' => 'Poli',
                'area_name' => 'USA River',
                'slug' => 'usa-river-arumeru',
                'featured_image' => 'https://images.unsplash.com/photo-1628624747186-a941c476b7ef?auto=format&fit=crop&w=800&q=80',
                'description' => 'Lush green corridor halfway between Arusha City and Kilimanjaro International Airport (KIA), ideal for luxury lodges and gated country homes.',
                'is_popular' => true,
                'display_order' => 4,
            ],
            [
                'region' => 'Arusha',
                'district' => 'Arusha City',
                'ward' => 'Moshono',
                'area_name' => 'Moshono',
                'slug' => 'moshono-arusha-city',
                'featured_image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=800&q=80',
                'description' => 'Rapidly expanding residential enclave with scenic mountain ridges, cool climate, and easy commute into central Arusha.',
                'is_popular' => true,
                'display_order' => 5,
            ],
            [
                'region' => 'Arusha',
                'district' => 'Arusha City',
                'ward' => 'Themi',
                'area_name' => 'Themi Falls',
                'slug' => 'themi-arusha-city',
                'featured_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
                'description' => 'Central, mature neighborhood offering tranquil river valleys, executive residences, and quick access to diplomatic offices.',
                'is_popular' => false,
                'display_order' => 6,
            ],
            [
                'region' => 'Arusha',
                'district' => 'Karatu',
                'ward' => 'Karatu Mjini',
                'area_name' => 'Karatu Highlands',
                'slug' => 'karatu-highlands',
                'featured_image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=800&q=80',
                'description' => 'The gateway to Ngorongoro and Serengeti. Prime tourism and agricultural land featuring rich volcanic soil and coffee estate vistas.',
                'is_popular' => false,
                'display_order' => 7,
            ],
        ];

        $createdLocations = [];
        foreach ($locations as $locData) {
            $createdLocations[$locData['slug']] = Location::updateOrCreate(
                ['slug' => $locData['slug']],
                $locData
            );
        }

        // 5. Plots Seed Data
        $plotsData = [
            [
                'title' => 'Prime 1,200 SQM Executive Residential Plot in Njiro Hill',
                'slug' => 'prime-1200-sqm-executive-residential-plot-njiro-hill',
                'plot_reference' => 'REL-ARU-0101',
                'plot_type_id' => $createdPlotTypes['residential']->id,
                'location_id' => $createdLocations['njiro-arusha-city']->id,
                'street_address' => 'Near Njiro Shopping Complex, Block C',
                'listing_status' => 'available',
                'price' => 95000000.00,
                'currency' => 'TZS',
                'price_negotiable' => true,
                'plot_size' => 1200.00,
                'size_unit' => 'SQM',
                'dimension_details' => '30m x 40m',
                'ownership_title_type' => 'Clean Title Deed (Hati Miliki - 99 Years)',
                'short_description' => 'Fully surveyed executive plot with breathtaking view of Mt. Meru, tarmac road frontage, electricity and municipal water on-site.',
                'description' => "This prestigious 1,200 SQM residential plot represents a rare opportunity in the heart of Upper Njiro, Arusha. Nestled among luxury private villas and diplomatic residences, the parcel is gently sloping, ensuring unobstructed panoramic views of Mount Meru.\n\nThe property features official beacon markers, a valid 99-year Certificate of Title Deed registered under the Ministry of Lands, and immediate readiness for construction. Tarmac road access leads right to the gate, with TANESCO three-phase power and AUWSA piped water lines running along the boundary.",
                'nearby_landmarks' => '600m from Njiro Complex Mall, 3 mins from St. Constantine International School, 8 mins to Arusha CBD',
                'road_accessibility' => 'Direct Tarmac Road Frontage',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => true,
                'has_fence' => true,
                'topography' => 'Gently Sloping with Elevated Views',
                'latitude' => -3.402150,
                'longitude' => 36.705820,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.402150,36.705820&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'views_count' => 342,
                'gallery' => [
                    'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'title' => 'Strategic 2.5 Acres Commercial Highway Land in Kisongo',
                'slug' => 'strategic-2-5-acres-commercial-highway-land-kisongo',
                'plot_reference' => 'REL-ARU-0102',
                'plot_type_id' => $createdPlotTypes['commercial']->id,
                'location_id' => $createdLocations['kisongo-arumeru']->id,
                'street_address' => 'Dodoma Road Highway Corridor',
                'listing_status' => 'available',
                'price' => 380000000.00,
                'currency' => 'TZS',
                'price_negotiable' => true,
                'plot_size' => 2.50,
                'size_unit' => 'Acres',
                'dimension_details' => 'Approx. 100m Highway Frontage x 101m Depth',
                'ownership_title_type' => 'Commercial Title Deed (Hati ya Biashara - 66 Years)',
                'short_description' => 'High-visibility commercial plot along Dodoma Road, ideal for fuel stations, distribution warehouses, safari vehicle depots, or hospitality ventures.',
                'description' => "Unrivalled commercial parcel spanning 2.5 acres directly facing the expanding Arusha-Dodoma Highway in Kisongo. With heavy safari and commercial transit traffic daily, this land holds exceptional investment potential for logistics companies, hotel chains, educational campuses, or retail shopping hubs.\n\nThe land is flat, dry ground with excellent load-bearing capacity, surveyed with clear boundary beacons, high-capacity TANESCO grid connections nearby, and wide turning radius access suitable for articulated heavy trucks.",
                'nearby_landmarks' => '1.5km from Arusha Airport (ARK), 400m from UN-MICT Junction, opposite Kisongo Trading Center',
                'road_accessibility' => 'Dual Carriage Highway Frontage',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => true,
                'has_fence' => false,
                'topography' => 'Flat & Level Ground',
                'latitude' => -3.376510,
                'longitude' => 36.602140,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.376510,36.602140&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'views_count' => 518,
                'gallery' => [
                    'https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'title' => 'Scenic 800 SQM Mount Meru View Residential Plot in Sakina',
                'slug' => 'scenic-800-sqm-mount-meru-view-residential-plot-sakina',
                'plot_reference' => 'REL-ARU-0103',
                'plot_type_id' => $createdPlotTypes['residential']->id,
                'location_id' => $createdLocations['sakina-arusha-city']->id,
                'street_address' => 'Sakina Heights, Off Nairobi Road',
                'listing_status' => 'available',
                'price' => 65000000.00,
                'currency' => 'TZS',
                'price_negotiable' => false,
                'plot_size' => 800.00,
                'size_unit' => 'SQM',
                'dimension_details' => '20m x 40m',
                'ownership_title_type' => 'Surveyed with Clean Title Deed',
                'short_description' => 'Ready-to-build residential plot with uninterrupted Mount Meru backdrop, secure neighborhood, and perimeter boundary wall.',
                'description' => "Positioned in the tranquil residential zone of Sakina Heights, this 800 SQM property enjoys crisp mountain breeze and full sun exposure. The neighborhood is mature, highly secure, and populated with modern family homes.\n\nAll survey drawings and beacons have been fully verified by RELAND legal conveyancers. Water connection is already plumbed to the plot boundary, and high-speed fiber internet coverage is live in the street.",
                'nearby_landmarks' => '800m from Sakina Supermarket, 5 mins from Mount Meru Hospital, 10 mins to Clock Tower',
                'road_accessibility' => 'Well-maintained All-Weather Paved Access',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => true,
                'has_fence' => true,
                'topography' => 'Level Ground with Natural Greenery',
                'latitude' => -3.351290,
                'longitude' => 36.684120,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.351290,36.684120&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'views_count' => 289,
                'gallery' => [
                    'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'title' => '5 Acres Fertile Agricultural & Eco-Lodge Land in USA River',
                'slug' => '5-acres-fertile-agricultural-eco-lodge-land-usa-river',
                'plot_reference' => 'REL-ARU-0104',
                'plot_type_id' => $createdPlotTypes['agricultural']->id,
                'location_id' => $createdLocations['usa-river-arumeru']->id,
                'street_address' => 'Riverfront Way, Near River Valley',
                'listing_status' => 'available',
                'price' => 220000000.00,
                'currency' => 'TZS',
                'price_negotiable' => true,
                'plot_size' => 5.00,
                'size_unit' => 'Acres',
                'dimension_details' => 'Irregular Riverfront Parcel',
                'ownership_title_type' => 'Customary Right of Occupancy (Clean Village & District Registry)',
                'short_description' => 'Rich volcanic soil with continuous natural river stream boundary, mature indigenous trees, and majestic Kilimanjaro sunrise views.',
                'description' => "An extraordinary 5-acre agricultural haven situated in the scenic lowlands of USA River, Arumeru. Flanked by a permanent fresh water stream, this property is ideally suited for organic horticulture, avocado farming, coffee production, or developing an exclusive boutique eco-tourism lodge.\n\nRich, deep loam soil, year-round gravity-fed irrigation options, and established road access make this an asset of enduring value.",
                'nearby_landmarks' => '4km from Arusha-Moshi Highway, 20 mins to KIA Airport, 15 mins to Arusha National Park gate',
                'road_accessibility' => 'Murram Road Accessible Year-Round',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => false,
                'has_fence' => false,
                'topography' => 'Gentle slope towards crystal riverbank',
                'latitude' => -3.368140,
                'longitude' => 36.852910,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.368140,36.852910&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1628624747186-a941c476b7ef?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'views_count' => 410,
                'gallery' => [
                    'https://images.unsplash.com/photo-1628624747186-a941c476b7ef?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'title' => '1,500 SQM Mixed-Use Development Plot in Moshono Ridge',
                'slug' => '1500-sqm-mixed-use-development-plot-moshono-ridge',
                'plot_reference' => 'REL-ARU-0105',
                'plot_type_id' => $createdPlotTypes['mixed-use']->id,
                'location_id' => $createdLocations['moshono-arusha-city']->id,
                'street_address' => 'Moshono Main Road, Near Secondary School',
                'listing_status' => 'reserved',
                'price' => 78000000.00,
                'currency' => 'TZS',
                'price_negotiable' => true,
                'plot_size' => 1500.00,
                'size_unit' => 'SQM',
                'dimension_details' => '30m x 50m',
                'ownership_title_type' => 'Clean Title Deed (Hati Miliki)',
                'short_description' => 'Versatile plot on main Moshono growth axis, ideal for mixed apartment/retail shops or private educational institution.',
                'description' => "Set within one of Arusha's fastest-appreciating suburbs, this 1,500 SQM plot provides flexible zoning options for multi-unit rental units, commercial shops on ground level, or a private residence.\n\nCurrently marked as RESERVED pending final title conveyancing. Contact our sales desk for queue priority or comparable plots nearby.",
                'nearby_landmarks' => '500m from Moshono Health Center, 10 mins from Kijenge roundabout',
                'road_accessibility' => 'Tarmac Main Road',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => true,
                'has_fence' => true,
                'topography' => 'Flat',
                'latitude' => -3.385410,
                'longitude' => 36.729180,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.385410,36.729180&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => false,
                'is_published' => true,
                'views_count' => 195,
                'gallery' => [
                    'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'title' => '600 SQM Ready Residential Plot in Kisongo Hills',
                'slug' => '600-sqm-ready-residential-plot-kisongo-hills',
                'plot_reference' => 'REL-ARU-0106',
                'plot_type_id' => $createdPlotTypes['residential']->id,
                'location_id' => $createdLocations['kisongo-arumeru']->id,
                'street_address' => 'Braeburn Area, Hillview Phase 2',
                'listing_status' => 'available',
                'price' => 35000000.00,
                'currency' => 'TZS',
                'price_negotiable' => true,
                'plot_size' => 600.00,
                'size_unit' => 'SQM',
                'dimension_details' => '20m x 30m',
                'ownership_title_type' => 'Surveyed with Registered Cadastral Beacons',
                'short_description' => 'Affordable surveyed plot in emerging residential community with electricity poles on the road and easy airport access.',
                'description' => "Affordable entry into Arusha's premium western corridor. This 600 SQM plot is surveyed with registered cadastral beacons, clean ownership records, and straightforward title deed issuance.\n\nGreat neighborhood for building a first family home or holding as a high-growth capital asset.",
                'nearby_landmarks' => '2km from Braeburn School, 7 mins from Kisongo Market',
                'road_accessibility' => 'Graded Murram Road (100m to Tarmac)',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => false,
                'has_fence' => false,
                'topography' => 'Gently Sloping with Great Airflow',
                'latitude' => -3.379200,
                'longitude' => 36.598400,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.379200,36.598400&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => false,
                'is_published' => true,
                'views_count' => 170,
                'gallery' => [
                    'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'title' => '10 Acres Prime Tourism & Farming Estate in Karatu',
                'slug' => '10-acres-prime-tourism-farming-estate-karatu',
                'plot_reference' => 'REL-ARU-0107',
                'plot_type_id' => $createdPlotTypes['agricultural']->id,
                'location_id' => $createdLocations['karatu-highlands']->id,
                'street_address' => 'Ngorongoro Road, Rhotia Valley',
                'listing_status' => 'available',
                'price' => 450000000.00,
                'currency' => 'TZS',
                'price_negotiable' => true,
                'plot_size' => 10.00,
                'size_unit' => 'Acres',
                'dimension_details' => 'Large Agricultural Block',
                'ownership_title_type' => 'Clean Title Deed (99 Years)',
                'short_description' => 'World-class safari circuit parcel with coffee plantation heritage, panoramic caldera views, and tourism lodge permissions.',
                'description' => "Positioned on the scenic slopes of Karatu overlooking the Ngorongoro conservation forest corridor, this 10-acre estate provides the ultimate canvas for a high-end luxury safari tented camp, luxury lodge, or commercial organic agriculture.\n\nWater borehole already drilled on-site with high flow capacity, electricity transformer on adjacent boundary, and freehold-converted title documentation.",
                'nearby_landmarks' => '15 mins to Ngorongoro Conservation Area Loduare Gate, 5 mins from Rhotia Center',
                'road_accessibility' => 'Tarmac Safari Highway Connection',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => true,
                'has_fence' => true,
                'topography' => 'Terraced Mountain Views',
                'latitude' => -3.332500,
                'longitude' => 35.845100,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.332500,35.845100&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'views_count' => 612,
                'gallery' => [
                    'https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'title' => '2,000 SQM Commercial Plot in Themi River Valley',
                'slug' => '2000-sqm-commercial-plot-themi-river-valley',
                'plot_reference' => 'REL-ARU-0108',
                'plot_type_id' => $createdPlotTypes['commercial']->id,
                'location_id' => $createdLocations['themi-arusha-city']->id,
                'street_address' => 'Old Moshi Road, Themi',
                'listing_status' => 'sold',
                'price' => 160000000.00,
                'currency' => 'TZS',
                'price_negotiable' => false,
                'plot_size' => 2000.00,
                'size_unit' => 'SQM',
                'dimension_details' => '40m x 50m',
                'ownership_title_type' => 'Clean Title Deed (Hati Miliki)',
                'short_description' => 'Successfully closed and verified transaction by RELAND. Commercial plot sold for corporate headquarters.',
                'description' => "This prime 2,000 SQM commercial property was verified and successfully closed by RELAND conveyancing team with complete title transfer.\n\nBrowse other available commercial plots or contact us to list your property.",
                'nearby_landmarks' => 'Near Themi Living Garden, 3 mins from Arusha Regional Commissioner Office',
                'road_accessibility' => 'Tarmac Road Frontage',
                'has_electricity' => true,
                'has_water' => true,
                'has_internet' => true,
                'has_fence' => true,
                'topography' => 'Flat',
                'latitude' => -3.371200,
                'longitude' => 36.691400,
                'google_maps_embed_url' => 'https://maps.google.com/maps?q=-3.371200,36.691400&z=15&output=embed',
                'featured_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => false,
                'is_published' => true,
                'views_count' => 430,
                'gallery' => [
                    'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
        ];

        foreach ($plotsData as $pData) {
            $gallery = $pData['gallery'] ?? [];
            unset($pData['gallery']);

            $plot = Plot::updateOrCreate(
                ['slug' => $pData['slug']],
                $pData
            );

            // Add gallery images
            foreach ($gallery as $idx => $imgUrl) {
                PlotImage::firstOrCreate([
                    'plot_id' => $plot->id,
                    'image_path' => $imgUrl,
                ], [
                    'caption' => $plot->title . ' - View ' . ($idx + 1),
                    'is_primary' => $idx === 0,
                    'display_order' => $idx,
                ]);
            }
        }

        // 6. Sample Enquiries
        $firstPlot = Plot::first();
        if ($firstPlot) {
            Enquiry::create([
                'plot_id' => $firstPlot->id,
                'name' => 'Dr. Emmanuel Mrema',
                'phone' => '+255754112233',
                'email' => 'emmanuel.mrema@gmail.com',
                'preferred_contact_method' => 'whatsapp',
                'message' => 'Hello, I would like to schedule a site visit this Saturday morning for Plot REF: ' . $firstPlot->plot_reference . ' in Njiro. Please confirm beacon status and road access.',
                'status' => 'site_visit_scheduled',
                'admin_notes' => 'Client contacted via WhatsApp. Site visit set for Saturday 10:00 AM.',
            ]);

            Enquiry::create([
                'plot_id' => null,
                'name' => 'Sarah Kimberly',
                'phone' => '+255768998877',
                'email' => 'sarah.k@investors.co.tz',
                'preferred_contact_method' => 'phone',
                'message' => 'Looking for a 2-5 acre commercial parcel in Kisongo or USA River for a light assembly facility. Budget is flexible.',
                'status' => 'new',
                'admin_notes' => null,
            ]);
        }
    }
}

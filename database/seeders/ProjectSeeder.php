<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Njiro Hill Cadastral Boundary Survey & Beacon Monumentation',
                'slug' => 'njiro-hill-cadastral-boundary-survey',
                'location_name' => 'Njiro, Arusha City',
                'project_type' => 'Cadastral Surveying',
                'short_description' => 'Comprehensive cadastral boundary retracement, millimeter-precision RTK beacon planting, and deed plan preparation for a 45-acre residential development.',
                'description' => "Our team was contracted to undertake comprehensive boundary retracement and cadastral surveying for an upscale residential neighborhood in Njiro Hill, Arusha.\n\nThe project involved geodetic control point establishment, GNSS RTK survey of 72 individual plots, resolution of 3 boundary overlaps through local community consensus, and the planting of reinforced concrete beacons.\n\nAll Deed Plans were successfully approved and registered under the Ministry of Lands, Housing and Human Settlements Development.",
                'services_performed' => ['Cadastral Surveying', 'Boundary Demarcation', 'Deed Plan Preparation', 'RTK GNSS Mapping'],
                'project_status' => 'completed',
                'client_type' => 'Private Landowners Association',
                'size_covered' => '45 Acres (72 Plots)',
                'completion_date' => '2026-02-15',
                'latitude' => -3.4124000,
                'longitude' => 36.7012000,
                'featured_image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'gallery' => [
                    'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1541888946425-d0fbb18086f6?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'name' => 'Kisongo Special Commercial & Industrial Subdivision Scheme',
                'slug' => 'kisongo-commercial-industrial-subdivision',
                'location_name' => 'Kisongo Corridor, Arusha',
                'project_type' => 'Land Subdivision',
                'short_description' => 'Master planning, internal road reservation layout, and commercial parcel subdivision for high-yield logistics and warehousing operations.',
                'description' => "Situated along the high-growth Arusha-Namanga corridor in Kisongo, RELAND designed and implemented a premier commercial subdivision master scheme across 120 hectares.\n\nOur urban planners allocated 20m and 15m primary feeder roads, designated green reserves, and partitioned 38 commercial parcels with individual cadastral deed plans.\n\nEach plot was surveyed and demarcated with official survey beacons, enabling buyers to secure Clean Title Deeds directly from the Ministry of Lands.",
                'services_performed' => ['Master Town Planning', 'Plot Subdivision', 'Road Reserve Zoning', 'Cadastral Surveying'],
                'project_status' => 'completed',
                'client_type' => 'Corporate Industrial Developer',
                'size_covered' => '120 Hectares (38 Commercial Parcels)',
                'completion_date' => '2025-11-20',
                'latitude' => -3.3768000,
                'longitude' => 36.5984000,
                'featured_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'gallery' => [
                    'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'name' => 'Sakina-Olasiti Settlement Formalization (Urasimishaji)',
                'slug' => 'sakina-olasiti-settlement-formalization',
                'location_name' => 'Sakina / Olasiti, Arusha',
                'project_type' => 'Land Formalization',
                'short_description' => 'Large-scale settlement regularization converting informal properties into formally surveyed plots with Certificate of Customary Rights of Occupancy (CCRO) & Titles.',
                'description' => "RELAND spearheaded the formalization and settlement upgrading of over 210 residential and commercial properties in the Sakina-Olasiti expansion corridor.\n\nIn collaboration with Arusha City Council and Mtaa leaders, our team mapped existing structures, regularized internal access streets, negotiated boundary alignments, and facilitated Title Deed processing for all participating property owners.",
                'services_performed' => ['Land Formalization', 'Town Planning Layout', 'Community Mapping', 'Title Deed Facilitation'],
                'project_status' => 'completed',
                'client_type' => 'Community & Municipal Partnership',
                'size_covered' => '210 Parcels',
                'completion_date' => '2025-08-10',
                'latitude' => -3.3512000,
                'longitude' => 36.6789000,
                'featured_image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb18086f6?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'gallery' => [
                    'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'name' => 'USA River Estate Subdivision & Topographic Contour Survey',
                'slug' => 'usa-river-estate-subdivision-survey',
                'location_name' => 'USA River, Meru District',
                'project_type' => 'Topographical & Subdivision',
                'short_description' => 'Contour mapping and residential subdivision design with panoramic views of Mount Meru and Mount Kilimanjaro.',
                'description' => "A serene 60-acre greenfield property in USA River required precision topographical contouring to optimize gravity-fed drainage, road slopes, and plot orientation toward Mount Meru views.\n\nRELAND delivered 1-meter contour elevation maps, designed an eco-friendly 42-lot subdivision scheme, and completed cadastral beacon monumentation.",
                'services_performed' => ['Topographical Surveying', 'Contour Mapping', 'Plot Subdivision', 'Drainage Alignment'],
                'project_status' => 'completed',
                'client_type' => 'Private Estate Developer',
                'size_covered' => '60 Acres (42 Prime Plots)',
                'completion_date' => '2026-01-30',
                'latitude' => -3.3670000,
                'longitude' => 36.8520000,
                'featured_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'is_published' => true,
                'gallery' => [
                    'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
                ]
            ],
            [
                'name' => 'Moshono Agricultural & Farm Perimeter Demarcation',
                'slug' => 'moshono-agricultural-perimeter-demarcation',
                'location_name' => 'Moshono, Arusha',
                'project_type' => 'Boundary Demarcation',
                'short_description' => 'Precision boundary retracement, beacon replacement, and perimeter buffer verification for agricultural holdings.',
                'description' => "Following historical beacon loss, RELAND was retained to retrace, verify, and replant 28 standard cadastral concrete beacons across an 80-acre commercial farming property in Moshono.\n\nUsing national geodetic base stations and GNSS rovers, boundary points were re-established to within 5mm accuracy, officially signed by neighboring owners and the Ward Executive Officer.",
                'services_performed' => ['Boundary Retracement', 'Beacon Monumentation', 'Dispute Resolution', 'Surveyor Certification'],
                'project_status' => 'completed',
                'client_type' => 'Commercial Farm Enterprise',
                'size_covered' => '80 Acres',
                'completion_date' => '2025-06-18',
                'latitude' => -3.3910000,
                'longitude' => 36.7320000,
                'featured_image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => false,
                'is_published' => true,
                'gallery' => []
            ]
        ];

        foreach ($projects as $projData) {
            $gallery = $projData['gallery'] ?? [];
            unset($projData['gallery']);

            $project = Project::updateOrCreate(
                ['slug' => $projData['slug']],
                $projData
            );

            foreach ($gallery as $idx => $img) {
                ProjectImage::updateOrCreate([
                    'project_id' => $project->id,
                    'image_path' => $img,
                ], [
                    'display_order' => $idx + 1,
                    'is_primary' => $idx === 0,
                ]);
            }
        }
    }
}

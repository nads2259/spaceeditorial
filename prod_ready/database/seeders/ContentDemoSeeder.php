<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ContentDemoSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Launch Systems',
                'slug' => 'launch-systems',
                'description' => 'Heavy-lift, reusable, and emerging launch platforms that redefine how payloads reach orbit.',
                'image' => null,
                'subcategories' => [
                    [
                        'name' => 'Heavy Lift',
                        'slug' => 'heavy-lift',
                        'description' => 'Large boosters designed for flagship payloads and lunar logistics.',
                    ],
                    [
                        'name' => 'Reusable Vehicles',
                        'slug' => 'reusable-vehicles',
                        'description' => 'Systems engineered for rapid turnaround and lower launch costs.',
                    ],
                ],
                'posts' => [
                    [
                        'title' => 'Ariane 6 enters final rehearsal for maiden flight',
                        'excerpt' => 'ESA and ArianeGroup complete the final rehearsal ahead of Ariane 6’s inaugural mission.',
                        'body' => <<<'HTML'
<p>ArianeGroup has completed a comprehensive wet-dress rehearsal for the Ariane 6 ahead of the launcher’s maiden flight from Kourou. Teams rehearsed the entire countdown sequence, validating fueling, telemetry, and joint operations with the John F. Kennedy Flight Dynamics team.</p>
<p>The European heavy-lift launcher is expected to fill the gap left by Ariane 5, offering dual-launch capability and upgraded avionics. Mission managers are targeting a launch window in the coming quarter pending final range availability.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'ESA Briefing',
                        'original_url' => 'https://www.esa.int/Enabling_Support/Space_Transportation/Ariane_6_rehearsal',
                        'subcategory_slug' => 'heavy-lift',
                        'published_offset_days' => 2,
                    ],
                    [
                        'title' => 'Starship Flight 5 focuses on payload recovery techniques',
                        'excerpt' => 'SpaceX devotes its next integrated test flight to validating payload recovery and thermal protection upgrades.',
                        'body' => <<<'HTML'
<p>SpaceX has detailed objectives for Starship’s fifth integrated test, prioritising payload bay refurbishment procedures and enhanced heat shield tile performance. The mission will attempt a controlled splashdown of the Super Heavy booster and a skip re-entry for the Ship to refine thermal modelling.</p>
<p>Insights from Flight 4 highlighted the need for improved tile retention at peak heating. Engineers now employ a revised mounting scheme informed by computational fluid dynamics runs carried out earlier this month.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1581091870555-19753e83d83d?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'SpaceX Flight Update',
                        'original_url' => 'https://www.spacex.com/updates/starship-flight-5',
                        'subcategory_slug' => 'reusable-vehicles',
                        'published_offset_days' => 5,
                    ],
                    [
                        'title' => 'Blue Origin outlines New Glenn manifest for 2026',
                        'excerpt' => 'New Glenn secures a constellation deployment and NASA lunar support missions in newly published manifest.',
                        'body' => <<<'HTML'
<p>Blue Origin has published a preliminary manifest for New Glenn as it approaches first flight readiness. The manifest includes a constellation deployment for Kuiper, a NASA lunar Gateway logistics payload, and two commercial science missions.</p>
<p>The company is finalising qualification testing for the BE-4 engines while expanding production capacity at Launch Complex 36 to support a six-launch annual cadence.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'Blue Origin Press',
                        'original_url' => 'https://www.blueorigin.com/news/new-glenn-2026-manifest',
                        'subcategory_slug' => 'heavy-lift',
                        'published_offset_days' => 9,
                    ],
                ],
            ],
            [
                'name' => 'Earth Observation',
                'slug' => 'earth-observation',
                'description' => 'Satellites and constellations delivering climate, maritime, and infrastructure intelligence.',
                'image' => null,
                'subcategories' => [
                    [
                        'name' => 'Climate Monitoring',
                        'slug' => 'climate-monitoring',
                        'description' => 'Tracking atmospheric and oceanic change at global scale.',
                    ],
                    [
                        'name' => 'Commercial Imagery',
                        'slug' => 'commercial-imagery',
                        'description' => 'High-resolution optical and SAR providers serving enterprise customers.',
                    ],
                ],
                'posts' => [
                    [
                        'title' => 'Copernicus L-band radar ready for launch campaign',
                        'excerpt' => 'ESA validates the ROSE-L L-band radar satellite for shipment to the Plesetsk launch site.',
                        'body' => <<<'HTML'
<p>The Copernicus ROSE-L satellite has completed system validation, preparing for environmental testing ahead of launch. The L-band radar mission will deliver metre-scale data for forestry and soil moisture monitoring, complementing the Sentinel-1 C-band constellation.</p>
<p>Mission planners emphasise the importance of L-band for detecting biomass fluctuations and coastal change. Data will be made available to Copernicus services and commercial partners within six months of commissioning.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'Copernicus Programme Office',
                        'original_url' => 'https://www.esa.int/Applications/Observing_the_Earth/Copernicus/ROSE-L_campaign',
                        'subcategory_slug' => 'climate-monitoring',
                        'published_offset_days' => 4,
                    ],
                    [
                        'title' => 'PlanetScope adds daily thermal monitoring to constellation',
                        'excerpt' => 'Planet Labs integrates thermal infrared sensors across select buses to support energy analytics.',
                        'body' => <<<'HTML'
<p>Planet Labs is rolling out a thermal infrared upgrade for its PlanetScope fleet, enabling customers to monitor industrial heat signatures and urban energy efficiency. The enhancement pairs with existing RGB imaging to create multispectral analytics offerings.</p>
<p>Initial demonstrations with European utilities showcased the ability to flag heat loss across district heating infrastructure, unlocking new subscription services for the operator.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1581094368330-82d20bb56362?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'Planet Insights',
                        'original_url' => 'https://www.planet.com/pulse/thermal-upgrade',
                        'subcategory_slug' => 'commercial-imagery',
                        'published_offset_days' => 7,
                    ],
                    [
                        'title' => 'Iceye expands flood monitoring service to Southeast Asia',
                        'excerpt' => 'Persistent SAR revisits provide sub-daily flood intelligence for insurers and emergency teams.',
                        'body' => <<<'HTML'
<p>Iceye is expanding its flood monitoring service across Southeast Asia, offering insurers and emergency agencies sub-daily situational awareness. The synthetic aperture radar constellation is capable of capturing data at night and through dense cloud cover, making it invaluable for monsoon seasons.</p>
<p>The service integrates hydrological models with near real-time tasking, reducing loss assessment times from weeks to days for participating insurers.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'Iceye Briefings',
                        'original_url' => 'https://www.iceye.com/news/flood-monitoring-asean',
                        'subcategory_slug' => 'commercial-imagery',
                        'published_offset_days' => 11,
                    ],
                ],
            ],
            [
                'name' => 'Deep Space Missions',
                'slug' => 'deep-space-missions',
                'description' => 'Exploration architectures targeting the Moon, Mars, and outer planets.',
                'image' => null,
                'subcategories' => [
                    [
                        'name' => 'Lunar Operations',
                        'slug' => 'lunar-operations',
                        'description' => 'Surface logistics, communications, and power systems for the Moon.',
                    ],
                    [
                        'name' => 'Mars Campaigns',
                        'slug' => 'mars-campaigns',
                        'description' => 'Orbiters, landers, and sample-return architectures headed for Mars.',
                    ],
                ],
                'posts' => [
                    [
                        'title' => 'NASA selects power relay for Artemis surface assets',
                        'excerpt' => 'The Power Relay and Avionics Module will sustain long-duration surface missions at the lunar south pole.',
                        'body' => <<<'HTML'
<p>NASA has selected a consortium led by Intuitive Machines to deliver the Power Relay and Avionics Module, ensuring continuous energy distribution for Artemis surface operations. The system will leverage kilopower reactors and wireless inductive pads to support rovers and habitats.</p>
<p>The first deployment is slated for Artemis V, integrating with the Lunar Terrain Vehicle and foundation habitat prototypes.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'NASA Exploration Systems',
                        'original_url' => 'https://www.nasa.gov/artemis/power-relay-module',
                        'subcategory_slug' => 'lunar-operations',
                        'published_offset_days' => 3,
                    ],
                    [
                        'title' => 'ESA finalises Sample Transfer Arm for Mars Sample Return',
                        'excerpt' => 'New robotic arm will retrieve sample tubes from the Perseverance rover’s cache for ascent vehicle integration.',
                        'body' => <<<'HTML'
<p>ESA engineers completed functional testing of the Sample Transfer Arm that will fly on NASA’s Sample Retrieval Lander. The robot is designed to autonomously collect sample tubes cached by Perseverance, inserting them into the Mars Ascent Vehicle for launch into orbit.</p>
<p>The arm uses redundant vision systems and haptic feedback to handle tubes in low temperatures while mitigating dust accumulation.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'ESA Exploration',
                        'original_url' => 'https://www.esa.int/Science_Exploration/Human_and_Robotic_Exploration/Mars_Sample_Return',
                        'subcategory_slug' => 'mars-campaigns',
                        'published_offset_days' => 6,
                    ],
                    [
                        'title' => 'JAXA and ISRO design joint mission to Martian moons',
                        'excerpt' => 'Updated Martian Moons eXploration architecture leverages Indian launch vehicles for sample-return support.',
                        'body' => <<<'HTML'
<p>JAXA and ISRO have outlined a collaborative roadmap extending the Martian Moons eXploration (MMX) mission. The agencies will co-develop a sample analysis lab and share launch infrastructure to reduce programme risk.</p>
<p>Mission planners are evaluating GSLV Mk III launch services to complement Japanese capabilities, targeting a dual-launch profile for redundancy.</p>
HTML,
                        'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&q=80',
                        'source' => 'JAXA Press Centre',
                        'original_url' => 'https://global.jaxa.jp/press/2025/mmx-collaboration',
                        'subcategory_slug' => 'mars-campaigns',
                        'published_offset_days' => 10,
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryIndex => $categoryData) {
            $category = Category::query()->updateOrCreate(
                ['slug' => $categoryData['slug']],
                [
                    'name' => $categoryData['name'],
                    'description' => $categoryData['description'],
                    'image_path' => $categoryData['image'] ?? null,
                    'is_active' => true,
                    'sort_order' => $categoryIndex,
                ]
            );

            $subcategoryIds = [];

            foreach ($categoryData['subcategories'] as $subIndex => $subcategoryData) {
                $subcategory = Subcategory::query()->updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'slug' => $subcategoryData['slug'],
                    ],
                    [
                        'name' => $subcategoryData['name'],
                        'description' => $subcategoryData['description'] ?? null,
                        'image_path' => $subcategoryData['image'] ?? null,
                        'is_active' => true,
                        'sort_order' => $subIndex,
                    ]
                );

                $subcategoryIds[$subcategoryData['slug']] = $subcategory->id;
            }

            foreach ($categoryData['posts'] as $postIndex => $postData) {
                $slug = Str::slug($postData['title']);
                $publishedAt = Carbon::now()->subDays($postData['published_offset_days'] ?? ($postIndex + 1));
                $body = trim($postData['body']);
                $excerpt = $postData['excerpt'] ?? Str::limit(strip_tags($body), 220);
                $subcategoryId = ! empty($postData['subcategory_slug'])
                    ? ($subcategoryIds[$postData['subcategory_slug']] ?? null)
                    : null;
                $originalUrl = $postData['original_url'] ?? "https://spaceeditorial.test/articles/{$slug}";
                $contentHash = hash('sha256', $slug.'|'.$originalUrl);

                Post::query()->updateOrCreate(
                    ['slug' => $slug],
                    [
                        'category_id' => $category->id,
                        'subcategory_id' => $subcategoryId,
                        'external_source_id' => null,
                        'external_id' => null,
                        'content_hash' => $contentHash,
                        'title' => $postData['title'],
                        'excerpt' => $excerpt,
                        'body' => $body,
                        'image_path' => $postData['image'] ?? null,
                        'original_url' => $originalUrl,
                        'is_published' => true,
                        'published_at' => $publishedAt,
                        'imported_at' => $publishedAt,
                        'meta' => [
                            'has_full_content' => true,
                            'source' => $postData['source'] ?? 'Space Editorial Demo Desk',
                            'source_name' => $postData['source'] ?? 'Space Editorial Demo Desk',
                            'author' => 'Space Editorial Analysts',
                        ],
                    ]
                );
            }
        }

        $brandingPayload = [
            'logo_text' => 'Space Editorial',
            'accent_color' => '#4f46e5',
            'background_color' => '#f8fafc',
        ];

        if (Schema::hasColumns('site_settings', ['created_at', 'updated_at'])) {
            SiteSetting::query()->updateOrCreate(
                ['key' => 'branding'],
                ['value' => $brandingPayload]
            );
        } else {
            DB::table('site_settings')->updateOrInsert(
                ['key' => 'branding'],
                ['value' => json_encode($brandingPayload, JSON_THROW_ON_ERROR)]
            );
        }
    }
}

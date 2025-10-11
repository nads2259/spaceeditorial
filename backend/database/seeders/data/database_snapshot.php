<?php

return [
    'categories' => [
        [
            'id' => 1,
            'name' => 'Launch Systems',
            'slug' => 'launch-systems',
            'description' => 'Heavy-lift, reusable, and emerging launch platforms that redefine how payloads reach orbit.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 0,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 2,
            'name' => 'Earth Observation',
            'slug' => 'earth-observation',
            'description' => 'Satellites and constellations delivering climate, maritime, and infrastructure intelligence.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 1,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 3,
            'name' => 'Deep Space Missions',
            'slug' => 'deep-space-missions',
            'description' => 'Exploration architectures targeting the Moon, Mars, and outer planets.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 2,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
    ],
    'subcategories' => [
        [
            'id' => 1,
            'category_id' => 1,
            'name' => 'Heavy Lift',
            'slug' => 'heavy-lift',
            'description' => 'Large boosters designed for flagship payloads and lunar logistics.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 0,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'name' => 'Reusable Vehicles',
            'slug' => 'reusable-vehicles',
            'description' => 'Systems engineered for rapid turnaround and lower launch costs.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 1,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 3,
            'category_id' => 2,
            'name' => 'Climate Monitoring',
            'slug' => 'climate-monitoring',
            'description' => 'Tracking atmospheric and oceanic change at global scale.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 0,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 4,
            'category_id' => 2,
            'name' => 'Commercial Imagery',
            'slug' => 'commercial-imagery',
            'description' => 'High-resolution optical and SAR providers serving enterprise customers.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 1,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 5,
            'category_id' => 3,
            'name' => 'Lunar Operations',
            'slug' => 'lunar-operations',
            'description' => 'Surface logistics, communications, and power systems for the Moon.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 0,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 6,
            'category_id' => 3,
            'name' => 'Mars Campaigns',
            'slug' => 'mars-campaigns',
            'description' => 'Orbiters, landers, and sample-return architectures headed for Mars.',
            'image_path' => null,
            'is_active' => 1,
            'sort_order' => 1,
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
    ],
    'posts' => [
        [
            'id' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => 'cebeba73e2406436043c461e0e9601c92e75c185210d74f79becc03e8093b9f8',
            'title' => 'Ariane 6 enters final rehearsal for maiden flight',
            'slug' => 'ariane-6-enters-final-rehearsal-for-maiden-flight',
            'excerpt' => 'ESA and ArianeGroup complete the final rehearsal ahead of Ariane 6’s inaugural mission.',
            'body' => '<p>ArianeGroup has completed a comprehensive wet-dress rehearsal for the Ariane 6 ahead of the launcher’s maiden flight from Kourou. Teams rehearsed the entire countdown sequence, validating fueling, telemetry, and joint operations with the John F. Kennedy Flight Dynamics team.</p>
<p>The European heavy-lift launcher is expected to fill the gap left by Ariane 5, offering dual-launch capability and upgraded avionics. Mission managers are targeting a launch window in the coming quarter pending final range availability.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.esa.int/Enabling_Support/Space_Transportation/Ariane_6_rehearsal',
            'is_published' => 1,
            'published_at' => '2025-09-26 12:21:56',
            'imported_at' => '2025-09-26 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "ESA Briefing", "source_name": "ESA Briefing", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'subcategory_id' => 2,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => '3c26bce368cb1b9e05b38b7388104bb04aa73787f96e8ca73e6a25d3bd9a2d90',
            'title' => 'Starship Flight 5 focuses on payload recovery techniques',
            'slug' => 'starship-flight-5-focuses-on-payload-recovery-techniques',
            'excerpt' => 'SpaceX devotes its next integrated test flight to validating payload recovery and thermal protection upgrades.',
            'body' => '<p>SpaceX has detailed objectives for Starship’s fifth integrated test, prioritising payload bay refurbishment procedures and enhanced heat shield tile performance. The mission will attempt a controlled splashdown of the Super Heavy booster and a skip re-entry for the Ship to refine thermal modelling.</p>
<p>Insights from Flight 4 highlighted the need for improved tile retention at peak heating. Engineers now employ a revised mounting scheme informed by computational fluid dynamics runs carried out earlier this month.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1581091870555-19753e83d83d?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.spacex.com/updates/starship-flight-5',
            'is_published' => 1,
            'published_at' => '2025-09-23 12:21:56',
            'imported_at' => '2025-09-23 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "SpaceX Flight Update", "source_name": "SpaceX Flight Update", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 3,
            'category_id' => 1,
            'subcategory_id' => 1,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => 'd3a5ac8ee26b322fb7e16499040bb6fa4509e4ba7d25106b1c2689f443556a88',
            'title' => 'Blue Origin outlines New Glenn manifest for 2026',
            'slug' => 'blue-origin-outlines-new-glenn-manifest-for-2026',
            'excerpt' => 'New Glenn secures a constellation deployment and NASA lunar support missions in newly published manifest.',
            'body' => '<p>Blue Origin has published a preliminary manifest for New Glenn as it approaches first flight readiness. The manifest includes a constellation deployment for Kuiper, a NASA lunar Gateway logistics payload, and two commercial science missions.</p>
<p>The company is finalising qualification testing for the BE-4 engines while expanding production capacity at Launch Complex 36 to support a six-launch annual cadence.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.blueorigin.com/news/new-glenn-2026-manifest',
            'is_published' => 1,
            'published_at' => '2025-09-19 12:21:56',
            'imported_at' => '2025-09-19 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "Blue Origin Press", "source_name": "Blue Origin Press", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 4,
            'category_id' => 2,
            'subcategory_id' => 3,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => 'c85b0eb4103d5c275284c190659f00d8cc822580300e2437dbb600f62c90ab78',
            'title' => 'Copernicus L-band radar ready for launch campaign',
            'slug' => 'copernicus-l-band-radar-ready-for-launch-campaign',
            'excerpt' => 'ESA validates the ROSE-L L-band radar satellite for shipment to the Plesetsk launch site.',
            'body' => '<p>The Copernicus ROSE-L satellite has completed system validation, preparing for environmental testing ahead of launch. The L-band radar mission will deliver metre-scale data for forestry and soil moisture monitoring, complementing the Sentinel-1 C-band constellation.</p>
<p>Mission planners emphasise the importance of L-band for detecting biomass fluctuations and coastal change. Data will be made available to Copernicus services and commercial partners within six months of commissioning.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.esa.int/Applications/Observing_the_Earth/Copernicus/ROSE-L_campaign',
            'is_published' => 1,
            'published_at' => '2025-09-24 12:21:56',
            'imported_at' => '2025-09-24 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "Copernicus Programme Office", "source_name": "Copernicus Programme Office", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 5,
            'category_id' => 2,
            'subcategory_id' => 4,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => '4a3ce61a0ea6f68f1c19fea7addfea91e017ee2f9ed80da8f877d6ad40f4dcaf',
            'title' => 'PlanetScope adds daily thermal monitoring to constellation',
            'slug' => 'planetscope-adds-daily-thermal-monitoring-to-constellation',
            'excerpt' => 'Planet Labs integrates thermal infrared sensors across select buses to support energy analytics.',
            'body' => '<p>Planet Labs is rolling out a thermal infrared upgrade for its PlanetScope fleet, enabling customers to monitor industrial heat signatures and urban energy efficiency. The enhancement pairs with existing RGB imaging to create multispectral analytics offerings.</p>
<p>Initial demonstrations with European utilities showcased the ability to flag heat loss across district heating infrastructure, unlocking new subscription services for the operator.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1581094368330-82d20bb56362?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.planet.com/pulse/thermal-upgrade',
            'is_published' => 1,
            'published_at' => '2025-09-21 12:21:56',
            'imported_at' => '2025-09-21 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "Planet Insights", "source_name": "Planet Insights", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 6,
            'category_id' => 2,
            'subcategory_id' => 4,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => '4b7f901f80faaabfcb2fe28e88f9b2ba1733e0a8e64ea4a8aa0011671e5418f9',
            'title' => 'Iceye expands flood monitoring service to Southeast Asia',
            'slug' => 'iceye-expands-flood-monitoring-service-to-southeast-asia',
            'excerpt' => 'Persistent SAR revisits provide sub-daily flood intelligence for insurers and emergency teams.',
            'body' => '<p>Iceye is expanding its flood monitoring service across Southeast Asia, offering insurers and emergency agencies sub-daily situational awareness. The synthetic aperture radar constellation is capable of capturing data at night and through dense cloud cover, making it invaluable for monsoon seasons.</p>
<p>The service integrates hydrological models with near real-time tasking, reducing loss assessment times from weeks to days for participating insurers.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.iceye.com/news/flood-monitoring-asean',
            'is_published' => 1,
            'published_at' => '2025-09-17 12:21:56',
            'imported_at' => '2025-09-17 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "Iceye Briefings", "source_name": "Iceye Briefings", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 7,
            'category_id' => 3,
            'subcategory_id' => 5,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => 'e54ca2cb0dbae14834ef9c4571869711a0d384388f96dea8d6d6cfc6bd63ffab',
            'title' => 'NASA selects power relay for Artemis surface assets',
            'slug' => 'nasa-selects-power-relay-for-artemis-surface-assets',
            'excerpt' => 'The Power Relay and Avionics Module will sustain long-duration surface missions at the lunar south pole.',
            'body' => '<p>NASA has selected a consortium led by Intuitive Machines to deliver the Power Relay and Avionics Module, ensuring continuous energy distribution for Artemis surface operations. The system will leverage kilopower reactors and wireless inductive pads to support rovers and habitats.</p>
<p>The first deployment is slated for Artemis V, integrating with the Lunar Terrain Vehicle and foundation habitat prototypes.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.nasa.gov/artemis/power-relay-module',
            'is_published' => 1,
            'published_at' => '2025-09-25 12:21:56',
            'imported_at' => '2025-09-25 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "NASA Exploration Systems", "source_name": "NASA Exploration Systems", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 8,
            'category_id' => 3,
            'subcategory_id' => 6,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => 'e151d78f561de7594a7bdefc1a5059fbbeeeac4271ed2b37208978aea2f96a8e',
            'title' => 'ESA finalises Sample Transfer Arm for Mars Sample Return',
            'slug' => 'esa-finalises-sample-transfer-arm-for-mars-sample-return',
            'excerpt' => 'New robotic arm will retrieve sample tubes from the Perseverance rover’s cache for ascent vehicle integration.',
            'body' => '<p>ESA engineers completed functional testing of the Sample Transfer Arm that will fly on NASA’s Sample Retrieval Lander. The robot is designed to autonomously collect sample tubes cached by Perseverance, inserting them into the Mars Ascent Vehicle for launch into orbit.</p>
<p>The arm uses redundant vision systems and haptic feedback to handle tubes in low temperatures while mitigating dust accumulation.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://www.esa.int/Science_Exploration/Human_and_Robotic_Exploration/Mars_Sample_Return',
            'is_published' => 1,
            'published_at' => '2025-09-22 12:21:56',
            'imported_at' => '2025-09-22 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "ESA Exploration", "source_name": "ESA Exploration", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 9,
            'category_id' => 3,
            'subcategory_id' => 6,
            'external_source_id' => null,
            'external_id' => null,
            'content_hash' => '2c3fa1d07711f84721fc38d7a626ccba30ebf8ab1d3643a39c50170a28fb327a',
            'title' => 'JAXA and ISRO design joint mission to Martian moons',
            'slug' => 'jaxa-and-isro-design-joint-mission-to-martian-moons',
            'excerpt' => 'Updated Martian Moons eXploration architecture leverages Indian launch vehicles for sample-return support.',
            'body' => '<p>JAXA and ISRO have outlined a collaborative roadmap extending the Martian Moons eXploration (MMX) mission. The agencies will co-develop a sample analysis lab and share launch infrastructure to reduce programme risk.</p>
<p>Mission planners are evaluating GSLV Mk III launch services to complement Japanese capabilities, targeting a dual-launch profile for redundancy.</p>',
            'image_path' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&q=80',
            'original_url' => 'https://global.jaxa.jp/press/2025/mmx-collaboration',
            'is_published' => 1,
            'published_at' => '2025-09-18 12:21:56',
            'imported_at' => '2025-09-18 12:21:56',
            'meta' => '{"author": "Space Editorial Analysts", "source": "JAXA Press Centre", "source_name": "JAXA Press Centre", "has_full_content": true}',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
            'deleted_at' => null,
        ],
        [
            'id' => 10,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'd34fefffdd14c56ee595e36e9a7bbe8c09b61ec2',
            'content_hash' => 'd4d26983fc197c25d2879941eb389290471734626964352c16670e2795c34bb7',
            'title' => 'Illinois is investigating after ICE raid left ‘nearly naked’ children zip-tied, Gov JB Pritzker says',
            'slug' => 'httpswwwindependentcouknewsworldamericasus-politicschicago-immigration-raid-children-ziptied-b2839782html',
            'excerpt' => 'Neighbors recalled witnessing law enforcement zip-tie children together and separate them from parents during a middle-of-the-night immigration raid',
            'body' => '<h2></h2><p>Neighbors recalled witnessing law enforcement zip-tie children together and separate them from parents during a middle-of-the-night immigration raid</p>
<p>Neighbors recalled witnessing law enforcement zip-tie children together and separate them from parents during a middle-of-the-night immigration raid</p>
<h3>Sign up for the daily Inside Washington email for exclusive US coverage and analysis sent to your inbox</h3>
<h3>Get our free Inside Washington email</h3>
<h3>Get our free Inside Washington email</h3>
<p>I would like to be emailed about offers, events and updates from The Independent. Read our <a href="/service/privacy-policy-a6184181.html">Privacy notice</a></p>
<p><a href="/topic/illinois">Illinois</a> Governor <a href="/topic/jb-pritzker">JB Pritzker</a> is directing state agencies to <a rel="nofollow" target="_blank" href="https://gov-pritzker-newsroom.prezly.com/governor-pritzker-directs-state-agencies-to-evaluate-treatment-of-children-during-federal-raid-in-south-shore">investigate</a> the treatment of children involved in a recent Trump administration immigration raid after witnesses claimed children were zip-tied, separated from parents, and detained for several hours. </p>
<p>Pritzker’s directive was issued Friday after reports emerged that armed federal immigration agents descended on an apartment building on the South Side of <a href="/topic/chicago">Chicago</a> on September 30 and pulled men, women, and <a rel="nofollow" target="_blank" href="https://www.wbez.org/immigration/2025/10/01/massive-immigration-raid-on-chicago-apartment-building-leaves-residents-reeling-i-feel-defeated">children</a> from their beds in the middle of the night. </p>
<p><a rel="nofollow" target="_blank" href="https://clicks.trx-hub.com/xid/esimedia_t58ukgmjkf95_theindependent?q=http%3A%2F%2Fgo.redirectingat.com%2F%3Fid%3D44681X1458326%26articleId%3Db2839782%26url%3Dhttps%253A%252F%252Fwww.nytimes.com%252F2025%252F10%252F05%252Fus%252Fpolitics%252Fpritzker-chicago-immigration.html%26sref%3D%2Fnews%2Fworld%2Famericas%2Fus-politics%2Fchicago-immigration-raid-children-ziptied-b2839782.html&amp;p=https%3A%2F%2Fwww.independent.co.uk%2Fnews%2Fworld%2Famericas%2Fus-politics%2Fchicago-immigration-raid-children-ziptied-b2839782.html&amp;article_id=2839782&amp;author=Ariana+Baio&amp;tag=JB+Pritzker%2CIllinois%2CChicago%2Cimmigration+raids&amp;section=World&amp;category=Americas&amp;sub_category=US+politics&amp;updated_time=2025-10-05T22%3A32%3A49.000Z&amp;utm_content=N%2FA&amp;utm_campaign=news-body&amp;utm_term=B-1&amp;utm_medium=N%2FA&amp;ref=N%2FA&amp;utm_source=direct&amp;fbclid=N%2FA&amp;gclid=N%2FA">In an interview with CNN Sunday,</a> the governor cited reports of “children who were zip-tied and held, some of them nearly naked” and “elderly people being thrown into a U-Haul for three hours and detained.” At least one U.S. citizen was detained, Pritzker added. </p>
<p>Federal agents were “just picking up people who are brown and Black and then checking their credentials,” Mr. Pritzker added.</p>
<p>Witnesses told <a rel="nofollow" target="_blank" href="https://www.wbez.org/immigration/2025/10/01/massive-immigration-raid-on-chicago-apartment-building-leaves-residents-reeling-i-feel-defeated">WBEZ Chicago</a> and the<a rel="nofollow" target="_blank" href="https://chicago.suntimes.com/immigration/2025/10/01/massive-immigration-raid-on-chicago-apartment-building-leaves-residents-reeling-i-feel-defeated"> <em>Chicago Sun Times </em></a>that armed agents arrived at the five-story building with U-Hauls and broke down residents’ doors, dragging them out of bed. Some <a rel="nofollow" target="_blank" href="https://www.cnn.com/2025/10/03/us/chicago-apartment-ice-raid">told CNN</a> that a Black Hawk helicopter was flying above the apartment complex.</p>
<p>“Imagine being a child awakened in the middle of the night by a Black Hawk helicopter landing in your neighborhood,” Pritzker said in a statement. “Imagine an armed stranger forcibly removing you from your bed, zip-tying your hands, separating you from your family, and detaining you in a dark van for hours. This didn’t happen in a country with an authoritarian regime – it happened here in Chicago.”</p>
<p>Pritzker said he was “appalled” by the reports and that “military-style tactics should never be used on children.”</p>
<p><em>The Independent</em> has asked the Department of Homeland Security for comment.</p>
<p>Federal agents and officers with the Department of Homeland Security, Border Patrol, the FBI, Bureau of Alcohol, Tobacco, Firearms, and Explosives were involved in the immigration raid. Authorities said the neighborhood where the raid was conducted was “known to be frequented by Tren de Aragua members and their associates.” </p>
<p>Eboni Watson, a resident of the building, <a rel="nofollow" target="_blank" href="https://abc7chicago.com/post/ice-chicago-federal-agents-surround-south-shore-apartment-building-dhs-requests-military-deployment-illinois/17908911/">told WLS</a> that children appeared “terrified” during the raid.</p>
<p>“The kids was crying. People was screaming. They looked very distraught,” Watson said. </p>
<p>“I was out there crying when I seen the little girl come around the corner, because they was bringing the kids down, too, had them zip tied to each other,” Watson added.</p>
<p>Approximately 37 people were arrested in the September 30 raid, some of whom had criminal records related to drug or weapons crimes, DHS said. </p>
<p>President Donald Trump has directed immigration law enforcement and other federal authorities to conduct <a href="/topic/immigration-raids">immigration raids</a> in Chicago, a city he has long targeted due to its “sanctuary city” policies. Pritzker and Chicago Mayor Brandon Johnson have consistently opposed the administration’s tactics.</p>
<p>Pritzker <a rel="nofollow" target="_blank" href="https://www.cnn.com/2025/10/05/politics/video/governor-jb-pritzker-on-chicago-ice-raids-and-immigration-crackdown">told CNN</a> that the administration was using aggressive tactics because they “want mayhem on the ground.” </p>',
            'image_path' => 'https://static.independent.co.uk/2025/10/05/21/47/GettyImages-2231381197.jpg?width=1200&auto=webp&crop=3%3A2',
            'original_url' => 'https://www.independent.co.uk/news/world/americas/us-politics/chicago-immigration-raid-children-ziptied-b2839782.html',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:32:49',
            'imported_at' => '2025-10-05 23:02:22',
            'meta' => '{"author": "Ariana Baio", "source": "The Independent", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:22',
            'updated_at' => '2025-10-05 23:02:22',
            'deleted_at' => null,
        ],
        [
            'id' => 11,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'ffeb264311ff17113efb401eed19c8a88ee0447e',
            'content_hash' => '5c938b44bc7edb8e92dfc84fbdfb86c77e9dc6235ab63b79d8757b946f9653e2',
            'title' => '‘MOVE FAST’: Trump says talks with Hamas ‘very successful, and proceeding rapidly’',
            'slug' => 'httpswwwwndcom202510move-fast-trump-says-talks-hamas-very-successfulutm-sourcerssutm-mediumrssutm-campaignmove-fast-trump-says-talks-hamas-very-successful',
            'excerpt' => '\'TIME IS OF THE ESSENCE OR, MASSIVE BLOODSHED WILL FOLLOW – SOMETHING THAT NOBODY WANTS TO SEE!\'',
            'body' => '<p>By <a href="https://www.wnd.com/author/jkovacs/">Joe Kovacs</a></p>
<p><a href="https://www.wnd.com/2025/10/05/">October 5, 2025</a></p>
<ul><li> <a href="https://truthsocial.com/share?url=https%3A%2F%2Fwww.wnd.com%2F2025%2F10%2Fmove-fast-trump-says-talks-hamas-very-successful%2F&amp;title=%5C\'MOVE%20FAST%5C\':%20Trump%20says%20talks%20with%20Hamas%20%5C\'very%20successful,%20and%20proceeding%20rapidly%5C\'%20as%20deadline%20passes" title="Share on Truth" target="_blank" rel="noreferrer noopener nofollow"> </a></li><li> <a href="https://x.com/intent/post?text=%27MOVE%20FAST%27%3A%20Trump%20says%20talks%20with%20Hamas%20%27very%20successful%2C%20and%20proceeding%20rapidly%27%20as%20deadline%20passes&amp;url=https%3A%2F%2Fwww.wnd.com%2F2025%2F10%2Fmove-fast-trump-says-talks-hamas-very-successful%2F&amp;related=worldnetdaily&amp;via=worldnetdaily" title="Share on Tweet" target="_blank" rel="noreferrer noopener nofollow"></a></li><li> <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.wnd.com%2F2025%2F10%2Fmove-fast-trump-says-talks-hamas-very-successful%2F&amp;t=%5C%26%23039%3BMOVE+FAST%5C%26%23039%3B%3A+Trump+says+talks+with+Hamas+%5C%26%23039%3Bvery+successful%2C+and+proceeding+rapidly%5C%26%23039%3B+as+deadline+passes" title="Share on Share" target="_blank" rel="noreferrer noopener nofollow"></a></li><li> <a href="https://gettr.com/share?text=%5C\'MOVE%20FAST%5C\':%20Trump%20says%20talks%20with%20Hamas%20%5C\'very%20successful,%20and%20proceeding%20rapidly%5C\'%20as%20deadline%20passes&amp;url=https%3A%2F%2Fwww.wnd.com%2F2025%2F10%2Fmove-fast-trump-says-talks-hamas-very-successful%2F" title="Share on Gettr" target="_blank" rel="noreferrer noopener nofollow"> </a></li><li> <a href="https://gab.com/compose?url=https%3A%2F%2Fwww.wnd.com%2F2025%2F10%2Fmove-fast-trump-says-talks-hamas-very-successful%2F&amp;text=%5C%26%23039%3BMOVE+FAST%5C%26%23039%3B%3A+Trump+says+talks+with+Hamas+%5C%26%23039%3Bvery+successful%2C+and+proceeding+rapidly%5C%26%23039%3B+as+deadline+passes" title="Share on Gab" target="_blank" rel="noreferrer noopener nofollow"> .st0{fill:#ffffff;} .st1{fill:#FFFFFF;} .st2{fill:#215E54;} </a></li><li> <a href="https://telegram.me/share/url?url=https%3A%2F%2Fwww.wnd.com%2F2025%2F10%2Fmove-fast-trump-says-talks-hamas-very-successful%2F&amp;text=%27MOVE%20FAST%27%3A%20Trump%20says%20talks%20with%20Hamas%20%27very%20successful%2C%20and%20proceeding%20rapidly%27%20as%20deadline%20passes" title="Share on Telegram" target="_blank" rel="noreferrer noopener nofollow"></a></li><li> <a href="#insticator-commenting" title="Share on " target="_self" rel="noreferrer noopener nofollow"></a></li><li> <a href="/cdn-cgi/l/email-protection#d3eca0a6b1b9b6b0a7eef6e1e49e9c8596f6e1e395928087f6e1e4f6e092f6e1e387a1a6bea3f6e1e3a0b2aaa0f6e1e3a7b2bfb8a0f6e1e3a4baa7bbf6e1e39bb2beb2a0f6e1e3f6e1e4a5b6a1aaf6e1e3a0a6b0b0b6a0a0b5a6bff6e190f6e1e3b2bdb7f6e1e3a3a1bcb0b6b6b7babdb4f6e1e3a1b2a3bab7bfaaf6e1e4f6e1e3b2a0f6e1e3b7b6b2b7bfbabdb6f6e1e3a3b2a0a0b6a0f5b2bea3e8b1bcb7aaee9bbaf6e190f6e1e39af6e1e3a7bbbca6b4bba7f6e1e3aabca6f6e1e3bebab4bba7f6e1e3b6bdb9bcaaf6e1e3a1b6b2b7babdb4f6e1e3a7bbbaa0f6e1e3b2a1a7bab0bfb6f6e1e39af6e1e3b9a6a0a7f6e1e3b0b2beb6f6e1e3b2b0a1bca0a0f6e092f6e1e3f6e1e49e9c8596f6e1e395928087f6e1e4f6e092f6e1e387a1a6bea3f6e1e3a0b2aaa0f6e1e3a7b2bfb8a0f6e1e3a4baa7bbf6e1e39bb2beb2a0f6e1e3f6e1e4a5b6a1aaf6e1e3a0a6b0b0b6a0a0b5a6bff6e190f6e1e3b2bdb7f6e1e3a3a1bcb0b6b6b7babdb4f6e1e3a1b2a3bab7bfaaf6e1e4f6e1e3b2a0f6e1e3b7b6b2b7bfbabdb6f6e1e3a3b2a0a0b6a0fdf6e1e3f6e397f6e392f6e1e3f6e397f6e39287bbbaa0f6e1e3baa0f6e1e3a7bbb6f6e1e3bfbabdb8f6e092f6e1e3bba7a7a3a0f6e092f6e195f6e195a4a4a4fda4bdb7fdb0bcbef6e195e1e3e1e6f6e195e2e3f6e195bebca5b6feb5b2a0a7fea7a1a6bea3fea0b2aaa0fea7b2bfb8a0febbb2beb2a0fea5b6a1aafea0a6b0b0b6a0a0b5a6bff6e195" title="Share on " target="_self" rel="noreferrer noopener nofollow"></a></li><li> <a href="http://www.printfriendly.com/print/?url=https%3A%2F%2Fwww.wnd.com%2F2025%2F10%2Fmove-fast-trump-says-talks-hamas-very-successful%2F" title="Share on Print" target="_blank" rel="noreferrer noopener nofollow"></a></li></ul>
<p>As President Donald Trump’s 6 p.m. Sunday deadline for Hamas to accept a peace deal to release all hostages arrived, the commander in chief said “talks have been very successful, and proceeding rapidly.”</p>
<p>“There have been very positive discussions with Hamas, and Countries from all over the World (Arab, Muslim, and everyone else) this weekend, to release the Hostages, end the War in Gaza but, more importantly, finally have long sought PEACE in the Middle East,” Trump posted on X at 5:56 p.m. Eastern Time.</p>
<p>“These talks have been very successful, and proceeding rapidly,” he continued.</p>
<p>“The technical teams will again meet Monday, in Egypt, to work through and clarify the final details. I am told that the first phase should be completed this week, and I am asking everyone to MOVE FAST. I will continue to monitor this Centuries old ‘conflict.’</p>
<p><strong><a href="https://wnd-news-alerts.beehiiv.com/subscribe" target="_blank">Get the hottest, most important news stories on the Internet – delivered FREE to your inbox as soon as they break! Take just 30 seconds and sign up for WND\'s Email News Alerts!</a></strong></p>
<p>“TIME IS OF THE ESSENCE OR, MASSIVE BLOODSHED WILL FOLLOW – SOMETHING THAT NOBODY WANTS TO SEE!”</p>
<p></p>
<p>On Friday, Trump issued an ultimatum to Hamas, warning the Islamic terrorists must accept his ceasefire framework by Sunday at 6 p.m. or completely lose the deal.</p>
<p>“If this LAST CHANCE agreement is not reached, all HELL, like no one has ever seen before, will break out against Hamas,” Trump <a href="https://truthsocial.com/@realDonaldTrump/posts/115310630808491399">wrote</a>.</p>
<p><strong>WATCH:</strong></p>
<p>!function(r,u,m,b,l,e){r._Rumble=b,r[b]||(r[b]=function(){(r[b]._=r[b]._||[]).push(arguments);if(r[b]._.length==1){l=u.createElement(m),e=u.getElementsByTagName(m)[0],l.async=1,l.src="https://rumble.com/embedJS/ukxsg"+(arguments[1].video?\'.\'+arguments[1].video:\'\')+"/?url="+encodeURIComponent(location.href)+"&amp;args="+encodeURIComponent(JSON.stringify([].slice.apply(arguments))),e.parentNode.insertBefore(l,e)}})}(window, document, "script", "Rumble");</p>
<p>
Rumble("play", {"video":"v6xnjay","div":"rumble_v6xnjay"});</p>
<p>On Saturday, Trump posted on Truth Social a Gaza map with representation of “withdrawal lines” to which Israel has agreed, nearly two years since the current conflict began.</p>
<p>“After negotiations, Israel has agreed to the initial withdrawal line, which we have shown to, and shared with, Hamas,” the president wrote.</p>
<p>“When Hamas confirms, the Ceasefire will be IMMEDIATELY effective, the Hostages and Prisoner Exchange will begin, and we will create the conditions for the next phase of withdrawal, which will bring us close to the end of this 3,000 YEAR CATASTROPHE. Thank you for your attention to this matter and, STAY TUNED!”</p>
<p></p>
<p><i><b><a href="https://reachinggodspeed.com/">Is the news we hear every day actually broadcasting messages from God? The answer is an absolute yes! Find out how!</a></b></i></p>
<p><em>Follow Joe on X <a href="https://twitter.com/JoeKovacsNews">@JoeKovacsNews</a></em></p>
<blockquote><p><a href="https://www.wnd.com/2025/10/special-day-trump-provides-update-israeli-hostages-please/">‘Special day’: Trump provides update on Israeli hostages, peace plan</a></p></blockquote>
<p><a href="https://www.wnd.com/2025/10/special-day-trump-provides-update-israeli-hostages-please/">‘Special day’: Trump provides update on Israeli hostages, peace plan</a></p>
<p>/*! This file is auto-generated */!function(d,l){"use strict";l.querySelector&amp;&amp;d.addEventListener&amp;&amp;"undefined"!=typeof URL&amp;&amp;(d.wp=d.wp||{},d.wp.receiveEmbedMessage||(d.wp.receiveEmbedMessage=function(e){var t=e.data;if((t||t.secret||t.message||t.value)&amp;&amp;!/[^a-zA-Z0-9]/.test(t.secret)){for(var s,r,n,a=l.querySelectorAll(\'iframe[data-secret="\'+t.secret+\'"]\'),o=l.querySelectorAll(\'blockquote[data-secret="\'+t.secret+\'"]\'),c=new RegExp("^https?:$","i"),i=0;i</p>',
            'image_path' => null,
            'original_url' => 'https://www.wnd.com/2025/10/move-fast-trump-says-talks-hamas-very-successful/?utm_source=rss&utm_medium=rss&utm_campaign=move-fast-trump-says-talks-hamas-very-successful',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:32:18',
            'imported_at' => '2025-10-05 23:02:23',
            'meta' => '{"author": "Joe Kovacs", "source": "wnd", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:23',
            'updated_at' => '2025-10-05 23:02:23',
            'deleted_at' => null,
        ],
        [
            'id' => 12,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '1126e701cf519108739e2193a43803e5554c3636',
            'content_hash' => '543bb97c82a9efd76c087f81af5a216cb74619843ff97ccb8ac480c00f5dfabb',
            'title' => 'Dave Roberts Refuses To Spill Beans On Roki Sasaki’s Future As Dodgers Make Clayton Kershaw Decision',
            'slug' => 'httpswwwessentiallysportscommlb-baseball-news-dave-roberts-refuses-to-spill-beans-on-roki-sasakis-future-as-dodgers-make-clayton-kershaw-decision',
            'excerpt' => 'The Los Angeles Dodgers unlocked their NLDS series with a statement 5-3 win over the Philadelphia Phillies. And then, manager Dave Roberts found himself responding to questions about two key pitching storylines. The future role of Japanese phenom Roki Sasaki and the clubhouse’s d...',
            'body' => '<p>Oct 6, 2025 | 4:02 AM IST</p>
<p>Oct 6, 2025 | 4:02 AM IST</p>
<p>via Imago</p>
<p hidden>Credit: IMAGO</p>
<p>via Imago</p>
<p hidden>Credit: IMAGO</p>
<p>The Los Angeles Dodgers unlocked their NLDS series with a statement 5-3 win over the Philadelphia Phillies. And then, manager Dave Roberts found himself responding to questions about two key pitching storylines. The future role of Japanese phenom Roki Sasaki and the clubhouse’s decision to bring back Clayton Kershaw in a bullpen role.</p>
<p>Watch What’s Trending Now!</p>
<p>With an extra rest day integrated into the NLDS schedule, Roberts acknowledged that the setup enables more flexibility in how he manages his rotation and bullpen. <em>“</em><i>I think it’s beneficial</i><em>,”</em> Roberts spoke to Bill Plunkett of Dodgers Nation. <em>“</em><i>Getting Blake on his regular rest… we kind of reset. I feel good with Snell going tomorrow and having whoever we want to deploy behind him</i><em>.</em><em>”</em> That tactical cushion has opened doors for creative pitching plans, particularly with Sasaki’s recent unfolding.</p>
<p>When asked specifically about Sasaki’s availability, Roberts said that the Dodgers have prepared for this moment already in advance. </p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p><em>“</em><i>We did that intentionally toward the end of the season</i><em>,</em><em>”</em> Roberts exclaimed. <em>“</em><i>We got him a two out of three. And so we’ve kind of checked that box. So I feel good. If needed, we could use him tomorrow night as well</i><em>.</em><em>”</em> Sasaki made a major influence in Game 1, recording his first MLB save as the Dodgers closed out the Phillies. Yet when asked if Sasaki is officially the closer, Roberts did not give a definitive answer. </p>
<p><em>“</em><i>I just don’t want to be pigeonholed into the ninth</i><em>,”</em> he remarked. <em>“</em><i>There could be different ways where the eighth could kind of present itself, where he could be the best option. But I do consider him one of our top highest leverage relievers for sure.<em>”</em></i></p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p>Such a careful statement has fueled speculations.</p>
<p>via Imago</p>
<p hidden>MLB, Baseball Herren, USA Colorado Rockies at Los Angeles Dodgers Sep 9, 2025 Los Angeles, California, USA Los Angeles Dodgers manager Dave Roberts 30 reacts after the game against the Colorado Rockies at Dodger Stadium. Los Angeles Dodger Stadium California United States, EDITORIAL USE ONLY PUBLICATIONxINxGERxSUIxAUTxONLY Copyright: xKirbyxLeex 20250909_kdl_al2_033</p>
<p>AD</p>
<p>Fans wonder if Sasaki will be placed as a closer or if Dave Roberts plans to utilize Sasaki in a flexible and matchup-driven way. Given the star’s limited experience and current shoulder-related concern, the team could be managing expectations while still capitalizing on Sasaki’s elite stuff. </p>
<p>Read Top Stories First From EssentiallySports</p>
<p>Click here and check box next to EssentiallySports </p>
<p>In the meantime, the clubhouse officially confirmed a key development about <a href="https://www.essentiallysports.com/tag/clayton-kershaw/?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_2" target="_self">Clayton Kershaw</a>. </p>
<p>As per MLB.com’s Sonja Chen, the Dodgers added the 37-year-old lefty to their NLDS roster, returning him to a relief role to close out his legendary career. Clayton Kershaw went 11-2 with a 3.36 ERA this season and will now strengthen a bullpen piled up with left-handed arms. <a href="https://youtu.be/Xp9Da2Thuus?si=KYPOnsnYkAvD_7AW?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_2" target="_blank">Roberts also outlined the situations</a> where Kershaw could he used. </p>
<p><em>“</em><i>Dave Roberts said there are ‘various roles’ he sees for Clayton Kershaw, including, but not limited to, if a starter has a short outing or the game goes into extra innings,</i><em>”</em> reported Dodger Blue. </p>
<p>Between Sasaki’s rapid rise and Kershaw’s emotional farewell tour, the Dodgers’ pitching plans are a fascinating mix of future promise and legendary legacy. </p>
<p>Now, while Kershaw’s potential role was full of intrigue, that was not the only storyline surrounding Dave Roberts after Game 1. Another hot topic came from the outfield, where a defensive failure nearly changed the game’s momentum early.</p>
<h2><b>Teoscar Hernández’s costly defensive miscue draws an honest assessment from Roberts</b></h2>
<p>The turning point came in the bottom of the second inning when J.T. Realmuto ripped a ball in the right-center gap with two on and out. Teoscar Hernández came forward to ease up on his pursuit, helping the ball roll off the wall and <a href="https://www.essentiallysports.com/tag/jt-realmuto/?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_2" target="_self">Realmuto</a>, a quick catcher, to react third with a triple. The hit guided to a 3-0 lead for the Phillies, raising questions about Hernández’s defensive approach in such a vital situation.</p>
<p>Dave Roberts addressed the situation candidly after the game. </p>
<p><em>“I’ve got to look at it again…</em> <em>I would argue that he wasn’t not trying. But, yeah, that’s a ball that you don’t want Realmuto to have a triple, certainly a short right field,” </em>Roberts explained. His statement highlights accountability and a willingness to defend the star, a delicate balance as the team focuses on cleaning up mistakes before Game 2.</p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p>via Imago</p>
<p hidden>LOS ANGELES, CALIFORNIA – OCTOBER 20: Teoscar Hernandez #37 of the Los Angeles Dodgers scores a run on a two-run double by Tommy Edman #25 during the first inning in game six of the National League Championship Series against the New York Mets at Dodger Field on Sunday, Oct. 20, 2024 in Los Angeles. (Wally Skalij / Los Angeles Times)</p>
<p>The Dodgers might have moved with a vital Game 1 winning trophy; however, Dave Roberts’ remarks highlighted just how many moving parts lie beneath the surface. Between analyzing Kershaw’s evolving role and managing Hernández’s defensive issues, the team faces strategic and executional issues. As the series is getting intense, Roberts’ capability to manage roles could provide a decisive advantage.</p>',
            'image_path' => 'https://image-cdn.essentiallysports.com/wp-content/uploads/Dave-Roberts-4-473x315.jpeg',
            'original_url' => 'https://www.essentiallysports.com/mlb-baseball-news-dave-roberts-refuses-to-spill-beans-on-roki-sasakis-future-as-dodgers-make-clayton-kershaw-decision/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:32:12',
            'imported_at' => '2025-10-05 23:02:24',
            'meta' => '{"author": "Supradeep Dutta", "source": "Essentially Sports", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:24',
            'updated_at' => '2025-10-05 23:02:24',
            'deleted_at' => null,
        ],
        [
            'id' => 13,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'f0c3f2a1f9e97df1abf5e57e8c4ae99ed80d2ee1',
            'content_hash' => '936c922bbcbf0f194e1a8720fb2ae3436bd78357a013df62e23e4b72205ce84c',
            'title' => 'High-speed reaching remote corners of Greater Sudbury',
            'slug' => 'httpswwwthesudburystarcomnewslocal-newshigh-speed-reaching-remote-corners-of-greater-sudbury',
            'excerpt' => 'Residences in Lively area, including camps on Panache, will be among first eligible customers',
            'body' => '<ul><li><a href="mailto:?Subject=I%20saw%20this%20on%20Sudbury%20Star&amp;Body=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury"> </a></li><li><a href="https://www.reddit.com/submit?kind=link&amp;url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=" title="Share on Reddit in new tab" rel="noopener" target="_blank"> </a></li><li><a href="https://twitter.com/intent/tweet?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;text=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury&amp;via=" title="Share on X in new tab" rel="noopener" target="_blank"> </a></li><li><a href="https://www.linkedin.com/sharing/share-offsite/?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share on LinkedIn" rel="noopener" target="_blank"> </a></li><li><li><a href="https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury"> Copy Link </a></li><li><a href="mailto:?Subject=I%20saw%20this%20on%20Sudbury%20Star&amp;Body=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share via email"> Email </a></li><li><a href="https://twitter.com/intent/tweet?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;text=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury&amp;via=" title="Share on X in new tab" rel="noopener" target="_blank"> X </a></li><li><a href="https://www.reddit.com/submit?kind=link&amp;url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Reddit in new tab" rel="noopener" target="_blank"> Reddit </a></li><li><a href="https://pinterest.com/pin/create/button/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;media=https://smartcdn.gprod.postmedia.digital/nexus/wp-content/uploads/2025/10/1007-su-fibre1.jpeg" title="Share on Pinterest in new tab" rel="noopener" target="_blank"> Pinterest </a></li><li><a href="https://www.linkedin.com/sharing/share-offsite/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share on LinkedIn in new tab" rel="noopener" target="_blank"> LinkedIn </a></li><li><a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Tumblr in new tab" rel="noopener" target="_blank"> Tumblr </a></li></ul>
<ul><li><a href="https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury"> Copy Link </a></li><li><a href="mailto:?Subject=I%20saw%20this%20on%20Sudbury%20Star&amp;Body=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share via email"> Email </a></li><li><a href="https://twitter.com/intent/tweet?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;text=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury&amp;via=" title="Share on X in new tab" rel="noopener" target="_blank"> X </a></li><li><a href="https://www.reddit.com/submit?kind=link&amp;url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Reddit in new tab" rel="noopener" target="_blank"> Reddit </a></li><li><a href="https://pinterest.com/pin/create/button/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;media=https://smartcdn.gprod.postmedia.digital/nexus/wp-content/uploads/2025/10/1007-su-fibre1.jpeg" title="Share on Pinterest in new tab" rel="noopener" target="_blank"> Pinterest </a></li><li><a href="https://www.linkedin.com/sharing/share-offsite/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share on LinkedIn in new tab" rel="noopener" target="_blank"> LinkedIn </a></li><li><a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Tumblr in new tab" rel="noopener" target="_blank"> Tumblr </a></li></ul>
<ol><li><a>News</a></li><li><a>Local News</a></li></ol>
<p>Residences in Lively area, including camps on Panache, will be among first eligible customers</p>
<h2>Article content</h2>
<p>Broadband has come to the boonies.</p>
<p>In late September folks along the north shore of Panache Lake encountered a series of spool-equipped bucket trucks and quad-riding linemen rumbling through the woods, which at this time of year would normally just get traversed by a few grouse hunters.</p>
<h3>Recommended Videos</h3>
<p>The crews were there to string shiny new fibre-optic cable from pole to pole as part of a government-funded project to connect thousands of rural households in Northern Ontario to gigabit-speed internet.</p>
<p>“We now have connections from Lively, Espanola and Gore Bay into our head end (central facility) at 151 Front Street in downtown Toronto,” said Joe Hickey of ROCK Networks, a fast-growing Canadian company that won the contract to deliver the digital service. “So we’re literally weeks away from first live connections in those three locations — let’s say a Novemberish time frame.”</p>
<p>Start your days with the latest local news, weather, sports, community updates and more.</p>
<ul><li>There was an error, please provide a valid email address.</li></ul>
<p>By signing up you consent to receive the above newsletter from Postmedia Network Inc.</p>
<p>A welcome email is on its way. If you don\'t see it, please check your junk folder.</p>
<p>The next issue of Sudbury Star Morning Briefing will soon be in your inbox.</p>
<p hidden>We encountered an issue signing you up. Please try again</p>
<p>Interested in more newsletters? <a href="/newsletters">Browse here.</a></p>
<p>Hickey said a website will be launched soon — within the next couple of weeks — that will enable residents to check by address to see if they fall within the coverage zone.</p>
<p>“I will tell you that as we’ve done our survey we’ve found homes that the federal government did not have in their mapping database, and we put a proposal through to Ontario for extra expansion,” said the ROCK Networks president and founder.</p>
<p>Both levels of government partnered on the broadband expansion, together committing more than $1.2 billion in 2021 to hook up some 280,000 households across Ontario to fibre-based internet. </p>
<p>Last summer, more than $97 million in combined funding was announced for ROCK Networks — a subsidiary of PomeGran, which Hickey also heads up — to connect more than 60 communities along the North Shore, from the Sault to Sudbury, to reliable high-speed. </p>
<p>The new network “will serve 18,600 households, including over 2,500 Indigenous households,” the federal government said in a release at the time, adding it expected to have “98 per cent of Canadians connected by 2026.”</p>
<p>Queen’s Park, the same release noted, had a goal to get every community in the province linked up to a reliable internet service by the end of this year.</p>
<p>ROCK Networks held an earth-turning ceremony last fall in the Desbarats area, east of Sault Ste. Marie, and has been busy ever since laying the groundwork — and stringing the cables — for the fibre-to-the-home option, which Hickey said it is the fastest and most reliable way to get online.</p>
<p>“It’s all fibre-optic, so basically light through glass, and this is the first rural place in Canada that will have a 25-gig passive optical network,” he noted. “The home user will never need 25-gig, but larger customers that manage a lot of data, like the hospital in Elliot Lake or Manitoulin, might need that much.”</p>
<p>Individual customers are more likely to opt for “anywhere from 150-megabit to eight-gigabit type speeds, if you are a gaming enthusiast,” said Hickey. “But typically the range is 150 Mb to 1.5 Gb, or three- to five-gig for super users.”</p>
<p>On Oct. 16 parent company Pomegran will be launching a new ISP brand to bring all its sub-companies (some of which were acquisitions) under a single, unified structure, and options for subscribers will be revealed soon thereafter.</p>
<p>“Entry-level packages will be 10 to 30 times faster than DSL (internet delivered over standard phone lines), at a slightly higher price, while the higher-end packages will be much faster than Starlink but below the Starlink price,” said Hickey. “Depending on package type, it will be between the DSL pricing you get from Eastlink or Bell in the area, up to what you would pay for Starlink connection.”</p>
<p>Hickey said the Elon Musk company provides a good service — “in the absence of fibre, it’s as good as you are going to get in rural Canada” — but fibre is “much more reliable than satellite. So when fibre comes, there’s really no reason to have Starlink.”</p>
<p>While exact rates for the new fibre option still need to be firmed up, Hickey said people can generally expect to pay between $80 and $150 per month for internet, although there will also be options to bundle TV and phone.</p>
<p>At this point ROCK Networks has “deployed a couple of hundred kilometres” of cable across the North Shore and is “about halfway through the deployment of the optical line terminals, but we have all the cabinets; everything is basically being staged and prepared. So the active piece of the network will pretty much be fully built by the end of this year or early next year.”</p>
<p>Several utility and telecom companies have been subcontracted to carry out this work, including WesTower, Valard and Nokia.</p>
<p>Getting across (or more accurately, under) rail lines is a lingering challenge, said Hickey, while cables had to be run underwater to reach Manitoulin Island and St. Joseph Island.</p>
<p>“We expect the build to be complete sometime in the latter half of 2026,” he said. “But we’re connecting as we go. So areas like those around Lively will be the initial set of connections, along with Espanola and Gore Bay. And those first connections will be starting sometime in November.”</p>
<p>A would-be customer on Panache, he said, could look forward to getting hooked up soon into the new year — likely before the ice leaves the lake and the NHL playoffs begin.</p>
<p href="mailto:jmoodie@postmedia.com">jmoodie@postmedia.com</p>
<ul><li><a href="mailto:?Subject=I%20saw%20this%20on%20Sudbury%20Star&amp;Body=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury"> </a></li><li><a href="https://www.reddit.com/submit?kind=link&amp;url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=" title="Share on Reddit in new tab" rel="noopener" target="_blank"> </a></li><li><a href="https://twitter.com/intent/tweet?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;text=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury&amp;via=" title="Share on X in new tab" rel="noopener" target="_blank"> </a></li><li><a href="https://www.linkedin.com/sharing/share-offsite/?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share on LinkedIn" rel="noopener" target="_blank"> </a></li><li><li><a href="https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury"> Copy Link </a></li><li><a href="mailto:?Subject=I%20saw%20this%20on%20Sudbury%20Star&amp;Body=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share via email"> Email </a></li><li><a href="https://twitter.com/intent/tweet?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;text=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury&amp;via=" title="Share on X in new tab" rel="noopener" target="_blank"> X </a></li><li><a href="https://www.reddit.com/submit?kind=link&amp;url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Reddit in new tab" rel="noopener" target="_blank"> Reddit </a></li><li><a href="https://pinterest.com/pin/create/button/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;media=https://smartcdn.gprod.postmedia.digital/nexus/wp-content/uploads/2025/10/1007-su-fibre1.jpeg" title="Share on Pinterest in new tab" rel="noopener" target="_blank"> Pinterest </a></li><li><a href="https://www.linkedin.com/sharing/share-offsite/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share on LinkedIn in new tab" rel="noopener" target="_blank"> LinkedIn </a></li><li><a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Tumblr in new tab" rel="noopener" target="_blank"> Tumblr </a></li></ul>
<ul><li><a href="https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury"> Copy Link </a></li><li><a href="mailto:?Subject=I%20saw%20this%20on%20Sudbury%20Star&amp;Body=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share via email"> Email </a></li><li><a href="https://twitter.com/intent/tweet?url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;text=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury&amp;via=" title="Share on X in new tab" rel="noopener" target="_blank"> X </a></li><li><a href="https://www.reddit.com/submit?kind=link&amp;url=https%3A//thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Reddit in new tab" rel="noopener" target="_blank"> Reddit </a></li><li><a href="https://pinterest.com/pin/create/button/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;media=https://smartcdn.gprod.postmedia.digital/nexus/wp-content/uploads/2025/10/1007-su-fibre1.jpeg" title="Share on Pinterest in new tab" rel="noopener" target="_blank"> Pinterest </a></li><li><a href="https://www.linkedin.com/sharing/share-offsite/?url=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury" title="Share on LinkedIn in new tab" rel="noopener" target="_blank"> LinkedIn </a></li><li><a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=https://thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury&amp;title=High-speed%20reaching%20remote%20corners%20of%20Greater%20Sudbury" title="Share on Tumblr in new tab" rel="noopener" target="_blank"> Tumblr </a></li></ul>
<p>Postmedia is committed to maintaining a lively but civil forum for discussion. Please keep comments relevant and respectful. Comments may take up to an hour to appear on the site. You will receive an email if there is a reply to your comment, an update to a thread you follow or if a user you follow comments. Visit our <a href="/community-guidelines/">Community Guidelines</a> for more information.</p>',
            'image_path' => null,
            'original_url' => 'https://www.thesudburystar.com/news/local-news/high-speed-reaching-remote-corners-of-greater-sudbury',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:31:50',
            'imported_at' => '2025-10-05 23:02:26',
            'meta' => '{"author": "Jim Moodie", "source": "thesudburystar", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:26',
            'updated_at' => '2025-10-05 23:02:26',
            'deleted_at' => null,
        ],
        [
            'id' => 14,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'a7a337fd3cc6a1429d3bf4b3cabb25a997a9c12e',
            'content_hash' => 'fb464c246bfc4c743ec101969fd09dcca1ca2a2ac55ab11c785f5212f8585bb2',
            'title' => 'Buyers could save hundreds in new house buying shakeup',
            'slug' => 'httpswwwbbccomnewsarticlescy0v7zwp0dloat-mediumrssat-campaignrss',
            'excerpt' => 'Housing Secretary Steve Reed claims the changes would "fix the broken system" and put more money "back into working people\'s pockets".',
            'body' => '<p>The government has unveiled major housing market reform plans which will aim to cut costs, reduce delays and halve failed sales.</p>
<p>Housing Secretary Steve Reed said the changes would "fix the broken system" and put more money "back into working people\'s pockets".</p>
<p>Hundreds of thousands of families and first-time buyers could benefit from the reforms, in what the government claims would be the biggest house buying shakeup in decades.</p>
<p>The overhaul could save first-time buyers an average of £710 and cut up to four weeks off the typical property transaction timeline, according to the government.</p>
<p>Those in the middle of a chain could also potentially gain a net saving of £400 as a result of the increased costs from selling being outweighed by lower buying expenses.</p>
<p>The consultation also draws on other jurisdictions, including the Scottish system where there is more upfront information and earlier binding contracts.</p>
<p>Under the new proposals, sellers and estate agents will be legally required to provide key information about a property up front.</p>
<p>This will include being up front about the condition of the home, any leasehold costs, and details of property chains. </p>
<p>The government says this transparency will reduce the risk of deals collapsing late in the process and improve confidence among buyers, particularly those purchasing a home for the first time.</p>
<p>Binding contracts may also be introduced to prevent parties from walking away late in the deal, a move intended to halve the number of failed transactions, which currently cost the UK economy an estimated £1.5bn a year.</p>
<p>"Buying a home should be a dream, not a nightmare," said Reed. "Our reforms will fix the broken system so hardworking people can focus on the next chapter of their lives."</p>
<p>The reforms will also aim to boost professional standards across the housing sector. </p>
<p>A new mandatory Code of Practice for estate agents and conveyancers is being proposed, along with the introduction of side-by-side performance data to help buyers choose trusted professionals based on expertise and track record.</p>
<p>The government says a full roadmap for the changes will be published in the new year, forming part of its broader housing strategy, which includes a pledge to build 1.5 million new homes.</p>
<p>Rightmove chief executive Johan Svanstrom said: "We welcome the announcement today aiming to drive forward that much needed change and modernisation."</p>
<p>Adding: "The home-moving process involves many fragmented parts, and there\'s simply too much uncertainty and costs along the way. Speed, connected data and stakeholder simplicity should be key goals."</p>
<p>Paul Whitehead chief executive at Zoopla said: "We look forward to working closely with government and the wider industry to modernise the homebuying process, so that buyers are given certainty earlier and to help reduce any unnecessary costs."</p>
<h2>Bank of mum and dad \'helps half of first-time buyers\'</h2>
<h2>Tips from first-time buyers: \'We bought a £320,000 home aged 25\'</h2>
<h2>First-time buyers typically borrowing for 31 years</h2>',
            'image_path' => 'https://ichef.bbci.co.uk/ace/standard/240/cpsprodpb/0623/live/488de0c0-a226-11f0-a2b9-abdd67c14f44.jpg',
            'original_url' => 'https://www.bbc.com/news/articles/cy0v7zwp0dlo?at_medium=RSS&at_campaign=rss',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:31:27',
            'imported_at' => '2025-10-05 23:02:27',
            'meta' => '{"author": null, "source": "BBC News - UK", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:27',
            'updated_at' => '2025-10-05 23:02:27',
            'deleted_at' => null,
        ],
        [
            'id' => 15,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'e1afba79743d028631bd826919543154711bb919',
            'content_hash' => '867c882f73b27a5a354cf0eb953704d859b735bab7f178a417a993653ca6e2b7',
            'title' => 'Foster Poultry Farms recalls 4 million pounds of chicken corn dogs after wood found in batter',
            'slug' => 'httpswwwlatimescomcaliforniastory2025-10-05foster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter',
            'excerpt' => 'California-based Foster Poultry Farms is recalling more 3.8 million pounds of chicken corn dog products after wood was found in the batter.',
            'body' => '<ul> <li> </li> <li> </li> <li> 2 min </li> <li> Share via Close extra sharing options <ul> <li> <a target="_blank" rel="noopener noreferrer" href="mailto:?body=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter%0A%0Ahttps%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter%0A%0ACalifornia-based%20Foster%20Poultry%20Farms%20is%20recalling%20more%203.8%20million%20pounds%20of%20chicken%20corn%20dog%20products%20after%20wood%20was%20found%20in%20the%20batter."> Email </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter"> Facebook </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://x.com/intent/tweet?url=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter&amp;text=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter"> X </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/shareArticle?url=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter&amp;title=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter&amp;summary=California-based%20Foster%20Poultry%20Farms%20is%20recalling%20more%203.8%20million%20pounds%20of%20chicken%20corn%20dog%20products%20after%20wood%20was%20found%20in%20the%20batter.&amp;source=Los%20Angeles%20Times"> LinkedIn </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://threads.net/intent/post?text=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter%20https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter"> Threads </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://www.reddit.com/submit?url=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter&amp;title=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter"> Reddit </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://api.whatsapp.com/send?text=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter%20https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter"> WhatsApp </a> </li> <li> Copy Link URL Copied! </li> <li> Print </li> </ul> </li> </ul>
<ul> <li> <a target="_blank" rel="noopener noreferrer" href="mailto:?body=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter%0A%0Ahttps%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter%0A%0ACalifornia-based%20Foster%20Poultry%20Farms%20is%20recalling%20more%203.8%20million%20pounds%20of%20chicken%20corn%20dog%20products%20after%20wood%20was%20found%20in%20the%20batter."> Email </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter"> Facebook </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://x.com/intent/tweet?url=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter&amp;text=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter"> X </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/shareArticle?url=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter&amp;title=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter&amp;summary=California-based%20Foster%20Poultry%20Farms%20is%20recalling%20more%203.8%20million%20pounds%20of%20chicken%20corn%20dog%20products%20after%20wood%20was%20found%20in%20the%20batter.&amp;source=Los%20Angeles%20Times"> LinkedIn </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://threads.net/intent/post?text=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter%20https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter"> Threads </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://www.reddit.com/submit?url=https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter&amp;title=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter"> Reddit </a> </li> <li> <a target="_blank" rel="noopener noreferrer" href="https://api.whatsapp.com/send?text=Foster%20Poultry%20Farms%20recalls%204%20million%20pounds%20of%20chicken%20corn%20dogs%20after%20wood%20found%20in%20batter%20https%3A%2F%2Fwww.latimes.com%2Fcalifornia%2Fstory%2F2025-10-05%2Ffoster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter"> WhatsApp </a> </li> <li> Copy Link URL Copied! </li> <li> Print </li> </ul>
<p> This is read by an automated voice. Please report any issues or inconsistencies <a href="https://www.latimes.com/about/audio-stories" target="_blank">here</a>. </p>
<ul><li>Foster Poultry Farms recalls 3.8 million pounds of chicken corn dogs after wood contamination causes at least five injuries.</li><li>The California-based company received complaints about wood found in batter of products made between July 2024 and August 2025.</li><li>The recall follows another recall of 58 million pounds of corn dogs by a Tyson Foods subsidiary last week.</li></ul>
<p>NEW YORK — California-based chicken product maker Foster Poultry Farms is recalling more than 3.8 million pounds of chicken corn dog products after wood was found in the batter, resulting in injuries.</p>
<p>According to a notice posted Saturday on the U.S. Agriculture Department’s Food Safety and Inspection Service site, the company, headquartered in the Central Valley town of Livingston, received numerous complaints about finding wood in the batter of the products, including reports of at least five injuries.</p>
<p>The chicken corn dog products were made between July 30, 2024, and Aug. 4, 2025, and sold under a variety of names, including Chicken Corn Dogs Batter Wrapped Chicken Frankfurters on a Stick and Corn Dogs Chicken Franks Dipped in Honey Batter, among others. </p>
<p>All names and labels of the contaminated products can be found on <a href="https://www.fsis.usda.gov/sites/default/files/food_label_pdf/2025-10/Recall_031-2025-Food_Labels.pdf" target="_blank">the USDA Food and Safety Inspection Service site</a>. The products subject to recall have the number “P-6137B” printed either inside the USDA mark of inspection or on the packaging.</p>
<p>Consumers and institutions who purchased these products should not consume them. They should be thrown away or returned to the place of purchase.</p>
<p>The recall follows another a week earlier of 58 million pounds of corn dogs and other sausage-on-a-stick products made by Texas-based Hillshire Brands, which is a subsidiary of Tyson Foods.</p>
<p>Foreign object contamination is one of the top reasons for food recalls in the United States. Plastic, metal fragments, bits of bugs and more “extraneous” materials have made their way into packaged goods, prompting recalls. <br></p>
<h3>More to Read </h3>
<ul> <li> <a href="https://www.latimes.com/business/story/2024-10-16/listeria-recall" aria-label="Listeria recall expands to 12 million pounds of meat and poultry sold at Trader Joe’s, Target and others"> </a> <h3> <a href="https://www.latimes.com/business/story/2024-10-16/listeria-recall">Listeria recall expands to 12 million pounds of meat and poultry sold at Trader Joe’s, Target and others</a> </h3> Oct. 18, 2024 </li> <li> <a href="https://www.latimes.com/business/story/2024-08-19/perdue-recalls-167-000-pounds-of-chicken-nuggets-after-consumers-find-metal-wire-in-some-packages" aria-label="Perdue recalls chicken nuggets after metal wire found in some packages"> </a> <h3> <a href="https://www.latimes.com/business/story/2024-08-19/perdue-recalls-167-000-pounds-of-chicken-nuggets-after-consumers-find-metal-wire-in-some-packages">Perdue recalls chicken nuggets after metal wire found in some packages</a> </h3> Aug. 19, 2024 </li> <li> <a href="https://www.latimes.com/california/story/2024-03-04/more-than-30-tons-of-trader-joes-chicken-soup-dumplings-recalled-because-of-possible-contamination" aria-label="30 tons of Trader Joe’s Chicken Soup Dumplings recalled for possible contamination"> </a> <h3> <a href="https://www.latimes.com/california/story/2024-03-04/more-than-30-tons-of-trader-joes-chicken-soup-dumplings-recalled-because-of-possible-contamination">30 tons of Trader Joe’s Chicken Soup Dumplings recalled for possible contamination</a> </h3> March 4, 2024 </li> </ul>
<h3> <a href="https://www.latimes.com/business/story/2024-10-16/listeria-recall">Listeria recall expands to 12 million pounds of meat and poultry sold at Trader Joe’s, Target and others</a> </h3>
<h3> <a href="https://www.latimes.com/business/story/2024-08-19/perdue-recalls-167-000-pounds-of-chicken-nuggets-after-consumers-find-metal-wire-in-some-packages">Perdue recalls chicken nuggets after metal wire found in some packages</a> </h3>
<h3> <a href="https://www.latimes.com/california/story/2024-03-04/more-than-30-tons-of-trader-joes-chicken-soup-dumplings-recalled-because-of-possible-contamination">30 tons of Trader Joe’s Chicken Soup Dumplings recalled for possible contamination</a></h3>',
            'image_path' => null,
            'original_url' => 'https://www.latimes.com/california/story/2025-10-05/foster-poultry-farms-recalls-nearly-4-million-pounds-of-chicken-corn-dogs-due-to-wood-in-batter',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:30:51',
            'imported_at' => '2025-10-05 23:02:27',
            'meta' => '{"author": null, "source": "latimesblogs", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:27',
            'updated_at' => '2025-10-05 23:02:27',
            'deleted_at' => null,
        ],
        [
            'id' => 16,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'ec21131399ba754c54e42b962f8f460822399d4d',
            'content_hash' => '67cf491b6be954c9654a8051ab909df84dd74e16ec36e7d62e7dc39d606c004c',
            'title' => 'Big Brother fans praise Zelah’s reaction as he’s ‘outed’ as trans',
            'slug' => 'httpsmetrocouk20251005big-brother-fans-praise-zelahs-reaction-accidentally-outed-trans-24347050',
            'excerpt' => 'A mortifying moment in the Big Brother house.',
            'body' => '<p>Viewers have praised <a href="https://metro.co.uk/tag/big-brother/">Big Brother</a> star Zelah for his ‘kind’ and ‘calm’ reaction after he was accidentally ‘outed’ as trans in Sunday night’s episode of the show.</p>
<p>As the reality television show began, contestants were gathered for that night’s eviction, during which Gani became <a href="https://metro.co.uk/2025/10/03/big-brother-viewers-crushed-bittersweet-outcome-first-live-eviction-24334339/">the second housemate to leave</a>.</p>
<p>However, events were derailed when an over-excited Jenny described Zelah as ‘the transgender’ in front of the other housemates – some of whom were unaware that <a href="https://metro.co.uk/2025/09/30/big-brother-2025-cast-full-lineup-confirmed-4-contestants-join-24299423/">Zelah, 25, is a transgender man</a>.</p>
<p>‘If I do go tonight, don’t forget about me,’ said Zelah as he addressed his housemates before the eviction – prompting a cry of ‘I’ll say, “where’s the transgender?”‘ from an oblivious Jenny.</p>
<p>As Zelah giggled awkwardly, some looked confused, while Charlotte took the opportunity to point out the blunder Jenny had just made.</p>
<p>And, in the calm <em>after </em>the <a href="https://metro.co.uk/tag/storms/">storm</a> (bye, Gani), Jenny took the moment to apologise to Zelah for her actions.</p>
<p>Taking a seat afterwards, Derry girl Jenny apologised, telling Zelah: ‘I’m really sorry. I did not mean to say it. I thought everyone knew.’</p>
<p>‘I do not think it came from a bad place,’ Zelah responded. ‘I had a feeling you didn’t know that people didn’t know.’</p>
<p>‘And therefore that’s fine,’ he continued.</p>
<p>Those not in the know included self-professed ‘old soul’ Cameron B, who could be heard to whisper ‘is he trans?’ as Jenny blurted out Zelah’s truth.</p>
<p>Viewers of the show have taken to <a href="https://metro.co.uk/tag/social-media/">social media</a> to praise Zelah’s handling of the situation.</p>
<p>‘Zelah handled that with such kindness and calmness, that’s why he’s my winner. It would’ve been SO easy to freak out then,’ wrote slinehan1 on X.</p>
<p>Nicolelouisee added: ‘huge respect to Zelah for being so kind and generous about it because he really didn’t have to be even though Jenny’s intentions were definitely not malicious.’</p>
<p>‘Zelah handed the situation so well such massive respect to him,’ said MitchellWebb85.</p>
<p>‘Bless him for how he handled being outed on eviction night he dealt with it wonderfully,’ agreed ManCalledDan.</p>
<p>‘Jenny outing zelah was not on my bingo card, I feel so bad for them both,’ said FelicityRepudia.</p>
<blockquote>
<p lang="en" dir="ltr">“I genuinely would not do that to anyone." 💜 Jenny and Zelah hug it out after she accidentally outed him as transgender before he\'d told all of the Housemates. <a href="https://twitter.com/hashtag/BBUK?src=hash&amp;ref_src=twsrc%5Etfw">#BBUK</a> <a href="https://t.co/6fXtLSJMo3">pic.twitter.com/6fXtLSJMo3</a></p>— Big Brother UK (@bbuk) <a href="https://twitter.com/bbuk/status/1974931988344864866?ref_src=twsrc%5Etfw">October 5, 2025</a>
</blockquote>
<p lang="en" dir="ltr">“I genuinely would not do that to anyone." 💜 Jenny and Zelah hug it out after she accidentally outed him as transgender before he\'d told all of the Housemates. <a href="https://twitter.com/hashtag/BBUK?src=hash&amp;ref_src=twsrc%5Etfw">#BBUK</a> <a href="https://t.co/6fXtLSJMo3">pic.twitter.com/6fXtLSJMo3</a></p>
<p>In his introductory VT, Zelah previously joked about his transition, saying: ‘Why would I choose to go from the luxury that is the women’s toilets, to the horror that is the men’s?’</p>
<p>And in last week’s episodes, he opened up to Sam, revealing that he had been in a ‘lesbian relationship’ with his girlfriend for a while</p>
<p>‘My girlfriend and I were in a lesbian relationship for a while and that was her first ever relationship… I was a lesbian for eight years,’ he said.</p>
<p>‘I went from a lesbian to a man, like, downgrade.’</p>
<p>When asked whether he always knew that he was a man, Zelah continued: ‘When I was six years old, if you looked at me then and look at me now, then you’d think I went from A to B.</p>
<p>‘When I realised I was queer around 16, things started to get a bit better because I started to be a bit more masculine, went through my toxic masculinity phase.</p>
<h2>More <a href="https://metro.co.uk/trending/?ico=trending-post-strip_more">Trending</a>
</h2>
<ol>
<li>
 
 
 <a href="https://metro.co.uk/2025/10/05/suranne-jones-daring-itv-thriller-packs-a-punch-falls-short-perfection-24329620/" aria-label="Link: Suranne Jones\' daring ITV thriller packs a punch but falls short of perfection">
 
 Play Video
 
 </a>
 
 
 <h3>
 
 <a href="https://metro.co.uk/2025/10/05/suranne-jones-daring-itv-thriller-packs-a-punch-falls-short-perfection-24329620/">Suranne Jones\' daring ITV thriller packs a punch but falls short of perfection</a>
 </h3>
 
 
 <a href="/entertainment/tv/">
 Channel: TV
 
 TV 
 </a>
 5 hours ago
 By <a href="https://metro.co.uk/author/asyia-iftikhar/"><strong>Asyia Iftikhar</strong></a>
 
 
 
 
</li>
<li>
 <a href="https://metro.co.uk/2025/10/02/emmerdale-killer-john-sugden-spotted-coronation-street-big-crossover-twist-24313717/">Emmerdale killer John Sugden spotted in Coronation Street for big crossover twist</a>
</li>
<li>
 <a href="https://metro.co.uk/2025/10/04/5-best-horror-tv-shows-guaranteed-terrify-this-october-24331536/">5 best horror TV shows guaranteed to terrify you this October</a>
</li>
<li>
 <a href="https://metro.co.uk/2025/10/02/full-list-coronation-street-cast-returns-arrivals-exits-2025-2-24322617/">All the Coronation Street cast exits, returns and changes coming in 2025</a>
</li>
</ol>
<h3>
 
 <a href="https://metro.co.uk/2025/10/05/suranne-jones-daring-itv-thriller-packs-a-punch-falls-short-perfection-24329620/">Suranne Jones\' daring ITV thriller packs a punch but falls short of perfection</a>
 </h3>
<p>‘Got a motorbike and my tattoos. Time went on, I just started to realise I don’t see myself getting old in this body no matter how masculine I am as a woman. I was never going to be that satisified.’</p>
<p>To view this video please enable JavaScript, and consider upgrading to a web
 browser that
 <a href="https://videojs.com/html5-video-support/" target="_blank" rel="noopener">supports HTML5
 video</a></p>
<p>Up Next</p>
<p>Asked <a href="https://metro.co.uk/2025/10/01/visibility-saves-lives-big-brother-fans-emotional-zelah-opens-transition-24311105/">what he thought about trans rights today</a>, Zelah added: ‘It’s scary, it feels like progress is just back rolling.’</p>
<p>‘It’s crazy how people living their lives bothers people so much because trans people and queer people are always painted by the media as the aggressor when the majority are just trying to get by,’ he added.</p>
<ul><li><a href="https://metro.co.uk/2025/10/02/coco-amp-eve-launches-new-bond-therapy-range-promises-repair-damaged-hair-one-use-24314031/?ico=more-from-metro-unit">
<p>Coco &amp; Eve launches new Bond Therapy Range that promises to repair damaged hair in one use</p></a></li></ul>
<p>Coco &amp; Eve launches new Bond Therapy Range that promises to repair damaged hair in one use</p>
<p><strong><em>Big Brother airs Sunday-Friday at 9pm on ITV2 and ITVX.</em></strong></p>
<p><strong>Got a story?</strong></p>
<p>If you’ve got a celebrity story, video or pictures get in touch with the <a href="https://metro.co.uk">Metro.co.uk</a> entertainment team by emailing us celebtips@metro.co.uk, calling 020 3615 2145 or by visiting our <a href="https://metro.co.uk/submit-stuff/">Submit Stuff</a> page – we’d love to hear from you.</p>
<p>Arrow
MORE: <a href="https://metro.co.uk/2025/10/05/suranne-jones-daring-itv-thriller-packs-a-punch-falls-short-perfection-24329620/?ico=more_text_links" class>Suranne Jones’ daring ITV thriller packs a punch but falls short of perfection</a></p>
<p>Arrow
MORE: <a href="https://metro.co.uk/2025/10/04/5-best-horror-tv-shows-guaranteed-terrify-this-october-24331536/?ico=more_text_links" class>5 best horror TV shows guaranteed to terrify you this October</a></p>
<p>Arrow
MORE: <a href="https://metro.co.uk/2025/10/03/cancel-weekend-plans-binge-heart-pounding-tv-thriller-free-24331218/?ico=more_text_links" class>Cancel your weekend plans to binge ‘heart-pounding’ TV thriller for free</a></p>
<p>Sign up and tell us which TV shows you love to watch to get personalised updates every morning.</p>
<p>
 Select your shows for TV news tailored to you 
 Close 
 </p>
<p>This site is protected by reCAPTCHA and the <a href="https://policies.google.com/privacy" target="_blank">Google Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply. Your information will be used in line with our <a href="https://metro.co.uk/privacypolicy/">Privacy Policy</a></p>',
            'image_path' => null,
            'original_url' => 'https://metro.co.uk/2025/10/05/big-brother-fans-praise-zelahs-reaction-accidentally-outed-trans-24347050/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:30:47',
            'imported_at' => '2025-10-05 23:02:28',
            'meta' => '{"author": "Joel Harley", "source": "Metro", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:28',
            'updated_at' => '2025-10-05 23:02:28',
            'deleted_at' => null,
        ],
        [
            'id' => 17,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '44207d8f20952a7dd4ff80126709abcceed0b321',
            'content_hash' => '6a03ad9ffca296cc1142fc5aca089d6daf93815a4d63627f31babb735f300502',
            'title' => 'AJ Brown throws Jalen Hurts under the bus',
            'slug' => 'httpslarrybrownsportscomfootballaj-brown-jalen-hurts-miss-stopped-running720698',
            'excerpt' => 'Philadelphia Eagles wide receiver AJ Brown did nothing to dispel speculation about his happiness on Sunday following the team&#8217;s loss to the Denver Broncos. Brown seemingly gave up on a play late in the third quarter of Sunday&#8217;s loss to Denver at Lincoln Financial Fiel...',
            'body' => '<p>Philadelphia Eagles wide receiver AJ Brown did nothing to dispel speculation about his happiness on Sunday following the team’s loss to the Denver Broncos.</p>
<p>Brown seemingly gave up on a play late in the third quarter of Sunday’s loss to Denver at Lincoln Financial Field in Philadelphia, Pa. The wide receiver had beaten safety Talanoa Hufanga and had what appeared to be a clear touchdown as long as quarterback Jalen Hurts found him. However, Brown slowed up on the route, and was unable to catch up to Hurts’ throw, spoiling a potential touchdown.</p>
<p></p>
<blockquote><p lang="en" dir="ltr">AJ Brown slows up on a would-be TD 🧐 <a href="https://t.co/m6S1zKeILt">pic.twitter.com/m6S1zKeILt</a></p>— Victor Williams (@ThePhillyPod) <a href="https://twitter.com/ThePhillyPod/status/1974921277912891431?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p lang="en" dir="ltr">AJ Brown slows up on a would-be TD 🧐 <a href="https://t.co/m6S1zKeILt">pic.twitter.com/m6S1zKeILt</a></p>
<p>

</p>
<p>After the game, Brown was asked about the play, and he pinned the blame squarely on Hurts.</p>
<p>“From my point of view, it just missed,” Brown told reporters. “It’s not that I didn’t think the ball was coming. When I looked up, I didn’t see the ball. When I looked back, I didn’t see the ball, and then the ball was thrown. It was just a miss.”</p>
<p></p>
<blockquote><p lang="en" dir="ltr">AJ Brown on the missed deep shot from Hurts: <a href="https://t.co/avADVtUXjd">pic.twitter.com/avADVtUXjd</a></p>— Eliot Shorr-Parks (@EliotShorrParks) <a href="https://twitter.com/EliotShorrParks/status/1974942173532749956?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p lang="en" dir="ltr">AJ Brown on the missed deep shot from Hurts: <a href="https://t.co/avADVtUXjd">pic.twitter.com/avADVtUXjd</a></p>
<p>Brown certainly makes it sound like he and Hurts were not on the same page and that Hurts just missed him. That is unlikely to create any warm feelings in the locker room, as Brown has been <a href="https://larrybrownsports.com/football/aj-brown-fans-concerned-x-post/719408">signaling his unhappiness with the team’s offense</a> in recent weeks.</p>
<p>The play loomed large in the game. Had Brown caught the pass, he likely had a touchdown that would have put the Eagles up 24-3 late in the third quarter. Instead, the Eagles did not score again for the remainder of the game, and the Broncos staged a rally by scoring 18 unanswered points in a 21-17 victory.</p>
<p>Brown cannot accuse the Eagles of freezing him out of the offense. He was targeted eight times in the game and caught five of them for 43 yards, but he missed what might have been the potential biggest play of the game.</p>
<p>Things still are not bad enough that the Eagles <a href="https://larrybrownsports.com/football/eagles-no-chance-aj-brown-trade/720633">might entertain a trade of Brown</a>. However, he has ensured that his relationship with Hurts will be under the microscope for at least another week.</p>',
            'image_path' => null,
            'original_url' => 'https://larrybrownsports.com/football/aj-brown-jalen-hurts-miss-stopped-running/720698',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:30:44',
            'imported_at' => '2025-10-05 23:02:31',
            'meta' => '{"author": "Grey Papke", "source": "larrybrownsports", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:31',
            'updated_at' => '2025-10-05 23:02:31',
            'deleted_at' => null,
        ],
        [
            'id' => 18,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '6882d2d575c0c27685b92f6df08379dddf8f60cc',
            'content_hash' => '73ee9371d06e5a35a60f28e57c1b42942200f5cd80062e91581e452058462c9c',
            'title' => 'Serie A Women MD1 Round-Up: Wins for Inter, Roma & Lazio as Juventus held by Sassuolo',
            'slug' => 'httpsfootball-italianetserie-a-women-md1-round-up-wins',
            'excerpt' => 'The 2025-26 Serie A Women kicked off this weekend, as the twelve hopeful teams put...',
            'body' => '<p>The 2025-26 Serie A Women kicked off this weekend, as the twelve hopeful teams put their preparation into practice for the new season.</p>
<p>Once again, Juventus and Roma are considered to be front runners for the title, with a team outside of those two clubs not having won the competition since Fiorentina in 2016-17.</p>
<p>Meanwhile, <a href="https://football-italia.net/alisha-lehmann-douglas-split-up-juventus-exit/">Como have been investing heavily in their women’s team</a> and Parma, Genoa and Ternana all new additions to the league.</p>
<p>This year’s competition has seen the number of teams increased from ten to twelve, promising more action for the growing women’s game in Italy.</p>
<h2>Serie A Women – Match-Day 1 Round-Up</h2>
<p>The Serie A Women season kicked off with Inter hosting new girls Ternana, with five different goalscorers securing an emphatic 5-0 win for the Nerazzurri. Martina Tomaselli, Haley Bugeja, Masa Tomasevic, Tessa Wullaert and Nikee Diana van Dijk all got their names on the scoresheet. Meanwhile, Eleonora Pacioni was sent off for the visitors in the first-half, making life infinitely more difficult for the minnows.</p>
<p>After Inter, it was Roma’s turn to get their campaign off to a winning start. The Giallorossi dominated Parma in an <a href="https://www.parmacalcio1913.com/en/main-news/serie-a-women-roma-parma-4-0/" target="_blank" rel="noopener">impressive 4-0 victory,</a> with goals from Alice Corelli, Rinsola Babajide, Manuele Giugliano and Giulia Dragoni.</p>
<p>Napoli left it until the 76th minute to break the deadlock against Fiorentina, with Cecille Fløe scoring the only goal as the Partenopei secured all three points.</p>
<p>In the biggest surprise of the weekend, Juventus were held to a 0-0 draw in Sassuolo. <a href="https://football-italia.net/alisha-lehmann-juventus-women-celebrate-title/">The champions</a> were dominant, with 68% possession and 18 shots but were unable to finish their chances in an early blow for Max Canzi’s side.</p>
<p>Sunday’s matches saw Lazio and Como do battle in a tight game, with the Biancocelesti snatching the three points thanks to goals from Clarisse Le Bihan and Martina Piemonte. Veronica Bernardi scored a late consolation goal for the hosts but it was too little too late for the lakeside team.</p>
<p>Finally, Milan fought back from a goal down to beat Genoa 2-1. Alice Karin Sondergaard gave the hosts the lead in the 45th minute before Evelyn Ijeh equalised with six minutes to go and Emma Koivisto won the match for the Rossoneri in the 7th minute of injury time at the end of the game.</p>
<p>After the first round of fixtures, Inter, Roma, Lazio, Milan and Napoli make up the top five, all having won their first matches. Ternana sit bottom and their five goals conceded to Inter is a concerning early indicator that it may be a long season for the Umbrian club in the Serie A Women.</p>
<h2>Post navigation</h2>',
            'image_path' => null,
            'original_url' => 'https://football-italia.net/serie-a-women-md1-round-up-wins/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:30:14',
            'imported_at' => '2025-10-05 23:02:32',
            'meta' => '{"author": "Sam Wilson", "source": "Football Italia", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:32',
            'updated_at' => '2025-10-05 23:02:32',
            'deleted_at' => null,
        ],
        [
            'id' => 19,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'bff02e9fbca1ba7d94d4bfc288e79def4546bf3d',
            'content_hash' => '97d190f9f5aa53e06a5b6e232e59bb3b760c7cb161fe4a5822a3b39718a2f030',
            'title' => 'World must end impunity for war criminals: Iran',
            'slug' => 'httpsenglishkhabaronlineirnews200074world-must-end-impunity-for-war-criminals-iran',
            'excerpt' => 'Foreign Ministry spokesperson Esmaeil Baghaei has stressed that the world must stop brutal violations of the law, end impunity for war criminals and genocide, and hold accountable those who justify these crimes.',
            'body' => '<ul>
 <li>https://english.khabaronline.ir/xp53m</li>
 <li>6 October 2025 - 02:00</li>
 <li>News ID 200074</li>
 <li>
 <ol>
 <li><a target="_blank" rel="index" href="/service/Politics">Politics</a></li>
 </ol>
 </li>
 </ul>
<ol>
 <li><a target="_blank" rel="index" href="/service/Politics">Politics</a></li>
 </ol>
<ul>
 <li><i></i></li>
 <li><i></i></li>
 <li><i></i></li>
 <li><i></i></li>
 <li><i></i></li>
 </ul>
<ul>
 
 <li><a href="#"><i></i></a></li>
 </ul>
<p itemprop="description">Foreign Ministry spokesperson Esmaeil Baghaei has stressed that the world must stop brutal violations of the law, end impunity for war criminals and genocide, and hold accountable those who justify these crimes.</p>
<p></p>
<p>Baghaei wrote in a post on his X social media account that a month after the incident, the American media confirmed what everyone knew: "The drone attack on boats carrying humanitarian aid to Gaza off the coast of Tunisia was carried out on the orders of Netanyahu."</p>
<p>Baghaei added: "This is simply further evidence of the Israeli regime\'s complete disregard for the national sovereignty of countries, international law, and human life and dignity."</p>
<p>He stressed that the world must stop these brutal violations of the law, end the impunity of war criminals and genocidal perpetrators, and hold accountable those who justify these crimes.</p>',
            'image_path' => null,
            'original_url' => 'https://english.khabaronline.ir/news/200074/World-must-end-impunity-for-war-criminals-Iran',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:30:00',
            'imported_at' => '2025-10-05 23:02:34',
            'meta' => '{"author": null, "source": "Khabar Online", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:34',
            'updated_at' => '2025-10-05 23:02:34',
            'deleted_at' => null,
        ],
        [
            'id' => 20,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '70e472e427e2fde7346ec2c5cd3a1d719070dd51',
            'content_hash' => '46443bd97232becdf6f96fa3a2b10874afe898fd9438d5eac07087ab071283fb',
            'title' => 'How the Howard University School of Business equips students for entrepreneurial success',
            'slug' => 'httpsafrocomhoward-university-entrepreneurship-culture',
            'excerpt' => 'Howard University’s School of Business is redefining entrepreneurship education by combining a rigorous academic foundation with hands-on experience, mentorship, and cutting-edge tools like AI. With support from initiatives like the PNC National Center for Entrepreneurship, Howar...',
            'body' => '<h3><a href="https://afro.com/preserving-black-history-threatened/" rel="bookmark">ASALH leads resistance to attacks on Smithsonian and U.S. history</a></h3>',
            'image_path' => null,
            'original_url' => 'https://afro.com/howard-university-entrepreneurship-culture/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:30:00',
            'imported_at' => '2025-10-05 23:02:36',
            'meta' => '{"author": "Andrea Stevens", "source": "afro", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:36',
            'updated_at' => '2025-10-05 23:02:36',
            'deleted_at' => null,
        ],
        [
            'id' => 21,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '63db7f9d540ad10461b93af29899a5173bb40c4b',
            'content_hash' => '2ebeb5199d35427d0b5227b592daf0cc3f2472d2ea9e112805be1c1a2aa77968',
            'title' => 'Short Interest in Gabelli Multimedia Trust Inc. (NYSE:GGT) Decreases By 40.3%',
            'slug' => 'httpswwwmarketbeatcominstant-alertsshort-interest-in-gabelli-multimedia-trust-inc-nyseggt-decreases-by-403-2025-10-05',
            'excerpt' => 'Gabelli Multimedia Trust Inc. (NYSE:GGT - Get Free Report) saw a significant drop in short interest in the month of September. As of September 15th, there was short interest totaling 90,000 shares, a drop of 40.3% from the August 31st total of 150,700 shares. Based on an average...',
            'body' => '<h2>Key Points</h2>
<ul>
 <li>Gabelli Multimedia Trust Inc. saw a <strong>40.3% decrease</strong> in short interest, dropping from 150,700 shares to 90,000 shares as of September 15th.</li>
 <li>Several institutional investors have increased their stakes in Gabelli Multimedia Trust, with notable increases from Wealth Enhancement Advisory Services and Cetera Investment Advisers, raising their holdings by <strong>30.5%</strong> and <strong>73.8%</strong>, respectively.</li>
 <li>The company will pay a monthly dividend of <strong>$0.07 per share</strong> on November 20th, with an annualized yield of <strong>19.8%</strong>.</li>
<li><strong><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-KeyPoints">MarketBeat previews top five stocks to own in November</a>.</strong></li></ul>
<p></p>
<h2>Hedge Funds Weigh In On Gabelli Multimedia Trust</h2>
<p>Hedge funds and other institutional investors have recently added to or reduced their stakes in the stock. Belpointe Asset Management LLC lifted its stake in shares of Gabelli Multimedia Trust by 18.8% in the first quarter. Belpointe Asset Management LLC now owns 18,992 shares of the financial services provider\'s stock worth $88,000 after buying an additional 3,000 shares during the last quarter. Wealth Enhancement Advisory Services LLC raised its holdings in Gabelli Multimedia Trust by 30.5% in the 2nd quarter. Wealth Enhancement Advisory Services LLC now owns 14,030 shares of the financial services provider\'s stock worth $60,000 after acquiring an additional 3,282 shares during the period. Kestra Private Wealth Services LLC lifted its position in Gabelli Multimedia Trust by 16.7% during the 1st quarter. Kestra Private Wealth Services LLC now owns 38,450 shares of the financial services provider\'s stock worth $178,000 after acquiring an additional 5,512 shares during the last quarter. Raymond James Financial Inc. bought a new stake in Gabelli Multimedia Trust during the second quarter valued at about $27,000. Finally, Cetera Investment Advisers grew its position in shares of Gabelli Multimedia Trust by 73.8% in the second quarter. Cetera Investment Advisers now owns 21,703 shares of the financial services provider\'s stock valued at $90,000 after purchasing an additional 9,214 shares during the last quarter. Institutional investors and hedge funds own 10.63% of the company\'s stock. </p>
<h2>Gabelli Multimedia Trust Price Performance</h2>
<p>Shares of <a href="https://www.marketbeat.com/stocks/NYSE/GGT/options/" target="_blank">NYSE:GGT</a> traded up $0.01 on Friday, reaching $4.24. The company had a trading volume of 202,007 shares, compared to its average volume of 196,957. The stock has a 50-day moving average price of $4.25 and a 200 day moving average price of $4.27. Gabelli Multimedia Trust has a twelve month low of $3.75 and a twelve month high of $5.13. </p>
<h2>Gabelli Multimedia Trust Announces Dividend</h2>
<p>The business also recently announced a monthly dividend, which will be paid on Thursday, November 20th. Shareholders of record on Thursday, November 13th will be given a dividend of $0.07 per share. The ex-dividend date of this dividend is Thursday, November 13th. This represents a c) dividend on an annualized basis and a yield of 19.8%. </p>
<h2>About Gabelli Multimedia Trust</h2>
<p>The Gabelli Multimedia Trust Inc is a closed-ended equity mutual fund launched by GAMCO Investors, Inc It is managed by Gabelli Funds LLC. The fund invests in the public equity markets across the globe. It invests in stocks, convertible securities, preferred stock, options, and warrants of companies operating across global telecommunications, media, publishing, and entertainment industries.</p>
<h2>See Also</h2>
<ul><li><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=NewsSites-SeeAlso">Five stocks we like better than Gabelli Multimedia Trust</a></li><li><a href="https://www.marketbeat.com/all-access/insider-trades-screener/" target="_blank">Insider Trades May Not Tell You What You Think</a></li><li><a href="https://www.marketbeat.com/stock-ideas/3-defense-stocks-surging-as-ukraine-tensions-deepen/" target="_blank">3 Defense Stocks Surging as Ukraine Tensions Deepen</a></li><li><a href="https://www.marketbeat.com/types-of-stock/" target="_blank">There Are Different Types of Stock To Invest In</a></li><li><a href="https://www.marketbeat.com/originals/starbucks-stock-slumps-this-competitor-shows-strength/" target="_blank">Starbucks Stock Slumps; This Competitor Shows Strength</a></li><li><a href="https://www.marketbeat.com/originals/proctor-and-gamble-is-going-to-set-a-new-high/" target="_blank">Procter &amp; Gamble NYSE: PG Pulls Back After Shaky Guidance</a></li><li><a href="https://www.marketbeat.com/originals/the-trade-desk-2-signs-of-a-comeback-1-risk-ahead/" target="_blank">The Trade Desk: 2 Signs of a Comeback, 1 Risk Ahead</a></li></ul>
<p><em>This instant news alert was generated by narrative science technology and financial data from MarketBeat in order to provide readers with the fastest and most accurate reporting. This story was reviewed by MarketBeat\'s editorial team prior to publication. Please send any questions or comments about this story to contact@marketbeat.com.</em></p>
<h2><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">Should You Invest $1,000 in Gabelli Multimedia Trust Right Now?</a></h2>
<p>Before you consider Gabelli Multimedia Trust, you\'ll want to hear this.</p>
<p>MarketBeat keeps track of Wall Street\'s top-rated and best performing research analysts and the stocks they recommend to their clients on a daily basis. MarketBeat has identified the <a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">five stocks</a> that top analysts are quietly whispering to their clients to buy now before the broader market catches on... and Gabelli Multimedia Trust wasn\'t on the list.</p>
<p>While Gabelli Multimedia Trust currently has a Hold rating among analysts, top-rated analysts believe these five stocks are better buys.</p>
<p><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">View The Five Stocks Here </a></p>
<p>Thinking about investing in Meta, Roblox, or Unity? Enter your email to learn what streetwise investors need to know about the metaverse and public markets before making an investment.</p>
<h2>
Featured Articles and Offers</h2>
<h2>Recent Videos</h2>
<h2>Stock Lists</h2>
<ul><li><a href="/types-of-stock/5g-stocks/">5G </a></li><li><a href="/types-of-stock/biotech-stocks/">Biotech </a></li><li><a href="/types-of-stock/blue-chip-stocks/">Blue Chip </a></li><li><a href="/types-of-stock/faang-stocks/">FAANG </a></li><li><a href="/types-of-stock/gold-stocks/">Gold </a></li><li><a href="/types-of-stock/large-cap-stocks/">Large Cap </a></li><li><a href="/types-of-stock/marijuana-stocks/">Marijuana </a></li><li><a href="/types-of-stock/micro-cap-stocks/">Micro Cap </a></li><li><a href="/types-of-stock/oil-stocks/">Oil </a></li><li><a href="/types-of-stock/real-estate-investment-trusts-reits/">REITs </a></li><li><a href="/types-of-stock/russell-2000-stocks/">Russell 2000 </a></li><li><a href="/types-of-stock/small-cap-stocks/">Small Cap </a></li><li><a href="/types-of-stock/warren-buffett-stocks/">Warren Buffett </a></li></ul>
<h2>Investing Tools</h2>
<ul><li><a href="/ratings/">Analyst Ratings</a></li><li><a href="/cryptocurrencies/">Cryptocurrency Screener</a></li><li><a href="/congress-stock-trades/">Congressional Trading</a></li><li><a href="/dividends/increases/">Dividend Increases</a></li><li><a href="/dividends/calculator/">Dividend Calculator</a></li><li><a href="/dividends/increases/">Dividend Calendar</a></li><li><a href="/earnings/latest/">Earnings Announcements</a></li><li><a href="/insider-trades/">Insider Trades</a></li><li><a href="/calculators/options-profit-calculator/">Options Profit Calculator</a></li><li><a href="/types-of-stock/penny-stocks/">Penny Stocks</a></li><li><a href="/manage/watchlists/">Portfolio Monitoring</a></li><li><a href="/short-interest/">Short Interest</a></li><li><a href="/compare-stocks/">Stock Comparisons</a></li><li><a href="/stock-market-holidays/">Stock Market Holidays</a></li><li><a href="/stock-screener/">Stock Screener</a></li></ul>
<h2>Search Headlines</h2>
<p>Sign up for MarketBeat All Access to gain access to MarketBeat\'s full suite of research tools.</p>
<h2>MarketBeat All Access Features</h2>
<h3>Best-in-Class Portfolio Monitoring</h3>
<ul>
 <li>Get personalized stock ideas.</li>
 <li>Compare portfolio to indices.</li>
 <li>Check stock news, ratings, SEC filings, and more.</li>
 </ul>
<h3>Stock Ideas and Recommendations</h3>
<ul>
 <li>See daily stock ideas from top analysts.</li>
 <li>Receive short-term trading ideas from MarketBeat.</li>
 <li>Identify trending stocks on social media.</li>
 </ul>
<h3>Advanced Stock Screeners and Research Tools</h3>
<ul>
 <li>Use our seven stock screeners to find suitable stocks.</li>
 <li>Stay informed with MarketBeat\'s real-time news.</li>
 <li>Export data to Excel for personal analysis.</li>
 </ul>
<ul>
 <li>In-depth profiles and analysis for 20,000 public companies.</li>
 <li>Real-time analyst ratings, insider transactions, earnings data, and more.</li>
 <li>Our daily ratings and market update email newsletter.</li>
 </ul>
<ul role="tablist" aria-label="Log in or create account">
 <li>
 <a href="#pnlLoginOnModal" role="tab" aria-selected="true" tabindex="0" aria-controls="pnlLoginOnModal">Sign In</a>
 </li>
 <li>
 <a href="#pnlCreate" role="tab" aria-selected="false" tabindex="-1" aria-controls="pnlCreate">Create Account</a></li></ul>',
            'image_path' => null,
            'original_url' => 'https://www.marketbeat.com/instant-alerts/short-interest-in-gabelli-multimedia-trust-inc-nyseggt-decreases-by-403-2025-10-05/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:29:58',
            'imported_at' => '2025-10-05 23:02:37',
            'meta' => '{"author": null, "source": "lulegacy", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:37',
            'updated_at' => '2025-10-05 23:02:37',
            'deleted_at' => null,
        ],
        [
            'id' => 22,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'a43ba02f5066f7a4563a4fbd066f65cf08957054',
            'content_hash' => 'adfb0436b2e60ca3e2ed1d3baba6fb4f10e9c761d181718b6deeb859f8465e33',
            'title' => 'Short Interest in TechnipFMC plc (NYSE:FTI) Increases By 91.4%',
            'slug' => 'httpswwwmarketbeatcominstant-alertsshort-interest-in-technipfmc-plc-nysefti-increases-by-914-2025-10-05',
            'excerpt' => 'TechnipFMC plc (NYSE:FTI - Get Free Report) saw a significant increase in short interest in September. As of September 15th, there was short interest totaling 17,840,000 shares, an increase of 91.4% from the August 31st total of 9,320,000 shares. Based on an average daily trading...',
            'body' => '<h2>Key Points</h2>
<ul>
 <li>Short interest in <strong>TechnipFMC plc</strong> surged by <strong>91.4%</strong> in September, reaching a total of 17,840,000 shares sold short, which is <strong>4.4%</strong> of its total shares.</li>
 <li>The company recently announced its quarterly earnings, reporting $0.68 EPS, which exceeded analysts\' expectations of $0.57, and a revenue increase of <strong>9.0%</strong> year-over-year.</li>
 <li>TechnipFMC has declared a quarterly dividend of <strong>$0.05</strong> per share, translating to an annualized dividend yield of <strong>0.5%</strong>.</li>
<li><strong><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-KeyPoints">Five stocks we like better than TechnipFMC</a>.</strong></li></ul>
<p>TechnipFMC plc (<a href="https://www.marketbeat.com/stocks/NYSE/FTI/">NYSE:FTI</a> - <a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=FTI">Get Free Report</a>) was the target of a significant growth in short interest during the month of September. As of September 15th, there was short interest totaling 17,840,000 shares, a growth of 91.4% from the August 31st total of 9,320,000 shares. Based on an average daily trading volume, of 5,340,000 shares, the days-to-cover ratio is presently 3.3 days. Currently, 4.4% of the shares of the stock are sold short. Currently, 4.4% of the shares of the stock are sold short. Based on an average daily trading volume, of 5,340,000 shares, the days-to-cover ratio is presently 3.3 days. </p>
<h2>TechnipFMC Trading Down 1.0%</h2>
<ul><li><a href="https://www.marketbeat.com/stock-ideas/big-buybacks-announced-3-stocks-insiders-are-banking-on/">Big Buybacks Announced: 3 Stocks Insiders Are Banking On</a></li></ul>
<p><a href="https://www.marketbeat.com/stocks/NYSE/FTI/options/" target="_blank">FTI</a> traded down $0.40 during midday trading on Friday, reaching $38.02. 3,221,768 shares of the company were exchanged, compared to its average volume of 8,305,606. The stock has a market capitalization of $15.63 billion, a P/E ratio of 17.94, a PEG ratio of 1.22 and a beta of 1.04. TechnipFMC has a one year low of $22.11 and a one year high of $41.29. The stock\'s 50-day simple moving average is $37.51 and its 200 day simple moving average is $33.22. The company has a debt-to-equity ratio of 0.15, a quick ratio of 0.86 and a current ratio of 1.10. </p>
<p>TechnipFMC (<a href="https://www.marketbeat.com/stocks/NYSE/FTI/">NYSE:FTI</a> - <a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=FTI">Get Free Report</a>) last announced its quarterly earnings results on Thursday, July 24th. The oil and gas company reported $0.68 EPS for the quarter, beating analysts\' consensus estimates of $0.57 by $0.11. TechnipFMC had a return on equity of 29.42% and a net margin of 9.60%.The company had revenue of $2.53 billion during the quarter, compared to analysts\' expectations of $2.49 billion. During the same period in the prior year, the business posted $0.43 EPS. TechnipFMC\'s revenue was up 9.0% on a year-over-year basis. TechnipFMC has set its FY 2025 guidance at EPS. As a group, analysts forecast that TechnipFMC will post 1.63 earnings per share for the current fiscal year. </p>
<h2>TechnipFMC Announces Dividend</h2>
<ul><li><a href="https://www.marketbeat.com/originals/3-stocks-for-the-resurgent-energy-rally/">3 Stocks For the Resurgent Energy Rally</a></li></ul>
<p>The company also recently declared a quarterly dividend, which was paid on Wednesday, September 3rd. Stockholders of record on Tuesday, August 19th were issued a $0.05 dividend. The ex-dividend date of this dividend was Tuesday, August 19th. This represents a $0.20 annualized dividend and a dividend yield of 0.5%. TechnipFMC\'s payout ratio is 9.43%. </p>
<h2>Wall Street Analyst Weigh In</h2>
<p>FTI has been the subject of several research reports. Evercore ISI lifted their target price on TechnipFMC from $42.00 to $46.00 and gave the company an "outperform" rating in a research note on Friday, July 25th. BTIG Research cut TechnipFMC from a "buy" rating to a "neutral" rating in a report on Monday, July 14th. <a href="https://www.wallstreetzen.com/newsletters/zen-ratings?ticker=FTI&amp;utm_campaign=getratings&amp;utm_medium=online&amp;utm_source=MarketBeat">Wall Street Zen</a> raised TechnipFMC from a "hold" rating to a "buy" rating in a report on Saturday. Royal Bank Of Canada raised their target price on shares of TechnipFMC from $37.00 to $40.00 and gave the company an "outperform" rating in a research note on Friday, July 25th. Finally, <a href="https://weissratings.com/">Weiss Ratings</a> reiterated a "buy (b)" rating on shares of TechnipFMC in a research report on Saturday, September 27th. One equities research analyst has rated the stock with a Strong Buy rating, thirteen have given a Buy rating and three have issued a Hold rating to the company. According to data from MarketBeat.com, the stock has a consensus rating of "Moderate Buy" and an average target price of $39.21.</p>
<ul><li><a href="https://www.marketbeat.com/originals/3-oil-and-gas-gear-makers-with-triple-digit-eps-growth-forecasts/">3 Oil &amp; Gas Gear Makers With Triple-Digit EPS Growth Forecasts</a></li></ul>
<p><b><a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=FTI" rel="nofollow">Check Out Our Latest Research Report on TechnipFMC</a></b></p>
<h2>Insider Activity at TechnipFMC</h2>
<p>In other TechnipFMC news, insider <a target="_blank" rel="nofollow" href="https://www.insidertrades.com/technipfmc-plc-stock/thierry-conti">Thierry Conti</a> sold 50,000 shares of the stock in a transaction dated Monday, September 22nd. The shares were sold at an average price of $38.64, for a total transaction of $1,932,000.00. Following the sale, the insider owned 56,352 shares of the company\'s stock, valued at $2,177,441.28. This represents a 47.01% decrease in their position. The sale was disclosed in a legal filing with the Securities &amp; Exchange Commission, which can be accessed through <a href="http://www.sec.gov/Archives/edgar/data/1681459/000192841725000006/xslF345X05/wk-form4_1758659707.xml" target="_blank">this hyperlink</a>. Also, Director Rousset Sophie Zurquiyah sold 9,381 shares of the firm\'s stock in a transaction dated Friday, July 25th. The shares were sold at an average price of $37.12, for a total transaction of $348,222.72. Following the completion of the sale, the director owned 62,978 shares of the company\'s stock, valued at $2,337,743.36. The trade was a 12.96% decrease in their position. The disclosure for this sale can be found <a href="http://www.sec.gov/Archives/edgar/data/1382500/000138250025000006/xslF345X05/wk-form4_1753747092.xml" target="_blank">here</a>. Insiders have sold 885,984 shares of company stock worth $34,180,811 in the last 90 days. Corporate insiders own 1.80% of the company\'s stock. </p>
<h2>Institutional Trading of TechnipFMC</h2>
<p>Several hedge funds have recently added to or reduced their stakes in FTI. New York State Teachers Retirement System acquired a new position in TechnipFMC in the first quarter valued at about $33,000. Geneos Wealth Management Inc. lifted its holdings in shares of TechnipFMC by 45.3% during the 1st quarter. Geneos Wealth Management Inc. now owns 1,090 shares of the oil and gas company\'s stock valued at $35,000 after purchasing an additional 340 shares in the last quarter. Caitong International Asset Management Co. Ltd acquired a new position in shares of TechnipFMC in the 2nd quarter valued at approximately $44,000. Financial Network Wealth Advisors LLC increased its stake in TechnipFMC by 29.7% during the 1st quarter. Financial Network Wealth Advisors LLC now owns 1,511 shares of the oil and gas company\'s stock worth $48,000 after purchasing an additional 346 shares in the last quarter. Finally, Ossiam raised its holdings in TechnipFMC by 52.0% during the 2nd quarter. Ossiam now owns 1,597 shares of the oil and gas company\'s stock worth $55,000 after buying an additional 546 shares during the period. Institutional investors and hedge funds own 96.58% of the company\'s stock. </p>
<h2>About TechnipFMC</h2>
<p>TechnipFMC plc engages in the energy projects, technologies, and systems and services businesses in Europe, Central Asia, North America, Latin America, the Asia Pacific, Africa, the Middle East, and internationally. It operates through two segments: Subsea and Surface Technologies. The Subsea segment engages in the design, engineering, procurement, manufacturing, fabrication, installation, and life of field services for subsea systems, subsea field infrastructure, and subsea pipe systems used in oil and gas production and transportation.</p>
<h2>See Also</h2>
<ul><li><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=NewsSites-SeeAlso">Five stocks we like better than TechnipFMC</a></li><li><a href="https://www.marketbeat.com/originals/top-10-natural-gas-stocks-to-buy-now/" target="_blank">3 Natural Gas Stocks That Offer Great Dividend Yields</a></li><li><a href="https://www.marketbeat.com/stock-ideas/3-defense-stocks-surging-as-ukraine-tensions-deepen/" target="_blank">3 Defense Stocks Surging as Ukraine Tensions Deepen</a></li><li><a href="https://www.marketbeat.com/calculators/market-cap-calculator/" target="_blank">Market Cap Calculator: How to Calculate Market Cap</a></li><li><a href="https://www.marketbeat.com/originals/starbucks-stock-slumps-this-competitor-shows-strength/" target="_blank">Starbucks Stock Slumps; This Competitor Shows Strength</a></li><li><a href="https://www.marketbeat.com/market-data/low-priced-stocks/" target="_blank">Best Stocks Under $10.00 </a></li><li><a href="https://www.marketbeat.com/originals/the-trade-desk-2-signs-of-a-comeback-1-risk-ahead/" target="_blank">The Trade Desk: 2 Signs of a Comeback, 1 Risk Ahead</a></li></ul>
<p><em>This instant news alert was generated by narrative science technology and financial data from MarketBeat in order to provide readers with the fastest and most accurate reporting. This story was reviewed by MarketBeat\'s editorial team prior to publication. Please send any questions or comments about this story to contact@marketbeat.com.</em></p>
<h2><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">Should You Invest $1,000 in TechnipFMC Right Now?</a></h2>
<p>Before you consider TechnipFMC, you\'ll want to hear this.</p>
<p>MarketBeat keeps track of Wall Street\'s top-rated and best performing research analysts and the stocks they recommend to their clients on a daily basis. MarketBeat has identified the <a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">five stocks</a> that top analysts are quietly whispering to their clients to buy now before the broader market catches on... and TechnipFMC wasn\'t on the list.</p>
<p>While TechnipFMC currently has a Moderate Buy rating among analysts, top-rated analysts believe these five stocks are better buys.</p>
<p><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">View The Five Stocks Here </a></p>
<p>Market downturns give many investors pause, and for good reason. Wondering how to offset this risk? Enter your email address to learn more about using beta to protect your portfolio.</p>
<h2>
Featured Articles and Offers</h2>
<h2>Recent Videos</h2>
<h2>Stock Lists</h2>
<ul><li><a href="/types-of-stock/5g-stocks/">5G </a></li><li><a href="/types-of-stock/biotech-stocks/">Biotech </a></li><li><a href="/types-of-stock/blue-chip-stocks/">Blue Chip </a></li><li><a href="/types-of-stock/faang-stocks/">FAANG </a></li><li><a href="/types-of-stock/gold-stocks/">Gold </a></li><li><a href="/types-of-stock/large-cap-stocks/">Large Cap </a></li><li><a href="/types-of-stock/marijuana-stocks/">Marijuana </a></li><li><a href="/types-of-stock/micro-cap-stocks/">Micro Cap </a></li><li><a href="/types-of-stock/oil-stocks/">Oil </a></li><li><a href="/types-of-stock/real-estate-investment-trusts-reits/">REITs </a></li><li><a href="/types-of-stock/russell-2000-stocks/">Russell 2000 </a></li><li><a href="/types-of-stock/small-cap-stocks/">Small Cap </a></li><li><a href="/types-of-stock/warren-buffett-stocks/">Warren Buffett </a></li></ul>
<h2>Investing Tools</h2>
<ul><li><a href="/ratings/">Analyst Ratings</a></li><li><a href="/cryptocurrencies/">Cryptocurrency Screener</a></li><li><a href="/congress-stock-trades/">Congressional Trading</a></li><li><a href="/dividends/increases/">Dividend Increases</a></li><li><a href="/dividends/calculator/">Dividend Calculator</a></li><li><a href="/dividends/increases/">Dividend Calendar</a></li><li><a href="/earnings/latest/">Earnings Announcements</a></li><li><a href="/insider-trades/">Insider Trades</a></li><li><a href="/calculators/options-profit-calculator/">Options Profit Calculator</a></li><li><a href="/types-of-stock/penny-stocks/">Penny Stocks</a></li><li><a href="/manage/watchlists/">Portfolio Monitoring</a></li><li><a href="/short-interest/">Short Interest</a></li><li><a href="/compare-stocks/">Stock Comparisons</a></li><li><a href="/stock-market-holidays/">Stock Market Holidays</a></li><li><a href="/stock-screener/">Stock Screener</a></li></ul>
<h2>Search Headlines</h2>
<p>Sign up for MarketBeat All Access to gain access to MarketBeat\'s full suite of research tools.</p>
<h2>MarketBeat All Access Features</h2>
<h3>Best-in-Class Portfolio Monitoring</h3>
<ul>
 <li>Get personalized stock ideas.</li>
 <li>Compare portfolio to indices.</li>
 <li>Check stock news, ratings, SEC filings, and more.</li>
 </ul>
<h3>Stock Ideas and Recommendations</h3>
<ul>
 <li>See daily stock ideas from top analysts.</li>
 <li>Receive short-term trading ideas from MarketBeat.</li>
 <li>Identify trending stocks on social media.</li>
 </ul>
<h3>Advanced Stock Screeners and Research Tools</h3>
<ul>
 <li>Use our seven stock screeners to find suitable stocks.</li>
 <li>Stay informed with MarketBeat\'s real-time news.</li>
 <li>Export data to Excel for personal analysis.</li>
 </ul>
<ul>
 <li>In-depth profiles and analysis for 20,000 public companies.</li>
 <li>Real-time analyst ratings, insider transactions, earnings data, and more.</li>
 <li>Our daily ratings and market update email newsletter.</li>
 </ul>
<ul role="tablist" aria-label="Log in or create account">
 <li>
 <a href="#pnlLoginOnModal" role="tab" aria-selected="true" tabindex="0" aria-controls="pnlLoginOnModal">Sign In</a>
 </li>
 <li>
 <a href="#pnlCreate" role="tab" aria-selected="false" tabindex="-1" aria-controls="pnlCreate">Create Account</a></li></ul>',
            'image_path' => null,
            'original_url' => 'https://www.marketbeat.com/instant-alerts/short-interest-in-technipfmc-plc-nysefti-increases-by-914-2025-10-05/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:29:57',
            'imported_at' => '2025-10-05 23:02:37',
            'meta' => '{"author": null, "source": "lulegacy", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:37',
            'updated_at' => '2025-10-05 23:02:37',
            'deleted_at' => null,
        ],
        [
            'id' => 23,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '7f385aa6d461b78a7971dd26d0ee2de58d947cb1',
            'content_hash' => '2f7def36c9238527aa987917d3d05f2c3fcbc326c136026d3c5931f9d61d377c',
            'title' => 'Gabelli Equity Trust Inc. (NYSE:GAB) Sees Significant Growth in Short Interest',
            'slug' => 'httpswwwmarketbeatcominstant-alertsgabelli-equity-trust-inc-nysegab-sees-significant-growth-in-short-interest-2025-10-05',
            'excerpt' => 'Gabelli Equity Trust Inc. (NYSE:GAB - Get Free Report) saw a significant increase in short interest in the month of September. As of September 15th, there was short interest totaling 895,000 shares, an increase of 98.6% from the August 31st total of 450,700 shares. Based on an av...',
            'body' => '<h2>Key Points</h2>
<ul>
 <li>Gabelli Equity Trust Inc. experienced a substantial increase in short interest, rising by <strong>98.6%</strong> to <strong>895,000 shares</strong> as of September 15th, 2023.</li>
 <li>Institutional ownership has increased significantly, with several firms, including <strong>Geneos Wealth Management</strong> and <strong>Northwestern Mutual Wealth Management</strong>, boosting their stakes in the fund.</li>
 <li>The company declared a quarterly dividend of <strong>$0.15 per share</strong>, reflecting a <strong>9.7% yield</strong> based on the annualized amount.</li>
<li><strong><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-KeyPoints">Interested in Gabelli Equity Trust? Here are five stocks we like better</a>.</strong></li></ul>
<p></p>
<h2>Institutional Trading of Gabelli Equity Trust</h2>
<p>Institutional investors have recently bought and sold shares of the stock. Geneos Wealth Management Inc. lifted its holdings in shares of Gabelli Equity Trust by 200.0% in the 2nd quarter. Geneos Wealth Management Inc. now owns 5,100 shares of the financial services provider\'s stock worth $30,000 after acquiring an additional 3,400 shares during the last quarter. MorganRosel Wealth Management LLC purchased a new stake in Gabelli Equity Trust in the 2nd quarter worth about $36,000. Northwestern Mutual Wealth Management Co. lifted its stake in Gabelli Equity Trust by 472.6% in the first quarter. Northwestern Mutual Wealth Management Co. now owns 7,850 shares of the financial services provider\'s stock worth $43,000 after purchasing an additional 6,479 shares during the last quarter. PNC Financial Services Group Inc. boosted its position in shares of Gabelli Equity Trust by 194.3% during the first quarter. PNC Financial Services Group Inc. now owns 8,251 shares of the financial services provider\'s stock valued at $45,000 after buying an additional 5,447 shares during the period. Finally, Novem Group bought a new position in shares of Gabelli Equity Trust during the first quarter valued at approximately $58,000. 7.24% of the stock is currently owned by institutional investors. </p>
<h2>Gabelli Equity Trust Trading Up 0.1%</h2>
<p><a href="https://www.marketbeat.com/stocks/NYSE/GAB/options/" target="_blank">GAB</a> traded up $0.01 on Friday, hitting $6.16. The company had a trading volume of 288,297 shares, compared to its average volume of 599,505. The business\'s fifty day simple moving average is $6.05 and its 200 day simple moving average is $5.77. Gabelli Equity Trust has a 12-month low of $4.50 and a 12-month high of $6.32. </p>
<h2>Gabelli Equity Trust Announces Dividend</h2>
<p>The business also recently declared a quarterly dividend, which was paid on Tuesday, September 23rd. Investors of record on Tuesday, September 16th were issued a dividend of $0.15 per share. This represents a $0.60 annualized dividend and a yield of 9.7%. The ex-dividend date was Tuesday, September 16th. </p>
<h2>About Gabelli Equity Trust</h2>
<p>The Gabelli Equity Trust Inc is a closed ended equity mutual fund launched by GAMCO Investors, Inc The fund is managed by Gabelli Funds, LLC. It invests in public equity markets of the United States. The fund seeks to invest in stocks of companies operating across diversified sectors. It invests in preferred stock, convertible or exchangeable securities, and warrants and rights.</p>
<h2>See Also</h2>
<ul><li><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=NewsSites-SeeAlso">Five stocks we like better than Gabelli Equity Trust</a></li><li><a href="https://www.marketbeat.com/market-data/unusual-put-options-volume/" target="_blank">What is Put Option Volume?</a></li><li><a href="https://www.marketbeat.com/stock-ideas/3-defense-stocks-surging-as-ukraine-tensions-deepen/" target="_blank">3 Defense Stocks Surging as Ukraine Tensions Deepen</a></li><li><a href="https://www.marketbeat.com/types-of-stock/penny-stocks/" target="_blank">Are Penny Stocks a Good Fit for Your Portfolio?</a></li><li><a href="https://www.marketbeat.com/originals/starbucks-stock-slumps-this-competitor-shows-strength/" target="_blank">Starbucks Stock Slumps; This Competitor Shows Strength</a></li><li><a href="https://www.marketbeat.com/types-of-stock/faang-stocks/" target="_blank">How to Invest in the FAANG Stocks</a></li><li><a href="https://www.marketbeat.com/originals/the-trade-desk-2-signs-of-a-comeback-1-risk-ahead/" target="_blank">The Trade Desk: 2 Signs of a Comeback, 1 Risk Ahead</a></li></ul>
<p><em>This instant news alert was generated by narrative science technology and financial data from MarketBeat in order to provide readers with the fastest and most accurate reporting. This story was reviewed by MarketBeat\'s editorial team prior to publication. Please send any questions or comments about this story to contact@marketbeat.com.</em></p>
<h2><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">Should You Invest $1,000 in Gabelli Equity Trust Right Now?</a></h2>
<p>Before you consider Gabelli Equity Trust, you\'ll want to hear this.</p>
<p>MarketBeat keeps track of Wall Street\'s top-rated and best performing research analysts and the stocks they recommend to their clients on a daily basis. MarketBeat has identified the <a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">five stocks</a> that top analysts are quietly whispering to their clients to buy now before the broader market catches on... and Gabelli Equity Trust wasn\'t on the list.</p>
<p>While Gabelli Equity Trust currently has a Hold rating among analysts, top-rated analysts believe these five stocks are better buys.</p>
<p><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">View The Five Stocks Here </a></p>
<p>Enter your email address and we\'ll send you MarketBeat\'s guide to investing in 5G and which 5G stocks show the most promise. </p>
<h2>
Featured Articles and Offers</h2>
<h2>Recent Videos</h2>
<h2>Stock Lists</h2>
<ul><li><a href="/types-of-stock/5g-stocks/">5G </a></li><li><a href="/types-of-stock/biotech-stocks/">Biotech </a></li><li><a href="/types-of-stock/blue-chip-stocks/">Blue Chip </a></li><li><a href="/types-of-stock/faang-stocks/">FAANG </a></li><li><a href="/types-of-stock/gold-stocks/">Gold </a></li><li><a href="/types-of-stock/large-cap-stocks/">Large Cap </a></li><li><a href="/types-of-stock/marijuana-stocks/">Marijuana </a></li><li><a href="/types-of-stock/micro-cap-stocks/">Micro Cap </a></li><li><a href="/types-of-stock/oil-stocks/">Oil </a></li><li><a href="/types-of-stock/real-estate-investment-trusts-reits/">REITs </a></li><li><a href="/types-of-stock/russell-2000-stocks/">Russell 2000 </a></li><li><a href="/types-of-stock/small-cap-stocks/">Small Cap </a></li><li><a href="/types-of-stock/warren-buffett-stocks/">Warren Buffett </a></li></ul>
<h2>Investing Tools</h2>
<ul><li><a href="/ratings/">Analyst Ratings</a></li><li><a href="/cryptocurrencies/">Cryptocurrency Screener</a></li><li><a href="/congress-stock-trades/">Congressional Trading</a></li><li><a href="/dividends/increases/">Dividend Increases</a></li><li><a href="/dividends/calculator/">Dividend Calculator</a></li><li><a href="/dividends/increases/">Dividend Calendar</a></li><li><a href="/earnings/latest/">Earnings Announcements</a></li><li><a href="/insider-trades/">Insider Trades</a></li><li><a href="/calculators/options-profit-calculator/">Options Profit Calculator</a></li><li><a href="/types-of-stock/penny-stocks/">Penny Stocks</a></li><li><a href="/manage/watchlists/">Portfolio Monitoring</a></li><li><a href="/short-interest/">Short Interest</a></li><li><a href="/compare-stocks/">Stock Comparisons</a></li><li><a href="/stock-market-holidays/">Stock Market Holidays</a></li><li><a href="/stock-screener/">Stock Screener</a></li></ul>
<h2>Search Headlines</h2>
<p>Sign up for MarketBeat All Access to gain access to MarketBeat\'s full suite of research tools.</p>
<h2>MarketBeat All Access Features</h2>
<h3>Best-in-Class Portfolio Monitoring</h3>
<ul>
 <li>Get personalized stock ideas.</li>
 <li>Compare portfolio to indices.</li>
 <li>Check stock news, ratings, SEC filings, and more.</li>
 </ul>
<h3>Stock Ideas and Recommendations</h3>
<ul>
 <li>See daily stock ideas from top analysts.</li>
 <li>Receive short-term trading ideas from MarketBeat.</li>
 <li>Identify trending stocks on social media.</li>
 </ul>
<h3>Advanced Stock Screeners and Research Tools</h3>
<ul>
 <li>Use our seven stock screeners to find suitable stocks.</li>
 <li>Stay informed with MarketBeat\'s real-time news.</li>
 <li>Export data to Excel for personal analysis.</li>
 </ul>
<ul>
 <li>In-depth profiles and analysis for 20,000 public companies.</li>
 <li>Real-time analyst ratings, insider transactions, earnings data, and more.</li>
 <li>Our daily ratings and market update email newsletter.</li>
 </ul>
<ul role="tablist" aria-label="Log in or create account">
 <li>
 <a href="#pnlLoginOnModal" role="tab" aria-selected="true" tabindex="0" aria-controls="pnlLoginOnModal">Sign In</a>
 </li>
 <li>
 <a href="#pnlCreate" role="tab" aria-selected="false" tabindex="-1" aria-controls="pnlCreate">Create Account</a></li></ul>',
            'image_path' => null,
            'original_url' => 'https://www.marketbeat.com/instant-alerts/gabelli-equity-trust-inc-nysegab-sees-significant-growth-in-short-interest-2025-10-05/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:29:57',
            'imported_at' => '2025-10-05 23:02:38',
            'meta' => '{"author": null, "source": "lulegacy", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:38',
            'updated_at' => '2025-10-05 23:02:38',
            'deleted_at' => null,
        ],
        [
            'id' => 24,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '88b5208ed20e790d3a1d8089a2c7a150ad753dd3',
            'content_hash' => '4047a318cab1c7f05f1adb422d5223005d4f815b92d89f63229af9460c537a68',
            'title' => 'Deutsche Bank Aktiengesellschaft (NYSE:DB) Short Interest Update',
            'slug' => 'httpswwwmarketbeatcominstant-alertsdeutsche-bank-aktiengesellschaft-nysedb-short-interest-update-2025-10-05',
            'excerpt' => 'Deutsche Bank Aktiengesellschaft (NYSE:DB - Get Free Report) was the target of a significant growth in short interest in the month of September. As of September 15th, there was short interest totaling 12,000,000 shares, a growth of 79.4% from the August 31st total of 6,690,000 sh...',
            'body' => '<h2>Key Points</h2>
<ul>
 <li>Deutsche Bank Aktiengesellschaft saw a significant increase in short interest, rising by <strong>79.4%</strong> to 12 million shares for the month of September.</li>
 <li>Institutional investors now own approximately <strong>27.90%</strong> of the bank\'s stock, with several firms, including Valeo Financial Advisors and Osaic Holdings, modifying their stakes recently.</li>
 <li>The bank reported <strong>$0.54 EPS</strong> for the last quarter, missing estimates, but had revenue of $9.21 billion, exceeding analyst expectations of $7.80 billion.</li>
<li><strong><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-KeyPoints">Interested in Deutsche Bank Aktiengesellschaft? Here are five stocks we like better</a>.</strong></li></ul>
<p>Deutsche Bank Aktiengesellschaft (<a href="https://www.marketbeat.com/stocks/NYSE/DB/">NYSE:DB</a> - <a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=DB">Get Free Report</a>) was the recipient of a significant increase in short interest during the month of September. As of September 15th, there was short interest totaling 12,000,000 shares, an increase of 79.4% from the August 31st total of 6,690,000 shares. Based on an average daily volume of 2,670,000 shares, the short-interest ratio is presently 4.5 days. Approximately 0.7% of the shares of the company are sold short. Approximately 0.7% of the shares of the company are sold short. Based on an average daily volume of 2,670,000 shares, the short-interest ratio is presently 4.5 days. </p>
<h2>Institutional Investors Weigh In On Deutsche Bank Aktiengesellschaft</h2>
<ul><li><a href="https://www.marketbeat.com/stock-ideas/3-stocks-offering-strong-value-and-stability/">3 Stocks Offering Strong Value and Stability</a></li></ul>
<p>Several large investors have recently modified their holdings of DB. Valeo Financial Advisors LLC acquired a new stake in shares of Deutsche Bank Aktiengesellschaft during the second quarter worth $278,000. Osaic Holdings Inc. increased its stake in Deutsche Bank Aktiengesellschaft by 20.6% in the 2nd quarter. Osaic Holdings Inc. now owns 53,062 shares of the bank\'s stock worth $1,503,000 after purchasing an additional 9,076 shares in the last quarter. Orion Porfolio Solutions LLC raised its holdings in Deutsche Bank Aktiengesellschaft by 67.4% during the 2nd quarter. Orion Porfolio Solutions LLC now owns 21,753 shares of the bank\'s stock worth $637,000 after buying an additional 8,760 shares during the period. Squarepoint Ops LLC lifted its stake in Deutsche Bank Aktiengesellschaft by 176.4% during the second quarter. Squarepoint Ops LLC now owns 62,747 shares of the bank\'s stock valued at $1,837,000 after buying an additional 40,045 shares in the last quarter. Finally, Thrivent Financial for Lutherans acquired a new position in shares of Deutsche Bank Aktiengesellschaft in the second quarter worth about $11,588,000. 27.90% of the stock is owned by institutional investors. </p>
<h2>Deutsche Bank Aktiengesellschaft Price Performance</h2>
<p>Shares of <a href="https://www.marketbeat.com/stocks/NYSE/DB/options/" target="_blank">NYSE:DB</a> traded up $0.37 during trading hours on Friday, hitting $35.64. 1,810,309 shares of the company\'s stock traded hands, compared to its average volume of 2,377,086. The company\'s fifty day simple moving average is $35.59 and its two-hundred day simple moving average is $29.90. The company has a market cap of $70.99 billion, a price-to-earnings ratio of 13.55, a price-to-earnings-growth ratio of 0.44 and a beta of 0.98. The company has a debt-to-equity ratio of 1.39, a quick ratio of 0.79 and a current ratio of 0.79. Deutsche Bank Aktiengesellschaft has a 52 week low of $16.02 and a 52 week high of $37.86. </p>
<ul><li><a href="https://www.marketbeat.com/stock-ideas/best-ultra-value-stocks-set-for-long-term-growth/">Best Ultra-Value Stocks Set for Long-Term Growth</a></li></ul>
<p>Deutsche Bank Aktiengesellschaft (<a href="https://www.marketbeat.com/stocks/NYSE/DB/">NYSE:DB</a> - <a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=DB">Get Free Report</a>) last released its earnings results on Thursday, July 24th. The bank reported $0.54 EPS for the quarter, missing the consensus estimate of $0.78 by ($0.24). The business had revenue of $9.21 billion for the quarter, compared to analyst estimates of $7.80 billion. Deutsche Bank Aktiengesellschaft had a net margin of 7.67% and a return on equity of 6.01%. As a group, equities analysts anticipate that Deutsche Bank Aktiengesellschaft will post 2.93 EPS for the current fiscal year. </p>
<h2>Analysts Set New Price Targets</h2>
<p>Several equities research analysts recently weighed in on the stock. <a href="https://www.wallstreetzen.com/newsletters/zen-ratings?ticker=DB&amp;utm_campaign=getratings&amp;utm_medium=online&amp;utm_source=MarketBeat">Wall Street Zen</a> lowered shares of Deutsche Bank Aktiengesellschaft from a "buy" rating to a "hold" rating in a research note on Saturday, July 26th. Royal Bank Of Canada reiterated an "outperform" rating on shares of Deutsche Bank Aktiengesellschaft in a research report on Monday, July 28th. Zacks Research lowered Deutsche Bank Aktiengesellschaft from a "strong-buy" rating to a "hold" rating in a research report on Friday, August 22nd. The Goldman Sachs Group cut Deutsche Bank Aktiengesellschaft from a "buy" rating to a "neutral" rating in a research note on Tuesday, August 26th. Finally, <a href="https://weissratings.com/">Weiss Ratings</a> restated a "buy (b)" rating on shares of Deutsche Bank Aktiengesellschaft in a research report on Saturday, September 27th. Five equities research analysts have rated the stock with a Buy rating, four have issued a Hold rating and one has assigned a Sell rating to the stock. According to data from MarketBeat.com, Deutsche Bank Aktiengesellschaft has a consensus rating of "Hold".</p>
<ul><li><a href="https://www.marketbeat.com/originals/bath-and-body-works-rebound-ahead-why-analysts-remain-optimistic/">Bath &amp; Body Works Rebound Ahead? Why Analysts Remain Optimistic</a></li></ul>
<p><b><a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=DB" rel="nofollow">Check Out Our Latest Analysis on DB</a></b></p>
<h2>About Deutsche Bank Aktiengesellschaft</h2>
<p>Deutsche Bank Aktiengesellschaft, a stock corporation, provides corporate and investment banking, and asset management products and services to private individuals, corporate entities, and institutional clients in Germany, the United Kingdom, rest of Europe, the Middle East, Africa, the Americas, and the Asia-Pacific.</p>
<h2>See Also</h2>
<ul><li><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=NewsSites-SeeAlso">Five stocks we like better than Deutsche Bank Aktiengesellschaft</a></li><li><a href="https://www.marketbeat.com/stocks/OTCMKTS/#what-investors-must-know-about-over-the-counter-otc-stocks" target="_blank">What Investors Must Know About Over-the-Counter (OTC) Stocks</a></li><li><a href="https://www.marketbeat.com/stock-ideas/3-defense-stocks-surging-as-ukraine-tensions-deepen/" target="_blank">3 Defense Stocks Surging as Ukraine Tensions Deepen</a></li><li><a href="https://www.marketbeat.com/types-of-stock/russell-2000-stocks/" target="_blank">Russell 2000 Index, How Investors Use it For Profitable Trading</a></li><li><a href="https://www.marketbeat.com/originals/starbucks-stock-slumps-this-competitor-shows-strength/" target="_blank">Starbucks Stock Slumps; This Competitor Shows Strength</a></li><li><a href="https://www.marketbeat.com/stocks/TSE/" target="_blank">What is the S&amp;P/TSX Index?</a></li><li><a href="https://www.marketbeat.com/originals/the-trade-desk-2-signs-of-a-comeback-1-risk-ahead/" target="_blank">The Trade Desk: 2 Signs of a Comeback, 1 Risk Ahead</a></li></ul>
<p><em>This instant news alert was generated by narrative science technology and financial data from MarketBeat in order to provide readers with the fastest and most accurate reporting. This story was reviewed by MarketBeat\'s editorial team prior to publication. Please send any questions or comments about this story to contact@marketbeat.com.</em></p>
<h2><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">Should You Invest $1,000 in Deutsche Bank Aktiengesellschaft Right Now?</a></h2>
<p>Before you consider Deutsche Bank Aktiengesellschaft, you\'ll want to hear this.</p>
<p>MarketBeat keeps track of Wall Street\'s top-rated and best performing research analysts and the stocks they recommend to their clients on a daily basis. MarketBeat has identified the <a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">five stocks</a> that top analysts are quietly whispering to their clients to buy now before the broader market catches on... and Deutsche Bank Aktiengesellschaft wasn\'t on the list.</p>
<p>While Deutsche Bank Aktiengesellschaft currently has a Hold rating among analysts, top-rated analysts believe these five stocks are better buys.</p>
<p><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">View The Five Stocks Here </a></p>
<p>Thinking about investing in Meta, Roblox, or Unity? Enter your email to learn what streetwise investors need to know about the metaverse and public markets before making an investment.</p>
<h2>
Featured Articles and Offers</h2>
<h2>Recent Videos</h2>
<h2>Stock Lists</h2>
<ul><li><a href="/types-of-stock/5g-stocks/">5G </a></li><li><a href="/types-of-stock/biotech-stocks/">Biotech </a></li><li><a href="/types-of-stock/blue-chip-stocks/">Blue Chip </a></li><li><a href="/types-of-stock/faang-stocks/">FAANG </a></li><li><a href="/types-of-stock/gold-stocks/">Gold </a></li><li><a href="/types-of-stock/large-cap-stocks/">Large Cap </a></li><li><a href="/types-of-stock/marijuana-stocks/">Marijuana </a></li><li><a href="/types-of-stock/micro-cap-stocks/">Micro Cap </a></li><li><a href="/types-of-stock/oil-stocks/">Oil </a></li><li><a href="/types-of-stock/real-estate-investment-trusts-reits/">REITs </a></li><li><a href="/types-of-stock/russell-2000-stocks/">Russell 2000 </a></li><li><a href="/types-of-stock/small-cap-stocks/">Small Cap </a></li><li><a href="/types-of-stock/warren-buffett-stocks/">Warren Buffett </a></li></ul>
<h2>Investing Tools</h2>
<ul><li><a href="/ratings/">Analyst Ratings</a></li><li><a href="/cryptocurrencies/">Cryptocurrency Screener</a></li><li><a href="/congress-stock-trades/">Congressional Trading</a></li><li><a href="/dividends/increases/">Dividend Increases</a></li><li><a href="/dividends/calculator/">Dividend Calculator</a></li><li><a href="/dividends/increases/">Dividend Calendar</a></li><li><a href="/earnings/latest/">Earnings Announcements</a></li><li><a href="/insider-trades/">Insider Trades</a></li><li><a href="/calculators/options-profit-calculator/">Options Profit Calculator</a></li><li><a href="/types-of-stock/penny-stocks/">Penny Stocks</a></li><li><a href="/manage/watchlists/">Portfolio Monitoring</a></li><li><a href="/short-interest/">Short Interest</a></li><li><a href="/compare-stocks/">Stock Comparisons</a></li><li><a href="/stock-market-holidays/">Stock Market Holidays</a></li><li><a href="/stock-screener/">Stock Screener</a></li></ul>
<h2>Search Headlines</h2>
<p>Sign up for MarketBeat All Access to gain access to MarketBeat\'s full suite of research tools.</p>
<h2>MarketBeat All Access Features</h2>
<h3>Best-in-Class Portfolio Monitoring</h3>
<ul>
 <li>Get personalized stock ideas.</li>
 <li>Compare portfolio to indices.</li>
 <li>Check stock news, ratings, SEC filings, and more.</li>
 </ul>
<h3>Stock Ideas and Recommendations</h3>
<ul>
 <li>See daily stock ideas from top analysts.</li>
 <li>Receive short-term trading ideas from MarketBeat.</li>
 <li>Identify trending stocks on social media.</li>
 </ul>
<h3>Advanced Stock Screeners and Research Tools</h3>
<ul>
 <li>Use our seven stock screeners to find suitable stocks.</li>
 <li>Stay informed with MarketBeat\'s real-time news.</li>
 <li>Export data to Excel for personal analysis.</li>
 </ul>
<ul>
 <li>In-depth profiles and analysis for 20,000 public companies.</li>
 <li>Real-time analyst ratings, insider transactions, earnings data, and more.</li>
 <li>Our daily ratings and market update email newsletter.</li>
 </ul>
<ul role="tablist" aria-label="Log in or create account">
 <li>
 <a href="#pnlLoginOnModal" role="tab" aria-selected="true" tabindex="0" aria-controls="pnlLoginOnModal">Sign In</a>
 </li>
 <li>
 <a href="#pnlCreate" role="tab" aria-selected="false" tabindex="-1" aria-controls="pnlCreate">Create Account</a></li></ul>',
            'image_path' => null,
            'original_url' => 'https://www.marketbeat.com/instant-alerts/deutsche-bank-aktiengesellschaft-nysedb-short-interest-update-2025-10-05/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:29:56',
            'imported_at' => '2025-10-05 23:02:38',
            'meta' => '{"author": null, "source": "lulegacy", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:38',
            'updated_at' => '2025-10-05 23:02:38',
            'deleted_at' => null,
        ],
        [
            'id' => 25,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '91308aa173f63b4050d182bad07cdb1379f9cd52',
            'content_hash' => '899e5f5b3f0209b9f687a4ed9d359f20363d7f0ad32e92f171ec33050a8d0fdc',
            'title' => 'Bright Scholar Education (NYSE:BEDU) Short Interest Update',
            'slug' => 'httpswwwmarketbeatcominstant-alertsbright-scholar-education-nysebedu-short-interest-update-2025-10-05',
            'excerpt' => 'Bright Scholar Education (NYSE:BEDU - Get Free Report) was the target of a large growth in short interest during the month of September. As of September 15th, there was short interest totaling 8,100 shares, a growth of 76.1% from the August 31st total of 4,600 shares. Currently,...',
            'body' => '<h2>Key Points</h2>
<ul>
 <li>Bright Scholar Education (NYSE:BEDU) experienced a significant increase in short interest, rising by <strong>76.1%</strong> from August to September, totaling <strong>8,100 shares</strong>.</li>
 <li>The stock is currently rated as a <strong>Sell</strong> by Wall Street analysts, including a restatement of a "sell (d-)" rating by Weiss Ratings.</li>
 <li>As of last Friday, shares traded at <strong>$2.04</strong>, reflecting a 12-month range between $1.35 and $2.20, with a market capitalization of <strong>$60.53 million</strong>.</li>
<li><strong><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-KeyPoints">Five stocks to consider instead of Bright Scholar Education</a>.</strong></li></ul>
<p>Bright Scholar Education (<a href="https://www.marketbeat.com/stocks/NYSE/BEDU/">NYSE:BEDU</a> - <a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=BEDU">Get Free Report</a>) was the target of a large growth in short interest during the month of September. As of September 15th, there was short interest totaling 8,100 shares, a growth of 76.1% from the August 31st total of 4,600 shares. Currently, 0.1% of the company\'s shares are short sold. Based on an average daily trading volume, of 4,400 shares, the short-interest ratio is presently 1.8 days. Based on an average daily trading volume, of 4,400 shares, the short-interest ratio is presently 1.8 days. Currently, 0.1% of the company\'s shares are short sold. </p>
<h2>Bright Scholar Education Price Performance</h2>
<p>Shares of <a href="https://www.marketbeat.com/stocks/NYSE/BEDU/options/" target="_blank">NYSE:BEDU</a> traded down $0.16 during trading on Friday, hitting $2.04. 5,911 shares of the company were exchanged, compared to its average volume of 15,926. Bright Scholar Education has a 12-month low of $1.35 and a 12-month high of $2.20. The stock has a market capitalization of $60.53 million, a P/E ratio of -0.43 and a beta of 0.31. The firm\'s 50 day moving average price is $1.81 and its 200-day moving average price is $1.75. </p>
<h2>Wall Street Analysts Forecast Growth</h2>
<p>Separately, <a href="https://weissratings.com/">Weiss Ratings</a> restated a "sell (d-)" rating on shares of Bright Scholar Education in a report on Saturday, September 27th. One equities research analyst has rated the stock with a Sell rating, According to data from MarketBeat.com, the stock has a consensus rating of "Sell".</p>
<p><b><a href="https://www.marketbeat.com/arnreports/ReportTickerOptin.aspx?RegistrationCode=TickerHyperlink&amp;Prefix=NYSE&amp;Symbol=BEDU" rel="nofollow">Read Our Latest Stock Report on BEDU</a></b></p>
<h2>About Bright Scholar Education</h2>
<p>Bright Scholar Education Holdings Limited, an education service provider, operates and provides K-12 schools and complementary education services in China, Hong Kong, Canada, the United States, and the United Kingdom. The company operates in three segments: Overseas Schools; Complementary Education Services; and Domestic Kindergartens and K-12 Operation Services.</p>
<h2>Read More</h2>
<ul><li><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=NewsSites-SeeAlso">Five stocks we like better than Bright Scholar Education</a></li><li><a href="https://www.marketbeat.com/learn/how-to-master-trading-discipline-overcome-emotional-challenges/" target="_blank">Expert Stock Trading Psychology Tips</a></li><li><a href="https://www.marketbeat.com/stock-ideas/3-defense-stocks-surging-as-ukraine-tensions-deepen/" target="_blank">3 Defense Stocks Surging as Ukraine Tensions Deepen</a></li><li><a href="https://www.marketbeat.com/all-access/stock-screener/" target="_blank">How to Use the MarketBeat Stock Screener </a></li><li><a href="https://www.marketbeat.com/originals/starbucks-stock-slumps-this-competitor-shows-strength/" target="_blank">Starbucks Stock Slumps; This Competitor Shows Strength</a></li><li><a href="https://www.marketbeat.com/market-data/low-priced-stocks/" target="_blank">Best Stocks Under $10.00 </a></li><li><a href="https://www.marketbeat.com/originals/the-trade-desk-2-signs-of-a-comeback-1-risk-ahead/" target="_blank">The Trade Desk: 2 Signs of a Comeback, 1 Risk Ahead</a></li></ul>
<p><em>This instant news alert was generated by narrative science technology and financial data from MarketBeat in order to provide readers with the fastest and most accurate reporting. This story was reviewed by MarketBeat\'s editorial team prior to publication. Please send any questions or comments about this story to contact@marketbeat.com.</em></p>
<h2><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">Should You Invest $1,000 in Bright Scholar Education Right Now?</a></h2>
<p>Before you consider Bright Scholar Education, you\'ll want to hear this.</p>
<p>MarketBeat keeps track of Wall Street\'s top-rated and best performing research analysts and the stocks they recommend to their clients on a daily basis. MarketBeat has identified the <a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">five stocks</a> that top analysts are quietly whispering to their clients to buy now before the broader market catches on... and Bright Scholar Education wasn\'t on the list.</p>
<p>While Bright Scholar Education currently has a Sell rating among analysts, top-rated analysts believe these five stocks are better buys.</p>
<p><a href="https://www.marketbeat.com/newsletter/PDFoffer.aspx?offer=top5&amp;RegistrationCode=ArticlePage-ShouldYouInvest">View The Five Stocks Here </a></p>
<p>Enter your email address and we\'ll send you MarketBeat\'s list of ten stocks that are set to soar in Fall 2025, despite the threat of tariffs and other economic uncertainty. These ten stocks are incredibly resilient and are likely to thrive in any economic environment.</p>
<h2>
Featured Articles and Offers</h2>
<h2>Recent Videos</h2>
<h2>Stock Lists</h2>
<ul><li><a href="/types-of-stock/5g-stocks/">5G </a></li><li><a href="/types-of-stock/biotech-stocks/">Biotech </a></li><li><a href="/types-of-stock/blue-chip-stocks/">Blue Chip </a></li><li><a href="/types-of-stock/faang-stocks/">FAANG </a></li><li><a href="/types-of-stock/gold-stocks/">Gold </a></li><li><a href="/types-of-stock/large-cap-stocks/">Large Cap </a></li><li><a href="/types-of-stock/marijuana-stocks/">Marijuana </a></li><li><a href="/types-of-stock/micro-cap-stocks/">Micro Cap </a></li><li><a href="/types-of-stock/oil-stocks/">Oil </a></li><li><a href="/types-of-stock/real-estate-investment-trusts-reits/">REITs </a></li><li><a href="/types-of-stock/russell-2000-stocks/">Russell 2000 </a></li><li><a href="/types-of-stock/small-cap-stocks/">Small Cap </a></li><li><a href="/types-of-stock/warren-buffett-stocks/">Warren Buffett </a></li></ul>
<h2>Investing Tools</h2>
<ul><li><a href="/ratings/">Analyst Ratings</a></li><li><a href="/cryptocurrencies/">Cryptocurrency Screener</a></li><li><a href="/congress-stock-trades/">Congressional Trading</a></li><li><a href="/dividends/increases/">Dividend Increases</a></li><li><a href="/dividends/calculator/">Dividend Calculator</a></li><li><a href="/dividends/increases/">Dividend Calendar</a></li><li><a href="/earnings/latest/">Earnings Announcements</a></li><li><a href="/insider-trades/">Insider Trades</a></li><li><a href="/calculators/options-profit-calculator/">Options Profit Calculator</a></li><li><a href="/types-of-stock/penny-stocks/">Penny Stocks</a></li><li><a href="/manage/watchlists/">Portfolio Monitoring</a></li><li><a href="/short-interest/">Short Interest</a></li><li><a href="/compare-stocks/">Stock Comparisons</a></li><li><a href="/stock-market-holidays/">Stock Market Holidays</a></li><li><a href="/stock-screener/">Stock Screener</a></li></ul>
<h2>Search Headlines</h2>
<p>Sign up for MarketBeat All Access to gain access to MarketBeat\'s full suite of research tools.</p>
<h2>MarketBeat All Access Features</h2>
<h3>Best-in-Class Portfolio Monitoring</h3>
<ul>
 <li>Get personalized stock ideas.</li>
 <li>Compare portfolio to indices.</li>
 <li>Check stock news, ratings, SEC filings, and more.</li>
 </ul>
<h3>Stock Ideas and Recommendations</h3>
<ul>
 <li>See daily stock ideas from top analysts.</li>
 <li>Receive short-term trading ideas from MarketBeat.</li>
 <li>Identify trending stocks on social media.</li>
 </ul>
<h3>Advanced Stock Screeners and Research Tools</h3>
<ul>
 <li>Use our seven stock screeners to find suitable stocks.</li>
 <li>Stay informed with MarketBeat\'s real-time news.</li>
 <li>Export data to Excel for personal analysis.</li>
 </ul>
<ul>
 <li>In-depth profiles and analysis for 20,000 public companies.</li>
 <li>Real-time analyst ratings, insider transactions, earnings data, and more.</li>
 <li>Our daily ratings and market update email newsletter.</li>
 </ul>
<ul role="tablist" aria-label="Log in or create account">
 <li>
 <a href="#pnlLoginOnModal" role="tab" aria-selected="true" tabindex="0" aria-controls="pnlLoginOnModal">Sign In</a>
 </li>
 <li>
 <a href="#pnlCreate" role="tab" aria-selected="false" tabindex="-1" aria-controls="pnlCreate">Create Account</a></li></ul>',
            'image_path' => null,
            'original_url' => 'https://www.marketbeat.com/instant-alerts/bright-scholar-education-nysebedu-short-interest-update-2025-10-05/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:29:54',
            'imported_at' => '2025-10-05 23:02:39',
            'meta' => '{"author": null, "source": "lulegacy", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:39',
            'updated_at' => '2025-10-05 23:02:39',
            'deleted_at' => null,
        ],
        [
            'id' => 26,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '2b4fd6bdea2e18c3e2503b16c53d08b22bab27f8',
            'content_hash' => '38bbf65e5989c13459c72697b6e011119bcef57e414059555fb4e6f23e85c1c4',
            'title' => 'Mark Sanchez Released From Hospital After Stabbing',
            'slug' => 'httpswwwtmzcom20251005mark-sanchez-released-from-hospital-after-stabbing',
            'excerpt' => 'Mark Sanchez is out of the hospital, TMZ has learned ... and, he\'s now being processed through the jail. Sources with knowledge tell TMZ ... the NFL commentator was released from the hospital earlier Sunday -- a little more than 24 hours after he&hellip;',
            'body' => '<h3>Billie Eilish Dropping Mitchell &amp; Ness NBA Hat Collection with Fanatics, Complex</h3>',
            'image_path' => null,
            'original_url' => 'https://www.tmz.com/2025/10/05/mark-sanchez-released-from-hospital-after-stabbing/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:29:34',
            'imported_at' => '2025-10-05 23:02:39',
            'meta' => '{"author": "TMZ Staff", "source": "tmz", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:39',
            'updated_at' => '2025-10-05 23:02:39',
            'deleted_at' => null,
        ],
        [
            'id' => 27,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '8a1a52903b50bc30a8d86e433f4a80101a534494',
            'content_hash' => 'cbaabec01d9f22ccbe4f85ff5a37f566f7ede8a47e24a58bb7b0e389bc5beff6',
            'title' => 'Lawsuit to derail Colorado’s second Buc-ee’s dismissed',
            'slug' => 'httpswwwdenverpostcom20251005bucees-travel-center-lawsuit-el-paso-county',
            'excerpt' => 'A District Court Judge in El Paso County dismissed a lawsuit on Friday that sought to derail the development of a popular Buc-ee’s travel center in the town of Palmer Lake.',
            'body' => '<h2>The proposed El Paso County travel center has faced considerable backlash from residents and state officials</h2>
<h3>Share this:</h3>
<ul><li><a rel="nofollow noopener noreferrer" href="https://www.denverpost.com/2025/10/05/bucees-travel-center-lawsuit-el-paso-county/?share=facebook" target="_blank" aria-labelledby="sharing-facebook-7301546">
 Click to share on Facebook (Opens in new window)
 Facebook
 </a></li><li><a rel="nofollow noopener noreferrer" href="https://www.denverpost.com/2025/10/05/bucees-travel-center-lawsuit-el-paso-county/?share=reddit" target="_blank" aria-labelledby="sharing-reddit-7301546">
 Click to share on Reddit (Opens in new window)
 Reddit
 </a></li><li><a rel="nofollow noopener noreferrer" href="https://www.denverpost.com/2025/10/05/bucees-travel-center-lawsuit-el-paso-county/?share=twitter" target="_blank" aria-labelledby="sharing-twitter-7301546">
 Click to share on X (Opens in new window)
 X
 </a></li><li></ul>
<p>A District Court Judge in El Paso County dismissed a lawsuit on Friday that sought to derail the development of a popular Buc-ee’s travel center in the town of Palmer Lake. </p>
<p>A group calling itself Integrity Matters sued the town in January, contesting <a href="https://www.denverpost.com/2025/01/16/bucees-colorado-new-location-palmer-lake-lawsuit/">the process leading up to a vote</a> of the Palmer Lake Board of Trustees. The board <a href="https://www.denverpost.com/2025/06/03/bucees-palmer-lake-annexation-approved/">voted 6-1 in May</a> in favor of annexing land west of Interstate 25 and north of Monument so the popular Texas-based chain could open its second Colorado location.</p>
<p>Judge William B. Bain found the plaintiffs lacked standing to contest the annexation and had insufficient legal grounds for other complaints.</p>
<h2>Related Articles</h2>
<ul><li>
 <a href="https://www.denverpost.com/2025/09/24/lamar-bucees-palmer-lake-colorado/" title="Rural Colorado town pitches itself as a landing spot for Buc-ee’s">
 
 
 Rural Colorado town pitches itself as a landing spot for Buc-ee’s 

 </a>
 
 
</li><li>
 <a href="https://www.denverpost.com/2025/08/30/bucees-palmer-lake-recall/" title="Recall election nears amid growing opposition to Buc-ee’s in Palmer Lake">
 
 
 Recall election nears amid growing opposition to Buc-ee’s in Palmer Lake 

 </a>
 
 
</li><li>
 <a href="https://www.denverpost.com/2025/07/30/colorados-best-parcel-of-open-space-would-be-marred-by-the-buc-ees-proposed-for-palmer-lake-opinion/" title="Colorado’s best parcel of open space would be marred by the Buc-ee’s proposed for Palmer Lake (Opinion)">
 
 
 Colorado’s best parcel of open space would be marred by the Buc-ee’s proposed for Palmer Lake (Opinion) 

 </a>
 
 
</li><li>
 <a href="https://www.denverpost.com/2025/07/19/nuggets-curtis-jones-nba-summer-league-gem/" title="Grading The Week: Nuggets found NBA Summer League gem in Iowa State’s Curtis Jones">
 
 
 Grading The Week: Nuggets found NBA Summer League gem in Iowa State’s Curtis Jones 

 </a>
 
 
</li></ul>
<p>“The Court’s ruling confirms that the claims brought against the Town were without sufficient legal basis to move forward,” an <a href="https://www.townofpalmerlake.com/administration/page/press-release-10-3-2025">unsigned news release</a> from the town states. “While the order itself is concise, it firmly upholds the key arguments the Town presented and provides a solid foundation should an appeal be pursued.”</p>
<p>Representatives for Integrity Matters did not respond to a request for comment Sunday afternoon.</p>
<p>The proposal has drawn <a href="https://www.denverpost.com/2025/08/30/bucees-palmer-lake-recall/">considerable backlash</a> from locals, state officials, and both of Colorado’s U.S. senators for its potential impact on the nearby Greenland Ranch open space and its drain on water.</p>
<p>Residents of the town have since <a href="https://www.denverpost.com/2025/09/24/lamar-bucees-palmer-lake-colorado/">recalled two of the trustees</a> who voted in favor and passed a measure requiring voters to approve future annexations.</p>
<p><em><a href="https://myaccount.denverpost.com/dp/preference">Get more Colorado news by signing up for our daily Your Morning Dozen email newsletter.</a></em></p>
<h3>Share this:</h3>
<ul><li><a rel="nofollow noopener noreferrer" href="https://www.denverpost.com/2025/10/05/bucees-travel-center-lawsuit-el-paso-county/?share=facebook" target="_blank" aria-labelledby="sharing-facebook-7301546">
 Click to share on Facebook (Opens in new window)
 Facebook
 </a></li><li><a rel="nofollow noopener noreferrer" href="https://www.denverpost.com/2025/10/05/bucees-travel-center-lawsuit-el-paso-county/?share=reddit" target="_blank" aria-labelledby="sharing-reddit-7301546">
 Click to share on Reddit (Opens in new window)
 Reddit
 </a></li><li><a rel="nofollow noopener noreferrer" href="https://www.denverpost.com/2025/10/05/bucees-travel-center-lawsuit-el-paso-county/?share=twitter" target="_blank" aria-labelledby="sharing-twitter-7301546">
 Click to share on X (Opens in new window)
 X
 </a></li><li></ul>
<ul><li><a href="https://www.denverpost.com/policies-and-standards/">Policies</a></li>
<li><a href="https://www.denverpost.com/report-an-error/">Report an Error</a></li>
<li><a href="https://www.denverpost.com/contact-us/">Contact Us</a></li>
<li><a href="https://www.denverpost.com/news-tips/">Submit a News Tip</a></li>
</ul>
<h2>RevContent Feed</h2>
<h2>Most Popular</h2>
<ul><li><h3>After hail battered this Colorado neighborhood, the HOA sent homeowners $21,000 repair bills</h3><a href="https://www.denverpost.com/2025/10/04/colorado-hoa-soaring-eagles-hail/">After hail battered this Colorado neighborhood, the HOA sent homeowners $21,000 repair bills</a></li><li><h3>Family owner of The Fort to sell historic Morrison restaurant</h3><a href="https://www.denverpost.com/2025/10/03/fort-restaurant-morrison-sale-revesco/">Family owner of The Fort to sell historic Morrison restaurant</a></li><li><h3>Guanella Pass cleared after reported suspicious person turns out to be outdoorsman</h3><a href="https://www.denverpost.com/2025/10/04/guanella-pass-fall-colors-police/">Guanella Pass cleared after reported suspicious person turns out to be outdoorsman</a></li><li><h3>Two Denver suburbs take different paths as residents face housing crunch: ‘We can manage it, but just barely’</h3><a href="https://www.denverpost.com/2025/10/05/lakewood-littleton-housing-affordability-election/">Two Denver suburbs take different paths as residents face housing crunch: \'We can manage it, but just barely\'</a></li><li><h3>Colorado sets first-in-the-nation price ceiling on a prescription drug</h3><a href="https://www.denverpost.com/2025/10/03/colorado-drug-price-ceiling-enbrel/">Colorado sets first-in-the-nation price ceiling on a prescription drug</a></li><li><h3>Keeler: CSU Rams tried new play-caller. Tried new QB. Only one thing left to change: Jay Norvell</h3><a href="https://www.denverpost.com/2025/10/04/csu-rams-jay-norvell-san-diego-state/">Keeler: CSU Rams tried new play-caller. Tried new QB. Only one thing left to change: Jay Norvell</a></li><li><h3>Colorado food recalls: Listeria-tainted pasta, corn dogs with wood, radioactive shrimp</h3><a href="https://www.denverpost.com/2025/10/04/listeria-pasta-recall-radioactive-shrimp-colorado/">Colorado food recalls: Listeria-tainted pasta, corn dogs with wood, radioactive shrimp</a></li><li><h3>Keeler: CU Buffs’ loss at TCU showed Deion Sanders has more problems than QB Kaidon Salter</h3><a href="https://www.denverpost.com/2025/10/04/kaidon-salter-cu-buffs-tcu-football-score/">Keeler: CU Buffs\' loss at TCU showed Deion Sanders has more problems than QB Kaidon Salter</a></li><li><h3>Oil executive lists Tuscan-style Cherry Hills Village mansion for sale at $10M</h3><a href="https://www.denverpost.com/2025/10/03/oil-executive-mansion-sale-cherry-hills/">Oil executive lists Tuscan-style Cherry Hills Village mansion for sale at $10M</a></li><li><h3>With ‘no juggernaut’ in the field, Colorado Republicans — 19 and counting — line up for governor’s race</h3><a href="https://www.denverpost.com/2025/10/04/colorado-governor-race-republican-field-debate/">With \'no juggernaut\' in the field, Colorado Republicans -- 19 and counting -- line up for governor\'s race</a></li></ul>
<h3>After hail battered this Colorado neighborhood, the HOA sent homeowners $21,000 repair bills</h3>
<h3>Family owner of The Fort to sell historic Morrison restaurant</h3>
<h3>Guanella Pass cleared after reported suspicious person turns out to be outdoorsman</h3>
<h3>Two Denver suburbs take different paths as residents face housing crunch: ‘We can manage it, but just barely’</h3>
<h3>Colorado sets first-in-the-nation price ceiling on a prescription drug</h3>
<h3>Keeler: CSU Rams tried new play-caller. Tried new QB. Only one thing left to change: Jay Norvell</h3>
<h3>Colorado food recalls: Listeria-tainted pasta, corn dogs with wood, radioactive shrimp</h3>
<h3>Keeler: CU Buffs’ loss at TCU showed Deion Sanders has more problems than QB Kaidon Salter</h3>
<h3>Oil executive lists Tuscan-style Cherry Hills Village mansion for sale at $10M</h3>
<h3>With ‘no juggernaut’ in the field, Colorado Republicans — 19 and counting — line up for governor’s race</h3>',
            'image_path' => 'https://www.denverpost.com/wp-content/uploads/2024/04/TDP-Z-Biz-Buc-ees_c4424b.jpg?w=1400px&strip=all',
            'original_url' => 'https://www.denverpost.com/2025/10/05/bucees-travel-center-lawsuit-el-paso-county/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:29:11',
            'imported_at' => '2025-10-05 23:02:40',
            'meta' => '{"author": "Nick Coltrain", "source": "The Denver Post", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:40',
            'updated_at' => '2025-10-05 23:02:40',
            'deleted_at' => null,
        ],
        [
            'id' => 28,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '6f544cb554aff3cb296cc3b988e3e2b321fe773f',
            'content_hash' => 'c5dda9e744ea9614eac7a645087761979f6ec12a8c075872edff6234de24f147',
            'title' => 'Josh pays $7.50 for this life-changing drug. Soon it could cost $45K',
            'slug' => 'httpswwwbrisbanetimescomaunationalqueenslandjosh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moerhtmlrefrssutm-mediumrssutm-sourcerss-feed',
            'excerpt' => 'Ipswich father-of-two Josh High was just 27 when a seizure led to the discovery of brain cancer. Now he’s facing another fight to ensure it doesn’t return.',
            'body' => '<ul><li><a title="National" href="/national">National</a></li><li><a title="Queensland" href="/national/queensland">Queensland</a></li><li><a title="Brain cancer" href="/topic/brain-cancer-jqx">Brain cancer</a></li></ul>
<h3>Save articles for later</h3>
<p>Add articles to your saved list and come back to them any time.</p>
<p>Josh High doesn’t remember much about the day doctors discovered he had brain cancer.</p>
<p>The 28-year-old landscaper from Ipswich went to work in the morning but came home early feeling unwell. When he woke a few hours later, he started seizing.</p>
<p>“My fiancee called the ambulance, and they took me to hospital … I was out of it for about three days,” High says.</p>
<p>Father-of-two Josh High was only 27-years-old when he learned he had brain cancer.Credit: Courtney Kruk</p>
<p>A CT scan confirmed a prognosis neither was expecting: the young father-of-two had oligodendroglioma, a rare type of brain cancer.</p>
<p>“The doctors said it had potentially been developing for a decade,” he says.</p>
<p>The seizure happened in March. High had brain surgery at the Princess Alexandra Hospital to remove as much of the tumour as possible a few weeks later.</p>
<p>“It was just too risky [to remove it all], they would have had to dig too far into my brain,” he explains.</p>
<p>“That could have caused memory issues and physical [problems].”</p>
<p>While in recovery, High was approached to join a clinical trial for Voranigo (vorasidenib), a drug proven to halt the growth of tumours in people with grade 2 IDH-mutant astrocytoma or oligodendroglioma, delaying the need for radiation or chemotherapy.</p>
<p>“The oncologist said, ‘you need to make the decision now, this afternoon, before they cut [new participants for the trial] off’,” he says.</p>
<p>“We thought well, it’s better than chemotherapy and radiation by the sounds of it. So we went for it.”</p>
<p>High says he is responding well to Voranigo and hasn’t experienced any negative side-effects, which can include liver problems.</p>
<p>“I have a blood test every few weeks to check liver function and make sure everything’s good. So far [the tests] have been perfect.”</p>
<p>But there’s a real possibility this life-changing drug will soon be inaccessible.</p>
<p>Servier Laboratories, the company that manufacturers Voranigo, submitted the drug to the Pharmaceutical Benefits Scheme earlier this year.</p>
<p>In findings published last month, PBAC, the committee responsible for determining drug inclusions, did not recommend Voranigo be included in the scheme.</p>
<p>Despite noting it is one of the few “effective treatments available for patients not in immediate need of chemotherapy/radiotherapy”, PBAC said there was limited clinical evidence to justify the benefits of the proposed price, and suggested current estimates “were overly optimistic”. </p>
<p>A spokesperson for the Department of Health, Disability and Ageing said further details about why Voranigo was not recommended for the PBS would be published at a later date and noted time spent agreeing on “a price that is cost-effective for the taxpayer” can impact evaluation timeframes.</p>
<p>High after his brain surgery in April. </p>
<p>“There are opportunities for companies to make resubmissions to the PBAC,” they said.</p>
<p>“The PBAC advised that it would accept a resubmission from Servier through an expedited assessment pathway.”</p>
<p>A spokesperson for Servier said they were disappointed Voranigo did not receive a positive recommendation but said they were committed to working with PBAC to ensure access to the drug.</p>
<p>“The development of vorasidenib has involved a commitment of over 10 years of research and clinical development to bring the therapy to the cancer community.</p>
<p>“We are in the process of preparing a resubmission which we hope will address the areas raised.”</p>
<p>A month’s supply of Voranigo costs High $7.50.</p>
<p>If the drug hasn’t been approved for the PBS when the trial ends in two years, it will jump to $45,000.</p>
<p>Cure Brain Cancer Foundation chief executive Andrew Giles describes Voranigo as one of the first drugs in 25 years to show a positive impact on people with brain cancer, and says he will continue lobbying for its inclusion on the PBS.</p>
<p>“The survival rates for brain cancer haven’t moved for 40 years – they were 23 per cent 40 years ago, they’re the same now because there’s no treatment options.</p>
<p>“That’s why we’re so excited to have this new [drug] … it’s the first good news in a long time.”</p>
<p>He agrees the PBAC decision was disappointing, but says it’s rare for any medication to get onto the PBS the first time, partly because there is always a “haggle on price”, which tends to be dramatically high.</p>
<p>“Over the past five years, [Servier] would have spent upwards of a billion dollars trying to get the drug to [market],” Giles says.</p>
<p>“And after two years the patent runs out, so other companies will be able to develop the same drug as a generic [and sell for cheap].</p>
<p>“So they need to recoup their cost once it gets to market, which is why it is so incredibly expensive.”</p>
<p>Voranigo has been a silver lining for High.</p>
<p>High before being diagnosed with brain cancer. </p>
<p>A once fit and capable landscaper, he now battles constant fatigue, headaches, memory lapses and mood swings. He’s anxious about returning to work, his family and the inevitable end of his trial.</p>
<p>“If we weren’t on this trial, we wouldn’t be able to access this medication at all,” High says.</p>
<p>“It’s scary for both of us because we don’t know what’s going to happen.</p>
<p>“But I know there are others in even tougher positions who haven’t had access to vorasidenib at all.</p>
<p>“I want to be a voice for them to and to remind anyone living with this that they’re not alone.”</p>
<p><b><i>Start the day with a summary of the day’s most important and interesting stories, analysis and insights. </i></b><b><i><a href="https://login.myfairfax.com.au/signup_newsletter/10126?channel_key=7SMsQ6jjgIqPyo9XFzdzWg&amp;callback_uri=https%3A%2F%2Fwww.brisbanetimes.com.au" rel="noopener" target="_blank">Sign up for our Morning Edition newsletter</a></i></b><b><i>.</i></b></p>
<ul><li><a href="/topic/brain-cancer-jqx">Brain cancer</a></li><li><a href="/topic/cancer-5vm">Cancer</a></li><li><a href="/healthcare">Healthcare</a></li><li><a href="/topic/illness-5yi">Illness</a></li><li><a href="/topic/health-hq3">Health</a></li></ul>
<h2>Most Viewed in National</h2>
<h3>From our partners</h3>',
            'image_path' => 'https://static.ffx.io/images/$zoom_0.214%2C$multiply_0.7554%2C$ratio_1.777778%2C$width_1059%2C$x_38%2C$y_0/t_crop_custom/q_86%2Cf_auto/f8429a4ea81af656ef3c98c99bb426a7dff9fe981949cc4f471e22c374d2bf6e',
            'original_url' => 'https://www.brisbanetimes.com.au/national/queensland/josh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moer.html?ref=rss&utm_medium=rss&utm_source=rss_feed',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:52',
            'imported_at' => '2025-10-05 23:02:40',
            'meta' => '{"author": "Courtney Kruk", "source": "Brisbane Times", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:40',
            'updated_at' => '2025-10-05 23:02:40',
            'deleted_at' => null,
        ],
        [
            'id' => 29,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '43c142a8a32def077cefdd0f4013ec1b32cf1fe7',
            'content_hash' => 'f26534403b9057efc543d03511f4ef6487438cc61dc22ac3eae48c45b0bf3f13',
            'title' => 'Josh pays $7.50 for this life-changing drug. Soon it could cost $45K',
            'slug' => 'httpswwwsmhcomaunationalqueenslandjosh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moerhtmlrefrssutm-mediumrssutm-sourcerss-feed',
            'excerpt' => 'Ipswich father-of-two Josh High was just 27 when a seizure led to the discovery of brain cancer. Now he’s facing another fight to ensure it doesn’t return.',
            'body' => '<ul><li><a title="National" href="/national">National</a></li><li><a title="Queensland" href="/national/queensland">Queensland</a></li><li><a title="Brain cancer" href="/topic/brain-cancer-jqx">Brain cancer</a></li></ul>
<h3>Save articles for later</h3>
<p>Add articles to your saved list and come back to them any time.</p>
<p>Josh High doesn’t remember much about the day doctors discovered he had brain cancer.</p>
<p>The 28-year-old landscaper from Ipswich went to work in the morning but came home early feeling unwell. When he woke a few hours later, he started seizing.</p>
<p>“My fiancee called the ambulance, and they took me to hospital … I was out of it for about three days,” High says.</p>
<p>Father-of-two Josh High was only 27-years-old when he learned he had brain cancer.Credit: Courtney Kruk</p>
<p>A CT scan confirmed a prognosis neither was expecting: the young father-of-two had oligodendroglioma, a rare type of brain cancer.</p>
<p>“The doctors said it had potentially been developing for a decade,” he says.</p>
<p>The seizure happened in March. High had brain surgery at the Princess Alexandra Hospital to remove as much of the tumour as possible a few weeks later.</p>
<p>“It was just too risky [to remove it all], they would have had to dig too far into my brain,” he explains.</p>
<p>“That could have caused memory issues and physical [problems].”</p>
<p>While in recovery, High was approached to join a clinical trial for Voranigo (vorasidenib), a drug proven to halt the growth of tumours in people with grade 2 IDH-mutant astrocytoma or oligodendroglioma, delaying the need for radiation or chemotherapy.</p>
<p>“The oncologist said, ‘you need to make the decision now, this afternoon, before they cut [new participants for the trial] off’,” he says.</p>
<p>“We thought well, it’s better than chemotherapy and radiation by the sounds of it. So we went for it.”</p>
<p>High says he is responding well to Voranigo and hasn’t experienced any negative side-effects, which can include liver problems.</p>
<p>“I have a blood test every few weeks to check liver function and make sure everything’s good. So far [the tests] have been perfect.”</p>
<p>But there’s a real possibility this life-changing drug will soon be inaccessible.</p>
<p>Servier Laboratories, the company that manufacturers Voranigo, submitted the drug to the Pharmaceutical Benefits Scheme earlier this year.</p>
<p>In findings published last month, PBAC, the committee responsible for determining drug inclusions, did not recommend Voranigo be included in the scheme.</p>
<p>Despite noting it is one of the few “effective treatments available for patients not in immediate need of chemotherapy/radiotherapy”, PBAC said there was limited clinical evidence to justify the benefits of the proposed price, and suggested current estimates “were overly optimistic”. </p>
<p>A spokesperson for the Department of Health, Disability and Ageing said further details about why Voranigo was not recommended for the PBS would be published at a later date and noted time spent agreeing on “a price that is cost-effective for the taxpayer” can impact evaluation timeframes.</p>
<p>High after his brain surgery in April. </p>
<p>“There are opportunities for companies to make resubmissions to the PBAC,” they said.</p>
<p>“The PBAC advised that it would accept a resubmission from Servier through an expedited assessment pathway.”</p>
<p>A spokesperson for Servier said they were disappointed Voranigo did not receive a positive recommendation but said they were committed to working with PBAC to ensure access to the drug.</p>
<p>“The development of vorasidenib has involved a commitment of over 10 years of research and clinical development to bring the therapy to the cancer community.</p>
<p>“We are in the process of preparing a resubmission which we hope will address the areas raised.”</p>
<p>A month’s supply of Voranigo costs High $7.50.</p>
<p>If the drug hasn’t been approved for the PBS when the trial ends in two years, it will jump to $45,000.</p>
<p>Cure Brain Cancer Foundation chief executive Andrew Giles describes Voranigo as one of the first drugs in 25 years to show a positive impact on people with brain cancer, and says he will continue lobbying for its inclusion on the PBS.</p>
<p>“The survival rates for brain cancer haven’t moved for 40 years – they were 23 per cent 40 years ago, they’re the same now because there’s no treatment options.</p>
<p>“That’s why we’re so excited to have this new [drug] … it’s the first good news in a long time.”</p>
<p>He agrees the PBAC decision was disappointing, but says it’s rare for any medication to get onto the PBS the first time, partly because there is always a “haggle on price”, which tends to be dramatically high.</p>
<p>“Over the past five years, [Servier] would have spent upwards of a billion dollars trying to get the drug to [market],” Giles says.</p>
<p>“And after two years the patent runs out, so other companies will be able to develop the same drug as a generic [and sell for cheap].</p>
<p>“So they need to recoup their cost once it gets to market, which is why it is so incredibly expensive.”</p>
<p>Voranigo has been a silver lining for High.</p>
<p>High before being diagnosed with brain cancer. </p>
<p>A once fit and capable landscaper, he now battles constant fatigue, headaches, memory lapses and mood swings. He’s anxious about returning to work, his family and the inevitable end of his trial.</p>
<p>“If we weren’t on this trial, we wouldn’t be able to access this medication at all,” High says.</p>
<p>“It’s scary for both of us because we don’t know what’s going to happen.</p>
<p>“But I know there are others in even tougher positions who haven’t had access to vorasidenib at all.</p>
<p>“I want to be a voice for them to and to remind anyone living with this that they’re not alone.”</p>
<p><b><i>Start the day with a summary of the day’s most important and interesting stories, analysis and insights. </i></b><b><i><a href="https://login.myfairfax.com.au/signup_newsletter/10126?channel_key=7SMsQ6jjgIqPyo9XFzdzWg&amp;callback_uri=https%3A%2F%2Fwww.brisbanetimes.com.au" rel="noopener" target="_blank">Sign up for our Morning Edition newsletter</a></i></b><b><i>.</i></b></p>
<ul><li><a href="/topic/brain-cancer-jqx">Brain cancer</a></li><li><a href="/topic/cancer-5vm">Cancer</a></li><li><a href="/healthcare">Healthcare</a></li><li><a href="/topic/illness-5yi">Illness</a></li><li><a href="/topic/health-hq3">Health</a></li></ul>
<h2>Most Viewed in National</h2>
<h3>From our partners</h3>',
            'image_path' => 'https://static.ffx.io/images/$zoom_0.214%2C$multiply_0.7554%2C$ratio_1.777778%2C$width_1059%2C$x_38%2C$y_0/t_crop_custom/q_86%2Cf_auto/f8429a4ea81af656ef3c98c99bb426a7dff9fe981949cc4f471e22c374d2bf6e',
            'original_url' => 'https://www.smh.com.au/national/queensland/josh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moer.html?ref=rss&utm_medium=rss&utm_source=rss_feed',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:52',
            'imported_at' => '2025-10-05 23:02:41',
            'meta' => '{"author": "Courtney Kruk", "source": "The Sydney Morning Herald", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:41',
            'updated_at' => '2025-10-05 23:02:41',
            'deleted_at' => null,
        ],
        [
            'id' => 30,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '6482129e03eaa2e07d2998110fe358607c7f6036',
            'content_hash' => '73e0657d42b3cc56eb5fa24e4e2ebbd4a2fd9c68e7734d51a909c6591437baeb',
            'title' => 'Josh pays $7.50 for this life-changing drug. Soon it could cost $45K',
            'slug' => 'httpswwwtheagecomaunationalqueenslandjosh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moerhtmlrefrssutm-mediumrssutm-sourcerss-feed',
            'excerpt' => 'Ipswich father-of-two Josh High was just 27 when a seizure led to the discovery of brain cancer. Now he’s facing another fight to ensure it doesn’t return.',
            'body' => '<ul><li><a title="National" href="/national">National</a></li><li><a title="Queensland" href="/national/queensland">Queensland</a></li><li><a title="Brain cancer" href="/topic/brain-cancer-jqx">Brain cancer</a></li></ul>
<h3>Save articles for later</h3>
<p>Add articles to your saved list and come back to them any time.</p>
<p>Josh High doesn’t remember much about the day doctors discovered he had brain cancer.</p>
<p>The 28-year-old landscaper from Ipswich went to work in the morning but came home early feeling unwell. When he woke a few hours later, he started seizing.</p>
<p>“My fiancee called the ambulance, and they took me to hospital … I was out of it for about three days,” High says.</p>
<p>Father-of-two Josh High was only 27-years-old when he learned he had brain cancer.Credit: Courtney Kruk</p>
<p>A CT scan confirmed a prognosis neither was expecting: the young father-of-two had oligodendroglioma, a rare type of brain cancer.</p>
<p>“The doctors said it had potentially been developing for a decade,” he says.</p>
<p>The seizure happened in March. High had brain surgery at the Princess Alexandra Hospital to remove as much of the tumour as possible a few weeks later.</p>
<p>“It was just too risky [to remove it all], they would have had to dig too far into my brain,” he explains.</p>
<p>“That could have caused memory issues and physical [problems].”</p>
<p>While in recovery, High was approached to join a clinical trial for Voranigo (vorasidenib), a drug proven to halt the growth of tumours in people with grade 2 IDH-mutant astrocytoma or oligodendroglioma, delaying the need for radiation or chemotherapy.</p>
<p>“The oncologist said, ‘you need to make the decision now, this afternoon, before they cut [new participants for the trial] off’,” he says.</p>
<p>“We thought well, it’s better than chemotherapy and radiation by the sounds of it. So we went for it.”</p>
<p>High says he is responding well to Voranigo and hasn’t experienced any negative side-effects, which can include liver problems.</p>
<p>“I have a blood test every few weeks to check liver function and make sure everything’s good. So far [the tests] have been perfect.”</p>
<p>But there’s a real possibility this life-changing drug will soon be inaccessible.</p>
<p>Servier Laboratories, the company that manufacturers Voranigo, submitted the drug to the Pharmaceutical Benefits Scheme earlier this year.</p>
<p>In findings published last month, PBAC, the committee responsible for determining drug inclusions, did not recommend Voranigo be included in the scheme.</p>
<p>Despite noting it is one of the few “effective treatments available for patients not in immediate need of chemotherapy/radiotherapy”, PBAC said there was limited clinical evidence to justify the benefits of the proposed price, and suggested current estimates “were overly optimistic”. </p>
<p>A spokesperson for the Department of Health, Disability and Ageing said further details about why Voranigo was not recommended for the PBS would be published at a later date and noted time spent agreeing on “a price that is cost-effective for the taxpayer” can impact evaluation timeframes.</p>
<p>High after his brain surgery in April. </p>
<p>“There are opportunities for companies to make resubmissions to the PBAC,” they said.</p>
<p>“The PBAC advised that it would accept a resubmission from Servier through an expedited assessment pathway.”</p>
<p>A spokesperson for Servier said they were disappointed Voranigo did not receive a positive recommendation but said they were committed to working with PBAC to ensure access to the drug.</p>
<p>“The development of vorasidenib has involved a commitment of over 10 years of research and clinical development to bring the therapy to the cancer community.</p>
<p>“We are in the process of preparing a resubmission which we hope will address the areas raised.”</p>
<p>A month’s supply of Voranigo costs High $7.50.</p>
<p>If the drug hasn’t been approved for the PBS when the trial ends in two years, it will jump to $45,000.</p>
<p>Cure Brain Cancer Foundation chief executive Andrew Giles describes Voranigo as one of the first drugs in 25 years to show a positive impact on people with brain cancer, and says he will continue lobbying for its inclusion on the PBS.</p>
<p>“The survival rates for brain cancer haven’t moved for 40 years – they were 23 per cent 40 years ago, they’re the same now because there’s no treatment options.</p>
<p>“That’s why we’re so excited to have this new [drug] … it’s the first good news in a long time.”</p>
<p>He agrees the PBAC decision was disappointing, but says it’s rare for any medication to get onto the PBS the first time, partly because there is always a “haggle on price”, which tends to be dramatically high.</p>
<p>“Over the past five years, [Servier] would have spent upwards of a billion dollars trying to get the drug to [market],” Giles says.</p>
<p>“And after two years the patent runs out, so other companies will be able to develop the same drug as a generic [and sell for cheap].</p>
<p>“So they need to recoup their cost once it gets to market, which is why it is so incredibly expensive.”</p>
<p>Voranigo has been a silver lining for High.</p>
<p>High before being diagnosed with brain cancer. </p>
<p>A once fit and capable landscaper, he now battles constant fatigue, headaches, memory lapses and mood swings. He’s anxious about returning to work, his family and the inevitable end of his trial.</p>
<p>“If we weren’t on this trial, we wouldn’t be able to access this medication at all,” High says.</p>
<p>“It’s scary for both of us because we don’t know what’s going to happen.</p>
<p>“But I know there are others in even tougher positions who haven’t had access to vorasidenib at all.</p>
<p>“I want to be a voice for them to and to remind anyone living with this that they’re not alone.”</p>
<p><b><i>Start the day with a summary of the day’s most important and interesting stories, analysis and insights. </i></b><b><i><a href="https://login.myfairfax.com.au/signup_newsletter/10126?channel_key=7SMsQ6jjgIqPyo9XFzdzWg&amp;callback_uri=https%3A%2F%2Fwww.brisbanetimes.com.au" rel="noopener" target="_blank">Sign up for our Morning Edition newsletter</a></i></b><b><i>.</i></b></p>
<ul><li><a href="/topic/brain-cancer-jqx">Brain cancer</a></li><li><a href="/topic/cancer-5vm">Cancer</a></li><li><a href="/healthcare">Healthcare</a></li><li><a href="/topic/illness-5yi">Illness</a></li><li><a href="/topic/health-hq3">Health</a></li></ul>
<h2>Most Viewed in National</h2>
<h3>From our partners</h3>',
            'image_path' => 'https://static.ffx.io/images/$zoom_0.214%2C$multiply_0.7554%2C$ratio_1.777778%2C$width_1059%2C$x_38%2C$y_0/t_crop_custom/q_86%2Cf_auto/f8429a4ea81af656ef3c98c99bb426a7dff9fe981949cc4f471e22c374d2bf6e',
            'original_url' => 'https://www.theage.com.au/national/queensland/josh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moer.html?ref=rss&utm_medium=rss&utm_source=rss_feed',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:52',
            'imported_at' => '2025-10-05 23:02:42',
            'meta' => '{"author": "Courtney Kruk", "source": "The Age", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:42',
            'updated_at' => '2025-10-05 23:02:42',
            'deleted_at' => null,
        ],
        [
            'id' => 31,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'a9f109310b797d40fdbef201c7dfe0b7e18a5d9e',
            'content_hash' => '494fb499b760342a4d85dba84e6ab0c150f04390618ebc80dac11cdd14a3c8e9',
            'title' => 'Josh pays $7.50 for this life-changing drug. Soon it could cost $45K',
            'slug' => 'httpswwwtheagecomaunationalqueenslandjosh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moerhtmlrefrssutm-mediumrssutm-sourcerss-national',
            'excerpt' => 'Ipswich father-of-two Josh High was just 27 when a seizure led to the discovery of brain cancer. Now he’s facing another fight to ensure it doesn’t return.',
            'body' => '<ul><li><a title="National" href="/national">National</a></li><li><a title="Queensland" href="/national/queensland">Queensland</a></li><li><a title="Brain cancer" href="/topic/brain-cancer-jqx">Brain cancer</a></li></ul>
<h3>Save articles for later</h3>
<p>Add articles to your saved list and come back to them any time.</p>
<p>Josh High doesn’t remember much about the day doctors discovered he had brain cancer.</p>
<p>The 28-year-old landscaper from Ipswich went to work in the morning but came home early feeling unwell. When he woke a few hours later, he started seizing.</p>
<p>“My fiancee called the ambulance, and they took me to hospital … I was out of it for about three days,” High says.</p>
<p>Father-of-two Josh High was only 27-years-old when he learned he had brain cancer.Credit: Courtney Kruk</p>
<p>A CT scan confirmed a prognosis neither was expecting: the young father-of-two had oligodendroglioma, a rare type of brain cancer.</p>
<p>“The doctors said it had potentially been developing for a decade,” he says.</p>
<p>The seizure happened in March. High had brain surgery at the Princess Alexandra Hospital to remove as much of the tumour as possible a few weeks later.</p>
<p>“It was just too risky [to remove it all], they would have had to dig too far into my brain,” he explains.</p>
<p>“That could have caused memory issues and physical [problems].”</p>
<p>While in recovery, High was approached to join a clinical trial for Voranigo (vorasidenib), a drug proven to halt the growth of tumours in people with grade 2 IDH-mutant astrocytoma or oligodendroglioma, delaying the need for radiation or chemotherapy.</p>
<p>“The oncologist said, ‘you need to make the decision now, this afternoon, before they cut [new participants for the trial] off’,” he says.</p>
<p>“We thought well, it’s better than chemotherapy and radiation by the sounds of it. So we went for it.”</p>
<p>High says he is responding well to Voranigo and hasn’t experienced any negative side-effects, which can include liver problems.</p>
<p>“I have a blood test every few weeks to check liver function and make sure everything’s good. So far [the tests] have been perfect.”</p>
<p>But there’s a real possibility this life-changing drug will soon be inaccessible.</p>
<p>Servier Laboratories, the company that manufacturers Voranigo, submitted the drug to the Pharmaceutical Benefits Scheme earlier this year.</p>
<p>In findings published last month, PBAC, the committee responsible for determining drug inclusions, did not recommend Voranigo be included in the scheme.</p>
<p>Despite noting it is one of the few “effective treatments available for patients not in immediate need of chemotherapy/radiotherapy”, PBAC said there was limited clinical evidence to justify the benefits of the proposed price, and suggested current estimates “were overly optimistic”. </p>
<p>A spokesperson for the Department of Health, Disability and Ageing said further details about why Voranigo was not recommended for the PBS would be published at a later date and noted time spent agreeing on “a price that is cost-effective for the taxpayer” can impact evaluation timeframes.</p>
<p>High after his brain surgery in April. </p>
<p>“There are opportunities for companies to make resubmissions to the PBAC,” they said.</p>
<p>“The PBAC advised that it would accept a resubmission from Servier through an expedited assessment pathway.”</p>
<p>A spokesperson for Servier said they were disappointed Voranigo did not receive a positive recommendation but said they were committed to working with PBAC to ensure access to the drug.</p>
<p>“The development of vorasidenib has involved a commitment of over 10 years of research and clinical development to bring the therapy to the cancer community.</p>
<p>“We are in the process of preparing a resubmission which we hope will address the areas raised.”</p>
<p>A month’s supply of Voranigo costs High $7.50.</p>
<p>If the drug hasn’t been approved for the PBS when the trial ends in two years, it will jump to $45,000.</p>
<p>Cure Brain Cancer Foundation chief executive Andrew Giles describes Voranigo as one of the first drugs in 25 years to show a positive impact on people with brain cancer, and says he will continue lobbying for its inclusion on the PBS.</p>
<p>“The survival rates for brain cancer haven’t moved for 40 years – they were 23 per cent 40 years ago, they’re the same now because there’s no treatment options.</p>
<p>“That’s why we’re so excited to have this new [drug] … it’s the first good news in a long time.”</p>
<p>He agrees the PBAC decision was disappointing, but says it’s rare for any medication to get onto the PBS the first time, partly because there is always a “haggle on price”, which tends to be dramatically high.</p>
<p>“Over the past five years, [Servier] would have spent upwards of a billion dollars trying to get the drug to [market],” Giles says.</p>
<p>“And after two years the patent runs out, so other companies will be able to develop the same drug as a generic [and sell for cheap].</p>
<p>“So they need to recoup their cost once it gets to market, which is why it is so incredibly expensive.”</p>
<p>Voranigo has been a silver lining for High.</p>
<p>High before being diagnosed with brain cancer. </p>
<p>A once fit and capable landscaper, he now battles constant fatigue, headaches, memory lapses and mood swings. He’s anxious about returning to work, his family and the inevitable end of his trial.</p>
<p>“If we weren’t on this trial, we wouldn’t be able to access this medication at all,” High says.</p>
<p>“It’s scary for both of us because we don’t know what’s going to happen.</p>
<p>“But I know there are others in even tougher positions who haven’t had access to vorasidenib at all.</p>
<p>“I want to be a voice for them to and to remind anyone living with this that they’re not alone.”</p>
<p><b><i>Start the day with a summary of the day’s most important and interesting stories, analysis and insights. </i></b><b><i><a href="https://login.myfairfax.com.au/signup_newsletter/10126?channel_key=7SMsQ6jjgIqPyo9XFzdzWg&amp;callback_uri=https%3A%2F%2Fwww.brisbanetimes.com.au" rel="noopener" target="_blank">Sign up for our Morning Edition newsletter</a></i></b><b><i>.</i></b></p>
<ul><li><a href="/topic/brain-cancer-jqx">Brain cancer</a></li><li><a href="/topic/cancer-5vm">Cancer</a></li><li><a href="/healthcare">Healthcare</a></li><li><a href="/topic/illness-5yi">Illness</a></li><li><a href="/topic/health-hq3">Health</a></li></ul>
<h2>Most Viewed in National</h2>
<h3>From our partners</h3>',
            'image_path' => 'https://static.ffx.io/images/$zoom_0.214%2C$multiply_0.7554%2C$ratio_1.777778%2C$width_1059%2C$x_38%2C$y_0/t_crop_custom/q_86%2Cf_auto/f8429a4ea81af656ef3c98c99bb426a7dff9fe981949cc4f471e22c374d2bf6e',
            'original_url' => 'https://www.theage.com.au/national/queensland/josh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moer.html?ref=rss&utm_medium=rss&utm_source=rss_national',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:52',
            'imported_at' => '2025-10-05 23:02:42',
            'meta' => '{"author": "Courtney Kruk", "source": "The Age", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:42',
            'updated_at' => '2025-10-05 23:02:42',
            'deleted_at' => null,
        ],
        [
            'id' => 32,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '37028ca4e704609d01065e3eec2d0d8bb9971607',
            'content_hash' => 'df30fda46965fafcc6634503dec3ae0f5506b56886e54c592d3a3f09328dd100',
            'title' => 'Josh pays $7.50 for this life-changing drug. Soon it could cost $45K',
            'slug' => 'httpswwwsmhcomaunationalqueenslandjosh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moerhtmlrefrssutm-mediumrssutm-sourcerss-national',
            'excerpt' => 'Ipswich father-of-two Josh High was just 27 when a seizure led to the discovery of brain cancer. Now he’s facing another fight to ensure it doesn’t return.',
            'body' => '<ul><li><a title="National" href="/national">National</a></li><li><a title="Queensland" href="/national/queensland">Queensland</a></li><li><a title="Brain cancer" href="/topic/brain-cancer-jqx">Brain cancer</a></li></ul>
<h3>Save articles for later</h3>
<p>Add articles to your saved list and come back to them any time.</p>
<p>Josh High doesn’t remember much about the day doctors discovered he had brain cancer.</p>
<p>The 28-year-old landscaper from Ipswich went to work in the morning but came home early feeling unwell. When he woke a few hours later, he started seizing.</p>
<p>“My fiancee called the ambulance, and they took me to hospital … I was out of it for about three days,” High says.</p>
<p>Father-of-two Josh High was only 27-years-old when he learned he had brain cancer.Credit: Courtney Kruk</p>
<p>A CT scan confirmed a prognosis neither was expecting: the young father-of-two had oligodendroglioma, a rare type of brain cancer.</p>
<p>“The doctors said it had potentially been developing for a decade,” he says.</p>
<p>The seizure happened in March. High had brain surgery at the Princess Alexandra Hospital to remove as much of the tumour as possible a few weeks later.</p>
<p>“It was just too risky [to remove it all], they would have had to dig too far into my brain,” he explains.</p>
<p>“That could have caused memory issues and physical [problems].”</p>
<p>While in recovery, High was approached to join a clinical trial for Voranigo (vorasidenib), a drug proven to halt the growth of tumours in people with grade 2 IDH-mutant astrocytoma or oligodendroglioma, delaying the need for radiation or chemotherapy.</p>
<p>“The oncologist said, ‘you need to make the decision now, this afternoon, before they cut [new participants for the trial] off’,” he says.</p>
<p>“We thought well, it’s better than chemotherapy and radiation by the sounds of it. So we went for it.”</p>
<p>High says he is responding well to Voranigo and hasn’t experienced any negative side-effects, which can include liver problems.</p>
<p>“I have a blood test every few weeks to check liver function and make sure everything’s good. So far [the tests] have been perfect.”</p>
<p>But there’s a real possibility this life-changing drug will soon be inaccessible.</p>
<p>Servier Laboratories, the company that manufacturers Voranigo, submitted the drug to the Pharmaceutical Benefits Scheme earlier this year.</p>
<p>In findings published last month, PBAC, the committee responsible for determining drug inclusions, did not recommend Voranigo be included in the scheme.</p>
<p>Despite noting it is one of the few “effective treatments available for patients not in immediate need of chemotherapy/radiotherapy”, PBAC said there was limited clinical evidence to justify the benefits of the proposed price, and suggested current estimates “were overly optimistic”. </p>
<p>A spokesperson for the Department of Health, Disability and Ageing said further details about why Voranigo was not recommended for the PBS would be published at a later date and noted time spent agreeing on “a price that is cost-effective for the taxpayer” can impact evaluation timeframes.</p>
<p>High after his brain surgery in April. </p>
<p>“There are opportunities for companies to make resubmissions to the PBAC,” they said.</p>
<p>“The PBAC advised that it would accept a resubmission from Servier through an expedited assessment pathway.”</p>
<p>A spokesperson for Servier said they were disappointed Voranigo did not receive a positive recommendation but said they were committed to working with PBAC to ensure access to the drug.</p>
<p>“The development of vorasidenib has involved a commitment of over 10 years of research and clinical development to bring the therapy to the cancer community.</p>
<p>“We are in the process of preparing a resubmission which we hope will address the areas raised.”</p>
<p>A month’s supply of Voranigo costs High $7.50.</p>
<p>If the drug hasn’t been approved for the PBS when the trial ends in two years, it will jump to $45,000.</p>
<p>Cure Brain Cancer Foundation chief executive Andrew Giles describes Voranigo as one of the first drugs in 25 years to show a positive impact on people with brain cancer, and says he will continue lobbying for its inclusion on the PBS.</p>
<p>“The survival rates for brain cancer haven’t moved for 40 years – they were 23 per cent 40 years ago, they’re the same now because there’s no treatment options.</p>
<p>“That’s why we’re so excited to have this new [drug] … it’s the first good news in a long time.”</p>
<p>He agrees the PBAC decision was disappointing, but says it’s rare for any medication to get onto the PBS the first time, partly because there is always a “haggle on price”, which tends to be dramatically high.</p>
<p>“Over the past five years, [Servier] would have spent upwards of a billion dollars trying to get the drug to [market],” Giles says.</p>
<p>“And after two years the patent runs out, so other companies will be able to develop the same drug as a generic [and sell for cheap].</p>
<p>“So they need to recoup their cost once it gets to market, which is why it is so incredibly expensive.”</p>
<p>Voranigo has been a silver lining for High.</p>
<p>High before being diagnosed with brain cancer. </p>
<p>A once fit and capable landscaper, he now battles constant fatigue, headaches, memory lapses and mood swings. He’s anxious about returning to work, his family and the inevitable end of his trial.</p>
<p>“If we weren’t on this trial, we wouldn’t be able to access this medication at all,” High says.</p>
<p>“It’s scary for both of us because we don’t know what’s going to happen.</p>
<p>“But I know there are others in even tougher positions who haven’t had access to vorasidenib at all.</p>
<p>“I want to be a voice for them to and to remind anyone living with this that they’re not alone.”</p>
<p><b><i>Start the day with a summary of the day’s most important and interesting stories, analysis and insights. </i></b><b><i><a href="https://login.myfairfax.com.au/signup_newsletter/10126?channel_key=7SMsQ6jjgIqPyo9XFzdzWg&amp;callback_uri=https%3A%2F%2Fwww.brisbanetimes.com.au" rel="noopener" target="_blank">Sign up for our Morning Edition newsletter</a></i></b><b><i>.</i></b></p>
<ul><li><a href="/topic/brain-cancer-jqx">Brain cancer</a></li><li><a href="/topic/cancer-5vm">Cancer</a></li><li><a href="/healthcare">Healthcare</a></li><li><a href="/topic/illness-5yi">Illness</a></li><li><a href="/topic/health-hq3">Health</a></li></ul>
<h2>Most Viewed in National</h2>
<h3>From our partners</h3>',
            'image_path' => 'https://static.ffx.io/images/$zoom_0.214%2C$multiply_0.7554%2C$ratio_1.777778%2C$width_1059%2C$x_38%2C$y_0/t_crop_custom/q_86%2Cf_auto/f8429a4ea81af656ef3c98c99bb426a7dff9fe981949cc4f471e22c374d2bf6e',
            'original_url' => 'https://www.smh.com.au/national/queensland/josh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moer.html?ref=rss&utm_medium=rss&utm_source=rss_national',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:52',
            'imported_at' => '2025-10-05 23:02:42',
            'meta' => '{"author": "Courtney Kruk", "source": "The Sydney Morning Herald", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:42',
            'updated_at' => '2025-10-05 23:02:42',
            'deleted_at' => null,
        ],
        [
            'id' => 33,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '6dbcac66aae24c96c879a53abc9446f5a038377c',
            'content_hash' => '71e83c62d58095b74da3f1faac55454cd8132e33066209de657342b3064bf488',
            'title' => 'Josh pays $7.50 for this life-changing drug. Soon it could cost $45K',
            'slug' => 'httpswwwwatodaycomaunationalqueenslandjosh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moerhtmlrefrssutm-mediumrssutm-sourcerss-national',
            'excerpt' => 'Ipswich father-of-two Josh High was just 27 when a seizure led to the discovery of brain cancer. Now he’s facing another fight to ensure it doesn’t return.',
            'body' => '<ul><li><a title="National" href="/national">National</a></li><li><a title="Queensland" href="/national/queensland">Queensland</a></li><li><a title="Brain cancer" href="/topic/brain-cancer-jqx">Brain cancer</a></li></ul>
<h3>Save articles for later</h3>
<p>Add articles to your saved list and come back to them any time.</p>
<p>Josh High doesn’t remember much about the day doctors discovered he had brain cancer.</p>
<p>The 28-year-old landscaper from Ipswich went to work in the morning but came home early feeling unwell. When he woke a few hours later, he started seizing.</p>
<p>“My fiancee called the ambulance, and they took me to hospital … I was out of it for about three days,” High says.</p>
<p>Father-of-two Josh High was only 27-years-old when he learned he had brain cancer.Credit: Courtney Kruk</p>
<p>A CT scan confirmed a prognosis neither was expecting: the young father-of-two had oligodendroglioma, a rare type of brain cancer.</p>
<p>“The doctors said it had potentially been developing for a decade,” he says.</p>
<p>The seizure happened in March. High had brain surgery at the Princess Alexandra Hospital to remove as much of the tumour as possible a few weeks later.</p>
<p>“It was just too risky [to remove it all], they would have had to dig too far into my brain,” he explains.</p>
<p>“That could have caused memory issues and physical [problems].”</p>
<p>While in recovery, High was approached to join a clinical trial for Voranigo (vorasidenib), a drug proven to halt the growth of tumours in people with grade 2 IDH-mutant astrocytoma or oligodendroglioma, delaying the need for radiation or chemotherapy.</p>
<p>“The oncologist said, ‘you need to make the decision now, this afternoon, before they cut [new participants for the trial] off’,” he says.</p>
<p>“We thought well, it’s better than chemotherapy and radiation by the sounds of it. So we went for it.”</p>
<p>High says he is responding well to Voranigo and hasn’t experienced any negative side-effects, which can include liver problems.</p>
<p>“I have a blood test every few weeks to check liver function and make sure everything’s good. So far [the tests] have been perfect.”</p>
<p>But there’s a real possibility this life-changing drug will soon be inaccessible.</p>
<p>Servier Laboratories, the company that manufacturers Voranigo, submitted the drug to the Pharmaceutical Benefits Scheme earlier this year.</p>
<p>In findings published last month, PBAC, the committee responsible for determining drug inclusions, did not recommend Voranigo be included in the scheme.</p>
<p>Despite noting it is one of the few “effective treatments available for patients not in immediate need of chemotherapy/radiotherapy”, PBAC said there was limited clinical evidence to justify the benefits of the proposed price, and suggested current estimates “were overly optimistic”. </p>
<p>A spokesperson for the Department of Health, Disability and Ageing said further details about why Voranigo was not recommended for the PBS would be published at a later date and noted time spent agreeing on “a price that is cost-effective for the taxpayer” can impact evaluation timeframes.</p>
<p>High after his brain surgery in April. </p>
<p>“There are opportunities for companies to make resubmissions to the PBAC,” they said.</p>
<p>“The PBAC advised that it would accept a resubmission from Servier through an expedited assessment pathway.”</p>
<p>A spokesperson for Servier said they were disappointed Voranigo did not receive a positive recommendation but said they were committed to working with PBAC to ensure access to the drug.</p>
<p>“The development of vorasidenib has involved a commitment of over 10 years of research and clinical development to bring the therapy to the cancer community.</p>
<p>“We are in the process of preparing a resubmission which we hope will address the areas raised.”</p>
<p>A month’s supply of Voranigo costs High $7.50.</p>
<p>If the drug hasn’t been approved for the PBS when the trial ends in two years, it will jump to $45,000.</p>
<p>Cure Brain Cancer Foundation chief executive Andrew Giles describes Voranigo as one of the first drugs in 25 years to show a positive impact on people with brain cancer, and says he will continue lobbying for its inclusion on the PBS.</p>
<p>“The survival rates for brain cancer haven’t moved for 40 years – they were 23 per cent 40 years ago, they’re the same now because there’s no treatment options.</p>
<p>“That’s why we’re so excited to have this new [drug] … it’s the first good news in a long time.”</p>
<p>He agrees the PBAC decision was disappointing, but says it’s rare for any medication to get onto the PBS the first time, partly because there is always a “haggle on price”, which tends to be dramatically high.</p>
<p>“Over the past five years, [Servier] would have spent upwards of a billion dollars trying to get the drug to [market],” Giles says.</p>
<p>“And after two years the patent runs out, so other companies will be able to develop the same drug as a generic [and sell for cheap].</p>
<p>“So they need to recoup their cost once it gets to market, which is why it is so incredibly expensive.”</p>
<p>Voranigo has been a silver lining for High.</p>
<p>High before being diagnosed with brain cancer. </p>
<p>A once fit and capable landscaper, he now battles constant fatigue, headaches, memory lapses and mood swings. He’s anxious about returning to work, his family and the inevitable end of his trial.</p>
<p>“If we weren’t on this trial, we wouldn’t be able to access this medication at all,” High says.</p>
<p>“It’s scary for both of us because we don’t know what’s going to happen.</p>
<p>“But I know there are others in even tougher positions who haven’t had access to vorasidenib at all.</p>
<p>“I want to be a voice for them to and to remind anyone living with this that they’re not alone.”</p>
<p><b><i>Start the day with a summary of the day’s most important and interesting stories, analysis and insights. </i></b><b><i><a href="https://login.myfairfax.com.au/signup_newsletter/10126?channel_key=7SMsQ6jjgIqPyo9XFzdzWg&amp;callback_uri=https%3A%2F%2Fwww.brisbanetimes.com.au" rel="noopener" target="_blank">Sign up for our Morning Edition newsletter</a></i></b><b><i>.</i></b></p>
<ul><li><a href="/topic/brain-cancer-jqx">Brain cancer</a></li><li><a href="/topic/cancer-5vm">Cancer</a></li><li><a href="/healthcare">Healthcare</a></li><li><a href="/topic/illness-5yi">Illness</a></li><li><a href="/topic/health-hq3">Health</a></li></ul>
<h2>Most Viewed in National</h2>
<h3>From our partners</h3>',
            'image_path' => 'https://static.ffx.io/images/$zoom_0.214%2C$multiply_0.7554%2C$ratio_1.777778%2C$width_1059%2C$x_38%2C$y_0/t_crop_custom/q_86%2Cf_auto/f8429a4ea81af656ef3c98c99bb426a7dff9fe981949cc4f471e22c374d2bf6e',
            'original_url' => 'https://www.watoday.com.au/national/queensland/josh-pays-7-50-for-this-life-changing-drug-soon-it-could-cost-45k-20250820-p5moer.html?ref=rss&utm_medium=rss&utm_source=rss_national',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:52',
            'imported_at' => '2025-10-05 23:02:43',
            'meta' => '{"author": "Courtney Kruk", "source": "watoday", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:43',
            'updated_at' => '2025-10-05 23:02:43',
            'deleted_at' => null,
        ],
        [
            'id' => 34,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '979ab3b053badfe98603f665f96b8f51424e0651',
            'content_hash' => '33718a9406c3cb11fa140e3d1e1fe725cb46a1091e3fb7a9300f28e2f6747c29',
            'title' => 'Yankees can\'t blame Aaron Boone for their shortcomings, which makes ALDS more depressing',
            'slug' => 'httpsfansidedcommlbyankees-can-t-blame-aaron-boone-for-their-shortcomings-which-makes-alds-more-depressingutm-sourcerss',
            'excerpt' => 'There isn\'t just one thing to blame for New York\'s nightmare start to the ALDS. That makes it even worse.',
            'body' => '<p q:key="0" q:id="ax">It turns out that this time wasn\'t really so different after all. </p>
<p q:key="0" q:id="b0">The <a href="https://fansided.com/mlb/new-york-yankees/">New York Yankees</a>\' come-from-behind triumph over the <a href="https://fansided.com/mlb/boston-red-sox/">Boston Red Sox</a> in last week\'s AL Wild Card series engendered plenty of hope that this team had finally gotten over the hump, that the issues that had plagued it in postseasons past — a reckless approach at the plate, a complete inability to hit situationally, a downright maddening abandonment of even the most basic fundamentals — had been left behind. And then New York traveled to Toronto, where the Blue Jays promptly nuked them from orbit across the first two games of the ALDS.</p>
<blockquote><p lang="fr" dir="ltr">VLADIMIR GUERRERO JR.<br><br>A SIGNATURE MOMENT IN BLUE JAYS HISTORY 🔥<br><br>🎥 <a href="https://twitter.com/MLB?ref_src=twsrc%5Etfw">@MLB</a> <a href="https://t.co/5u7yO31OPv">pic.twitter.com/5u7yO31OPv</a></p>— The Athletic (@TheAthletic) <a href="https://twitter.com/TheAthletic/status/1974949382597525761?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p lang="fr" dir="ltr">VLADIMIR GUERRERO JR.<br><br>A SIGNATURE MOMENT IN BLUE JAYS HISTORY 🔥<br><br>🎥 <a href="https://twitter.com/MLB?ref_src=twsrc%5Etfw">@MLB</a> <a href="https://t.co/5u7yO31OPv">pic.twitter.com/5u7yO31OPv</a></p>
<p q:key="0" q:id="b6">One day after letting a winnable game unravel into a 10-1 loss, the Yankees somehow managed to one-up themselves. Rookie Toronto righty struck out 11 batters while taking a no-hitter into the sixth, while New York\'s erstwhile ace, Max Fried, got rocked for seven runs in three-plus innings of work. It was as complete and total a destruction as you\'ll ever see in October, much less between teams that each won the same number of games in the regular season. </p>
<p q:key="0" q:id="b9">Of course, the series is not officially over just yet. The scene will shift to New York for Game 3 on Tuesday, where the Yankees will have the chance to dig itself out of this hole. But come on: Spiritually, New York has packed its bags for Cancun already. And so the question becomes: Just what the heck happened over the last couple of days, and how can Brian Cashman and Co. — if you think Hal Steinbrenner is ever getting rid of Cashman, we have a bridge to sell you — prevent it from happening again?</p>
<p q:key="0" q:id="bc">The problem is that we\'re now going on almost a decade of this organization coming up painfully small in the biggest moments, and with each passing year, that question becomes more and more difficult to answer. This wasn\'t about a dropped fly ball, or a failure to cover first base, or a roster hole that needs to be filled, or a manager who didn\'t know how to deploy his bullpen. This was a failure on every level and in every way; what was Aaron Boone supposed to do here exactly, remind his team to actually show up to the park? </p>
<p q:key="0" q:id="bf">This faceplant can\'t be pinned on Boone, or any of the easy scapegoats that Yankees fans have had to fixate on in years past. And that might be the toughest thing of all about this most recent debacle: It feels like the only way to fix it is to become a different organization entirely.</p>
<p q:key="0" q:id="bi"><em><strong>For more news and rumors, check out MLB Insider Robert Murray’s work on </strong></em><a href="https://www.youtube.com/@TheBaseballInsiders/featured"><em><strong>The Baseball Insiders podcast</strong></em></a><em><strong>, subscribe to </strong></em><a href="https://fansided.us5.list-manage.com/subscribe?u=b9bb472d0aa5e8abf01e2ced7&amp;id=fa28ec1e24"><em><strong>The Moonshot,</strong></em></a><em><strong> our weekly MLB newsletter, and join the discord to get the inside scoop during the MLB season.</strong></em></p>
<h2 q:key="0" q:id="bl">There are no easy answers for the Yankees after latest October meltdown</h2>
<p q:key="0" q:id="bo">Seriously, what other conclusion are Yankees fans supposed to come to? How else can you explain arguably the greatest right-handed hitter in baseball history — from March through September, at least — becoming a completely unrecognizable player once the postseason begins? What are we supposed to do with the fact that a team that consistently ranks among the best offenses in baseball has slashed .211./297/.371 in the playoffs dating back to 2021? The Yankees spend the entire regular season doing certain things at an elite level; then October rolls around, and they immediately become terrible at all of them. </p>
<p q:key="0" q:id="br">Maybe there is in fact a logical explanation for this that I\'m simply not smart enough to wrap my head around. But from here, it sure seems like whatever is wrong with the Yankees lives in the walls at this point. It seemed like last year\'s ALCS breakthrough may have finally exorcised the demons, only for the World Series to end in disaster — and the player who actually delivered the crucial swing to get them there, Juan Soto, opting to head across town in free agency. In hindsight, it feels foolish to have thought that anything might be different moving forward. </p>
<p q:key="0" q:id="bu">I would probably fire Boone at this point, if only because <em>something</em> has to change. Again, this is the postseason collapse he\'s probably least responsible for over his eight years at the helm in New York, but sometimes a situation simply demands a scapegoat, and he\'s the nearest one to hand. Beyond that, though, this will be an offseason of existential crisis and no easy answers. </p>
<p q:key="0" q:id="bx">Sure, back up the Brinks truck for Kyle Tucker, in hopes that finding Judge a new running mate will take some pressure off of him in October. Then again, Tucker himself has a track record of playoff struggles, and it\'s not like Soto unlocked a new level in him last season. No matter what, the Yankees will once again be on paper among the most talented teams in the sport in 2026, especially with Gerrit Cole returning at some point next summer. None of it\'s going to matter, though, and none of it will pacify a fan base that has run out of patience and belief. </p>',
            'image_path' => 'https://images2.minutemediacdn.com/image/upload/c_crop,w_5884,h_3309,x_0,y_0/c_fill,w_2880,ar_16:9,f_auto,q_auto,g_auto/images/GettyImages/mmsport/229/01k6v61a4zpw0775cht8.jpg',
            'original_url' => 'https://fansided.com/mlb/yankees-can-t-blame-aaron-boone-for-their-shortcomings-which-makes-alds-more-depressing?utm_source=RSS',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:32',
            'imported_at' => '2025-10-05 23:02:45',
            'meta' => '{"author": "Chris Landers", "source": "Fansided", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:45',
            'updated_at' => '2025-10-05 23:02:45',
            'deleted_at' => null,
        ],
        [
            'id' => 35,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '88c175af3fa6c0580eedc1ebdcd2a4e64e4c2873',
            'content_hash' => '2d73ab6729daab8371624bc57e9d9c4b8677c2774d4bc5c63aa815ae97a54827',
            'title' => 'Jets takeaways, report card from NFL Week 5 loss to Cowboys',
            'slug' => 'httpsnypostcom20251005sportsjets-takeaways-report-card-from-nfl-week-5-loss-to-cowboys',
            'excerpt' => 'The Jets were blown out by the Cowboys, 37-22, at home.',
            'body' => '<p>The Jets were blown out by the Cowboys, <a href="https://nypost.com/2025/10/05/sports/jets-steamrolled-by-cowboys-in-blowout-loss-to-fall-to-0-5/">37-22,</a> at home. Here are some takeaways:</p>
<p><strong>1.</strong> It would be dumb to put a coach on the hot seat after five games, but it is OK to have some concern about Aaron Glenn and this coaching staff. The Jets looked like they completely folded in the second quarter after Breece Hall’s fumble. They allowed the Cowboys to score 16 points in 42 seconds and suddenly a 10-3 deficit became 23-3 in the blink of an eye. </p>
<h2>
 
 
 
 
 Take flight with the Jets 
 </h2>
<p>
 <strong>Text with Brian Costello</strong> all season as he brings Sports+ subscribers the latest Jets intel from on the field and off. </p>
<p>I don’t think anyone was delusional about this season, but the Jets look awful and the expectation was they would be better coached and better prepared than last year. So far, that has not been the case. </p>
<p><strong>2. </strong>This is the second time in three weeks when one of the major storylines for the opponent has been offensive line injuries. The Cowboys were missing four starters on Sunday after the Buccaneers were missing three starters two weeks ago. Even with that favorable matchup, the Jets are getting no pass rush. They had one sack on Sunday and that was not even a real one. They got credited for a sack when Dak Prescott slid short of the line of scrimmage late in the game. They sacked Baker Mayfield once two weeks ago. </p>
<ul aria-labelledby="filed-under">
 <li>
 <a href="https://nypost.com/tag/aaron-glenn/" rel="tag">
 aaron glenn </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/dallas-cowboys/" rel="tag">
 dallas cowboys </a>
 </li>
 <li>
 <a href="https://nypost.com/new-york-jets/" rel="tag">
 new york jets </a>
 </li>
 
 <li>
 <a href="https://nypost.com/2025/10/05/">10/5/25</a> </li>
 </ul>
<h3>
 Unlock full access to Post sports columnists and newsletters
 </h3>
<ul>
 <li>
 
 <a href="https://nypost.com/2025/10/05/sports/arch-manning-bill-belichick-have-been-college-footballs-biggest-flops/">
 Zach Braziller </a>
 
 <a href="https://nypost.com/2025/10/05/sports/arch-manning-bill-belichick-have-been-college-footballs-biggest-flops/" tabindex="-1">
 </a>
 
 
 
 
 <a href="https://nypost.com/2025/10/05/sports/arch-manning-bill-belichick-have-been-college-footballs-biggest-flops/">
 Arch Manning and Bill Belichick have been college football\'s biggest flops </a>
 
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/05/sports/abu-dhabi-offered-early-glimpse-of-knicks-mike-brown-evolution/">
 Stefan Bondy </a>
 
 <a href="https://nypost.com/2025/10/05/sports/abu-dhabi-offered-early-glimpse-of-knicks-mike-brown-evolution/" tabindex="-1">
 </a>
 
 
 
 
 <a href="https://nypost.com/2025/10/05/sports/abu-dhabi-offered-early-glimpse-of-knicks-mike-brown-evolution/">
 The Knicks\' Mike Brown evolution and more Abu Dhabi takeaways </a>
 
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/04/sports/max-fried-is-yankee-for-this-exact-alds-moment-vs-blue-jays/">
 Mike Vaccaro </a>
 
 <a href="https://nypost.com/2025/10/04/sports/max-fried-is-yankee-for-this-exact-alds-moment-vs-blue-jays/" tabindex="-1">
 </a>
 
 
 
 
 <a href="https://nypost.com/2025/10/04/sports/max-fried-is-yankee-for-this-exact-alds-moment-vs-blue-jays/">
 Max Fried is a Yankee for this exact moment </a>
 
 
 </li>
 </ul>
<ul>
 <li>
 
 <a href="https://vividseats.com/performer/214?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=214&amp;wsUser=1006" target="_blank" rel="nofollow noopener">Dallas Cowboys</a>
 at
 <a href="https://vividseats.com/performer/601?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=601&amp;wsUser=1006" target="_blank" rel="nofollow noopener">New York Jets</a> 

 
 Oct 05 2025 |
 <a aria-label="Get tickets for Dallas Cowboys at New York Jets" href="https://vividseats.com//new-york-jets-tickets-metlife-stadium-3-9-2026--sports-nfl-football/production/5471072?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=5471072&amp;wsUser=1006" target="_blank" rel="nofollow noopener">
 Get Tickets </a>
 
</li>
 <li>
 
 <a href="https://vividseats.com/performer/54659?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=54659&amp;wsUser=1006" target="_blank" rel="nofollow noopener">NFL International Series</a>
 at
 <a href="https://vividseats.com/performer/601?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=601&amp;wsUser=1006" target="_blank" rel="nofollow noopener">New York Jets</a> 

 
 Oct 12 2025 |
 <a aria-label="Get tickets for NFL International Series - Denver Broncos at New York Jets" href="https://vividseats.com//new-york-jets-tickets-tottenham-hotspur-stadium-11-2-2026--sports-nfl-football/production/5731134?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=5731134&amp;wsUser=1006" target="_blank" rel="nofollow noopener">
 Get Tickets </a>
 
</li>
 <li>
 
 <a href="https://vividseats.com/performer/144?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=144&amp;wsUser=1006" target="_blank" rel="nofollow noopener">Carolina Panthers</a>
 at
 <a href="https://vividseats.com/performer/601?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=601&amp;wsUser=1006" target="_blank" rel="nofollow noopener">New York Jets</a> 

 
 Oct 19 2025 |
 <a aria-label="Get tickets for Carolina Panthers at New York Jets" href="https://vividseats.com//new-york-jets-tickets-metlife-stadium-3-8-2026--sports-nfl-football/production/5471071?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=5471071&amp;wsUser=1006" target="_blank" rel="nofollow noopener">
 Get Tickets </a>
 
</li>
 <li>
 
 <a href="https://vividseats.com/performer/601?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=601&amp;wsUser=1006" target="_blank" rel="nofollow noopener">New York Jets</a>
 at
 <a href="https://vividseats.com/performer/172?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=172&amp;wsUser=1006" target="_blank" rel="nofollow noopener">Cincinnati Bengals</a> 

 
 Oct 26 2025 |
 <a aria-label="Get tickets for New York Jets at Cincinnati Bengals" href="https://vividseats.com//cincinnati-bengals-tickets-paycor-stadium-3-7-2026--sports-nfl-football/production/5471097?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=5471097&amp;wsUser=1006" target="_blank" rel="nofollow noopener">
 Get Tickets </a>
 
</li>
 <li>
 
 <a href="https://vividseats.com/performer/181?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=181&amp;wsUser=1006" target="_blank" rel="nofollow noopener">Cleveland Browns</a>
 at
 <a href="https://vividseats.com/performer/601?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=601&amp;wsUser=1006" target="_blank" rel="nofollow noopener">New York Jets</a> 

 
 Nov 09 2025 |
 <a aria-label="Get tickets for Cleveland Browns at New York Jets" href="https://vividseats.com//new-york-jets-tickets-metlife-stadium-3-4-2026--sports-nfl-football/production/5471067?utm_source=nypost.com&amp;utm_medium=referral&amp;utm_campaign=widget&amp;utm_term=5471067&amp;wsUser=1006" target="_blank" rel="nofollow noopener">
 Get Tickets </a>
 
</li>
 </ul>
<p><a href="https://nypost.com/podcasts/"></a></p>
<ul>
<li>
<a href="https://nypost.com/podcasts/up-in-the-blue-seats/">Up in the Blue Seats - Rangers</a>
Listen on <a rel="nofollow" href="https://podcasts.apple.com/us/podcast/up-in-the-blue-seats-a-ny-rangers-hockey-podcast/id1488953625" aria-label="Up in the Blue Seats - Rangers on Apple Podcasts">Apple Podcasts </a><a href="https://open.spotify.com/show/03504GVx5Aa7xqH7Hu5zb9?si=c26472910d1d4e15" aria-label="Up in the Blue Seats - Rangers on Spotify">Spotify</a>
</li>
<li>
<a href="https://nypost.com/podcasts/the-show/" rel="noopener" target="_blank">The Show with Joel Sherman and Jon Heyman </a>
Listen on <a rel="nofollow noopener" href="https://podcasts.apple.com/us/podcast/the-show-a-ny-post-baseball-podcast-with-joel/id1623601003" target="_blank">Apple Podcasts</a> <a rel="nofollow noopener" href="https://open.spotify.com/show/2LRI64fBETlvJQMJ8NTd0y" target="_blank">Spotify</a>
</li>
<li>
<a href="https://nypost.com/podcasts/blue-rush/">Blue Rush: NY Giants Football Podcast</a>
Listen on <a rel="nofollow" href="https://podcasts.apple.com/us/podcast/blue-rush/id1484131113" aria-label="Blue Rush: NY Giants Football Podcast on Apple Podcasts">Apple Podcasts</a> <a rel="nofollow" href="https://open.spotify.com/show/7uhghUOZTdPg0cywRBERaS" aria-label="Blue Rush: NY Giants Football Podcast on Spotify">Spotify</a>
</li>
<li>
<a href="https://nypost.com/podcasts/gangs-all-here/">Gang’s All Here: A NY Jets Football Podcast</a>
Listen on <a rel="nofollow" href="https://podcasts.apple.com/us/podcast/gangs-all-here/id1484134393" aria-label="Gang’s All Here: A NY Jets Football Podcast on Apple Podcasts">Apple Podcasts</a> <a rel="nofollow" href="https://open.spotify.com/show/7jDCCrLbSMuwNlOxCiEPcv" aria-label="Gang’s All Here: A NY Jets Football Podcast on Spotify">Spotify</a>
</li>
<li>
<a href="https://nypost.com/podcasts/ny-got-game/">NY Got Game: Basketball</a>
Listen on <a rel="nofollow" href="https://podcasts.apple.com/us/podcast/new-york-got-game-a-ny-basketball-podcast-from-new/id1484555736" aria-label="NY Got Game: Basketball on Apple Podcasts">Apple Podcasts </a><a href="https://open.spotify.com/show/0M5frhaBtSyp7CTAuYJzXY" aria-label="NY Got Game: Basketball Podcast on Spotify">Spotify</a>
</li>
<li>
<a href="https://nypost.com/podcasts/pinstripe-post/" rel="noopener" target="_blank">Pinstripe Post - Yankees</a>
Listen on <a rel="nofollow noopener" href="https://podcasts.apple.com/us/podcast/pinstripe-post-with-joel-sherman-yankees-podcast/id1501456485" target="_blank">Apple Podcasts</a> <a rel="nofollow noopener" href="https://open.spotify.com/show/7jLpHrJaETybtQsZblxqIv" target="_blank">Spotify</a>
</li>
<li>
<a href="https://nypost.com/podcasts/against-the-cage/">Against the Cage - Combat Sports</a>
Listen on <a rel="nofollow" href="https://podcasts.apple.com/au/podcast/against-the-cage-a-new-york-post-sports-podcast/id1780722245" aria-label="Against the Cage - Combat Sports Podcast on Apple Podcasts">Apple Podcasts</a> <a rel="nofollow" href="https://open.spotify.com/show/5TGU9Q53RrWyMjmBjgl6gF?si=4WOaPlbYSOehh6UjaE_nMQ&amp;nd=1&amp;dlsi=30399f93f9674055" aria-label="Against the Cage - Combat Sports Podcast on Spotify">Spotify</a>
</li>
<li>
<a href="https://nypost.com/podcasts/straight-outta-flushing/">Straight Outta Flushing - Mets</a>
Listen on <a rel="nofollow" href="https://podcasts.apple.com/us/podcast/straight-outta-flushing-mets-podcast/id1500933736?at=1001l3bo9&amp;ct=93051X1547088Xae9959384180228c1ca4ae8ab811b4e4" aria-label="Straight Outta Flushing - Mets Podcast on Apple Podcasts">Apple Podcasts</a> <a rel="nofollow" href="https://open.spotify.com/show/3XmKlynqLVkWY4IC6iUslX" aria-label="Straight Outta Flushing - Mets Podcast on Spotify">Spotify</a></li></ul>',
            'image_path' => 'https://nypost.com/wp-content%2Fuploads%2Fsites%2F2%2F2025%2F10%2F06s.JetsReportCard_web.jpg?quality%3D90%26strip%3Dall',
            'original_url' => 'https://nypost.com/2025/10/05/sports/jets-takeaways-report-card-from-nfl-week-5-loss-to-cowboys/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:28:26',
            'imported_at' => '2025-10-05 23:02:46',
            'meta' => '{"author": "Brian Costello", "source": "Post", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:46',
            'updated_at' => '2025-10-05 23:02:46',
            'deleted_at' => null,
        ],
        [
            'id' => 36,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'e75225903df36023b22b769ed8627fef78d0743a',
            'content_hash' => 'd04a175a828854c9b2eb1eccae36feaf22c8e46bf7e5cb187707e8d362c31dfc',
            'title' => 'Barcelona thrashed 4-1 by Sevilla',
            'slug' => 'httpsnationnewscom20251005barcelona-thrashed-4-1-by-sevillautm-sourcerssutm-mediumrssutm-campaignbarcelona-thrashed-4-1-by-sevilla',
            'excerpt' => 'Barcelona missed the chance to return to the top of La Liga after being thrashed by Sevilla. Needing victory to reclaim the leadership from Real Madrid, the defending champions suffered their worst loss against Sevilla since a 4-0 defeat in 1951. Robert Lewandowski missed a secon...',
            'body' => '<p>Date:</p>
<p>Share post:</p>
<ul></ul>
<p></p>
<p>Barcelona missed the chance to return to the top of La Liga after being thrashed by Sevilla.</p>
<p>Needing victory to reclaim the leadership from Real Madrid, the defending champions suffered their worst loss against Sevilla since a 4-0 defeat in 1951.</p>
<p>Robert Lewandowski missed a second-half penalty for Barcelona after Marcus Rashford had scored a left-footed volley in first-half stoppage time to give them hope of turning around a two-goal deficit.</p>
<p>Hansi Flick’s side were second best for long periods and deservedly fell to their first league defeat of the campaign against a side who had not beaten them in the Spanish top flight for just over a decade.</p>
<p>Former Barcelona winger Alexis Sanchez opened the scoring from the penalty spot after visiting captain Ronald Araujo had bundled Isaac Romero over by the byeline.</p>
<p>Romero himself swept in the second goal from an incisive counter-attack before Rashford replied from Pedri’s back-post cross.</p>
<p>However, a well-drilled home defence largely kept Barca at bay until Lewandowski put his spot-kick wide after former Manchester United winger Adnan Januzaj had fouled Alejandro Balde.</p>
<p>And when Jose Angel Carmona and Akor Adams scored in the closing minutes it compounded a miserable afternoon for Barcelona, who came into the contest after a midweek Champions League defeat by holders Paris St-Germain.</p>
<p>Barca remain two points adrift of Real Madrid, while Sevilla are fifth but could be overtaken by Atletico Madrid if they beat Celta Vigo in Sunday’s late game. </p>
<ul><li>Tags</li><li><a href="https://nationnews.com/tag/football/">football</a></li><li><a href="https://nationnews.com/tag/la-liga/">La Liga</a></li><li><a href="https://nationnews.com/tag/sports/">Sports</a></li></ul>
<h3>LEAVE A REPLY <a rel="nofollow" href="/2025/10/05/barcelona-thrashed-4-1-by-sevilla/#respond">Cancel reply</a></h3>
<p> Save my name, email, and website in this browser for the next time I comment.</p>
<h3><a href="https://nationnews.com/2025/10/05/tudor-solidarity-allowance-still-being-paid/" rel="bookmark" title="Tudor: Solidarity Allowance still being paid">Tudor: Solidarity Allowance still being paid</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/flash-flood-warning-and-thunderstorm-watch-issued-for-barbados/" rel="bookmark" title="Flash-Flood Warning and Thunderstorm Watch issued for Barbados">Flash-Flood Warning and Thunderstorm Watch issued for Barbados</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/fbi-agent-suspended-over-refusal-to-perp-walk-former-director/" rel="bookmark" title="FBI agent suspended over refusal to ‘perp walk’ former director">FBI agent suspended over refusal to ‘perp walk’ former director</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/sir-clive-lloyd-pays-tribute-to-west-indies-world-cup-hero-bernard-julien/" rel="bookmark" title="Sir Clive Lloyd pays tribute to West Indies World Cup hero Bernard Julien">Sir Clive Lloyd pays tribute to West Indies World Cup hero Bernard Julien</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/thorne-mottley-oversteps-authority/" rel="bookmark" title="Thorne: Mottley oversteps authority">Thorne: Mottley oversteps authority</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/concerns-over-full-free-movement/" rel="bookmark" title="Concerns over full free movement">Concerns over full free movement</a></h3>
<h3>Related articles</h3>
<h3><a href="https://nationnews.com/2025/10/05/tudor-solidarity-allowance-still-being-paid/" rel="bookmark" title="Tudor: Solidarity Allowance still being paid">Tudor: Solidarity Allowance still being paid</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/flash-flood-warning-and-thunderstorm-watch-issued-for-barbados/" rel="bookmark" title="Flash-Flood Warning and Thunderstorm Watch issued for Barbados">Flash-Flood Warning and Thunderstorm Watch issued for Barbados</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/fbi-agent-suspended-over-refusal-to-perp-walk-former-director/" rel="bookmark" title="FBI agent suspended over refusal to ‘perp walk’ former director">FBI agent suspended over refusal to ‘perp walk’ former director</a></h3>
<h3><a href="https://nationnews.com/2025/10/05/sir-clive-lloyd-pays-tribute-to-west-indies-world-cup-hero-bernard-julien/" rel="bookmark" title="Sir Clive Lloyd pays tribute to West Indies World Cup hero Bernard Julien">Sir Clive Lloyd pays tribute to West Indies World Cup hero Bernard Julien</a></h3>',
            'image_path' => null,
            'original_url' => 'https://nationnews.com/2025/10/05/barcelona-thrashed-4-1-by-sevilla/?utm_source=rss&utm_medium=rss&utm_campaign=barcelona-thrashed-4-1-by-sevilla',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:27:40',
            'imported_at' => '2025-10-05 23:02:49',
            'meta' => '{"author": "Nationnews Desk", "source": "Nation News", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:49',
            'updated_at' => '2025-10-05 23:02:49',
            'deleted_at' => null,
        ],
        [
            'id' => 37,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'b7c8e10d770fcad48f90d346ebfe11701e2004e7',
            'content_hash' => 'fe0915813f6503c011859a92c4eb61af72bc2dbfbfc2b43edf41edef9b1f19a4',
            'title' => 'Sir Ridley Scott declares ‘most films being made today are s**t’',
            'slug' => 'httpsmetrocouk20251005sir-ridley-scott-declares-most-films-made-today-s-t-24347226',
            'excerpt' => 'During the chat, he also confirmed he has no plans to retire from making films.',
            'body' => '<p>Sir <a href="https://metro.co.uk/tag/ridley-scott/">Ridley Scott</a> has been his usual candid self when discussing the state of the film industry, declaring that most movies being made today ‘are s**t’.</p>
<p>The Oscar-nominated filmmaker behind the likes of <a href="https://metro.co.uk/2024/11/15/gladiator-ii-isnt-a-masterpiece-like-ridley-scotts-sequel-anyway-22000295/">Gladiator,</a> <a href="https://metro.co.uk/tag/blade-runner/">Blade Runner</a>, and Alien, was reflecting on his career during a talk at the BFI Southbank on Sunday, attended by Metro, as part of a special season celebrating his work.</p>
<p>Having worked at the forefront in Hollywood for several decades now, the 87-year-old director has seen a lot of change over his career.</p>
<p>Discussing the increased output of films around the world nowadays, in the age of streaming, he observed: ‘The quantity of movies that are made today, literally globally – millions. Not thousands, millions… and most of it is s**t.’</p>
<p>He continued: ‘80% – 60% – eh, 40% is the rest, and 25% of that 40 is not bad, and 10% is pretty good, and the top 5% is great. I’m not sure about the proportion of what I’ve just said, but in the 1940s when there were maybe 300 films a year made, 70% of them were similar.</p>
<p>‘Because I think a lot of films today are saved and made more expensive by digital effects, because what they haven’t got is a great thing on paper first. Get it on paper!’</p>
<p>It’s a theme Sir Ridley returned to later in the event – which was briefly interrupted by an evacuation when the fire alarm went off – when he declared that audiences were ‘drowning in mediocrity’.</p>
<p>When asked if there was a film he liked to re-watch for comfort, he responded: ‘Well, actually, right now, I’m finding mediocrity – we’re drowning in mediocrity. And so what I do – it’s a horrible thing – but I’ve started watching my own movies, and actually they’re pretty good! And also, they don’t age.</p>
<p>‘I watched Black Hawk [Down] the other night and I thought, “How in the hell did I manage to do that?”. But I think occasionally a good one will happen, [and] it’s like a relief that there’s somebody out there who’s doing a good movie.’</p>
<p>During the chat, he also confirmed he has no plans to retire from making films, by replying when he was asked what made him happy: ‘Not stopping.’</p>
<p>He also revealed that his favourite thing to eat was yoghurt and blueberries because he ‘got over food years ago’.</p>
<p>‘I mean, I eat to stay as fit as I can,’ he added, while sharing that the closest he’d come to considering a retirement plan was with his vineyard in France, near Provence – but admitted retirement for him ‘was impossible’.</p>
<p>‘To me, the vineyard would be my retirement occupation, but I ain’t gonna retire,’ he clarified, to a vigorous round of applause.</p>
<p>In terms of his upcoming movies, Sir Ridley has already completed production on his upcoming post-apocalyptic movie with <a href="https://metro.co.uk/tag/jacob-elordi/">Jacob Elordi</a>, The Dog Stars.</p>
<p>He also teased a little about what he has in store for Gladiator 3, in terms of the story, explaining that he only considers doing a sequel if he has ‘a good hook’.</p>
<p>Gladiator II arrived 24 years after the original, which starred <a href="https://metro.co.uk/tag/russell-crowe/">Russell Crowe</a> as former Roman army general turned gladiator Maximus. It won five <a href="https://metro.co.uk/tag/oscars/">Oscars</a>, including best picture and best actor for Crowe.</p>
<p>‘The natural hook in [Gladiator II] seemed to be, what happened to the boy? A bit like Alien died a death after four films, and I thought, I want to resurrect the whole franchise, so I did Prometheus. The idea there was, who’s the big guy sitting in the chair? So from that you sit down at the table and start writing.</p>
<p>‘And on Gladiator II [it was] where did he get to? Did he get lost? Did he die in the wilderness of North Africa? And so you start writing and as you write it’s like [building] a pyramid in reverse. Writing is the hardest single thing to do. If I get it on paper, it’s dead easy.’</p>
<p><a href="https://metro.co.uk/tag/paul-mescal/">Paul Mescal</a> was cast as the son of Maximus in 2024’s Gladiator II, Lucius Verus Aurelius, also the grandson of Emperor Marcus Aurelius. He is initially known as Hanno after being sent away by his mother Lucilla (Connie Nielsen) for his own protection, being captured in war and imprisoned in a gladiator training <a href="https://metro.co.uk/tag/school/">school</a> owned by Macrinus (<a href="https://metro.co.uk/tag/denzel-washington/">Denzel Washington</a>).</p>
<h2>More <a href="https://metro.co.uk/trending/?ico=trending-post-strip_more">Trending</a>
</h2>
<ol>
<li>
 
 
 <a href="https://metro.co.uk/2025/10/03/new-crowd-pleasing-thriller-iconic-filmmaker-tops-amazon-prime-charts-24333033/" aria-label="Link: New \'crowd-pleasing\' thriller from iconic filmmaker tops Amazon Prime charts">
 
 Play Video
 
 </a>
 
 
 <h3>
 <a href="https://metro.co.uk/2025/10/03/new-crowd-pleasing-thriller-iconic-filmmaker-tops-amazon-prime-charts-24333033/">New \'crowd-pleasing\' thriller from iconic filmmaker tops Amazon Prime charts</a>
 </h3>
 
 
 <a href="/entertainment/film/">
 Channel: Film
 
 Film 
 </a>
 2 days ago
 By <a href="https://metro.co.uk/author/emily-bashforth/"><strong>Emily Bashforth</strong></a>
 
 
 
 
</li>
<li>
 <a href="https://metro.co.uk/2025/10/05/10-incredible-hidden-gem-horror-movies-amazon-prime-video-right-now-24331691/">9 incredible hidden gem horror movies you’re missing on Prime Video</a>
</li>
<li>
 <a href="https://metro.co.uk/2025/10/05/curveball-james-bond-favourites-need-see-007-24325120/">The curveball James Bond favourites we need to see as 007</a>
</li>
<li>
 <a href="https://metro.co.uk/2025/10/05/legally-changed-name-bond-james-bond-aged-49-2-24322469/">I legally changed my name to Bond, James Bond aged 49</a>
</li>
</ol>
<h3>
 <a href="https://metro.co.uk/2025/10/03/new-crowd-pleasing-thriller-iconic-filmmaker-tops-amazon-prime-charts-24333033/">New \'crowd-pleasing\' thriller from iconic filmmaker tops Amazon Prime charts</a>
 </h3>
<p>Sir Ridley revealed: ‘I’m already now trying to write Gladiator 3. He’s around and he technically is the Emperor of Rome, and so I have a footprint about what I think it should be…</p>
<p>‘I’m not going to tell you in case you steal it!’ he then joked, to laughs from the audience.</p>
<p>For someone of his standing, the esteemed creative was also, unsurprisingly, asked what advice he’d give to youngsters hoping to follow in his footsteps.</p>
<p>His typical response? ‘Be relentless, don’t listen to any advice, be an absolute jerk.’</p>
<p><strong>Got a story?</strong></p>
<p>If you’ve got a celebrity story, video or pictures get in touch with the <a href="https://metro.co.uk">Metro.co.uk</a> entertainment team by emailing us celebtips@metro.co.uk, calling 020 3615 2145 or by visiting our <a href="https://metro.co.uk/submit-stuff/">Submit Stuff</a> page – we’d love to hear from you.</p>',
            'image_path' => null,
            'original_url' => 'https://metro.co.uk/2025/10/05/sir-ridley-scott-declares-most-films-made-today-s-t-24347226/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:27:04',
            'imported_at' => '2025-10-05 23:02:50',
            'meta' => '{"author": "Tori Brazier", "source": "Metro", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:50',
            'updated_at' => '2025-10-05 23:02:50',
            'deleted_at' => null,
        ],
        [
            'id' => 38,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'cce38ac3b908093b91775898ec55e07d08961032',
            'content_hash' => '4fa2ee9003f66722b5eb84db05cff678ebeebe78872b6c06f00f84dcc8035517',
            'title' => 'Labour pledge homebuying shake-up that would save first-time buyers an average £710',
            'slug' => 'httpswwwindependentcouknewsukhome-newshouse-buying-process-england-labour-reform-b2839667html',
            'excerpt' => 'The government plans to slash costs and cut transaction times in groundbreaking move',
            'body' => '<h2></h2><p>The government plans to slash costs and cut transaction times in groundbreaking move</p>
<p>The government plans to slash costs and cut transaction times in groundbreaking move</p>
<h3>Get the free Morning Headlines email for news from our reporters across the world</h3>
<h3>Sign up to our free Morning Headlines email</h3>
<h3>Sign up to our free Morning Headlines email</h3>
<p>I would like to be emailed about offers, events and updates from The Independent. Read our <a href="/service/privacy-policy-a6184181.html">Privacy notice</a></p>
<p>The government has announced what it claims is the biggest shake-up to the homebuying system in history, promising to slash costs for <a href="/topic/buyers">buyers</a> and cut transaction times.</p>
<p>Proposed <a href="/topic/reforms">reforms</a> include requiring property sellers and <a href="/topic/estate-agents">estate agents</a> to provide more information when a home is listed. This aims to reduce extensive buyer searches and surveys. Binding contracts could also be introduced earlier, reducing chain collapse risk.</p>
<p>Further proposals seek to offer <a href="/topic/consumers">consumers</a> clearer information on estate agents and conveyancers, detailing track record and expertise. New mandatory qualifications and a code of practice would also drive up standards.</p>
<p>Housing secretary Steve Reed said the reforms, which are the subject of a consultation, would help make “a simple dream a simple reality”.</p>
<p>The government will set out a full roadmap in the new year after consulting on its proposals.</p>
<p>Mr Reed said: “Buying a home should be a dream, not a nightmare.</p>
<p>“Our reforms will fix the broken system so hardworking people can focus on the next chapter of their lives.”</p>
<p>Officials believe the proposed package of reforms could cut around a month off the time it takes to buy a new home and save first-time buyers an average of £710.</p>
<p>People selling a home could face increased costs of around £310 due to the inclusion of upfront assessments and surveys.</p>
<p>Those in the middle of a chain would potentially gain a net saving of £400 as a result of the increased costs from selling being outweighed by lower buying expenses.</p>
<p>Wider use of online processes, including digital ID, could help make transactions smoother, the Government argued, pointing to the Finnish digital real estate system which can see the process completed in around two weeks.</p>
<p>The consultation also draws on other jurisdictions, including the Scottish system where there is more upfront information and earlier binding contracts.</p>
<p>The planned shake-up was welcomed by property websites and lenders.</p>
<p>Rightmove chief executive Johan Svanstrom said: “The home-moving process involves many fragmented parts, and there’s simply too much uncertainty and costs along the way.</p>
<p>“Speed, connected data and stakeholder simplicity should be key goals. We believe it’s important to listen to agents as the experts for what practical changes will be most effective, and we look forward to working with the Government on this effort to improve the buying and selling process.”</p>
<p>Zoopla boss Paul Whitehead said: “The homebuying process in the UK remains far too long, too complex, too uncertain, and has seen far less digital innovation than many other sectors. ”</p>
<p>Santander’s head of homes David Morris said: “At a time when technology has changed many processes in our lives, it is incredible that the process of buying a home – an activity that is a cornerstone of our economy – remains much the same for today’s buyers as it did for their grandparents.”</p>
<p>Nationwide’s group director of mortgages Henry Jordan said: “Buying a home is often complex and stressful, which is why the homebuying process needs to be simplified and streamlined for the benefit of consumers, brokers and lenders. But to tackle this issue effectively, we must collaborate.</p>
<p>“That is why we look forward to working closely with Government and the wider industry to modernise the homebuying process, so that buyers are given certainty earlier and to help reduce any unnecessary costs.”</p>',
            'image_path' => 'https://static.independent.co.uk/2025/07/14/14/46/iStock-2181769434.jpeg?width=1200&auto=webp&crop=3%3A2',
            'original_url' => 'https://www.independent.co.uk/news/uk/home-news/house-buying-process-england-labour-reform-b2839667.html',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:25:59',
            'imported_at' => '2025-10-05 23:02:50',
            'meta' => '{"author": "David Hughes", "source": "Independent", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:50',
            'updated_at' => '2025-10-05 23:02:50',
            'deleted_at' => null,
        ],
        [
            'id' => 39,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '3d83748a2b7c71f29cc400b00083fbc8faead5bb',
            'content_hash' => 'fc56ee69dd0bcbcb47e9e9a5950adf9f5b0ae5a18626f8929b5f86f2b7a1213a',
            'title' => 'Walking towards a cure, hundreds gather at Mahoney State Park to raise awareness for type 1 diabetes',
            'slug' => 'httpswww3newsnowcomnewslocal-newswalking-towards-a-cure-hundreds-gather-at-mahoney-state-park-to-raise-awareness-for-type-1-diabetes',
            'excerpt' => 'The two-mile walk, hosted by Breakthrough T1D\'s Nebraska chapter, aims to raise more than $450,000 annually to fund research for treating, curing and preventing the autoimmune condition.',
            'body' => '<h2>Actions</h2>
<ul>
 
 <li><a href="https://www.facebook.com/dialog/share?app_id=430598020481447&amp;display=popup&amp;href=https://www.3newsnow.com/news/local-news/walking-towards-a-cure-hundreds-gather-at-mahoney-state-park-to-raise-awareness-for-type-1-diabetes" target="_blank">
Facebook
</a>
</li>
 
 <li><a href="https://twitter.com/intent/tweet?url=https://www.3newsnow.com/news/local-news/walking-towards-a-cure-hundreds-gather-at-mahoney-state-park-to-raise-awareness-for-type-1-diabetes&amp;text=Walking%20towards%20a%20cure%2C%20hundreds%20gather%20at%20Mahoney%20State%20Park%20to%20raise%20awareness%20for%20type%201%20diabetes" target="_blank">
Tweet
</a>
</li>
 
 <li><a href="mailto:?body=Walking%20towards%20a%20cure%2C%20hundreds%20gather%20at%20Mahoney%20State%20Park%20to%20raise%20awareness%20for%20type%201%20diabetes%0A%0Ahttps%3A%2F%2Fwww.3newsnow.com%2Fnews%2Flocal-news%2Fwalking-towards-a-cure-hundreds-gather-at-mahoney-state-park-to-raise-awareness-for-type-1-diabetes%0A%0AThe%20two-mile%20walk%2C%20hosted%20by%20Breakthrough%20T1D%27s%20Nebraska%20chapter%2C%20aims%20to%20raise%20more%20than%20%24450%2C000%20annually%20to%20fund%20research%20for%20treating%2C%20curing%20and%20preventing%20the%20autoimmune%20condition.">Email</a>
</li>
 
 </ul>
<p>Jill is your neighborhood news reporter for Northwest Omaha. Jill is passionate about connecting with her community and telling the stories that matter to them. </p>
<p>ASHLAND, Neb. (KMTV) — Families gathered at Mahoney State Park for the annual Breakthrough T1D walk, raising funds and awareness for type 1 diabetes research and treatment.<br></p>
<ul><li>The two-mile walk is hosted by Breakthrough T1D\'s Nebraska chapter.</li><li>The goal is to raise more than $450,000 to fund research for treating, curing and preventing the autoimmune condition.</li><li>Among the participants was 9-year-old Kenzley Roberts, who has been living with type 1 diabetes since she was 4.</li></ul>
<p><b>BROADCAST TRANSCRIPT:</b> </p>
<p></p>
<p>Hundreds of families and community members gathered at Mahoney State Park in Ashland to participate in the annual Breakthrough T1D walk, raising awareness and funds for type 1 diabetes research.</p>
<p>The event brought together people who have been impacted by the autoimmune condition, all working toward advancing research for treatments, cures and prevention.</p>
<p>Among the participants was 9-year-old Kenzley Roberts, who has been living with type 1 diabetes since she was 4. Surrounded by friends and family, she described the support she feels from the community.</p>
<p>"It means a lot to me because I know they\'re all supporting me. Like here for help and support," Roberts said.</p>
<p>Her mother, Morgan Roberts, praised her daughter\'s strength and advocacy skills developed through managing the condition.</p>
<p>"She is a very strong little girl, and I think being a type 1 diabetic and having to advocate for herself from such a young age has really allowed her personality to shine through," Roberts said.</p>
<p>The two-mile walk, hosted by Breakthrough T1D\'s Nebraska chapter, aims to raise more than $450,000 annually to fund research for treating, curing and preventing the autoimmune condition.</p>
<p>Wayne Hill, the walk\'s co-chair who has been living with type 1 diabetes for 23 years, has witnessed significant medical breakthroughs during his lifetime.</p>
<p>"It\'s already going into new drugs like Tzield which will help prevent the onset of symptoms, and you can also see pumps and sensors. When I first got diagnosed, none of that was even available," Hill said.</p>
<p>Hill explained how technology has transformed daily life for people with type 1 diabetes.</p>
<p>"Kids or adults for that matter that are diagnosed don\'t have to finger prick. They can get all of their blood sugar direct to their smart devices within 5 minutes, and you have an artificial pancreas between the two of them talking. So it makes you live a little bit more of a normal life," Hill said.</p>
<p>More than 1.5 million Americans live with type 1 diabetes. Organizers say events like this walk bring the community together, moving one step closer to finding a cure.</p>
<h3>Sign up for the Headlines Newsletter and receive up to date information.</h3>
<h3> now signed up to receive the Headlines Newsletter.</h3>
<h3>More News In Your Neighborhood</h3>',
            'image_path' => null,
            'original_url' => 'https://www.3newsnow.com/news/local-news/walking-towards-a-cure-hundreds-gather-at-mahoney-state-park-to-raise-awareness-for-type-1-diabetes',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:25:57',
            'imported_at' => '2025-10-05 23:02:51',
            'meta' => '{"author": "Jill Lamkins", "source": "action3news", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:51',
            'updated_at' => '2025-10-05 23:02:51',
            'deleted_at' => null,
        ],
        [
            'id' => 40,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '841447811352eff0c787fb821975cda75841f766',
            'content_hash' => 'f02a8f4021edac206cb1b3cfeed82a397a9f3dc98adaa1153f3be7438cb4e9c3',
            'title' => 'September Arts and Culture Fest celebrates diversity in full color',
            'slug' => 'httpsscotscoopcomseptember-arts-and-culture-fest-celebrates-diversity-in-full-color',
            'excerpt' => 'San Mateo’s September Arts and Culture Fest brought together local art, music, dance, and more, celebrating the Bay Area&#8217;s diverse cultural landscape. The festival was held this past Sunday along B Street in downtown San Mateo, consisting of numerous booths and performances...',
            'body' => '<p><a href="https://www.smcgov.org/ceo/september-arts-culture-fest-2025" target="_blank" rel="noopener">San Mateo’s September Arts and Culture Fest</a> brought together local art, music, dance, and more, celebrating the Bay Area’s diverse cultural landscape. </p>
<p>The festival was held this past Sunday along <a href="https://sanmateochamber.org/wp-content/uploads/Event-Map-web-version.pdf" target="_blank" rel="noopener">B Street</a> in downtown San Mateo, consisting of numerous booths and performances for all to enjoy. </p>
<p>Erica Wood is the president and CEO of the <a href="https://sanmateochamber.org/" target="_blank" rel="noopener">San Mateo Area Chamber of Commerce</a>, one of the organizers of the festival. </p>
<p>According to Wood, one of the inspirations for the festival was to activate and energize San Mateo’s downtown area, creating experiences that encourage people to shop, dine, and spend more time there. </p>
<p>“As a chamber, our mission is to create a vibrant local economy and community, and this event is really an example of that mission in action,” Wood said. </p>
<p>One of the main showcases of the day was the live mural contest, in which contestants had to design a mural based on their interpretation of the word “community.”</p>
<p>Iris Zheng, a junior at King’s Academy, was among the youngest contestants. She worked with her sister to paint a group of people eating different ethnic foods together, which showcased the community’s cohesiveness.</p>
<p>“When I think of our community, I believe the defining factor is our diversity. One of the best ways to show our culture was through food and the different cuisines that represent these different cultures,” Zheng said.</p>
<p>Throughout the six-hour event, community booths were available for both companies and artists to showcase their work. </p>
<p>Evangelina Portillo is a local artist from South San Francisco who creates Dia de los Muertos paintings with acrylics on canvas. For Portillo, her culture inspires a lot of her work. </p>
<p>I really enjoy sharing my art because I notice that a lot of people can relate to a lot of the paintings that I do and I tell stories behind them.</p>
<p>— Evangelina Portillo</p>
<p>“There’s so much art behind the Dia de los Muertos, and my parents and their life in Mexico inspires me a lot,” Portillo said. “I really enjoy sharing my art because I notice that a lot of people can relate to a lot of the paintings that I do and I tell stories behind them.” </p>
<p>Public festivals like this one offer a platform for local artists to showcase their talents and receive recognition for their work. According to Wood, over 70 visual and performing artists were represented in this event alone. </p>
<p>“San Mateo is blessed with this incredible diversity and an array of cultural backgrounds that we get to celebrate,” Wood said. </p>
<p>For artists, sharing their work with others is even more fulfilling as it is a way to discover connections with the community. </p>
<p>“I really enjoy doing it because I noticed that a lot of people can relate to a lot of the paintings that I do, and the stories behind them. It has a lot of history, and it’s got a lot of cultural aspects: the colors, everything I do is festive, and I like to show the celebration of life,” Portillo said. </p>
<p>Additionally, the festival offered a platform for performers. Performances of the day included singing, taiko drumming, ballet, and more. </p>
<p>Twisha Anand performed different types of indian dances. Although she is a classical dancer in the kathak dance form, she also enjoys creating fusion pieces that allow her to blend cultural and modern influences for a wider audience. </p>
<p>“I believe that dance in itself is beautiful, but when people understand what they’re watching and why they’re watching, that gives people a lot of joy,” Anand said. “I love to create fusion pieces, especially now that I live in the U.S. and in a very multicultural, multi-ethnic society.”</p>
<p>In one of her pieces, in particular, she danced to a popular song, “Golden,” from the popular kids’ movie KPop Demon Hunters, inviting all ages to sing along. </p>
<p>I believe that dance in itself is beautiful, but when people understand what they’re watching and why they’re watching, that gives people a lot of joy.</p>
<p>— Twisha Anand</p>
<p>“I want to orient the younger generation towards these classical art forms, and the best way to do so is to speak their language,” Anand said. “This is just a way of encouraging the new generation to continue learning the old classical dance forms, and where they fit in and how they fit in.” </p>
<p>To many entertainers, sharing their art, whether it is physical art or through singing or dance, brings happiness to both share and internalize. </p>
<p>“I love to dance. I enjoy dancing for others. I feel that expression and movement can bring so much healing as well as joy and happiness to people. I love to bring joy to people. I’m an community builder kind of a person, and I think dance is just an extension of that,” Anand said. </p>
<p>Gary Ferguson, executive artistic director at the <a href="https://www.ccconservatory.com/" target="_blank" rel="noopener">Coastal Currents Conservatory</a>, is a fourth-year emcee for one of the stages. </p>
<p>“The Bay Area is made up of every demographic, and so today, we’ve gotten to see a lot of that,” Ferguson said. </p>
<p>In the past, the event was only held at Central Park, but the transition to B Street has allowed people to enjoy both the event and the many stores and restaurants that surround the area. </p>
<p>“More people should try to explore these events because they’re a lot of fun. There’s a lot of great restaurants to eat at and it’s great to explore the shops,” said Helen Barrera, an attendee. </p>
<p>The festival showcased the easy accessibility of cultures, with a strong emphasis on diversity. </p>
<p>“We have the opportunity to listen, learn, and absorb so much from other cultures while sitting in our own city. I think that’s a very big blessing that we have festivals without having to travel hundreds of countries in the world,” Anand said. </p>
<ul>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/beyond-the-screen-uncovering-the-strange-appeal-of-horror/">
 
 Beyond the screen: Uncovering the strange appeal of horror 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/breaking-the-ice-cutting-corners-in-big-tech/">
 
 Breaking the ice: Cutting corners in Big Tech 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/beyond-the-screen-how-films-shape-cultural-perceptions/">
 
 Beyond the screen: How films shape cultural perceptions 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/end-of-the-road-ep-1-choosing-a-path/">
 
 End of the Road Ep.1: Choosing a path 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/on-authenticity-eva-parker-shares-her-experience-coming-out-as-a-teacher/">
 
 On authenticity: Eva Parker shares her experience coming out as a teacher 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/opinion-indie-animation-deserves-your-attention/">
 
 Opinion: Indie animation deserves your attention 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/summer-school-provides-an-alternative-for-missed-classes/">
 
 Summer school provides an alternative for missed classes 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/scots-science-lab-a-bubbly-experiment/">
 
 Scots\' Science Lab: A Bubbly Experiment 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/cartoon-all-eyes-on-me/">
 
 Cartoon: All eyes on me 
 </a>
 </li>
 <li>
 
 
 
 Uncategorized
 <a href="https://scotscoop.com/opinion-hobbies-dont-always-need-to-be-productive/">
 
 Opinion: Hobbies don’t always need to be productive 
 </a></li></ul>',
            'image_path' => null,
            'original_url' => 'https://scotscoop.com/september-arts-and-culture-fest-celebrates-diversity-in-full-color/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:25:56',
            'imported_at' => '2025-10-05 23:02:52',
            'meta' => '{"author": "Kiana Chen, Highlander Managing Editor", "source": "scotscoop", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:52',
            'updated_at' => '2025-10-05 23:02:52',
            'deleted_at' => null,
        ],
        [
            'id' => 41,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '480ffcc9bf1b44861143639e1af94c98d8fc47ce',
            'content_hash' => '29ec2a0276d8d249dff3112e5b1dfda0319b08c81d78c77dc47fc404215c56ca',
            'title' => 'NASCAR Charlotte Race: Fire Department Issues Clarification as Fans Report Smoke Sighting',
            'slug' => 'httpswwwessentiallysportscomnascar-news-nascar-cup-series-race-charlotte-playoffs-nascar-charlotte-race-fire-department-issues-clarification-as-fans-report-smoke-sighting',
            'excerpt' => 'The Bank of America ROVAL 400 at Charlotte Motor Speedway brought high-stakes playoff drama on October 5, 2025, with drivers navigating the tricky 2.28-mile road course under sunny skies. As the action unfolded, starting at 3 p.m. ET, a few sharp-eyed spectators caught sight of s...',
            'body' => '<p>Oct 6, 2025 | 3:55 AM IST</p>
<p>Oct 6, 2025 | 3:55 AM IST</p>
<p>USA Today via Reuters</p>
<p hidden>Oct 11, 2020; Concord, North Carolina, USA; NASCAR Cup Series driver Chase
Elliott (9) leads Alex Bowman (88), Joey Logano (22) and Kyle Busch (18) into
the chicane during the Bank of America ROVAL 400 at Charlotte Motor Speedway.
Mandatory Credit: Jasen Vinlove-USA TODAY Sports</p>
<p>USA Today via Reuters</p>
<p hidden>Oct 11, 2020; Concord, North Carolina, USA; NASCAR Cup Series driver Chase
Elliott (9) leads Alex Bowman (88), Joey Logano (22) and Kyle Busch (18) into
the chicane during the Bank of America ROVAL 400 at Charlotte Motor Speedway.
Mandatory Credit: Jasen Vinlove-USA TODAY Sports</p>
<p>The Bank of America ROVAL 400 at Charlotte Motor Speedway brought high-stakes playoff drama on October 5, 2025, with drivers navigating the tricky 2.28-mile road course under sunny skies. As the action unfolded, starting at 3 p.m. ET, a few sharp-eyed spectators caught sight of something off in the horizon, stirring whispers among the crowd. This side note to the day’s racing kept everyone on their toes.</p>
<p>Watch What’s Trending Now!</p>
<h2>Clarification Amid the Buzz</h2>
<p>The Charlotte Fire Department addressed concerns with a timely update on X, confirming a structure fire near the venue. <em>“Structure Fire update: 200 block of Gracyn Olivia Ln. 30 Charlotte firefighters quickly control fire. There are no injuries to report. The fire is under investigation by the Charlotte Fire Investigation Task Force,”</em> the department stated at 5:36 p.m. ET, right as the race wrapped up.</p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p>Structure Fire update: 200 block of Gracyn Olivia Ln. 30 Charlotte firefighters quickly control fire. There are no injuries to report. The fire is under investigation by the Charlotte Fire Investigation Task Force.</p>
<p>— Charlotte Fire Dept (@CharlotteFD) <a href="https://twitter.com/CharlotteFD/status/1974951882499244346?ref_src=twsrc%5Etfw?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_2" target="_blank">October 5, 2025</a></p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p>Located in the 28262 zip code, just two miles from the <a href="https://www.essentiallysports.com/category/nascar/charlotte-motor-speedway/?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_2" target="_self">speedway</a> off I-485 and North Tryon Street, the apartment complex incident likely explained the visible plume. With no impact on track activities and quick containment, it reassured attendees, focusing on <a href="https://www.essentiallysports.com/tag/shane-van-gisbergen/?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_4" target="_self">Shane Van Gisbergen</a>‘s dominant run. Take a look at the picture below.</p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<blockquote><p dir="ltr" lang="en">Lawd Jesus itza far <a href="https://t.co/E2rxmXkjmA">pic.twitter.com/E2rxmXkjmA</a></p><p>— The Catch Fence ™ (@TheCatchFence) <a href="https://twitter.com/TheCatchFence/status/1974927317995819064?ref_src=twsrc%5Etfw">October 5, 2025</a></p></blockquote>
<p dir="ltr" lang="en">Lawd Jesus itza far <a href="https://t.co/E2rxmXkjmA">pic.twitter.com/E2rxmXkjmA</a></p>
<p>— The Catch Fence ™ (@TheCatchFence) <a href="https://twitter.com/TheCatchFence/status/1974927317995819064?ref_src=twsrc%5Etfw">October 5, 2025</a></p>
<p>Expand Tweet</p>
<p>AD</p>
<p>This is a developing story!</p>
<p>Read Top Stories First From EssentiallySports</p>
<p>Click here and check box next to EssentiallySports </p>
<p>ADVERTISEMENT</p>
<p>te****@gmail.com</p>
<p>Newsletter reader</p>
<p>cy****@gmail.com</p>
<p>Newsletter reader</p>
<p>jo*****@gmail.com</p>
<p>Newsletter reader</p>
<p>sw****@gmail.com</p>
<p>Newsletter reader</p>
<p>dow*****@gmail.com</p>
<p>Newsletter reader</p>
<p>te****@gmail.com</p>
<p>Newsletter reader</p>
<p>cy****@gmail.com</p>
<p>Newsletter reader</p>
<p>jo*****@gmail.com</p>
<p>Newsletter reader</p>
<p>sw****@gmail.com</p>
<p>Newsletter reader</p>
<p>dow*****@gmail.com</p>
<p>Newsletter reader</p>',
            'image_path' => 'https://image-cdn.essentiallysports.com/wp-content/uploads/20201012182802/2020-10-11T223408Z_791423315_NOCID_RTRMADP_3_NASCAR-BANK-OF-AMERICA-ROVAL-400-473x315.jpg',
            'original_url' => 'https://www.essentiallysports.com/nascar-news-nascar-cup-series-race-charlotte-playoffs-nascar-charlotte-race-fire-department-issues-clarification-as-fans-report-smoke-sighting/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:25:44',
            'imported_at' => '2025-10-05 23:02:53',
            'meta' => '{"author": "Rajnish Kumar", "source": "Essentially Sports", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:53',
            'updated_at' => '2025-10-05 23:02:53',
            'deleted_at' => null,
        ],
        [
            'id' => 42,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'b92d62cfba6614904112cd405f5e32ad89049ffa',
            'content_hash' => 'c4e10942d553630b9cba46f1cc61a3c102caeea50dde15c0f47218eb6fac6ffc',
            'title' => 'Ward 6 School Committee Candidate Mali Brodt Wants To Rebuild Community Trust in NPS',
            'slug' => 'httpsbcheightscom223397metro223397',
            'excerpt' => 'With a background in education, Ward 6 Newton School Committee candidate Mali Brodt hopes to use her experience to repair what she sees as a damaged relationship between teachers, parents, and the school committee.',
            'body' => '<ul><li><a href="https://bcheights.com/category/metro/" rel="category tag">Metro</a></li><li><a href="https://bcheights.com/category/metro/newton/" rel="category tag">Newton</a></li><li><a href="https://bcheights.com/category/metro/politics/" rel="category tag">Politics</a></li><li><a href="https://bcheights.com/category/metro/newton/school-committee-newton/" rel="category tag">School Committee</a></li></ul>
<p>With a background in education, Ward 6 Newton School Committee candidate Mali Brodt hopes to use her experience to repair what she sees as a damaged relationship between teachers, parents, and the school committee.</p>
<p>Brodt, who has spent two decades as both a teacher and counselor in Newton Public Schools (NPS), believes that her experience in the classroom provides her with an important perspective.</p>
<p>“I have a unique perspective to mend those rifts and steer NPS in the right direction,” Brodt said. </p>
<p>After spending 16 years as a middle school teacher, Brodt transitioned to student counseling upon observing an increase in social-emotional and mental health challenges in students, according to her <a href="https://www.mali4newton.org/meet_mali">website</a>. </p>
<p>Brodt believes NPS has been plagued by problems for the last five years, spanning from last year’s historic strike initiated by the Newton Teachers Association (NTA) to a growing budget deficit to the unpopular implementation of multi-level classes. </p>
<p>Part of this problem, according to Brodt, is a rift between the school committee and Newton families brought about by a lack of communication and worsened by committee members making disparaging comments about the union and teachers.</p>
<p>“The way that teachers and the union were talked about from the school committee was very negative and combative,” said Brodt. </p>
<p>Forging a strong, collaborative partnership begins with changing the rhetoric, explained Brodt, and she believes she can help mend the rift between all parties. </p>
<p>NPS also faces a looming <a href="https://bcheights.com/219746/metro/facing-fiscal-challenges-mayor-fuller-presents-responsible-budget-for-fy26/">budget deficit</a> of $4.5 million. While funding for NPS increased by over 3 percent from last year, the $292.6 million allocated was less than what Superintendent Anna Nolin hoped for. </p>
<p>“NPS has been underfunded,” Brodt said. “It has been funded at lower rates than other departments and in our peer cities and towns.”</p>
<p>To achieve generational equity, Brodt believes adequate funding is necessary to address the needs of today’s students.</p>
<p>“What we need today requires more funding than we already have, and it is our responsibility to make sure they [students] are getting what they need to thrive,” Brodt said. </p>
<p>Lack of transparency, Brodt believes, has played a big role in the <a href="https://bcheights.com/219924/metro/newton-school-committee-could-face-legal-penalties-as-funding-cuts-loom/">budget crisis</a>. In Brodt’s eyes, creating sustainable funding means improving communication on why certain departments are getting particular funding. Addressing this allocation will go a long way in addressing mistrust between parents and teachers, Brodt explained. </p>
<p>“The mayor, the city council, and school committee need to be much more transparent about what funds the city has, how they are used, and what the needs are,” Brodt said. </p>
<p>Brodt stated that the rollout of the <a href="https://bcheights.com/218107/metro/superintendent-nolin-presents-on-multi-level-classes-and-tiered-support-system-at-newton-school-committee-meeting/">multi-level classes</a> program at the same time teachers were offered per diem was ill-advised. Brodt also said that teachers did not have a full understanding of how to operate in this new class structure due to a lack of resources. </p>
<p>Multi-level classes have received some <a href="https://www.newtonbeacon.org/teachers-say-multi-level-classes-are-a-multi-level-problem/">criticism</a> since being implemented in 2021. </p>
<p>“If Newton wants a successful multi-level class program, it needs to restart, with clear reasoning behind it,” Brodt said. </p>
<p>Brodt is running against fellow first-time candidate Jonathan Greene in her bid for the Ward 6 seat, with the municipal election taking place on Nov. 4. </p>
<ul><li><a href="https://bcheights.com/tag/newton-school-committee/" rel="tag">newton school committee</a></li><li><a href="https://bcheights.com/tag/newton-ward-6/" rel="tag">newton ward 6</a></li></ul>',
            'image_path' => null,
            'original_url' => 'https://bcheights.com/223397/metro/223397/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:25:34',
            'imported_at' => '2025-10-05 23:02:54',
            'meta' => '{"author": "Patrick Lundregan", "source": "bcheights", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:02:54',
            'updated_at' => '2025-10-05 23:02:54',
            'deleted_at' => null,
        ],
        [
            'id' => 43,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => 'e7f54fb925bae88b60ca0ff4198398accd111b76',
            'content_hash' => '35cad659331d8b968878ae98aa6438edf1fbd2c2735973fad2f131201cd5640d',
            'title' => 'Kipkoech and Chepkoech lead Kenyans in sweeping Koln marathon',
            'slug' => 'httpdailysportcokekipkoech-and-chepkoech-lead-kenyans-in-sweeping-koln-marathonutm-sourcerssutm-mediumrssutm-campaignkipkoech-and-chepkoech-lead-kenyans-in-sweeping-koln-marathon',
            'excerpt' => 'Kenyan Barnaba Kipkoech and Ethiopian Fantu Shugi are the winners of today’s General Koln marathon held in Koln, Germany. Kipkoech led in Kenyan men’s podium sweep, taking positions 1-2-3-4 and 6 while Faith Chepkoech &#160;came third in women race behind Ethiopian duo of Shugi a...',
            'body' => '<p>Kenyan Barnaba Kipkoech and Ethiopian Fantu Shugi are the winners of today’s General Koln marathon held in Koln, Germany.</p>
<p>Kipkoech led in Kenyan men’s podium sweep, taking positions 1-2-3-4 and 6 while Faith Chepkoech came third in women race behind Ethiopian duo of Shugi and Sinash Mekonen.</p>
<p><strong>Men’s Marathon</strong></p>
<p><strong>Women’s Marathon</strong></p>',
            'image_path' => null,
            'original_url' => 'http://dailysport.co.ke/kipkoech-and-chepkoech-lead-kenyans-in-sweeping-koln-marathon/?utm_source=rss&utm_medium=rss&utm_campaign=kipkoech-and-chepkoech-lead-kenyans-in-sweeping-koln-marathon',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:25:18',
            'imported_at' => '2025-10-05 23:03:00',
            'meta' => '{"author": "Sabuni Khwa Sabuni", "source": "Daily Sport", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:00',
            'updated_at' => '2025-10-05 23:03:00',
            'deleted_at' => null,
        ],
        [
            'id' => 44,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '930519ead2ae72ba58bbb89398b77dcef000cb01',
            'content_hash' => '7c3081474717dfe74e8cf722aa95b061db2e251d449f6159e8f6c93cceb5151b',
            'title' => 'Iowa volleyball notebook | Hawkeyes fall to Oregon, Washington',
            'slug' => 'httpsdailyiowancom20251005iowa-volleyball-notebook-hawkeyes-fall-to-oregon-washington',
            'excerpt' => 'Iowa volleyball dropped to 1-3 in Big Ten play following this weekend’s road losses to Oregon and Washington. The Hawkeyes were outmatched in a five-set thriller against the Ducks on Friday, before being swept by the Huskies on Saturday. The defeats leave Iowa at 10-6 overall and...',
            'body' => '<p>Iowa volleyball dropped to 1-3 in Big Ten play following this weekend’s road losses to Oregon and Washington. The Hawkeyes were outmatched in a five-set thriller against the Ducks on Friday, before being swept by the Huskies on Saturday. The defeats leave Iowa at 10-6 overall and 1-3 in Big Ten play. </p>
<p><b>Ducks outlast Hawkeyes </b></p>
<p>Iowa fell in five sets against Oregon on Friday. Despite four match points to take the win, the Hawkeyes were unable to close out the final set and steal a victory. </p>
<p>Sixth-year Chard’e Vanzandt and first-year Carmel Vares each tallied 18 kills to lead the offense. Fourth-years Milana Moisio and Claire Ammeraal logged 13 digs and nine digs, respectively, while the latter also recorded a season-high 49 assists.</p>
<p>An early 4-0 run by the Ducks created momentum for Oregon to pull away in the first set. While Iowa kept up the pressure, the Hawkeyes ultimately fell in the first set, 25-19.</p>
<p>Iowa took the second set over Oregon by an identical margin. As the set came to a close, two service errors from the Ducks and a service ace from Stojanovic tipped the scales in favor of the Hawkeyes, giving Iowa a 25-19 victory in the second frame. </p>
<p>Oregon pulled ahead in the third set, using multiple high-scoring runs to their advantage. The Ducks started off with a momentous 5-1 lead to force a Hawkeye timeout and never looked back, ending the frame on a 9-2 scoring run to clinch the triumph. </p>
<p>Iowa deadlocked the competition at two sets apiece with a 25-16 win in the fourth set. Equipped with a narrow lead early on, a colossal 8-0 run from the Hawkeyes catapulted them past the Ducks to force a fifth set. </p>
<p>Despite multiple chances to close the deal, Iowa fell just short in the fifth set. With 11 ties and five lead changes, the game’s final set was as volatile as ever, with the Hawkeyes losing a 14-12 lead and falling in extra points, 19-17.</p>
<p>“We played tough on the road and had chances to win the match,” head coach Jim Barnes told HawkeyeSports. “Credit Oregon for turning it around at the end of the fifth set. We showed a lot of heart tonight and were just one play away from winning it.”</p>
<p><b>Dawgs protect their doghouse </b></p>
<p>Iowa fell in a sweep against Washington in Saturday’s game, dropping to 10-6 overall and 1-3 in Big Ten play.</p>
<p>Vanzandt again led the offense with seven kills, while second-year Hallie Steponaitis contributed six kills of her own.</p>
<p>In the closest set of the evening, the Hawkeyes fought back against multiple set points in the first to nudge themselves within six points of the Huskies, before Washington closed out the set, 25-19.</p>
<p>The Huskies further controlled the tempo in the second set, triggering multiple scoring runs that pulled Washington further ahead. After a 5-1 scoring run late in the second, the Huskies again took the victory, this time by a 25-14 margin.</p>
<p>Washington closed out the sweep in the third set, taking full advantage of a 7-0 run that forced an Iowa timeout and following it with an 11-2 run to gain a 23-9 lead. </p>
<p><b>Up next</b></p>
<p>Iowa heads back to the Midwest for road matchups against Michigan State on Oct. 10 and Michigan on Oct. 11. Both contests will be live-streamed on Big Ten Plus. </p>',
            'image_path' => null,
            'original_url' => 'https://dailyiowan.com/2025/10/05/iowa-volleyball-notebook-hawkeyes-fall-to-oregon-washington/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:25:15',
            'imported_at' => '2025-10-05 23:03:01',
            'meta' => '{"author": "Jack Birmingham, Sports Reporter", "source": "dailyiowan", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:01',
            'updated_at' => '2025-10-05 23:03:01',
            'deleted_at' => null,
        ],
        [
            'id' => 45,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '53d28d7015801959a18a57d3bfbfa48c4dd62743',
            'content_hash' => 'c134e62fdea7127c5a87235658e4baa09c0431af6b8299a99eac1fad8141e6c6',
            'title' => 'Heisman Winner Knows Biggest Culprit Behind Arch Manning Woes Who Failed QB 6 Years Ago',
            'slug' => 'httpswwwessentiallysportscomncaa-college-football-news-heisman-winner-knows-biggest-culprit-behind-arch-manning-woes-who-failed-qb-six-years-ago',
            'excerpt' => 'Arch Manning was just gaining momentum. Victories against San Jose and UTEP followed by a clean sweep against Sam Houston, 55-0. The Texas QB1 still had issues, but you could see an upward trajectory. The Swamp put a screeching break to that climb. A 21-29 loss, and the spotlight...',
            'body' => '<p>Oct 5, 2025 | 6:23 PM EDT</p>
<p>Oct 5, 2025 | 6:23 PM EDT</p>
<p>via Imago</p>
<p hidden>NCAA, College League, USA Football: Texas at Florida Oct 4, 2025 Gainesville,
Florida, USA Texas Longhorns quarterback Arch Manning 16 throws the ball before
a game against the Florida Gators at Ben Hill Griffin Stadium. Gainesville Ben
Hill Griffin Stadium Florida USA, EDITORIAL USE ONLY
PUBLICATIONxINxGERxSUIxAUTxONLY Copyright: xMattxPendletonx 20251004_cec_ee7_013</p>
<p>via Imago</p>
<p hidden>NCAA, College League, USA Football: Texas at Florida Oct 4, 2025 Gainesville,
Florida, USA Texas Longhorns quarterback Arch Manning 16 throws the ball before
a game against the Florida Gators at Ben Hill Griffin Stadium. Gainesville Ben
Hill Griffin Stadium Florida USA, EDITORIAL USE ONLY
PUBLICATIONxINxGERxSUIxAUTxONLY Copyright: xMattxPendletonx 20251004_cec_ee7_013</p>
<p>Arch Manning was just gaining momentum. Victories against San Jose and UTEP followed by a clean sweep against Sam Houston, 55-0. The Texas QB1 still had issues, but you could see an upward trajectory. The Swamp put a screeching break to that climb. A 21-29 loss, and the spotlight again fell on Steve Sarkisian’s prized quarterback. After throwing two interceptions and getting sacked six times, the ‘hook’em’ fandom was again at a loss for words. For it was the Manning legacy they rallied behind. But maybe that very Manning pedigree is the culprit behind his present woes.</p>
<p>Watch What’s Trending Now!</p>
<p>“The thing that’s working against Arch is expectations and that last name,” <a href="https://www.youtube.com/live/On-EbZudVEY?si=OkQcLE4O6nE84ssx?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_2" target="_blank">Shannon Sharpe says in a conversation with Chad Johnson and Johnny Manziel on the October 4 episode of the Nightcap</a>. Every time you hear his name, you are also reminded of who his grandfather was. The next sentence is about his uncles, Peyton and Eli. Super Bowl honors, Pro Bowl selections, and in each of their careers, great college football records. So far, Arch hasn’t shown anything that he’d follow the trajectory.</p>
<p>“Y’all really thought that Arch Manning was going to be Peyton? Y’all really thought that?” Sharpe puts forth the question. Ocho answered with a yes. “Most of the time, it (the talent from the lineage) trickles down one after another.”</p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p>Hopping into the conversation, Johnny Manziel, who is the first freshman to win the Heisman honor (at Texas A&amp;M), digs further into the mental side of these things. “It’s how to carry yourself side of things. It’s what you see from the greats that you’ve been around with access that nobody in the world gets to see.” Being the nephew of two NFL legends and the grandson of Archie Manning, he had access to the learnings and experiences that other QBs didn’t have.</p>
<p>via Imago</p>
<p hidden>Wie der Vater so die Söhne – Die Brüder Eli (New York Giants, re.) und Peyton Manning (Indianapolis Colts, li.) setzen die erfolgreiche Quarterback Karriere ihres Daddys Archie fort – PUBLICATIONxINxGERxSUIxAUTxHUNxONLY (Icon8003285)<br>Like the Father as The Sons The Brothers Eli New York Giants right and Peyton Manning Indianapolis Colts left set The successful Quarterback Career her Daddys Archie Progress PUBLICATIONxINxGERxSUIxAUTxHUNxONLY Icon8003285</p>
<p>Paul Finebaum went big on the Arch claim, comparing him to Tim Tebow, but jumped off the hype train after the Ohio State loss. But to the skeptics, who didn’t buy into the preseason hype, Arch’s high school tapes were one of the reasons. The Longhorns QB earned a big reputation as an eighth grader in 2019, with his first ‘varsity dart’ culminating in a title. At Isidore Newman High School, a powerhouse 7-on-7 unit, which had been winning the LSU camp for years. Arch entered and led them to another title.</p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p>Over his high school career, he chipped in 115 TD over 42 games per MaxPreps. But the impressive numbers do not paint the picture of the opposing defense. “When you go watch Arch Manning’s highlight tape,” Manziel continued. “And you see the dudes that are chasing after him; my grandma in a wheelchair moved faster than some of them boys they were chasing after him, right?”</p>
<p>AD</p>
<p>Bottom Line: Arch Manning did not face the competition that could have prepared him for SEC defenses. “And it’s not his fault,” Manziel continued,<a href="https://www.essentiallysports.com/ncaa-college-football-news-college-football-world-rip-arch-manning-mercilessly-over-week-six-blunders/?utm_medium=website&amp;utm_source=website_internal&amp;utm_campaign=web_link_2" target="_self"> soothing the burn</a>. “That’s just where he went to high school.” But then again, Arch is on a learning curve. Peyton and Eli are right behind him, supporting him with their invaluable experience. Manziel added. “If Texas goes eight and four this year after being preseason number one, that’s a hungry offseason. That’s growth.”</p>
<p>Read Top Stories First From EssentiallySports</p>
<p>Click here and check box next to EssentiallySports </p>
<h2>Arch’s comparison to Eli and Peyton Manning</h2>
<p>Much to college fandom’s surprise, zooming down to Arch, Peyton and Eli’s first six collegiate starts, the Longhorns QB is not left far behind. Peyton Manning, during his time at Tennessee, completed 1,682 yards, while Eli completed 1,657 yards. Similarly, Arch has completed 1,623 yards over six games (two last season + 2025’s four starts).</p>
<p>ADVERTISEMENT</p>
<p>Article continues below this ad</p>
<p>Talking about touchdowns, Arch beats his uncles with 19 touchdowns over six starts. Peyton had tallied 13 touchdowns while Eli had 14 TDs. Moreover, all three individuals had a 5-1 collegiate start. As expected, Arch tops the chart again, but this time it’s the interceptions that have got him ranked higher. Over his first six games, he threw five interceptions, while Peyton threw three and Eli registered one interception.</p>
<p>So, does the comparison with his uncles still make a strong case? After the upsetting loss in the Swamp, Outkick’s Austin Perry says, “To his credit, Arch has something in common with his Uncle Peyton with this subpar showing in North Florida,” he wrote. “The former Tennessee quarterback famously went 0-4 against the Gators during his college career, and it’s safe to say he turned out okay, so this isn’t the end of the road for Arch.”</p>',
            'image_path' => 'https://www.staging.essentiallysports.com/wp-content/uploads/imago1067363205-473x315.jpg',
            'original_url' => 'https://www.essentiallysports.com/ncaa-college-football-news-heisman-winner-knows-biggest-culprit-behind-arch-manning-woes-who-failed-qb-six-years-ago/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:23:31',
            'imported_at' => '2025-10-05 23:03:02',
            'meta' => '{"author": "Insiya Johar", "source": "Essentially Sports", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:02',
            'updated_at' => '2025-10-05 23:03:02',
            'deleted_at' => null,
        ],
        [
            'id' => 46,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '2ff27a64b62a01f444cd55df63317bd04703bd09',
            'content_hash' => '87a80c9ad7617f9971cb0cb8f99b114246b54d14e3624e041433e99daccf6670',
            'title' => 'Beachfront home of South Carolina judge, ex-senator burned to ground, injuring 3',
            'slug' => 'httpsnypostcom20251005us-newsbeachfront-home-of-south-carolina-judge-ex-senator-burned-to-ground-injuring-3',
            'excerpt' => 'Ex-senator Arnold Goodstein, along with two additional people, were rescued by several neighbors and paramedics from a marshy, remote area behind the home after jumping from the fist floor.',
            'body' => '<p>An inferno ripped through the waterfront home of a South Carolina judge and her Democratic ex-senator husband on Saturday, leaving three people hospitalized, according to authorities and reports.</p>
<p>Circuit Court Judge Diana Goodstein’s Edisto Beach home went up in flames around midday, sending plumes of black smoke into the air and forcing her husband, former Dem state Sen. Arnold Goodstein, to jump from the first floor to escape the blaze, <a href="https://www.postandcourier.com/news/local_state_news/video-edisto-island-jeremy-cay-home-fire/article_0d9ef52b-5fc7-4ed0-8843-db6939a40144.html">The Post and Courier reported. </a></p>
<p>Arnold Goodstein, along with two additional occupants, were rescued by several neighbors and paramedics from a marshy, remote area behind the three-story home, resident Tom Peterson told the outlet.</p>
<p>The individuals were reached by emergency workers in kayaks,<a href="https://www.facebook.com/stpaulsfire/posts/pfbid02jVXmNugH5eezUdGFrmmxdUys3cHa5YzUAZEjWVQ2SLXGwZEhgHPnGiXmTHfyWGfpl?mibextid=wwXIfr&amp;rdid=8wthV9LG6iLuOFiJ#"> according to the St. Paul’s Fire District.</a></p>
<p>One person was air-evacuated to the Medical University of South Carolina, and the other two occupants, who have not yet been identified, were brought to the Medical University of South Carolina on ground, according to Cpt. KC Campbell with the Colleton County Fire Rescue.</p>
<p>Sources close to Goodstein’s family confirmed Arnold was airlifted after breaking multiple bones in his hips, legs and feet after escaping from the four-bedroom, four-bathroom home, <a href="https://www.fitsnews.com/2025/10/04/sled-investigate-alleged-arson-incident-at-s-c-judges-home/">FitsNews reported. </a></p>
<p>Diana Goodstein, 69, had been walking on a beach with her dogs when the flames swallowed the home in the lush Jeremy Cay private gated community, Peterson told The Post and Courier.</p>
<p>The condition of all three escapees wasn’t immediately known.</p>
<p>South Carolina native Judge Diane Goodstein was elected to her first judgeship in May 1998 and has served continuously ever since, according to her biography. </p>
<p>Her husband, Arnold Goodstein, served in the House and the South Carolina Senate for different terms in the 1970s, according to public records. He was a Democrat representing Charleston County, <a href="https://www.thenerve.org/ex_lawmakers_others_with_legislative_ties_often_shoo_ins_for_s_c_judicial_seats">The Nerve reported.</a></p>
<p>He also led Summerville Homes, a large home-building business that ceased operations in 2008 and filed for $61 million bankruptcy, the outlet said.</p>
<p>The couple shares two children, Arnold Samuel Goodstein II and Eve Schafer Goodstein, according to Diana’s biography page.</p>
<p>The State Law Enforcement Division is actively investigating the incident, though it is not yet clear what caused the large property to burn to the ground, the outlet reported. </p>
<ul aria-labelledby="filed-under">
 <li>
 <a href="https://nypost.com/tag/fires/" rel="tag">
 fires </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/judges/" rel="tag">
 judges </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/senators/" rel="tag">
 senators </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/south-carolina/" rel="tag">
 south carolina </a>
 </li>
 
 <li>
 <a href="https://nypost.com/2025/10/05/">10/5/25</a> </li>
 </ul>
<ul>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/trump-defies-federal-court-sends-300-california-national-guard-troops-to-portland-oregon/">
 </a>
 
 
 This story has been shared 33,196 times.
 33,196
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/trump-defies-federal-court-sends-300-california-national-guard-troops-to-portland-oregon/">
 Trump sends National Guard troops to Oregon, defying fed court </a>
 </h3>
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/inside-howard-rubins-perverted-chamber-of-secrets-at-penthouse-just-below-central-park/">
 </a>
 
 
 This story has been shared 19,470 times.
 19,470
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/inside-howard-rubins-perverted-chamber-of-secrets-at-penthouse-just-below-central-park/">
 Inside Howard Rubin\'s perverted NYC penthouse with a \'built-in\' sex dungeon where he allegedly tortured dozens of women </a>
 </h3>
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/2-killed-14-injured-in-montgomery-ala-mass-shooting-after-football-game/">
 </a>
 
 
 This story has been shared 17,449 times.
 17,449
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/2-killed-14-injured-in-montgomery-ala-mass-shooting-after-football-game/">
 2 killed, 12 wounded in Montgomery, Ala., mass shooting after gunmen spray bullets into downtown crowd </a>
 </h3>
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/zohran-mamdani-flashes-beaming-smile-in-pic-with-uganda-bigwig-who-pushed-law-to-put-gay-people-in-jail-for-life/">
 </a>
 
 
 This story has been shared 12,767 times.
 12,767
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/zohran-mamdani-flashes-beaming-smile-in-pic-with-uganda-bigwig-who-pushed-law-to-put-gay-people-in-jail-for-life/">
 Mamdani flashes beaming smile in pic with Uganda bigwig who pushed law to jail gay people for life </a>
 </h3>
 
 </li>
 </ul>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/trump-defies-federal-court-sends-300-california-national-guard-troops-to-portland-oregon/">
 Trump sends National Guard troops to Oregon, defying fed court </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/inside-howard-rubins-perverted-chamber-of-secrets-at-penthouse-just-below-central-park/">
 Inside Howard Rubin\'s perverted NYC penthouse with a \'built-in\' sex dungeon where he allegedly tortured dozens of women </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/2-killed-14-injured-in-montgomery-ala-mass-shooting-after-football-game/">
 2 killed, 12 wounded in Montgomery, Ala., mass shooting after gunmen spray bullets into downtown crowd </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/zohran-mamdani-flashes-beaming-smile-in-pic-with-uganda-bigwig-who-pushed-law-to-put-gay-people-in-jail-for-life/">
 Mamdani flashes beaming smile in pic with Uganda bigwig who pushed law to jail gay people for life </a>
 </h3>
<ul>
 <li>
 
 
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 
 </a>
 
 
 
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 
 This story has 2.1K comments. 
 
 2.1K 
 </a>
 

 <h3>
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 Trump considering $2,000 tariff ‘dividend’ for Americans </a>
 </h3>
 </li>
 <li>
 
 
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 
 </a>
 
 
 
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 
 This story has 2K comments. 
 
 2K 
 </a>
 

 <h3>
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 Danica Patrick goes off on NFL for Bad Bunny Super Bowl halftime show </a>
 </h3>
 </li>
 <li>
 
 
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 
 </a>
 
 
 
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 
 This story has 1.8K comments. 
 
 1.8K 
 </a>
 

 <h3>
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 US boat strike kills 4 alleged \'narco-terrorists\' off Venezuela, Pete Hegseth says </a>
 </h3>
 </li>
 </ul>
<h3>
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 Trump considering $2,000 tariff ‘dividend’ for Americans </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 Danica Patrick goes off on NFL for Bad Bunny Super Bowl halftime show </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 US boat strike kills 4 alleged \'narco-terrorists\' off Venezuela, Pete Hegseth says </a>
 </h3>
<p>
<a href="https://podcasts.apple.com/us/podcast/ny-postcast/id1820479072" target="_blank" rel="noopener"></a>

</p>
<h2 tabindex="0">
 Now on
 Page Six
 </h2>
<ul>
 <li>
 
 <a href="https://pagesix.com/2025/10/05/entertainment/donna-kelce-shows-love-to-taylor-swifts-life-of-a-showgirl-in-travis-birthday-tribute/" tabindex="-1">
 
 </a>
 
 <h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/donna-kelce-shows-love-to-taylor-swifts-life-of-a-showgirl-in-travis-birthday-tribute/">
 Donna Kelce shows love to Taylor Swift’s ‘Life of a Showgirl’ album in birthday tribute for Travis </a>
 </h3>
 </li>
 <li>
 <h3>
 <a href="https://pagesix.com/2025/10/05/style/lauren-sanchez-and-georgina-rodriguez-put-multimillion-dollar-rings-on-display-at-balenciaga-fashion-show/">
 Lauren Sánchez and Georgina Rodríguez put multimillion-dollar rings on display at Balenciaga fashion show </a>
 </h3>
 </li>
 <li>
 <h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/how-to-watch-rhop-season-10-premiere-for-free-time-cast/">
 How to watch ‘Real Housewives of Potomac’ Season 10 for free: Time, Cast </a>
 </h3>
 </li>
 </ul>
<h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/donna-kelce-shows-love-to-taylor-swifts-life-of-a-showgirl-in-travis-birthday-tribute/">
 Donna Kelce shows love to Taylor Swift’s ‘Life of a Showgirl’ album in birthday tribute for Travis </a>
 </h3>
<h3>
 <a href="https://pagesix.com/2025/10/05/style/lauren-sanchez-and-georgina-rodriguez-put-multimillion-dollar-rings-on-display-at-balenciaga-fashion-show/">
 Lauren Sánchez and Georgina Rodríguez put multimillion-dollar rings on display at Balenciaga fashion show </a>
 </h3>
<h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/how-to-watch-rhop-season-10-premiere-for-free-time-cast/">
 How to watch ‘Real Housewives of Potomac’ Season 10 for free: Time, Cast </a>
 </h3>
<ul>
 
 <li>
 
 <a href="https://nypost.com/video/shutdown-shakedown-dems-hold-dc-hostage-red-hot-takes/">
 </a>
 
 <h3>
 <a href="https://nypost.com/video/shutdown-shakedown-dems-hold-dc-hostage-red-hot-takes/">
 Shutdown Shakedown: Dems hold DC hostage | Red Hot Takes </a>
 </h3>
 </li>

 </ul>
<h3>
 <a href="https://nypost.com/video/shutdown-shakedown-dems-hold-dc-hostage-red-hot-takes/">
 Shutdown Shakedown: Dems hold DC hostage | Red Hot Takes </a>
 </h3>
<h2 tabindex="0">
 
 Now on Decider
 
 </h2>
<ul>
 <li>
 
 <a href="https://decider.com/2025/10/04/did-ed-gein-really-kill-his-brother-everything-we-know-about-the-real-life-incident/" tabindex="-1">
 
 </a>
 
 <h3>
 <a href="https://decider.com/2025/10/04/did-ed-gein-really-kill-his-brother-everything-we-know-about-the-real-life-incident/">
 Did Ed Gein Really Kill His Brother? Everything We Know About The Real Life Incident </a>
 </h3>
 </li>
 <li>
 <a href="https://decider.com/2025/10/03/patricia-routledge-dead/">
 R.I.P. Patricia Routledge: ‘Keeping Up Appearances’ Star Dead At 96 </a>
 </li>
 <li>
 <a href="https://decider.com/2025/10/01/chad-powers-brittney-rae-hawk-tuah-crash-out/">
 “THEY REPLACED ME WITH HAWK TUAH!” Comedian Brittney Rae Crashes Out After Claiming She’s Been Cut From ‘Chad Powers’ </a>
 </li>
 <li>
 <a href="https://decider.com/2025/10/01/whoopi-goldberg-f-bomb-trump-view/">
 Whoopi Goldberg Nearly Drops F-Bomb During Heated Rant About Trump On ‘The View’ </a>
 </li>
 </ul>
<h3>
 <a href="https://decider.com/2025/10/04/did-ed-gein-really-kill-his-brother-everything-we-know-about-the-real-life-incident/">
 Did Ed Gein Really Kill His Brother? Everything We Know About The Real Life Incident </a>
 </h3>
<h2>
 <a href="https://nypost.com/covers/">
 Covers </a>
 </h2>
<h3>
 Today\'s Cover </h3>
<h3>
 <a href="https://nypost.com/covers/">
 Browse Covers 
 </a></h3>',
            'image_path' => 'https://nypost.com/wp-content%2Fuploads%2Fsites%2F2%2F2025%2F10%2FUntitled-1-33.jpg?quality%3D90%26strip%3Dall',
            'original_url' => 'https://nypost.com/2025/10/05/us-news/beachfront-home-of-south-carolina-judge-ex-senator-burned-to-ground-injuring-3/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:23:23',
            'imported_at' => '2025-10-05 23:03:02',
            'meta' => '{"author": "Zoe Hussain", "source": "New York Post", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:02',
            'updated_at' => '2025-10-05 23:03:02',
            'deleted_at' => null,
        ],
        [
            'id' => 47,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '7088b5fdbb420dc87eef064ceb11215bfa79df6d',
            'content_hash' => 'eac717a1352a9e616acdb67c1669da708bb8df52509f52f7341ce9b4e09020e3',
            'title' => 'Where is David Montgomery from? Hometown, high school and more to know about Lions RB\'s Cincinnati roots',
            'slug' => 'httpswwwsportingnewscomusnfldetroit-lionsnewsdavid-montgomery-hometown-high-school-lions-cincinnatic4f9fab30c09043c2f8153ae',
            'excerpt' => 'Now a veteran running back in Detroit, David Montgomery came up as a quarterback in the Cincinnati area.',
            'body' => '<p>Daniel Mader</p>
<p>David Montgomery has carved out a role as one of the NFL\'s most reliable running backs, especially in short-distance situations. From his early years with the <a href="https://www.sportingnews.com/us/nfl/chicago-bears">Chicago Bears</a>, to his key role in the <a href="https://www.sportingnews.com/us/nfl/detroit-lions">Detroit Lions</a>\' run-heavy system, Montgomery has proven himself as a strong weapon.</p>
<p>However, he wasn\'t always a running back -- and Montgomery came up in a different part of the mid-west. </p>
<p>Formerly known as a star dual-threat quarterback, Montgomery grew up in <a href="https://www.sportingnews.com/us/nfl/cincinnati-bengals">Cincinnati Bengals</a> territory before emerging as an All-American running back.</p>
<p>Here\'s what to know about Montgomery\'s roots, from his hometown to his high school stats.</p>
<p><strong>MORE:</strong> <a target href="https://www.sportingnews.com/us/nfl/news/amon-ra-st-brown-family-tree-dad-john-brother-equanimeous/b49b069c20af4232b5a5c2a8">Amon-Ra St. Brown\'s full family tree</a></p>
<h2>Where is David Montgomery from?</h2>
<p>Montgomery grew up around Cincinnati, Ohio. He became a standout quarterback, but a running back prospect, as he came up in high school.</p>
<p>In Week 5 of the 2025 NFL season, Montgomery\'s Lions paid a visit to the Bengals, which was a homecoming for the running back. Ahead of that game, Montgomery shared that it was also special for him because his sister could come watch him play after a car accident left her paralyzed the prior year.</p>
<p>“I think this is really special for me because my sister gets to come to the game,” Montgomery said, <a target="_blank" href="https://www.prideofdetroit.com/detroit-lions-news/143998/david-montgomery-cincinnati-bengals-game-sister-video">via Pride of Detroit</a>. “Almost a year ago—maybe a year and a half—on Valentine’s Day, my sister got in a really bad car accident. Now she’s paralyzed from the neck down. She, obviously, can’t move, but this will be the first game that my sister can actually see me play with her own eyes. So I’m super, super excited about that, and I’m just happy that she’ll be able to be there.”</p>
<p>The game marked Montgomery\'s first time playing an NFL game at the Bengals, his home territory.</p>
<p>“I think it’s just going to be a rush of emotions,” Montgomery said, per Pride of Detroit. “I have never played in Cincinnati since leaving Cincinnati, which will be cool. Playing against the team that, when I grew up, that was the team, was like <em>my team.</em> That was a hometown kid. A bunch of my family members are coming.”</p>
<p>Fox highlighted Montgomery\'s return to Cincinnati ahead of the game as well, with the running back sharing details of his upbringing.</p>
<blockquote><p dir="ltr" lang="en">"For Montgomery, football became passion, and path... Even as the streets around him continued to take those close to him."<br><br>Tom Rinaldi shares the story of <a target="_blank" href="https://twitter.com/Lions?ref_src=twsrc%5Etfw">@Lions</a> RB David Montgomery: <a target="_blank" href="https://t.co/D9zizIqSoL">pic.twitter.com/D9zizIqSoL</a></p>— FOX Sports: NFL (@NFLonFOX) <a target="_blank" href="https://twitter.com/NFLonFOX/status/1974862962209738797?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">"For Montgomery, football became passion, and path... Even as the streets around him continued to take those close to him."<br><br>Tom Rinaldi shares the story of <a target="_blank" href="https://twitter.com/Lions?ref_src=twsrc%5Etfw">@Lions</a> RB David Montgomery: <a target="_blank" href="https://t.co/D9zizIqSoL">pic.twitter.com/D9zizIqSoL</a></p>
<p>Montgomery was also seen spending time with his mother and sister pregame:</p>
<blockquote><p dir="ltr" lang="en">An emotional homecoming for David Montgomery ❤️ <a target="_blank" href="https://t.co/TWFbK74vKP">pic.twitter.com/TWFbK74vKP</a></p>— NFL (@NFL) <a target="_blank" href="https://twitter.com/NFL/status/1974947772601127197?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">An emotional homecoming for David Montgomery ❤️ <a target="_blank" href="https://t.co/TWFbK74vKP">pic.twitter.com/TWFbK74vKP</a></p>
<p>In an emotional homecoming game, Montgomery wound up throwing a rare touchdown pass to Brock Wright, then rushing for another to extend Detroit\'s lead. His sister was seen celebrating the scores:</p>
<blockquote><p dir="ltr" lang="en">You gotta love it!<br><br>In his return to his hometown where he played some QB in high school, Lions RB David Montgomery throws a TD pass!<br><br>📺: FOX <a target="_blank" href="https://t.co/BiIp17hdvX">pic.twitter.com/BiIp17hdvX</a></p>— FOX Sports: NFL (@NFLonFOX) <a target="_blank" href="https://twitter.com/NFLonFOX/status/1974946295585689749?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">You gotta love it!<br><br>In his return to his hometown where he played some QB in high school, Lions RB David Montgomery throws a TD pass!<br><br>📺: FOX <a target="_blank" href="https://t.co/BiIp17hdvX">pic.twitter.com/BiIp17hdvX</a></p>
<blockquote><p dir="ltr" lang="en">David Montgomery can pass AND he can run 😅<br><br>DETvsCIN on FOX/FOX One<a target="_blank" href="https://t.co/HkKw7uXVnt">https://t.co/HkKw7uXVnt</a> <a target="_blank" href="https://t.co/oiqXPGhbnd">pic.twitter.com/oiqXPGhbnd</a></p>— NFL (@NFL) <a target="_blank" href="https://twitter.com/NFL/status/1974963789318783298?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">David Montgomery can pass AND he can run 😅<br><br>DETvsCIN on FOX/FOX One<a target="_blank" href="https://t.co/HkKw7uXVnt">https://t.co/HkKw7uXVnt</a> <a target="_blank" href="https://t.co/oiqXPGhbnd">pic.twitter.com/oiqXPGhbnd</a></p>
<blockquote><p dir="ltr" lang="en">David Montgomery\'s sister celebrating his TD ❤️<br><br>DETvsCIN on FOX/FOX One<a target="_blank" href="https://t.co/HkKw7uXVnt">https://t.co/HkKw7uXVnt</a> <a target="_blank" href="https://t.co/BcNtIbd0zH">pic.twitter.com/BcNtIbd0zH</a></p>— NFL (@NFL) <a target="_blank" href="https://twitter.com/NFL/status/1974964075110224209?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">David Montgomery\'s sister celebrating his TD ❤️<br><br>DETvsCIN on FOX/FOX One<a target="_blank" href="https://t.co/HkKw7uXVnt">https://t.co/HkKw7uXVnt</a> <a target="_blank" href="https://t.co/BcNtIbd0zH">pic.twitter.com/BcNtIbd0zH</a></p>
<p><strong>MORE:</strong> <a target href="https://www.sportingnews.com/us/nfl/news/most-nfl-draft-picks-school-one-year-biggest-classes/e7ee3ead9e2e82b9b81a6d21">Most NFL Draft picks by a school in one year</a></p>
<h2>David Montgomery high school</h2>
<p>David Montgomery attended Mt. Healthy Jr./Sr. High School in Cincinnati. During his time with the Fighting Owls, Montgomery became an elite dual-threat quarterback, named the 2015 Division III Ohio Player of the Year and Southwest District Offensive Player of the Year.</p>
<p>However, Montgomery wasn\'t a highly recruited prospect, with <a target="_blank" href="https://247sports.com/player/david-montgomery-81552/">247Sports</a> giving him a three-star rating as the 38th-best player in Ohio.</p>
<p></p>
<p><strong>MORE: </strong><a target href="https://www.sportingnews.com/us/nfl/news/christian-mccaffrey-injury-history-timeline-health/75db98daf532d9894d50da03">Breaking down Christian McCaffrey\'s full injury history</a></p>
<h2>David Montgomery high school stats</h2>
<p>Montgomery rushed for a total of 6,666 yards and 91 touchdowns in his four-year high school career. His 2,707 yards in 2015 were the 21st-best single-season total in Ohio prep history, also with tallied 41 rushing TDs and 10.1 yards per carry that year, <a target="_blank" href="https://cyclones.com/sports/football/roster/david-montgomery/9797">per Iowa State.</a> In his senior year, Montgomery also had 726 yards and seven touchdowns through the air as his team finished 8-4.</p>
<p>As a junior, Montgomery posted 1,951 yards and 22 touchdowns on the ground, with 836 yards and seven touchdowns through the air, <a target="_blank" href="https://cyclones.com/sports/football/roster/david-montgomery/9797">per Iowa State.</a> In his sophomore year, he rushed for 1,783 yards and 22 touchdowns with 685 yards passing and an additional 11 touchdowns. </p>
<p>Given his prowess as a runner, Montgomery eventually became a running back prospect, which led him to the NFL.</p>
<p><strong>MORE NFL NEWS:</strong> </p>
<ul><li><a target href="https://www.sportingnews.com/us/nfl/news/what-catch-nfl-explaining-definition-changes-controversy/fa15ddeb882b352f67d8c202">What is a catch in the NFL? Explaining NFL\'s controversial rule</a></li><li><a target href="https://www.sportingnews.com/us/nfl/news/nfl-personal-conduct-policy-rules-suspensions-discipline/f770e46aeb7257db0244846c">Everything to know about the NFL\'s personal conduct policy</a></li><li><a target href="https://www.sportingnews.com/us/nfl/news/nfl-kickoff-rules-changes-penalties-player-safety/266900f4d9d5569554c24b11">What to know about 2025 kickoff rule changes, penalties, player safety and more</a></li><li><a target href="https://www.sportingnews.com/us/nfl/news/nfl-virtual-measurement-system-hawk-eye-tech-first-downs/66ff04c6deac3fe37a919f31">How new virtual measurement system impacts first downs</a></li><li><a target href="https://www.sportingnews.com/us/nfl/news/nfl-unsportsmanlike-conduct-penalties-fines-ejections/adff99d2f6ca67ec783ac462">Full guide to NFL\'s unsportsmanlike conduct penalty</a></li></ul>
<h2>Where did David Montgomery go to college?</h2>
<p>Montgomery committed to Iowa State, where he spent his entire collegiate career. He played for the Cyclones from 2016-18.</p>
<p>After leading the team in rushing yards as a freshman, Montgomery broke out in 2017. Following his standout sophomore and junior seasons, Montgomery took his talents to the NFL, becoming a third-round pick by the Bears.</p>
<p>Over his Iowa State career, Montgomery was a two-time First-Team All-American and two-time First-Team All-Big 12 selection.</p>
<p><strong>MORE:</strong> <a target href="https://www.sportingnews.com/us/nfl/news/most-shocking-nfl-draft-slides-aaron-rodgers-laremy-tunsil/62f357e90c67977257af61f0">The 10 most shocking NFL Draft slides of all time</a></p>
<h2>David Montgomery college stats</h2>
<p>Here\'s a look at Montgomery\'s numbers over three seasons at Iowa State:</p>
<h3>
 Daniel Mader
 </h3>
<p>Daniel Mader is a Content Producer for The Sporting News. He joined SN in 2024 as an editorial intern following graduation from Penn State University. He has previously written for Sports Illustrated, NBC Sports, the Centre Daily Times, the Pittsburgh Post-Gazette, The Daily Collegian and LancasterOnline. Daniel grew up in Lancaster, Penn., with a love for baseball that’ll never fade, but could also talk basketball or football for days.</p>',
            'image_path' => 'https://library.sportingnews.com/styles/crop_style_16_9_desktop_webp/s3/2025-10/GettyImages-2237785747.jpg.webp?itok=l8jgt7R4',
            'original_url' => 'https://www.sportingnews.com/us/nfl/detroit-lions/news/david-montgomery-hometown-high-school-lions-cincinnati/c4f9fab30c09043c2f8153ae',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:23:19',
            'imported_at' => '2025-10-05 23:03:04',
            'meta' => '{"author": "Daniel Mader", "source": "Sporting News", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:04',
            'updated_at' => '2025-10-05 23:03:04',
            'deleted_at' => null,
        ],
        [
            'id' => 48,
            'category_id' => 2,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '5f827bb8128f5cdb89ba539063caa057bbf4d9e0',
            'content_hash' => '2d727b65b4ffb0d8f4ba0827ecd945abbe1e3e6636a3bfd7a9fde47278830d7f',
            'title' => 'Kyler Murray injury update: Latest news on Cardinals QB\'s status in Week 5 game',
            'slug' => 'httpswwwsportingnewscomusnflarizona-cardinalsnewskyler-murray-injury-update-latest-news-cardinals-status-week-5-gameeba9500626d12ff7384892e5',
            'excerpt' => 'Arizona Cardinals quarterback Kyler Murray is dealing with an injury in the third quarter of the Week 5 game against the Tennessee Titans. Follow our tracker for all of the latest updates on Murray.',
            'body' => '<p>Mike Moraitis</p>
<p>© Joe Rondone/The Republic / USA TODAY NETWORK via Imagn Images</p>
<p>The <a href="https://www.sportingnews.com/us/nfl/arizona-cardinals">Arizona Cardinals</a> have an injury concern with quarterback Kyler Murray in the Week 5 game against the <a href="https://www.sportingnews.com/us/nfl/tennessee-titans">Tennessee Titans</a>.</p>
<p>Murray suffered the injury in the third quarter of the game against the Titans. He was replaced by backup Jacoby Brissett upon exiting the contest.</p>
<p>Follow along below for all of the latest updates on Murray\'s status for the rest of the game on Sunday.</p>
<h2>Kyler Murray injury update</h2>
<p><strong>UPDATE:</strong> Murray has officially returned to the game.</p>
<blockquote><p dir="ltr" lang="en">Kyler Murray now has returned to the game. <a target="_blank" href="https://t.co/LjzD3hzYbW">https://t.co/LjzD3hzYbW</a></p>— Adam Schefter (@AdamSchefter) <a target="_blank" href="https://twitter.com/AdamSchefter/status/1974964422629335175?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">Kyler Murray now has returned to the game. <a target="_blank" href="https://t.co/LjzD3hzYbW">https://t.co/LjzD3hzYbW</a></p>
<p><strong>END OF UPDATE</strong></p>
<p><strong>UPDATE:</strong> Murray is back out on the sideline, so it looks like he might return.</p>
<blockquote><p dir="ltr" lang="en">Kyler Murray coming back out to the sideline</p>— Bo Brack (@BoBrack) <a target="_blank" href="https://twitter.com/BoBrack/status/1974963666069180468?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">Kyler Murray coming back out to the sideline</p>
<p><strong>END OF</strong> UPDATE</p>
<p>The team has announced that Murray is questionable to return with a foot injury. He has also gone back to the locker room, which is not a good sign for his status.</p>
<blockquote><p dir="ltr" lang="en">Kyler Murray is questionable to return today due to a foot injury. <a target="_blank" href="https://t.co/IPh2PtKa17">https://t.co/IPh2PtKa17</a></p>— Adam Schefter (@AdamSchefter) <a target="_blank" href="https://twitter.com/AdamSchefter/status/1974962759713566754?ref_src=twsrc%5Etfw">October 5, 2025</a></blockquote>
<p dir="ltr" lang="en">Kyler Murray is questionable to return today due to a foot injury. <a target="_blank" href="https://t.co/IPh2PtKa17">https://t.co/IPh2PtKa17</a></p>
<p>We\'ll update this article once more information becomes available.</p>
<h2>More NFL News</h2>
<ul><li><a target href="https://www.sportingnews.com/us/nfl/philadelphia-eagles/news/aj-brown-best-defender-eagles-last-second-hail-mary-vs-broncos/79e7d945150d119bf4d45187">A.J. Brown was the best defender on Eagles\' Hail Mary pass</a></li><li><a target href="https://www.sportingnews.com/us/nfl/san-francisco-49ers/news/kyle-van-noy-invokes-49ers-reaction-latest-embarrassing-loss-ravens/57735abc902b15b0fe8690e8">Kyle Van Noy invokes 49ers after latest brutal loss for Ravens</a></li><li><a target href="https://www.sportingnews.com/us/nfl/dallas-cowboys/news/rico-dowdle-sends-clear-message-cowboys-200-yard-performance/d405a6dc1730de93e6a1dfb6">Rico Dowdle sends clear message to Cowboys after 200-yard game</a></li><li><a target href="https://www.sportingnews.com/us/nfl/baltimore-ravens/news/how-long-lamar-jackson-out-injury-update-baltimore-ravens-quarterback/3e33b793c4c86f211c422ff6">How long is Lamar Jackson out? Latest injury update on Ravens QB</a></li><li><a target href="https://www.sportingnews.com/us/nfl/las-vegas-raiders/news/brock-bowers-injury-update-nfl-insider-details-raiders-knee-issue/fbd4217684a86f70cf0ef413">NFL insider offers more details on Brock Bowers\' knee injury</a></li><li><a target href="https://www.sportingnews.com/us/nfl/dallas-cowboys/news/will-ceedee-lamb-return-next-week-injury-update-dallas-cowboys-superstar/b58b7adc8c23ce30d335b924">Will CeeDee Lamb be back next week? Latest update on Cowboys WR</a></li></ul>
<h3>
 Mike Moraitis
 </h3>
<p>Mike Moraitis is a freelance writer who covers the NFL for the Sporting News. Over his nearly two decades covering sports, Mike has also worked for Bleacher Report, USA TODAY and FanSided. He hates writing in the third person.</p>',
            'image_path' => 'https://library.sportingnews.com/styles/crop_style_16_9_desktop_webp/s3/2025-09/USATSI_27168868.jpg.webp?itok=zi8nVzZo',
            'original_url' => 'https://www.sportingnews.com/us/nfl/arizona-cardinals/news/kyler-murray-injury-update-latest-news-cardinals-status-week-5-game/eba9500626d12ff7384892e5',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:23:04',
            'imported_at' => '2025-10-05 23:03:04',
            'meta' => '{"author": "Mike Moraitis", "source": "Sporting News", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:04',
            'updated_at' => '2025-10-05 23:03:04',
            'deleted_at' => null,
        ],
        [
            'id' => 49,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '479d4cd1880de12587befad16a71503a4b34ac3b',
            'content_hash' => 'e0158f46b49e13e80d557be84238f2a11226f9b3e7905406574ac65bd1c4a9e9',
            'title' => 'Weak local responses threaten security gains',
            'slug' => 'httpsbusinessdayngnewsarticleweak-local-responses-threaten-security-gains',
            'excerpt' => 'Nigeria has spent billions on strengthening security agencies and tackling insurgency, but weak responses at local levels are threatening toread more Weak local responses threaten security gains',
            'body' => '<p>Nigeria has spent billions on strengthening security agencies and tackling insurgency, but weak responses at local levels are threatening to undermine those efforts.
</p>
<p>Security agencies have struggled to respond to terrorist attacks on communities as a result of lack of personnel, sabotage and lack of funds.
</p>
<p>Sometimes, villages are raided for hours without security intervention. Analysts say the situation is a recent phenomenon not seen in the 1990s and 2000s.
</p>
<p>Speaking with BusinessDay in Abuja, peace experts and security analysts say while the federal government has recorded significant gains, weak grassroots structures, elite interference, and compromised local authorities continue to leave dangerous gaps in the country’s security architecture.
</p>
<p>As Nigeria marks 65 years of independence, analysts highlighted progress, challenges, and the way forward for sustainable peace.</p>
<p>Sadeeque Abba, professor of Political Economy and Development Studies at the University of Abuja, said Nigeria’s security situation requires urgent collaboration across all tiers of government.
</p>
<p>According to him, while the federal government has made significant efforts in tackling insecurity, state and local governments have failed to play their parts effectively.
</p>
<p>“In security terms, the federal government is doing an excellent job, but the state and local governments are not doing anything.
</p>
<p>“That is why Nigeria is not well secured. Federal government cannot secure the entire nation.
</p>
<p>“It is going to be a collaboration, a partnership between the federal, the state and the local government,” Abba stressed.</p>
<p>The professor noted that local governments, which ought to be the cornerstone of national development and grassroots security, have been weakened by elite interference and state capture.
</p>
<p>He argued that Nigeria must adopt a ‘bottom-up’ security model rather than the current ‘top-down’ approach.
</p>
<p>“If you go to some developed countries like Japan, South Korea, Malaysia, Indonesia, or even Norway and Finland, security is not about top-down, it’s about bottom-up.
</p>
<p>“In Africa, countries like Botswana, Seychelles, Lesotho, Madagascar and Algeria have bottom-up security models.
</p>
<p> “But in Nigeria, security is defined from the point of view of state security and elite security, leaving the grassroots unprotected,” he said.</p>
<p> Abba explained that the disconnect between growing national resources and declining security is one of the contradictions undermining Nigeria’s development.
</p>
<p>“We were far more secure in the 1960s, 70s and 80s than now, even though we have more resources today. The further away from 1960, the less the security, yet the higher the resources. That imbalance is frightening,” he added.
</p>
<p>On her part, Dayo Kusa, former director of the Institute for Peace and Conflict Resolution and a member of the Coordinating Committee on the Forum on Farmer-Herder Relations in Nigeria, described Nigeria as being in’’turmoil’ but urged continuous transformation of conflicts rather than seeking absolute resolutions.
</p>
<p>“The presidency and all involved are doing their very best, but the infestation has gone so far-rooted.
</p>
<p>“We shall continue to prevent conflict in areas not yet prone and transform existing conflicts.</p>
<p>“Resolution is almost like peace of the graveyard, which is unattainable. Transformation is more practical and sustainable,” Kusa explained.
</p>
<p>Also speaking, Olusola Odumosu, commandant, Nigeria Security and Civil Defence Corps (NSCDC) in the Federal Capital Territory, said Nigeria should be grateful for the relative peace it enjoys compared to other parts of the world. 
</p>
<p>“Except we want to be unfair, Nigeria is enjoying relative peace compared to other countries within Africa and across the globe. Sixty-five years is not an easy journey. We may not be where we ought to be, but we’re not where we used to be,” he said.
</p>
<p>Odumosu highlighted the collective efforts of the security community in sustaining peace, noting that the NSCDC works in close collaboration with the Nigerian Police, Armed Forces, and other paramilitary agencies.
</p>
<p>He also pointed to recent security reforms and government policies under the Renewed Hope Agenda, which have strengthened agencies through increased funding, improved welfare, and training.</p>
<p> “Before now, Nigeria was bedevilled with insurgency, violent extremism, and kidnapping. As we speak today, those challenges have reduced drastically.
</p>
<p>“We may not have completely obliterated them, but they are not as menacing as before,” he said. </p>
<ul> <li><a href="https://businessday.ng/politics/article/only-jonathans-enemies-will-want-him-to-join-2027-presidential-race-oshiomhole/?utm_source=auto-read-also&amp;utm_medium=web"> Only Jonathan\'s enemies will want him to join 2027 presidential race - Oshiomhole </a></li><li><a href="https://businessday.ng/uncategorized/article/imisi-wins-bbnaija-season-10s-n150m-prize/?utm_source=auto-read-also&amp;utm_medium=web"> Imisi wins BBNaija season 10\'s N150M prize </a></li><li><a href="https://businessday.ng/news/article/gunmen-kill-abuja-doctor-abduct-three-children-in-kubwa-attack/?utm_source=auto-read-also&amp;utm_medium=web"> Gunmen kill Abuja doctor, abduct three children in Kubwa Attack </a></li> </ul>
<p> On grassroots security, the NSCDC Commandant agreed with experts that community participation remains essential.
</p>
<p> “Peace is everybody’s business. We should not leave peace enforcement and building at the doorstep of security agencies alone. “Intelligence-led policing works best, and we rely on credible information from the people.
</p>
<p>“When you see something, say something. Don’t be indifferent, because it might affect someone close to you,” Odumosu urged.</p>
<p>Checks by BusinessDay Newspapers revealed that Nigeria has in recent years embarked on a series of reforms aimed at strengthening national security, modernising its armed forces and improving the accountability of law enforcement agencies.
</p>
<p>The measures, which range from legislative changes to increased funding and procurement of modern equipment, reflect government efforts to address the country’s complex security challenges while balancing concerns about human rights, governance and accountability.
</p>
<p>A step in this direction was the signing of the Nigeria Police Act in 2020, which repealed the outdated 2004 law.
</p>
<p> The new legislation emphasises accountability, respect for human rights and the need for community policing as a foundation for effective law enforcement.
</p>
<p> However, while the Act provided a clear legal framework, observers note that its implementation has been slow, with limited impact so far on police culture, training and public trust.</p>
<p>Alongside domestic reforms, Nigeria has received international support for strengthening police accountability and transformation.
</p>
<p>In 2024, the United Nations Development Programme launched the Supporting Police Accountability and Transformation (SPAAT) project, the third phase of a long-running initiative to improve professionalism in the Nigeria Police Force.
</p>
<p>The project, which runs until December 2025, is designed to deepen reforms in police leadership, governance and community engagement, complementing government policies on institutional change.
</p>
<p>Funding for security has also risen sharply, as defence and security received one of the largest allocations in the 2025 federal budget, with about N4.9 trillion set aside for personnel, operations and capital projects.
</p>
<p> This represents around 13 percent of total government spending, according to budget analysis by BudgIT. The allocation continues a trend that began in 2024, when security already commanded one of the highest shares of national expenditure.</p>
<p>The spending has been matched by significant procurement and modernisation moves. In October 2024, the Federal Executive Council (FEC) approved borrowing of over $600 million to acquire M-346 fighter jets, part of a plan to boost the Nigerian Air Force’s capacity for counter-insurgency and border security.
</p>
<p>Earlier this year, the United States approved a potential $346 million arms sale to Nigeria, covering rockets and munitions, although the deal is still subject to congressional approval in Washington.
</p>
<p>These acquisitions are expected to bolster ongoing military campaigns, including operations against oil theft in the Niger Delta and counter-terrorism missions in the North-East.
</p>
<p>Beyond the military front, Nigeria’s leaders are grappling with an increasingly urgent debate over the creation of state police. Advocates argue that devolving policing powers to state governments will bring law enforcement closer to communities and help tackle insecurity more effectively.
</p>
<p> Opponents, however, fear the arrangement could be politicised and abused by state governors.</p>
<p>The debate has gained momentum in 2024 and 2025, with public hearings and legislative proposals sparking both support and resistance, but no final decision has been reached.
</p>
<p>Despite these reforms and investments, concerns persist about accountability and respect for human rights.
</p>
<p>Rights groups point out that abuses linked to security operations remain common, undermining public trust and raising doubts about the effectiveness of reforms.
</p>
<p>Analysts also warn that without stronger intelligence-sharing, multi-agency coordination and robust oversight, rising budgets and new equipment may not translate into improved security outcomes.
</p>
<p>The government, however, insists that reforms are moving in the right direction, pointing to renewed strategies on counter-insurgency, greater emphasis on community policing, and operational successes against criminal networks as signs of progress.</p>
<p> International partners also continue to express support, highlighting Nigeria’s willingness to tackle long-standing gaps in its security architecture.
</p>
<p> Experts caution that the true measure of these reforms will hinge on whether legislative intent, international backing, and security spending can be effectively translated into real improvements in public safety and citizens’ trust.
</p>
<p>The balancing act between equipping security forces, respecting human rights, and building public confidence will likely define the next phase of Nigeria’s security sector transformation.
 
 </p>
<p> Join BusinessDay whatsapp Channel, to stay up to date </p>
<p></p>
<h2><a href="https://businessday.ng/news/article/radda-bags-nut-excellence-award-for-education-lists-achievements/"> Radda bags NUT Excellence Award for Education, lists achievements </a></h2>
<h2><a href="https://businessday.ng/news/article/lagos-licenses-new-electricity-distribution-firms-to-replace-eko-ikeja-discos/"> Lagos licenses new electricity distribution firms to replace Eko, Ikeja DisCos </a></h2>
<h2><a href="https://businessday.ng/news/article/gunmen-kill-abuja-doctor-abduct-three-children-in-kubwa-attack/"> Gunmen kill Abuja doctor, abduct three children in Kubwa Attack </a></h2>',
            'image_path' => null,
            'original_url' => 'https://businessday.ng/news/article/weak-local-responses-threaten-security-gains/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:22:37',
            'imported_at' => '2025-10-05 23:03:05',
            'meta' => '{"author": "Ojochenemi Onje", "source": "businessdayonline", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:05',
            'updated_at' => '2025-10-05 23:03:05',
            'deleted_at' => null,
        ],
        [
            'id' => 50,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '492128806161596a58abec77c334acf7ec3f800b',
            'content_hash' => 'cfaa1d43f2e5535e4a89c6223667ef676d7528151a4a4fafc23ae07587150c44',
            'title' => 'College student burned alive after Tesla Cybertruck doors malfunctioned, trapped her inside following crash: suit',
            'slug' => 'httpsnypostcom20251005us-newstesla-cybertruck-door-issue-saw-california-teen-burned-alive-suit',
            'excerpt' => '"It\'s just a horror story. Tesla knows that it\'s happened, ... and they are doing nothing but selling the car with a system that entraps people and doesn\'t provide a way of extraction."',
            'body' => '<p>A California college student was burned alive when her ride, a Tesla Cybertruck, became a deathtrap — locking her and pals inside after the vehicle crashed and went up in flames, according to a pair of recent lawsuits. </p>
<p>Three college students, including 19-year-old Krysta Tsukahara, were killed in the early-morning crash last November when their electronic vehicle burst into flames after striking a retaining wall and a tree in Piedmont, Calif.</p>
<p>The Cybertruck driver, Soren Dixon, 19, and passenger Jack Nelson, 20, also died in the fiery Nov. 27 crash. A fourth passenger, Jordan Miller, was able to escape after an onlooker smashed the windscreen with a tree branch.</p>
<p>But Tsukahara reportedly survived the initial crash and was fully conscious, but couldn’t escape the burning vehicle after the Cybertruck lost power, causing its electronic door release system to fail, according to a lawsuit filed by parents Carl and Noelle Tsukahara and <a href="https://www.sfchronicle.com/bayarea/article/tesla-sued-parents-say-cybertruck-trapped-21081738.php" target="_blank" rel="noreferrer noopener">seen by the San Francisco Chronicle</a>.</p>
<p>The teen died of smoke inhalation and burns after onlookers were unable to pull her and the other occupants from the truck, according to the lawsuit, which also sought damages from Dixon’s estate and that of the vehicle’s owner.</p>
<p>Tesla doors are powered by a 12-volt battery, which can fail if the vehicle loses power during a crash, and the emergency manual interior door release is notoriously difficult to find, according to the lawsuit, which was filed in Alameda County Superior Court.</p>
<p>“It’s just a horror story. Tesla knows that it’s happened and that it’s going to happen, and they are doing nothing but selling the car with a system that entraps people and doesn’t provide a way of extraction,” the family attorney Roger Dreyer told the Chronicle.</p>
<p>The lawsuit includes more than 30 examples of publicized alleged problems with Tesla’s door systems and accuses the Elon Musk-owned company of showing a “conscious disregard” for consumer safety, having known about the issue for years.</p>
<p>Tesla’s high-tech handleless door design, which opens and shuts at the push of a button, made it susceptible to failure in the result of a crash and “lacked a functional, accessible, and conspicuous manual door release mechanism [or] fail-safe,” according to the lawsuit.</p>
<p>Tesla — which was added to the Tsukaharas’ lawsuit on Thursday — did not respond immediately to requests for comment.</p>
<p>Nelson’s parents, Todd and Stannye, filed their own lawsuit on Thursday, also suing Tesla.</p>
<p>Both wrongful death suits are seeking unspecified punitive damages against the electric vehicle giant.</p>
<p>All four victims had cocaine, alcohol and other substances in their systems at the time, and impaired driving and speeding were both factors in the crash, the California Highway Patrol previously stated, according to<a href="https://www.sfchronicle.com/bayarea/article/piedmont-crash-cybertruck-autopsy-cocaine-20165665.php" target="_blank" rel="noreferrer noopener"> the San Francisco Chronicle</a>.</p>
<p>But the Tsukaharas’ attorney believes the family still has a “very, very strong case” against Tesla.</p>
<p>“They [Tesla] will want to blame Mr. Dixon, anybody but themselves. But this vehicle absolutely should not have entombed these individuals and my clients’ daughter. It’s our way of holding the wrongdoer accountable and correcting bad conduct,” Dreyer said.</p>
<p>The Cybertruck, which was launched with great fanfare in November 2023, has been plagued since the start, with more than half a dozen recalls and plummeting sales in the past year.</p>
<p>In September, it was announced that Tesla was under investigation by the National Highway Traffic Safety Administration after owners of the 2021 Model Y SUVs reported that the doors wouldn’t open, and in some cases, parents were forced to smash the windows to free their children.</p>
<ul aria-labelledby="filed-under">
 <li>
 <a href="https://nypost.com/tag/california/" rel="tag">
 california </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/car-crashes/" rel="tag">
 car crashes </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/deaths/" rel="tag">
 deaths </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/lawsuits/" rel="tag">
 lawsuits </a>
 </li>
 <li>
 <a href="https://nypost.com/tag/tesla/" rel="tag">
 tesla </a>
 </li>
 
 <li>
 <a href="https://nypost.com/2025/10/05/">10/5/25</a> </li>
 </ul>
<ul>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/trump-defies-federal-court-sends-300-california-national-guard-troops-to-portland-oregon/">
 </a>
 
 
 This story has been shared 33,196 times.
 33,196
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/trump-defies-federal-court-sends-300-california-national-guard-troops-to-portland-oregon/">
 Trump sends National Guard troops to Oregon, defying fed court </a>
 </h3>
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/inside-howard-rubins-perverted-chamber-of-secrets-at-penthouse-just-below-central-park/">
 </a>
 
 
 This story has been shared 19,470 times.
 19,470
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/inside-howard-rubins-perverted-chamber-of-secrets-at-penthouse-just-below-central-park/">
 Inside Howard Rubin\'s perverted NYC penthouse with a \'built-in\' sex dungeon where he allegedly tortured dozens of women </a>
 </h3>
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/2-killed-14-injured-in-montgomery-ala-mass-shooting-after-football-game/">
 </a>
 
 
 This story has been shared 17,449 times.
 17,449
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/2-killed-14-injured-in-montgomery-ala-mass-shooting-after-football-game/">
 2 killed, 12 wounded in Montgomery, Ala., mass shooting after gunmen spray bullets into downtown crowd </a>
 </h3>
 
 </li>
 <li>
 
 <a href="https://nypost.com/2025/10/05/us-news/zohran-mamdani-flashes-beaming-smile-in-pic-with-uganda-bigwig-who-pushed-law-to-put-gay-people-in-jail-for-life/">
 </a>
 
 
 This story has been shared 12,767 times.
 12,767
 
 
 
 
 
 <h3>
 <a href="https://nypost.com/2025/10/05/us-news/zohran-mamdani-flashes-beaming-smile-in-pic-with-uganda-bigwig-who-pushed-law-to-put-gay-people-in-jail-for-life/">
 Mamdani flashes beaming smile in pic with Uganda bigwig who pushed law to jail gay people for life </a>
 </h3>
 
 </li>
 </ul>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/trump-defies-federal-court-sends-300-california-national-guard-troops-to-portland-oregon/">
 Trump sends National Guard troops to Oregon, defying fed court </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/inside-howard-rubins-perverted-chamber-of-secrets-at-penthouse-just-below-central-park/">
 Inside Howard Rubin\'s perverted NYC penthouse with a \'built-in\' sex dungeon where he allegedly tortured dozens of women </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/2-killed-14-injured-in-montgomery-ala-mass-shooting-after-football-game/">
 2 killed, 12 wounded in Montgomery, Ala., mass shooting after gunmen spray bullets into downtown crowd </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/05/us-news/zohran-mamdani-flashes-beaming-smile-in-pic-with-uganda-bigwig-who-pushed-law-to-put-gay-people-in-jail-for-life/">
 Mamdani flashes beaming smile in pic with Uganda bigwig who pushed law to jail gay people for life </a>
 </h3>
<ul>
 <li>
 
 
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 
 </a>
 
 
 
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 
 This story has 2.1K comments. 
 
 2.1K 
 </a>
 

 <h3>
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 Trump considering $2,000 tariff ‘dividend’ for Americans </a>
 </h3>
 </li>
 <li>
 
 
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 
 </a>
 
 
 
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 
 This story has 2K comments. 
 
 2K 
 </a>
 

 <h3>
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 Danica Patrick goes off on NFL for Bad Bunny Super Bowl halftime show </a>
 </h3>
 </li>
 <li>
 
 
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 
 </a>
 
 
 
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 
 This story has 1.8K comments. 
 
 1.8K 
 </a>
 

 <h3>
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 US boat strike kills 4 alleged \'narco-terrorists\' off Venezuela, Pete Hegseth says </a>
 </h3>
 </li>
 </ul>
<h3>
 <a href="https://nypost.com/2025/10/02/us-news/trump-considering-2000-tariff-dividend-for-americans/">
 Trump considering $2,000 tariff ‘dividend’ for Americans </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/02/sports/danica-patrick-goes-off-on-nfl-for-bad-bunny-super-bowl-halftime-show/">
 Danica Patrick goes off on NFL for Bad Bunny Super Bowl halftime show </a>
 </h3>
<h3>
 <a href="https://nypost.com/2025/10/03/us-news/us-boat-strike-kills-4-alleged-narco-terrorists-off-venezuela-pete-hegseth-says/">
 US boat strike kills 4 alleged \'narco-terrorists\' off Venezuela, Pete Hegseth says </a>
 </h3>
<p>
<a href="https://podcasts.apple.com/us/podcast/ny-postcast/id1820479072" target="_blank" rel="noopener"></a>

</p>
<h2 tabindex="0">
 Now on
 Page Six
 </h2>
<ul>
 <li>
 
 <a href="https://pagesix.com/2025/10/05/entertainment/donna-kelce-shows-love-to-taylor-swifts-life-of-a-showgirl-in-travis-birthday-tribute/" tabindex="-1">
 
 </a>
 
 <h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/donna-kelce-shows-love-to-taylor-swifts-life-of-a-showgirl-in-travis-birthday-tribute/">
 Donna Kelce shows love to Taylor Swift’s ‘Life of a Showgirl’ album in birthday tribute for Travis </a>
 </h3>
 </li>
 <li>
 <h3>
 <a href="https://pagesix.com/2025/10/05/style/lauren-sanchez-and-georgina-rodriguez-put-multimillion-dollar-rings-on-display-at-balenciaga-fashion-show/">
 Lauren Sánchez and Georgina Rodríguez put multimillion-dollar rings on display at Balenciaga fashion show </a>
 </h3>
 </li>
 <li>
 <h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/how-to-watch-rhop-season-10-premiere-for-free-time-cast/">
 How to watch ‘Real Housewives of Potomac’ Season 10 for free: Time, Cast </a>
 </h3>
 </li>
 </ul>
<h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/donna-kelce-shows-love-to-taylor-swifts-life-of-a-showgirl-in-travis-birthday-tribute/">
 Donna Kelce shows love to Taylor Swift’s ‘Life of a Showgirl’ album in birthday tribute for Travis </a>
 </h3>
<h3>
 <a href="https://pagesix.com/2025/10/05/style/lauren-sanchez-and-georgina-rodriguez-put-multimillion-dollar-rings-on-display-at-balenciaga-fashion-show/">
 Lauren Sánchez and Georgina Rodríguez put multimillion-dollar rings on display at Balenciaga fashion show </a>
 </h3>
<h3>
 <a href="https://pagesix.com/2025/10/05/entertainment/how-to-watch-rhop-season-10-premiere-for-free-time-cast/">
 How to watch ‘Real Housewives of Potomac’ Season 10 for free: Time, Cast </a>
 </h3>
<ul>
 
 <li>
 
 <a href="https://nypost.com/video/shutdown-shakedown-dems-hold-dc-hostage-red-hot-takes/">
 </a>
 
 <h3>
 <a href="https://nypost.com/video/shutdown-shakedown-dems-hold-dc-hostage-red-hot-takes/">
 Shutdown Shakedown: Dems hold DC hostage | Red Hot Takes </a>
 </h3>
 </li>

 </ul>
<h3>
 <a href="https://nypost.com/video/shutdown-shakedown-dems-hold-dc-hostage-red-hot-takes/">
 Shutdown Shakedown: Dems hold DC hostage | Red Hot Takes </a>
 </h3>
<h2 tabindex="0">
 
 Now on Decider
 
 </h2>
<ul>
 <li>
 
 <a href="https://decider.com/2025/10/04/did-ed-gein-really-kill-his-brother-everything-we-know-about-the-real-life-incident/" tabindex="-1">
 
 </a>
 
 <h3>
 <a href="https://decider.com/2025/10/04/did-ed-gein-really-kill-his-brother-everything-we-know-about-the-real-life-incident/">
 Did Ed Gein Really Kill His Brother? Everything We Know About The Real Life Incident </a>
 </h3>
 </li>
 <li>
 <a href="https://decider.com/2025/10/03/patricia-routledge-dead/">
 R.I.P. Patricia Routledge: ‘Keeping Up Appearances’ Star Dead At 96 </a>
 </li>
 <li>
 <a href="https://decider.com/2025/10/01/chad-powers-brittney-rae-hawk-tuah-crash-out/">
 “THEY REPLACED ME WITH HAWK TUAH!” Comedian Brittney Rae Crashes Out After Claiming She’s Been Cut From ‘Chad Powers’ </a>
 </li>
 <li>
 <a href="https://decider.com/2025/10/01/whoopi-goldberg-f-bomb-trump-view/">
 Whoopi Goldberg Nearly Drops F-Bomb During Heated Rant About Trump On ‘The View’ </a>
 </li>
 </ul>
<h3>
 <a href="https://decider.com/2025/10/04/did-ed-gein-really-kill-his-brother-everything-we-know-about-the-real-life-incident/">
 Did Ed Gein Really Kill His Brother? Everything We Know About The Real Life Incident </a>
 </h3>
<h2>
 <a href="https://nypost.com/covers/">
 Covers </a>
 </h2>
<h3>
 Today\'s Cover </h3>
<h3>
 <a href="https://nypost.com/covers/">
 Browse Covers 
 </a></h3>',
            'image_path' => 'https://nypost.com/wp-content%2Fuploads%2Fsites%2F2%2F2025%2F10%2F112862279.jpg?quality%3D90%26strip%3Dall',
            'original_url' => 'https://nypost.com/2025/10/05/us-news/tesla-cybertruck-door-issue-saw-california-teen-burned-alive-suit/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:22:26',
            'imported_at' => '2025-10-05 23:03:06',
            'meta' => '{"author": "Anthony Blair", "source": "New York Post", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:06',
            'updated_at' => '2025-10-05 23:03:06',
            'deleted_at' => null,
        ],
        [
            'id' => 51,
            'category_id' => 1,
            'subcategory_id' => null,
            'external_source_id' => 1,
            'external_id' => '9ca071c6e0c222d150fc9effd45b23dffd555c14',
            'content_hash' => '4350a7b2e5c683e60bd32e18469b10433c0be6a81946b35ba1ec6055866ed5ea',
            'title' => 'Somerton Cocopah FD receives grant from Firehouse Subs Public Safety Foundation',
            'slug' => 'httpskymacomlifestylecommunity20251005somerton-cocopah-fd-receives-grant-from-firehouse-subs-public-safety-foundation',
            'excerpt' => 'The check presentation took place Saturday morning at the Firehouse Subs located on the Big Curve in Yuma, with Somerton Vice Mayor Lorena Delgadillo and two members of the Somerton City Council in attendance.The post Somerton Cocopah FD receives grant from Firehouse Subs Public...',
            'body' => '<h3>
 <a href="https://kyma.com/about-us/news-team/2019/10/30/oswaldo-rivas-anchor/" rel="bookmark">
 Oswaldo Rivas – Anchor </a></h3>',
            'image_path' => null,
            'original_url' => 'https://kyma.com/lifestyle/community/2025/10/05/somerton-cocopah-fd-receives-grant-from-firehouse-subs-public-safety-foundation/',
            'is_published' => 1,
            'published_at' => '2025-10-05 22:22:07',
            'imported_at' => '2025-10-05 23:03:06',
            'meta' => '{"author": "Dillon Fuhrman", "source": "kyma", "provider_slug": "mediastack", "has_full_content": true}',
            'created_at' => '2025-10-05 23:03:06',
            'updated_at' => '2025-10-05 23:03:06',
            'deleted_at' => null,
        ],
    ],
    'site_settings' => [
        [
            'id' => 1,
            'key' => 'branding',
            'value' => '{"logo_text": "Space Editorial", "accent_color": "#4f46e5", "background_color": "#f8fafc"}',
            'deleted_at' => null,
        ],
    ],
    'users' => [
        [
            'id' => 1,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => '2025-09-28 12:21:56',
            'role' => 'admin',
            'password' => '$2y$12$0CroQAGGwl3WbdookV935e0qvr2hjqxjgbb/PExUT9qZ9jQi32MqS',
            'remember_token' => 'aoAhgbfEge',
            'created_at' => '2025-09-28 12:21:56',
            'updated_at' => '2025-09-28 12:21:56',
        ],
    ],
];

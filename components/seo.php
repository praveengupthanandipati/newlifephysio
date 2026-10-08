<?php
/**
 * Per-page SEO: title, description, keywords, robots, social sharing and
 * schema.org structured data. A page picks its entry with $page (see
 * init.php) and head.php prints it.
 *
 * Guidelines used:
 *   - title       <= 60 characters, primary keyword first, brand last
 *   - description <= 160 characters, written to earn the click
 *   - keywords    grouped by search intent:
 *                   local     "… in {city}", "… near me"
 *                   problem   how patients describe it ("back pain doctor")
 *                   condition clinical names + "treatment" / "physiotherapy"
 *                   brand     clinic and doctor names
 *                 Google ignores <meta name="keywords">; Bing and other
 *                 tools still read it. Rankings come from the title,
 *                 description, page content and the structured data below.
 *                 The same lists are a starting point for Google Ads and for
 *                 checking real queries in Search Console.
 *   - robots      defaults to indexable; legal pages are noindex
 *
 * {city} is replaced with $site['address']['city'].
 */

$seoPages = [
    'home' => [
        'title'       => 'Physiotherapy Clinic in {city} | New Life Physiotherapy',
        'description' => 'Physiotherapy in {city} for back & neck pain, sciatica, sports injuries, stroke and child rehab with Dr. Y. Abhilash (PT). Book a free consultation.',
        'keywords'    => [
            // local
            'physiotherapy clinic in {city}', 'physiotherapist in {city}', 'best physiotherapist in {city}',
            'physiotherapy centre {city}', 'physio clinic {city}', 'physiotherapy near me', 'physiotherapist near me',
            'physio near me', 'best physiotherapy clinic near me', 'physiotherapy centre near me',
            'physiotherapy hospital near me', 'physiotherapy clinic open on sunday', 'physiotherapy in {city}',
            // neighbourhood (clinic is in Alkapoor Township, Puppalaguda, Manikonda)
            'physiotherapy clinic in Manikonda', 'physiotherapist in Manikonda', 'physiotherapy in Puppalaguda',
            'physiotherapy near Alkapoor Township', 'physio clinic Manikonda', 'best physiotherapist in Manikonda',
            // problem
            'back pain treatment in {city}', 'neck pain treatment {city}', 'knee pain physiotherapy',
            'shoulder pain treatment', 'joint pain physiotherapy', 'back pain doctor near me',
            'pain relief without surgery', 'body pain treatment near me',
            // condition / service
            'sciatica treatment', 'frozen shoulder treatment', 'sports injury physiotherapy',
            'stroke rehabilitation {city}', 'paralysis physiotherapy', 'neuro physiotherapy {city}',
            'child physiotherapy {city}', 'paediatric physiotherapy', 'post operative physiotherapy',
            'manual therapy {city}', 'laser therapy for pain {city}', 'kinesio taping',
            // brand
            'New Life Physiotherapy Clinic', 'New Life Physiotherapy {city}', 'Dr. Y. Abhilash physiotherapist',
        ],
    ],
    'about' => [
        'title'       => 'About Us | New Life Physiotherapy Clinic, {city}',
        'description' => 'New Life Physiotherapy Clinic, {city}: expert, personalised physiotherapy for adults and children led by Dr. Y. Abhilash (PT), Regd. No. 08928.',
        'keywords'    => [
            // brand
            'about New Life Physiotherapy Clinic', 'New Life Physiotherapy {city}', 'Dr. Y. Abhilash',
            // local
            'physiotherapy clinic {city}', 'physio clinic {city}', 'physiotherapy centre in {city}',
            'registered physiotherapist {city}', 'trusted physiotherapy clinic {city}', 'physiotherapist near me',
            // service
            'adult and child rehabilitation {city}', 'personalised physiotherapy treatment',
            'orthopaedic and neuro physiotherapy', 'physiotherapy clinic open 7 days',
        ],
    ],
    'doctors' => [
        'title'       => 'Dr. Y. Abhilash (PT) | Physiotherapist in {city}',
        'description' => 'Meet Dr. Y. Abhilash (PT), registered physiotherapist (Regd. No. 08928) for back pain, sports injuries, stroke rehab and child therapy in {city}.',
        'keywords'    => [
            // brand
            'Dr. Y. Abhilash', 'Dr. Y. Abhilash physiotherapist', 'Dr. Abhilash physio {city}',
            // local
            'best physiotherapist in {city}', 'physiotherapist near me', 'registered physiotherapist {city}',
            'physiotherapy doctor {city}', 'physio doctor near me', 'experienced physiotherapist {city}',
            // speciality
            'sports physiotherapist {city}', 'neuro physiotherapist {city}', 'paediatric physiotherapist {city}',
            'back pain specialist {city}', 'stroke rehabilitation physiotherapist', 'orthopaedic physiotherapist {city}',
            'manual therapist {city}',
        ],
    ],
    'whychooseus' => [
        'title'       => 'Why Choose Us | New Life Physiotherapy, {city}',
        'description' => 'Registered physiotherapist, root-cause assessment, personalised plans and hands-on care, open 7 days. See why {city} patients choose New Life Physiotherapy.',
        'keywords'    => [
            // local
            'best physiotherapy clinic in {city}', 'top physiotherapy clinic {city}', 'trusted physiotherapist {city}',
            'physiotherapy clinic open on sunday {city}', 'registered physiotherapist near me',
            'hands-on physiotherapy {city}', 'physiotherapy free consultation {city}',
            // intent
            'personalised physiotherapy', 'one to one physiotherapy', 'affordable physiotherapy {city}',
            'physiotherapy with home exercise programme', 'how to choose a physiotherapist',
            // brand
            'why choose New Life Physiotherapy', 'New Life Physiotherapy reviews',
        ],
    ],
    'treatments' => [
        'title'       => 'Conditions We Treat | Physiotherapy in {city}',
        'description' => 'Physiotherapy for spondylosis, disc bulge, sciatica, frozen shoulder, tennis elbow, plantar fasciitis, hemiplegia, Parkinson\'s and more in {city}.',
        'keywords'    => [
            // spine & back
            'spondylosis treatment {city}', 'cervical spondylosis physiotherapy', 'lumbar spondylosis treatment',
            'ankylosing spondylitis physiotherapy', 'disc bulge treatment without surgery', 'slip disc physiotherapy',
            'sciatica physiotherapy {city}', 'sciatica pain treatment', 'low back pain physiotherapy',
            'torticollis treatment', 'stiff neck treatment', 'muscle spasm relief',
            // joints & sports
            'ligament injury rehabilitation', 'ACL rehabilitation {city}', 'ankle sprain physiotherapy',
            'frozen shoulder physiotherapy {city}', 'rheumatoid arthritis physiotherapy', 'joint stiffness treatment',
            'sports injury rehabilitation {city}', 'tendinitis treatment', 'tennis elbow treatment',
            'golfer\'s elbow treatment', 'plantar fasciitis treatment', 'heel pain treatment', 'heel spur treatment',
            // neuro
            'foot drop physiotherapy', 'wrist drop physiotherapy', 'bell\'s palsy physiotherapy',
            'facial palsy exercises', 'hemiplegia physiotherapy', 'stroke rehabilitation centre {city}',
            'paralysis treatment physiotherapy', 'paraplegia rehabilitation', 'quadriplegia physiotherapy',
            'parkinson\'s physiotherapy', 'muscular dystrophy physiotherapy',
            // child
            'child physiotherapy {city}', 'paediatric physiotherapy {city}', 'baby torticollis treatment',
            'delayed walking in child physiotherapy',
        ],
    ],
    'specialities' => [
        'title'       => 'Manual Therapy, Laser & Taping | New Life Physiotherapy',
        'description' => 'Manual therapy, laser therapy, taping, strength training, joint mobilisation and pre & post operative rehab at New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'physiotherapy treatments {city}', 'physiotherapy techniques', 'advanced physiotherapy {city}',
            'manual therapy {city}', 'laser therapy for pain {city}', 'low level laser therapy physiotherapy',
            'kinesio taping {city}', 'sports taping', 'strength training physiotherapy',
            'joint mobilisation therapy', 'advanced joint mobilization', 'pre operative physiotherapy',
            'post operative physiotherapy {city}', 'physiotherapy after surgery', 'knee replacement physiotherapy',
            'physiotherapy after fracture',
        ],
    ],
    'manual-therapy' => [
        'title'       => 'Manual Therapy in {city} | New Life Physiotherapy',
        'description' => 'Hands-on manual therapy in {city} for back, neck, shoulder & knee pain: joint mobilisation, soft tissue & myofascial release by Dr. Y. Abhilash (PT).',
        'keywords'    => [
            // local
            'manual therapy in {city}', 'manual therapy near me', 'manual physiotherapy {city}',
            'manual therapist near me', 'hands-on physiotherapy {city}', 'best manual therapy clinic {city}',
            // technique
            'manual physical therapy', 'joint mobilisation therapy', 'joint mobilization near me',
            'spinal manipulation {city}', 'soft tissue mobilisation', 'myofascial release therapy',
            'trigger point therapy', 'muscle energy technique', 'neural mobilisation',
            'mulligan mobilisation', 'maitland mobilisation',
            // problem
            'manual therapy for back pain', 'manual therapy for neck pain', 'manual therapy for frozen shoulder',
            'manual therapy for knee pain', 'manual therapy for sciatica', 'manual therapy for cervical spondylosis',
            'stiff joint treatment without surgery', 'muscle tightness treatment', 'pain relief without medicines',
            // brand
            'New Life Physiotherapy manual therapy', 'Dr. Y. Abhilash manual therapy',
        ],
    ],
    'laser-therapy' => [
        'title'       => 'Laser Therapy for Pain in {city} | New Life Physiotherapy',
        'description' => 'Painless laser therapy (LLLT) in {city} for back pain, frozen shoulder, tennis elbow, heel pain & sports injuries. Faster healing with Dr. Y. Abhilash (PT).',
        'keywords'    => [
            // local
            'laser therapy in {city}', 'laser therapy near me', 'laser physiotherapy {city}',
            'laser therapy for pain {city}', 'laser treatment for pain near me', 'best laser therapy clinic {city}',
            // technique
            'low level laser therapy', 'LLLT physiotherapy', 'cold laser therapy', 'photobiomodulation therapy',
            'laser therapy physiotherapy', 'pain relief laser treatment', 'non invasive pain treatment',
            // problem
            'laser therapy for back pain', 'laser therapy for knee pain', 'laser therapy for frozen shoulder',
            'laser therapy for tennis elbow', 'laser therapy for plantar fasciitis', 'laser therapy for heel pain',
            'laser therapy for sciatica', 'laser therapy for neck pain', 'laser therapy for sports injuries',
            'laser therapy for arthritis', 'laser therapy for tendinitis',
            // questions
            'is laser therapy painful', 'laser therapy sessions needed', 'laser therapy cost {city}',
            // brand
            'New Life Physiotherapy laser therapy', 'Dr. Y. Abhilash laser therapy',
        ],
    ],
    'taping-techniques' => [
        'title'       => 'Kinesio Taping in {city} | New Life Physiotherapy',
        'description' => 'Kinesio, sports & McConnell taping in {city} for sprains, knee, shoulder & back pain, swelling and sports injuries by Dr. Y. Abhilash (PT). Book today.',
        'keywords'    => [
            // local
            'kinesio taping in {city}', 'kinesio taping near me', 'taping physiotherapy {city}',
            'sports taping {city}', 'kinesiology tape physiotherapist near me', 'best kinesio taping clinic {city}',
            // technique
            'kinesio taping', 'kinesiology taping', 'k tape physiotherapy', 'athletic taping', 'rigid sports taping',
            'McConnell taping', 'lymphatic taping for swelling', 'postural taping', 'therapeutic taping',
            // problem
            'kinesio taping for knee pain', 'kinesio taping for shoulder pain', 'kinesio taping for back pain',
            'ankle sprain taping', 'taping for tennis elbow', 'taping for plantar fasciitis',
            'patellar taping for knee cap pain', 'shoulder taping after stroke', 'taping for sports injuries',
            'kinesio taping during pregnancy',
            // questions
            'how long to keep kinesio tape', 'does kinesio taping work',
            // brand
            'New Life Physiotherapy taping', 'Dr. Y. Abhilash kinesio taping',
        ],
    ],
    'strength-training' => [
        'title'       => 'Strength Training Physiotherapy in {city} | New Life',
        'description' => 'Physiotherapist-guided strength training in {city} for back & knee pain, post-surgery rehab, sports injuries, stroke and seniors. By Dr. Y. Abhilash (PT).',
        'keywords'    => [
            // local
            'strength training physiotherapy {city}', 'strength training near me', 'rehab exercise programme {city}',
            'exercise therapy {city}', 'physiotherapy exercises near me', 'therapeutic exercise clinic {city}',
            // method
            'rehabilitation strength training', 'core strengthening exercises', 'core stability training',
            'resistance band exercises', 'functional training physiotherapy', 'balance training physiotherapy',
            'isometric exercises', 'sports conditioning {city}', 'exercise therapy',
            // problem
            'strengthening exercises for back pain', 'knee strengthening exercises', 'strength training after knee replacement',
            'strength training after surgery', 'strength training after fracture', 'strength training after stroke',
            'muscle weakness treatment', 'falls prevention exercises for elderly', 'strength training for seniors {city}',
            'return to sport rehabilitation',
            // brand
            'New Life Physiotherapy strength training', 'Dr. Y. Abhilash exercise therapy',
        ],
    ],
    'pre-post-operative-care' => [
        'title'       => 'Pre & Post Operative Physiotherapy in {city} | New Life',
        'description' => 'Physiotherapy before and after surgery in {city}: knee & hip replacement, ACL, fracture and spine surgery rehab with Dr. Y. Abhilash (PT). Book today.',
        'keywords'    => [
            // local
            'post operative physiotherapy {city}', 'pre operative physiotherapy {city}', 'post surgery physiotherapy near me',
            'physiotherapy after surgery {city}', 'surgical rehabilitation {city}', 'orthopaedic rehabilitation centre {city}',
            // stage
            'prehab before surgery', 'prehabilitation physiotherapy', 'physiotherapy before knee replacement',
            'post operative rehabilitation', 'post surgery recovery exercises',
            // surgery
            'physiotherapy after knee replacement', 'TKR rehabilitation {city}', 'physiotherapy after hip replacement',
            'ACL reconstruction rehabilitation', 'physiotherapy after fracture', 'physiotherapy after fracture surgery',
            'physiotherapy after spine surgery', 'physiotherapy after disc surgery', 'rotator cuff repair rehab',
            'physiotherapy after arthroscopy', 'physiotherapy after shoulder surgery',
            // questions
            'how long physiotherapy after knee replacement', 'when to start physiotherapy after surgery',
            // brand
            'New Life Physiotherapy post operative care', 'Dr. Y. Abhilash post surgery rehab',
        ],
    ],
    'advance-joint-mobilization' => [
        'title'       => 'Joint Mobilization Therapy in {city} | New Life Physio',
        'description' => 'Advanced joint mobilization in {city}: Maitland, Mulligan & Kaltenborn techniques for frozen shoulder, stiff joints, neck & back pain. Dr. Y. Abhilash (PT).',
        'keywords'    => [
            // local
            'joint mobilization in {city}', 'joint mobilization near me', 'joint mobilisation therapy {city}',
            'advanced joint mobilization', 'joint stiffness treatment {city}', 'manual therapy for stiff joints {city}',
            // technique
            'Maitland mobilization', 'Maitland grades', 'Mulligan technique', 'Mulligan mobilization with movement',
            'Mulligan SNAGs', 'Kaltenborn mobilization', 'joint traction therapy', 'spinal mobilization',
            'peripheral joint mobilization', 'joint mobilization vs manipulation',
            // problem
            'joint mobilization for frozen shoulder', 'joint mobilization for knee stiffness', 'joint mobilization for neck pain',
            'joint mobilization for back pain', 'stiffness after fracture treatment', 'stiff joint after surgery treatment',
            'ankle stiffness after sprain', 'knee osteoarthritis physiotherapy {city}',
            // brand
            'New Life Physiotherapy joint mobilization', 'Dr. Y. Abhilash joint mobilization',
        ],
    ],
    'free-appointment' => [
        'title'       => 'Book a Free Physiotherapy Consultation in {city}',
        'description' => 'Book a free physiotherapy consultation in {city} with Dr. Y. Abhilash (PT). Choose your date and time online — morning, evening & Sunday slots.',
        'keywords'    => [
            // intent
            'book physiotherapy appointment online', 'free physiotherapy consultation {city}', 'physiotherapy appointment {city}',
            'book physiotherapist near me', 'physiotherapy booking online {city}', 'free physio consultation near me',
            'physiotherapist appointment today', 'physiotherapy appointment Manikonda',
            // timing
            'physiotherapy clinic open sunday {city}', 'evening physiotherapy appointment {city}',
            // condition
            'back pain doctor appointment {city}', 'knee pain physiotherapist appointment', 'child physiotherapy appointment {city}',
            // brand
            'New Life Physiotherapy appointment', 'Dr. Y. Abhilash appointment',
        ],
    ],
    'faq' => [
        'title'       => 'Physiotherapy FAQs | New Life Physiotherapy Clinic',
        'description' => 'Answers to common questions about physiotherapy sessions, treatment duration, what to bring and how to book at New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'physiotherapy questions', 'physiotherapy FAQ', 'how many physiotherapy sessions do I need',
            'what to expect at physiotherapy', 'first physiotherapy session', 'what to wear to physiotherapy',
            'physiotherapy cost {city}', 'physiotherapy charges per session', 'physiotherapy fees {city}',
            'is physiotherapy painful', 'how long does physiotherapy take', 'does physiotherapy really work',
            'do I need a referral for physiotherapy', 'physiotherapy appointment {city}',
        ],
    ],
    'gallery' => [
        'title'       => 'Clinic Gallery | New Life Physiotherapy, {city}',
        'description' => 'Take a look inside New Life Physiotherapy Clinic in {city} — our treatment areas, equipment and patients on their road to recovery.',
        'keywords'    => [
            'physiotherapy clinic photos', 'physiotherapy clinic {city}', 'physio clinic {city}',
            'physiotherapy equipment', 'physiotherapy treatment room', 'physiotherapy clinic interior',
            'New Life Physiotherapy Clinic gallery', 'New Life Physiotherapy photos',
        ],
    ],
    'contact' => [
        'title'       => 'Book a Physiotherapy Appointment in {city} | New Life',
        'description' => 'Call +91 86883 71118 or WhatsApp to book. Open Mon–Sat 9 AM–1 PM & 5–9 PM, Sun 9 AM–1 PM. New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            // intent
            'physiotherapy appointment {city}', 'book physiotherapist near me', 'book physiotherapy online {city}',
            'physiotherapy free consultation {city}', 'physiotherapy clinic open now', 'physiotherapy clinic open sunday {city}',
            'physiotherapy clinic timings', 'physiotherapist phone number {city}', 'physiotherapy WhatsApp booking',
            // brand
            'New Life Physiotherapy Clinic address', 'New Life Physiotherapy contact number',
            'New Life Physiotherapy Clinic location', 'physiotherapy clinic contact',
            'physiotherapy clinic Manikonda address', 'physiotherapist Alkapoor Township Puppalaguda',
        ],
    ],
    'privacy-policy' => [
        'title'       => 'Privacy Policy | New Life Physiotherapy Clinic',
        'description' => 'How New Life Physiotherapy Clinic collects, uses and protects the personal and health information you share with us.',
        'keywords'    => ['New Life Physiotherapy privacy policy'],
        'robots'      => 'noindex, follow',
    ],
    'terms' => [
        'title'       => 'Terms of Use | New Life Physiotherapy Clinic',
        'description' => 'Terms for using the New Life Physiotherapy Clinic website and booking services.',
        'keywords'    => ['New Life Physiotherapy terms of use'],
        'robots'      => 'noindex, follow',
    ],
];

/**
 * Resolved meta for one page, with {city} filled in.
 * Unknown pages fall back to the home entry.
 */
function page_seo(string $page): array
{
    global $seoPages, $site;
    $entry = $seoPages[$page] ?? $seoPages['home'];
    $city = $site['address']['city'];
    $fill = function ($text) use ($city) {
        return str_replace('{city}', $city, $text);
    };

    return [
        'title'       => $fill($entry['title']),
        'description' => $fill($entry['description']),
        'keywords'    => implode(', ', array_map($fill, $entry['keywords'])),
        'robots'      => $entry['robots'] ?? 'index, follow, max-image-preview:large',
        'image'       => $entry['image'] ?? $site['share_image'],
        'path'        => $page === 'home' ? '' : $page . '.php',
    ];
}

/**
 * schema.org structured data: the clinic as a local "Physiotherapy" business
 * (eligible for Google's local results / knowledge panel), plus page-specific
 * entries and a breadcrumb on inner pages.
 */
function page_schema(string $page): array
{
    global $site, $treatments;

    $address = array_filter([
        '@type'           => 'PostalAddress',
        'streetAddress'   => $site['address']['street'],
        'addressLocality' => $site['address']['city'],
        'addressRegion'   => $site['address']['region'],
        'postalCode'      => $site['address']['postal_code'],
        'addressCountry'  => $site['address']['country'],
    ]);

    $hours = [];
    foreach ($site['hours'] as $group) {
        foreach ($group['slots'] as $slot) {
            $hours[] = [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => $group['days'],
                'opens'     => $slot[0],
                'closes'    => $slot[1],
            ];
        }
    }

    $clinic = array_filter([
        '@context'   => 'https://schema.org',
        '@type'      => 'Physiotherapy',
        'name'       => $site['name'],
        'description' => page_seo('home')['description'],
        'url'        => absolute_url(),
        'logo'       => absolute_url($site['logo']),
        'image'      => absolute_url($site['share_image']),
        'telephone'  => tel($site['phones'][0]),
        'email'      => $site['email'],
        'address'    => $address,
        'areaServed' => $site['address']['city'],
        'openingHoursSpecification' => $hours,
        'employee'   => [
            '@type'    => 'Person',
            'name'     => $site['doctor']['name'],
            'jobTitle' => $site['doctor']['role'],
        ],
        'knowsAbout' => array_merge(array_column($treatments, 'name'), ['Child Therapy']),
        'sameAs'     => array_values(array_filter($site['social'])),
    ]);

    $graph = [$clinic];

    // Home: the website itself (site name in search results)
    if ($page === 'home' && absolute_url() !== null) {
        $graph[] = [
            '@context' => 'https://schema.org',
            '@type'    => 'WebSite',
            'name'     => $site['name'],
            'url'      => absolute_url(),
        ];
    }

    // Treatments: a medical page about each condition we treat
    if ($page === 'treatments') {
        $conditions = [];
        foreach (array_merge($treatments, [$GLOBALS['childTreatment']]) as $t) {
            $conditions[] = array_filter([
                '@type'       => 'MedicalCondition',
                'name'        => $t['name'],
                'description' => $GLOBALS['treatmentDetails'][$t['slug']]['overview'] ?? null,
                'url'         => absolute_url('treatments.php#' . $t['slug']),
            ]);
        }
        $graph[] = array_filter([
            '@context' => 'https://schema.org',
            '@type'    => 'MedicalWebPage',
            'name'     => page_seo('treatments')['title'],
            'url'      => absolute_url('treatments.php'),
            'about'    => $conditions,
            'audience' => ['@type' => 'Patient'],
        ]);
    }

    // FAQ page: every question and answer
    if ($page === 'faq') {
        $graph[] = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(function ($item) {
                return [
                    '@type'          => 'Question',
                    'name'           => $item['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
                ];
            }, $GLOBALS['faqPage']['items']),
        ];
    }

    // Speciality pages (manual therapy, laser therapy, ...): the therapy, and its FAQs
    if (isset($GLOBALS['specialityPages'][$page])) {
        $sp = $GLOBALS['specialityPages'][$page];
        $therapyName = trim($sp['banner']['title'] . ' ' . $sp['banner']['highlight']);
        $graph[] = array_filter([
            '@context'    => 'https://schema.org',
            '@type'       => 'MedicalWebPage',
            'name'        => page_seo($page)['title'],
            'url'         => absolute_url($page . '.php'),
            'audience'    => ['@type' => 'Patient'],
            'about'       => [
                '@type'       => 'MedicalTherapy',
                'name'        => $therapyName,
                'description' => $sp['intro']['paragraphs'][0],
                'relevantSpecialty' => 'PhysicalTherapy',
            ],
        ]);
        $graph[] = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(function ($item) {
                return [
                    '@type'          => 'Question',
                    'name'           => $item['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
                ];
            }, $sp['faq']['items']),
        ];
    }

    // The doctor as a Person linked to the clinic (doctor profile page)
    if ($page === 'doctors') {
        $profile = $GLOBALS['doctorPage']['profile'];
        $graph[] = array_filter([
            '@context'    => 'https://schema.org',
            '@type'       => 'Person',
            'name'        => $site['doctor']['name'],
            'jobTitle'    => $site['doctor']['role'],
            'description' => $profile['bio'][0],
            'image'       => $profile['photo'] ? absolute_url($profile['photo']) : null,
            'url'         => absolute_url('doctors.php'),
            'hasCredential' => $profile['qualifications'] ?: null,
            'knowsLanguage' => $profile['languages'] ?: null,
            'knowsAbout'  => array_column($GLOBALS['specialities'], 'name'),
            'worksFor'    => ['@type' => 'Physiotherapy', 'name' => $site['name']],
        ]);
    }

    // Breadcrumb for inner pages, following the page's place in $nav
    // (needs absolute URLs)
    if ($page !== 'home' && absolute_url() !== null) {
        $items = [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => absolute_url()]];
        foreach (nav_trail($page) as $i => $crumb) {
            $items[] = ['@type' => 'ListItem', 'position' => $i + 2, 'name' => $crumb['label'], 'item' => absolute_url($crumb['url'])];
        }
        $graph[] = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

    return $graph;
}

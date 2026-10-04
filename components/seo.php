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
            'physio near me', 'best physiotherapy clinic near me', 'physiotherapy clinic open on sunday',
            // problem
            'back pain treatment in {city}', 'neck pain treatment {city}', 'knee pain physiotherapy',
            'shoulder pain treatment', 'joint pain physiotherapy', 'back pain doctor near me',
            // condition / service
            'sciatica treatment', 'frozen shoulder treatment', 'sports injury physiotherapy',
            'stroke rehabilitation {city}', 'paralysis physiotherapy', 'neuro physiotherapy {city}',
            'child physiotherapy {city}', 'paediatric physiotherapy', 'post operative physiotherapy',
            'manual therapy', 'laser therapy for pain', 'kinesio taping',
            // brand
            'New Life Physiotherapy Clinic', 'Dr. Y. Abhilash physiotherapist',
        ],
    ],
    'about' => [
        'title'       => 'About Us | New Life Physiotherapy Clinic, {city}',
        'description' => 'New Life Physiotherapy Clinic, {city}: expert, personalised physiotherapy for adults and children led by Dr. Y. Abhilash (PT), Regd. No. 08928.',
        'keywords'    => [
            'about New Life Physiotherapy Clinic', 'physiotherapy clinic {city}', 'physio clinic {city}',
            'registered physiotherapist {city}', 'adult and child rehabilitation {city}',
            'trusted physiotherapy clinic {city}', 'personalised physiotherapy treatment',
            'physiotherapy clinic open 7 days', 'Dr. Y. Abhilash',
        ],
    ],
    'doctors' => [
        'title'       => 'Dr. Y. Abhilash (PT) | Physiotherapist in {city}',
        'description' => 'Meet Dr. Y. Abhilash (PT), registered physiotherapist (Regd. No. 08928) for back pain, sports injuries, stroke rehab and child therapy in {city}.',
        'keywords'    => [
            'Dr. Y. Abhilash', 'Dr. Y. Abhilash physiotherapist', 'Dr. Abhilash physio {city}',
            'best physiotherapist in {city}', 'physiotherapist near me', 'registered physiotherapist {city}',
            'physiotherapy doctor {city}', 'physio doctor near me', 'sports physiotherapist {city}',
            'neuro physiotherapist {city}', 'paediatric physiotherapist {city}', 'back pain specialist {city}',
            'stroke rehabilitation physiotherapist', 'orthopaedic physiotherapist {city}',
        ],
    ],
    'whychooseus' => [
        'title'       => 'Why Choose Us | New Life Physiotherapy, {city}',
        'description' => 'Registered physiotherapist, root-cause assessment, personalised plans and hands-on care, open 7 days. See why {city} patients choose New Life Physiotherapy.',
        'keywords'    => [
            'why choose New Life Physiotherapy', 'best physiotherapy clinic in {city}', 'trusted physiotherapist {city}',
            'top physiotherapy clinic {city}', 'personalised physiotherapy', 'one to one physiotherapy',
            'physiotherapy clinic open on sunday {city}', 'registered physiotherapist near me',
            'hands-on physiotherapy {city}', 'physiotherapy free consultation {city}',
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
            'manual therapy {city}', 'laser therapy for pain {city}', 'low level laser therapy physiotherapy',
            'kinesio taping {city}', 'sports taping', 'strength training physiotherapy',
            'joint mobilisation therapy', 'advanced joint mobilization', 'pre operative physiotherapy',
            'post operative physiotherapy {city}', 'physiotherapy after surgery', 'knee replacement physiotherapy',
            'physiotherapy after fracture',
        ],
    ],
    'faqs' => [
        'title'       => 'Physiotherapy FAQs | New Life Physiotherapy Clinic',
        'description' => 'Answers to common questions about physiotherapy sessions, treatment duration, what to bring and how to book at New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'physiotherapy questions', 'how many physiotherapy sessions do I need', 'what to expect at physiotherapy',
            'physiotherapy cost {city}', 'physiotherapy charges per session', 'is physiotherapy painful',
            'how long does physiotherapy take', 'physiotherapy appointment {city}',
        ],
    ],
    'gallery' => [
        'title'       => 'Clinic Gallery | New Life Physiotherapy, {city}',
        'description' => 'Take a look inside New Life Physiotherapy Clinic in {city} — our treatment areas, equipment and patients on their road to recovery.',
        'keywords'    => [
            'physiotherapy clinic photos', 'physiotherapy clinic {city}', 'physiotherapy equipment',
            'New Life Physiotherapy Clinic gallery', 'physio clinic {city}',
        ],
    ],
    'contact' => [
        'title'       => 'Book a Physiotherapy Appointment in {city} | New Life',
        'description' => 'Call +91 86883 71118 or WhatsApp to book. Open Mon–Sat 9 AM–1 PM & 5–9 PM, Sun 9 AM–1 PM. New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'physiotherapy appointment {city}', 'book physiotherapist near me', 'book physiotherapy online {city}',
            'physiotherapy clinic contact', 'physiotherapist phone number {city}', 'physiotherapy clinic open sunday {city}',
            'physiotherapy clinic timings', 'New Life Physiotherapy Clinic address', 'New Life Physiotherapy contact number',
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

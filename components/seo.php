<?php
/**
 * Per-page SEO: title, description, keywords, social sharing and schema.org
 * structured data. A page picks its entry with $page (see init.php) and
 * head.php prints it.
 *
 * Guidelines used:
 *   - title       <= 60 characters, primary keyword first, brand last
 *   - description <= 160 characters, written to earn the click
 *   - keywords    local + intent ("in {city}", "near me") + condition terms.
 *                 Google ignores <meta name="keywords">; Bing and other
 *                 tools still read it. Rankings come from the title,
 *                 description, page content and the structured data below.
 *
 * {city} is replaced with $site['address']['city'].
 */

$seoPages = [
    'home' => [
        'title'       => 'Physiotherapy Clinic in {city} | New Life Physiotherapy',
        'description' => 'Physiotherapy in {city} for back & neck pain, sciatica, sports injuries, stroke and child rehab with Dr. Y. Abhilash (PT). Book a free consultation.',
        'keywords'    => [
            'physiotherapy clinic in {city}', 'physiotherapist in {city}', 'best physiotherapist in {city}',
            'physiotherapy near me', 'physiotherapist near me', 'physiotherapy centre {city}',
            'back pain treatment in {city}', 'neck pain physiotherapy', 'sciatica treatment',
            'frozen shoulder treatment', 'sports injury physiotherapy', 'stroke rehabilitation {city}',
            'paralysis physiotherapy', 'neuro physiotherapy', 'child physiotherapy {city}',
            'paediatric physiotherapy', 'post operative physiotherapy', 'manual therapy',
            'laser therapy for pain', 'kinesio taping', 'home exercise programme',
            'Dr. Y. Abhilash physiotherapist', 'New Life Physiotherapy Clinic',
        ],
    ],
    'about' => [
        'title'       => 'About Dr. Y. Abhilash (PT) | New Life Physiotherapy',
        'description' => 'Meet Dr. Y. Abhilash (PT), registered physiotherapist (Regd. No. 08928) offering adult and child rehabilitation at New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'Dr. Y. Abhilash', 'registered physiotherapist {city}', 'experienced physiotherapist in {city}',
            'physiotherapy clinic {city}', 'adult and child rehabilitation', 'about New Life Physiotherapy Clinic',
            'physiotherapy doctor near me', 'physio clinic {city}',
        ],
    ],
    'doctors' => [
        'title'       => 'Dr. Y. Abhilash (PT) | Physiotherapist in {city}',
        'description' => 'Meet Dr. Y. Abhilash (PT), registered physiotherapist (Regd. No. 08928) for back pain, sports injuries, stroke rehab and child therapy in {city}.',
        'keywords'    => [
            'Dr. Y. Abhilash', 'Dr. Y. Abhilash physiotherapist', 'best physiotherapist in {city}',
            'physiotherapist near me', 'registered physiotherapist {city}', 'physiotherapy doctor {city}',
            'sports physiotherapist {city}', 'neuro physiotherapist {city}', 'paediatric physiotherapist {city}',
            'back pain specialist {city}', 'stroke rehabilitation physiotherapist',
        ],
    ],
    'whychooseus' => [
        'title'       => 'Why Choose Us | New Life Physiotherapy, {city}',
        'description' => 'Registered physiotherapist, root-cause assessment, personalised plans and hands-on care, open 7 days. See why {city} patients choose New Life Physiotherapy.',
        'keywords'    => [
            'why choose New Life Physiotherapy', 'best physiotherapy clinic in {city}', 'trusted physiotherapist {city}',
            'personalised physiotherapy', 'physiotherapy clinic open on sunday {city}', 'registered physiotherapist near me',
            'hands-on physiotherapy {city}', 'physiotherapy free consultation {city}',
        ],
    ],
    'treatments' => [
        'title'       => 'Conditions We Treat | Physiotherapy in {city}',
        'description' => 'Physiotherapy for spondylosis, disc bulge, sciatica, frozen shoulder, tennis elbow, plantar fasciitis, hemiplegia, Parkinson\'s and more in {city}.',
        'keywords'    => [
            'spondylosis treatment', 'cervical spondylosis physiotherapy', 'ankylosing spondylitis physiotherapy',
            'disc bulge treatment without surgery', 'sciatica physiotherapy {city}', 'low back pain physiotherapy',
            'torticollis treatment', 'muscle spasm relief', 'ligament injury rehabilitation',
            'ACL rehabilitation', 'frozen shoulder physiotherapy {city}', 'rheumatoid arthritis physiotherapy',
            'sports injury rehabilitation {city}', 'tendinitis treatment', 'tennis elbow treatment',
            'golfer\'s elbow treatment', 'plantar fasciitis treatment', 'heel spur treatment',
            'foot drop physiotherapy', 'wrist drop physiotherapy', 'bell\'s palsy physiotherapy',
            'hemiplegia physiotherapy', 'stroke rehabilitation centre', 'paraplegia rehabilitation',
            'quadriplegia physiotherapy', 'parkinson\'s physiotherapy', 'muscular dystrophy physiotherapy',
        ],
    ],
    'specialities' => [
        'title'       => 'Manual Therapy, Laser & Taping | New Life Physiotherapy',
        'description' => 'Manual therapy, laser therapy, taping, strength training, joint mobilisation and pre & post operative rehab at New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'manual therapy {city}', 'laser therapy for pain {city}', 'kinesio taping {city}',
            'sports taping', 'strength training physiotherapy', 'joint mobilisation therapy',
            'pre operative physiotherapy', 'post operative physiotherapy {city}',
            'knee replacement physiotherapy', 'physiotherapy after surgery',
        ],
    ],
    'faqs' => [
        'title'       => 'Physiotherapy FAQs | New Life Physiotherapy Clinic',
        'description' => 'Answers to common questions about physiotherapy sessions, treatment duration, what to bring and how to book at New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'physiotherapy questions', 'how many physiotherapy sessions do I need',
            'what to expect at physiotherapy', 'physiotherapy cost {city}', 'is physiotherapy painful',
            'physiotherapy appointment {city}',
        ],
    ],
    'gallery' => [
        'title'       => 'Clinic Gallery | New Life Physiotherapy, {city}',
        'description' => 'Take a look inside New Life Physiotherapy Clinic in {city} — our treatment areas, equipment and patients on their road to recovery.',
        'keywords'    => [
            'physiotherapy clinic photos', 'physiotherapy equipment', 'New Life Physiotherapy Clinic gallery',
            'physio clinic {city}',
        ],
    ],
    'contact' => [
        'title'       => 'Book a Physiotherapy Appointment in {city} | New Life',
        'description' => 'Call +91 86883 71118 or WhatsApp to book. Open Mon–Sat 9 AM–1 PM & 5–9 PM, Sun 9 AM–1 PM. New Life Physiotherapy Clinic, {city}.',
        'keywords'    => [
            'physiotherapy appointment {city}', 'book physiotherapist near me', 'physiotherapy clinic contact',
            'physiotherapist phone number {city}', 'physiotherapy clinic open sunday {city}',
            'New Life Physiotherapy Clinic address',
        ],
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
        'image'       => $entry['image'] ?? $site['share_image'],
        'path'        => $page === 'home' ? '' : $page . '.php',
    ];
}

/**
 * schema.org structured data: the clinic as a local "Physiotherapy" business
 * (eligible for Google's local results / knowledge panel), plus a breadcrumb
 * on inner pages.
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

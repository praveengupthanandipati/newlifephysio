<?php
/**
 * Site content in one place. Every component loops over these arrays, so a
 * phone number, treatment or menu item is changed here once and updates
 * everywhere it appears (header, footer, sections, forms, SEO schema).
 */

// ---------------------------------------------------------------------------
// Clinic details
// ---------------------------------------------------------------------------
$site = [
    'name'      => 'New Life Physiotherapy Clinic',
    'tagline'   => 'Adult & Child Rehabilitation',
    // TODO: live domain without trailing slash, e.g. 'https://www.yourdomain.com'.
    // Enables canonical URLs and absolute social-share / schema URLs.
    'url'       => '',
    'logo'      => 'img/logo.png',
    'emblem'    => 'img/favicon-192.png',
    'share_image' => 'img/banner01-1024.jpg',

    'doctor' => [
        'name'     => 'Dr. Y. Abhilash (PT)',
        'initials' => 'YA',
        'role'     => 'Physiotherapist',
        'reg_no'   => '08928',
    ],

    'phones'   => ['+91 86883 71118', '+91 81069 83290'],
    'whatsapp' => '+91 86883 71118',
    'email'    => '', // TODO: clinic email ID

    'address' => [
        'street'      => '', // TODO: full street address
        'city'        => 'Hyderabad',
        'region'      => 'Telangana',
        'region_code' => 'IN-TG',
        'postal_code' => '', // TODO
        'country'     => 'IN',
    ],

    // Opening hours: drives the top bar, footer, journey step and schema.
    'hours' => [
        [
            'label' => 'Mon – Sat',
            'days'  => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'slots' => [['09:00', '13:00'], ['17:00', '21:00']],
        ],
        [
            'label' => 'Sun',
            'days'  => ['Sunday'],
            'slots' => [['09:00', '13:00']],
        ],
    ],

    // TODO: real profile URLs; empty ones render as "#" and are left out of the schema.
    'social' => [
        'facebook'  => '',
        'instagram' => '',
        'youtube'   => '',
    ],

    'cities' => ['Hyderabad', 'Secunderabad', 'Other'],

    'whatsapp_messages' => [
        'book'  => 'Hi, I would like to book an appointment',
        'query' => 'Hi, I would like to ask about a treatment',
    ],
];

// ---------------------------------------------------------------------------
// Treatments (conditions we treat)
// ---------------------------------------------------------------------------
$treatmentCategories = [
    'spine'  => 'Spine & Back',
    'joints' => 'Joints & Sports',
    'neuro'  => 'Neuro Rehab',
    'child'  => 'Child Therapy',
];

$treatments = [
    ['slug' => 'spondylosis', 'name' => 'Spondylosis', 'cat' => 'spine', 'icon' => 'spine', 'text' => 'Relief for age-related neck and back wear that causes pain and stiffness.'],
    ['slug' => 'spondylitis', 'name' => 'Spondylitis', 'cat' => 'spine', 'icon' => 'spine', 'text' => 'Ease inflammatory spine pain with mobility and posture work.'],
    ['slug' => 'ankylosing-spondylitis', 'name' => 'Ankylosing Spondylitis', 'cat' => 'spine', 'icon' => 'back', 'text' => 'Keep the spine flexible and your posture and breathing strong.'],
    ['slug' => 'disc-bulge', 'name' => 'Disc Bulge', 'cat' => 'spine', 'icon' => 'disc', 'text' => 'Take pressure off irritated nerves and rebuild core support.'],
    ['slug' => 'sciatica', 'name' => 'Sciatica', 'cat' => 'spine', 'icon' => 'nerve', 'text' => 'Calm shooting pain that runs from the lower back down the leg.'],
    ['slug' => 'low-back-ache', 'name' => 'Low Back Ache', 'cat' => 'spine', 'icon' => 'back', 'text' => 'Lasting relief through manual therapy and core strengthening.'],
    ['slug' => 'torticollis', 'name' => 'Torticollis', 'cat' => 'spine', 'icon' => 'neck', 'text' => 'Release a stiff, twisted neck and restore comfortable movement.'],
    ['slug' => 'muscle-spasm', 'name' => 'Muscle Spasm', 'cat' => 'spine', 'icon' => 'muscle', 'text' => 'Settle tight, cramping muscles and help prevent them returning.'],
    ['slug' => 'ligament-injuries', 'name' => 'Ligament Injuries', 'cat' => 'joints', 'icon' => 'knee', 'text' => 'Rehab for sprains and ligament tears, before and after surgery.'],
    ['slug' => 'joint-stiffness', 'name' => 'Joint Stiffness', 'cat' => 'joints', 'icon' => 'knee', 'text' => 'Restore range of motion with targeted joint mobilisation.'],
    ['slug' => 'adhesive-capsulitis', 'name' => 'Adhesive Capsulitis', 'cat' => 'joints', 'icon' => 'shoulder', 'text' => 'Frozen shoulder care to regain your reach and sleep without pain.'],
    ['slug' => 'rheumatoid-arthritis', 'name' => 'Rheumatoid Arthritis', 'cat' => 'joints', 'icon' => 'hand', 'text' => 'Protect your joints, reduce pain and keep hands and limbs working.'],
    ['slug' => 'sports-injuries', 'name' => 'Sports Injuries', 'cat' => 'joints', 'icon' => 'run', 'text' => 'Recover fully and return to your sport stronger and safer.'],
    ['slug' => 'tendinitis', 'name' => 'Tendinitis', 'cat' => 'joints', 'icon' => 'muscle', 'text' => 'Settle tendon pain with graded loading and laser therapy.'],
    ['slug' => 'tennis-elbow', 'name' => 'Tennis Elbow', 'cat' => 'joints', 'icon' => 'elbow', 'text' => 'Relief for outer-elbow pain that makes gripping and lifting hard.'],
    ['slug' => 'golfers-elbow', 'name' => "Golfer's Elbow", 'cat' => 'joints', 'icon' => 'elbow', 'text' => 'Ease inner-elbow pain and strengthen the forearm.'],
    ['slug' => 'calcaneal-spur', 'name' => 'Calcaneal Spur', 'cat' => 'joints', 'icon' => 'foot', 'text' => 'Heel pain relief with taping, stretching and footwear advice.'],
    ['slug' => 'plantar-fasciitis', 'name' => 'Plantar Fasciitis', 'cat' => 'joints', 'icon' => 'foot', 'text' => 'Beat that sharp first-step heel pain in the morning.'],
    ['slug' => 'foot-drop', 'name' => 'Foot Drop', 'cat' => 'neuro', 'icon' => 'foot', 'text' => 'Improve ankle lift, balance and safe, confident walking.'],
    ['slug' => 'wrist-drop', 'name' => 'Wrist Drop', 'cat' => 'neuro', 'icon' => 'hand', 'text' => 'Retrain wrist and finger lift for everyday tasks.'],
    ['slug' => 'bells-palsy', 'name' => "Bell's Palsy", 'cat' => 'neuro', 'icon' => 'face', 'text' => 'Facial exercises and stimulation to restore expression.'],
    ['slug' => 'hemiplegia', 'name' => 'Hemiplegia', 'cat' => 'neuro', 'icon' => 'brain', 'text' => 'Stroke rehab to regain movement and control on the affected side.'],
    ['slug' => 'paraplegia', 'name' => 'Paraplegia', 'cat' => 'neuro', 'icon' => 'wheelchair', 'text' => 'Strength, transfer and mobility training for independence.'],
    ['slug' => 'quadriplegia', 'name' => 'Quadriplegia', 'cat' => 'neuro', 'icon' => 'wheelchair', 'text' => 'Structured rehab to maximise function, comfort and care.'],
    ['slug' => 'parkinsons-disease', 'name' => "Parkinson's Disease", 'cat' => 'neuro', 'icon' => 'brain', 'text' => 'Improve balance, walking and ease of daily movement.'],
    ['slug' => 'muscular-dystrophy', 'name' => 'Muscular Dystrophy', 'cat' => 'neuro', 'icon' => 'muscle', 'text' => 'Maintain strength, mobility and quality of life.'],
];

// Featured card at the end of the services grid
$childTherapy = [
    'tag'   => 'Child Therapy',
    'title' => 'Gentle, play-based physiotherapy for children',
    'text'  => 'We help little ones move, grow and thrive with care that feels like play — and guidance for parents at every step.',
    'cta'   => 'Book a Child Assessment',
];

// Extra choices in the booking form's treatment dropdown
$bookingExtraOptions = ['Pre / Post Operative Rehab', 'Child Therapy', 'Other / Not sure'];

// Treatments page
$treatmentsPage = [
    'banner' => [
        'title'     => 'Conditions We',
        'highlight' => 'Treat',
        'lead'      => 'Find your condition, learn the common signs and see how physiotherapy can help you recover.',
        'image'     => 'banner02',
    ],
];

// Treatments page: Child Therapy entry (the 26 above + this one)
$childTreatment = ['slug' => 'child-therapy', 'name' => 'Child Therapy', 'cat' => 'child', 'icon' => 'child'];

// Treatments page: intro for each category group
$treatmentCategoryInfo = [
    'spine'  => ['icon' => 'spine', 'text' => 'Neck and back problems — from wear-and-tear and disc issues to nerve pain and muscle spasm.'],
    'joints' => ['icon' => 'knee', 'text' => 'Joint, ligament and tendon problems, sports injuries and foot pain that hold you back.'],
    'neuro'  => ['icon' => 'brain', 'text' => 'Rehabilitation after stroke, nerve injury and neurological conditions to rebuild movement and independence.'],
    'child'  => ['icon' => 'child', 'text' => 'Gentle, play-based physiotherapy for babies and children.'],
];

// Treatments page: detail for each condition, keyed by slug.
// signs = what patients notice, care = how physiotherapy helps.
$treatmentDetails = [
    'spondylosis' => [
        'overview' => 'Age-related wear of the discs and joints of the spine, in the neck (cervical) or lower back (lumbar). It can cause stiffness, pain and sometimes pressure on the nerves.',
        'signs'    => ['Neck or back stiffness', 'Pain that worsens with long sitting', 'Tingling or numbness in arms or legs', 'Headaches starting from the neck'],
        'care'     => ['Manual therapy & mobilisation', 'Posture correction', 'Strengthening & stretching', 'Ergonomic advice'],
    ],
    'spondylitis' => [
        'overview' => 'Inflammation of the joints of the spine that causes pain and stiffness — often worse after rest and better with movement.',
        'signs'    => ['Morning stiffness', 'Pain that eases with activity', 'Reduced spinal movement', 'Tiredness'],
        'care'     => ['Spinal mobility exercises', 'Laser therapy for pain relief', 'Postural training', 'Home exercise programme'],
    ],
    'ankylosing-spondylitis' => [
        'overview' => 'A long-term inflammatory arthritis that mainly affects the spine and pelvic joints. Regular, guided exercise is key to keeping the spine flexible.',
        'signs'    => ['Low back and buttock pain', 'Morning stiffness lasting over 30 minutes', 'Stooping posture over time', 'Reduced chest expansion'],
        'care'     => ['Spinal mobility programme', 'Breathing exercises', 'Posture training', 'Strength & flexibility work'],
    ],
    'disc-bulge' => [
        'overview' => 'When a spinal disc pushes outward it can press on nearby nerves, causing back or neck pain that may spread into the arm or leg. Many cases improve with targeted physiotherapy.',
        'signs'    => ['Back or neck pain', 'Pain spreading into an arm or leg', 'Numbness or tingling', 'Pain on bending or sitting'],
        'care'     => ['Directional & core exercises', 'Manual therapy', 'Nerve mobilisation', 'Posture & lifting advice'],
    ],
    'sciatica' => [
        'overview' => 'Pain along the sciatic nerve — from the lower back through the buttock and down the leg — often caused by a disc bulge or tight muscles pressing on the nerve.',
        'signs'    => ['Shooting pain down the leg', 'Numbness or tingling in the leg or foot', 'Weakness in the leg', 'Pain worse on sitting'],
        'care'     => ['Nerve gliding exercises', 'Manual therapy', 'Core strengthening', 'Laser therapy for pain relief'],
    ],
    'low-back-ache' => [
        'overview' => 'One of the most common problems we see — often linked to posture, weak core muscles, strain or long hours of sitting.',
        'signs'    => ['Dull or sharp lower back pain', 'Stiffness on waking', 'Pain on bending or lifting', 'Muscle tightness'],
        'care'     => ['Manual therapy', 'Core strengthening', 'Kinesio taping', 'Posture & ergonomic advice'],
    ],
    'torticollis' => [
        'overview' => 'A twisted or tilted neck caused by tight or spasming neck muscles. It can affect adults, and babies can be born with it (congenital torticollis).',
        'signs'    => ['Head tilted to one side', 'Chin turned the other way', 'Neck pain or stiffness', 'Limited neck rotation'],
        'care'     => ['Gentle stretching', 'Soft-tissue release', 'Positioning advice for infants', 'Neck strengthening'],
    ],
    'muscle-spasm' => [
        'overview' => 'A sudden, involuntary tightening of a muscle — often in the back or neck — triggered by strain, poor posture or fatigue.',
        'signs'    => ['Sudden sharp pain', 'A hard knot in the muscle', 'Limited movement', 'Recurring cramps'],
        'care'     => ['Soft-tissue release', 'Laser therapy', 'Stretching', 'Load management advice'],
    ],
    'ligament-injuries' => [
        'overview' => 'Sprains and tears of the ligaments that stabilise joints such as the knee (ACL, MCL) and ankle — from sport, falls or twisting.',
        'signs'    => ['Swelling after an injury', 'Joint feels unstable or gives way', 'Pain when putting weight on it', 'Bruising'],
        'care'     => ['Pain & swelling management', 'Progressive strengthening', 'Balance & proprioception training', 'Pre & post-surgery rehab'],
    ],
    'joint-stiffness' => [
        'overview' => 'Reduced joint movement after injury, surgery, a period in plaster or arthritis, making everyday tasks harder.',
        'signs'    => ['Restricted range of motion', 'Stiffness after rest', 'Pain at the end of movement', 'Weakness around the joint'],
        'care'     => ['Joint mobilisation', 'Stretching', 'Strengthening', 'Home exercise programme'],
    ],
    'adhesive-capsulitis' => [
        'overview' => 'Frozen shoulder: the shoulder capsule thickens and tightens, causing pain and a gradual loss of movement. It passes through phases, and guided physiotherapy helps restore movement.',
        'signs'    => ['Shoulder pain, worse at night', 'Difficulty reaching overhead or behind the back', 'Gradual loss of movement', 'Pain lying on that side'],
        'care'     => ['Joint mobilisation', 'Stretching programme', 'Laser therapy', 'Home exercise plan'],
    ],
    'rheumatoid-arthritis' => [
        'overview' => 'An autoimmune condition that inflames the joints, commonly the hands, wrists and feet. Physiotherapy helps manage pain and keep the joints moving.',
        'signs'    => ['Swollen, painful joints', 'Morning stiffness', 'Reduced grip strength', 'Fatigue'],
        'care'     => ['Gentle range-of-motion exercise', 'Strengthening', 'Joint protection advice', 'Pain relief modalities'],
    ],
    'sports-injuries' => [
        'overview' => 'Sprains, strains and overuse injuries from sport and exercise, treated with a clear plan to get you back to your activity safely.',
        'signs'    => ['Pain during or after activity', 'Swelling', 'Drop in performance', 'Recurring niggles'],
        'care'     => ['Injury assessment', 'Sports taping', 'Strength & conditioning', 'Return-to-sport planning'],
    ],
    'tendinitis' => [
        'overview' => 'Irritation of a tendon from overuse or repetitive strain — common in the shoulder, elbow, knee and Achilles.',
        'signs'    => ['Pain with movement', 'Tenderness over the tendon', 'Mild swelling', 'Stiffness'],
        'care'     => ['Graded tendon loading', 'Laser therapy', 'Kinesio taping', 'Activity modification'],
    ],
    'tennis-elbow' => [
        'overview' => 'Lateral epicondylitis: overuse of the forearm muscles that causes pain on the outer side of the elbow — and not just in tennis players.',
        'signs'    => ['Outer elbow pain', 'Weak grip', 'Pain lifting or twisting', 'Pain when shaking hands'],
        'care'     => ['Eccentric strengthening', 'Soft-tissue release', 'Taping & brace advice', 'Laser therapy'],
    ],
    'golfers-elbow' => [
        'overview' => 'Medial epicondylitis: overuse of the forearm muscles that causes pain on the inner side of the elbow.',
        'signs'    => ['Inner elbow pain', 'Pain when gripping', 'Elbow stiffness', 'Weakness in the wrist or hand'],
        'care'     => ['Strengthening', 'Stretching', 'Soft-tissue release', 'Kinesio taping'],
    ],
    'calcaneal-spur' => [
        'overview' => 'A bony growth on the heel bone, often linked with plantar fasciitis. Physiotherapy eases the pain by treating the tissues around it.',
        'signs'    => ['Sharp heel pain on standing', 'Pain after rest', 'Tenderness under the heel', 'Pain worse on hard floors'],
        'care'     => ['Kinesio taping', 'Calf & foot stretching', 'Laser therapy', 'Footwear advice'],
    ],
    'plantar-fasciitis' => [
        'overview' => 'Irritation of the thick band of tissue under the foot — the classic sharp heel pain with your first steps in the morning.',
        'signs'    => ['Heel pain with the first steps of the day', 'Pain after long standing', 'Tenderness along the arch', 'Tight calves'],
        'care'     => ['Stretching programme', 'Kinesio taping', 'Foot & calf strengthening', 'Laser therapy'],
    ],
    'foot-drop' => [
        'overview' => 'Difficulty lifting the front of the foot, often caused by nerve injury, stroke or spinal problems, so the toes drag while walking.',
        'signs'    => ['Toes catch or drag', 'High-stepping walk', 'Frequent tripping', 'Weak ankle lift'],
        'care'     => ['Muscle stimulation & strengthening', 'Gait training', 'Balance work', 'Advice on ankle supports'],
    ],
    'wrist-drop' => [
        'overview' => 'Weakness in lifting the wrist and fingers, usually from an injury to the radial nerve, making gripping and daily tasks difficult.',
        'signs'    => ['Unable to lift the wrist', 'Weak grip', 'Difficulty straightening the fingers', 'Numbness on the back of the hand'],
        'care'     => ['Nerve & muscle stimulation', 'Strengthening', 'Functional hand training', 'Splinting advice'],
    ],
    'bells-palsy' => [
        'overview' => 'Sudden weakness of the muscles on one side of the face caused by inflammation of the facial nerve. Most people recover, and physiotherapy supports that recovery.',
        'signs'    => ['Drooping on one side of the face', 'Difficulty closing the eye', 'Trouble smiling or eating', 'Changes in taste'],
        'care'     => ['Facial exercises', 'Electrical stimulation', 'Facial massage', 'Home exercise guidance'],
    ],
    'hemiplegia' => [
        'overview' => 'Weakness or paralysis of one side of the body, most often after a stroke. Rehab focuses on regaining movement, balance and independence.',
        'signs'    => ['Weakness on one side', 'Difficulty walking', 'Poor balance', 'Muscle stiffness (spasticity)'],
        'care'     => ['Neuro rehabilitation exercises', 'Gait & balance training', 'Spasticity management', 'Daily-living skills'],
    ],
    'paraplegia' => [
        'overview' => 'Paralysis of the lower body, usually from a spinal cord injury or disease. Physiotherapy builds strength, mobility and independence.',
        'signs'    => ['Loss of leg movement or feeling', 'Difficulty with sitting balance', 'Muscle stiffness', 'Risk of pressure sores'],
        'care'     => ['Upper-body strengthening', 'Transfer training', 'Wheelchair skills', 'Stretching & positioning'],
    ],
    'quadriplegia' => [
        'overview' => 'Paralysis affecting all four limbs, usually after an injury to the spinal cord in the neck. Rehab maximises function and comfort and supports carers.',
        'signs'    => ['Weakness in the arms and legs', 'Breathing difficulty', 'Muscle stiffness', 'Needing help with daily tasks'],
        'care'     => ['Breathing exercises', 'Positioning & stretching', 'Functional training', 'Guidance for carers'],
    ],
    'parkinsons-disease' => [
        'overview' => 'A progressive neurological condition that affects movement. Regular physiotherapy helps maintain mobility, balance and confidence.',
        'signs'    => ['Tremor', 'Slowness of movement', 'Stiffness', 'Balance problems or falls'],
        'care'     => ['Gait & balance training', 'Large-amplitude movement practice', 'Strength & flexibility', 'Fall prevention'],
    ],
    'muscular-dystrophy' => [
        'overview' => 'A group of genetic conditions that cause progressive muscle weakness. Physiotherapy helps maintain strength, mobility and quality of life.',
        'signs'    => ['Progressive weakness', 'Frequent falls', 'Difficulty climbing stairs', 'Muscle tightness'],
        'care'     => ['Gentle strengthening', 'Stretching to prevent contractures', 'Advice on mobility aids', 'Breathing exercises'],
    ],
    'child-therapy' => [
        'overview' => 'Physiotherapy for babies and children with delayed milestones, posture problems, torticollis, injuries or neurological conditions — delivered through play.',
        'signs_label' => 'When to see us',
        'signs'    => ['Late sitting, crawling or walking', 'Poor balance or frequent falls', 'Head tilt or flat spot on the head', 'Pain or injury from sport or play'],
        'care'     => ['Play-based exercises', 'Developmental milestone training', 'Posture & balance work', 'Home programme for parents'],
    ],
];

// ---------------------------------------------------------------------------
// Specialities (therapies offered)
// ---------------------------------------------------------------------------
$specialities = [
    ['slug' => 'manual-therapy', 'name' => 'Manual Therapy'],
    ['slug' => 'laser-therapy', 'name' => 'Laser Therapy'],
    ['slug' => 'taping', 'name' => 'Taping Techniques'],
    ['slug' => 'strength-training', 'name' => 'Strength Training'],
    ['slug' => 'pre-post-operative', 'name' => 'Pre & Post Operative Care'],
    ['slug' => 'joint-mobilization', 'name' => 'Advanced Joint Mobilization'],
];

// ---------------------------------------------------------------------------
// Navigation
//   'children' => simple dropdown, 'mega' => true => treatments mega menu
// ---------------------------------------------------------------------------
$nav = [
    ['id' => 'home', 'label' => 'Home', 'url' => 'index.php'],
    ['id' => 'about', 'label' => 'About Us', 'url' => 'about.php', 'children' => [
        ['label' => 'About the Clinic', 'url' => 'about.php'],
        // 'id' marks a child that is its own page: highlights "About Us" there
        // and builds the breadcrumb Home › About Us › Dr. Y. Abhilash (PT)
        ['id' => 'doctors', 'label' => 'Dr. Y. Abhilash (PT)', 'url' => 'doctors.php'],
        ['id' => 'whychooseus', 'label' => 'Why Choose Us', 'url' => 'whychooseus.php'],
    ]],
    ['id' => 'treatments', 'label' => 'Treatments', 'url' => 'treatments.php', 'mega' => true],
    ['id' => 'specialities', 'label' => 'Specialities', 'url' => 'specialities.php', 'children' => array_map(function ($s) {
        return ['label' => $s['name'], 'url' => 'specialities.php#' . $s['slug']];
    }, $specialities)],
    ['id' => 'faqs', 'label' => "FAQ's", 'url' => 'faqs.php'],
    ['id' => 'gallery', 'label' => 'Gallery', 'url' => 'gallery.php'],
    ['id' => 'contact', 'label' => 'Contact Us', 'url' => 'contact.php'],
];

$megaPromo = [
    'title' => "Not sure what's causing your pain?",
    'text'  => 'Get a one-on-one assessment and a recovery plan built for you.',
    'cta'   => 'Book Free Assessment',
];

// ---------------------------------------------------------------------------
// Home: hero slides
// ---------------------------------------------------------------------------
$heroSlides = [
    [
        'image'  => 'banner01',
        'focus'  => '',
        'alt'    => 'Physiotherapist guiding a patient through an assisted leg stretch',
        'badges' => [['heart', 'Adult & Child Rehabilitation'], ['shield', 'Regd. Physiotherapist · No. 08928']],
        'title'  => 'Move Freely Again with',
        'highlight' => 'Expert Physiotherapy',
        'lead'   => 'Personalised care for back, neck and joint pain, sports injuries and neuro rehabilitation — by Dr. Y. Abhilash (PT).',
        'link'   => ['label' => 'Explore Treatments', 'url' => 'treatments.php'],
    ],
    [
        'image'  => 'banner02',
        'focus'  => 'right',
        'alt'    => 'Physiotherapist supporting a patient during sling suspension therapy',
        'badges' => [['bolt', 'Sports Injury Care'], ['shield', 'Pre & Post Operative Rehab']],
        'title'  => 'Recover Stronger After',
        'highlight' => 'Injury & Surgery',
        'lead'   => 'Manual therapy, laser therapy, taping and guided strength training to get you back to work, play and everyday life.',
        'link'   => ['label' => 'Our Specialities', 'url' => 'specialities.php'],
    ],
    [
        'image'  => 'banner03',
        'focus'  => 'left',
        'alt'    => 'Physiotherapist guiding a patient through a shoulder strengthening exercise',
        'badges' => [['clock', 'Open 7 Days a Week'], ['heart', 'Neuro Rehabilitation']],
        'title'  => 'Regain Strength &',
        'highlight' => 'Independence',
        'lead'   => "Dedicated rehab for hemiplegia, paraplegia, Parkinson's disease, Bell's palsy, foot drop and more.",
        'link'   => ['label' => 'Neuro Rehab', 'url' => 'treatments.php#hemiplegia'],
    ],
];

// ---------------------------------------------------------------------------
// Home: about highlights
// ---------------------------------------------------------------------------
$aboutFeatures = [
    ['icon' => 'family', 'title' => 'Adult & Child Rehab', 'text' => 'Care for every age'],
    ['icon' => 'hand', 'title' => 'Manual & Laser Therapy', 'text' => 'Hands-on, targeted relief'],
    ['icon' => 'clipboard-plus', 'title' => 'Pre & Post Operative', 'text' => 'Rehab around your surgery'],
    ['icon' => 'clock', 'title' => 'Open 7 Days', 'text' => 'Mon–Sat all day, Sun mornings'],
];

// ---------------------------------------------------------------------------
// Home: journey to recovery
// ---------------------------------------------------------------------------
$journeySteps = [
    // show_hours: appends the opening hours from $site['hours']
    ['icon' => 'calendar', 'title' => 'Book Your Visit', 'text' => 'Call, WhatsApp or book online.', 'show_hours' => true],
    ['icon' => 'assess', 'title' => 'Detailed Assessment', 'text' => 'We examine your posture, movement, strength and pain to find the real cause — not just the symptoms.'],
    ['icon' => 'plan', 'title' => 'Personalised Plan', 'text' => 'A treatment plan with clear goals, built around your condition, routine and lifestyle.'],
    ['icon' => 'treat', 'title' => 'Hands-on Treatment', 'text' => 'Manual therapy, laser therapy, taping, joint mobilisation and guided strength training.'],
    ['icon' => 'recover', 'title' => 'Recover & Stay Strong', 'text' => 'Progress reviews and a home exercise programme to keep you pain-free for the long run.'],
];

// ---------------------------------------------------------------------------
// About page
// ---------------------------------------------------------------------------
$aboutPage = [
    'banner' => [
        'title'     => 'About',
        'highlight' => 'New Life Physiotherapy',
        'lead'      => 'Expert, personalised physiotherapy for adults and children — led by Dr. Y. Abhilash (PT).',
        'image'     => 'banner02',
    ],

    'who' => [
        'eyebrow'   => 'Who We Are',
        'title'     => 'A Clinic Built Around',
        'highlight' => 'Your Recovery',
        'paragraphs' => [
            'New Life Physiotherapy Clinic was founded on a simple belief: everyone deserves to move without pain. Led by Dr. Y. Abhilash (PT), a registered physiotherapist (Regd. No. 08928), we help adults and children recover from pain, injury, surgery and neurological conditions.',
            'We combine hands-on treatment with clear explanations and exercise plans you can follow at home — so you understand your recovery and stay strong long after your last session.',
        ],
        'mission' => 'To help every patient move freely and live pain-free through expert, personalised physiotherapy.',
        'vision'  => "To be {city}'s most trusted clinic for adult and child rehabilitation.",
        'image'   => 'banner01',
    ],

    'apart' => [
        'eyebrow'   => 'Why Choose Us',
        'title'     => 'What Sets',
        'highlight' => 'Us Apart',
        'lead'      => 'Good physiotherapy is more than a set of exercises. Here is what you can expect every time you visit us.',
        'points'    => [
            ['icon' => 'shield', 'title' => 'Registered Physiotherapist', 'text' => 'Your care is led by Dr. Y. Abhilash (PT), Regd. No. 08928 — qualified, accountable and focused on your recovery.'],
            ['icon' => 'assess', 'title' => 'Root-Cause Assessment', 'text' => 'We look beyond the pain to how you move, sit and work, so treatment targets the real problem.'],
            ['icon' => 'plan', 'title' => 'Personalised Plans', 'text' => 'No one-size-fits-all routines — every plan is built around your condition, goals and daily life.'],
            ['icon' => 'hand', 'title' => 'Hands-on Techniques', 'text' => 'Manual therapy, laser therapy, taping and joint mobilisation, combined with guided exercise.'],
            ['icon' => 'family', 'title' => 'Adults & Children', 'text' => 'From sports injuries and stroke rehab to child therapy — specialised care for every age.'],
            ['icon' => 'clock', 'title' => 'Open 7 Days', 'text' => 'Mornings and evenings Monday to Saturday, plus Sunday mornings — care that fits around work and school.'],
        ],
    ],
];

// ---------------------------------------------------------------------------
// Doctor profile page
// Credentials left empty are simply not shown; fill them in and they appear.
// ---------------------------------------------------------------------------
$doctorPage = [
    'banner' => [
        'title'     => 'Meet',
        'highlight' => 'Dr. Y. Abhilash (PT)',
        'lead'      => 'Registered physiotherapist helping adults and children move freely, recover fully and stay strong.',
        'image'     => 'banner03',
    ],

    'profile' => [
        'photo'            => '', // TODO: e.g. 'img/dr-abhilash.jpg' (portrait, ~800x1000); initials show until set
        'qualifications'   => '', // TODO: e.g. 'BPT, MPT (Orthopaedics)'
        'experience_years' => 0,  // TODO: e.g. 10 -> shows "10+ Years Experience"
        'languages'        => '', // TODO: e.g. 'English, Telugu, Hindi'
        'bio' => [
            'Dr. Y. Abhilash (PT) is a registered physiotherapist (Regd. No. 08928) who leads care at New Life Physiotherapy Clinic.',
            'His approach is simple: find the real cause of pain, explain it clearly, and treat it with hands-on therapy and targeted exercise. He works with adults and children across orthopaedic, sports and neurological conditions — from back pain and frozen shoulder to stroke rehabilitation and Parkinson\'s disease.',
        ],
    ],

    'experience' => [
        'eyebrow'   => 'Clinical Experience',
        'title'     => 'Areas of',
        'highlight' => 'Expertise',
        'lead'      => 'Hands-on experience across the full range of conditions treated at the clinic.',
        // 'cat' pulls the matching conditions from $treatments; 'items' lists them by hand
        'areas' => [
            ['cat' => 'spine', 'icon' => 'spine', 'title' => 'Spine & Back Rehabilitation', 'text' => 'Assessment and rehab for neck and back pain, disc problems and nerve pain.'],
            ['cat' => 'joints', 'icon' => 'knee', 'title' => 'Joint & Sports Injuries', 'text' => 'Restoring movement and strength after joint, ligament and sports injuries.'],
            ['cat' => 'neuro', 'icon' => 'brain', 'title' => 'Neurological Rehabilitation', 'text' => 'Long-term rehab to rebuild movement, balance and independence.'],
            ['icon' => 'clipboard-plus', 'title' => 'Pre & Post Operative Care', 'text' => 'Preparing the body for surgery and guiding a safe, steady recovery afterwards.', 'items' => ['Pre-surgery conditioning', 'Post-surgery rehab', 'Joint mobilisation', 'Strength training']],
            ['icon' => 'child', 'title' => 'Child Therapy', 'text' => 'Gentle, play-based physiotherapy that helps children move, grow and thrive.', 'items' => ['Play-based therapy', 'Posture & movement', 'Parent guidance']],
        ],
        // TODO: career history, newest first. Shown as a timeline once filled:
        //   ['period' => '2019 – Present', 'title' => 'Physiotherapist', 'place' => 'New Life Physiotherapy Clinic, Hyderabad'],
        'timeline' => [],
    ],

    'advantages' => [
        'eyebrow'   => 'Why Patients Choose Him',
        'title'     => 'Advantages of Treating with',
        'highlight' => 'Dr. Abhilash',
        'points'    => [
            ['icon' => 'shield', 'title' => 'Registered & Accountable', 'text' => 'Registered physiotherapist, Regd. No. 08928 — your care is in qualified hands.'],
            ['icon' => 'assess', 'title' => 'A Diagnosis You Understand', 'text' => 'Your condition explained in plain language, with a clear plan and milestones.'],
            ['icon' => 'hand', 'title' => 'Hands-on Expertise', 'text' => 'Manual therapy, laser therapy, taping and joint mobilisation tailored to your body.'],
            ['icon' => 'family', 'title' => 'Adults & Children', 'text' => 'Experience across orthopaedic, sports, neurological and child physiotherapy.'],
            ['icon' => 'plan', 'title' => 'Home Exercise Programme', 'text' => 'Simple exercises to do at home so your progress continues between visits.'],
            ['icon' => 'clock', 'title' => 'Flexible Timings', 'text' => 'Morning and evening slots six days a week, plus Sunday mornings.'],
        ],
    ],
];

// ---------------------------------------------------------------------------
// Why Choose Us page
// (also reuses $aboutPage['apart'] and $journeySteps)
// ---------------------------------------------------------------------------
$whyPage = [
    'banner' => [
        'title'     => 'Why',
        'highlight' => 'Choose Us',
        'lead'      => 'Care that listens, explains and adapts — so you recover faster and stay strong.',
        'image'     => 'banner01',
    ],

    'promise' => [
        'eyebrow'   => 'Our Care Promise',
        'title'     => 'What You Can Count On,',
        'highlight' => 'Every Visit',
        'lead'      => 'Five commitments that shape how we treat every patient, from the first call to the final session.',
        'image'     => 'banner02',
        'badge'     => ['title' => 'Free Consultation', 'text' => 'Talk to us before you commit'],
        'items'     => [
            ['title' => 'We listen first', 'text' => 'Every visit starts with your story — your pain, your routine and what you want to get back to.'],
            ['title' => 'We explain clearly', 'text' => 'You will always know what is causing your pain and what each part of your treatment is for.'],
            ['title' => 'We tailor every plan', 'text' => 'Your plan is built around your condition, your goals and your daily life — never copied from someone else\'s.'],
            ['title' => 'We track your progress', 'text' => 'Regular reviews show how far you have come, and your plan changes as you improve.'],
            ['title' => 'We are honest with you', 'text' => 'If physiotherapy is not the right answer for your problem, we will tell you and point you in the right direction.'],
        ],
    ],
];

// Closing call-to-action band (any page)
$ctaBand = [
    'title'     => 'Ready to Start Your',
    'highlight' => 'Recovery?',
    'text'      => 'Book a free consultation with Dr. Y. Abhilash (PT) — or call us and we will find a time that suits you.',
];

// ---------------------------------------------------------------------------
// Footer
// ---------------------------------------------------------------------------
$footerServices = [
    ['label' => 'Back & Neck Pain', 'url' => 'treatments.php#low-back-ache'],
    ['label' => 'Sports Injuries', 'url' => 'treatments.php#sports-injuries'],
    ['label' => 'Frozen Shoulder', 'url' => 'treatments.php#adhesive-capsulitis'],
    ['label' => 'Sciatica', 'url' => 'treatments.php#sciatica'],
    ['label' => 'Neuro Rehab', 'url' => 'treatments.php#hemiplegia'],
    ['label' => 'Child Therapy', 'url' => 'treatments.php#child-therapy'],
];

$legalLinks = [
    ['label' => 'Privacy Policy', 'url' => 'privacy-policy.php'],
    ['label' => 'Terms of Use', 'url' => 'terms.php'],
];

$socialNetworks = [
    'facebook'  => ['label' => 'Facebook', 'icon' => 'facebook', 'class' => 'ft-social__fb'],
    'instagram' => ['label' => 'Instagram', 'icon' => 'instagram', 'class' => 'ft-social__ig'],
    'youtube'   => ['label' => 'YouTube', 'icon' => 'youtube', 'class' => 'ft-social__yt'],
];

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
        'street'      => '1st Floor, 5-1/33, Rd No: 6, Beside Olive Mithai, Alkapoor Township, Puppalaguda, Manikonda',
        'city'        => 'Hyderabad',
        'region'      => 'Telangana',
        'region_code' => 'IN-TG',
        'postal_code' => '', // TODO
        'country'     => 'IN',
    ],

    // Google Map on the contact page. 'query' is what the map searches for:
    // the clinic's exact Google Maps business name / address, or "lat,lng".
    // TODO: set once the clinic is listed on Google Maps (empty = name + address).
    'map' => [
        'query' => '',
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

    // Analytics & search engine verification. Empty values output nothing,
    // so no tracking runs until a real ID is set.
    'analytics' => [
        'ga4_id'            => '', // TODO: GA4 Measurement ID, e.g. 'G-XXXXXXXXXX' (Admin › Data streams)
        'gsc_verification'  => '', // TODO: Google Search Console HTML-tag content value
        'bing_verification' => '', // TODO: Bing Webmaster Tools msvalidate.01 content value
    ],

    'whatsapp_messages' => [
        'book'  => 'Hi, I would like to book an appointment',
        'query' => 'Hi, I would like to ask about a treatment',
    ],
];

// ---------------------------------------------------------------------------
// Treatments (conditions we treat) — also the "Conditions We Treat" mega menu
// ---------------------------------------------------------------------------
$treatmentCategories = [
    'ortho'  => 'Orthopaedic',
    'neuro'  => 'Neurological',
    'paeds'  => 'Paediatric',
];

$treatments = [
    // Orthopaedic
    ['slug' => 'osteoarthritis', 'name' => 'Osteoarthritis – Knee, Hip & Shoulder', 'cat' => 'ortho', 'icon' => 'knee', 'text' => 'Ease joint pain and stiffness and keep knees, hips and shoulders moving.'],
    ['slug' => 'rheumatoid-arthritis', 'name' => 'Rheumatoid Arthritis', 'cat' => 'ortho', 'icon' => 'hand', 'text' => 'Protect your joints, reduce pain and keep hands and limbs working.'],
    ['slug' => 'frozen-shoulder', 'name' => 'Frozen Shoulder', 'cat' => 'ortho', 'icon' => 'shoulder', 'text' => 'Regain your reach and sleep without shoulder pain.'],
    ['slug' => 'tennis-golfers-elbow', 'name' => "Tennis Elbow / Golfer's Elbow", 'cat' => 'ortho', 'icon' => 'elbow', 'text' => 'Relief for elbow pain that makes gripping and lifting hard.'],
    ['slug' => 'ligament-injuries', 'name' => 'Ligament Injuries – ACL, MCL, etc.', 'cat' => 'ortho', 'icon' => 'knee', 'text' => 'Rehab for sprains and ligament tears, with or without surgery.'],
    ['slug' => 'meniscus-tears', 'name' => 'Meniscus Tears', 'cat' => 'ortho', 'icon' => 'knee', 'text' => 'Settle knee pain, locking and swelling and rebuild knee strength.'],
    ['slug' => 'fracture-rehabilitation', 'name' => 'Fracture Rehabilitation', 'cat' => 'ortho', 'icon' => 'recover', 'text' => 'Restore movement and strength after a fracture or plaster.'],
    ['slug' => 'disc-bulge', 'name' => 'Disc Bulge / Herniated Disc', 'cat' => 'ortho', 'icon' => 'disc', 'text' => 'Take pressure off irritated nerves and rebuild core support.'],
    ['slug' => 'sciatica', 'name' => 'Sciatica', 'cat' => 'ortho', 'icon' => 'nerve', 'text' => 'Calm shooting pain that runs from the lower back down the leg.'],
    ['slug' => 'spondylosis', 'name' => 'Spondylosis – Cervical / Lumbar', 'cat' => 'ortho', 'icon' => 'spine', 'text' => 'Relief for neck and back wear that causes pain and stiffness.'],
    ['slug' => 'rotator-cuff-injuries', 'name' => 'Rotator Cuff Injuries', 'cat' => 'ortho', 'icon' => 'shoulder', 'text' => 'Heal shoulder tendon strains and tears and lift without pain.'],
    ['slug' => 'plantar-fasciitis', 'name' => 'Plantar Fasciitis', 'cat' => 'ortho', 'icon' => 'foot', 'text' => 'Beat that sharp first-step heel pain in the morning.'],
    ['slug' => 'carpal-tunnel-syndrome', 'name' => 'Carpal Tunnel Syndrome', 'cat' => 'ortho', 'icon' => 'hand', 'text' => 'Ease hand tingling, numbness and weak grip.'],
    ['slug' => 'post-operative-rehabilitation', 'name' => 'Post-Operative Rehabilitation – Knee / Hip / Spine', 'cat' => 'ortho', 'icon' => 'clipboard-plus', 'text' => 'Safe, steady recovery after joint replacement and spine surgery.'],
    // Neurological
    ['slug' => 'stroke', 'name' => 'Stroke (CVA)', 'cat' => 'neuro', 'icon' => 'brain', 'text' => 'Regain movement, balance and independence after a stroke.'],
    ['slug' => 'traumatic-brain-injury', 'name' => 'Traumatic Brain Injury (TBI)', 'cat' => 'neuro', 'icon' => 'brain', 'text' => 'Rebuild movement, coordination and daily function after a head injury.'],
    ['slug' => 'spinal-cord-injury', 'name' => 'Spinal Cord Injury (SCI)', 'cat' => 'neuro', 'icon' => 'wheelchair', 'text' => 'Strength, transfer and mobility training for greater independence.'],
    ['slug' => 'parkinsons-disease', 'name' => "Parkinson's Disease", 'cat' => 'neuro', 'icon' => 'brain', 'text' => 'Improve balance, walking and ease of daily movement.'],
    ['slug' => 'multiple-sclerosis', 'name' => 'Multiple Sclerosis', 'cat' => 'neuro', 'icon' => 'nerve', 'text' => 'Manage fatigue and keep strength, balance and mobility.'],
    ['slug' => 'guillain-barre-syndrome', 'name' => 'Guillain-Barré Syndrome', 'cat' => 'neuro', 'icon' => 'nerve', 'text' => 'Step-by-step rehab to rebuild strength and walking.'],
    // Paediatric
    ['slug' => 'cerebral-palsy', 'name' => 'Cerebral Palsy (CP)', 'cat' => 'paeds', 'icon' => 'child', 'text' => 'Play-based therapy for movement, posture and independence.'],
    ['slug' => 'developmental-delay', 'name' => 'Developmental Delay', 'cat' => 'paeds', 'icon' => 'child', 'text' => 'Help your child reach sitting, crawling and walking milestones.'],
    ['slug' => 'hypotonia-hypertonia', 'name' => 'Hypotonia / Hypertonia', 'cat' => 'paeds', 'icon' => 'muscle', 'text' => 'Balance low or high muscle tone for better control and movement.'],
];

// Featured card at the end of the home services grid (shown under Paediatric)
$childTherapy = [
    'tag'   => 'Child Therapy',
    'title' => 'Gentle, play-based physiotherapy for children',
    'text'  => 'We help little ones move, grow and thrive with care that feels like play — and guidance for parents at every step.',
    'cta'   => 'Book a Child Assessment',
];

// Extra choices in the booking forms' condition dropdown
$bookingExtraOptions = ['Back / Neck Pain', 'Sports Injury', 'Other / Not sure'];

// Treatments page
$treatmentsPage = [
    'banner' => [
        'title'     => 'Conditions We',
        'highlight' => 'Treat',
        'lead'      => 'Find your condition, learn the common signs and see how physiotherapy can help you recover.',
        'image'     => 'banner02',
    ],
];

// Treatments page: intro for each category group
$treatmentCategoryInfo = [
    'ortho' => ['icon' => 'knee', 'text' => 'Bone, joint, muscle, ligament and spine problems — from arthritis and sports injuries to disc problems and recovery after surgery.'],
    'neuro' => ['icon' => 'brain', 'text' => 'Rehabilitation after stroke, brain and spinal cord injury, and for progressive neurological conditions — to rebuild movement and independence.'],
    'paeds' => ['icon' => 'child', 'text' => 'Gentle, play-based physiotherapy that helps babies and children move, grow and reach their milestones.'],
];

// Treatments page: detail for each condition, keyed by slug.
// signs = what patients notice, care = how physiotherapy helps.
$treatmentDetails = [
    // ---------- Orthopaedic ----------
    'osteoarthritis' => [
        'overview' => 'Wear of the cartilage that cushions the joints, most often in the knees, hips and shoulders. It causes pain, stiffness and swelling, and makes walking, climbing stairs or lifting the arm harder.',
        'signs'    => ['Pain on walking, stairs or lifting the arm', 'Morning stiffness that eases with movement', 'Swelling or a grinding feeling in the joint', 'Reduced range of movement'],
        'care'     => ['Joint mobilisation & manual therapy', 'Strengthening of the muscles around the joint', 'Laser therapy for pain relief', 'Activity, weight and footwear advice'],
    ],
    'rheumatoid-arthritis' => [
        'overview' => 'An autoimmune condition that inflames the lining of the joints, often the hands, wrists and feet on both sides. Physiotherapy protects the joints and keeps you active alongside your medical treatment.',
        'signs'    => ['Painful, swollen joints on both sides', 'Morning stiffness lasting over 30 minutes', 'Weak grip', 'Tiredness'],
        'care'     => ['Gentle range-of-motion exercises', 'Joint protection techniques', 'Strengthening & hand therapy', 'Pain relief with laser and heat'],
    ],
    'frozen-shoulder' => [
        'overview' => 'Adhesive capsulitis: the capsule around the shoulder joint becomes thick and tight, causing pain and a gradual loss of movement. It is more common in people with diabetes and after an injury.',
        'signs'    => ['Shoulder pain, often worse at night', 'Difficulty reaching up or behind your back', 'Trouble dressing or combing hair', 'Movement that slowly gets stiffer'],
        'care'     => ['Joint mobilisation (Maitland, Mulligan)', 'Stretching & range-of-motion exercises', 'Laser therapy for pain', 'Home exercise programme'],
    ],
    'tennis-golfers-elbow' => [
        'overview' => 'Overuse of the forearm tendons that attach at the elbow — on the outer side in tennis elbow and the inner side in golfer\'s elbow. Common with repetitive gripping, typing, lifting and sport.',
        'signs'    => ['Pain on the outer or inner elbow', 'Pain when gripping, lifting or twisting', 'Weak grip', 'Tenderness over the elbow bone'],
        'care'     => ['Graded tendon strengthening', 'Soft tissue release', 'Taping or an elbow strap', 'Activity and ergonomic advice'],
    ],
    'ligament-injuries' => [
        'overview' => 'Sprains and tears of the ligaments that hold a joint together — such as the ACL and MCL of the knee or the ligaments of the ankle — usually from a twist, fall or sports injury.',
        'signs'    => ['Pain and swelling after a twist or fall', 'Knee or ankle "giving way"', 'Difficulty putting weight on the leg', 'Bruising around the joint'],
        'care'     => ['Swelling control & early movement', 'Progressive strengthening', 'Balance & stability training', 'Return-to-sport rehab, with or without surgery'],
    ],
    'meniscus-tears' => [
        'overview' => 'A tear in the C-shaped cartilage that cushions the knee, often from twisting on a bent knee or from wear with age. Many tears improve well with the right physiotherapy.',
        'signs'    => ['Knee pain on twisting or squatting', 'Swelling or stiffness', 'Catching or locking of the knee', 'Feeling the knee may give way'],
        'care'     => ['Swelling and pain management', 'Quadriceps & hip strengthening', 'Balance and movement retraining', 'Rehab before or after arthroscopy'],
    ],
    'fracture-rehabilitation' => [
        'overview' => 'After a broken bone has been fixed with plaster, plates or rods, the nearby joints and muscles are often stiff and weak. Rehabilitation restores movement, strength and confidence.',
        'signs_label' => 'When to see us',
        'signs'    => ['Stiffness after the plaster is removed', 'Weakness or muscle wasting', 'Difficulty walking or using the arm', 'Swelling around the old fracture'],
        'care'     => ['Joint mobilisation for stiffness', 'Progressive strengthening', 'Walking & balance training', 'Scar and soft tissue care'],
    ],
    'disc-bulge' => [
        'overview' => 'The soft disc between two vertebrae bulges or herniates and can press on a nerve, causing back or neck pain that may spread into the arm or leg. Most cases improve without surgery.',
        'signs'    => ['Back or neck pain', 'Pain radiating into the arm or leg', 'Numbness or tingling', 'Pain on bending, sitting or coughing'],
        'care'     => ['Pain relief & positions of ease', 'McKenzie and spinal mobilisation', 'Core stabilisation', 'Posture and lifting advice'],
    ],
    'sciatica' => [
        'overview' => 'Irritation of the sciatic nerve, often from a disc problem or tight muscles in the lower back and buttock, causing pain that travels down the back of the leg.',
        'signs'    => ['Shooting pain down the leg', 'Numbness or tingling in the foot', 'Pain worse on sitting', 'Weakness in the leg'],
        'care'     => ['Neural mobilisation', 'Manual therapy for the lower back', 'Core & hip strengthening', 'Laser therapy for nerve pain'],
    ],
    'spondylosis' => [
        'overview' => 'Age-related wear of the discs and joints of the spine, in the neck (cervical) or lower back (lumbar). It can cause stiffness, pain and sometimes pressure on the nerves.',
        'signs'    => ['Neck or back stiffness', 'Pain that worsens with long sitting', 'Tingling or numbness in arms or legs', 'Headaches starting from the neck'],
        'care'     => ['Manual therapy & mobilisation', 'Posture correction', 'Strengthening & stretching', 'Ergonomic advice'],
    ],
    'rotator-cuff-injuries' => [
        'overview' => 'Strains, inflammation or tears of the four rotator cuff tendons that keep the shoulder stable — from overuse, lifting, a fall or age-related wear.',
        'signs'    => ['Pain when lifting the arm', 'Pain lying on the shoulder at night', 'Weakness reaching overhead', 'Clicking or catching in the shoulder'],
        'care'     => ['Rotator cuff strengthening', 'Shoulder blade (scapular) control', 'Manual therapy & taping', 'Rehab after rotator cuff repair'],
    ],
    'plantar-fasciitis' => [
        'overview' => 'Irritation of the thick band of tissue under the foot, causing heel pain — classically sharp with the first steps in the morning. Often linked with heel spurs, standing for long hours and unsupportive footwear.',
        'signs'    => ['Sharp heel pain on first steps', 'Pain after long standing', 'Tenderness under the heel', 'Pain that eases with walking, then returns'],
        'care'     => ['Stretching of the calf and foot', 'Taping & footwear advice', 'Laser therapy', 'Foot and calf strengthening'],
    ],
    'carpal-tunnel-syndrome' => [
        'overview' => 'Pressure on the median nerve as it passes through the wrist, causing tingling, numbness and weakness in the thumb and fingers. Common with repetitive hand use and in pregnancy.',
        'signs'    => ['Tingling in the thumb and first fingers', 'Symptoms worse at night', 'Weak grip, dropping objects', 'Numbness when typing or holding a phone'],
        'care'     => ['Nerve and tendon gliding exercises', 'Wrist splinting advice', 'Laser therapy', 'Ergonomic and activity advice'],
    ],
    'post-operative-rehabilitation' => [
        'overview' => 'Physiotherapy after knee or hip replacement, ACL reconstruction, arthroscopy and spine surgery to restore movement, strength and walking — following your surgeon\'s protocol.',
        'signs_label' => 'When to see us',
        'signs'    => ['After knee or hip replacement', 'After spine or disc surgery', 'After ligament or arthroscopic surgery', 'Stiffness or weakness after an operation'],
        'care'     => ['Pain and swelling control', 'Range-of-motion recovery', 'Progressive strengthening', 'Walking & balance training'],
    ],

    // ---------- Neurological ----------
    'stroke' => [
        'overview' => 'A stroke (cerebrovascular accident) damages part of the brain and often weakens one side of the body (hemiplegia). Early, regular physiotherapy helps the brain relearn movement.',
        'signs'    => ['Weakness on one side of the body', 'Difficulty walking or balancing', 'Stiffness or spasticity', 'Reduced hand and arm use'],
        'care'     => ['Task-based movement training', 'Balance & walking practice', 'Spasticity management', 'Family training for home exercises'],
    ],
    'traumatic-brain-injury' => [
        'overview' => 'Injury to the brain from a fall, accident or blow to the head can affect movement, balance, coordination and stamina. Rehabilitation is tailored to each person\'s stage of recovery.',
        'signs'    => ['Poor balance and coordination', 'Weakness or stiffness in the limbs', 'Fatigue', 'Difficulty with daily activities'],
        'care'     => ['Balance and coordination training', 'Strengthening & mobility', 'Functional task practice', 'Gradual endurance building'],
    ],
    'spinal-cord-injury' => [
        'overview' => 'Damage to the spinal cord can cause weakness or paralysis below the injury — in the legs (paraplegia) or in the arms and legs (quadriplegia). Rehab focuses on independence and preventing complications.',
        'signs'    => ['Weakness or paralysis', 'Loss of sensation', 'Muscle stiffness or spasms', 'Difficulty with transfers and mobility'],
        'care'     => ['Strengthening of working muscles', 'Transfer & wheelchair skills', 'Standing and walking training where possible', 'Stretching to prevent contractures'],
    ],
    'parkinsons-disease' => [
        'overview' => 'A progressive condition that affects movement, causing slowness, stiffness, tremor and balance problems. Regular exercise helps people stay mobile and independent for longer.',
        'signs'    => ['Slow, shuffling steps', 'Stiffness', 'Freezing when walking', 'Balance problems and falls'],
        'care'     => ['Big-movement & gait training', 'Balance and falls prevention', 'Cueing strategies for freezing', 'Flexibility & strength'],
    ],
    'multiple-sclerosis' => [
        'overview' => 'A long-term condition in which the immune system affects the nerves of the brain and spinal cord, causing fatigue, weakness, stiffness and balance problems that can come and go.',
        'signs'    => ['Fatigue', 'Weakness or heaviness in the legs', 'Balance problems', 'Stiffness or spasms'],
        'care'     => ['Energy-saving strategies', 'Strength and balance training', 'Stretching for spasticity', 'Walking and mobility aids advice'],
    ],
    'guillain-barre-syndrome' => [
        'overview' => 'A rare condition in which the immune system attacks the nerves, causing weakness that can spread quickly. Most people recover well with time and structured rehabilitation.',
        'signs'    => ['Weakness starting in the legs', 'Tingling in the hands and feet', 'Difficulty walking', 'Fatigue'],
        'care'     => ['Gentle, graded strengthening', 'Breathing exercises', 'Walking and balance retraining', 'Fatigue management'],
    ],

    // ---------- Paediatric ----------
    'cerebral-palsy' => [
        'overview' => 'A group of conditions caused by changes in the developing brain that affect movement, muscle tone and posture. Physiotherapy helps children move as freely and independently as possible.',
        'signs_label' => 'What we see',
        'signs'    => ['Stiff or floppy muscles', 'Delayed sitting, crawling or walking', 'Poor balance', 'Unusual posture or walking pattern'],
        'care'     => ['Play-based movement therapy', 'Stretching & positioning', 'Balance and walking training', 'Home programme for parents'],
    ],
    'developmental-delay' => [
        'overview' => 'When a baby or child reaches motor milestones — such as head control, sitting, crawling or walking — later than expected. Early physiotherapy makes a real difference.',
        'signs_label' => 'When to see us',
        'signs'    => ['Late head control or sitting', 'Not crawling or walking on time', 'Frequent falls or clumsiness', 'Using one side more than the other'],
        'care'     => ['Milestone-based play therapy', 'Strength and balance activities', 'Posture work', 'Guidance for parents at home'],
    ],
    'hypotonia-hypertonia' => [
        'overview' => 'Hypotonia is low muscle tone ("floppy" muscles); hypertonia is high muscle tone (stiff, tight muscles). Both affect posture, movement and milestones, and respond well to targeted therapy.',
        'signs_label' => 'What we see',
        'signs'    => ['Floppy or very stiff muscles', 'Poor head and trunk control', 'Delayed milestones', 'Tight joints or toe-walking'],
        'care'     => ['Tone-specific exercises', 'Stretching or strengthening as needed', 'Positioning & handling advice', 'Play-based motor training'],
    ],
];

// ---------------------------------------------------------------------------
// Specialities (therapies offered)
// ---------------------------------------------------------------------------
// 'page' => true: the speciality has its own page, <slug>.php
$specialities = [
    ['slug' => 'manual-therapy', 'name' => 'Manual Therapy', 'page' => true],
    ['slug' => 'laser-therapy', 'name' => 'Laser Therapy', 'page' => true],
    ['slug' => 'taping-techniques', 'name' => 'Taping Techniques', 'page' => true],
    ['slug' => 'strength-training', 'name' => 'Strength Training', 'page' => true],
    ['slug' => 'pre-post-operative-care', 'name' => 'Pre & Post-Operative Management', 'page' => true],
    ['slug' => 'advance-joint-mobilization', 'name' => 'Advanced Joint Mobilizations', 'page' => true],
];

// ---------------------------------------------------------------------------
// Services (services.php, one section each at #<slug>)
//   conditions: slugs from $treatments, shown as links on the services page
//   related:    slug of a speciality page to link to ('' = none)
// ---------------------------------------------------------------------------
$services = [
    [
        'slug' => 'orthopaedic-physiotherapy', 'name' => 'Orthopaedic Physiotherapy', 'icon' => 'knee',
        'text' => 'Assessment and treatment of bone, joint, muscle, ligament and spine problems — from arthritis and stiff joints to back pain and injuries. We find the cause of your pain and restore pain-free movement with hands-on therapy and targeted exercise.',
        'offer' => ['Detailed musculoskeletal assessment', 'Manual therapy & joint mobilisation', 'Strengthening and flexibility programmes', 'Posture and ergonomic correction', 'Laser therapy and taping for pain relief'],
        'conditions' => ['osteoarthritis', 'frozen-shoulder', 'spondylosis', 'disc-bulge', 'sciatica', 'tennis-golfers-elbow', 'plantar-fasciitis', 'rheumatoid-arthritis'],
        'related' => 'manual-therapy',
    ],
    [
        'slug' => 'neurological-physiotherapy', 'name' => 'Neurological Physiotherapy', 'icon' => 'brain',
        'text' => 'Rehabilitation for conditions of the brain, spinal cord and nerves. We help you regain movement, balance and independence through task-based training, and teach your family how to support your progress at home.',
        'offer' => ['Movement and motor control retraining', 'Balance, gait and falls-prevention training', 'Spasticity and stiffness management', 'Transfer and mobility skills', 'Home programme and family training'],
        'conditions' => ['stroke', 'traumatic-brain-injury', 'spinal-cord-injury', 'parkinsons-disease', 'multiple-sclerosis', 'guillain-barre-syndrome'],
        'related' => 'strength-training',
    ],
    [
        'slug' => 'paediatric-physiotherapy', 'name' => 'Paediatric Physiotherapy / Child Rehabilitation', 'icon' => 'child',
        'text' => 'Gentle, play-based physiotherapy for babies and children with delayed milestones, muscle tone problems and neurological conditions. Therapy feels like play, and parents learn simple activities to continue at home.',
        'offer' => ['Developmental milestone assessment', 'Play-based motor therapy', 'Posture, balance and walking training', 'Positioning and handling advice', 'Parent guidance and home programme'],
        'conditions' => ['cerebral-palsy', 'developmental-delay', 'hypotonia-hypertonia'],
        'related' => '',
    ],
    [
        'slug' => 'sports-injury-rehabilitation', 'name' => 'Sports Injury Rehabilitation', 'icon' => 'run',
        'text' => 'Complete rehab for sprains, strains, ligament and tendon injuries — from the first days after injury to a safe, confident return to your sport, stronger than before.',
        'offer' => ['Early injury and swelling management', 'Sports taping and support', 'Progressive strength and power training', 'Agility, balance and sport-specific drills', 'Injury-prevention advice'],
        'conditions' => ['ligament-injuries', 'meniscus-tears', 'rotator-cuff-injuries', 'tennis-golfers-elbow', 'plantar-fasciitis'],
        'related' => 'taping-techniques',
    ],
    [
        'slug' => 'post-operative-rehabilitation', 'name' => 'Post-Operative Rehabilitation', 'icon' => 'clipboard-plus',
        'text' => 'Physiotherapy before and after surgery — joint replacement, ligament reconstruction, fracture fixation and spine surgery — following your surgeon\'s protocol for a safe, faster recovery.',
        'offer' => ['Pre-surgery strengthening (prehab)', 'Pain and swelling control', 'Range-of-motion recovery', 'Progressive strengthening', 'Walking, balance and return to activity'],
        'conditions' => ['post-operative-rehabilitation', 'fracture-rehabilitation', 'ligament-injuries', 'meniscus-tears', 'rotator-cuff-injuries'],
        'related' => 'pre-post-operative-care',
    ],
    [
        'slug' => 'pain-management', 'name' => 'Pain Management & Functional Rehabilitation', 'icon' => 'bolt',
        'text' => 'Drug-free relief for acute and long-standing pain — back, neck, joint and nerve pain — combined with rehabilitation that gets you back to work, home and daily activities.',
        'offer' => ['Laser therapy and manual therapy', 'Taping and soft tissue release', 'Graded activity and exercise', 'Posture and body-mechanics training', 'Self-management strategies'],
        'conditions' => ['disc-bulge', 'sciatica', 'spondylosis', 'osteoarthritis', 'carpal-tunnel-syndrome', 'frozen-shoulder'],
        'related' => 'laser-therapy',
    ],
    [
        'slug' => 'functional-training', 'name' => 'Mobility, Strength & Functional Training', 'icon' => 'muscle',
        'text' => 'Supervised exercise programmes that rebuild mobility, strength, balance and stamina — for recovery after illness or injury, healthy ageing and falls prevention.',
        'offer' => ['Mobility and flexibility work', 'Progressive strength training', 'Balance and falls-prevention training', 'Functional tasks — stairs, lifting, getting up', 'Home exercise programme'],
        'conditions' => ['osteoarthritis', 'fracture-rehabilitation', 'stroke', 'parkinsons-disease', 'multiple-sclerosis'],
        'related' => 'strength-training',
    ],
];

// Services page
$servicesPage = [
    'banner' => [
        'title'     => 'Our',
        'highlight' => 'Services',
        'lead'      => 'Complete physiotherapy for adults and children — orthopaedic, neurological, paediatric, sports and post-operative rehabilitation.',
        'image'     => 'banner01',
    ],
    'eyebrow'   => 'What We Offer',
    'title'     => 'Physiotherapy Services for',
    'highlight' => 'Every Stage of Recovery',
    'lead'      => 'Every service starts with a detailed assessment and a plan built around you. Choose a service to learn more.',
];

// ---------------------------------------------------------------------------
// Navigation
//   'children' => simple dropdown, 'mega' => true => treatments mega menu
// ---------------------------------------------------------------------------
$nav = [
    ['id' => 'home', 'label' => 'Home', 'url' => 'index.php'],
    ['id' => 'about', 'label' => 'About Us', 'url' => 'about.php'],
    ['id' => 'doctors', 'label' => 'Our Doctor', 'url' => 'doctors.php'],
    ['id' => 'services', 'label' => 'Services', 'url' => 'services.php', 'children' => array_map(function ($s) {
        return ['label' => $s['name'], 'url' => 'services.php#' . $s['slug']];
    }, $services)],
    ['id' => 'treatments', 'label' => 'Conditions We Treat', 'url' => 'treatments.php', 'mega' => true],
    ['id' => 'specialities', 'label' => 'Specialities', 'url' => 'specialities.php', 'children' => array_map(function ($s) {
        return !empty($s['page'])
            ? ['id' => $s['slug'], 'label' => $s['name'], 'url' => $s['slug'] . '.php']
            : ['label' => $s['name'], 'url' => 'specialities.php#' . $s['slug']];
    }, $specialities)],
    // 'id' marks a child that is its own page: highlights the parent there
    // and builds the breadcrumb, e.g. Home › Patient Resources › FAQs
    ['id' => 'resources', 'label' => 'Patient Resources', 'url' => 'resources.php', 'children' => [
        ['label' => 'Basic Physiotherapy Guidance', 'url' => 'resources.php#guidance'],
        ['label' => 'Rehabilitation Information', 'url' => 'resources.php#rehabilitation'],
        ['id' => 'faq', 'label' => 'FAQs', 'url' => 'faq.php'],
    ]],
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
        'link'   => ['label' => 'Our Services', 'url' => 'services.php'],
    ],
    [
        'image'  => 'banner03',
        'focus'  => 'left',
        'alt'    => 'Physiotherapist guiding a patient through a shoulder strengthening exercise',
        'badges' => [['clock', 'Open 7 Days a Week'], ['heart', 'Neuro Rehabilitation']],
        'title'  => 'Regain Strength &',
        'highlight' => 'Independence',
        'lead'   => "Dedicated rehab after stroke, brain and spinal cord injury, and for Parkinson's disease, multiple sclerosis and more.",
        'link'   => ['label' => 'Neuro Rehab', 'url' => 'services.php#neurological-physiotherapy'],
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
// Home: patient testimonials
// ---------------------------------------------------------------------------
// TODO: sample wording — replace with real patient reviews (with consent).
$testimonials = [
    ['name' => 'Ramesh K.', 'condition' => 'Low Back Pain', 'rating' => 5, 'text' => 'I had back pain for almost two years and could not sit at my desk for long. After six weeks of treatment and the home exercises, I am working full days again without pain.'],
    ['name' => 'Lakshmi P.', 'condition' => 'Frozen Shoulder', 'rating' => 5, 'text' => 'I could not lift my arm to comb my hair. Dr. Abhilash explained every step and was very patient with me. Today I have almost full movement back.'],
    ['name' => 'Arjun S.', 'condition' => 'Sports Injury', 'rating' => 5, 'text' => 'Twisted my knee playing cricket and was worried about missing the season. The strengthening plan got me back on the field in two months, stronger than before.'],
    ['name' => 'Sujatha R.', 'condition' => 'Knee Pain', 'rating' => 5, 'text' => 'Climbing stairs was a struggle because of my knee pain. The treatment was gentle and the exercises easy to follow at home. I now walk every morning comfortably.'],
    ['name' => 'Mahesh V.', 'condition' => 'Stroke Rehabilitation', 'rating' => 5, 'text' => 'After my father\'s stroke he could barely stand. With regular sessions he is now walking with support and doing his daily activities on his own. We are very grateful.'],
    ['name' => 'Priya N.', 'condition' => 'Child Therapy', 'rating' => 5, 'text' => 'Our son looks forward to every session. The therapy is playful but focused, and we have seen real improvement in his balance and confidence.'],
    ['name' => 'Kiran T.', 'condition' => 'Neck Pain', 'rating' => 5, 'text' => 'Long hours on the laptop gave me constant neck pain and headaches. The posture correction and treatment made a huge difference within a few sessions.'],
    ['name' => 'Anitha M.', 'condition' => 'Sciatica', 'rating' => 5, 'text' => 'The shooting pain down my leg made walking difficult. The doctor found the real cause and treated it step by step. Clean clinic, friendly staff and on-time appointments.'],
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
            ['cat' => 'ortho', 'icon' => 'knee', 'title' => 'Orthopaedic Rehabilitation', 'text' => 'Assessment and rehab for joint, spine, ligament and sports injuries, and recovery after surgery.'],
            ['cat' => 'neuro', 'icon' => 'brain', 'title' => 'Neurological Rehabilitation', 'text' => 'Long-term rehab to rebuild movement, balance and independence.'],
            ['cat' => 'paeds', 'icon' => 'child', 'title' => 'Paediatric Rehabilitation', 'text' => 'Gentle, play-based physiotherapy that helps children move, grow and thrive.'],
            ['icon' => 'clipboard-plus', 'title' => 'Pre & Post Operative Care', 'text' => 'Preparing the body for surgery and guiding a safe, steady recovery afterwards.', 'items' => ['Pre-surgery conditioning', 'Post-surgery rehab', 'Joint mobilisation', 'Strength training']],        ],
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

// ---------------------------------------------------------------------------
// FAQ page
// Each item: 'cat', 'q', 'a' (plain text) and an optional 'link'.
// Answers about hours / phones / doctor are built from $site so they stay
// in sync. Items marked REVIEW describe clinic policy — confirm them.
// ---------------------------------------------------------------------------
$faqHours = implode('; ', array_map(function ($group) {
    return $group['label'] . ' ' . format_slots($group['slots']);
}, $site['hours']));

// ---------------------------------------------------------------------------
// Gallery page
//   image: file in img/ without extension; img/<image>.jpg is the full size
//          shown in the zoom viewer, img/<image>-1024.jpg the grid thumbnail.
//          null = placeholder slot until a real clinic photo is added.
//   size:  'wide' / 'tall' spans two grid cells on larger screens.
// ---------------------------------------------------------------------------
$galleryPage = [
    'banner' => [
        'title'     => 'Our',
        'highlight' => 'Gallery',
        'lead'      => 'A look inside New Life Physiotherapy Clinic — our treatment areas, therapies and patients on the road to recovery.',
        'image'     => 'banner01',
    ],
    'eyebrow'   => 'Inside Our Clinic',
    'title'     => 'Moments of',
    'highlight' => 'Care & Recovery',
    'lead'      => 'Tap any photo to view it full screen — then tap, double-tap or pinch to zoom in.',
    'categories' => [
        'clinic'    => 'Our Clinic',
        'treatment' => 'Treatments',
        'rehab'     => 'Rehab & Exercise',
    ],
    // TODO: replace the null images with real clinic photos (img/gallery/<name>.jpg + <name>-1024.jpg)
    'items' => [
        ['image' => 'banner01', 'cat' => 'rehab', 'size' => 'wide', 'title' => 'Assisted Leg Stretch', 'alt' => 'Physiotherapist guiding a patient through an assisted leg stretch'],
        ['image' => null, 'cat' => 'clinic', 'size' => 'tall', 'title' => 'Reception & Waiting Area', 'alt' => 'Reception and waiting area of New Life Physiotherapy Clinic'],
        ['image' => 'banner02', 'cat' => 'treatment', 'size' => '', 'title' => 'Sling Suspension Therapy', 'alt' => 'Physiotherapist supporting a patient during sling suspension therapy'],
        ['image' => null, 'cat' => 'treatment', 'size' => '', 'title' => 'Manual Therapy Session', 'alt' => 'Physiotherapist performing manual therapy'],
        ['image' => 'banner03', 'cat' => 'rehab', 'size' => '', 'title' => 'Shoulder Strengthening', 'alt' => 'Physiotherapist guiding a patient through a shoulder strengthening exercise'],
        ['image' => null, 'cat' => 'clinic', 'size' => '', 'title' => 'Treatment Room', 'alt' => 'Private treatment room at the clinic'],
        ['image' => null, 'cat' => 'treatment', 'size' => 'wide', 'title' => 'Laser Therapy', 'alt' => 'Laser therapy for pain relief'],
        ['image' => null, 'cat' => 'treatment', 'size' => '', 'title' => 'Kinesio Taping', 'alt' => 'Kinesio tape applied to a patient\'s knee'],
        ['image' => null, 'cat' => 'rehab', 'size' => 'tall', 'title' => 'Balance Training', 'alt' => 'Patient doing balance training exercises'],
        ['image' => null, 'cat' => 'clinic', 'size' => '', 'title' => 'Exercise & Rehab Area', 'alt' => 'Exercise and rehabilitation area with equipment'],
        ['image' => null, 'cat' => 'rehab', 'size' => '', 'title' => 'Child Therapy', 'alt' => 'Play-based physiotherapy session with a child'],
        ['image' => null, 'cat' => 'rehab', 'size' => 'wide', 'title' => 'Post-Surgery Rehab', 'alt' => 'Patient walking with support during post-operative rehabilitation'],
    ],
];

$faqPage = [
    'banner' => [
        'title'     => 'Frequently Asked',
        'highlight' => 'Questions',
        'lead'      => 'Everything you need to know before your first visit — and if your question isn\'t here, just ask us.',
        'image'     => 'banner03',
    ],

    'categories' => [
        'start'     => ['label' => 'Getting Started', 'icon' => 'heart'],
        'visits'    => ['label' => 'Appointments & Visits', 'icon' => 'calendar'],
        'treatment' => ['label' => 'Your Treatment', 'icon' => 'hand'],
        'conditions' => ['label' => 'Conditions', 'icon' => 'spine'],
    ],

    'items' => [
        // Getting started
        ['cat' => 'start', 'q' => 'What is physiotherapy?',
         'a' => 'Physiotherapy helps you recover movement and reduce pain after injury, surgery or illness. It uses hands-on treatment, targeted exercise and advice to treat the cause of your problem — not just the symptoms.'],
        ['cat' => 'start', 'q' => 'Do I need a doctor\'s referral to visit?',
         'a' => 'No, you can book with us directly. If you have already seen a doctor, please bring any prescriptions, notes or reports — they help us understand your condition faster.'],
        ['cat' => 'start', 'q' => 'Who will treat me?',
         'a' => 'Your care is led by ' . $site['doctor']['name'] . ', a registered physiotherapist (Regd. No. ' . $site['doctor']['reg_no'] . ').',
         'link' => ['label' => 'Meet the doctor', 'url' => 'doctors.php']],
        ['cat' => 'start', 'q' => 'Do you treat children?',
         'a' => 'Yes. We offer gentle, play-based physiotherapy for babies and children — for developmental delay, cerebral palsy, low or high muscle tone, posture problems and injuries.',
         'link' => ['label' => 'Paediatric physiotherapy', 'url' => 'services.php#paediatric-physiotherapy']],
        ['cat' => 'start', 'q' => 'Is the first consultation free?', // REVIEW: confirm the free-consultation offer
         'a' => 'Yes — you can book a free consultation to talk through your problem and find out how physiotherapy can help before you start treatment.'],

        // Appointments & visits
        ['cat' => 'visits', 'q' => 'How do I book an appointment?',
         'a' => 'Call us on ' . implode(' or ', $site['phones']) . ', message us on WhatsApp, or fill in our online booking form and we will call you back to confirm a time.',
         'link' => ['label' => 'Book a free consultation', 'url' => 'free-appointment.php']],
        ['cat' => 'visits', 'q' => 'What are your clinic timings?',
         'a' => 'We are open ' . $faqHours . '. Evening and Sunday slots make it easier to fit treatment around work and school.'],
        ['cat' => 'visits', 'q' => 'What happens at my first visit?',
         'a' => 'We start by listening to your story, then assess your posture, movement, strength and pain. We explain what we find in plain language, agree goals with you and usually begin treatment in the same visit.'],
        ['cat' => 'visits', 'q' => 'What should I wear and bring?',
         'a' => 'Wear loose, comfortable clothing that lets us see and move the area being treated. Bring any scans, X-rays, reports or prescriptions you have, and a list of your current medicines.'],
        ['cat' => 'visits', 'q' => 'How much does treatment cost?', // REVIEW: add fees if you want to publish them
         'a' => 'Fees depend on the treatment you need. Call us and we will explain the cost of your plan clearly before you begin.'],

        // Your treatment
        ['cat' => 'treatment', 'q' => 'How many sessions will I need?',
         'a' => 'It depends on your condition, how long you have had it and your goals. After your assessment we will give you an honest estimate and review it as you progress.'],
        ['cat' => 'treatment', 'q' => 'How long does each session last?', // REVIEW: confirm typical session length
         'a' => 'Most sessions last around 30 to 45 minutes. Your first visit may take a little longer because it includes a detailed assessment.'],
        ['cat' => 'treatment', 'q' => 'Is physiotherapy painful?',
         'a' => 'Treatment should not be painful. Some techniques and exercises can feel uncomfortable or cause mild soreness for a day, but we always work within your comfort and adjust as you go — just tell us how you feel.'],
        ['cat' => 'treatment', 'q' => 'Will I get exercises to do at home?',
         'a' => 'Yes. Most plans include a simple home exercise programme so your progress continues between visits. We show you each exercise and check you are doing it correctly.'],
        ['cat' => 'treatment', 'q' => 'Should I stop my medicines during physiotherapy?',
         'a' => 'No — keep taking your medicines as prescribed by your doctor. Just let us know what you are taking so we can plan your treatment safely.'],
        ['cat' => 'treatment', 'q' => 'What treatments and techniques do you use?',
         'a' => 'Depending on your needs: manual therapy, laser therapy, kinesio taping, joint mobilisation, strength training and pre & post operative rehabilitation, always combined with guided exercise.',
         'link' => ['label' => 'Our services', 'url' => 'services.php']],

        // Conditions
        ['cat' => 'conditions', 'q' => 'Can physiotherapy help a disc bulge or sciatica without surgery?',
         'a' => 'Many people with a disc bulge or sciatica improve with physiotherapy alone. After assessing you we will tell you honestly whether physiotherapy is the right first step, or if you should see a specialist.',
         'link' => ['label' => 'Disc bulge & sciatica', 'url' => 'treatments.php#disc-bulge']],
        ['cat' => 'conditions', 'q' => 'Do you provide rehab before and after surgery?',
         'a' => 'Yes. Pre-surgery conditioning helps you go into an operation stronger, and post-surgery rehab helps you regain movement, strength and confidence safely afterwards.'],
        ['cat' => 'conditions', 'q' => 'Do you treat stroke and other neurological conditions?',
         'a' => 'Yes. We provide rehabilitation after stroke, traumatic brain injury and spinal cord injury, and for Parkinson\'s disease, multiple sclerosis and Guillain-Barré syndrome — focused on movement, balance and independence.',
         'link' => ['label' => 'Neuro rehabilitation', 'url' => 'treatments.php#cat-neuro']],
        ['cat' => 'conditions', 'q' => 'My condition isn\'t listed — can you still help?',
         'a' => 'Possibly. Call or WhatsApp us and describe your problem. If physiotherapy can help, we will explain how; if not, we will point you in the right direction.'],
    ],
];

// ---------------------------------------------------------------------------
// Speciality pages, keyed by page id (= slug in $specialities = <slug>.php).
// Each is rendered by components/sections/speciality.php.
// ---------------------------------------------------------------------------
$specialityPages = [];

$specialityPages['manual-therapy'] = [
    'banner' => [
        'title'     => 'Manual',
        'highlight' => 'Therapy',
        'lead'      => 'Hands-on physiotherapy to relieve pain, free stiff joints and restore natural movement — without medicines or surgery.',
        'image'     => 'banner03',
    ],

    'intro' => [
        'eyebrow'   => 'What Is Manual Therapy?',
        'title'     => 'Skilled Hands That',
        'highlight' => 'Restore Movement',
        'image'     => 'banner01',
        'image_alt' => 'Physiotherapist guiding a patient through an assisted leg stretch',
        'paragraphs' => [
            'Manual therapy is a specialised branch of physiotherapy in which the physiotherapist uses their hands — not machines — to treat muscles, joints, ligaments and nerves. Through precise, controlled movements and pressure, it reduces pain, releases tight tissue and restores the normal movement of joints.',
            'At New Life Physiotherapy Clinic, Dr. Y. Abhilash (PT) combines manual therapy with targeted exercise, so you get quick relief from pain and the strength to keep it from coming back. Every technique is chosen after a detailed assessment and adjusted to your comfort level.',
        ],
        'points' => ['Drug-free pain relief', 'No surgery or injections', 'Gentle and comfortable', 'Results you can feel early'],
    ],

    'techniques' => [
        'eyebrow'   => 'Our Techniques',
        'title'     => 'Manual Therapy',
        'highlight' => 'Techniques We Use',
        'lead'      => 'Each technique has a specific purpose. We pick the right combination for your condition, stage of recovery and comfort.',
        'items' => [
            ['icon' => 'knee', 'title' => 'Joint Mobilisation', 'text' => 'Slow, graded movements of a stiff joint to reduce pain and improve its range of motion — ideal for frozen shoulder, knee and spine stiffness.'],
            ['icon' => 'spine', 'title' => 'Spinal Manipulation', 'text' => 'Precise, controlled techniques to the spine that ease back and neck pain and restore normal movement between the vertebrae.'],
            ['icon' => 'muscle', 'title' => 'Soft Tissue Mobilisation', 'text' => 'Deep, targeted massage that releases tight muscles, breaks down adhesions and improves blood flow to speed up healing.'],
            ['icon' => 'hand', 'title' => 'Myofascial Release', 'text' => 'Sustained pressure on the fascia — the connective tissue around muscles — to relieve deep tightness and chronic pain.'],
            ['icon' => 'target', 'title' => 'Trigger Point Release', 'text' => 'Direct pressure on painful knots in the muscle that refer pain elsewhere, such as headaches from neck muscles.'],
            ['icon' => 'bolt', 'title' => 'Muscle Energy Technique', 'text' => 'You gently contract a muscle against the therapist\'s resistance, which helps lengthen tight muscles and realign joints.'],
            ['icon' => 'nerve', 'title' => 'Neural Mobilisation', 'text' => 'Gentle gliding of irritated nerves to calm radiating pain, tingling and numbness — useful in sciatica and nerve compression.'],
            ['icon' => 'shoulder', 'title' => 'Mulligan & Maitland Concepts', 'text' => 'Internationally recognised mobilisation methods that combine joint glides with movement for fast, pain-free improvement.'],
        ],
    ],

    'helps' => [
        'eyebrow'   => 'Who It Helps',
        'title'     => 'Conditions Treated With',
        'highlight' => 'Manual Therapy',
        'lead'      => 'Manual therapy is effective for a wide range of muscle, joint and nerve problems. Tap a condition to learn more.',
        // slugs from $treatments; label/link built in the section
        'conditions' => ['spondylosis', 'disc-bulge', 'sciatica', 'frozen-shoulder', 'osteoarthritis', 'tennis-golfers-elbow',
                         'ligament-injuries', 'meniscus-tears', 'rotator-cuff-injuries', 'plantar-fasciitis',
                         'carpal-tunnel-syndrome', 'fracture-rehabilitation'],
        'extra' => ['Low back & neck pain', 'Headaches from neck tension', 'Posture-related pain', 'Jaw (TMJ) pain'],
        'benefits_title' => 'Benefits of Manual Therapy',
        'benefits' => [
            'Fast relief from pain and muscle tightness',
            'Better joint mobility and flexibility',
            'Reduced swelling and inflammation',
            'Improved blood circulation and healing',
            'Correct posture and body alignment',
            'Less dependence on painkillers',
            'Helps avoid or delay surgery',
            'Quicker return to work, sport and daily life',
        ],
    ],

    'process' => [
        'eyebrow'   => 'Your Session',
        'title'     => 'What to Expect During',
        'highlight' => 'Manual Therapy',
        'lead'      => 'Every session is one-to-one with Dr. Y. Abhilash (PT), in a private and comfortable setting.',
        'image'     => 'banner02',
        'image_alt' => 'Physiotherapist supporting a patient during sling suspension therapy',
        'badge'     => ['title' => 'One-to-One Care', 'text' => 'Personal attention every visit'],
        'items' => [
            ['title' => 'Detailed Assessment', 'text' => 'We discuss your history and examine posture, movement, joints and muscles to find the true source of pain.'],
            ['title' => 'Hands-on Treatment', 'text' => 'The chosen techniques are applied gently, with pressure adjusted to your comfort at every step.'],
            ['title' => 'Exercise & Advice', 'text' => 'Corrective exercises and posture tips lock in the improvement and protect the treated area.'],
            ['title' => 'Progress Review', 'text' => 'We re-test your movement every visit and update the plan until you reach your goals.'],
        ],
    ],

    'faq' => [
        'eyebrow'   => 'FAQs',
        'title'     => 'Manual Therapy',
        'highlight' => 'Questions Answered',
        'items' => [
            ['q' => 'What is manual therapy in physiotherapy?',
             'a' => 'Manual therapy is hands-on treatment by a physiotherapist using techniques such as joint mobilisation, manipulation, soft tissue release and myofascial release to reduce pain and restore normal movement of muscles and joints.'],
            ['q' => 'Is manual therapy painful?',
             'a' => 'Manual therapy is usually comfortable. You may feel some pressure or mild soreness in a tight area, but the physiotherapist always works within your comfort level and adjusts the technique if needed.'],
            ['q' => 'How many manual therapy sessions will I need?',
             'a' => 'It depends on your condition and how long you have had it. Many patients feel better within 2–4 sessions; long-standing or complex problems may need a longer plan, which we explain after your assessment.'],
            ['q' => 'Is manual therapy the same as massage?',
             'a' => 'No. Massage mainly relaxes muscles, while manual therapy is a clinical treatment based on assessment. It works on joints, nerves and soft tissue to correct the cause of pain and is combined with exercises for lasting results.'],
            ['q' => 'Is manual therapy safe for older adults?',
             'a' => 'Yes. Techniques are chosen carefully after checking your health, bone strength and medical history. Gentle mobilisation is very effective for age-related stiffness and arthritis.'],
            ['q' => 'Do I need a doctor\'s referral for manual therapy?',
             'a' => 'No referral is needed. You can book directly with us. If you have scans, X-rays or reports, please bring them to your first visit.'],
        ],
    ],
];

$specialityPages['laser-therapy'] = [
    'banner' => [
        'title'     => 'Laser',
        'highlight' => 'Therapy',
        'lead'      => 'Painless, non-invasive laser treatment that eases pain and inflammation and helps injured tissue heal faster.',
        'image'     => 'banner02',
    ],

    'intro' => [
        'eyebrow'   => 'What Is Laser Therapy?',
        'title'     => 'Light-Powered',
        'highlight' => 'Healing & Pain Relief',
        'image'     => 'banner03',
        'image_alt' => 'Physiotherapist guiding a patient through a shoulder strengthening exercise',
        'paragraphs' => [
            'Laser therapy — also called low-level laser therapy (LLLT) or photobiomodulation — uses focused light energy to treat pain and injury. The light passes through the skin into muscles, tendons, ligaments and joints, where it boosts cell energy, improves blood flow and calms inflammation, helping the body repair itself faster.',
            'At New Life Physiotherapy Clinic, Dr. Y. Abhilash (PT) uses laser therapy as part of a complete treatment plan, together with manual therapy and exercise. It is especially useful when pain is too high to start exercise, or when an injury is slow to heal.',
        ],
        'points' => ['Painless & non-invasive', 'No medicines or injections', 'Quick sessions, no downtime', 'Safe with proper protection'],
    ],

    'techniques' => [
        'eyebrow'   => 'How It Works',
        'title'     => 'How Laser Therapy',
        'highlight' => 'Helps You Heal',
        'lead'      => 'Laser light works at the level of the cells, which is why it helps with both fresh injuries and long-standing pain.',
        'items' => [
            ['icon' => 'bolt', 'title' => 'Reduces Pain', 'text' => 'Calms irritated nerve endings and reduces pain signals, giving relief that often starts within the first few sessions.'],
            ['icon' => 'heart', 'title' => 'Controls Inflammation', 'text' => 'Lowers inflammation in joints, tendons and soft tissue — useful in arthritis, tendinitis and repetitive strain.'],
            ['icon' => 'recover', 'title' => 'Speeds Up Tissue Repair', 'text' => 'Boosts cell energy so damaged muscles, ligaments and tendons can repair faster after injury or surgery.'],
            ['icon' => 'target', 'title' => 'Improves Circulation', 'text' => 'Increases local blood flow, bringing more oxygen and nutrients to the injured area and clearing waste products.'],
            ['icon' => 'muscle', 'title' => 'Relaxes Muscle Spasm', 'text' => 'Helps tight, guarded muscles let go, so movement becomes easier and exercise more comfortable.'],
            ['icon' => 'nerve', 'title' => 'Eases Nerve Pain', 'text' => 'Can reduce burning, tingling and radiating pain from irritated nerves, such as in sciatica.'],
            ['icon' => 'shield', 'title' => 'Reduces Swelling', 'text' => 'Supports drainage of excess fluid around sprains, strains and post-operative areas.'],
            ['icon' => 'treat', 'title' => 'Supports Faster Recovery', 'text' => 'Used alongside manual therapy and exercise, it helps you progress through rehab sooner.'],
        ],
    ],

    'helps' => [
        'eyebrow'   => 'Who It Helps',
        'title'     => 'Conditions Treated With',
        'highlight' => 'Laser Therapy',
        'lead'      => 'Laser therapy can help a wide range of painful muscle, joint, tendon and nerve problems. Tap a condition to learn more.',
        'conditions' => ['spondylosis', 'sciatica', 'disc-bulge', 'osteoarthritis', 'frozen-shoulder',
                         'rheumatoid-arthritis', 'tennis-golfers-elbow', 'rotator-cuff-injuries', 'ligament-injuries',
                         'plantar-fasciitis', 'carpal-tunnel-syndrome'],
        'extra' => ['Low back pain', 'Muscle spasm', 'Tendinitis', 'Swelling after surgery', 'Slow-healing soft tissue injuries'],
        'benefits_title' => 'Benefits of Laser Therapy',
        'benefits' => [
            'Completely painless — most people feel only mild warmth',
            'Non-invasive: no needles, cuts or medicines',
            'Short sessions of just a few minutes per area',
            'No downtime — return to work straight after',
            'Reduces the need for painkillers',
            'Works well with manual therapy and exercise',
            'Suitable for fresh injuries and chronic pain',
            'Can help avoid or delay injections and surgery',
        ],
    ],

    'process' => [
        'eyebrow'   => 'Your Session',
        'title'     => 'What to Expect During',
        'highlight' => 'Laser Therapy',
        'lead'      => 'Each session is quick, comfortable and supervised one-to-one by Dr. Y. Abhilash (PT).',
        'image'     => 'banner01',
        'image_alt' => 'Physiotherapist guiding a patient through an assisted leg stretch',
        'badge'     => ['title' => 'Safe & Supervised', 'text' => 'Eye protection every session'],
        'items' => [
            ['title' => 'Assessment & Safety Check', 'text' => 'We examine the problem area and review your medical history to make sure laser therapy is right and safe for you.'],
            ['title' => 'Laser Application', 'text' => 'You wear protective glasses while the laser probe is placed over the treatment points — usually a few minutes per area.'],
            ['title' => 'Combined Treatment', 'text' => 'Laser is followed by manual therapy, taping or exercises as needed, so you get relief and lasting improvement.'],
            ['title' => 'Progress Review', 'text' => 'We track your pain and movement every visit and adjust the dose and plan until your goals are met.'],
        ],
    ],

    'faq' => [
        'eyebrow'   => 'FAQs',
        'title'     => 'Laser Therapy',
        'highlight' => 'Questions Answered',
        'items' => [
            ['q' => 'What is laser therapy in physiotherapy?',
             'a' => 'Laser therapy (low-level laser therapy or photobiomodulation) uses focused light to reduce pain and inflammation and help damaged tissue heal. It is non-invasive and used alongside manual therapy and exercise.'],
            ['q' => 'Is laser therapy painful?',
             'a' => 'No. Most patients feel nothing at all or only a gentle warmth over the treated area. There are no needles or cuts involved.'],
            ['q' => 'Is laser therapy safe?',
             'a' => 'Yes, when given by a trained physiotherapist. You wear protective glasses during treatment, and we check your medical history first. It is not used over the eyes, over cancerous areas, over the abdomen in pregnancy, or on people taking light-sensitising medicines.'],
            ['q' => 'How many laser therapy sessions will I need?',
             'a' => 'Many patients notice less pain within 3–5 sessions. A typical course is 6–10 sessions depending on how long you have had the problem; we explain your plan after the assessment.'],
            ['q' => 'How long does a laser therapy session take?',
             'a' => 'The laser itself usually takes 5–10 minutes per area. With manual therapy and exercises, a full physiotherapy session is around 30–45 minutes.'],
            ['q' => 'Can laser therapy be combined with other treatments?',
             'a' => 'Yes, and it works best that way. Laser reduces pain and inflammation, so manual therapy and strengthening exercises can start sooner and be more effective.'],
        ],
    ],
];

$specialityPages['taping-techniques'] = [
    'banner' => [
        'title'     => 'Taping',
        'highlight' => 'Techniques',
        'lead'      => 'Kinesio and sports taping that supports injured muscles and joints, eases pain and keeps you moving while you heal.',
        'image'     => 'banner01',
    ],

    'intro' => [
        'eyebrow'   => 'What Is Therapeutic Taping?',
        'title'     => 'Support That',
        'highlight' => 'Moves With You',
        'image'     => 'banner02',
        'image_alt' => 'Physiotherapist supporting a patient during sling suspension therapy',
        'paragraphs' => [
            'Therapeutic taping uses special elastic or rigid tape, applied by a physiotherapist in specific patterns, to support muscles and joints without stopping you from moving. Kinesio (kinesiology) tape gently lifts the skin to ease pain and swelling and guide correct movement, while rigid sports tape firmly protects a joint after a sprain or injury.',
            'At New Life Physiotherapy Clinic, Dr. Y. Abhilash (PT) chooses the right tape and technique after assessing your problem, and combines it with manual therapy and exercise. The tape keeps working between sessions — at work, at home and on the field — so your recovery continues all day.',
        ],
        'points' => ['Drug-free pain relief', 'Full movement while protected', 'Works 24/7 between sessions', 'Water-resistant, worn for days'],
    ],

    'techniques' => [
        'eyebrow'   => 'Our Techniques',
        'title'     => 'Taping Techniques',
        'highlight' => 'We Use',
        'lead'      => 'Different problems need different tape and application. We select the technique that matches your injury, activity and stage of healing.',
        'items' => [
            ['icon' => 'muscle', 'title' => 'Kinesio Taping', 'text' => 'Stretchy cotton tape that lifts the skin slightly to reduce pain, support weak muscles and improve circulation — without limiting movement.'],
            ['icon' => 'run', 'title' => 'Sports (Athletic) Taping', 'text' => 'Rigid tape that firmly stabilises ankles, wrists and fingers to prevent re-injury during training and matches.'],
            ['icon' => 'knee', 'title' => 'McConnell Taping', 'text' => 'Strong corrective tape used mainly for the knee cap and shoulder, to improve joint alignment and reduce pain on movement.'],
            ['icon' => 'heart', 'title' => 'Lymphatic (Oedema) Taping', 'text' => 'Fan-shaped strips that help drain fluid and reduce swelling and bruising after injury or surgery.'],
            ['icon' => 'spine', 'title' => 'Postural Taping', 'text' => 'Tape along the back and shoulders that reminds your body to sit and stand correctly, easing neck and back strain.'],
            ['icon' => 'shoulder', 'title' => 'Joint Support Taping', 'text' => 'Supports unstable or painful joints such as the shoulder, elbow and knee while the surrounding muscles get stronger.'],
            ['icon' => 'hand', 'title' => 'Fascial & Mechanical Correction', 'text' => 'Specific tensions and directions that guide the fascia and joints into a better position to relieve tightness and pain.'],
            ['icon' => 'brain', 'title' => 'Neuro Rehab Taping', 'text' => 'Supports weak muscles after a stroke or nerve injury — for example shoulder support in hemiplegia or foot and wrist drop.'],
        ],
    ],

    'helps' => [
        'eyebrow'   => 'Who It Helps',
        'title'     => 'Conditions Treated With',
        'highlight' => 'Taping',
        'lead'      => 'Taping helps athletes, office workers, older adults and neuro patients alike. Tap a condition to learn more.',
        'conditions' => ['ligament-injuries', 'meniscus-tears', 'tennis-golfers-elbow', 'plantar-fasciitis',
                         'frozen-shoulder', 'rotator-cuff-injuries', 'osteoarthritis', 'stroke', 'cerebral-palsy'],
        'extra' => ['Ankle sprain', 'Knee cap (patellar) pain', 'Low back pain', 'Swelling & bruising', 'Poor posture', 'Pregnancy back pain'],
        'benefits_title' => 'Benefits of Taping',
        'benefits' => [
            'Reduces pain without medicines',
            'Supports muscles and joints while still allowing movement',
            'Reduces swelling and bruising',
            'Helps prevent re-injury when returning to sport',
            'Improves posture and body awareness',
            'Keeps working 24 hours a day for several days',
            'Lightweight, comfortable and water-resistant',
            'Speeds up a safe return to work, sport and daily life',
        ],
    ],

    'process' => [
        'eyebrow'   => 'Your Session',
        'title'     => 'What to Expect During',
        'highlight' => 'Taping',
        'lead'      => 'Taping is quick, painless and always applied by Dr. Y. Abhilash (PT) after a proper assessment.',
        'image'     => 'banner03',
        'image_alt' => 'Physiotherapist guiding a patient through a shoulder strengthening exercise',
        'badge'     => ['title' => 'Skin-Safe Tape', 'text' => 'Hypoallergenic, latex-free options'],
        'items' => [
            ['title' => 'Assessment', 'text' => 'We find the injured or weak structure and check your skin, movement and activity needs to choose the right tape.'],
            ['title' => 'Skin Preparation', 'text' => 'The area is cleaned and dried so the tape sticks well; a small test strip is used if you have sensitive skin.'],
            ['title' => 'Tape Application', 'text' => 'Tape is applied with precise stretch and direction in just a few minutes, then rubbed gently to activate the adhesive.'],
            ['title' => 'Care Advice & Review', 'text' => 'You learn how long to wear it, how to care for it and how to remove it, and we reassess at your next visit.'],
        ],
    ],

    'faq' => [
        'eyebrow'   => 'FAQs',
        'title'     => 'Taping',
        'highlight' => 'Questions Answered',
        'items' => [
            ['q' => 'What is kinesio taping?',
             'a' => 'Kinesio taping uses a thin, stretchy cotton tape applied in specific patterns. It gently lifts the skin to reduce pain and swelling, supports muscles and joints, and still lets you move freely.'],
            ['q' => 'How long can I keep the tape on?',
             'a' => 'Kinesio tape is usually worn for 3–5 days. Rigid sports tape is normally applied just for training or a match and removed afterwards. We will tell you exactly how long for your tape.'],
            ['q' => 'Can I shower or swim with the tape on?',
             'a' => 'Yes, kinesio tape is water-resistant. After showering, gently pat it dry with a towel — do not use a hair dryer, as heat can irritate the skin.'],
            ['q' => 'Is taping painful or does it cause allergy?',
             'a' => 'Applying tape is painless. A few people with sensitive skin may get itching or redness; we use hypoallergenic tape and a test strip when needed. Remove the tape if it itches or burns and let us know.'],
            ['q' => 'Is taping a replacement for physiotherapy treatment?',
             'a' => 'No. Taping supports your recovery between sessions, but lasting results come from treating the cause with manual therapy and the right exercises. Taping works best as part of the full plan.'],
            ['q' => 'Who should avoid taping?',
             'a' => 'Tape is not applied over open wounds, skin infections, fragile or very sensitive skin, active cancer areas or a suspected blood clot (DVT). We check your history before taping to make sure it is safe for you.'],
        ],
    ],
];

$specialityPages['strength-training'] = [
    'banner' => [
        'title'     => 'Strength',
        'highlight' => 'Training',
        'lead'      => 'Physiotherapist-guided strengthening that rebuilds muscles, protects joints and keeps pain from coming back.',
        'image'     => 'banner02',
    ],

    'intro' => [
        'eyebrow'   => 'What Is Rehab Strength Training?',
        'title'     => 'Stronger Muscles,',
        'highlight' => 'Lasting Recovery',
        'image'     => 'banner03',
        'image_alt' => 'Physiotherapist guiding a patient through a shoulder strengthening exercise',
        'paragraphs' => [
            'Strength training in physiotherapy is a carefully planned exercise programme that rebuilds the muscles weakened by pain, injury, surgery, illness or inactivity. Unlike a general gym workout, every exercise is chosen to target the exact muscles your body needs, at a level that is safe for your condition.',
            'At New Life Physiotherapy Clinic, Dr. Y. Abhilash (PT) designs and supervises your programme, corrects your technique and increases the challenge step by step. Strong, balanced muscles support your joints and spine, which is the key to staying pain-free long after treatment ends.',
        ],
        'points' => ['Personalised for your condition', 'Supervised, safe progression', 'Prevents pain from returning', 'Suitable for all ages'],
    ],

    'techniques' => [
        'eyebrow'   => 'Our Approach',
        'title'     => 'Strength Training',
        'highlight' => 'Methods We Use',
        'lead'      => 'We combine different types of exercise to match your goals — from first steps after surgery to returning to competitive sport.',
        'items' => [
            ['icon' => 'target', 'title' => 'Core Stabilisation', 'text' => 'Deep abdominal and back muscle training that supports the spine — essential for low back pain, disc problems and posture.'],
            ['icon' => 'shield', 'title' => 'Isometric Exercises', 'text' => 'Muscle contractions without joint movement — a safe, gentle start when a joint is painful or recently operated.'],
            ['icon' => 'muscle', 'title' => 'Resistance Band Training', 'text' => 'Graded elastic bands that build strength gradually and can be continued easily at home.'],
            ['icon' => 'bolt', 'title' => 'Progressive Weight Training', 'text' => 'Free weights and body-weight exercises, increased step by step as your muscles adapt and grow stronger.'],
            ['icon' => 'run', 'title' => 'Functional Training', 'text' => 'Exercises that copy daily movements — climbing stairs, lifting, squatting and getting up from a chair — so strength carries into real life.'],
            ['icon' => 'knee', 'title' => 'Balance & Stability Training', 'text' => 'Single-leg, wobble-board and coordination drills that protect joints and reduce the risk of falls and re-injury.'],
            ['icon' => 'recover', 'title' => 'Sports-Specific Conditioning', 'text' => 'Power, agility and endurance drills tailored to your sport, preparing you for a safe return to play.'],
            ['icon' => 'brain', 'title' => 'Neuro Strengthening', 'text' => 'Task-based strengthening for weak limbs after stroke, nerve injury or neurological conditions, to rebuild control and independence.'],
        ],
    ],

    'helps' => [
        'eyebrow'   => 'Who It Helps',
        'title'     => 'Conditions Treated With',
        'highlight' => 'Strength Training',
        'lead'      => 'Strengthening is part of almost every recovery plan we create. Tap a condition to learn more.',
        'conditions' => ['osteoarthritis', 'disc-bulge', 'spondylosis', 'sciatica', 'ligament-injuries',
                         'meniscus-tears', 'rotator-cuff-injuries', 'fracture-rehabilitation', 'post-operative-rehabilitation',
                         'rheumatoid-arthritis', 'stroke', 'parkinsons-disease', 'multiple-sclerosis', 'guillain-barre-syndrome'],
        'extra' => ['Low back pain', 'Sports injuries', 'Age-related weakness', 'Falls prevention'],
        'benefits_title' => 'Benefits of Strength Training',
        'benefits' => [
            'Reduces pain by supporting joints and the spine',
            'Restores strength lost after injury or surgery',
            'Improves balance and lowers the risk of falls',
            'Better posture, stamina and energy',
            'Stronger bones and healthier joints',
            'Prevents injuries from coming back',
            'Greater independence in daily activities',
            'Safe return to work, sport and hobbies',
        ],
    ],

    'process' => [
        'eyebrow'   => 'Your Programme',
        'title'     => 'What to Expect From',
        'highlight' => 'Strength Training',
        'lead'      => 'Every programme is supervised one-to-one by Dr. Y. Abhilash (PT) and built around your goals.',
        'image'     => 'banner01',
        'image_alt' => 'Physiotherapist guiding a patient through an assisted leg stretch',
        'badge'     => ['title' => 'Home Programme', 'text' => 'Exercises to continue at home'],
        'items' => [
            ['title' => 'Strength & Movement Assessment', 'text' => 'We test muscle strength, flexibility, balance and posture to find the weak links behind your pain or injury.'],
            ['title' => 'Personalised Programme', 'text' => 'You get a plan with the right exercises, sets and repetitions for your condition, fitness level and goals.'],
            ['title' => 'Supervised Sessions', 'text' => 'We teach correct technique in the clinic and increase the load gradually and safely as you get stronger.'],
            ['title' => 'Home Exercises & Review', 'text' => 'A simple home programme keeps you progressing between visits, and we re-test regularly to track your results.'],
        ],
    ],

    'faq' => [
        'eyebrow'   => 'FAQs',
        'title'     => 'Strength Training',
        'highlight' => 'Questions Answered',
        'items' => [
            ['q' => 'How is physiotherapy strength training different from the gym?',
             'a' => 'A gym workout is general fitness. Physiotherapy strength training is based on an assessment of your condition, targets the specific weak muscles, and is supervised so it is safe for injured or painful joints.'],
            ['q' => 'Can I do strength training if I have back or knee pain?',
             'a' => 'Yes — in fact, the right strengthening exercises are one of the best treatments for back and knee pain. We start gently, choose pain-free exercises and progress only when your body is ready.'],
            ['q' => 'Is strength training safe for older adults?',
             'a' => 'Yes. Supervised strength training is highly recommended for older adults to maintain muscle, protect bones, improve balance and prevent falls. Exercises are adjusted to your health and ability.'],
            ['q' => 'How soon will I see results?',
             'a' => 'Many people feel steadier and have less pain within 2–3 weeks. Real gains in muscle strength usually take 6–8 weeks of regular exercise, which is why the home programme is so important.'],
            ['q' => 'Do I need any equipment at home?',
             'a' => 'Usually very little. Most home exercises use body weight or a resistance band, which we can guide you on. We design your programme around what you have available.'],
            ['q' => 'When can I start strength training after surgery?',
             'a' => 'It depends on the surgery and your surgeon\'s advice. Gentle isometric exercises often begin within days, and we progress step by step in line with your surgeon\'s guidelines.'],
        ],
    ],
];

$specialityPages['pre-post-operative-care'] = [
    'banner' => [
        'title'     => 'Pre & Post',
        'highlight' => 'Operative Care',
        'lead'      => 'Physiotherapy before and after surgery to prepare your body, speed up recovery and get you moving confidently again.',
        'image'     => 'banner03',
    ],

    'intro' => [
        'eyebrow'   => 'Surgical Rehabilitation',
        'title'     => 'Prepare Well,',
        'highlight' => 'Recover Faster',
        'image'     => 'banner01',
        'image_alt' => 'Physiotherapist guiding a patient through an assisted leg stretch',
        'paragraphs' => [
            'Physiotherapy plays a vital role on both sides of an operation. Pre-operative physiotherapy ("prehab") builds strength, flexibility and fitness before surgery, so your body is better prepared and bounces back sooner. Post-operative physiotherapy then restores movement, strength and confidence step by step, so you get the full benefit of your surgery.',
            'At New Life Physiotherapy Clinic, Dr. Y. Abhilash (PT) follows your surgeon\'s protocol closely and tailors every stage to your operation, pain level and goals — from your first steps after surgery to returning to work, sport and everyday life.',
        ],
        'points' => ['Follows your surgeon\'s protocol', 'Faster, safer recovery', 'Less pain and stiffness', 'Back to daily life sooner'],
    ],

    'techniques' => [
        'eyebrow'   => 'Our Approach',
        'title'     => 'Before & After Surgery:',
        'highlight' => 'How We Help',
        'lead'      => 'Rehabilitation is planned in stages, so every phase of your recovery has the right treatment at the right time.',
        'items' => [
            ['icon' => 'muscle', 'title' => 'Prehab Strengthening', 'text' => 'Targeted exercises before surgery to build the muscles around the joint, which is linked to quicker recovery afterwards.'],
            ['icon' => 'plan', 'title' => 'Pre-Surgery Education', 'text' => 'We teach you the exercises, walker or crutch use and home safety tips you will need, so you know what to expect.'],
            ['icon' => 'heart', 'title' => 'Pain & Swelling Control', 'text' => 'Ice, elevation, gentle movement, taping and laser therapy to ease post-operative pain and swelling.'],
            ['icon' => 'recover', 'title' => 'Breathing & Circulation', 'text' => 'Breathing exercises and ankle pumps after surgery to protect your lungs and keep blood flowing in the legs.'],
            ['icon' => 'knee', 'title' => 'Range of Motion Recovery', 'text' => 'Guided stretching and joint mobilisation to regain bending and straightening and prevent stiffness.'],
            ['icon' => 'bolt', 'title' => 'Progressive Strengthening', 'text' => 'Exercises that start gently and progress safely to rebuild the strength lost before and after surgery.'],
            ['icon' => 'run', 'title' => 'Walking & Balance Training', 'text' => 'Gait training from walker to stick to walking freely, with balance work to prevent falls.'],
            ['icon' => 'hand', 'title' => 'Scar & Soft Tissue Care', 'text' => 'Gentle scar mobilisation and soft tissue work once healed, to keep the skin and muscles flexible.'],
        ],
    ],

    'helps' => [
        'eyebrow'   => 'Who It Helps',
        'title'     => 'Surgeries & Conditions We',
        'highlight' => 'Rehabilitate',
        'lead'      => 'We provide rehab for most orthopaedic and spine operations, and for the conditions that lead to them.',
        'conditions' => ['post-operative-rehabilitation', 'fracture-rehabilitation', 'ligament-injuries', 'meniscus-tears',
                         'rotator-cuff-injuries', 'osteoarthritis', 'disc-bulge', 'spondylosis'],
        'extra' => ['Knee replacement (TKR)', 'Hip replacement (THR)', 'ACL reconstruction', 'Knee & shoulder arthroscopy',
                    'Fracture fixation (plates, nails, screws)', 'Spine surgery (discectomy, fusion)',
                    'Rotator cuff repair', 'Tendon & ligament repair'],
        'benefits_title' => 'Benefits of Pre & Post Operative Physiotherapy',
        'benefits' => [
            'Stronger, better-prepared body before surgery',
            'Less pain, swelling and stiffness after surgery',
            'Faster return to walking and independence',
            'Lower risk of complications such as stiffness and falls',
            'Full movement and strength restored step by step',
            'Better long-term results from your operation',
            'Confidence and clear guidance at every stage',
            'Safe return to work, sport and daily life',
        ],
    ],

    'process' => [
        'eyebrow'   => 'Your Recovery',
        'title'     => 'Your Surgical Rehab',
        'highlight' => 'Journey',
        'lead'      => 'Every stage is supervised one-to-one by Dr. Y. Abhilash (PT), in line with your surgeon\'s advice.',
        'image'     => 'banner02',
        'image_alt' => 'Physiotherapist supporting a patient during sling suspension therapy',
        'badge'     => ['title' => 'Surgeon-Aligned Care', 'text' => 'We follow your surgeon\'s protocol'],
        'items' => [
            ['title' => 'Before Surgery: Prehab', 'text' => 'Assessment, strengthening and education in the weeks before your operation, so you go in prepared.'],
            ['title' => 'Early Recovery', 'text' => 'Pain and swelling control, breathing exercises, safe movement and your first steps with support.'],
            ['title' => 'Restoring Movement & Strength', 'text' => 'Range of motion, progressive strengthening and walking training as your healing allows.'],
            ['title' => 'Return to Full Activity', 'text' => 'Balance, endurance and function-specific training to get you back to work, sport and hobbies.'],
        ],
    ],

    'faq' => [
        'eyebrow'   => 'FAQs',
        'title'     => 'Surgical Rehab',
        'highlight' => 'Questions Answered',
        'items' => [
            ['q' => 'Why should I do physiotherapy before surgery?',
             'a' => 'Pre-operative physiotherapy (prehab) strengthens the muscles around the joint, improves flexibility and teaches you the exercises you will need afterwards. Patients who are stronger before surgery usually recover faster and more smoothly.'],
            ['q' => 'When should I start physiotherapy after surgery?',
             'a' => 'Usually as soon as your surgeon allows — often within the first few days for joint replacements and many orthopaedic operations. Starting early helps prevent stiffness and weakness. We always follow your surgeon\'s instructions.'],
            ['q' => 'Is physiotherapy after surgery painful?',
             'a' => 'Some discomfort is normal as you start moving again, but it should be manageable. We control pain and swelling first and progress exercises at a pace your body can handle.'],
            ['q' => 'How long is rehabilitation after a knee replacement?',
             'a' => 'Most people need around 6–12 weeks of physiotherapy to regain good movement, strength and walking, with continued home exercises after that. The exact time depends on your health and fitness before surgery.'],
            ['q' => 'What should I bring to my first post-operative visit?',
             'a' => 'Please bring your discharge summary, operation notes, X-rays or scans, and any instructions from your surgeon. Wear loose, comfortable clothing that allows access to the operated area.'],
            ['q' => 'Do you coordinate with my surgeon?',
             'a' => 'Yes. Your rehabilitation follows your surgeon\'s protocol and restrictions, and we can share progress updates with your surgeon if needed.'],
        ],
    ],
];

$specialityPages['advance-joint-mobilization'] = [
    'banner' => [
        'title'     => 'Advanced Joint',
        'highlight' => 'Mobilization',
        'lead'      => 'Precise, graded joint techniques that unlock stiff joints, ease pain and restore smooth, natural movement.',
        'image'     => 'banner01',
    ],

    'intro' => [
        'eyebrow'   => 'What Is Joint Mobilization?',
        'title'     => 'Unlock Stiff Joints,',
        'highlight' => 'Move Freely Again',
        'image'     => 'banner03',
        'image_alt' => 'Physiotherapist guiding a patient through a shoulder strengthening exercise',
        'paragraphs' => [
            'Joint mobilization is a specialised manual physiotherapy technique in which the physiotherapist moves a joint with slow, controlled, graded glides and pressures. These small, precise movements stretch a tight joint capsule, reduce pain and restore the joint\'s natural gliding and rolling, so it can move fully and comfortably again.',
            'Advanced joint mobilization goes further, using internationally recognised concepts such as Maitland, Mulligan and Kaltenborn. At New Life Physiotherapy Clinic, Dr. Y. Abhilash (PT) selects the right method and grade for each joint after a detailed assessment, then pairs it with exercises that keep the new movement for good.',
        ],
        'points' => ['Graded to your comfort', 'Maitland, Mulligan & Kaltenborn', 'For spine and all limb joints', 'No medicines or surgery'],
    ],

    'techniques' => [
        'eyebrow'   => 'Our Techniques',
        'title'     => 'Advanced Mobilization',
        'highlight' => 'Techniques We Use',
        'lead'      => 'Each concept has its strengths. We combine them to suit the joint, the cause of stiffness and how irritable your pain is.',
        'items' => [
            ['icon' => 'target', 'title' => 'Maitland Graded Mobilization', 'text' => 'Rhythmic oscillations graded from I to IV — gentle grades calm pain, stronger grades stretch stiff joints.'],
            ['icon' => 'run', 'title' => 'Mulligan Mobilization With Movement', 'text' => 'The therapist holds a sustained joint glide while you actively move — often giving immediate, pain-free improvement.'],
            ['icon' => 'spine', 'title' => 'Mulligan SNAGs for the Spine', 'text' => 'Sustained natural apophyseal glides that ease neck and back pain and restore spinal movement during bending and turning.'],
            ['icon' => 'hand', 'title' => 'Kaltenborn Joint Glides', 'text' => 'Precise gliding of joint surfaces in the direction of restriction, based on the joint\'s shape, to restore lost movement.'],
            ['icon' => 'arrow-up', 'title' => 'Traction & Distraction', 'text' => 'Gently separating the joint surfaces to relieve compression, reduce pain and create space for nerves and discs.'],
            ['icon' => 'back', 'title' => 'Spinal Mobilization', 'text' => 'Graded pressures on the vertebrae of the neck, upper and lower back to free stiff segments and relieve pain.'],
            ['icon' => 'shoulder', 'title' => 'Peripheral Joint Mobilization', 'text' => 'Targeted techniques for the shoulder, elbow, wrist, hip, knee and ankle — vital for frozen shoulder and post-fracture stiffness.'],
            ['icon' => 'recover', 'title' => 'Self-Mobilization Programme', 'text' => 'Simple self-mobilization and stretching you can do at home to hold on to the movement gained in each session.'],
        ],
    ],

    'helps' => [
        'eyebrow'   => 'Who It Helps',
        'title'     => 'Conditions Treated With',
        'highlight' => 'Joint Mobilization',
        'lead'      => 'Joint mobilization is most helpful when stiffness or a "stuck" joint is causing pain. Tap a condition to learn more.',
        'conditions' => ['frozen-shoulder', 'osteoarthritis', 'spondylosis', 'disc-bulge', 'sciatica',
                         'ligament-injuries', 'fracture-rehabilitation', 'tennis-golfers-elbow', 'rheumatoid-arthritis',
                         'plantar-fasciitis', 'carpal-tunnel-syndrome'],
        'extra' => ['Low back & neck stiffness', 'Stiffness after surgery', 'Ankle stiffness after sprain', 'Jaw (TMJ) stiffness'],
        'benefits_title' => 'Benefits of Joint Mobilization',
        'benefits' => [
            'Restores range of motion in stiff joints',
            'Quick pain relief, often within a few sessions',
            'Improves joint lubrication and nutrition',
            'Reduces muscle guarding around the joint',
            'Makes exercise easier and more effective',
            'Gentle and adjustable to your comfort',
            'Can help avoid manipulation under anaesthesia or surgery',
            'Smoother, freer movement in daily life',
        ],
    ],

    'process' => [
        'eyebrow'   => 'Your Session',
        'title'     => 'What to Expect During',
        'highlight' => 'Joint Mobilization',
        'lead'      => 'Every session is one-to-one with Dr. Y. Abhilash (PT), and every technique stays within your comfort.',
        'image'     => 'banner02',
        'image_alt' => 'Physiotherapist supporting a patient during sling suspension therapy',
        'badge'     => ['title' => 'Graded & Gentle', 'text' => 'Adjusted to your comfort'],
        'items' => [
            ['title' => 'Joint Assessment', 'text' => 'We measure movement, test joint glides and find which direction is stiff or painful — and rule out anything that needs a different approach.'],
            ['title' => 'Graded Mobilization', 'text' => 'The chosen technique and grade is applied with you relaxed and well supported, with constant feedback on comfort.'],
            ['title' => 'Exercise to Hold the Gain', 'text' => 'Active movement and strengthening right after mobilization help your body keep the new range.'],
            ['title' => 'Re-test & Progress', 'text' => 'We re-measure movement every visit and progress the grade and exercises as the joint improves.'],
        ],
    ],

    'faq' => [
        'eyebrow'   => 'FAQs',
        'title'     => 'Joint Mobilization',
        'highlight' => 'Questions Answered',
        'items' => [
            ['q' => 'What is joint mobilization in physiotherapy?',
             'a' => 'Joint mobilization is a hands-on technique where the physiotherapist moves a joint with slow, controlled glides and pressures to reduce pain and restore normal movement. It is graded so the force always suits your condition.'],
            ['q' => 'What is the difference between mobilization and manipulation?',
             'a' => 'Mobilization uses slow, controlled movements that you can stop at any time. Manipulation is a single quick thrust, sometimes with a "click". Mobilization is gentler and suitable for most people, including those with acute pain or older joints.'],
            ['q' => 'What are Maitland grades?',
             'a' => 'Maitland grades I to IV describe how large and how deep a mobilization movement is. Grades I and II are small and gentle to ease pain; grades III and IV go further into the stiffness to restore range of motion.'],
            ['q' => 'Is joint mobilization painful?',
             'a' => 'It should not be. You may feel a stretch or mild pressure at the stiff point, but the grade is always adjusted to your comfort. Some people feel mild soreness for a day, similar to after exercise.'],
            ['q' => 'How many sessions will I need?',
             'a' => 'Many patients notice easier movement within 3–4 sessions. Long-standing stiffness such as frozen shoulder or post-fracture stiffness may need several weeks of treatment combined with home exercises.'],
            ['q' => 'Is joint mobilization safe for everyone?',
             'a' => 'It is safe for most people when done by a trained physiotherapist. It is avoided or modified in conditions such as recent fractures, severe osteoporosis, joint infection, tumours or unstable joints — which is why we always assess you first.'],
        ],
    ],
];

// Closing call-to-action band (any page)
// ---------------------------------------------------------------------------
// Free appointment page (form posts to appointment.php)
// ---------------------------------------------------------------------------
// ---------------------------------------------------------------------------
// Patient Resources page (resources.php): guidance, rehab information, FAQs
// General information only — the page shows a "not a substitute" note.
// ---------------------------------------------------------------------------
$resourcesPage = [
    'banner' => [
        'title'     => 'Patient',
        'highlight' => 'Resources',
        'lead'      => 'Simple, trustworthy physiotherapy guidance to help you look after your body and get the most from your recovery.',
        'image'     => 'banner03',
    ],
    'intro' => [
        'eyebrow'   => 'Learn & Recover',
        'title'     => 'Helpful Information for',
        'highlight' => 'Patients & Families',
        'lead'      => 'Everyday advice from our physiotherapy team — what to do when pain strikes, how rehabilitation works and answers to common questions.',
        'cards' => [
            ['anchor' => 'guidance', 'icon' => 'heart', 'title' => 'Basic Physiotherapy Guidance', 'text' => 'Posture, lifting, ice or heat, sleep and staying active safely.'],
            ['anchor' => 'rehabilitation', 'icon' => 'recover', 'title' => 'Rehabilitation Information', 'text' => 'The stages of recovery, typical timelines and your home programme.'],
            ['anchor' => 'faq', 'icon' => 'assess', 'title' => 'FAQs', 'text' => 'Quick answers about pain, exercise and recovery.'],
        ],
    ],

    'guidance' => [
        'eyebrow'   => 'Basic Physiotherapy Guidance',
        'title'     => 'Everyday Tips to',
        'highlight' => 'Protect Your Body',
        'lead'      => 'Small daily habits make a big difference to pain and recovery. Here is the advice we give our patients most often.',
        'items' => [
            ['icon' => 'spine', 'title' => 'Good Posture at Work', 'tips' => [
                'Keep the top of your screen at eye level',
                'Sit back in the chair with your feet flat on the floor',
                'Keep elbows close to your body, wrists straight',
                'Stand up and move every 30–45 minutes',
            ]],
            ['icon' => 'back', 'title' => 'Lifting Safely', 'tips' => [
                'Bend your knees and hips, not your back',
                'Hold the load close to your body',
                'Turn with your feet — avoid twisting your back',
                'Ask for help or split heavy loads',
            ]],
            ['icon' => 'thermometer', 'title' => 'Ice or Heat?', 'tips' => [
                'Ice for a fresh injury or swelling (first 48–72 hours)',
                'Heat for stiffness and long-standing muscle tightness',
                '15–20 minutes at a time, wrapped in a cloth',
                'Never put ice or heat directly on the skin',
            ]],
            ['icon' => 'clock', 'title' => 'Stay Active, Pace Yourself', 'tips' => [
                'Gentle movement usually helps more than bed rest',
                'Break tasks into smaller parts with short rests',
                'Increase activity a little at a time',
                'Short, regular walks are one of the best medicines',
            ]],
            ['icon' => 'moon', 'title' => 'Sleep Comfortably', 'tips' => [
                'Side-lying: a pillow between the knees',
                'On your back: a pillow under the knees',
                'Use a pillow that keeps your neck level',
                'Avoid sleeping on your stomach with neck pain',
            ]],
            ['icon' => 'run', 'title' => 'Doing Your Home Exercises', 'tips' => [
                'Little and often beats a lot once a week',
                'Move slowly and with control — quality over quantity',
                'Mild discomfort is okay; sharp pain is not',
                'Keep a simple log of what you did',
            ]],
            ['icon' => 'foot', 'title' => 'Footwear & Walking', 'tips' => [
                'Choose cushioned, supportive shoes for daily use',
                'Avoid flat, worn-out slippers for long walks',
                'Start new walking routines gradually',
                'Walk on even ground when recovering from injury',
            ]],
            ['icon' => 'hand', 'title' => 'Using Phones & Laptops', 'tips' => [
                'Bring the phone up to eye level instead of looking down',
                'Use a stand or external keyboard with a laptop',
                'Take regular breaks to stretch your neck and hands',
                'Switch hands and avoid long one-handed typing',
            ]],
        ],
        // Red flags: always shown with a "seek medical help" message
        'warning' => [
            'title' => 'When to See a Doctor Urgently',
            'text'  => 'Physiotherapy is safe for most aches and injuries, but some symptoms need urgent medical attention. Go to a doctor or emergency department straight away if you have:',
            'items' => [
                'Numbness around the groin or buttocks, or new problems controlling bladder or bowel',
                'Sudden weakness, drooping face or slurred speech',
                'Severe pain after a fall or accident, or a deformed limb',
                'Back pain with fever, unexplained weight loss or a history of cancer',
                'A hot, swollen, painful calf, or sudden breathlessness or chest pain',
                'Pain that is getting rapidly worse, or keeps you awake every night',
            ],
        ],
        'note' => 'This information is general advice and does not replace a personal assessment. If you are unsure, ask us.',
    ],

    'rehab' => [
        'eyebrow'   => 'Rehabilitation Information',
        'title'     => 'How Recovery',
        'highlight' => 'Usually Works',
        'lead'      => 'Most rehabilitation follows a similar path. Knowing what to expect helps you stay motivated and recover safely.',
        'stages' => [
            ['icon' => 'heart', 'title' => 'Protect & Calm', 'text' => 'Reduce pain and swelling, protect healing tissue and keep gentle, safe movement going.'],
            ['icon' => 'knee', 'title' => 'Restore Movement', 'text' => 'Regain flexibility and range of motion with hands-on therapy and guided exercises.'],
            ['icon' => 'muscle', 'title' => 'Rebuild Strength', 'text' => 'Progressive strengthening, balance and control so the area can handle everyday loads.'],
            ['icon' => 'run', 'title' => 'Return to Activity', 'text' => 'Practise work, sport and daily tasks, and learn how to prevent the problem returning.'],
        ],
        // REVIEW: typical ranges — every recovery is different
        'timeline_title' => 'Typical Recovery Times',
        'timeline_note'  => 'These are general ranges. Your own timeline depends on your condition, age, general health and how regularly you do your exercises.',
        'timeline' => [
            ['label' => 'Muscle strain or mild sprain', 'time' => '2–6 weeks'],
            ['label' => 'Acute low back or neck pain', 'time' => '2–8 weeks'],
            ['label' => 'Tennis elbow, plantar fasciitis, tendon pain', 'time' => '6–12 weeks'],
            ['label' => 'Frozen shoulder', 'time' => '6–18 months (improves in stages)'],
            ['label' => 'Fracture rehabilitation', 'time' => '6–12 weeks after the bone heals'],
            ['label' => 'Knee or hip replacement', 'time' => '3–6 months'],
            ['label' => 'ACL reconstruction (return to sport)', 'time' => '9–12 months'],
            ['label' => 'Stroke and neurological rehab', 'time' => 'Months — steady, long-term progress'],
        ],
        'pain' => [
            'title' => 'Exercise Pain: A Simple Guide',
            'text'  => 'Rate your pain from 0 (none) to 10 (worst) while and after you exercise:',
            'levels' => [
                ['level' => 'ok', 'range' => '0–3', 'label' => 'Safe to continue', 'text' => 'Mild discomfort is normal while tissues get stronger.'],
                ['level' => 'caution', 'range' => '4–5', 'label' => 'Ease off', 'text' => 'Reduce repetitions, range or weight, and tell us at your next visit.'],
                ['level' => 'stop', 'range' => '6+', 'label' => 'Stop & contact us', 'text' => 'Or if pain is still worse the next morning.'],
            ],
        ],
        'tips_title' => 'Getting the Most From Your Rehab',
        'tips' => [
            'Attend sessions regularly — consistency matters most',
            'Do your home exercises as prescribed',
            'Tell us honestly how you are feeling each visit',
            'Ask questions — understanding helps recovery',
            'Get enough sleep, water and good food',
            'Set small goals and celebrate progress',
        ],
        'bring_title' => 'What to Bring to Your First Visit',
        'bring' => [
            'X-rays, MRI or scan reports',
            'Doctor\'s or surgeon\'s notes and discharge summary',
            'A list of your current medicines',
            'Loose, comfortable clothing (shorts for knee problems)',
            'Your questions and goals',
        ],
    ],

    'faq' => [
        'eyebrow'   => 'FAQs',
        'title'     => 'Questions About',
        'highlight' => 'Pain & Recovery',
        'items' => [
            ['q' => 'Should I rest completely when I have back pain?',
             'a' => 'Usually not. For most back pain, gentle movement and staying as active as you comfortably can helps you recover faster than bed rest. Avoid only the movements that clearly make it much worse, and see us if it does not improve within a few days.'],
            ['q' => 'Is it normal to feel sore after physiotherapy?',
             'a' => 'Mild soreness for a day or so after treatment or new exercises is normal, similar to after a workout. It should settle within 24–48 hours. If pain is sharp or keeps increasing, let us know.'],
            ['q' => 'How often should I do my home exercises?',
             'a' => 'Follow the plan your physiotherapist gives you — often once or twice a day. Short, regular sessions work better than one long session a week.'],
            ['q' => 'Should I use ice or heat for my injury?',
             'a' => 'Ice is best for a new injury or swelling in the first 2–3 days. Heat helps stiffness and long-standing muscle tightness. Use either for 15–20 minutes, wrapped in a cloth, never directly on the skin.'],
            ['q' => 'Can physiotherapy help me avoid surgery?',
             'a' => 'For many conditions — such as disc bulges, knee osteoarthritis, rotator cuff and meniscus problems — a good physiotherapy programme can reduce pain and improve function enough that surgery is not needed. We will advise you honestly if a specialist opinion is the better step.'],
            ['q' => 'When can I go back to sport or the gym?',
             'a' => 'When you have full, pain-free movement, good strength compared with the other side and confidence in sport-specific movements. We test these with you before giving the all-clear.'],
            ['q' => 'Can family members help with my rehabilitation?',
             'a' => 'Yes — especially after a stroke, surgery or for children. We are happy to teach family members how to assist safely with exercises and daily activities at home.'],
        ],
    ],
];

$appointmentPage = [
    'banner' => [
        'title'     => 'Book a Free',
        'highlight' => 'Consultation',
        'lead'      => 'Tell us about your pain or condition and choose a time that suits you — we\'ll call to confirm your visit.',
        'image'     => 'banner02',
    ],
    'form' => [
        'eyebrow'   => 'Book Online',
        'title'     => 'Request Your',
        'highlight' => 'Free Appointment',
        'lead'      => 'It takes less than a minute. Fields marked * are required.',
    ],
    // REVIEW: confirm what the free consultation includes
    'included' => [
        'title' => 'Your Free Consultation Includes',
        'items' => [
            'A one-to-one talk with Dr. Y. Abhilash (PT) about your problem',
            'A quick check of your posture, movement and pain',
            'Honest advice on whether physiotherapy can help you',
            'A clear plan with goals and the expected number of sessions',
            'No obligation to start treatment',
        ],
    ],
    'trust' => [
        ['icon' => 'shield', 'title' => 'Registered Physiotherapist', 'text' => 'Regd. No. 08928'],
        ['icon' => 'clock', 'title' => 'Open 7 Days', 'text' => 'Morning, evening & Sunday slots'],
        ['icon' => 'heart', 'title' => 'One-to-One Care', 'text' => 'Adults & children'],
    ],
    'faq' => [
        'eyebrow'   => 'Booking FAQs',
        'title'     => 'Before You',
        'highlight' => 'Book',
        'items' => [
            ['q' => 'Is the first consultation really free?',
             'a' => 'Yes. The first consultation is free and there is no obligation to continue. It is a chance to talk through your problem and find out whether physiotherapy is right for you.'],
            ['q' => 'How soon will you confirm my appointment?',
             'a' => 'We call you back to confirm a time, usually within a few hours during clinic timings. Requests sent after hours are confirmed the next morning.'],
            ['q' => 'Is my preferred time guaranteed?',
             'a' => 'We do our best to give you the date and time you choose. If that slot is already taken, we will offer the nearest available time when we call.'],
            ['q' => 'What should I bring to my first visit?',
             'a' => 'Bring any scans, X-rays, reports and a list of your medicines. Wear loose, comfortable clothing so the painful area can be examined easily.'],
            ['q' => 'Can I book an appointment for my child or a family member?',
             'a' => 'Yes. Just enter the patient\'s name, choose "Child" if the appointment is for a child, and give a mobile number we can reach you on.'],
            ['q' => 'How do I change or cancel my appointment?',
             'a' => 'Call or WhatsApp us on ' . $site['phones'][0] . ' as early as possible and we will happily move your appointment to another time.'],
        ],
    ],
];

// ---------------------------------------------------------------------------
// Contact page (details, hours and map come from $site)
// ---------------------------------------------------------------------------
$contactPage = [
    'banner' => [
        'title'     => 'Contact',
        'highlight' => 'Us',
        'lead'      => 'Call, WhatsApp or send us a message — we\'re here to help you start your recovery.',
        'image'     => 'banner03',
    ],
    'form' => [
        'eyebrow'   => 'Send a Message',
        'title'     => 'We\'d Love to',
        'highlight' => 'Hear From You',
        'lead'      => 'Fill in the form and we will call you back, usually within a few hours during clinic timings.',
        // subject dropdown; speciality names are appended in the section
        'subjects'  => ['Book an appointment', 'Question about my condition', 'General enquiry'],
    ],
    'hours' => [
        'title' => 'Clinic Timings',
        'note'  => 'Appointments are recommended. Walk-ins are welcome when slots are free.',
    ],
    'map' => [
        'eyebrow'   => 'Find Us',
        'title'     => 'Visit Our',
        'highlight' => 'Clinic',
    ],
];

$ctaBand = [
    'title'     => 'Ready to Start Your',
    'highlight' => 'Recovery?',
    'text'      => 'Book a free consultation with Dr. Y. Abhilash (PT) — or call us and we will find a time that suits you.',
];

// ---------------------------------------------------------------------------
// Footer
// ---------------------------------------------------------------------------
// Quick Links: the main menu minus Specialities (they get their own column,
// built from the Specialities menu item), plus the booking page.
$footerQuickLinks = array_merge(
    array_map(function ($item) {
        return ['label' => $item['label'], 'url' => $item['url']];
    }, array_values(array_filter($nav, function ($item) {
        return $item['id'] !== 'specialities';
    }))),
    [['label' => 'Book Free Appointment', 'url' => 'free-appointment.php']]
);
$footerSpecialities = array_values(array_filter($nav, function ($item) {
    return $item['id'] === 'specialities';
}))[0]['children'];

$legalLinks = [
    ['label' => 'Privacy Policy', 'url' => 'privacy-policy.php'],
    ['label' => 'Terms of Use', 'url' => 'terms.php'],
];

$socialNetworks = [
    'facebook'  => ['label' => 'Facebook', 'icon' => 'facebook', 'class' => 'ft-social__fb'],
    'instagram' => ['label' => 'Instagram', 'icon' => 'instagram', 'class' => 'ft-social__ig'],
    'youtube'   => ['label' => 'YouTube', 'icon' => 'youtube', 'class' => 'ft-social__yt'],
];

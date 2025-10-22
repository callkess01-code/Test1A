<!doctype html>
<html lang="en">

<?php
// Page configuration
$pageTitle = "BeatSync - Ultimate EDM Events & Music Festivals 2025 | Electronic Dance Music";
$pageDescription = "Experience world-class EDM events with BeatSync. Book tickets for electronic music festivals, live DJ performances, and dance music concerts. Transform your night into pure magic.";
$keywords = "EDM events, electronic music festivals, dance music concerts, DJ performances, music tickets, BeatSync, electronic dance music, live events 2025";

// Events data
$events = [
    [
        'id' => 1,
        'title' => 'Electric Night Festival',
        'image' => 'https://images.unsplash.com/photo-1675480481794-8650d8419296?q=80&w=435&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'alt' => 'Electronic music festival with vibrant stage lighting',
        'month' => 'OCT',
        'day' => '31',
        'location' => 'BGC, Philippines'
    ],
    [
        'id' => 2,
        'title' => 'Beat Drop Experience',
        'image' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ9dZ2_8mhjHiVXskeLxAwZ_eJhZOziOmiUlo_wRpKsf0vxsi_rlU82pJUM61i4l5HTWKCxXHW1YWgqsbY',
        'alt' => 'DJ performance with crowd and atmospheric lighting',
        'month' => 'NOV',
        'day' => '15',
        'location' => 'Makati, Philippines'
    ],
    [
        'id' => 3,
        'title' => 'Dark Halloween Rave',
        'image' => 'https://www.google.com/imgres?q=halloween%20edm%20dark&imgurl=https%3A%2F%2Fapp.edm-addicts.com%2Fstorage%2F11958%2F503040321_685029571162999_8399625462016170612_n.jpg&imgrefurl=https%3A%2F%2Fedm-addicts.com%2Fevents%2Fdark-festival&docid=duH1EPlYSf0yVM&tbnid=V7Wd4XMjrIEU9M&vet=12ahUKEwjh-ZyjlLiQAxW5sFYBHRtHEKYQM3oECBwQAA..i&w=1080&h=1080&hcb=2&ved=2ahUKEwjh-ZyjlLiQAxW5sFYBHRtHEKYQM3oECBwQAA',
        'alt' => 'Dark Halloween music festival with special effects',
        'month' => 'OCT',
        'day' => '31',
        'location' => 'BGC, Philippines'
    ]
];

// Handle newsletter submission
$newsletter_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsletter_email'])) {
    $email = filter_var($_POST['newsletter_email'], FILTER_VALIDATE_EMAIL);
    if ($email) {
        $newsletter_message = 'success';
    } else {
        $newsletter_message = 'error';
    }
}
?>

<?= view('components/head', [
    'title' => $pageTitle,
    'description' => $pageDescription,
    'keywords' => $keywords
]) ?>

<body>
    <?= view('components/header', ['active' => 'Home']) ?>

    <!-- Newsletter Message -->
    <?php if ($newsletter_message === 'success'): ?>
        <div class="alert-success">
            ✅ Thank you for subscribing! You'll receive our latest updates.
        </div>
    <?php elseif ($newsletter_message === 'error'): ?>
        <div class="alert-error">
            ❌ Please enter a valid email address.
        </div>
    <?php endif; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero-section" id="home">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-content">
                        <h1 class="hero-title">LIVE A LIFE THAT IS<br>ONE OF A KIND</h1>
                        <p class="hero-description">Experience the ultimate EDM journey with world-class DJs that will transform your night into pure magic.</p>
                        <div class="button-group">
                            <?= view('components/buttons/button_primary', ['label' => 'Buy Tickets', 'href' => '#tickets']) ?>
                            <?= view('components/buttons/button_secondary', ['label' => 'Highlights', 'href' => '#highlights', 'icon' => '▶']) ?>
                        </div>
                    </div>
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1549046666-7c422ab19783?q=80&w=986&auto=format&fit=crop"
                            alt="EDM concert with dramatic lighting and crowd"
                            class="hero-image" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Events Section -->
        <section class="events-section" id="events">
            <div class="container">
                <h2 class="section-title">UPCOMING EVENTS</h2>
                <div class="events-grid">
                    <?php foreach ($events as $event): ?>
                        <?= view('components/cards/event_card', ['event' => $event]) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Features Section (Why BeatSync) -->
        <?= view('components/cta', [
            'heading' => 'WHY BEATSYNC?',
            'sub' => 'The ultimate platform for EDM lovers and event goers',
            'features' => [
                [
                    'icon' => '🎫',
                    'title' => 'Easy Booking',
                    'description' => 'Secure your spot in seconds with our streamlined ticket system'
                ],
                [
                    'icon' => '🎵',
                    'title' => 'World-Class DJs',
                    'description' => 'Experience performances from renowned electronic music artists'
                ],
                [
                    'icon' => '⚡',
                    'title' => 'Exclusive Access',
                    'description' => 'Get early bird tickets and VIP packages before anyone else'
                ]
            ]
        ]) ?>
    </main>

    <?= view('components/footer', [
        'copyright' => '© Copyright BeatSync. All Rights Reserved',
        'phone' => '(+63) 967-386-5115',
        'email' => 'beatsync@gmail.com'
    ]) ?>

    <style>
        /* Layout Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Alert Messages */
        .alert-success,
        .alert-error {
            padding: 16px;
            text-align: center;
            margin: 16px auto;
            border-radius: 8px;
            max-width: 1200px;
        }

        .alert-success {
            background: #4CAF50;
            color: white;
        }

        .alert-error {
            background: #f44336;
            color: white;
        }

        /* Hero Section */
        .hero-section {
            width: 100%;
            padding: 60px 0 80px;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 50px;
            align-items: center;
        }

        .hero-content {
            text-align: left;
        }

        .hero-title {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(40px, 8vw, 80px);
            font-weight: 400;
            line-height: 0.9;
            color: #ffffff;
            margin-bottom: 24px;
            letter-spacing: 2px;
        }

        .hero-description {
            font-size: clamp(16px, 3vw, 20px);
            font-weight: 400;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            max-width: 600px;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .hero-image-wrapper {
            width: 100%;
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(255, 64, 87, 0.3);
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Events Section */
        .events-section {
            width: 100%;
            padding: 80px 0;
        }

        .section-title {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(36px, 8vw, 72px);
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 50px;
            text-align: left;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            perspective: 1000px;
        }

        /* Tablet */
        @media (min-width: 768px) {
            .hero-grid {
                grid-template-columns: 1fr 1fr;
                gap: 60px;
            }

            .button-group {
                flex-direction: row;
            }

            .events-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }
        }

        /* Desktop */
        @media (min-width: 1024px) {
            .container {
                padding: 0 60px;
            }

            .hero-section {
                padding: 80px 0 100px;
            }

            .events-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Reduce 3D on mobile */
        @media (max-width: 767px) {
            .events-grid {
                perspective: none;
            }
        }
    </style>
</body>

</html>
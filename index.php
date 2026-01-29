<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hum Hum Laundry - Bersih, Wangi, Ekonomis</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="asset/css/modern-laundry.css">

    <style>
        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1545173168-9f1947e8025e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="#" class="navbar-brand">
            <span style="font-size: 1.8rem;">🧺</span> Hum Hum Laundry
        </a>
        <div class="navbar-links">
            <a href="#features" class="nav-link">Layanan</a>
            <!-- <a href="#about" class="nav-link">Tentang Kami</a> -->
            <a href="login/index.php" class="btn-login">Masuk</a>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1>Hum Hum Laundry</h1>
            <p>Solusi cuci pakaian profesional dengan hasil yang <strong>Bersih</strong>, <strong>Wangi</strong>, dan harga yang tetap <strong>Ekonomis</strong>.</p>
            <div class="hero-btns">
                <a href="login/index.php" class="btn-primary">Mulai Sekarang</a>
            </div>
        </div>
    </header>

    <section id="features" class="features">
        <div class="section-title">
            <h2>Layanan Kami</h2>
            <p>Berbagai pilihan layanan untuk kebutuhan pakaian Anda</p>
        </div>
        <div class="feature-grid">
            <div class="feature-card">
                <span class="feature-icon">✨</span>
                <h3>Cuci Kiloan</h3>
                <p>Proses cepat dan bersih untuk kebutuhan sehari-hari Anda dengan pewangi pilihan.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">👔</span>
                <h3>Cuci Satuan</h3>
                <p>Khusus Jas, Kebaya, dan pakaian formal lainnya dengan teknik cuci terbaik.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🛌</span>
                <h3>Bedding & Linen</h3>
                <p>Cuci Bedcover, Selimut, dan Sprei hingga bebas debu dan wangi sepanjang malam.</p>
            </div>
        </div>
    </section>

    <footer style="background: var(--secondary); color: var(--white); padding: 4rem 2rem; text-align: center;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">Hum Hum Laundry</div>
            <p style="opacity: 0.7; margin-bottom: 2rem;">&copy; 2026 Hum Hum Laundry. Powered by Reza Trihartanto.</p>
            <div style="display: flex; justify-content: center; gap: 2rem;">
                <a href="#" style="color: white; text-decoration: none; opacity: 0.8;">Twitter</a>
                <a href="#" style="color: white; text-decoration: none; opacity: 0.8;">Facebook</a>
                <a href="#" style="color: white; text-decoration: none; opacity: 0.8;">Instagram</a>
            </div>
        </div>
    </footer>

    <!-- Smooth Scrolling -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
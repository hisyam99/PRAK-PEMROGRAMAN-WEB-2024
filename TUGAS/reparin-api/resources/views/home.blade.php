<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reparin - Platform Jasa Service Gadget</title>
    <link rel="stylesheet" href="/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
  </head>
  <body>
    <!-- Wrapper untuk memastikan layout sticky footer -->
    <div class="wrapper">
      <!-- Header -->
      <header class="header">
        <div class="container">
          <a href="#" class="logo">
            <img src="/reparin-icon.png" alt="Reparin Logo" />
          </a>

          <!-- Hamburger Menu Button -->
          <button class="hamburger-menu" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <nav class="navbar">
            <ul>
              <li><a href="#">Beranda</a></li>
              <li><a href="#features">Fitur</a></li>
              <li><a href="service.html">Layanan</a></li>
              <li><a href="#testimonials">Testimoni</a></li>
              <li><a href="#contact">Kontak</a></li>
              <!-- Periksa autentikasi -->
              @auth
                <li><a href="/dashboard">Dashboard</a></li>
              @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
              @endauth

            </ul>
          </nav>
        </div>
      </header>

      <main>
        <!-- Hero Section -->
        <section id="home" class="hero">
          <div
            class="hero-background"
            style="background-image: url('/hero-bg.jpg')"
          ></div>
          <div class="container">
            <h1>Servis Gadget Profesional</h1>
            <p>
              Solusi terpercaya untuk perbaikan smartphone, laptop, dan tablet
              Anda.
            </p>
            <div class="hero-buttons">
              <a href="#contact" class="btn-primary">Booking Service</a>
              <a href="#" class="btn-secondary">Lihat Video</a>
            </div>
          </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="features">
          <div class="container">
            <h2>Kenapa Memilih Reparin?</h2>
            <div class="features-grid">
              <div class="feature-card">
                <i class="fas fa-bolt"></i>
                <h3>Service Express 1 Jam</h3>
                <p>Layanan perbaikan cepat dengan garansi penuh.</p>
              </div>
              <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Garansi Terpercaya</h3>
                <p>Jaminan layanan dengan garansi hingga 90 hari.</p>
              </div>
              <div class="feature-card">
                <i class="fas fa-user-tie"></i>
                <h3>Teknisi Profesional</h3>
                <p>Tim berpengalaman dengan sertifikasi resmi.</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Layanan Section -->
        <section id="services" class="features">
          <div class="container">
            <h2>Layanan Kami</h2>
            <div class="features-grid">
              <div class="feature-card">
                <i class="fas fa-mobile-alt"></i>
                <h3>Service Smartphone</h3>
                <p>
                  Perbaikan untuk semua jenis kerusakan hardware dan software.
                </p>
              </div>
              <div class="feature-card">
                <i class="fas fa-laptop"></i>
                <h3>Service Laptop</h3>
                <p>
                  Solusi untuk motherboard, baterai, atau instalasi software.
                </p>
              </div>
              <div class="feature-card">
                <i class="fas fa-tablet-alt"></i>
                <h3>Service Tablet</h3>
                <p>Perbaikan layar, baterai, atau masalah teknis lainnya.</p>
              </div>
              <div class="feature-card">
                <i class="fas fa-headphones"></i>
                <h3>Service Aksesoris</h3>
                <p>
                  Perbaikan headphone, smartwatch, dan perangkat tambahan
                  lainnya.
                </p>
              </div>
            </div>
          </div>
        </section>

        <!-- Testimoni Section -->
        <section id="testimonials" class="features">
          <div class="container">
            <h2>Testimoni Pelanggan</h2>
            <div class="features-grid">
              <div class="feature-card">
                <p><strong>Hisyam</strong> dari Malang</p>
                <p>
                  "Pelayanan sangat cepat dan profesional. Sangat memuaskan!"
                </p>
              </div>
              <div class="feature-card">
                <p><strong>Ahmad</strong> dari Jakarta</p>
                <p>
                  "Service terbaik dengan teknisi yang sangat ramah dan
                  berpengalaman."
                </p>
              </div>
              <div class="feature-card">
                <p><strong>Linda</strong> dari Surabaya</p>
                <p>
                  "Harga transparan, sparepart original, dan ada garansi. Sangat
                  recommended!"
                </p>
              </div>
            </div>
          </div>
        </section>

        <!-- Kontak Section -->
        <section id="contact" class="features">
          <div class="container">
            <h2>Hubungi Kami</h2>
            <form class="contact-form">
              <div>
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" placeholder="Nama Anda" required />
              </div>
              <div>
                <label for="email">Email</label>
                <input
                  type="email"
                  id="email"
                  placeholder="Email Anda"
                  required
                />
              </div>
              <div>
                <label for="message">Pesan</label>
                <textarea
                  id="message"
                  rows="4"
                  placeholder="Pesan Anda"
                  required
                ></textarea>
              </div>
              <button type="submit" class="btn-primary">Kirim Pesan</button>
            </form>
          </div>
        </section>
      </main>
    </div>
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer-grid">
          <div class="footer-section about">
            <h4>Tentang Reparin</h4>
            <p>
              Platform jasa service gadget terpercaya dengan teknisi
              berpengalaman dan layanan profesional.
            </p>
            <div class="contact-info">
              <p>
                <i class="fas fa-map-marker-alt"></i> Jl. Teknologi Digital No.
                42, Jakarta, Indonesia
              </p>
              <p><i class="fas fa-phone"></i> +62 812-3456-7890</p>
              <p><i class="fas fa-envelope"></i> support@reparin.id</p>
            </div>
          </div>

          <div class="footer-section links">
            <h4>Link Cepat</h4>
            <ul>
              <li><a href="#home">Beranda</a></li>
              <li><a href="#features">Fitur</a></li>
              <li><a href="service.html">Layanan</a></li>
              <li><a href="#testimonials">Testimoni</a></li>
              <li><a href="#contact">Kontak</a></li>
            </ul>
          </div>

          <div class="footer-section services">
            <h4>Layanan Kami</h4>
            <ul>
              <li><i class="fas fa-mobile-alt"></i> Service Smartphone</li>
              <li><i class="fas fa-laptop"></i> Service Laptop</li>
              <li><i class="fas fa-tablet-alt"></i> Service Tablet</li>
              <li><i class="fas fa-headphones"></i> Service Aksesoris</li>
            </ul>
          </div>

          <div class="footer-section newsletter">
            <h4>Langganan Newsletter</h4>
            <form class="newsletter-form">
              <input type="email" placeholder="Email Anda" required />
              <button type="submit">Berlangganan</button>
            </form>
            <div class="social-links">
              <a href="#" aria-label="Facebook"
                ><i class="fab fa-facebook"></i
              ></a>
              <a href="#" aria-label="Twitter"
                ><i class="fab fa-twitter"></i
              ></a>
              <a href="#" aria-label="Instagram"
                ><i class="fab fa-instagram"></i
              ></a>
              <a href="#" aria-label="LinkedIn"
                ><i class="fab fa-linkedin"></i
              ></a>
              <a href="#" aria-label="YouTube"
                ><i class="fab fa-youtube"></i
              ></a>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; 2024 Reparin. All rights reserved. Created by hisyam99</p>
          <div class="footer-legal">
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat & Ketentuan</a>
          </div>
        </div>
      </div>
    </footer>
    <script src="/navbar_menu.js"></script>
  </body>
</html>

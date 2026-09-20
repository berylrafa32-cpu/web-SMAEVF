<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAEVF - Smart Vertical Adaptive Farming</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --bg-dark-emerald: #0F281E;
            --card-glass-bg: rgba(255, 255, 255, 0.06);
            --card-glass-border: rgba(255, 255, 255, 0.15);
            --primary-orange: #F59E0B;
            --primary-orange-hover: #D97724;
            --accent-green: #10B981;
        }

        body {
            background-color: var(--bg-dark-emerald);
            color: #FFFFFF;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        .glow-orb-top {
            position: absolute;
            width: 650px;
            height: 650px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.22) 0%, rgba(0,0,0,0) 70%);
            top: -150px;
            right: -150px;
            z-index: -1;
            border-radius: 50%;
            filter: blur(50px);
        }

        .glow-orb-mid {
            position: absolute;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.25) 0%, rgba(0,0,0,0) 70%);
            top: 600px;
            left: -200px;
            z-index: -1;
            border-radius: 50%;
            filter: blur(60px);
        }

        .glow-orb-bottom {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.18) 0%, rgba(0,0,0,0) 70%);
            bottom: 300px;
            right: -150px;
            z-index: -1;
            border-radius: 50%;
            filter: blur(50px);
        }

        .navbar {
            backdrop-filter: blur(15px);
            background: rgba(15, 40, 30, 0.85);
            border-bottom: 1px solid var(--card-glass-border);
        }

        .nav-link {
            color: #E5E7EB !important;
            margin: 0 10px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: var(--primary-orange) !important;
        }

        .btn-orange {
            background: linear-gradient(135deg, #F59E0B 0%, #D97724 100%);
            color: #FFFFFF;
            border: none;
            font-weight: 700;
            padding: 12px 28px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(245, 158, 11, 0.4);
            transition: all 0.3s ease;
        }

        .btn-orange:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(245, 158, 11, 0.6);
            color: #FFF;
        }

        .btn-outline-custom {
            background-color: var(--card-glass-bg);
            border: 1px solid var(--card-glass-border);
            color: #FFFFFF;
            font-weight: 500;
            padding: 12px 24px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #FFFFFF;
            transform: translateY(-2px);
        }

        .hero-title {
            font-size: 3.4rem;
            font-weight: 800;
            line-height: 1.15;
            background: linear-gradient(180deg, #FFFFFF 0%, #A7F3D0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title {
            font-weight: 800;
            font-size: 2.3rem;
        }

        .glass-card {
            background: var(--card-glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--card-glass-border);
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            border-color: rgba(245, 158, 11, 0.4);
            transform: translateY(-5px);
        }

        .dark-item-box {
            background: linear-gradient(135deg, rgba(20, 20, 20, 0.6) 0%, rgba(35, 35, 35, 0.4) 100%);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s ease;
        }

        .dark-item-box:hover {
            background: rgba(0, 0, 0, 0.7);
            border-color: var(--primary-orange);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        .icon-box-orange {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(245, 158, 11, 0.15);
            border: 1px solid rgba(245, 158, 11, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-orange);
            flex-shrink: 0;
        }

        .accordion-item {
            background-color: var(--card-glass-bg);
            border: 1px solid var(--card-glass-border);
            color: #FFF;
            border-radius: 14px !important;
            margin-bottom: 12px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .accordion-button {
            background-color: transparent;
            color: #FFF;
            font-weight: 600;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(245, 158, 11, 0.15);
            color: var(--primary-orange);
        }

        .accordion-button::after {
            filter: invert(1);
        }

        #contact {
            background-color: #08140E !important;
        }
        

       @keyframes floatAndGlow {
            0% {
                filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.4)) drop-shadow(0 0 15px rgba(245, 158, 11, 0.3));
            }
            50% {
                filter: drop-shadow(0 15px 25px rgba(0, 0, 0, 0.5)) drop-shadow(0 0 35px rgba(245, 158, 11, 0.6));
            }
            100% {
                filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.4)) drop-shadow(0 0 15px rgba(245, 158, 11, 0.3));
            }
                        }

     .img-hero-animated {
         animation: floatAndGlow 4s ease-in-out infinite !important;
         display: block !important;
         width: 100% !important;
         transition: transform 0.3s ease;
         }

     .img-hero-animated:hover {
         transform: scale(1.03);
        }
    </style>

    <style>
        /* Mengunci Card Form Gelap Sleek */
        .testimonial-form-card {
            background-color: #1a2820 !important;
            border: 1px solid rgba(248, 217, 81, 0.3) !important;
            border-radius: 20px !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5) !important;
        }

        /* Mengunci Input & Textarea Gelap */
        .form-control-custom {
            background-color: #141f19 !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            border-radius: 10px !important;
            padding: 12px 16px !important;
        }

        .form-control-custom:focus {
            border-color: #F8D951 !important;
            box-shadow: 0 0 0 3px rgba(248, 217, 81, 0.2) !important;
            background-color: #0d1410 !important;
        }

        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
        }

        /* Label & Tombol */
        .form-label-custom {
            color: #F8D951 !important;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .btn-custom-submit {
            background-color: #F8D951 !important;
            color: #141f19 !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 12px 20px !important;
            font-weight: 800 !important;
            letter-spacing: 0.5px !important;
            transition: all 0.2s ease !important;
        }

        .btn-custom-submit:hover {
            background-color: #ffe469 !important;
            transform: translateY(-2px);
        }

        /* Card Testimoni Standard Modern */
        .testimonial-card {
            background-color: #1a2820 !important;
            border: 1px solid rgba(248, 217, 81, 0.25) !important;
            border-radius: 12px !important;
            color: #ffffff !important;
            transition: all 0.2s ease-in-out;
        }

        .testimonial-card:hover {
            border-color: #F8D951 !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3) !important;
        }

        /* Pengaman Teks Biar Gak Offscreen */
        .text-break-custom {
            word-break: break-word !important;
            overflow-wrap: anywhere !important;
            white-space: normal !important;
        }

        /* Avatar Inisial Bulat Rapi */
        .avatar-standard {
            width: 40px;
            height: 40px;
            min-width: 40px;
            background-color: #F8D951 !important;
            color: #141f19 !important;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50% !important;
        }

        .btn-delete-custom {
            color: rgba(255, 255, 255, 0.4) !important;
            background: transparent !important;
            border: none !important;
            transition: color 0.2s ease !important;
        }

        .btn-delete-custom:hover {
            color: #ff5252 !important;
        }

       .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 6px;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 1.3rem;
            color: #4a5568;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input[type="radio"]:checked ~ label {
            color: #F8D951;
        }
    </style>
</head>
<body>

    <div class="glow-orb-top"></div>
    <div class="glow-orb-mid"></div>
    <div class="glow-orb-bottom"></div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4" href="#">
                <i class="bi bi-bounding-box-circles text-warning"></i> SMAEVF
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#calculator">Keunggulan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Varian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimoni</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    <a href="https://blynk.cloud/dashboard/login" target="_blank" class="nav-link text-white me-3">
                        Log in
                    </a>
                    <a href="https://blynk.cloud/dashboard/register" target="_blank" class="btn btn-warning">
                        Sign up
                    </a>
                </div>
            </div>
        </div>
    </nav>

 <section class="py-5 my-3" id="about">
        <div class="container">
            <div class="row align-items-center gy-5">
                
                <div class="col-lg-6">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3 fw-bold">🌱 Smart Farming Innovation</span>
                    <h1 class="hero-title mb-4">Why Should You<br>Choose SMAEVF?</h1>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="dark-item-box">
                            <div class="icon-box-orange"><i class="bi bi-droplet-fill"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold fs-5">Automatic Watering</h6>
                                <small class="text-white-50">penyiraman cerdas dengan sensor kelembapan tanah</small>
                            </div>
                        </div>

                        <div class="dark-item-box">
                            <div class="icon-box-orange"><i class="bi bi-lightbulb-fill"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold fs-5">LED Grow Light</h6>
                                <small class="text-white-50">pencahayaan optimal untuk pertumbuhan tanaman</small>
                            </div>
                        </div>

                        <div class="dark-item-box">
                            <div class="icon-box-orange"><i class="bi bi-cpu-fill"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold fs-5">pH Water Monitoring</h6>
                                <small class="text-white-50">Monitoring tingkat keasaman air otomatis by aplikasi.</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="https://wa.me/6283185804491?text=Halo,%20saya%20mau%20order%20SMAEVF" target="_blank" class="btn btn-orange text-decoration-none">
                            <i class="bi bi-cart-fill me-1"></i> Order Now
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=cloud.blynk" target="_blank" class="btn btn-outline-custom">
                            <i class="bi bi-grid-fill me-1"></i> Download Mobile App
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                     <img src="Desain tanpa judul.png"
                            alt="SMAEVF Vertical Farming Equipment"
                            class="img-fluid rounded-4"
                            style="max-height: 650px; object-fit: cover; animation: floatGambar 3s ease-in-out infinite alternate; filter: drop-shadow(0px 15px 25px rgba(0, 0, 0, 0.6));">

                     <style>
                        @keyframes floatGambar {
                            0% { transform: translateY(0px); }
                            100% { transform: translateY(-20px); }
                        }
                        </style>
                </div>

            </div>
            
            <div class="row g-3 mt-4">
                <div class="col-lg-4 col-md-6">
                    <div class="dark-item-box">
                        <div class="icon-box-orange"><i class="bi bi-flower1"></i></div>
                        <div>
                            <h6 class="mb-1 fw-bold">Adaptive Vertical Farming</h6>
                            <small class="text-white-50">Desain berbentuk rak untuk lahan terbatas.</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="dark-item-box">
                        <div class="icon-box-orange"><i class="bi bi-recycle"></i></div>
                        <div>
                            <h6 class="mb-1 fw-bold">Eco-Friendly Materials</h6>
                            <small class="text-white-50">Material daur ulang ramah lingkungan.</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="dark-item-box">
                        <div class="icon-box-orange"><i class="bi bi-box-seam-fill"></i></div>
                        <div>
                            <h6 class="mb-1 fw-bold">Recycled Equipment</h6>
                            <small class="text-white-50">Standar fabrikasi industri modern.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="glass-card p-4 text-center">
                        <h2 class="fw-bold text-warning display-5 mb-1">90%</h2>
                        <p class="text-white-50 mb-0">Hemat Penggunaan Air</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-card p-4 text-center">
                        <h2 class="fw-bold text-warning display-5 mb-1">Efisiensi</h2>
                        <p class="text-white-50 mb-0">penggunaan lahan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-card p-4 text-center">
                        <h2 class="fw-bold text-warning display-5 mb-1">Terjamin</h2>
                        <p class="text-white-50 mb-0">kesehatan tanaman terjaga</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="features" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">SMAEVF</h2>
                <p class="text-white-50 fs-5">Dirancang khusus untuk efisiensi ruang, daya, dan hasil panen maksimal.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="glass-card p-4 h-100">
                        <div class="icon-box-orange mb-3 fs-3"><i class="bi bi-flower1"></i></div>
                        <h4 class="fw-bold">Adaptive Vertical Farming</h4>
                        <p class="text-white-50">Desain vertikal bertingkat yang hemat tempat, cocok dipasang di pekarangan rumah maupun area perkotaan terbatas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-card p-4 h-100">
                        <div class="icon-box-orange mb-3 fs-3"><i class="bi bi-wifi"></i></div>
                        <h4 class="fw-bold">IoT Smart Sensors</h4>
                        <p class="text-white-50">Sistem otomatisasi berbasis sensor cerdas yang memantau nutrisi, suhu air, dan kelembapan secara real-time.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-card p-4 h-100">
                        <div class="icon-box-orange mb-3 fs-3"><i class="bi bi-shield-check"></i></div>
                        <h4 class="fw-bold">Eco-Friendly Materials</h4>
                        <p class="text-white-50">Menggunakan bahan daur ulang berkualitas tinggi yang tahan cuaca ekstrem dan ramah lingkungan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="calculator" class="py-5">
        <div class="container">
            <div class="glass-card p-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-3">SMAEVF In Number</h2>
                        <p class="text-white-50">Bandingkan sistem hidroponik vertikal cerdas SMAEVF dengan metode bercocok tanam konvensional!</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="dark-item-box text-center flex-column">
                                    <span class="text-white-50 small">Efisiensi Lahan</span>
                                    <h3 class="fw-bold text-warning mb-0">+400%</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="dark-item-box text-center flex-column">
                                    <span class="text-white-50 small">Penghematan Air</span>
                                    <h3 class="fw-bold text-success mb-0">Up to 95%</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="dark-item-box text-center flex-column">
                                    <span class="text-white-50 small">Waktu Panen</span>
                                    <h3 class="fw-bold text-warning mb-0">2-3 Minggu</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="dark-item-box text-center flex-column">
                                    <span class="text-white-50 small">tingkat  keribetan</span>
                                    <h3 class="fw-bold text-success mb-0"> <50% </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="products" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Pilihan Varian SMAEVF</h2>
                <p class="text-white-50 fs-5">Sesuaikan dengan kebutuhan Anda.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="glass-card p-4 text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <span class="badge bg-secondary mb-3 px-3 py-2">Home Series</span>
                            <h3 class="fw-bold">SMAEVF Mini</h3>
                            <h2 class="text-warning my-3">Rp 1.499.000</h2>
                            <ul class="list-unstyled text-start text-white-50 d-flex flex-column gap-2 mb-4">
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Kapasitas 25 Tanaman</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Penyiraman Otomatis</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Lampu Grow Light 20W</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6283185804491?text=Pesan%20SMAEVF%20Mini" target="_blank" class="btn btn-outline-custom w-100">Beli Sekarang</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="glass-card p-4 text-center h-100 d-flex flex-column justify-content-between" style="border-color: var(--primary-orange);">
                        <div>
                            <span class="badge bg-warning text-dark mb-3 px-3 py-2 fw-bold">Most Popular</span>
                            <h3 class="fw-bold">SMAEVF Pro</h3>
                            <h2 class="text-warning my-3">Rp 3.299.000</h2>
                            <ul class="list-unstyled text-start text-white-50 d-flex flex-column gap-2 mb-4">
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Kapasitas 50 Tanaman</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> IoT pH & Water Sensor</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Integrasi Mobile App</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Full Spectrum LED 50W</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6283185804491?text=Pesan%20SMAEVF%20Pro" target="_blank" class="btn btn-orange w-100">Beli Sekarang</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="glass-card p-4 text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <span class="badge bg-secondary mb-3 px-3 py-2">Enterprise</span>
                            <h3 class="fw-bold">SMAEVF Farm</h3>
                            <h2 class="text-warning my-3">Custom</h2>
                            <ul class="list-unstyled text-start text-white-50 d-flex flex-column gap-2 mb-4">
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Skala Industri / Komersial</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Kustomisasi Ukuran Rack</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Dashboard Monitoring Analytics</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6283185804491?text=Konsultasi%20SMAEVF%20Farm" target="_blank" class="btn btn-outline-custom w-100">Hubungi Tim</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="container my-5 py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase text-white mb-2" style="letter-spacing: 1px;">Apa Kata Pengguna</h2>
            <div style="width: 50px; height: 3px; background-color: var(--accent-yellow); margin: 0 auto; border-radius: 2px;"></div>
                <div class="row g-4 mb-5">
                    @forelse($testimonials as $item)
                        <div class="col-md-4">
                            <div class="card h-100 p-4 testimonial-card">
                                <div class="card-body d-flex flex-column justify-content-between p-0">
                                    
                                    <div>
                                        <div class="mb-2" style="color: #F8D951; font-size: 0.85rem;">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= ($item->rating ?? 5))
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star text-secondary" style="opacity: 0.4;"></i>
                                            @endif
                                        @endfor
                                    </div>

                                        <!-- Pesan Ulasan -->
                                        <p class="fst-italic m-0 text-white text-break-custom fs-6" style="opacity: 0.95; line-height: 1.5;">
                                            "{{ $item->message }}"
                                        </p>
                                    </div>

                                    <!-- Profil & Hapus -->
                                    <div class="d-flex align-items-center justify-content-between pt-3 mt-3" style="border-top: 1px solid rgba(255, 255, 255, 0.1);">
                                        <div class="d-flex align-items-center overflow-hidden me-2">
                                            <div class="avatar-standard d-flex align-items-center justify-content-center me-3 shadow-sm">
                                                {{ strtoupper(substr($item->name, 0, 1)) }}
                                            </div>
                                            <div class="text-truncate">
                                                <div class="d-flex align-items-center gap-1">
                                                    <h6 class="fw-bold m-0 text-white text-truncate" style="font-size: 0.9rem;">{{ $item->name }}</h6>
                                                    <i class="bi bi-patch-check-fill text-warning fs-6 flex-shrink-0" title="Verified Customer"></i>
                                                </div>
                                                <small class="text-truncate d-block" style="color: #9ab0a1; font-size: 0.78rem;">{{ $item->role }}</small>
                                            </div>
                                        </div>

                                        <form action="{{ route('testimoni.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus ulasan ini?');" class="flex-shrink-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete-custom p-0" title="Hapus Ulasan">
                                                <i class="bi bi-trash3 fs-6"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p style="color: #9ab0a1;">Belum ada testimoni. Kirim testimoni pertama kamu di bawah!</p>
                        </div>
                    @endforelse
                </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-8 col-lg-6">
                    
                    <div class="card p-4 p-lg-5 testimonial-form-card">
                        <h4 class="fw-bold text-center text-white text-uppercase mb-4" style="letter-spacing: 0.5px;">
                            Tambah Ulasan Kamu
                        </h4>

                        <form action="{{ route('testimoni.store') }}" method="POST">
                            @csrf

                            < class="mb-3">
                            <label class="form-label form-label-custom">Rating Ulasan</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" required />
                                <label for="star5" title="5 Bintang"><i class="bi bi-star-fill"></i></label>

                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="4 Bintang"><i class="bi bi-star-fill"></i></label>

                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="3 Bintang"><i class="bi bi-star-fill"></i></label>

                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="2 Bintang"><i class="bi bi-star-fill"></i></label>

                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="1 Bintang"><i class="bi bi-star-fill"></i></label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label form-label-custom">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control form-control-custom shadow-none" placeholder="Contoh: Albern Solikin" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label form-label-custom">Profesi / Peran</label>
                                <input type="text" name="role" class="form-control form-control-custom shadow-none" placeholder="Contoh: Petani Hidroponik / Chef" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label form-label-custom">Pesan Ulasan</label>
                                <textarea name="message" class="form-control form-control-custom shadow-none" rows="3" placeholder="Tuliskan pengalaman kamu..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-custom-submit w-100 text-uppercase">
                                Kirim Testimoni <i class="bi bi-send-fill ms-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </section>

    <section id="faq" class="py-5">
        <div class="container col-lg-8">
            <div class="text-center mb-5">
                <h2 class="section-title">FAQ</h2>
            </div>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Tanaman apa saja yang bisa ditanam di SMAEVF?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-white-50">
                            SMAEVF sangat cocok untuk berbagai sayuran hijau rumahan (Selada, Pakcoy, Bayam), TOGA (Tanaman Obat Keluarga), hingga buah berukuran kecil seperti Strawberi dan Cabai.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Apakah boros listrik?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-white-50">
                            Sangat hemat! Sistem kami menggunakan pompa daya rendah DC 12V dan lampu LED hemat energi yang dimana total konsumsi daya konsumsi kurang dari 30-50 Watt.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Apakah mendapat garansi alat?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-white-50">
                            Setiap pembelian SMAEVF disertai garansi resmi mesin & sensor selama 1 tahun penuh beserta support penggantian sparepart.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="contact" class="pt-5 pb-4 mt-5 border-top border-secondary border-opacity-25">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <h4 class="fw-bold text-warning mb-3"><i class="bi bi-bounding-box-circles"></i> SMAEVF</h4>
                    <p class="text-white-50">Sebuah alat berbasis teknologi IOT dan vertikal untuk menanam tanaman di lahan terbatas sebagai upaya mempertahankan ketahanan pangan.</p>
                </div>

                <div class="col-lg-2 col-md-4">
                    <h6 class="fw-bold mb-3">Navigasi</h6>
                    <ul class="list-unstyled text-white-50 d-flex flex-column gap-2">
                        <li><a href="#about" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li><a href="#features" class="text-white-50 text-decoration-none">Fitur</a></li>
                        <li><a href="#products" class="text-white-50 text-decoration-none">Produk</a></li>
                        <li><a href="#faq" class="text-white-50 text-decoration-none">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h6 class="fw-bold mb-3">Kontak Kami</h6>
                    <p class="text-white-50 mb-1"><i class="bi bi-geo-alt text-warning me-2"></i> Malang, Indonesia</p>
                    <p class="text-white-50 mb-1"><i class="bi bi-envelope text-warning me-2"></i> smaevf@gmail.com</p>
                    <p class="text-white-50"><i class="bi bi-whatsapp text-warning me-2"></i> +62 831-8580-4491</p>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h6 class="fw-bold mb-3">Ikuti Kami</h6>
                    <div class="d-flex gap-3 fs-4">
                        <a href="#" class="text-white-50"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <hr class="my-4 border-secondary border-opacity-25">
            <div class="text-center text-white-50 small">
                &copy; 2026 SMAEVF Technologies. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
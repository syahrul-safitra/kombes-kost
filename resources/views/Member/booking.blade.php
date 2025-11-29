<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pesan Kamar - Pink Residence</title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

        <!-- Custom CSS -->
        <style>
            :root {
                --pink-primary: #FF6B9D;
                --pink-secondary: #C44569;
                --pink-light: #FFE0EC;
                --pink-dark: #A6385C;
                --text-dark: #2D3436;
                --text-light: #636E72;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: var(--text-dark);
                line-height: 1.6;
                background: linear-gradient(135deg, var(--pink-light) 0%, white 100%);
                min-height: 100vh;
            }

            /* Header */
            .booking-header {
                background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
                color: white;
                padding: 40px 0;
                position: relative;
            }

            .booking-header .logo {
                position: absolute;
                top: 20px;
                left: 20px;
                display: flex;
                align-items: center;
                gap: 10px;
                font-weight: bold;
                font-size: 1.2rem;
                color: white;
                text-decoration: none;
            }

            .booking-header .logo i {
                font-size: 1.5rem;
            }

            .back-button {
                position: absolute;
                top: 20px;
                right: 20px;
                background: rgba(255, 255, 255, 0.2);
                color: white;
                border: 1px solid rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .back-button:hover {
                background: rgba(255, 255, 255, 0.3);
                transform: translateY(-2px);
            }

            .booking-header h1 {
                font-size: 2.5rem;
                font-weight: bold;
                margin-bottom: 10px;
                text-align: center;
            }

            .booking-header p {
                font-size: 1.1rem;
                opacity: 0.9;
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
            }

            /* Main Container */
            .booking-container {
                padding: 40px 0;
            }

            /* Room Gallery */
            .room-gallery {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .section-title {
                font-size: 1.8rem;
                font-weight: bold;
                color: var(--text-dark);
                margin-bottom: 20px;
                position: relative;
                display: inline-block;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: -8px;
                left: 0;
                width: 40px;
                height: 3px;
                background-color: var(--pink-primary);
            }

            .room-images-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                margin-top: 30px;
            }

            .room-image-item {
                position: relative;
                border-radius: 15px;
                overflow: hidden;
                cursor: pointer;
                transition: all 0.3s ease;
                border: 3px solid transparent;
            }

            .room-image-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            }

            .room-image-item.selected {
                border-color: var(--pink-primary);
                box-shadow: 0 15px 30px rgba(255, 107, 157, 0.3);
            }

            .room-image-item img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                transition: all 0.3s ease;
            }

            .room-image-item:hover img {
                transform: scale(1.1);
            }

            .room-image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
                display: flex;
                align-items: flex-end;
                padding: 20px;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .room-image-item:hover .room-image-overlay,
            .room-image-item.selected .room-image-overlay {
                opacity: 1;
            }

            .room-image-info {
                color: white;
            }

            .room-image-info h3 {
                font-size: 1.2rem;
                margin-bottom: 5px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }

            .room-image-info .price {
                font-size: 1.1rem;
                font-weight: bold;
                color: var(--pink-light);
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }

            .selected-indicator {
                position: absolute;
                top: 15px;
                right: 15px;
                background: var(--pink-primary);
                color: white;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transform: scale(0);
                transition: all 0.3s ease;
            }

            .room-image-item.selected .selected-indicator {
                opacity: 1;
                transform: scale(1);
            }

            /* Room Facilities */
            .room-facilities {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
                display: none;
            }

            .room-facilities.show {
                display: block;
            }

            .facilities-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }

            .facility-item {
                display: flex;
                align-items: center;
                gap: 15px;
                padding: 15px;
                background: var(--pink-light);
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            .facility-item:hover {
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(255, 107, 157, 0.2);
            }

            .facility-icon {
                width: 50px;
                height: 50px;
                background: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                color: var(--pink-primary);
            }

            .facility-info h4 {
                font-size: 1rem;
                margin-bottom: 2px;
                color: var(--text-dark);
            }

            .facility-info p {
                font-size: 0.9rem;
                color: var(--text-light);
                margin: 0;
            }

            /* Gallery Section - BARU */
            .gallery-section {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
                display: none;
            }

            .gallery-section.show {
                display: block;
            }

            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                margin-top: 30px;
            }

            .gallery-item {
                position: relative;
                border-radius: 15px;
                overflow: hidden;
                cursor: pointer;
                transition: all 0.3s ease;
                height: 200px;
            }

            .gallery-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            }

            .gallery-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: all 0.3s ease;
            }

            .gallery-item:hover img {
                transform: scale(1.1);
            }

            .gallery-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(255, 107, 157, 0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .gallery-item:hover .gallery-overlay {
                opacity: 1;
            }

            .gallery-overlay i {
                color: white;
                font-size: 2rem;
            }

            /* Booking Form */
            .booking-form {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-label {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 8px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .form-label i {
                color: var(--pink-primary);
            }

            .form-control,
            .form-select {
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                padding: 12px 15px;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: var(--pink-primary);
                box-shadow: 0 0 0 0.2rem rgba(255, 107, 157, 0.25);
            }

            .form-control::placeholder {
                color: #adb5bd;
            }

            .input-group-text {
                background-color: var(--pink-light);
                border: 2px solid #e0e0e0;
                border-right: none;
                color: var(--pink-primary);
            }

            .input-group .form-control {
                border-left: none;
            }

            /* Date Range Picker Custom */
            .date-range-container {
                position: relative;
            }

            .date-range-display {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 12px 15px;
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .date-range-display:hover {
                border-color: var(--pink-primary);
            }

            .date-range-display:focus-within {
                border-color: var(--pink-primary);
                box-shadow: 0 0 0 0.2rem rgba(255, 107, 157, 0.25);
            }

            .date-start,
            .date-end {
                display: flex;
                flex-direction: column;
            }

            .date-label {
                font-size: 0.8rem;
                color: var(--text-light);
                margin-bottom: 2px;
            }

            .date-value {
                font-weight: 600;
                color: var(--text-dark);
            }

            .date-separator {
                margin: 0 15px;
                color: var(--text-light);
                font-size: 1.2rem;
            }

            /* Price Summary */
            .price-summary {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .price-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .price-item:last-child {
                border-bottom: none;
                font-weight: bold;
                font-size: 1.2rem;
                color: var(--pink-primary);
                margin-top: 10px;
                padding-top: 20px;
                border-top: 2px dashed #e0e0e0;
            }

            .price-label {
                color: var(--text-dark);
            }

            .price-value {
                font-weight: 600;
                color: var(--text-dark);
            }

            /* Additional Services */
            .additional-services {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .service-items {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
                margin-top: 20px;
            }

            .service-item {
                display: flex;
                align-items: center;
                padding: 15px;
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .service-item:hover {
                border-color: var(--pink-primary);
                background-color: var(--pink-light);
            }

            .service-item.selected {
                border-color: var(--pink-primary);
                background-color: var(--pink-light);
            }

            .service-checkbox {
                margin-right: 15px;
                width: 20px;
                height: 20px;
                accent-color: var(--pink-primary);
            }

            .service-info {
                flex: 1;
            }

            .service-name {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 2px;
            }

            .service-price {
                font-size: 0.9rem;
                color: var(--pink-primary);
                font-weight: 600;
            }

            /* Booking Button */
            .booking-button-container {
                text-align: center;
                margin-top: 30px;
            }

            .btn-book {
                background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
                color: white;
                border: none;
                padding: 15px 50px;
                border-radius: 25px;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                display: inline-block;
                text-decoration: none;
            }

            .btn-book:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(255, 107, 157, 0.3);
                color: white;
            }

            /* Lightbox */
            .lightbox {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                z-index: 9999;
                cursor: pointer;
            }

            .lightbox-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                max-width: 90%;
                max-height: 90%;
            }

            .lightbox-content img {
                width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            }

            .lightbox-close {
                position: absolute;
                top: 20px;
                right: 40px;
                color: white;
                font-size: 3rem;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .lightbox-close:hover {
                transform: rotate(90deg);
            }

            /* Success Message */
            .success-message {
                background-color: #d4edda;
                border: 1px solid #c3e6cb;
                color: #155724;
                padding: 15px;
                border-radius: 10px;
                margin-bottom: 20px;
                display: none;
            }

            .success-message.show {
                display: block;
                animation: slideDown 0.3s ease;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Responsive */
            @media (max-width: 768px) {
                .booking-header {
                    padding: 30px 20px;
                }

                .booking-header h1 {
                    font-size: 2rem;
                }

                .booking-header .logo {
                    position: static;
                    justify-content: center;
                    margin-bottom: 15px;
                }

                .back-button {
                    position: static;
                    margin: 0 auto 20px;
                    display: flex;
                    width: fit-content;
                }

                .booking-container {
                    padding: 20px 15px;
                }

                .room-images-grid,
                .gallery-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                .facilities-grid {
                    grid-template-columns: 1fr;
                }

                .service-items {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 576px) {
                .booking-header h1 {
                    font-size: 1.8rem;
                }

                .section-title {
                    font-size: 1.5rem;
                }

                .form-label {
                    font-size: 0.9rem;
                }

                .room-images-grid,
                .gallery-grid {
                    grid-template-columns: 1fr;
                }

                .btn-book {
                    padding: 12px 30px;
                    font-size: 1rem;
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        <div class="booking-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <i class="bi bi-house-heart-fill"></i>
                Pink Residence
            </a>

            <!-- Back Button -->
            <a href="index.html#rooms" class="back-button" title="Kembali">
                <i class="bi bi-arrow-left"></i>
            </a>

            <h1>Pesan Kamar</h1>
            <p>Pilih tipe kamar yang Anda inginkan dan lengkapi data pemesanan</p>
        </div>

        <!-- Main Container -->
        <div class="booking-container container">
            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <i class="bi bi-check-circle-fill"></i> Pemesanan berhasil! Kami akan menghubungi Anda segera untuk
                konfirmasi.
            </div>

            <!-- Room Gallery -->
            <div class="room-gallery">
                <h2 class="section-title">Gambar Kamar</h2>
                <div class="room-images-grid">
                    <div class="room-image-item" data-room-type="standard" data-price="900000"
                        data-facilities='["Bed 120x200", "Meja Belajar", "KM Luar", "Lemari Pakaian", "Jendela Besar"]'>
                        <img src="https://picsum.photos/seed/standard/400/250" alt="Standard Room">
                        {{-- <div class="room-image-overlay">
                            <div class="room-image-info">
                                <h3>Kamar Standard</h3>
                                <div class="price">Rp 900.000/bulan</div>
                            </div>
                        </div>
                        <div class="selected-indicator">
                            <i class="bi bi-check-lg"></i>
                        </div> --}}
                    </div>

                    <div class="room-image-item" data-room-type="deluxe" data-price="1300000"
                        data-facilities='["Bed 160x200", "Meja Belajar", "AC", "KM Dalam", "Lemari Pakaian", "TV"]'>
                        <img src="https://picsum.photos/seed/deluxe/400/250" alt="Deluxe Room">
                        {{-- <div class="room-image-overlay">
                            <div class="room-image-info">
                                <h3>Kamar Deluxe</h3>
                                <div class="price">Rp 1.300.000/bulan</div>
                            </div>
                        </div>
                        <div class="selected-indicator">
                            <i class="bi bi-check-lg"></i>
                        </div> --}}
                    </div>

                    <div class="room-image-item" data-room-type="suite" data-price="1800000"
                        data-facilities='["Bed 180x200", "Meja Belajar", "AC", "KM Dalam", "Lemari Pakaian", "TV", "Ruang Tamu", "Mini Bar"]'>
                        <img src="https://picsum.photos/seed/suite/400/250" alt="Suite Room">
                        {{-- <div class="room-image-overlay">
                            <div class="room-image-info">
                                <h3>Kamar Suite</h3>
                                <div class="price">Rp 1.800.000/bulan</div>
                            </div>
                        </div>
                        <div class="selected-indicator">
                            <i class="bi bi-check-lg"></i>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Room Facilities -->
            <div class="room-facilities" id="roomFacilities">
                <h2 class="section-title">Fasilitas Kamar</h2>
                <div class="facilities-grid" id="facilitiesGrid">
                    <!-- Fasilitas akan diisi secara dinamis -->
                </div>
            </div>

            <!-- Gallery Section - BARU -->
            <div class="gallery-section" id="gallerySection">
                <h2 class="section-title">Galeri Kamar</h2>
                <p style="color: var(--text-light); margin-bottom: 20px;">Lihat lebih banyak foto dari tipe kamar yang
                    Anda pilih</p>
                <div class="gallery-grid" id="galleryGrid">
                    <!-- Gallery items akan diisi secara dinamis -->
                </div>
            </div>

            <!-- Jadwal Kamar -->
            <div class="additional-services">
                <h2 class="section-title">Jadwal Booking</h2>
                <div class="service-items">
                    <div class="service-item" data-service="laundry" data-price="100000">
                        {{-- <input type="checkbox" class="service-checkbox" id="laundry"> --}}
                        <div class="service-info">
                            <div class="service-name">Laundry</div>
                            <div class="service-price">+ Rp 100.000/bulan</div>
                        </div>
                    </div>

                    <div class="service-item" data-service="cleaning" data-price="150000">
                        {{-- <input type="checkbox" class="service-checkbox" id="cleaning"> --}}
                        <div class="service-info">
                            <div class="service-name">Cleaning Service</div>
                            <div class="service-price">+ Rp 150.000/bulan</div>
                        </div>
                    </div>

                    <div class="service-item" data-service="breakfast" data-price="300000">
                        {{-- <input type="checkbox" class="service-checkbox" id="breakfast"> --}}
                        <div class="service-info">
                            <div class="service-name">Sarapan</div>
                            <div class="service-price">+ Rp 300.000/bulan</div>
                        </div>
                    </div>

                    <div class="service-item" data-service="parking" data-price="50000">
                        {{-- <input type="checkbox" class="service-checkbox" id="parking"> --}}
                        <div class="service-info">
                            <div class="service-name">Parkir Mobil</div>
                            <div class="service-price">+ Rp 50.000/bulan</div>
                        </div>
                    </div>
                    <div class="service-item" data-service="breakfast" data-price="300000">
                        {{-- <input type="checkbox" class="service-checkbox" id="breakfast"> --}}
                        <div class="service-info">
                            <div class="service-name">Sarapan</div>
                            <div class="service-price">+ Rp 300.000/bulan</div>
                        </div>
                    </div>

                    <div class="service-item" data-service="parking" data-price="50000">
                        {{-- <input type="checkbox" class="service-checkbox" id="parking"> --}}
                        <div class="service-info">
                            <div class="service-name">Parkir Mobil</div>
                            <div class="service-price">+ Rp 50.000/bulan</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="booking-form">
                <h2 class="section-title">Data Pemesanan</h2>
                <form id="bookingForm">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="bi bi-calendar-range"></i> Tanggal Sewa
                                </label>
                                <div class="form-group">
                                    {{-- <span class="input-group-text"></span> --}}
                                    <input type="date" class="form-control" id="noWa"
                                        placeholder="812-3456-7890" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            {{-- <div class="form-group">
                                <input type="text" class="form-control" id="namaLengkap"
                                    placeholder="Masukkan nama lengkap Anda" required>
                            </div> --}}

                            <label for="namaLengkap" class="form-label">
                                <i class="bi bi-alarm"></i> Paket Sewa
                            </label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <option value="3">Tiga Bulan </option>
                                <option value="6">6 Bulan</option>
                                <option value="12">12 Bulan</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Price Summary -->
            <div class="price-summary">
                <h2 class="section-title">Rincian Biaya</h2>
                {{-- <div class="price-item">
                    <div class="price-label">Tipe Kamar</div>
                    <div class="price-value" id="roomTypePrice">-</div>
                </div> --}}
                <div class="price-item">
                    <div class="price-label">Durasi Sewa</div>
                    <div class="price-value" id="duration">-</div>
                </div>
                <div class="price-item" id="servicesContainer" style="display: none;">
                    <div class="price-label">Layanan Tambahan</div>
                    <div class="price-value" id="servicesPrice">Rp 0</div>
                </div>
                <div class="price-item">
                    <div class="price-label">Total Biaya</div>
                    <div class="price-value" id="totalPrice">Rp 0</div>
                </div>
            </div>

            <!-- Booking Button -->
            <div class="booking-button-container">
                <button type="button" class="btn-book" id="bookButton">Pesan Sekarang</button>
            </div>
        </div>

        <!-- Lightbox -->
        <div class="lightbox" id="lightbox">
            <span class="lightbox-close">&times;</span>
            <div class="lightbox-content">
                <img src="" alt="Room Image">
            </div>
        </div>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Flatpickr for Date Picker -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- Custom JS -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Variables
                let selectedRoomType = null;
                let roomPrice = 0;
                let roomFacilities = [];
                let checkInDate = null;
                let checkOutDate = null;
                let selectedServices = [];

                // DOM Elements
                const roomImageItems = document.querySelectorAll('.room-image-item');
                const serviceItems = document.querySelectorAll('.service-item');
                const bookButton = document.getElementById('bookButton');
                const successMessage = document.getElementById('successMessage');
                const bookingForm = document.getElementById('bookingForm');
                const roomFacilities = document.getElementById('roomFacilities');
                const facilitiesGrid = document.getElementById('facilitiesGrid');
                const gallerySection = document.getElementById('gallerySection');
                const galleryGrid = document.getElementById('galleryGrid');
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = lightbox.querySelector('img');
                const lightboxClose = lightbox.querySelector('.lightbox-close');

                // Gallery images data
                const galleryImages = {
                    standard: [
                        'https://picsum.photos/seed/standard1/400/300',
                        'https://picsum.photos/seed/standard2/400/300',
                        'https://picsum.photos/seed/standard3/400/300',
                        'https://picsum.photos/seed/standard4/400/300',
                        'https://picsum.photos/seed/standard5/400/300',
                        'https://picsum.photos/seed/standard6/400/300'
                    ],
                    deluxe: [
                        'https://picsum.photos/seed/deluxe1/400/300',
                        'https://picsum.photos/seed/deluxe2/400/300',
                        'https://picsum.photos/seed/deluxe3/400/300',
                        'https://picsum.photos/seed/deluxe4/400/300',
                        'https://picsum.photos/seed/deluxe5/400/300',
                        'https://picsum.photos/seed/deluxe6/400/300'
                    ],
                    suite: [
                        'https://picsum.photos/seed/suite1/400/300',
                        'https://picsum.photos/seed/suite2/400/300',
                        'https://picsum.photos/seed/suite3/400/300',
                        'https://picsum.photos/seed/suite4/400/300',
                        'https://picsum.photos/seed/suite5/400/300',
                        'https://picsum.photos/seed/suite6/400/300'
                    ]
                };

                // Room Image Selection
                roomImageItems.forEach(item => {
                    const img = item.querySelector('img');

                    // Click to select room
                    item.addEventListener('click', function(e) {
                        if (!e.target.closest('.selected-indicator')) {
                            // Remove selected class from all items
                            roomImageItems.forEach(i => i.classList.remove('selected'));

                            // Add selected class to clicked item
                            this.classList.add('selected');

                            // Get room data
                            selectedRoomType = this.dataset.roomType;
                            roomPrice = parseInt(this.dataset.price);
                            roomFacilities = JSON.parse(this.dataset.facilities);

                            // Show facilities section
                            showRoomFacilities();

                            // Show gallery section
                            showGallery();

                            // Update price summary
                            updatePriceSummary();
                        }
                    });

                    // Click to show lightbox
                    img.addEventListener('click', function(e) {
                        e.stopPropagation();
                        showLightbox(this.src);
                    });
                });

                // Lightbox functionality
                function showLightbox(src) {
                    lightboxImg.src = src;
                    lightbox.style.display = 'block';
                    document.body.style.overflow = 'hidden';
                }

                function closeLightbox() {
                    lightbox.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }

                lightboxClose.addEventListener('click', closeLightbox);
                lightbox.addEventListener('click', function(e) {
                    if (e.target === lightbox) {
                        closeLightbox();
                    }
                });

                // Show room facilities
                function showRoomFacilities() {
                    if (selectedRoomType && roomFacilities.length > 0) {
                        // Clear existing facilities
                        facilitiesGrid.innerHTML = '';

                        // Get facility icons
                        const facilityIcons = {
                            'Bed 120x200': 'bi-bed',
                            'Bed 160x200': 'bi-bed',
                            'Bed 180x200': 'bi-bed',
                            'Meja Belajar': 'bi-laptop',
                            'AC': 'bi-snow',
                            'KM Luar': 'bi-droplet',
                            'KM Dalam': 'bi-droplet',
                            'Lemari Pakaian': 'bi-cupboard',
                            'Jendela Besar': 'bi-window',
                            'TV': 'bi-tv',
                            'Ruang Tamu': 'bi-couch',
                            'Mini Bar': 'bi-cup-straw'
                        };

                        // Add facilities to grid
                        roomFacilities.forEach(facility => {
                            const facilityItem = document.createElement('div');
                            facilityItem.className = 'facility-item';

                            const icon = facilityIcons[facility] || 'bi-check-circle';

                            facilityItem.innerHTML = `
                            <div class="facility-icon">
                                <i class="bi ${icon}"></i>
                            </div>
                            <div class="facility-info">
                                <h4>${facility}</h4>
                                <p>Tersedia di kamar</p>
                            </div>
                        `;

                            facilitiesGrid.appendChild(facilityItem);
                        });

                        // Show facilities section
                        roomFacilities.classList.add('show');
                    } else {
                        roomFacilities.classList.remove('show');
                    }
                }

                // Show gallery section
                function showGallery() {
                    if (selectedRoomType && galleryImages[selectedRoomType]) {
                        // Clear existing gallery items
                        galleryGrid.innerHTML = '';

                        // Add gallery items
                        galleryImages[selectedRoomType].forEach((imageUrl, index) => {
                            const galleryItem = document.createElement('div');
                            galleryItem.className = 'gallery-item';
                            galleryItem.innerHTML = `
                            <img src="${imageUrl}" alt="Gallery ${index + 1}">
                            <div class="gallery-overlay">
                                <i class="bi bi-zoom-in"></i>
                            </div>
                        `;

                            // Add click event for lightbox
                            galleryItem.addEventListener('click', function() {
                                showLightbox(imageUrl);
                            });

                            galleryGrid.appendChild(galleryItem);
                        });

                        // Show gallery section
                        gallerySection.classList.add('show');
                    } else {
                        gallerySection.classList.remove('show');
                    }
                }

                // Date Range Picker
                const dateRangeDisplay = document.getElementById('dateRangeDisplay');
                const checkInInput = document.getElementById('checkIn');
                const checkOutInput = document.getElementById('checkOut');
                const checkInDateDisplay = document.getElementById('checkInDate');
                const checkOutDateDisplay = document.getElementById('checkOutDate');

                // Initialize Flatpickr
                const dateRangePicker = flatpickr(dateRangeDisplay, {
                    mode: "range",
                    dateFormat: "d/m/Y",
                    minDate: "today",
                    locale: {
                        firstDayOfWeek: 1,
                        weekdays: {
                            shorthand: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                            longhand: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                        },
                        months: {
                            shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt',
                                'Nov', 'Des'
                            ],
                            longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                                'Agustus', 'September', 'Oktober', 'November', 'Desember'
                            ],
                        },
                    },
                    onChange: function(selectedDates, dateStr) {
                        if (selectedDates.length === 2) {
                            checkInDate = selectedDates[0];
                            checkOutDate = selectedDates[1];

                            // Update hidden inputs
                            checkInInput.value = formatDateForInput(checkInDate);
                            checkOutInput.value = formatDateForInput(checkOutDate);

                            // Update display
                            checkInDateDisplay.textContent = formatDateForDisplay(checkInDate);
                            checkOutDateDisplay.textContent = formatDateForDisplay(checkOutDate);

                            // Update price summary
                            updatePriceSummary();
                        }
                    }
                });

                // Service Selection
                serviceItems.forEach(item => {
                    const checkbox = item.querySelector('.service-checkbox');

                    item.addEventListener('click', function() {
                        checkbox.checked = !checkbox.checked;

                        if (checkbox.checked) {
                            item.classList.add('selected');
                            selectedServices.push({
                                name: item.dataset.service,
                                price: parseInt(item.dataset.price)
                            });
                        } else {
                            item.classList.remove('selected');
                            selectedServices = selectedServices.filter(service => service.name !== item
                                .dataset.service);
                        }

                        // Update price summary
                        updatePriceSummary();
                    });
                });

                // Book Button Click
                bookButton.addEventListener('click', function() {
                    if (validateForm()) {
                        // Show loading state
                        this.innerHTML =
                            '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
                        this.disabled = true;

                        // Simulate API call
                        setTimeout(() => {
                            // Show success message
                            successMessage.classList.add('show');

                            // Reset button
                            this.innerHTML = 'Pesan Sekarang';
                            this.disabled = false;

                            // Scroll to top
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });

                            // Hide success message after 5 seconds
                            setTimeout(() => {
                                successMessage.classList.remove('show');
                            }, 5000);
                        }, 2000);
                    }
                });

                // Helper Functions
                function formatDateForInput(date) {
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    return `${year}-${month}-${day}`;
                }

                function formatDateForDisplay(date) {
                    const day = date.getDate();
                    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ];
                    const month = monthNames[date.getMonth()];
                    const year = date.getFullYear();
                    return `${day} ${month} ${year}`;
                }

                function calculateDuration() {
                    if (!checkInDate || !checkOutDate) return 0;

                    const timeDiff = checkOutDate.getTime() - checkInDate.getTime();
                    const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                    return daysDiff;
                }

                function updatePriceSummary() {
                    // Update room type price
                    const roomTypePriceElement = document.getElementById('roomTypePrice');
                    if (selectedRoomType && roomPrice > 0) {
                        const duration = calculateDuration();
                        if (duration > 0) {
                            const totalRoomPrice = roomPrice * duration;
                            roomTypePriceElement.textContent = `Rp ${formatCurrency(totalRoomPrice)}`;
                        } else {
                            roomTypePriceElement.textContent = `Rp ${formatCurrency(roomPrice)}/bulan`;
                        }
                    } else {
                        roomTypePriceElement.textContent = '-';
                    }

                    // Update duration
                    const durationElement = document.getElementById('duration');
                    if (checkInDate && checkOutDate) {
                        const duration = calculateDuration();
                        if (duration > 0) {
                            durationElement.textContent = `${duration} hari`;
                        } else {
                            durationElement.textContent = '-';
                        }
                    } else {
                        durationElement.textContent = '-';
                    }

                    // Update services price
                    const servicesContainer = document.getElementById('servicesContainer');
                    const servicesPriceElement = document.getElementById('servicesPrice');
                    const servicesTotal = selectedServices.reduce((total, service) => total + service.price, 0);

                    if (servicesTotal > 0) {
                        servicesContainer.style.display = 'flex';
                        servicesPriceElement.textContent = `Rp ${formatCurrency(servicesTotal)}`;
                    } else {
                        servicesContainer.style.display = 'none';
                    }

                    // Update total price
                    const totalPriceElement = document.getElementById('totalPrice');
                    let total = 0;

                    if (selectedRoomType && roomPrice > 0 && checkInDate && checkOutDate) {
                        const duration = calculateDuration();
                        if (duration > 0) {
                            total += roomPrice * duration;
                        }
                    }

                    total += servicesTotal;

                    if (total > 0) {
                        totalPriceElement.textContent = `Rp ${formatCurrency(total)}`;
                    } else {
                        totalPriceElement.textContent = 'Rp 0';
                    }
                }

                function formatCurrency(amount) {
                    return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }

                function validateForm() {
                    let isValid = true;

                    // Check if room type is selected
                    if (!selectedRoomType) {
                        alert('Silakan pilih tipe kamar');
                        isValid = false;
                    }

                    // Check if dates are selected
                    if (!checkInDate || !checkOutDate) {
                        alert('Silakan pilih tanggal check-in dan check-out');
                        isValid = false;
                    }

                    // Check if form fields are filled
                    const namaLengkap = document.getElementById('namaLengkap').value.trim();
                    const noWa = document.getElementById('noWa').value.trim();
                    const email = document.getElementById('email').value.trim();

                    if (!namaLengkap) {
                        alert('Silakan masukkan nama lengkap');
                        isValid = false;
                    }

                    if (!noWa) {
                        alert('Silakan masukkan nomor WhatsApp');
                        isValid = false;
                    }

                    if (!email) {
                        alert('Silakan masukkan email');
                        isValid = false;
                    }

                    // Validate email format
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (email && !emailRegex.test(email)) {
                        alert('Format email tidak valid');
                        isValid = false;
                    }

                    return isValid;
                }
            });
        </script>
    </body>

</html>

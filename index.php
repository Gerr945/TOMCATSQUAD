<?php
if (!empty($_GET['q'])) {
    $query = htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8');

    switch ($query) {
        case 'info':
            phpinfo();
            exit;
        default:
            header("HTTP/1.0 404 Not Found");
            echo "Invalid query parameter.";
            exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOMCAT SQUAD - Eskul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('WhatsApp Image 2025-09-02 at 20.42.08.jpeg') no-repeat center center;
            background-size: cover;
            height: 70vh;
        }

        .achievement-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .timeline-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 30px;
            height: calc(100% - 30px);
            width: 2px;
            background: #3b82f6;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 50vh;
            }
        }

        /* Animasi muncul popup */
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="flex items-center space-x-2">
                <img src="WhatsApp Image 2025-07-30 at 14.10.26.jpeg"
                    alt="gambar perkumpulan para anggota TOMCAT SQUAD dari angkatan lama sampai angkatan baru"
                    class="h-10">
                <span class="text-xl font-bold">TOMCAT SQUAD</span>
            </a>

            <!-- Tombol Dashboard -->
            <button id="btnDashboard" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                LOGIN
            </button>


            <div class="hidden md:flex space-x-8">
                <a href="#home" class="hover:text-blue-200 transition">Beranda</a>
                <a href="#about" class="hover:text-blue-200 transition">Tentang</a>
                <a href="#program" class="hover:text-blue-200 transition">Program</a>
                <a href="#achievement" class="hover:text-blue-200 transition">Karya</a>
                <a href="#history" class="hover:text-blue-200 transition">Sejarah</a>
                <a href="#gallery" class="hover:text-blue-200 transition">Galeri</a>
                <a href="#testimoni" class="hover:text-blue-200 transition">Testimoni</a>
                <a href="#contact" class="hover:text-blue-200 transition">Kontak</a>
                <a href="#registration" class="hover:text-blue-200 transition">Daftar</a>
            </div>

            <button class="md:hidden text-2xl" id="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden bg-blue-700" id="mobile-menu">
            <div class="container mx-auto px-4 py-2 flex flex-col space-y-3">
                <a href="#home" class="block py-2 hover:text-blue-200 transition">Beranda</a>
                <a href="#about" class="block py-2 hover:text-blue-200 transition">Tentang</a>
                <a href="#program" class="block py-2 hover:text-blue-200 transition">Program</a>
                <a href="#achievement" class="block py-2 hover:text-blue-200 transition">Karya</a>
                <a href="#history" class="block py-2 hover:text-blue-200 transition">Sejarah</a>
                <a href="#gallery" class="block py-2 hover:text-blue-200 transition">Galeri</a>
                <a href="#testimoni" class="block py-2 hover:text-blue-200 transition">Testimoni</a>
                <a href="#contact" class="block py-2 hover:text-blue-200 transition">Kontak</a>
                <a href="#registration" class="block py-2 hover:text-blue-200 transition">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Overlay (background gelap transparan) -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <!-- Form Login Melayang -->
        <div id="loginForm" class="bg-white p-6 rounded-lg shadow-lg w-80 fade-in">
            <h2 class="text-xl font-semibold text-center mb-4">Login Admin</h2>
            <form id="formLogin" action="login.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Admin</label>
                    <input type="text" name="username" class="w-full border rounded px-3 py-2"
                        placeholder="Masukkan nama" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2"
                        placeholder="Masukkan password" required>
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Login
                    </button>
                    <button type="button" id="closeBtn"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Tutup
                    </button>
                </div>
            </form>
        </div>
        <script>
            const btnDashboard = document.getElementById("btnDashboard");
            const overlay = document.getElementById("overlay");
            const closeBtn = document.getElementById("closeBtn");

            btnDashboard.addEventListener("click", () => {
                overlay.classList.remove("hidden");
            });

            closeBtn.addEventListener("click", () => {
                overlay.classList.add("hidden");
            });

            // Tutup popup kalau klik di luar form
            overlay.addEventListener("click", (e) => {
                if (e.target === overlay) {
                    overlay.classList.add("hidden");
                }
            });
        </script>
    </div>

    <!-- Hero Section -->
    <section class="hero-section flex items-center justify-center text-white" id="home">
        <div class="text-center px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">TOMCAT SQUAD</h1>
            <p class="text-xl md:text-2xl mb-8">Eskul Mengembangkan kreativitas dan inovasi siswa melalui teknologi</p>
            <a href="#program"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full font-semibold transition inline-block">Lihat
                Program Kami</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white" id="about">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12">
                    <img src="WhatsApp Image 2025-10-22 at 16.40.45.jpeg"
                        alt="gambar kegiatan eskul TOMCAT SQUAD di laboratorium" class="rounded-lg shadow-xl w-full">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang TOMCAT SQUAD</h2>
                    <p class="text-gray-600 mb-4">
                        Eskul TOMCAT didirikan pada tahun 2010 dengan tujuan untuk memupuk minat siswa dalam bidang
                        inovasi dan teknologi. Kami percaya bahwa TOMCAT adalah eskul yang dapat membawa siswa ke masa
                        depan, dan kami berkomitmen untuk mempersiapkan siswa menghadapi tantangan abad ke-21.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Dengan adanya fasilitas dan mentor berpengalaman, kami memberikan kesempatan bagi siswa untuk
                        belajar dan berinovasi.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-3">
                                <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">15+</p>
                                <p class="text-gray-600 text-sm">Anggota Aktif</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-3">
                                <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">10+</p>
                                <p class="text-gray-600 text-sm">Tahun Pengalaman</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-3">
                                <i class="fas fa-robot text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">7+</p>
                                <p class="text-gray-600 text-sm">Proyek</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section class="py-16 bg-gray-50" id="program">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Program Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Kami menawarkan berbagai program yang dirancang untuk siswa dengan tingkat keahlian yang berbeda,
                    dari pemula hingga mahir.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Program 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-robot text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-3">Dasar Mikrotik</h3>
                    <p class="text-gray-600 text-center">
                        Program untuk pemula yang ingin belajar dasar-dasar mikrotik, elektronik, dan pemrograman.
                        Khususnya untuk siswa Pemula.
                    </p>
                    <div class="mt-4 text-blue-600 font-medium text-center">
                        Setiap Rabu, 16.00 - 17.30
                    </div>
                </div>

                <!-- Program 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-microchip text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-3">Robotic Arduino</h3>
                    <p class="text-gray-600 text-center">
                        Belajar membuat alat IOT berbasis Arduino dengan berbagai sensor dan aktuator. Untuk siswa yang
                        sudah memahami dasar pemrograman.
                    </p>
                    <div class="mt-4 text-blue-600 font-medium text-center">
                        Setiap Rabu, 16.00 - 17.30
                    </div>
                </div>

                <!-- Program 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-medal text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-3">Tim Project</h3>
                    <p class="text-gray-600 text-center">
                        Tim yang telah terpilih untuk pembuatan kerja project eskul. Contoh salah satunya adalah kerja
                        project pembuatan alat sensor panas.
                    </p>
                    <div class="mt-4 text-blue-600 font-medium text-center">
                        Setiap Rabu, 16.00 - 19.00
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="#registration"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-full font-semibold transition inline-block">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Project Section -->
    <section class="py-16 bg-white" id="achievement">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Karya Project Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Beberapa karya membuat berbagai project di sekolah.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- project 1 -->
                <div
                    class="achievement-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition transform duration-300">
                    <div class="relative h-48 mb-4 rounded-lg overflow-hidden">
                        <img src="WhatsApp Image 2025-09-02 at 15.58.21.jpeg"
                            alt="gambar tempat sampah otomatis hasil karya siswa sedang ditempatkan di pameran sekolah"
                            class="w-full h-full object-cover">
                        <div
                            class="absolute top-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm font-semibold rounded-br-lg">
                            2024
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Tempat Sampah Otomatis</h3>
                    <p class="text-gray-600 mb-3">
                        Tempat sampah yang dirancang untuk menjaga tangan agar tetap dalam keadaan bersih.
                    </p>
                    <div class="flex items-center text-blue-600">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>Tambun Selatan, Kab.Bekasi Timur</span>
                    </div>
                </div>

                <!-- project 2 -->
                <div
                    class="achievement-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition transform duration-300">
                    <div class="relative h-48 mb-4 rounded-lg overflow-hidden">
                        <img src="WhatsApp Image 2025-09-02 at 15.59.54.jpeg"
                            alt="gambar tempat cuci tangan otomatis hasil karya siswa sedang ditempatkan di pameran sekolah"
                            class="w-full h-full object-cover">
                        <div
                            class="absolute top-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm font-semibold rounded-br-lg">
                            2024
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Tempat Cuci Tangan Otomatis</h3>
                    <p class="text-gray-600 mb-3">
                        Tempat cuci tangan yang berfungsi untuk membersihkan tangan secara otomatis.
                    </p>
                    <div class="flex items-center text-blue-600">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>Tambun Selatan, Kab.Bekasi Timur</span>
                    </div>
                </div>

                <!-- project 3 -->
                <div
                    class="achievement-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition transform duration-300">
                    <div class="relative h-48 mb-4 rounded-lg overflow-hidden">
                        <img src="WhatsApp Image 2025-09-02 at 15.59.55.jpeg"
                            alt="gambar pemberi makan kucing otomatis hasil karya siswa sedang ditempatkan di pameran sekolah"
                            class="w-full h-full object-cover">
                        <div
                            class="absolute top-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm font-semibold rounded-br-lg">
                            2024
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pemberi Makan Kucing Otomatis</h3>
                    <p class="text-gray-600 mb-3">
                        Alat IOT yang berguna untuk memberi makan kucing dari jarak jauh.
                    </p>
                    <div class="flex items-center text-blue-600">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>Tambun Selatan, Kab.Bekasi Timur</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="py-16 bg-gray-50" id="history">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Perjalanan Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Sejarah perkembangan TOMCAT SQUAD sejak awal berdiri hingga sekarang.
                </p>
            </div>

            <div class="relative max-w-3xl mx-auto">
                <!-- Timeline item 1 -->
                <div class="relative timeline-item pl-12 pb-12">
                    <div
                        class="absolute left-0 w-6 h-6 rounded-full bg-blue-600 border-4 border-white transform translate-x-1/2">
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-lg text-blue-600">Awal berdirinya TOMCAT SQUAD</h3>
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">2010</span>
                        </div>
                        <p class="text-gray-600">
                            TOMCAT SQUAD pertama kali didirikan pada tahun 2010 oleh Pak Guruh Wijarnako, S.T., Awalnya
                            ini bukanlah eskul, tetapi hanya sebuah perkumpulan para murid yang suka
                            menyalurkan bakatnya di bidang robotik, pemrograman, dan teknologi informasi. Nama TOMCAT
                            SQUAD terinspirasi dari pesawat tempur TOMCAT F16.
                        </p>
                    </div>
                </div>

                <!-- Timeline item 2 -->
                <div class="relative timeline-item pl-12 pb-12">
                    <div
                        class="absolute left-0 w-6 h-6 rounded-full bg-blue-600 border-4 border-white transform translate-x-1/2">
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-lg text-blue-600">Perkembangan Awal</h3>
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">2011</span>
                        </div>
                        <p class="text-gray-600">
                            Pada tahun ini TOMCAT SQUAD telah resmi menjadi eskul pilihan di sekolah. TOMCAT SQUAD turut
                            aktif
                            dalam membantu beberapa kepentingan disekolah salah satunya perbaikan struktur jaringan
                            kabel untuk
                            sekolah. TOMCAT SQUAD juga selalu ikut dalam kegiatan demo eskul guna menarik minat siswa
                            baru untuk bergabung.
                        </p>
                    </div>
                </div>

                <!-- Timeline item 3 -->
                <div class="relative timeline-item pl-12 pb-12">
                    <div
                        class="absolute left-0 w-6 h-6 rounded-full bg-blue-600 border-4 border-white transform translate-x-1/2">
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-lg text-blue-600">Perjalanan</h3>
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">2020</span>
                        </div>
                        <p class="text-gray-600">
                            Peresmian laboratorium TOMCAT SQUAD dengan peralatan lengkap berkat adanya dukungan dari
                            sekolah. Berkat adanya dukungan dari sekolah, kerja project lebih memadai.
                        </p>
                    </div>
                </div>

                <!-- Timeline item 4 -->
                <div class="relative timeline-item pl-12 pb-12">
                    <div
                        class="absolute left-0 w-6 h-6 rounded-full bg-blue-600 border-4 border-white transform translate-x-1/2">
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-lg text-blue-600">Kondisi Sekarang</h3>
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">2025</span>
                        </div>
                        <p class="text-gray-600">
                            Saat ini TOMCAT SQUAD aktif dalam kegiatan eskul, pembuatan project, 
                            dan ikut serta dalam kegiatan pameran yang diadakan di sekolah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-white" id="gallery">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Galeri Kegiatan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Beberapa momen dalam perjalanan TOMCAT SQUAD.
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex justify-center mb-8 space-x-4">
                <button class="filter-btn bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition"
                    data-filter="all">Semua</button>
                <button
                    class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white transition"
                    data-filter="event">Event</button>
                <button
                    class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white transition"
                    data-filter="lomba">Pameran</button>
                <button
                    class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white transition"
                    data-filter="eskul">Ekskul</button>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- EVENT -->
                <div class="gallery-item event overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-09-02 at 20.37.55.jpeg" alt="Pelatihan robotika di laboratorium"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item event overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-09-02 at 20.37.54.jpeg" alt="Kegiatan workshop teknologi"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item event overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 13.19.01.jpeg" alt="Kegiatan workshop teknologi"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item event overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-09-02 at 20.37.23.jpeg" alt="Kegiatan workshop teknologi"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>

                <!-- PAMERAN -->
                <div class="gallery-item lomba overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 16.37.06.jpeg" alt="Tim mengikuti kompetisi robotik"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item lomba overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 16.37.04.jpeg" alt="Presentasi proyek di depan juri"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item lomba overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 16.37.03.jpeg" alt="Penerimaan penghargaan lomba"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item lomba overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 16.37.04 (1).jpeg" alt="Penerimaan penghargaan lomba"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>

                <!-- EKSUL -->
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-15 at 14.01.58.jpeg" alt="Kelas dasar robotika"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-15 at 13.56.23 (2).jpeg" alt="Robot tangan servo di ruang praktik"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-15 at 13.56.23.jpeg" alt="Kunjungan industri"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-09-02 at 20.38.23.jpeg" alt="Kunjungan industri"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 13.18.23.jpeg" alt="Kunjungan industri"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 13.18.20.jpeg" alt="Kunjungan industri"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 13.18.19.jpeg" alt="Kunjungan industri"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
                <div class="gallery-item eskul overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="WhatsApp Image 2025-10-22 at 13.18.13.jpeg" alt="Kunjungan industri"
                        class="w-full h-48 object-cover hover:scale-105 transition">
                </div>
            </div>
        </div>

        <!-- JavaScript Filter -->
        <script>
            const filterButtons = document.querySelectorAll(".filter-btn");
            const galleryItems = document.querySelectorAll(".gallery-item");

            filterButtons.forEach(button => {
                button.addEventListener("click", () => {
                    // Ganti warna tombol aktif
                    filterButtons.forEach(btn => btn.classList.remove("bg-blue-600", "text-white"));
                    button.classList.add("bg-blue-600", "text-white");

                    const filter = button.getAttribute("data-filter");

                    galleryItems.forEach(item => {
                        if (filter === "all" || item.classList.contains(filter)) {
                            item.style.display = "block";
                        } else {
                            item.style.display = "none";
                        }
                    });
                });
            });
        </script>
    </section>


    <!-- Testimonial Section -->
    <section class="py-16 bg-blue-600 text-white" id="testimoni">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-2">Apa Kata Mereka?</h2>
                <p class="max-w-2xl mx-auto opacity-90">
                    Testimoni dari alumni, ketua, para anggota dan pembina TOMCAT SQUAD.
                </p>
            </div>

            <!-- Scrollable Container -->
            <div class="overflow-x-auto pb-12 mt-6 custom-scrollbar">
                <div class="flex space-x-16 min-w-max px-2 snap-x snap-mandatory scroll-smooth">
                    <!-- Testimonial 1 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-07-30 at 18.49.02.jpeg"
                                alt="Potret Muhammad Bilrizki, alumni TOMCAT SQUAD 2025"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Muhammad Bilrizki</h4>
                                <p class="text-sm opacity-80">Alumni TOMCAT SQUAD 2025</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Bergabung dengan TOMCAT SQUAD adalah salah satu keputusan terbaik saya. Keterampilan yang
                            saya pelajari di sini membuat saya mempunyai bekal pengalaman untuk kedepannya."
                        </p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-07-30 at 17.02.56.jpeg"
                                alt="Potret Tri Hadi Surya Ardito, ketua TOMCAT SQUAD 2025"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Tri Hadi Surya Ardito</h4>
                                <p class="text-sm opacity-80">Ketua TOMCAT SQUAD 2025</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Saya yang awalnya tidak tahu apa-apa tentang mikrotik, tetapi berkat TOMCAT SQUAD ini
                            sekarang
                            saya lebih banyak tahu dan lebih menguasai tentang mikrotik."
                        </p>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-18 at 09.14.36.jpeg"
                                alt="Potret Abrar Fajrianto, anggota TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Abrar Fajrianto</h4>
                                <p class="text-sm opacity-80">Anggota TOMCAT SQUAD</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Berkat TOMCAT SQUAD, sekarang saya sudah mahir dalam jurusan teknik komputer dan jaringan
                            serta menjadi lebih berwawasan daripada sebelumnya."
                        </p>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-20 at 16.18.03.jpeg"
                                alt="Potret Ahmad Zaidan Rizky H., alumni TOMCAT SQUAD 2025"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Ahmad Zaidan Rizky H.</h4>
                                <p class="text-sm opacity-80">Alumni TOMCAT SQUAD 2025</p>
                            </div>
                        </div>
                        <p class="italic">
                            “Bergabung dengan TOMCAT SQUAD membuat saya lebih percaya diri dalam dunia teknologi dan
                            jaringan.
                            Setiap pertemuan selalu memberi wawasan baru yang bermanfaat.”
                        </p>
                    </div>

                    <!-- Testimonial 5 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-22 at 17.10.19.jpeg"
                                alt="Potret Noeraliyah Syarifah Hidayat, bendahara TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Noeraliyah Syarifah H.</h4>
                                <p class="text-sm opacity-80">Bendahara TOMCAT SQUAD 2025</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Pengalaman di TOMCAT SQUAD benar-benar berharga. Disini saya mendapatkan ilmu, pengalaman,
                            dan teman-teman yang selalu mendukung satu sama lain."
                        </p>
                    </div>

                    <!-- Testimonial 6 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-22 at 20.35.09.jpeg"
                                alt="Potret M. Labieb Furqon Giyanta, anggota TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">M. Labieb Furqon Giyanta</h4>
                                <p class="text-sm opacity-80">Anggota TOMCAT SQUAD</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Ekskul ini benar-benar membuka peluang bagi siswa yang ingin mendalami dunia IT. 
                            Belajar di sini itu seru, bermanfaat, dan penuh semangat."
                        </p>
                    </div>

                    <!-- Testimonial 7 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-24 at 08.27.50.jpeg"
                                alt="Potret Rafa, anggota aktif yang sedang memegang robot karyanya"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Geronimo Estrada R.</h4>
                                <p class="text-sm opacity-80">Anggota TOMCAT SQUAD 2025</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Saya bangga bisa menjadi bagian dari TOMCAT SQUAD. Banyak pengalaman berharga yang saya dapat, 
                            terutama tentang kerja tim dan tanggung jawab."
                        </p>
                    </div>

                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-22 at 20.01.47.jpeg"
                                alt="Potret Ahmad Habil Alfakhri, anggota TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Ahmad Habil Alfakhri</h4>
                                <p class="text-sm opacity-80">Anggota TOMCAT SQUAD</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Bergabung di TOMCAT SQUAD membuat saya belajar banyak hal, mulai dari coding,
                            jaringan, hingga cara berpresentasi yang baik di depan orang."
                        </p>
                    </div>

                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-22 at 19.37.09.jpeg"
                                alt="Potret Baihaqi Muhammad Al Ghifari, anggota TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Baihaqi M. Al Ghifari</h4>
                                <p class="text-sm opacity-80">Anggota TOMCAT SQUAD</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Selama di TOMCAT SQUAD, saya belajar cara bekerja dalam tim dan mengatur waktu dengan baik.
                            Semua itu sangat berguna di sekolah maupun di luar."
                        </p>
                    </div>

                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-22 at 19.39.08.jpeg"
                                alt="Potret Panji Hadi Kusumo, anggota TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Panji Hadi Kusumo</h4>
                                <p class="text-sm opacity-80">Anggota TOMCAT SQUAD</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Ekskul ini bukan hanya tentang teknologi, tapi juga tentang sikap dan mental.
                            Saya belajar untuk tidak mudah menyerah dan selalu berpikir kreatif."
                        </p>
                    </div>

                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-10-22 at 19.40.37.jpeg"
                                alt="Potret Abdul Rafi Maulana, anggota TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Abdul Rafi Maulana</h4>
                                <p class="text-sm opacity-80">Anggota TOMCAT SQUAD</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Saya sangat senang bisa menjadi bagian dari TOMCAT SQUAD.
                            Setiap proyek yang kami kerjakan selalu memberi pengalaman baru dan menantang."
                        </p>
                    </div>

                    <!-- Testimonial 8 -->
                    <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm flex-shrink-0 w-80 snap-center">
                        <div class="flex items-center mb-4">
                            <img src="WhatsApp Image 2025-07-30 at 17.03.02.jpeg"
                                alt="Potret Bu Mia Agustina Wahyuni, guru pembina TOMCAT SQUAD"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Mia Agustina Wahyuni</h4>
                                <p class="text-sm opacity-80">Guru Pembina TOMCAT SQUAD</p>
                            </div>
                        </div>
                        <p class="italic">
                            "Melihat perkembangan anak-anak dari tahun ke tahun sangat membanggakan. Mikrotik bukan
                            hanya tentang teknologi, tapi juga kerja tim dan pemecahan masalah."
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- CSS Scrollbar -->
        <style>
            .custom-scrollbar {
                scrollbar-color: #1e40af white;
                /* untuk browser yang mendukung properti ini */
            }

            /* Webkit browser (Chrome, Edge, Safari) */
            .custom-scrollbar::-webkit-scrollbar {
                height: 12px;
                /* tinggi scrollbar */
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: white;
                /* background putih */
                border-radius: 10px;
                margin-top: 8px;
                /* menurunkan posisi scrollbar */
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #1e40af;
                /* biru tua */
                border-radius: 10px;
                border: 2px solid white;
                /* jarak antara thumb dan track */
            }

            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background-color: #2563eb;
                /* biru terang saat hover */
            }
        </style>
    </section>


    <!-- Contact Section -->
    <section class="py-16 bg-white" id="contact">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Kontak Kami</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Apakah ada komentar dari anda.
                    </p>
                </div>

                <div>
                    <div class="bg-blue-50 p-6 rounded-lg h-full">
                        <h3 class="text-xl font-semibold text-blue-800 mb-4">Informasi Kontak</h3>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Alamat</h4>

                                    <p class="text-gray-600">
                                        Mekarsari Raya Jl. KH. Mochamad-Mekarsari<br>
                                        Tambun Selatan, Kab. Bekasi Jawa Barat, 17510<br>
                                        SMK TELEKOMUNIKASI TELESANDI BEKASI.
                                    </p>
                                    <p>
                                        <a href="https://www.google.com/maps?q=SMK+TELEKOMUNIKASI+TELESANDI+BEKASI"
                                            target="_blank" class="text-blue-600 hover:underline">Klik disini untuk
                                            melihat lokasi</a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-envelope text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Email</h4>
                                    <p class="text-gray-600">
                                        tomcatsquad45@gmail.com
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    </li>
                                    <i class="fas fa-phone-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Telepon</h4>
                                    <p class="text-gray-600">
                                        +62 881-0100-80829
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-clock text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Jam Operasional</h4>
                                    <p class="text-gray-600">
                                        Rabu: 16.00 - 18.00<br>
                                    </p>
                                </div>
                            </div>

                            <!-- Komentar Section -->
                            <div class="mt-16">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Tinggalkan Komentar</h3>
                                <form id="comment-form" class="space-y-6" method="POST">
                                    <input type="hidden" name="tipe" value="komentar">
                                    <div>
                                        <label for="comment-name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                                        <input type="text" id="comment-name" name="nama" placeholder="Nama Lengkap"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="comment-message" class="block text-gray-700 mb-2">Komentar</label>
                                        <textarea name="komentar" placeholder="Tulis komentar..." rows="4"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required></textarea>
                                    </div>
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition w-full">
                                        Kirim Komentar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Formulir Pendaftaran -->
    <section class="py-16 bg-white" id="registration">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Formulir Pendaftaran</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Silakan isi formulir di bawah ini untuk bergabung dengan TOMCAT SQUAD.
                    </p>
                </div>
                <form id="form-pendaftaran" method="POST" class="bg-blue-50 p-8 rounded-lg shadow-md space-y-6">
                    <!-- input nama -->
                    <div>
                        <label for="nama" class="block text-black-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Masukkan nama lengkap Anda">
                    </div>

                    <!-- input email -->
                    <div>
                        <label for="email" class="block text-black-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Masukkan alamat email Anda">
                    </div>

                    <!-- Telepon -->
                    <div>
                        <label for="telepon" class="block text-black-700 font-medium mb-2">Telepon</label>
                        <input type="telepon" id="telepon" name="telepon" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:border-blue-500"
                            placeholder="Masukkan nomor telepon Anda">
                    </div>

                    <!-- Jenjang -->
                    <div>
                        <label for="jenjang" class="block text-black-700 font-medium mb-2">Jenjang</label>
                        <select id="jenjang" name="jenjang" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Jenjang</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label for="jurusan" class="block text-black-700 font-medium mb-2">Jurusan</label>
                        <select id="jurusan" name="jurusan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Jurusan</option>
                            <option value="RPL">RPL</option>
                            <option value="DKV">DKV</option>
                            <option value="TKJ">TKJ</option>
                            <option value="TRANS">TRANS</option>
                        </select>
                    </div>

                    <!-- Kelas -->
                    <div>
                        <label for="kelas" class="block text-black-700 font-medium mb-2">Kelas</label>
                        <select id="kelas" name="kelas" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Kelas</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>


                    <!-- Program -->
                    <div>
                        <label for="program" class="block text-black-700 font-medium mb-2">Program</label>
                        <select id="program" name="program" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:border-blue-500">
                            <option value="">Pilih Program</option>
                            <option value="Dasar Mikrotik">Dasar Mikrotik</option>
                            <option value="Robotic Arduino">Robotic Arduino</option>
                            <option value="Tim Project">Tim Project</option>
                        </select>
                    </div>

                    <!-- Pesan -->
                    <div>
                        <label for="pesan" class="block text-black-700 font-medium mb-2">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Tuliskan pesan atau alasan Anda mendaftar"></textarea>
                    </div>

                    <!-- Tombol -->
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition w-full">
                            Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TOMCAT SQUAD</h3>
                    <p class="text-gray-400">
                        Mengembangkan generasi muda yang kreatif, inovatif, dan siap menghadapi tantangan teknologi di
                        masa
                        depan.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">Tentang</a></li>
                        <li><a href="#program" class="text-gray-400 hover:text-white transition">Program</a></li>
                        <li><a href="#achievement" class="text-gray-400 hover:text-white transition">Karya</a></li>
                        <li><a href="#history" class="text-gray-400 hover:text-white transition">Sejarah</a></li>
                        <li><a href="#gallery" class="text-gray-400 hover:text-white transition">Galeri</a></li>
                        <li><a href="#testimoni" class="text-gray-400 hover:text-white transition">Testimoni</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                        <li><a href="#registration" class="text-gray-400 hover:text-white transition">Daftar</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-gray-400"></i>
                            <span class="text-gray-400">tomcatsquad45@gmail.com</span>

                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-gray-400"></i>
                            <span class="text-gray-400">+62 881-0100-80829</span>

                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                            <a href="https://www.google.com/maps?q=SMK+TELEKOMUNIKASI+TELESANDI+BEKASI" target="_blank"
                                class="text-gray-400 hover:text-white transition">SMK TELEKOMUNIKASI TELESANDI
                                BEKASI</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Sosial Media</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/tomcatsquad_?igsh=MWdrYXZ6bHNhM2IzeA=="
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://youtube.com/@tomcatsquad-tels?si=iX6iVaHVWmLGIhlT"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <div class="mt-6">
                        <img src="WhatsApp Image 2025-07-30 at 14.10.26.jpeg"
                            alt="Logo Sekolah Kita dengan tulisan nama sekolah menggunakan font modern" class="h-10">
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6 text-center text-gray-400 text-sm">
                <p>© 2025 TOMCAT SQUAD.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById("comment-form").addEventListener("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("simpan_data.php", {
                method: "POST",
                body: formData
            })
                .then(res => res.text())
                .then(data => {
                    alert("✅ " + data);
                    this.reset();
                })
                .catch(err => {
                    alert("❌ Terjadi kesalahan.");
                    console.error(err);
                });
        });



        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }

                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            });
        });

        // Form submission
        document.getElementById("form-pendaftaran").addEventListener("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("simpan_data.php", {
                method: "POST",
                body: formData
            })
                .then(res => res.text())
                .then(data => {
                    alert("✅ " + data);
                    this.reset();

                    window.location.href = "#home";
                })
                .catch(err => {
                    alert("❌ Terjadi kesalahan saat mengirim pendaftaran.");
                    console.error(err);
                });
        });


        // Animation on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.achievement-card, .timeline-item');

            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight * 0.8;

                if (elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };

        // Set initial state for animation
        document.querySelectorAll('.achievement-card, .timeline-item').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'all 0.6s ease';
        });

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>
</body>

</html>
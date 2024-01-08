<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#statistik">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lapor">Lapor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-lg-3" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5 bg-image mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start " data-aos="fade-right">
                    <h1 class="fw-bolder">
                        Selamat Datang di Layanan Pengaduan Masyarakat
                    </h1>
                    <p class="lead mb-0">
                        Platform Anda untuk Melaporkan Masalah di Sekitar.
                    </p>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <img src="{{ asset('landing/image/1.svg') }}" alt="Welcome Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </header>

    <section id="statistik" class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4" data-aos="fade-up">
                    <h2>{{ count($user->where('type', 'user')) }}
                    </h2>
                    <p>Jumlah Pengguna</p>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                    <h2>{{ count($laporan) }}
                    </h2>
                    <p>Laporan</p>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <h2>{{ count($laporan->where('status', 'selesai')) }}</h2>
                    <p>Laporan Selesai</p>
                </div>
            </div>
        </div>
    </section>

    <section id="lapor" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right">
                    <img src="{{ asset('landing/image/2.jpg') }}" alt="Welcome Image" class="img-fluid" />
                </div>

                <div class="col-lg-6" data-aos="fade-up">
                    <h2>Cara Melapor</h2>
                    <p class="lead">
                        Ikuti langkah-langkah mudah ini untuk membuat laporan Anda:
                    </p>
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"></div>
                        <h4 class="title">Kirim Laporan</h4>
                        <p class="description">
                            Tulis laporan keluhan Anda dengan jelas.
                        </p>
                    </div>
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <h4 class="title">Proses Verifikasi</h4>
                        <p class="description">
                            Tunggu sampai laporan Anda di verifikasi oleh admin/petugas
                            terkait.
                        </p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <h4 class="title">Tindak Lanjut</h4>
                        <p class="description">
                            Laporan Anda sedang dalam diproses dan ditindak lanjut.
                        </p>
                    </div>
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <h4 class="title">Selesai</h4>
                        <p class="description">Selesai.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-3 bg-dark">
        <div class="container">
            <div class="row">
                <!-- Alamat -->
                <div class="col-md-4 text-white mt-4">
                    <!-- <p class="mt-4 text-white"><strong>Lokasi Kami:</strong></p> -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3314189550997!2d109.13644207405424!3d-6.970171668247408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbffcfac0f1c3%3A0x1023df4ebb17b4d7!2sBawaslu%20Kabupaten%20Tegal!5e0!3m2!1sid!2sid!4v1704264340309!5m2!1sid!2sid"
                        width="350" height="250" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-md-4"></div>

                <div id="kontak" class="col-md-4 text-md-start text-white " data-aos="fade-left">
                    <p class="mt-4"><strong>Alamat Kantor:</strong></p>
                    <div class="alamat">
                        <p>
                            Jl. Jenderal Ahmad Yani No.15a, Procot, Kec. Slawi, Kabupaten
                            Tegal, Jawa Tengah 52412
                        </p>
                    </div>
                    <p class="mt-4"><strong>Telephone:</strong></p>
                    <div class="kontak">
                        <p>(0283) 4562250</p>
                    </div>
                    <p class="mt-4"><strong>Media Sosial</strong></p>
                    <div class="sosial">
                        <a href="https://www.facebook.com/bawaslukabtegal"><i class="fab fa-facebook"></i></a>
                        <a href="https://x.com/bawaslukabtegal?s=20"><i class="fab fa-twitter"></i></a>
                        <a
                            href="https://www.instagram.com/bawaslukabtegal?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=="><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@bawaslukabtegal?is_from_webapp=1&sender_device=pc"><i
                                class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>

            <!-- Hak Cipta -->
            <div class="row">
                <div class="col-12 text-center text-white mt-3">
                    <p>&copy; All right reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>

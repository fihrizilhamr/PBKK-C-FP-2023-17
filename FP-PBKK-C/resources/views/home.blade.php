<!-- reference
https://colorhunt.co/palette/f0f0f02135554f709ce5d283
https://www.youtube.com/watch?v=McPdzhLRzCg
https://www.youtube.com/watch?v=5JwWqjd4e9o 
https://www.youtube.com/watch?v=WVOmmc0UTiM
https://www.youtube.com/watch?v=7uEqQx4S50E-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGym</title>
    <link rel="stylesheet" href="{{ asset('/css/home-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
         <!-- menu dan logo di wrapper -->
        <div class="wrapper">
            <!-- logo -->
            <div class="logo">
                <a href =''>GoGym</a>
            </div>
            <!-- menu navigasi-->
            <div class="menu">
                <ul>
                    <li><a href="#program">Program</a></li>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#community">Community</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ route('signup') }}" class="tombol-biru">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="wrapper">
        <!-- home slider dan desc -->
        <section id="home" class="container">
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slide-1" src="https://plus.unsplash.com/premium_photo-1663036263525-3059e0c47b96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Z3ltfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="Gatau namanya">
                    <img id="slide-2" src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3ltfGVufDB8MHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Gatau namanya juga">
                    <img id="slide-3" src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Z3ltfGVufDB8MHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Gatau namanya 3x">
                </div>
                <div class="slider-nav">
                    <a href="#slide-1"></a>
                    <a href="#slide-2"></a>
                    <a href="#slide-3"></a>
                </div>
            </div>
            <div class="kolom">
                <h2 class="header">About GoGym</h2><br>
                <p class="deskripsi">GoGym adalah sebuah platform konsultasi online yang memfasilitasi interaksi antara
                    pengguna dengan personal trainer. Dengan adanya platform ini, pengguna dapat memperoleh
                    layanan konsultasi pelatihan fisik dan nutrisi secara mudah dan efektif. <br><br>
                    Dengan platform ini, pengguna dapat terhubung dengan personal trainer. Layanan ini
                    mempermudah aktivitas konsultasi dan pengguna dapat memilih layanan yang sesuai dengan
                    kebutuhan mereka, seperti konsultasi daring atau bertemu langsung dengan personal trainer di
                    lokasi yang disepakati.
                </p>
                <p class="deskripsi">
                    
                </p>
            </div>
        </section>
        <!-- blog -->
        <section id="blog">
            <div class="blog-part">
                <div class="blog-heading">
                    <span>Recent Post</span>
                    <h3>Blog</h3>
                </div>
                <!-- box 1 -->
                <div class="blog-container">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img src="https://plus.unsplash.com/premium_photo-1663036263525-3059e0c47b96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Z3ltfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="Blog">
                        </div>
                        <div class="blog-text">
                            <span>10 September 2023 / Happy Gym Buddy</span>
                            <a href="#" class="blog-title">Bagaimana Memiliki Teman Gym Membantu Anda Untuk Lebih Produktif</a>
                            <p>Selain membantu meningkatkan suasana hati, dukungan teman bisa memotivasi diri menjalankan pola hidup yang lebih sehat.</p>
                            <a href="#">Baca lebih lanjut...</a>
                        </div>
                    </div>
                    <!-- box 2 -->
                    <div class="blog-box">
                        <div class="blog-img">
                            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3ltfGVufDB8MHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Blog">
                        </div>
                        <div class="blog-text">
                            <span>11 September 2023 / Happy Gym Buddy</span>
                            <a href="#" class="blog-title">10 Dumbbell Set Terbaik - Ditinjau oleh Fitness Coach (Terbaru Tahun 2023)</a>
                            <p>Dumbbell memiliki banyak manfaat untuk digunakan sebagai rekan workout Anda. Anda bisa memakainya untuk membentuk berbagai otot, mulai dari abdomen hingga otot punggung. Dumbbell juga bisa digunakan untuk olahraga bagi lansia dan Anda yang sedang diet.</p>
                            <a href="#">Baca lebih lanjut...</a>
                        </div>
                    </div>

                    <!-- box 3 -->
                    <div class="blog-box">
                        <div class="blog-img">
                            <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Z3ltfGVufDB8MHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Blog">
                        </div>
                        <div class="blog-text">
                            <span>12 September 2023 / Happy Gym Buddy</span>
                            <a href="#" class="blog-title">Butuh Berapa Lama Hingga Otot Terbentuk Karena Olahraga?</a>
                            <p>Berapa lama otot terbentuk setelah mulai olahraga? Pertumbuhan otot bisa memakan waktu berminggu-minggu atau berbulan-bulan. Kebanyakan orang sehat bisa menambah massa otot 0,5-1 kg per bulan. Pada dasarnya, latihan beban selama 20-30 menit yang dilakukan 2-3 kali seminggu sudah cukup untuk membantu pembentukan otot.</p>
                            <a href="#">Baca lebih lanjut...</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- community -->
        <section id="community">
            <div class="blog-part">
                <div class="blog-heading">
                    <span>Community: To Be Updated</span>
                </div>
            </div>
        </section>
        <!-- contact -->
        <section id="contact">
            <div class="blog-heading">
                <h3>Contact Us</h3>
            </div>
            <div class="card-part">
                <div class="contact-info">
                    <div class="card">
                      <i class="card-icon far fa-envelope"></i>
                      <p>go@gym.com</p>
                    </div>
              
                    <div class="card">
                      <i class="card-icon fas fa-phone"></i>
                      <p>+6281212345678</p>
                    </div>
              
                    <div class="card">
                      <i class="card-icon fas fa-map-marker-alt"></i>
                      <p>Surabaya, Indonesia</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
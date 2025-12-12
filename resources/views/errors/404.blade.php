<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .error-container {
            text-align: center;
            color: white;
            padding: 40px 20px;
            position: relative;
            z-index: 10;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-code {
            font-size: clamp(80px, 15vw, 180px);
            font-weight: 900;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .error-icon {
            font-size: clamp(60px, 10vw, 100px);
            margin-bottom: 30px;
            animation: rotate 3s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .error-title {
            font-size: clamp(24px, 4vw, 42px);
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .error-description {
            font-size: clamp(14px, 2vw, 18px);
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 40px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: clamp(14px, 2vw, 16px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 3px solid white;
        }

        .btn-home:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            background: #667eea;
            color: white;
        }

        .btn-home i {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .btn-home:hover i {
            transform: translateX(-5px);
        }

        /* Background Animation */
        .background-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            top: 10%;
            left: 10%;
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            top: 60%;
            left: 80%;
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 50%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            top: 80%;
            left: 20%;
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            top: 20%;
            left: 70%;
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0);
            }
            25% {
                transform: translateY(-30px) translateX(20px);
            }
            50% {
                transform: translateY(-60px) translateX(-20px);
            }
            75% {
                transform: translateY(-30px) translateX(30px);
            }
        }

        /* Additional Info Links */
        .additional-links {
            margin-top: 40px;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .link-item {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .link-item:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: white;
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 100px;
            }
            
            .error-icon {
                font-size: 60px;
            }
            
            .btn-home {
                padding: 14px 30px;
            }
            
            .additional-links {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Background Shapes -->
    <div class="background-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Error Container -->
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        
        <div class="error-code">404</div>
        
        <h1 class="error-title">Halaman Tidak Ditemukan</h1>
        
        <p class="error-description">
            Maaf, halaman yang Anda cari tidak dapat ditemukan atau sudah dipindahkan. 
            Silakan kembali ke halaman utama atau hubungi administrator jika Anda yakin ini adalah kesalahan.
        </p>
        
        <a href="{{ route('home') }}" class="btn-home">
            <i class="fas fa-home"></i>
            Kembali ke Beranda
        </a>

        <div class="additional-links">
            <a href="{{ route('profil.index') }}" class="link-item">
                <i class="fas fa-building"></i>
                Profil Sekolah
            </a>
            <a href="{{ route('berita') }}" class="link-item">
                <i class="fas fa-newspaper"></i>
                Berita
            </a>
            <a href="{{ route('kontak') }}" class="link-item">
                <i class="fas fa-phone"></i>
                Kontak
            </a>
        </div>
    </div>

    <script>
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Log 404 for analytics (optional)
        console.warn('404 Error - Page not found:', window.location.href);
    </script>
</body>
</html>
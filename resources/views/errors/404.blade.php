<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a5f3a, #2d8659);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .error-container {
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 500px;
        }
        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #1a5f3a;
            margin-bottom: 20px;
        }
        .error-message {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .error-desc {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 30px;
        }
        .btn-home {
            background: #f39c12;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-home:hover {
            background: #e67e22;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Halaman Tidak Ditemukan</div>
        <p class="error-desc">Maaf, halaman yang Anda cari tidak ada atau telah dipindahkan.</p>
        <a href="{{ url('/') }}" class="btn-home">
            <i class="fas fa-home"></i> Kembali ke Beranda
        </a>
    </div>
</body>
</html>
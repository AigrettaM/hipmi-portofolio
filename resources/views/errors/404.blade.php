<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: #f8f9fa;
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            font-size: 8rem;
            font-weight: bold;
            color: #198754;
            animation: bounce 1.5s infinite;
        }
        p {
            font-size: 1.2rem;
            color: #6c757d;
            animation: fadeInUp 1s ease-in-out 0.5s both;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-15px); }
            60% { transform: translateY(-8px); }
        }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>Oops! Halaman yang kamu cari tidak ditemukan.</p>
    <a href="{{ route('home') }}" class="btn btn-success mt-3">Kembali ke Beranda</a>
</body>
</html>

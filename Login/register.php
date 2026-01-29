<!DOCTYPE html>
<html lang="id">

<head>
    <title>Registrasi | Hum Hum Laundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg-light: #f1f5f9;
            --white: #ffffff;
            --text-main: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #2563eb 0%, #1e293b 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            font-size: 1.8rem;
            color: var(--text-main);
            margin-bottom: 0.5rem;
            font-weight: 800;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            color: var(--text-main);
            font-size: 0.85rem;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 0.9rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .back-link:hover {
            color: var(--primary);
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="login-header">
            <h2>Buat Akun Baru</h2>
            <p>Daftar sebagai anggota Hum Hum Laundry</p>
        </div>
        <form action="../proses-register.php" method="post">
            <div class="form-group">
                <label>NAMA LENGKAP</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
            </div>
            <div class="form-group">
                <label>ALAMAT EMAIL</label>
                <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
            </div>
            <div class="form-group">
                <label>KATA SANDI</label>
                <input type="password" name="pass" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" name="submit" class="btn-submit">DAFTAR SEKARANG</button>
        </form>
        <a href="index.php" class="back-link">Sudah punya akun? Masuk di sini</a>
    </div>
</body>

</html>
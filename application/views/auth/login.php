<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Sistem Sales Order PT Maju Jaya</title>

    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#dbeafe,#bfdbfe);
            padding:20px;
        }

        .login-container{
            width:100%;
            max-width:1400px;
            min-height:750px;
            background:#fff;
            border-radius:30px;
            overflow:hidden;
            display:flex;
            box-shadow:0 15px 40px rgba(0,0,0,0.15);
        }

        /* PANEL KIRI */
        .left-panel{
            width:45%;
            background:linear-gradient(135deg,#0f4c81,#1e88e5);
            color:white;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:center;
            padding:60px;
        }

        .left-panel img{
            width:250px;
            margin-bottom:30px;
        }

        .left-panel h1{
            font-size:52px;
            margin-bottom:10px;
        }

        .left-panel h4{
            margin-bottom:25px;
            font-weight:400;
        }

        .left-panel p{
            font-size:18px;
            line-height:1.8;
        }

        /* PANEL KANAN */
        .right-panel{
            width:55%;
            background:#f8fafc;
            padding:80px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .welcome-title{
            font-size:48px;
            font-weight:bold;
            color:#1e88e5;
            margin-bottom:10px;
        }

        .welcome-subtitle{
            color:#777;
            font-size:18px;
            margin-bottom:40px;
        }

        .form-group{
            margin-bottom:20px;
        }

        .form-control{
            width:100%;
            height:60px;
            border:none;
            border-radius:15px;
            padding:0 20px;
            background:#e2e8f0;
            font-size:16px;
            outline:none;
        }

        .btn-login{
            width:100%;
            height:60px;
            border:none;
            border-radius:15px;
            background:#1e88e5;
            color:white;
            font-size:18px;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
        }

        .btn-login:hover{
            background:#1565c0;
        }

        .alert{
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        }

        .alert-danger{
            background:#fee2e2;
            color:#b91c1c;
        }

        .icon-box{
            width:120px;
            height:120px;
            border-radius:50%;
            background:rgba(255,255,255,.15);
            display:flex;
            align-items:center;
            justify-content:center;
            margin-bottom:30px;
        }

        .icon-box i{
            font-size:60px;
        }

        @media(max-width:992px){

            .login-container{
                flex-direction:column;
            }

            .left-panel,
            .right-panel{
                width:100%;
            }

            .right-panel{
                padding:40px;
            }

            .welcome-title{
                font-size:35px;
            }

            .left-panel h1{
                font-size:40px;
            }
        }
    </style>

</head>

<body>

<div class="login-container">

    <!-- KIRI -->
    <div class="left-panel">

        <!-- OPSI 1 PAKAI GAMBAR -->
        <!--
        <img src="<?= base_url('assets/img/electronics.png') ?>" alt="Elektronik">
        -->

        <!-- OPSI 2 PAKAI ICON -->
        <div class="icon-box">
            <i class="fas fa-laptop"></i>
        </div>

        <h1>PT MAJU JAYA</h1>

        <h4>Sistem Sales Order</h4>

        <p>
            Sistem Sales Order berbasis web untuk membantu tim sales
            dalam mencatat pesanan pelanggan, mengurangi kehilangan data,
            mencegah duplikasi transaksi, dan mempercepat proses distribusi
            berbagai produk elektronik.
        </p>

    </div>

    <!-- KANAN -->
    <div class="right-panel">

        <h2 class="welcome-title">
            Selamat Datang 👋
        </h2>

        <p class="welcome-subtitle">
            Login untuk mengakses Sistem Sales Order PT Maju Jaya
        </p>

        <?php if($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('auth/proses_login'); ?>">

            <div class="form-group">
                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Masukkan Username"
                       required>
            </div>

            <div class="form-group">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan Password"
                       required>
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>
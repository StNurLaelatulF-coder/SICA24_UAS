<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
        }

        .left {
            flex: 1;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            flex-direction: column;
        }

        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f5f6fa;
        }

        .box {
            width: 300px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #ff6b81;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #ff4757;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="left">
    <h1>Sales Order System</h1>
    <p>Login untuk melanjutkan</p>
</div>

<div class="right">
    <div class="box">

        <h3>Login</h3>

        <?php if ($this->session->flashdata('error')) { ?>
            <p class="error"><?= $this->session->flashdata('error'); ?></p>
        <?php } ?>

        <form method="post" action="<?= base_url('index.php/auth/login_process'); ?>">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

    </div>
</div>

</body>
</html>
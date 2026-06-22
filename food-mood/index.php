<?php
session_start();

if (isset($_POST['nama'])) {
    $_SESSION['nama'] = $_POST['nama'];
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Food & Mood</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #ffd6e0, #e0c3fc);
            text-align: center;
            padding-top: 100px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            width: 300px;
            margin: auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        h1 {
            color: #ff6b81;
        }

        input {
            padding: 10px;
            width: 80%;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin-top: 15px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background: #ff6b81;
            color: white;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            background: #ff4d6d;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>WEB NYAWIT</h1>
    <p>Haii! Sebelum mulai, siapa nama kamu?</p>

    <form method="POST">
        <input type="text" name="nama" placeholder="Masukkan nama..." required>
        <br>
        <button type="submit">Mulai</button>
    </form>
</div>

</body>
</html>
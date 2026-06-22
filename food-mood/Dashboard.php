<?php
session_start();
$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffd6e0, #e0c3fc, #c3f0ff);
            text-align: center;
            padding-top: 80px;
        }

            .card {
            background: rgba(255,255,255,0.9);
            padding: 30px;
            border-radius: 25px;
            width: 350px;
            margin: auto;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            animation: fadeIn 1s ease;
        }

        h1 {
            color: #444;
        }

        button {
            margin: 10px;
            padding: 12px 22px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            background: linear-gradient(to right, #ff9a9e, #fad0c4);
            color: white;
            transition: 0.3s;
        }

            button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .happy {
            background: #ff9a9e;
            color: white;
        }

        .sad {
            background: #a1c4fd;
            color: white;
        }

        .menu {
            margin-top: 40px;
        }

        .menu a {
            display: block;
            margin: 10px;
            text-decoration: none;
            background: white;
            padding: 12px;
            border-radius: 10px;
            color: #555;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
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
    </style>
</head>
<body>

<h1>Haii, <?php echo $nama; ?></h1>
<p>How’s your day?</p>

<button class="mood-btn happy" onclick="pilihMood('good')">Good Mood</button>
<button class="mood-btn sad" onclick="pilihMood('bad')">Bad Mood</button>

<div class="menu" id="menu" style="display:none;">
    <h2>Pilih Menu</h2>

    <a href="pages/spin.php">Pilih Makanan</a>
    <a href="pages/mood.php">Mood Tracker</a>
    <a href="pages/outfit.php">Pilih Warna Outfit</a>
</div>

<script>
function pilihMood(mood) {
    window.location.href = "menu.php?mood=" + mood;
}
</script>

</body>
</html>
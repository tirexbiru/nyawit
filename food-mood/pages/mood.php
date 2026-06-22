<?php
session_start();
$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mood Tracker</title>
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

        .good {
            background: #ff9a9e;
            color: white;
        }

        .bad {
            background: #a1c4fd;
            color: white;
        }

        textarea {
            width: 90%;
            padding: 10px;
            border-radius: 10px;
            margin-top: 10px;
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

<div class="card">

    <h2>Haii <?php echo $nama; ?></h2>
    <p id="text">How’s your day?</p>

    <div id="step1">
        <button class="good" onclick="goodMood()">HAPPYYY</button>
        <button class="bad" onclick="badMood()">no</button>
    </div>

    <div id="step2" style="display:none;"></div>

</div>

<script>
function goodMood() {
    document.getElementById("text").innerHTML =
    "Wahhh senang sekaliii kamu hari ini good mood yeyy<br>Mau cerita ke aku nggak?";

    document.getElementById("step1").style.display = "none";

    document.getElementById("step2").innerHTML = `
        <button onclick="cerita()">MAUUUU</button>
        <button onclick="skip()">kapan kapan aja yaaa</button>
    `;
    document.getElementById("step2").style.display = "block";
}

function badMood() {
    document.getElementById("text").innerHTML =
    "Aww, maaf ya harimu kurang baik<br>Mau cerita ke aku? aku dengerin kok";

    document.getElementById("step1").style.display = "none";

    document.getElementById("step2").innerHTML = `
        <button onclick="cerita()">iya aku mau cerita</button>
        <button onclick="skip()">ngga dulu yaa</button>
    `;
    document.getElementById("step2").style.display = "block";
}

function cerita() {
    document.getElementById("text").innerHTML =
    "Aku dengerin yaa Ceritain aja semuanya disini";

    document.getElementById("step2").innerHTML = `
        <textarea placeholder="Tulis ceritamu di sini..."></textarea><br>
        <button onclick="thanks()">Kirim</button>
    `;
}

function skip() {
    document.getElementById("text").innerHTML =
    "Baiklah, aku akan menunggu ceritamu 🤍<br>Semoga harimu selalu menyenangkan yaa";

    document.getElementById("step2").innerHTML = "";
}

function thanks() {
    document.getElementById("text").innerHTML =
    "Terima kasih sudah cerita Aku senang bisa dengerin kamu<br>Have a great dayy 🤍";

    document.getElementById("step2").innerHTML = "";
}
</script>

</body>
</html>
<?php
session_start();
$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rekomendasi Harian</title>
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

        textarea {
            width: 90%;
            padding: 10px;
            border-radius: 10px;
        }

        #wheel {
            margin: 20px auto;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            border: 6px solid #333;
            transition: transform 4s ease-out;
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
<p id="text">Bagaimana hari ini?</p>

<div id="step1">
    <button onclick="setMood('happy')">Happy</button>
    <button onclick="setMood('bad')">Bad</button>
</div>

<div id="step2" style="display:none;"></div>
<div id="step3" style="display:none;"></div>

<div id="wheel"></div>

<p id="result"></p>

</div>

<script>
let mood = "";
let foods = [];

function setMood(m) {
    mood = m;
    document.getElementById("text").innerHTML =
        "Mau dipilihkan atau pilih sendiri?";

    document.getElementById("step1").style.display = "none";

    document.getElementById("step2").innerHTML = `
        <button onclick="autoPick()">Dipilihkan</button>
        <button onclick="customPick()">Aku mau request pilihanku</button>
    `;
    document.getElementById("step2").style.display = "block";
}

function autoPick() {
    foods = ["Nasi Goreng","Mie Ayam","Bakso","Ayam Geprek","Sushi","Salad"];
    startSpin();
}

function customPick() {
    document.getElementById("text").innerHTML =
        "Tulis makanan yang kamu mau (pisah pakai koma yaa)";

    document.getElementById("step2").innerHTML = `
        <textarea id="inputFood" placeholder="contoh: bakso, mie ayam"></textarea><br>
        <button onclick="processCustom()">Lanjut</button>
    `;
}

function processCustom() {
    let input = document.getElementById("inputFood").value;
    foods = input.split(",");
    startSpin();
}

function startSpin() {
    let wheel = document.getElementById("wheel");

    let randomDeg = Math.floor(3600 + Math.random() * 360);
    wheel.style.transform = `rotate(${randomDeg}deg)`;

    setTimeout(() => {
        let index = Math.floor(Math.random() * foods.length);

        let pesan = "";
        if (mood == "happy") {
            pesan = "Karena kamu lagi happy, aku pilihkan:";
        } else {
            pesan = "Semoga ini bisa bikin mood kamu lebih baik💖:";
        }

        document.getElementById("result").innerHTML =
            pesan + "<br><b>" + foods[index] + "</b>";
    }, 4000);
}
</script>

</body>
</html>
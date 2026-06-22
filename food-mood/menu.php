<?php
session_start();
$nama = $_SESSION['nama'];
$mood = $_GET['mood'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Menu</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(-45deg, #ffe5ec, #e0bbff, #cdb4db, #ffc8dd);
    background-size: 400% 400%;
    animation: bgMove 10s ease infinite;
    text-align: center;
    padding-top: 80px;
    overflow: hidden;
}

@keyframes bgMove {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

/* ✨ floating glow */
body::before {
    content: "";
    position: fixed;
    width: 300px;
    height: 300px;
    background: #ffc8dd;
    filter: blur(120px);
    top: -50px;
    left: -50px;
    opacity: 0.6;
}

body::after {
    content: "";
    position: fixed;
    width: 300px;
    height: 300px;
    background: #a2d2ff;
    filter: blur(120px);
    bottom: -50px;
    right: -50px;
    opacity: 0.6;
}

.card {
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(15px);
    padding: 30px;
    border-radius: 25px;
    width: 360px;
    margin: auto;
    box-shadow: 0 15px 50px rgba(0,0,0,0.15);
    animation: fadeUp 0.8s ease;
}

/* stagger animation */
.menu a {
    opacity: 0;
    transform: translateY(20px);
    animation: itemUp 0.6s forwards;
}

.menu a:nth-child(1){ animation-delay: 0.2s; }
.menu a:nth-child(2){ animation-delay: 0.4s; }
.menu a:nth-child(3){ animation-delay: 0.6s; }

@keyframes itemUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeUp {
    from {opacity:0; transform:translateY(30px);}
    to {opacity:1; transform:translateY(0);}
}

.title {
    animation: pop 0.6s ease;
}

@keyframes pop {
    0% {transform: scale(0.8); opacity: 0;}
    100% {transform: scale(1); opacity: 1;}
}

.menu a {
    display: block;
    margin: 12px;
    padding: 14px;
    border-radius: 18px;
    text-decoration: none;
    color: #555;
    transition: 0.3s;
    background: rgba(255,255,255,0.8);
}

/* hover premium */
.menu a:hover {
    transform: translateY(-5px) scale(1.05);
    background: linear-gradient(to right, #ffafcc, #ffc8dd);
    color: white;
    box-shadow: 0 10px 30px rgba(255, 105, 180, 0.4);
}

/* fade out */
.fade-out {
    animation: fadeOut 0.5s forwards;
}

@keyframes fadeOut {
    to {
        opacity: 0;
        transform: scale(0.95);
    }
}
</style>
</head>

<body>

<div class="card" id="card">

<h2 class="title">Haii <?php echo $nama; ?> 👋</h2>

<p>
<?php 
if($mood == "good"){
    echo "Wahh senang banget kamu lagi good mood!";
} else {
    echo "Semoga hari kamu segera membaik yaa 🤍";
}
?>
</p>

<h3>Hari ini mau ngapain?</h3>

<div class="menu">
<a href="pages/spin.php">Pilih Makanan</a>
<a href="pages/mood.php">Mood Tracker</a>
<a href="pages/outfit.php">Pilih Warna Outfit</a>
</div>

</div>

<script>
// smooth page transition
document.querySelectorAll(".menu a").forEach(link => {
    link.addEventListener("click", function(e){
        e.preventDefault();
        const url = this.href;

        document.getElementById("card").classList.add("fade-out");

        setTimeout(() => {
            window.location.href = url;
        }, 400);
    });
});

// sparkle subtle
setInterval(() => {
    let s = document.createElement("div");
    s.style.position = "fixed";
    s.style.width = "4px";
    s.style.height = "4px";
    s.style.background = "white";
    s.style.borderRadius = "50%";
    s.style.left = Math.random()*100+"%";
    s.style.top = "100%";
    s.style.opacity = "0.5";

    document.body.appendChild(s);

    s.animate([
        { transform: "translateY(0)", opacity: 0.5 },
        { transform: "translateY(-100vh)", opacity: 0 }
    ], { duration: 4000 });

    setTimeout(()=>s.remove(),4000);
}, 500);
</script>

</body>
</html>
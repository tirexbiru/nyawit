<!DOCTYPE html>
<html>
<head>
<title>Spin Makanan</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(-45deg, #ffd6e0, #e0c3fc, #c3f0ff);
    background-size: 400% 400%;
    animation: bgMove 8s ease infinite;
    text-align: center;
    padding-top: 50px;
}

@keyframes bgMove {
    0% {background-position:0%}
    50% {background-position:100%}
    100% {background-position:0%}
}

.card {
    background: rgba(255,255,255,0.9);
    padding: 30px;
    border-radius: 25px;
    width: 350px;
    margin: auto;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

button {
    margin: 8px;
    padding: 12px 18px;
    border-radius: 20px;
    border: none;
    background: linear-gradient(to right, #ff9a9e, #fad0c4);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.08);
}

textarea {
    width: 90%;
    padding: 10px;
    border-radius: 10px;
}

#wheel {
    width: 250px;
    height: 250px;
    border-radius: 50%;
    border: 6px solid #333;
    position: relative;
    overflow: hidden;
    margin: 20px auto;
    transition: transform 4s cubic-bezier(0.33,1,0.68,1);
    box-shadow: 0 0 20px rgba(255,182,193,0.6);
}

.segment {
    position: absolute;
    width: 50%;
    height: 50%;
    transform-origin: 100% 100%;
}

#result {
    margin-top: 15px;
    font-weight: bold;
    opacity: 0;
    transform: scale(0.8);
    transition: 0.4s;
}

/* sparkle */
.sparkle {
    position: fixed;
    width: 6px;
    height: 6px;
    background: white;
    border-radius: 50%;
    pointer-events: none;
    animation: sparkle 1s ease forwards;
}

@keyframes sparkle {
    to {
        transform: translateY(-50px);
        opacity: 0;
    }
}
</style>
</head>

<body>

<div class="card">

<h2>Pilih Makanan</h2>
<p>Kamu lagi pengen makan apa hari ini?</p>

<div>
    <button onclick="autoPick()">Dipilihkan Sistem</button>
    <button onclick="customMode()">Request Sendiri</button>
</div>

<div id="inputArea" style="display:none;">
    <textarea id="inputFood" placeholder="bakso, mie ayam"></textarea><br>
    <button onclick="processCustom()">Lanjut</button>
</div>

<div id="wheel"></div>

<button onclick="spin()">SPIN</button>

<p id="result"></p>

</div>

<audio id="sound" src="https://www.soundjay.com/misc/sounds/bell-ringing-05.mp3"></audio>

<script>
let foods = [];
const wheel = document.getElementById("wheel");
const colors = ["#FF6384","#36A2EB","#FFCE56","#4BC0C0","#9966FF","#FF9F40"];
let deg = 0;

function autoPick(){
    foods = ["Nasi Goreng","Mie Ayam","Bakso","Ayam Geprek","Sushi","Salad"];
    createWheel();
}

function customMode(){
    document.getElementById("inputArea").style.display = "block";
}

function processCustom(){
    foods = document.getElementById("inputFood").value.split(",");
    foods = foods.slice(0,6);
    createWheel();
}

function createWheel(){
    wheel.innerHTML="";
    deg = 360 / foods.length;

    foods.forEach((food,i)=>{
        let seg=document.createElement("div");
        seg.className="segment";
        seg.style.background=colors[i%colors.length];
        seg.style.transform=`rotate(${i*deg}deg) skewY(${90-deg}deg)`;

        let text=document.createElement("span");
        text.innerText=food.trim();

        // 🔥 STYLE TEXT (SPINWHEEL + MULTILINE)
        text.style.position = "absolute";
        text.style.right = "10px";
        text.style.top = "50%";
        text.style.transformOrigin = "right center";

        text.style.color = "white";
        text.style.fontSize = food.length > 12 ? "11px" : "13px";
        text.style.fontWeight = "600";
        text.style.textAlign = "right";
        text.style.textShadow = "0 2px 4px rgba(0,0,0,0.3)";

        // 🔥 MULTILINE (INI YANG FIX MASALAH KAMU)
        text.style.whiteSpace = "normal";
        text.style.wordBreak = "break-word";
        text.style.width = "65px";
        text.style.lineHeight = "14px";

        // 🔥 POSISI TENGAH SLICE
        text.style.transform = `rotate(${deg/2}deg)`;

        seg.appendChild(text);
        wheel.appendChild(seg);
    });
}

function spin(){
    if(foods.length===0){
        alert("Pilih dulu makanannya");
        return;
    }

    document.getElementById("sound").play();

    let randomDeg = Math.floor(3600 + Math.random()*360);
    wheel.style.transform=`rotate(${randomDeg}deg)`;

    setTimeout(()=>{
        let actualDeg = randomDeg % 360;
        let index = Math.floor((360 - actualDeg)/deg) % foods.length;

        let result=document.getElementById("result");
        result.innerText="Kamu makan: "+foods[index];
        result.style.opacity="1";
        result.style.transform="scale(1.2)";

        sparkle();
    },4000);
}

function sparkle(){
    for(let i=0;i<30;i++){
        let el=document.createElement("div");
        el.className="sparkle";
        el.style.left=Math.random()*100+"%";
        el.style.top="80%";
        document.body.appendChild(el);
        setTimeout(()=>el.remove(),1000);
    }
}
</script>

</body>
</html>
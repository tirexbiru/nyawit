<!DOCTYPE html>
<html>
<head>
<title>Outfit Color Picker</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(-45deg, #ffe5ec, #e0bbff, #cdb4db, #ffc8dd);
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
    background: rgba(255,255,255,0.95);
    padding: 30px;
    border-radius: 25px;
    width: 360px;
    margin: auto;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

button {
    margin: 8px;
    padding: 12px 18px;
    border-radius: 20px;
    border: none;
    background: linear-gradient(to right, #ffafcc, #ffc8dd);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.08);
}

.palette {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.color-box {
    width: 50px;
    height: 50px;
    margin: 5px;
    border-radius: 10px;
}

#desc {
    margin-top: 15px;
    font-size: 14px;
    color: #555;
}
</style>
</head>

<body>

<div class="card">

<h2>Outfit Color Picker</h2>
<p>Hari ini mau tampil dengan vibe apa?</p>

<!-- MODE -->
<div>
    <button onclick="showSeason()">Season</button>
    <button onclick="showStyle()">Style</button>
</div>

<!-- PILIHAN -->
<div id="options"></div>

<!-- HASIL -->
<div class="palette" id="palette"></div>
<p id="desc"></p>

</div>

<script>
// DATA
const seasonColors = {
  spring: {
    colors: ["#ffb7b2","#ffdac1","#e2f0cb","#b5ead7"],
    desc: "Fresh, soft, girly vibes"
  },
  summer: {
    colors: ["#cdb4db","#ffc8dd","#bde0fe","#a2d2ff"],
    desc: "Calm, cool, elegant"
  },
  autumn: {
    colors: ["#7f5539","#9c6644","#b08968","#ddb892"],
    desc: "Warm, cozy, mature"
  },
  winter: {
    colors: ["#000000","#14213d","#fca311","#e5e5e5"],
    desc: "Bold, classy, standout"
  }
};

const styleColors = {
  pastel: {
    colors: ["#ffc8dd","#ffafcc","#cdb4db","#bde0fe","#a2d2ff"],
    desc: "Soft, cute, feminine"
  },
  neutral: {
    colors: ["#f5ebe0","#e3d5ca","#d5bdaf","#a5a58d","#6b705c"],
    desc: "Simple, clean, minimal"
  },
  monochrome: {
    colors: ["#000","#444","#888","#ccc","#fff"],
    desc: "Elegant black & white"
  },
  bold: {
    colors: ["#ff0000","#ff6600","#ffcc00","#00ccff","#6600ff"],
    desc: "Confident & eye-catching"
  },
  earth: {
    colors: ["#7f5539","#a68a64","#b08968","#ddb892","#ede0d4"],
    desc: "Natural & calm aesthetic"
  }
};

// SHOW OPTIONS
function showSeason(){
    let html = `
        <button onclick="generateSeason('spring')">Spring</button>
        <button onclick="generateSeason('summer')">Summer</button>
        <button onclick="generateSeason('autumn')">Autumn</button>
        <button onclick="generateSeason('winter')">Winter</button>
    `;
    document.getElementById("options").innerHTML = html;
}

function showStyle(){
    let html = `
        <button onclick="generateStyle('pastel')">Pastel</button>
        <button onclick="generateStyle('neutral')">Neutral</button>
        <button onclick="generateStyle('monochrome')">Monochrome</button>
        <button onclick="generateStyle('bold')">Bold</button>
        <button onclick="generateStyle('earth')">Earth Tone</button>
    `;
    document.getElementById("options").innerHTML = html;
}

// GENERATE
function generateSeason(type){
    showPalette(seasonColors[type]);
}

function generateStyle(type){
    showPalette(styleColors[type]);
}

// SHOW RESULT
function showPalette(data){
    let palette = document.getElementById("palette");
    palette.innerHTML = "";

    data.colors.forEach(color => {
        let box = document.createElement("div");
        box.className = "color-box";
        box.style.background = color;
        palette.appendChild(box);
    });

    document.getElementById("desc").innerText = data.desc;
}
</script>

</body>
</html>
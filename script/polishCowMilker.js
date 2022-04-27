// Bestemmer pris
var priceM = 10; //milker pris
var priceS = 20; //slave pris
var priceG = 1000000000000; //god pris
var priceM1 = 10000; //milker upgrade pris

// start variabler -- trenger å fikse for php
var milk = 0;
var slaves = 0;
var milkers = 1;
var upgradeM1 = false;

// misc
var audio = false;

$("#priceM1").text("price:" + Math.floor(priceM1));
$("#priceM").text("price:" + Math.floor(priceM));
$("#priceS").text("price:" + Math.floor(priceS));
$("#priceG").text("price:" + Math.floor(priceG));

window.setInterval(slaveCps, 1000); /* intervaler for å gi Melk per sekund */
window.setInterval(M1Cps, 1000);

// klikke funkskjon pluss audio spilling første gang
function clicked() {
	milk += milkers;
    updateHTML();
	// lyd
	if (audio == false) {
		// legge til enable disable checkmark for lyd?
		$("#audio").play;
		audio = true;
		console.log("audio playing");
	}
}

function buymilker() {
	if (milk >= priceM) {
		milkers++;
		milk -= priceM;
		priceM += milkers ** 1.15;
        updateHTML();
	}
}

function buyslave() {
	/* vanlig kjøpe funksjon */
	if (milk >= priceS) {
		slaves++;
		milk -= priceS;
		priceS += slaves ** 1.15;
        updateHTML();
	}
}

function buyGod() {
	/* måten å vinne spillet på */
	if (milk >= priceG) {
		document.getElementById("god").innerHTML = "god: REAL";
		document.getElementById("priceG").innerHTML = "";
		milk = Number.POSITIVE_INFINITY;
		updateHTML()
	}
}

function slaveCps() {
	/* det som faktisk gir melken i cps */
	if (slaves >= 1) {
		milk += slaves;
        updateHTML();
    }
}

function M1Cps() {
	if (upgradeM1 == true) {
		milk += Math.floor(milkers * 0.5);
		updateHTML();
	}
}

function upgrade() {
	if (milk >= priceM1) {
		upgradeM1 = true;
		milk -= priceM1;
		document.getElementById("clicks").innerHTML = "milk:" + Math.floor(milk);
		document.getElementById("priceM1").innerHTML = "";
	}
}

function updateHTML() {
    $("#clicks").text("milk:" + Math.floor(milk));

    $("#milkers").text("milkers:" + Math.floor(milkers));
    $("#slaves").text("slaves:" + Math.floor(slaves));
    
    $("#priceM").text("price:" + Math.floor(priceM));
    $("#priceS").text("price:" + Math.floor(priceS));
}

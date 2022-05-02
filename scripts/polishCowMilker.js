var milk = 0;
// Bestemmer upgrade pris og starting amount
var milker = { amount: 1, price: 10 };
var slave = { amount: 0, price: 20 };
var milkerino = { owned: false, price: 10000 };
var god = { owned: false, price: 1000000000000 };

// lyd bool
var audioPlaying = false;

stockMarket = document.getElementById("stockMarket");
ctx = stockMarket.getContext("2d");
ctx.strokeStyle = "red";
xCord = 10;
yCord = 100;
ctx.moveTo(0, yCord);
ctx.lineTo(xCord, yCord);
ctx.stroke();

// endrer html text til pris verdier onload
$("#milkerinoPrice").text("Price: " + Math.floor(milkerino["price"]));
$("#milkerPrice").text("Price: " + Math.floor(milker["price"]));
$("#slavePrice").text("Price: " + Math.floor(slave["price"]));
$("#godPrice").text("Price: " + Math.floor(god["price"]));

// klikke funksjoner
$("#milkerShop").click(function () {
	buy(milker);
});
$("#slaveShop").click(function () {
	buy(slave);
});
$("#godShop").click(function () {
	buy(god);
});
$("#milkerinoShop").click(function () {
	buy(milkerino);
});
$("#cow").click(function () {
	click();
});
$("#audioButton").click(function () {
	audioToggle();
});

window.setInterval(mps, 1000); // intervall for å gi Melk per sekund
window.setInterval(stockPrice, 10);

// klikke funkskjon
function click() {
	milk += milker["amount"];
	updateHTML();
}

function buy(product) {
	if (enoughMoney(product["price"])) {
		if (product["amount"]++) {
			milk -= product["price"];
			product["price"] += product["amount"] ** 1.15;
		} else if (product["owned"] == false) {
			milk -= product["price"];
			product["owned"] = true;
		}
		updateHTML();
	}
}

function mps() {
	// det som faktisk gir melken i per sekund
	milk += slave["amount"];
	if (milkerino["owned"] == true) {
		milk += Math.floor(milker["amount"] * 0.5);
	}
	updateHTML();
}

// tekst update
function updateHTML() {
	// klikk update
	$("#clickText").text("Milk: " + Math.floor(milk));

	// mengde items update
	$("#milkerAmount").text("Milkers: " + Math.floor(milker["amount"]));
	$("#slaveAmount").text("Slaves: " + Math.floor(slave["amount"]));

	// pris update
	$("#milkerPrice").text("Price: " + Math.floor(milker["price"]));
	$("#slavePrice").text("Price: " + Math.floor(slave["price"]));

	// upgrade update
	if (milkerino["owned"]) {
		$("#milkerinoText").text("Milkerino: Sold out");
		$("#milkerinoPrice").css("display", "none");
	}
	if (god["owned"]) {
		$("#godText").text("God: You!");
		$("#godPrice").css("display", "none");
	}
}

// sjekker om man har nok melk
function enoughMoney(price) {
	if (milk >= price) {
		return true;
	} else {
		return false;
	}
}

// audio funksjon
function audioToggle() {
	if (audioPlaying) {
		audioPlaying = false;
		$("#audioButton").text("Play audio");
		$("#audioFile").trigger("pause");
		$("#audioFile").prop("currentTime", 0);
	} else {
		audioPlaying = true;
		$("#audioButton").text("Stop audio");
		$("#audioFile").trigger("play");
	}
}

function stockPrice() {
	priceChange = Math.random() * 40 - 20;
	xCord += 5;
	yCord += priceChange;
	if (yCord >= 200) {
		yCord = 200;
	}
	if (yCord <= 0) {
		yCord = 0;
	}
	if (xCord >= 950) {
		ctx.clearRect(0, 0, stockMarket.width, stockMarket.height);
    ctx.beginPath();
		ctx.moveTo(0, yCord);
		xCord = 5;
	}
	ctx.lineTo(xCord, yCord);
	ctx.stroke();
}

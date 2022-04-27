var milk = 0;
// Bestemmer upgrades
var milker = { amount: 1, price: 10 };
var slave = { amount: 0, price: 20 };
var milkerino = { owned: false, price: 10000 };
var god = { owned: false, price: 1000000000000 };

var audio = false;

$("#priceM1").text("price:" + Math.floor(milkerino["price"]));
$("#priceM").text("price:" + Math.floor(milker["price"]));
$("#priceS").text("price:" + Math.floor(slave["price"]));
$("#priceG").text("price:" + Math.floor(god["price"]));

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

window.setInterval(mps, 1000); /* intervaler for å gi Melk per sekund */

// klikke funkskjon pluss audio spilling første gang
function click() {
	milk += milker["amount"];
	updateHTML();
	// lyd
	if (audio == false) {
		// legge til enable disable checkmark for lyd?
		$("#audio").play;
		audio = true;
		console.log("audio playing");
	}
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
	/* det som faktisk gir melken i cps */
	milk += slave["amount"];
	if (milkerino["owned"] == true) {
		milk += Math.floor(milker["amount"] * 0.5);
	}
	updateHTML();
}

// tekst update
function updateHTML() {
	// klikk update
	$("#clicks").text("milk:" + Math.floor(milk));

	// mengde items update
	$("#milkers").text("milkers:" + Math.floor(milker["amount"]));
	$("#slaves").text("slaves:" + Math.floor(slave["amount"]));

	// pris update
	$("#priceM").text("price:" + Math.floor(milker["price"]));
	$("#priceS").text("price:" + Math.floor(slave["price"]));

	// upgrade update
	if (milkerino["owned"]) {
		$("#priceM1").text("");
	}
	if (god["owned"]) {
		$("#priceG").text("");
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

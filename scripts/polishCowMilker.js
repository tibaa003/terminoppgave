var milk = 0;
// Bestemmer upgrade pris og starting amount
var milker = { amount: 1, price: 10 };
var slave = { amount: 0, price: 20 };
var milkerino = { owned: false, price: 10000 };
var god = { owned: false, price: 1000000000000 };

// lyd bool
var audioPlaying = false;

// endrer html text til pris verdier
$("#priceM1").text("price:" + Math.floor(milkerino["price"]));
$("#priceM").text("price:" + Math.floor(milker["price"]));
$("#priceS").text("price:" + Math.floor(slave["price"]));
$("#priceG").text("price:" + Math.floor(god["price"]));

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
$("#audio").click(function () {
  audio();
});

window.setInterval(mps, 1000); // intervall for å gi Melk per sekund

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

// audio funksjon
function audio() {
  if (audioPlaying) {
    audioPlaying = false;
    $("#audio").text("Play audio");
    $("#audioFile").trigger("pause");
    $("#audioFile").prop("currentTime", 0);
  } else {
    audioPlaying = true;
    $("#audio").text("Stop audio");
    $("#audioFile").trigger("play");
  }
}

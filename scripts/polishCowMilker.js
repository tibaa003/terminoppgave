var milk = 0;
var stock = 0;
// Bestemmer upgrade pris og starting amount
var milker = { amount: 1, price: 10 };
var slave = { amount: 0, price: 20 };
var milkerino = { owned: false, price: 10000 };
var god = { owned: false, price: 1000000000000 };

// lyd bool
var audioPlaying = false;

const stockMarket = document.getElementById("stockMarket");
const ctx = stockMarket.getContext("2d");
ctx.strokeStyle = "red";
let xCord = 10;
let yCord = 100;
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

$("#buyStockBtn").click(function () {
  buyStock();
});

$("#sellStockBtn").click(function () {
  sellStock();
});

$("#buyMaxStockBtn").click(function () {
  buyMaxStock();
});
$("#sellMaxStockBtn").click(function () {
  sellMaxStock();
});
$("#saveButton").click(function () {
  saveGame();
});

window.setInterval(mps, 1000); // intervall for å gi Melk per sekund
window.setInterval(stockPrice, 10000);

updateHTML();

// klikke funkskjon
function click() {
  milk += milker["amount"];
  updateHTML();
}

function buy(product) {
  if (enoughMoney(product["price"])) {
    if (product["amount"]++) {
      milk -= product["price"];
      if (product["amount"] > 0) {
        product["price"] += product["amount"] ** 1.15;
      } else {
        product["price"] += 2;
      }
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

  $("#stockValue").text("Stock value: " + yCord);

  $("#ownedStock").text("Owned stock: " + stock);

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
  yCord += parseInt(priceChange.toFixed());
  if (yCord >= 200) {
    yCord = 200;
  }
  if (yCord <= 1) {
    yCord = 1;
  }
  if (xCord >= 1000) {
    ctx.clearRect(0, 0, stockMarket.width, stockMarket.height);
    ctx.beginPath();
    ctx.moveTo(0, 200 - yCord);
    xCord = 5;
  }
  ctx.lineTo(xCord, 200 - yCord);
  ctx.stroke();
  updateHTML();
}

function buyStock() {
  if (milk >= yCord) {
    milk -= yCord;
    stock++;
    updateHTML();
  }
}

function sellMaxStock() {
  milk += yCord * stock;
  stock = 0;
  updateHTML();
}

function buyMaxStock() {
  modulo = milk % yCord;
  max = (milk - modulo) / yCord;
  milk -= max * yCord;
  stock += max;
  updateHTML();
}

function sellStock() {
  milk += yCord;
  stock--;
  updateHTML();
}

// saving to db
const ajax = new XMLHttpRequest();

function saveGame() {
  ajax.open("POST", "../php/polishSave.php");
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send(
    "milk=" + milk + "&milkers=" + milker.amount + "&slaves=" + slave.amount
  );
}

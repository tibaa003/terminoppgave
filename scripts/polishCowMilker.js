var x = 0;
var prisM = 10;
var milkers = 1;
var prisS = 20;
var slaves = 0;
var audio = 0;
var prisG = 1000000000000;
var priceM1 = 10000;
var MUpgrade = false;
var thousand = false;




document.getElementById("M1price").innerHTML = "price:" + Math.floor(priceM1); /* sette in pris i tilfelle jeg ville endre det */

function milk() { /* klikke funkskjon pluss audio spilling første gang */
    x += milkers
    document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x); /* math.floor overalt for å ikke ha desimaler*/
    if (audio == 0) {
        document.getElementById("audio").play();
        audio = 1;
        console.log("audio playing")
    }
    if (thousand == false && x == 1000) { /* epic surprise hvis du har over 1000 melk */
        window.open("./thousand.html")
        thousand = true
    }
}

function buymilker() { 
    if (x >= prisM && prisM == 10) { /* hadde problemer med prisM */
        milkers++
        document.getElementById("milkers").innerHTML = "milkers:" + Math.floor(milkers);
        x = x - prisM
        document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x);
        prisM += 1
        document.getElementById("priceM").innerHTML = "price:" + Math.floor(prisM);
    } else if (x >= prisM) {
        milkers++
        document.getElementById("milkers").innerHTML = "milkers:" + Math.floor(milkers);
        x = x - prisM
        document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x);
        prisM += (milkers ** 1.15)
        Math.floor(prisM)
        document.getElementById("priceM").innerHTML = "price:" + Math.floor(prisM);
    }
}

function buyslave() { /* vanlig kjøpe funksjon */
    if (x >= prisS) {
        slaves++
        document.getElementById("slaves").innerHTML = "slaves:" + Math.floor(slaves);
        x = x - prisS
        document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x);
        prisS += (slaves ** 1.15)
        document.getElementById("priceS").innerHTML = "price:" + Math.floor(prisS);
    }
}

function buyGod() {  /* måten å vinne spillet på */
    if (x >= prisG) {
        document.getElementById("god").innerHTML = "god: REAL";
        document.getElementById("priceG").innerHTML = "";
        x = Number.POSITIVE_INFINITY
        document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x);
    }
}
window.setInterval(slaveCps, 1000); /* intervaler for å gi Melk per sekund */
window.setInterval(M1Cps, 1000);

function slaveCps() { /* det som faktisk gir melken i cps */
    if (slaves >= 1) {
        x += slaves
        document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x);
    }
}

function M1Cps() {
    if (MUpgrade == true) {
        x += Math.floor(milkers * 0.5)
        document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x);
    }
}

function upgradeM1() {
    if (x >= priceM1) {
        MUpgrade = true
        x -= priceM1
        document.getElementById("clicks").innerHTML = "milk:" + Math.floor(x);
        document.getElementById("M1price").innerHTML = "";
    }
}


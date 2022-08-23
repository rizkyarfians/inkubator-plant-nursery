const controlRelayMist = document.getElementById("relay_mist");
const controlRelayFan = document.getElementById("relay_fan");
const controlRelayLed = document.getElementById("relay_led");
const controlRelayPump = document.getElementById("relay_pump");
const fanPWM = document.getElementById("fan_pwm");
const mistPWM = document.getElementById("mist_pwm");
const mistPWMVal = document.getElementById("pwm_mist_val");
const fanPWMVal = document.getElementById("pwm_fan_val");

const setFan = document.getElementById("setFan");
const setMist = document.getElementById("setMist");

var fanStatus = false;
var mistStatus = false;
var pumpStatus = false;
var ledStatus = true;
setFan.addEventListener("click", () => {
  if (controlRelayFan.checked == true) {
    fanStatus = true;
  } else {
    fanStatus = false;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://localhost/api-pembibitan/kontrol.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("dutyFan=" + fanPWM.value + "&relayFan=" + fanStatus);
  fanPWMVal.innerHTML = fanPWM.value + "%";
});

fanPWM.addEventListener("change", () => {
  fanPWMVal.innerHTML = fanPWM.value + "%";
});
mistPWM.addEventListener("change", () => {
  mistPWMVal.innerHTML = mistPWM.value + "%";
});
setMist.addEventListener("click", () => {
  if (controlRelayMist.checked == true) {
    mistStatus = true;
  } else {
    mistStatus = false;
  }

  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://localhost/api-pembibitan/kontrol.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("dutyMist=" + mistPWM.value + "&relayMist=" + mistStatus);
});

controlRelayPump.addEventListener("change", () => {
  if (controlRelayPump.checked == true) {
    pumpStatus = true;
  } else {
    pumpStatus = false;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://localhost/api-pembibitan/kontrol.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("relayPump=" + pumpStatus);
});

controlRelayLed.addEventListener("change", () => {
  if (controlRelayLed.checked == true) {
    ledStatus = true;
  } else {
    ledStatus = false;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://localhost/api-pembibitan/kontrol.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("relayLed=" + ledStatus);
});

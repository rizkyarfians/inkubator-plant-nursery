const controlRelayLed = document.getElementById("relay_led");
const controlRelayFan = document.getElementById("relay_fan");
const controlRelayPump = document.getElementById("relay_pump");
const fanPWM = document.getElementById("fan_pwm");
const ledPWM = document.getElementById("led_pwm");
const ledPWMVal = document.getElementById("pwm_led_val");
const fanPWMVal = document.getElementById("pwm_fan_val");

const setFan = document.getElementById("setFan");
const setLed = document.getElementById("setLed");

var fanStatus = false;
var ledStatus = false;
var pumpStatus = false;
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
ledPWM.addEventListener("change", () => {
  ledPWMVal.innerHTML = ledPWM.value + "%";
});
setLed.addEventListener("click", () => {
  if (controlRelayLed.checked == true) {
    ledStatus = true;
  } else {
    ledStatus = false;
  }

  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://localhost/api-pembibitan/kontrol.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("dutyLed=" + ledPWM.value + "&relayLed=" + ledStatus);
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

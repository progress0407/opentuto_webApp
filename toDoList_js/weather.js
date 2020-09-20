const weather = document.querySelector(".js-weather");

const API_KEYS = "b79d887d5b5cec7ffd81d3e93a6a0afc";
const COORDS = "coords";

function getWeahter(lat, lng) {
  // then은 데이터가 fetch로 데이터가 완전히 들어온 다음에 수행될 문장
  fetch(
    `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&appid=${API_KEYS}&units=metric`
  )
    .then(function (response) {
      return response.json();
    })
    .then(function (json) {
      const temperature = json.main.temp;
      const place = json.name;
      weather.innerText = ` ${temperature}℃  @ ${place}`;
    });
}

function saveCoords(coordsObj) {
  localStorage.setItem(COORDS, JSON.stringify(coordsObj));
}

function handleGeoSucces(position) {
  //   console.log(position);
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  const coordsObj = {
    latitude,
    longitude,
  };
  saveCoords(coordsObj);
  getWeahter(latitude, longitude);
}

function handleGeoError(position) {
  console.log("Cant access geo location");
}

function askForCoords() {
  navigator.geolocation.getCurrentPosition(handleGeoSucces, handleGeoError);
}

function loadCoords() {
  const loadedCoords = localStorage.getItem(COORDS);
  if (loadedCoords === null) {
    askForCoords();
  } else {
    // getWeather
    const parseCoords = JSON.parse(loadedCoords);
    getWeahter(parseCoords.latitude, parseCoords.longitude);
  }
}

function init() {
  // 울리는지 한번보자!
  //   navigator.vibrate(200, 100, 200);
  loadCoords();
}

init();

const clockContainer = document.querySelector(".js-clock"),
  clockTitle = clockContainer.querySelector("h1");
// const clockTitle = document.querySelector(".js-clock").querySelector("h1");
// const clockTitle = document.querySelector(".js-clock > h1");

function getTime() {
  const date = new Date();
  const minutes = date.getMinutes();
  const hours = date.getHours();
  const seconds = date.getSeconds();
  const millisec = date.getMilliseconds();

  //   0~9는 00~09 라는 문자열을 리턴한다
  clockTitle.innerText = `${hours < 10 ? `0${hours}` : hours}:${
    minutes < 10 ? `0${minutes}` : minutes
  }:${seconds < 10 ? `0${seconds}` : seconds}`;
}

function init() {
  //   getTime();
  //   setTimeout(getTime, 100);
  setInterval(getTime, 1000);
}

init();

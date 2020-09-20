/*
<span class="style-scope ytd-thumbnail-overlay-time-status-renderer" aria-label="118초">
      1:58
</span>
*/

document.querySelectorAll(
  ".style-scope .ytd-thumbnail-overlay-time-status-renderer span"
);

<yt-formatted-string
  force-default-style=""
  class="style-scope ytd-video-primary-info-renderer"
>
  Orange3 - 1. 오리엔테이션
</yt-formatted-string>;

document.querySelectorAll(".ytd-thumbnail-overlay-time-status-renderer span");

<span
  class="style-scope ytd-thumbnail-overlay-time-status-renderer"
  aria-label="4분 39초"
>
  4:39
</span>;

var time = document.querySelectorAll(
  "#secondary #playlist .style-scope ytd-thumbnail-overlay-time-status-renderer span"
);
time.length;

c;

var hour = 0,
  min = 0,
  sec = 0;

for (var i = 0; i < time.length; i++) {
  var t = time[i];
  var t = time[i].innerText;
  t = t.split(":");

  t[0] = parseInt(t[0]);
  t[1] = parseInt(t[1]);

  console.log(t);

  sec += t[1];
  min += t[0];
}

console.log("hour : " + hour);
console.log("min : " + min);
console.log("sec : " + sec);

if (sec >= 60) {
  min = min + sec / 60;
  min = parseInt(min);
  sec %= 60;
}

if (min >= 60) {
  hour = min / 60;
  hour = parseInt(hour);
  min %= 60;
}

console.log(`tottal running time : ${hour}:${min}:${sec}`);
console.log(`total min time : ${hour * 60 + min}:${sec}`);

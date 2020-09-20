let body = document.getElementsByTagName("body").item(0);
btn_nightDay.addEventListener("click", () => {
  if (body.className !== "black") {
    body.className = "black";
  } else {
    body.className = "";
  }
});

const toDoForm = document.querySelector(".js-toDoForm"),
  toDoInput = toDoForm.querySelector("input"),
  toDoList = document.querySelector(".js-toDoList");

const TODOS_LS = "toDos";

let toDos = [];

function deletToDo(event) {
  // console.log(event.target.parentNode);
  // html문서의 목록을 없애
  const btn = event.target;
  const li = btn.parentNode;
  toDoList.removeChild(li);
  // console.log(li);

  // localStorage의 내용을 없애
  const cleanToDos = toDos.filter(function (toDo) {
    console.log(toDo.id, li.id);
    return toDo.id !== parseInt(li.id);
  });
  console.log(cleanToDos);
  toDos = cleanToDos;
  saveToDos();
}

function saveToDos() {
  // localStorage.setItem(TODOS_LS, toDos);
  // 윗줄은.. js가 localStorage의 다양한 형을 지원하지 않음
  // 자바스크립트 object를 string으로
  localStorage.setItem(TODOS_LS, JSON.stringify(toDos));
}

function paintToDo(text) {
  console.log(text);
  const li = document.createElement("li");
  const delBtn = document.createElement("button");
  const span = document.createElement("span");
  const newId = toDos.length + 1;
  delBtn.innerText = "❌";
  delBtn.addEventListener("click", deletToDo);

  span.innerText = text;
  li.appendChild(delBtn);
  li.appendChild(span);
  li.id = newId;
  toDoList.appendChild(li);

  const toDoObj = {
    text: text,
    id: newId,
  };

  toDos.push(toDoObj);
  saveToDos();
}

function handleSubmit(event) {
  event.preventDefault();
  const currentValue = toDoInput.value;
  paintToDo(currentValue);
  toDoInput.value = "";
}

function loadToDos() {
  const loadToDos = localStorage.getItem(TODOS_LS);
  if (loadToDos !== null) {
    // console.log(loadToDos);
    // object가 string을 불러왔다는게 문제야
    // 다시 string에서 object로 만들어주자구.
    const parsedToDos = JSON.parse(loadToDos);
    // console.log(parsedToDos);
    parsedToDos.forEach(function (toDo) {
      // console.log(toDo.text);
      paintToDo(toDo.text);
    });
  }
}

function init() {
  loadToDos();
  toDoForm.addEventListener("submit", handleSubmit);
}

init();

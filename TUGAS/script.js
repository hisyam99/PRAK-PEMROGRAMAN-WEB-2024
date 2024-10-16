AOS.init();

// Tugas 1: Kalkulator
let currentInput = "0";
let previousInput = "";
let operator = "";
let isNegative = false;

function updateDisplay() {
  document.getElementById("display").innerText =
    (isNegative ? "-" : "") + currentInput;
}

function inputNumber(num) {
  currentInput =
    currentInput === "0" ? String(num) : currentInput + String(num);
  updateDisplay();
}

function inputDecimal() {
  if (!currentInput.includes(".")) {
    currentInput += ".";
    updateDisplay();
  }
}

function clearDisplay() {
  currentInput = "0";
  previousInput = "";
  operator = "";
  isNegative = false;
  updateDisplay();
}

function inputOperator(op) {
  if (!operator) {
    previousInput = (isNegative ? "-" : "") + currentInput;
    currentInput = "0";
    isNegative = false;
  }
  operator = op;
}

function toggleNegative() {
  isNegative = !isNegative;
  updateDisplay();
}

function calculate() {
  const operations = {
    "+": (a, b) => a + b,
    "-": (a, b) => a - b,
    "*": (a, b) => a * b,
    "/": (a, b) => a / b,
    "%": (a, b) => a % b,
    "^": (a, b) => Math.pow(a, b),
  };

  const prev = parseFloat(previousInput);
  const current = parseFloat(currentInput);
  currentInput = operations[operator](prev, current).toString();
  operator = "";
  previousInput = "";
  isNegative = false;
  updateDisplay();
}

// fungsi untuk handle input keyboard
document.addEventListener("keydown", (event) => {
  if (!isNaN(event.key)) {
    inputNumber(event.key);
  } else if (["+", "-", "*", "/", "%", "^"].includes(event.key)) {
    inputOperator(event.key);
  } else if (event.key === ".") {
    inputDecimal();
  } else if (event.key === "Enter" || event.key === "=") {
    calculate();
  } else if (event.key === "Backspace") {
    clearDisplay();
  } else if (event.key === "n") {
    // For toggling negative
    toggleNegative();
  }
});

// Tugas 2: To-Do List
let todos = JSON.parse(localStorage.getItem("todos")) || [];

function renderTodos() {
  const todoList = document.getElementById("todo-list");
  todoList.innerHTML = todos
    .map(
      (todo, index) => `
      <li class="mb-4 flex justify-between items-center p-4 bg-base-200 rounded-lg shadow-md">
        <span class="flex-1 text-lg">
          ${todo}
        </span>
        <input type="text" value="${todo}" class="input input-bordered w-full hidden"/>
        <button class="btn mr-2" onclick="toggleEdit(${index}, this)">
          <i class="fas fa-edit"></i>
        </button>
        <button class="btn" onclick="deleteTodo(${index})">
          <i class="fas fa-trash-alt"></i>
        </button>
      </li>
      `
    )
    .join("");
}

function addTodo() {
  const input = document.getElementById("todo-input");
  if (input.value) {
    todos.push(input.value);
    input.value = "";
    updateLocalStorage();
    renderTodos();
  }
}

function deleteTodo(index) {
  todos.splice(index, 1);
  updateLocalStorage();
  renderTodos();
}

function toggleEdit(index, button) {
  const listItem = button.closest("li");
  const displaySpan = listItem.querySelector("span");
  const editInput = listItem.querySelector("input");

  if (editInput.classList.contains("hidden")) {
    displaySpan.classList.add("hidden");
    editInput.classList.remove("hidden");
    button.textContent = "Save";
  } else {
    const newValue = editInput.value;
    todos[index] = newValue;
    updateLocalStorage();
    renderTodos();
  }
}

function updateLocalStorage() {
  localStorage.setItem("todos", JSON.stringify(todos));
}

document.addEventListener("DOMContentLoaded", renderTodos);

AOS.init();

// Codelab 1
function calculate() {
  let number1 = parseFloat(document.getElementById("number1").value);
  let number2 = parseFloat(document.getElementById("number2").value);

  let result = number1 + number2;

  document.getElementById("result").value = result;
}

function resetCalculator() {
  document.getElementById("calculator-form").reset();
  document.getElementById("result").value = "";
}

// Codelab 2
function validateForm() {
  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let phone = document.getElementById("phone").value.trim();
  let service = document.getElementById("service").value.trim();
  let message = document.getElementById("message").value.trim();

  if (
    name === "" ||
    email === "" ||
    phone === "" ||
    service === "" ||
    message === ""
  ) {
    window.alert("Semua data harus diisi.");
  } else {
    window.alert("Form terkirim!");
  }
}

tailwind.config = {
  theme: {
    extend: {
      colors: {
        clifford: "#da373d",
      },
    },
  },
};

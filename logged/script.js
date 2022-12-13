let passInput = document.querySelector(".pass-input");
let passVisibility = document.querySelector(".view-pass");

passInput.addEventListener("keyup", function () {
  passInputLength = passInput.value.length;
  if (passInputLength == 0) {
    passVisibility.style.display = "none";
  } else {
    passVisibility.style.display = "block";
  }
});

passVisibility.addEventListener("mousedown", function () {
  passInputType = passInput.getAttribute("type");
  if (passInputType == "password") {
    passInput.setAttribute("type", "text");
    passVisibility.setAttribute("src", "assets/img/hidden.png");
  } else {
    passInput.setAttribute("type", "password");
    passVisibility.setAttribute("src", "assets/img/view.png");
  }
});
const form = document.getElementById("form");
const email = document.getElementById("email");
const password = document.getElementById("password");
// const password2 = document.getElementById("password2");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  checkInputs();
});

function checkInputs() {
  // // trim to remove the whitespaces
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    // const password2Value = password2.value.trim();

    if (emailValue === "") {
        setErrorFor(email, "Email tidak boleh kosong");
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, "Email tidak valid");
    } else {
        setSuccessFor(email);
    }

    if (passwordValue === "") {
        setErrorFor(password, "Password tidak boleh kosong");
    } else {
        setSuccessFor(password);
    }

    if (passwordValue.length < 6) {
        setErrorFor(password, "Password minimal 6 digit");
    }

}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector("small");
    formControl.className = "form-control error";
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = "form-control success";
}

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

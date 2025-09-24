const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

// Toggle between sign-in and sign-up
sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});
sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

/* -----------------------
   LOGIN VALIDATION
------------------------ */
const loginForm = document.getElementById("loginForm");
loginForm.addEventListener("submit", (e) => {
  const username = loginForm.username.value.trim();
  const password = loginForm.password.value.trim();

  if (username === "" || password === "") {
    alert("Please fill in both username and password.");
    e.preventDefault();
  }
});

/* -----------------------
   REGISTRATION VALIDATION
------------------------ */
const registerForm = document.getElementById("registerForm");
const passwordField = registerForm.password;
const confirmField = registerForm.confirm_password;

registerForm.addEventListener("submit", (e) => {
  const fullname = registerForm.fullname.value.trim();
  const email = registerForm.email.value.trim();
  const username = registerForm.username.value.trim();
  const password = passwordField.value.trim();
  const confirm = confirmField.value.trim();
  const gender = registerForm.gender.value;

  // Check required fields
  if (!fullname || !email || !username || !password || !confirm || !gender || !registerForm.country.value) {
    alert("Please fill in all required fields.");
    e.preventDefault();
    return;
  }

  // Check password match
  if (password !== confirm) {
    alert("Passwords do not match.");
    e.preventDefault();
    return;
  }

  // Optional: validate email format
  const emailRegex = /^\S+@\S+\.\S+$/;
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address.");
    e.preventDefault();
    return;
  }
});

/* -----------------------
   REAL-TIME PASSWORD MATCH
------------------------ */
confirmField.addEventListener("input", () => {
  if (confirmField.value !== passwordField.value) {
    confirmField.setCustomValidity("Passwords do not match");
  } else {
    confirmField.setCustomValidity("");
  }
});

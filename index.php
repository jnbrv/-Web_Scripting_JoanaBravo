<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Sign in / Sign up Form</title>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <!-- LOGIN FORM -->
        <form action="process.php" method="POST" id="loginForm" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <input type="submit" name="login" value="Submit" class="btn solid" /> 
        </form>

        <!-- REGISTER FORM -->
        <form action="process.php" method="POST" id="registerForm" class="sign-up-form">
          <h2 class="title">Sign up</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Full Name" name="fullname" required />
          </div>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" required />
          </div>

          <div class="input-field">
            <i class="fas fa-user-circle"></i>
            <input type="text" placeholder="Username" name="username" required />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="confirm_password" required />
          </div>

          <div class="field-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="Male" required /> Male
            <input type="radio" name="gender" value="Female" /> Female
            <input type="radio" name="gender" value="Other" /> Other
          </div>

          <div class="field-group">
            <label>Hobbies:</label>
            <input type="checkbox" name="hobbies[]" value="Reading" /> Reading
            <input type="checkbox" name="hobbies[]" value="Sports" /> Sports
            <input type="checkbox" name="hobbies[]" value="Music" /> Music
          </div>

          <div class="field-group">
            <label>Country:</label>
            <select name="country" required>
              <option value="">--Select Country--</option>
              <option value="USA">USA</option>
              <option value="UK">UK</option>
              <option value="Canada">Canada</option>
              <option value="India">India</option>
              <option value="Philippines">Philippines</option>
            </select>
          </div>

          <br />
          <input type="submit" name="register" class="btn" value="Submit" />
        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Hi there!</h3>
          <p>Don't have an Account? Create Your Account Now!</p>
          <button class="btn transparent" id="sign-up-btn">Sign up</button>
        </div>
        <img src="University_of_Mindanao_Logo.png" class="image" alt="" />
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>Welcome Back!</h3>
          <p>Already have an account? Login here.</p>
          <button class="btn transparent" id="sign-in-btn">Sign in</button>
        </div>
        <img src="SignUp.png" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="validate.js"></script>
</body>
</html>

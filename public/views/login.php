<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="public/css/styles.css">
  <title>SimpleBudget</title>
</head>
<body>
  <div class="container">
    <div class="left-container">
      <img src="public/img/Logo2.png" alt="Logo">
    </div>
    <div class="right-container">
      <div class="login-container">
        <div class="logo">
          <h1>SimpleBudget</h1>
        </div>
        <div class="login-panel">
          <form name="login" class="login" action="login_user" method="POST">
                  <input class="email input-style" name="email" id="email" type="text" placeholder="email" onblur="ValidateEmail(document.login.email)">
                  <input class="pwd input-style" id="password" name="password" type="password" placeholder="password" onblur="enableLogin()">
            <button class="submit login-button-style" type="submit" id="login-button" disabled="disabled">login</button>
              <button class="register login-button-style">
                  <a href="register">Join us!</a>
              </button>
              <div class="error-code">
                  <?php if(isset($message)) {
                      echo $message;
                  }
                  ?>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<script>
    let inputs = document.querySelectorAll('input');
    let buttonSend = document.getElementById('login-button');

    const enableRegisterButton = function () {
        let email = document.login.email;
        let password = document.login.password;
        alert(email, password);
    }

    let inputValidator = {
        "email": false,
        "password": false
    }

    inputs.forEach((input) => {
        input.addEventListener('input', () => {
            let name = event.target.getAttribute('name');
            inputValidator[name] = event.target.value.length > 0;

            let allTrue = Object.keys(inputValidator).every((item) => {
                return inputValidator[item] === true
            });

            buttonSend.disabled = !allTrue;
        })
    })

    function ValidateEmail(inputText)
    {
        const mailFormat = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.value.match(mailFormat))
        {
            enableLogin();
            document.login.email.focus();
            return true;
        }
        else
        {
            document.getElementById('email').value = ''
            alert("You have entered an invalid email address!");
            document.login.email.focus();
            return false;
        }
    }

    function enableLogin(){
        document.getElementById("login-button").disabled = !(document.forms["login"]["email"].value !== "" && document.forms["login"]["password"].value !== "");
    }
</script>
</body>
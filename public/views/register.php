<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="../css/styles.css">
  <title>SimpleBudget</title>
</head>
<body>
  <div class="container">
    <div class="left-container">
      <img src="../img/Logo2.png">
    </div>
    <div class="right-container">
      <div class="login-container">
        <div class="logo">
          <h1>SimpleBudget</h1>
        </div>
        <div class="login-panel">
          <form class="register" name="register" action="register" method="POST">
            <input class="email input-style" name="email" type="text" placeholder="email" onblur="ValidateEmail(document.register.email)">
            <input class="username input-style" name="username" type="text" placeholder="username">
            <input class="pwd input-style" id="pwd" name="password" type="password" placeholder="password" onblur="ValidatePassword(document.register.password)">
            <input class="rpwd input-style" name="repeat_password" type="password" placeholder="repeat password" onblur="ValidatePasswords(document.register.password, document.register.repeat_password)">
            <button class="submit login-button-style" id="joinUsButton" type="submit" disabled="disabled">join us!</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<script>

    let inputs = document.querySelectorAll('input');
    let buttonSend = document.getElementById('joinUsButton');

    const enableRegisterButton = function () {
        let email = document.register.email;
        let username = document.register.username;
        let password = document.register.password;
        let repeat_password = document.register.repeat_password;
        alert(email, username, password, repeat_password);
    }

    let inputValidator = {
        "username": false,
        "email": false,
        "password": false,
        "repeat_password": false
    }

    inputs.forEach((input) => {
        input.addEventListener('input', () => {
            let name = event.target.getAttribute('name');
            if (event.target.value.length > 0) {
                inputValidator[name] = true;
            } else {
                inputValidator[name] = false;
            };

            let allTrue = Object.keys(inputValidator).every((item) => {
                return inputValidator[item] === true
            });

            if (allTrue) {
                buttonSend.disabled = false;
            } else {
                buttonSend.disabled = true;
            }
        })
    })


    function ValidateEmail(inputText)
    {
        const mailFormat = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
        if(!inputText.value.match(mailFormat))
        {
            inputText.value = ''
            alert("You have entered an invalid email address!");
        }
    }

    function ValidatePassword(pwd) {
        const mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        const enoughRegex = new RegExp("(?=.{8,}).*", "g");
        if (pwd.value.length === 0) {
            pwd.value = ''
            alert('Type Password');
            return;
        } else if (!enoughRegex.test(pwd.value)) {
            pwd.value = ''
            alert('Password is too short');
            return;
        } else if (!mediumRegex.test(pwd.value)) {
            pwd.value = ''
            alert('Password is too weak');
        }
    }

    function ValidatePasswords(pwd, rpwd) {
        if (!(pwd.value === rpwd.value)) {
            alert('Password is too weak');
            rpwd.value = "";
        }
    }

</script>
</body>
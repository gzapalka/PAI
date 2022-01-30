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
          <form class="register" action="register" method="POST">
            <input class="email input-style" name="email" type="text" placeholder="email">
            <input class="username input-style" name="username" type="text" placeholder="username">
            <input class="pwd input-style" name="password" type="text" placeholder="password">
            <input class="rpwd input-style" name="repeat password" type="text" placeholder="repeat password">
            <button class="submit login-button-style" type="submit">join us!</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<script>
    function ValidateEmail(inputText)
    {
        const mailFormat = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.value.match(mailFormat))
        {
            document.login.email.focus();
            return true;
        }
        else
        {
            alert("You have entered an invalid email address!");
            document.login.email.focus();
            return false;
        }
    }

    function passwordChanged(inputText) {
        const strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        const mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        const enoughRegex = new RegExp("(?=.{8,}).*", "g");
        const pwd = document.getElementById("password");
        if (pwd.value.length === 0) {
            strength.innerHTML = 'Type Password';
        } else if (false === enoughRegex.test(pwd.value)) {
            strength.innerHTML = 'More Characters';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:green">Strong!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:orange">Medium!</span>';
        } else {
            strength.innerHTML = '<span style="color:red">Weak!</span>';
        }
    }

</script>
</body>
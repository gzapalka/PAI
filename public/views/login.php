<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="../css/styles.css">
  <title>SimpleBudget</title>
</head>
<body onload='login.email.focus()'>
  <div class="container">
    <div class="left-container">
      <img src="../img/Logo2.png" alt="Logo">
    </div>
    <div class="right-container">
      <div class="login-container">
        <div class="logo">
          <h1>SimpleBudget</h1>
        </div>
        <div class="login-panel">
          <form name="login" class="login" action="login" method="POST">
              <label>
                  <input class="email input-style" name="email" id="email" type="text" placeholder="email" onblur="ValidateEmail(document.login.email)">
              </label>
                  <input class="pwd input-style" id="password" name="password" type="password" placeholder="password" onblur="enableLogin()">
            <button class="submit login-button-style" type="submit" id="login-button">login</button>
            <button class="register login-button-style" type="">join us!</button>
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
        if (document.forms["login"]["email"].value != "" && document.forms["login"]["password"].value != "") {
            document.getElementById("login-button").disabled = false;
        } else {
            document.getElementById("login-button").disabled = true;
        }
    }
</script>
</body>
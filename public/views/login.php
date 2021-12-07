<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="public/css/styles.css">
    <title>SimpleBudget</title>
</head>
<body>
<div class="container">
    <div class="left-container">
        <img src="public/img/Logo2.png" alt="">
    </div>
    <div class="right-container">
        <div class="login-container">
            <div class="logo">
                <h1>SimpleBudget</h1>
            </div>
            <div class="login-panel">
                <form class="login" action="login_user" method="POST">

                    <input class="email input-style" name="email" type="text" placeholder="email">
                    <input class="pwd input-style" name="password" type="password" placeholder="password">
                    <button class="submit login-button-style" type="submit">login</button>
<!--                    <button class="register login-button-style" type="submit" action="register_user" method="POST">join us!</button>-->
                    <a class="login-button-style" href="register">join us!</a>
                    <div class="forgot">
                        <a href="#">Forgot password?</a>
                    </div>
                </form>

            </div>
            <div class="message">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="public/css/budgets.css">
    <title>SimpleBudget</title>
</head>
<body>
<header class="website">
    <h1>Simple Budget</h1>
    <h1>
        <div class="error-code">
            <?php if (isset($message)) {
                echo $message;
            }
            ?>
        </div>
    </h1>
    <button class="logout_button" type="submit">
        <a href="log_out">Log out</a>
    </button>
</header>
<header class="mobile_header">
    <h1>Simple Budget</h1>
    <button class="logout_button" type="submit">
        <a href="log_out">Log out</a>
    </button>
</header>
<content>
    <bookmarks class="website">
        <bookmark style="background-color:#E9E4E4;">
            <button class="bookmark_btn">
                <a href="budget">Budget</a>
            </button>
        </bookmark>
        <bookmark style="background-color:#faf4f4;">
            <button class="bookmark_btn">
                <a href="statistic">Statistic</a>
            </button>
        </bookmark>
        <bookmark style="background-color:#F3E6D1;">
            <button class="bookmark_btn">
                <a href="transaction">Transaction</a>
            </button>
        </bookmark>
        <bookmark style="background-color:#D5E6F2;">
            <button class="bookmark_btn" onclick="submitDeleteAccount()">
                Delete Account
            </button>
        </bookmark>
    </bookmarks>
    <bookmarks class="bookmarks_mobile">
        <bookmark style="background-color:#E9E4E4;">
            <button class="bookmark_btn">
                <a href="transaction">$</a>
            </button>
        </bookmark>
        <bookmark style="background-color:#faf4f4;">
            <button class="bookmark_btn">%</button>
        </bookmark>
        <bookmark style="background-color:#F3E6D1;">
            <button class="bookmark_btn">
                <a href="transaction">+/-</a>
            </button>
        </bookmark>
        <bookmark style="background-color:#D5E6F2;">
            <button class="bookmark_btn" onclick="submitDeleteAccount()">
                Del
            </button>
        </bookmark>
    </bookmarks>

    <div class="statistic_container">
        <div class="form-popup" id="deleteAccountForm">
            <form class="form-popup" id="deleteAccountForm" action="delete_account" method="POST">
                <h1 style="color: #244564; height: 100%">Are you sure?</h1>
                <button type="submit" class="submit_btn">Delete account</button>
                <button type="button" class="btn cancel" onclick="closeSubmitDeleteAccount()">Close</button>
            </form>
        </div>
        <div class="statistic_left_container">
            <div class="statistic">
                <img class="statistic_img" src="data:image/png;base64,<?php if(isset($I_VS_E)) echo(base64_encode($I_VS_E)); ?>" />
            </div>
            <div class="statistic">
                <img class="statistic_img" src="data:image/png;base64,<?php if(isset($E_PER_C)) echo(base64_encode($E_PER_C)); ?>" />
            </div>
        </div>
        <div class="statistic_right_container">
            <div class="statistic">
                <img class="statistic_img" src="data:image/png;base64,<?php if(isset($E_PER_M)) echo(base64_encode($E_PER_M)); ?>" />
            </div>
        </div>
        <div class="statistic_mobile">
            <div class="statistic">
                <img class="statistic_img" src="data:image/png;base64,<?php if(isset($I_VS_E)) echo(base64_encode($I_VS_E)); ?>" />
            </div>
            <div class="statistic">
                <img class="statistic_img" src="data:image/png;base64,<?php if(isset($E_PER_C)) echo(base64_encode($E_PER_C)); ?>" />
            </div>
            <div class="statistic">
                <img class="statistic_img" src="data:image/png;base64,<?php if(isset($E_PER_M)) echo(base64_encode($E_PER_M)); ?>" />
            </div>
        </div>
    </div>
</content>
<footer class="website">
    <money_to_assign>
        <h1>Money: </h1>
        <?php
        if(isset($moneyToSpent)){
            echo '<h1 style="color: #555555">'.$moneyToSpent.'</h1>';
        }
        ?>
        <h1>zł</h1>
    </money_to_assign>
    <h1></h1>
    <contact_info>
        <h2>About us</h2>
        <div class="social_media">
            <img class="social_media_img" src="public/img/fb.png" alt="FB">
            <h2>FB</h2>
        </div class="social_media">
        <h2>123 street City, 09-732</h2>
        <h2>Contact</h2>
        <div class="social_media">
            <img class="social_media_img" src="public/img/ig.png" alt="IG">
            <h2>IG</h2>
        </div>
        <h2>simple@mail.com</h2>
    </contact_info>
</footer>
<footer class="footer_mobile">
    <money_to_assign>
        <h1>Money: </h1>
        <?php
        if(isset($moneyToSpent)){
            echo '<h1 style="color: #555555">'.$moneyToSpent.'</h1>';
        }
        ?>
        <h1>zł</h1>
    </money_to_assign>
</footer>
<script>
    function submitDeleteAccount() {
        document.getElementById("deleteAccountForm").style.display = "block";
    }

    function closeSubmitDeleteAccount() {
        document.getElementById("deleteAccountForm").style.display = "none";
    }
</script>
</body>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/budgets.css">
    <title>SimpleBudget</title>
</head>
<body style="overflow: auto">
<header>
    <h1>Simple Budget</h1>
    <h1></h1>
    <button class="logout_button">Log out</button>
</header>
<content>
    <bookmarks class="website">
        <bookmark style="background-color:#E9E4E4;">
            <button class="bookmark_btn">
                <a href="transaction">Budget</a>
            </button>
        </bookmark>
        <bookmark style="background-color:cornsilk;">
            <button class="bookmark_btn">Statistic</button>
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
        <bookmark style="background-color:cornsilk;">
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
            <form action="/action_page.php" class="delete_account_form-container">
                <h1 style="color: #244564; height: 100%">Are you sure?</h1>
                <button type="submit" class="submit_btn">Delete account</button>
                <button type="button" class="btn cancel" onclick="closeSubmitDeleteAccount()">Close</button>
            </form>
        </div>
        <div class="statistic_left_container">
            <div class="statistic">
                <img class="statistic_img" src="../img/expenditures_income.jpg" alt="EI">
            </div>
            <div class="statistic">
                <img class="statistic_img" src="../img/expenditures_income.jpg" alt="EI">
            </div>
        </div>
        <div class="statistic_right_container">
            <div class="statistic">
                <img class="statistic_img" src="../img/months.jpg" alt="EI">
            </div>
        </div>
        <div class="statistic_mobile">
            <div class="statistic">
                <img class="statistic_img" src="../img/expenditures_income.jpg" alt="EI">
            </div>
            <div class="statistic">
                <img class="statistic_img" src="../img/expenditures_income.jpg" alt="EI">
            </div>
            <div class="statistic">
                <img class="statistic_img" src="../img/months.jpg" alt="EI">
            </div>
        </div>
    </div>
</content>
<footer class = "website">
    <money_to_assign>
        <h1>Money: </h1>
        <h1 style="color: #555555">0.00</h1>
        <h1>zł</h1>
    </money_to_assign>
    <h1></h1>
    <contact_info>
        <h2>About us</h2>
        <div class="social_media">
            <img class="social_media_img" src="../img/fb.png" alt="FB">
            <h2>FB</h2>
        </div class="social_media">
        <h2>123 street City, 09-732</h2>
        <h2>Contact</h2>
        <div class="social_media">
            <img class="social_media_img" src="../img/ig.png" alt="IG">
            <h2>IG</h2>
        </div>
        <h2>simple@mail.com</h2>
    </contact_info>
</footer>
<footer class = "footer_mobile">
    <money_to_assign>
        <h1>Money: </h1>
        <h1 style="color: #555555">0.00</h1>
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
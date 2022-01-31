<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="public/css/budgets.css">
    <title>SimpleBudget</title>
</head>
<body>
<header>
    <h1>Simple Budget</h1>
    <h1></h1>
    <button class="logout_button">Log out</button>
</header>
<content>
    <bookmarks>
        <bookmark href="#" style="background-color:#E9E4E4;">Budget</bookmark>
        <bookmark href="#" style="background-color:cornsilk;">Statistic</bookmark>
        <bookmark href="#" style="background-color:#F3E6D1;">Transaction</bookmark>
        <bookmark style="background-color:#D5E6F2;">
            <button class="delete_account_btn" onclick="submitDeleteAccount()">
                Delete Account
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
                <div class="statistic_img">
                    <img src="public/img/expenditures_income.jpg" alt="EI">
                </div>
            </div>
            <div class="statistic">
                <div class="statistic_img">
                    <img src="public/img/expenditures_income.jpg" alt="EI">
                </div>
            </div>
        </div>
        <div class="statistic_right_container">
            <div class="statistic">
                <div class="statistic_img">
                    <img src="public/img/months.jpg" alt="EI">
                </div>
            </div>
        </div>
    </div>
</content>
<footer>
    <money_to_assign>
        <h1>Money to assign:</h1>
        <amount>0.00</amount>
        <h1>zł</h1>
    </money_to_assign>
    <h1></h1>
    <contact_info>
        <h2>About us</h2>
        <social_media>
            <img src="public/img/fb.png" alt="FB">
            <h2>Facebook</h2>
        </social_media>
        <h2>123 street City, 09-732</h2>
        <h2>Contact</h2>
        <social_media>
            <img src="public/img/ig.png" alt="IG">
            <h2>Instagram</h2>
        </social_media>
        <h2>+48 025 657 129</h2>
        <h2>Term & Policy</h2>
        <social_media>
            <img src="public/img/tt.png" alt="TT">
            <h2>Twitter</h2>
        </social_media>
        <h2>simplebudget@mail.com</h2>
    </contact_info>
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
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="public/css/budgets.css">
    <title>SimpleBudget</title>
</head>
<body>
<header class="website">
    <h1>Simple Budget</h1>
    <h1></h1>
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
    <div class="budget_container">
        <div class="break"></div>
        <div class="form-popup" id="deleteAccountForm">
            <form action="delete_account" method="POST" class="delete_account_form-container">
                <h1 style="color: #244564; height: 0.00%">Are you sure?</h1>
                <button type="submit" class="submit_btn">Delete account</button>
                <button type="button" class="btn cancel" onclick="closeSubmitDeleteAccount()">Close</button>
            </form>
        </div>
        <table class="input_table">
            <thead>
            <tr>
                <th class="category_name">Category</th>
                <th class="category_name">Assigned</th>
                <th class="category_name">Spent</th>
                <th class="category_name">Left</th>
                <th class="category_name">%</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="5">
                    <table class="subtable">
                        <thead>
                        <tr>
                            <th colspan="5" class="category_name">Home</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($homeCategoryBudgets)) {
                            foreach ($homeCategoryBudgets as $budget) {
                                echo '<tr>';
                                foreach ($budget as $s) {
                                    echo '<td class="category_name">'.$s.'</td>';
                                }
                                echo '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </td>
            <tr>
                <td colspan="5">
                    <table class="subtable">
                        <thead>
                        <tr>
                            <th colspan="5" class="category_name">Transport</th>
                        </tr>
                        </thead>
                        <?php
                        if (isset($transportCategoryBudgets)) {
                            foreach ($transportCategoryBudgets as $budget) {
                                echo '<tr>';
                                foreach ($budget as $s) {
                                    echo '<td class="category_name">'.$s.'</td>';
                                }
                                echo '</tr>';
                            }
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="subtable">
                        <thead>
                        <tr>
                            <th colspan="5" class="category_name">Just for fun</th>
                        </tr>
                        </thead>
                        <?php
                        if (isset($funCategoryBudgets)) {
                            foreach ($funCategoryBudgets as $budget) {
                                echo '<tr>';
                                foreach ($budget as $s) {
                                    echo '<td class="category_name">'.$s.'</td>';
                                }
                                echo '</tr>';
                            }
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="subtable">
                        <thead>
                        <tr>
                            <th colspan="5" class="category_name">Education</th>
                        </tr>
                        </thead>
                        <?php
                        if (isset($educationCategoryBudgets)) {
                            foreach ($educationCategoryBudgets as $budget) {
                                echo '<tr>';
                                foreach ($budget as $s) {
                                    echo '<td class="category_name">'.$s.'</td>';
                                }
                                echo '</tr>';
                            }
                        }
                        ?>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
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
        <h1>About us</h1>
        <div class="social_media">
            <img src="public/img/fb.png" alt="FB">
            <h1>FB</h1>
        </div class="social_media">
        <h1>123 street City, 09-732</h1>
        <h1>Contact</h1>
        <div class="social_media">
            <img src="public/img/ig.png" alt="IG">
            <h1>IG</h1>
        </div>
        <h1>simple@mail.com</h1>
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
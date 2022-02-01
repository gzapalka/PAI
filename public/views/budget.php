<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="public/css/budgets.css">
    <title>SimpleBudget</title>
</head>
<body>
<header class="website">
    <h1>Simple Budget</h1>
    <h1></h1>
    <button class="logout_button">Log out</button>
</header>
<header class="mobile_header">
    <h1>Simple Budget</h1>
    <button class="logout_button" type="submit">Log out</button>
</header>
<content>
    <bookmarks class="website">
        <bookmark style="background-color:#E9E4E4;">
            <button class="bookmark_btn">
                <a href="budget">Budget</a>
            </button>
        </bookmark>
        <bookmark style="background-color:cornsilk;">
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
    <div class="bookmark_container">
        <div class="break"></div>
        <div class="form-popup" id="deleteAccountForm">
            <form action="delete_account" method="POST" class="delete_account_form-container">
                <h1 style="color: #244564; height: 0.00%">Are you sure?</h1>
                <button type="submit" class="submit_btn">Delete account</button>
                <button type="button" class="btn cancel" onclick="closeSubmitDeleteAccount()">Close</button>
            </form>
        </div>
        <table class="budget_table">
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
                            <th colspan="5" class="subcategory_name">Home</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="sub_subcategory">Rent</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        <tr>
                            <td class="sub_subcategory">Water</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        <tr>
                            <td class="sub_subcategory">Energy</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        <tr>
                        <tr>
                            <td class="sub_subcategory">Groceries</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        <tr>
                            <td class="sub_subcategory">Internet</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            <tr>
                <td colspan="5">
                    <table class="subtable">
                        <thead>
                        <tr>
                            <th colspan="5" class="subcategory_name">Transport</th>
                        </tr>
                        </thead>
                        <tr>
                            <td class="sub_subcategory">Car</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        <tr>
                            <td class="sub_subcategory">Fuel</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        <tr>
                            <td class="sub_subcategory">Bus Ticket</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        <tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="subtable">
                        <thead>
                        <tr>
                            <th colspan="5" class="subcategory_name">Just for fun</th>
                        </tr>
                        </thead>
                        <tr>
                            <td class="sub_subcategory">Netflix</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        <tr>
                            <td class="sub_subcategory">Dinning Out</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
                        <tr>
                            <td class="sub_subcategory">Clubbing</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        <tr>
                        <tr>
                            <td class="sub_subcategory">Gaming</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        <tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="subtable">
                        <thead>
                        <tr>
                            <th colspan="5" class="subcategory_name">Education</th>
                        </tr>
                        </thead>
                        <tr>
                            <td class="sub_subcategory">School Fees</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                            <td class="sub_subcategory">0.00</td>
                        </tr>
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
        <h1 style="color: #555555">0.00</h1>
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
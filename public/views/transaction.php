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
    <button class="logout_button">Log out</button>
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
    <div class="transaction_container">
        <button class="add_txn_btn" onclick="openAddTxnForm()">
            <h1>Add</h1>
        </button>
        <div class="form-popup" id="deleteAccountForm">
            <form action="/action_page.php" class="delete_account_form-container">
                <h1 style="color: #244564; height: 100%">Are you sure?</h1>
                <button type="submit" class="submit_btn">Delete account</button>
                <button type="button" class="btn cancel" onclick="closeSubmitDeleteAccount()">Close</button>
            </form>
        </div>
        <div class="form-popup" id="addTxnForm">
            <form action="/action_page.php" class="add_txn_form-container">

                <label for="Category"><h3 style="text-align: left">Category</h3></label>
                <label>
                    <input type="text" placeholder="Enter Category" name="Category">
                </label>

                <label for="Amount"><h3 style="text-align: left">Amount</h3></label>
                <label>
                    <input type="text" placeholder="Enter Amount" name="Amount">
                </label>

                <label for="Date"><h3 style="text-align: left">Date</h3></label>
                <label>
                    <input type="date" placeholder="Enter Date" name="Date">
                </label>

                <label for="Comment"><h3 style="text-align: left">Comment</h3></label>
                <label>
                    <input type="text" placeholder="Enter Comment" name="Comment">
                </label>

                <button type="submit" class="submit_btn">Add transaction</button>
                <button type="button" class="btn cancel" onclick="closeAddTxnForm()">Close</button>
            </form>
        </div>
        <div class="form-popup" id="editTxnForm">
            <form action="/action_page.php" class="edit_txn_form-container">
                <label for="Category"><h3 style="text-align: left">Category</h3></label>
                <label>
                    <input type="text" placeholder="Enter Category" name="Category">
                </label>

                <label for="Amount"><h3 style="text-align: left">Amount</h3></label>
                <label>
                    <input type="text" placeholder="Enter Amount" name="Amount">
                </label>

                <label for="Date"><h3 style="text-align: left">Date</h3></label>
                <label>
                    <input type="date" placeholder="Enter Date" name="Date">
                </label>

                <label for="Comment"><h3 style="text-align: left">Comment</h3></label>
                <label>
                    <input type="text" placeholder="Enter Comment" name="Comment">
                </label>

                <button type="submit" class="submit_btn">Submit changes</button>
                <button type="submit" class="btn delete">Delete transaction</button>
                <button type="button" class="btn cancel" onclick="closeEditTxnForm()">Close</button>
            </form>
        </div>
        <table class="transaction_table">
            <thead>
            <tr>
                <th class="category_name">Category</th>
                <th class="category_name">Amount</th>
                <th class="category_name">Date</th>
                <th class="category_name">Comment</th>
                <th class="category_name"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="sub_subcategory">Car maintenance</td>
                <td class="sub_subcategory">1200.00</td>
                <td class="sub_subcategory">2021-6-12</td>
                <td class="sub_subcategory">Check Engine</td>
                <td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory">Fuel</td>
                <td class="sub_subcategory">650.00</td>
                <td class="sub_subcategory">2021-6-11</td>
                <td class="sub_subcategory">Fill up</td>
                <td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory">Bus Ticket</td>
                <td class="sub_subcategory">650.00</td>
                <td class="sub_subcategory">2021-6-12</td>
                <td class="sub_subcategory">Monthly Ticket</td>
                <td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>

                <td class="sub_subcategory">Netflix</td>
                <td class="sub_subcategory">1200.00</td>
                <td class="sub_subcategory">2021-6-12</td>
                <td class="sub_subcategory">Subscription</td>
                <td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory">Dinning Out</td>
                <td class="sub_subcategory">650.00</td>
                <td class="sub_subcategory">2021-6-12</td>
                <td class="sub_subcategory">Pizza on date</td>
                <td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory">Clubbing</td>
                <td class="sub_subcategory">650.00</td>
                <td class="sub_subcategory">2021-6-12</td>
                <td class="sub_subcategory">Drink</td>
                <td class="sub_subcategory">
                    <button class="edit_button">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory">Gaming</td>
                <td class="sub_subcategory">650.00</td>
                <td class="sub_subcategory">2021-6-12</td>
                <td class="sub_subcategory">Witcher 3</td>
                <td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory">School Fees</td>
                <td class="sub_subcategory">1200.00</td>
                <td class="sub_subcategory">2021-6-12</td>
                <td class="sub_subcategory">French Lessons</td>
                <td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
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
    function openEditTxnForm() {
        document.getElementById("editTxnForm").style.display = "block";
    }

    function openAddTxnForm() {
        document.getElementById("addTxnForm").style.display = "block";
    }

    function closeEditTxnForm() {
        document.getElementById("editTxnForm").style.display = "none";
    }

    function closeAddTxnForm() {
        document.getElementById("addTxnForm").style.display = "none";
    }

    function submitDeleteAccount() {
        document.getElementById("deleteAccountForm").style.display = "block";
    }

    function closeSubmitDeleteAccount() {
        document.getElementById("deleteAccountForm").style.display = "none";
    }
</script>
</body>
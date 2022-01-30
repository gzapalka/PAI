<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/budgets.css">
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
        <bookmark href="#" style="background-color: cornsilk;">Statistic</bookmark>
        <bookmark href="#" style="background-color:#F3E6D1;">Transaction</bookmark>
        <bookmark style="background-color:#D5E6F2;">
            <button class="delete_account_btn" onclick="submitDeleteAccount()">
                Delete Account
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
                    <input type="text" placeholder="Enter Date" name="Date">
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
                    <input type="text" placeholder="Enter Date" name="Date">
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
        <table class="budget_table">
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
                <td class="sub_subcategory_name">Car maintenance</td>
                <td class="sub_subcategory_assign">1200.00</td>
                <td class="sub_subcategory_spent">2021-6-12</td>
                <td class="sub_subcategory_left">Check Engine</td>
                <td>
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory_name">Fuel</td>
                <td class="sub_subcategory_assign">650.00</td>
                <td class="sub_subcategory_spent">2021-6-11</td>
                <td class="sub_subcategory_left">Fill up</td>
                <td>
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory_name">Bus Ticket</td>
                <td class="sub_subcategory_assign">650.00</td>
                <td class="sub_subcategory_spent">2021-6-12</td>
                <td class="sub_subcategory_left">Monthly Ticket</td>
                <td>
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>

                <td class="sub_subcategory_name">Netflix</td>
                <td class="sub_subcategory_assign">1200.00</td>
                <td class="sub_subcategory_spent">2021-6-12</td>
                <td class="sub_subcategory_left">Subscription</td>
                <td>
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory_name">Dinning Out</td>
                <td class="sub_subcategory_assign">650.00</td>
                <td class="sub_subcategory_spent">2021-6-12</td>
                <td class="sub_subcategory_left">Pizza on date</td>
                <td>
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory_name">Clubbing</td>
                <td class="sub_subcategory_assign">650.00</td>
                <td class="sub_subcategory_spent">2021-6-12</td>
                <td class="sub_subcategory_left">Drink</td>
                <td>
                    <button class="edit_button">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory_name">Gaming</td>
                <td class="sub_subcategory_assign">650.00</td>
                <td class="sub_subcategory_spent">2021-6-12</td>
                <td class="sub_subcategory_left">Witcher 3</td>
                <td>
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="sub_subcategory_name">School Fees</td>
                <td class="sub_subcategory_assign">1200.00</td>
                <td class="sub_subcategory_spent">2021-6-12</td>
                <td class="sub_subcategory_left">French Lessons</td>
                <td>
                    <button class="edit_button" onclick="openEditTxnForm()">
                        Edit
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
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
            <social_media_logo>
                <img src="../img/fb.png" alt="FB">
            </social_media_logo>
            <h2>Facebook</h2>
        </social_media>
        <h2>123 street City, 09-732</h2>
        <h2>Contact</h2>
        <social_media>
            <social_media_logo>
                <img src="../img/ig.png" alt="IG">
            </social_media_logo>
            <h2>Instagram</h2>
        </social_media>
        <h2>+48 025 657 129</h2>
        <h2>Term & Policy</h2>
        <social_media>
            <social_media_logo>
                <img src="../img/tt.png" alt="TT">
            </social_media_logo>
            <h2>Twitter</h2>
        </social_media>
        <h2>simplebudget@mail.com</h2>
    </contact_info>
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
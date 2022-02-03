<!DOCTYPE html>
<head>
    <script src="public/js/search.js" defer></script>
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
    <div class="transaction_container">
        <button class="add_txn_btn" onclick="openAddTxnForm()">
            <h1>Add</h1>
        </button>
        <div class="form-popup" id="deleteAccountForm">
            <form action="delete_account" method="POST" class="delete_account_form-container">
                <h1 style="color: #244564; height: 0.00%">Are you sure?</h1>
                <button type="submit" class="submit_btn">Delete account</button>
                <button type="button" class="btn cancel" onclick="closeSubmitDeleteAccount()">Close</button>
            </form>
        </div>
        <div class="form-popup" id="addTxnForm">
            <form action="add_txn" class="add_txn_form-container" method="POST">

                <label for="addTxnCategory"><h3 style="text-align: left">Category</h3></label>
                <label>
                    <textarea class="inputCategory" id="addTxnCategoryDropdown" name="category"
                              placeholder="Select from dropdown menu ->"></textarea>
                    <select id="dropdown" class="category_dropdown">
                        <option value="Rent">Rent</option>
                        <option value="Water">Water</option>
                        <option value="Energy">Energy</option>
                        <option value="Groceries">Groceries</option>
                        <option value="Internet">Internet</option>
                        <option value="Car">Car</option>
                        <option value="Bus Tickets">Bus Tickets</option>
                        <option value="Fuel">Fuel</option>
                        <option value="Netflix">Netflix</option>
                        <option value="Dinning_out">Dinning_out</option>
                        <option value="Clubbing">Clubbing</option>
                        <option value="Gaming">Gaming</option>
                        <option value="School Fees">School Fees</option>
                    </select>

                </label>

                <label for="Amount"><h3 style="text-align: left">Amount</h3></label>
                <label>
                    <input id="add_amount" type="number" placeholder="0.00" name="amount">
                </label>

                <label for="Date"><h3 style="text-align: left">Date</h3></label>
                <label>
                    <input type="date" placeholder="Enter Date" name="date">
                </label>

                <label for="Comment"><h3 style="text-align: left">Comment</h3></label>
                <label>
                    <input type="text" placeholder="Enter Comment" name="comment">
                </label>

                <button type="submit" class="submit_btn">Add transaction</button>
                <button type="button" class="btn cancel" onclick="closeAddTxnForm()">Close</button>
            </form>
        </div>
        <div class="form-popup" id="editTxnForm">
            <form id="edit_txn" action="edit_txn" class="edit_txn_form-container" method="post">
                <label for="Category"><h3 style="text-align: left">Category</h3></label>
                <label>
                    <textarea class="inputCategory" id="editTxnCategory" name="category"
                              placeholder="Select from dropdown menu ->"></textarea>
                    <select id="editTxnCategoryDropdown" class="category_dropdown">
                        <option value="Rent">Rent</option>
                        <option value="Water">Water</option>
                        <option value="Energy">Energy</option>
                        <option value="Groceries">Groceries</option>
                        <option value="Internet">Internet</option>
                        <option value="Car">Car</option>
                        <option value="Bus Tickets">Bus Tickets</option>
                        <option value="Fuel">Fuel</option>
                        <option value="Netflix">Netflix</option>
                        <option value="Dinning_out">Dinning_out</option>
                        <option value="Clubbing">Clubbing</option>
                        <option value="Gaming">Gaming</option>
                        <option value="School Fees">School Fees</option>
                    </select>
                </label>

                <label for="Amount"><h3 style="text-align: left">Amount</h3></label>
                <label>
                    <input id="edit_Amount" type="number" placeholder="Enter Amount" name="amount">
                </label>

                <label for="Date"><h3 style="text-align: left">Date</h3></label>
                <label>
                    <input type="date" placeholder="Enter Date" name="date">
                </label>

                <label for="Comment"><h3 style="text-align: left">Comment</h3></label>
                <label>
                    <input type="text" placeholder="Enter Comment" name="comment">
                </label>
                <label>
                    <input type="text" id="edit_txn_id" name="id" display="none">
                </label>

                <button type="submit" class="submit_btn">Submit changes</button>
                <button type="submit" class="btn delete" onclick="deleteTxn()">Delete transaction</button>
                <a href="#" display="none" id="delete_txn_link"></a>
                <button type="button" class="btn cancel" onclick="closeEditTxnForm()">Close</button>
            </form>
        </div>
        <div class="search-bar">
            <input placeholder="search transaction">
        </div>
        <table class="input_table">
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
            <?php
            if (isset($transactions)) {
                foreach ($transactions as $txnDate) {
                    echo '<tr>';
                    echo '<td class="sub_subcategory" id="category">' . $txnDate[1] . '</td>';
                    echo '<td class="sub_subcategory" id="amount">' . $txnDate[2] . '</td>';
                    echo '<td class="sub_subcategory" id="date">' . $txnDate[3] . '</td>';
                    echo '<td class="sub_subcategory" id="comment">' . $txnDate[4] . '</td>';
                    echo '<td class="sub_subcategory">
                    <button class="edit_button" onclick="openEditTxnForm(' . $txnDate[0] . ')"> Edit</button>
                     </td></tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</content>
<footer class="website">
    <money_to_assign>
        <h1>Money: </h1>
        <?php
        if (isset($moneyToSpent)) {
            echo '<h1 style="color: #555555">' . $moneyToSpent . '</h1>';
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
        if (isset($moneyToSpent)) {
            echo '<h1 style="color: #555555">' . $moneyToSpent . '</h1>';
        }
        ?>
        <h1>zł</h1>
    </money_to_assign>
</footer>
<script>
    function openEditTxnForm(id) {
        document.getElementById("edit_txn_id").value = id;
        document.getElementById("edit_txn_id").style.display = "none";
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

    const editTxnCategory = document.getElementById('editTxnCategory');
    const editTxnCategoryDropdown = document.getElementById('editTxnCategoryDropdown');

    const addTxnCategory = document.getElementById('addTxnCategory');
    const addTxnCategoryDropdown = document.getElementById('addTxnCategoryDropdown');

    editTxnCategoryDropdown.onchange = function () {
        editTxnCategory.value = this.value;
        editTxnCategory.innerHTML = this.value;
    }
    addTxnCategoryDropdown.onchange = function () {
        addTxnCategory.value = this.value;
        addTxnCategory.innerHTML = this.value;
    }

    function deleteTxn() {
        document.getElementById("delete_txn_link").href = "delete_txn?id="
            + document.getElementById("edit_txn_id").value;
        document.getElementById("delete_txn_link").click();
        return false;
    }
</script>
</body>

<template id="project-template">
    <tr>
        <td class="sub_subcategory" id="category">category</td>
        <td class="sub_subcategory" id="amount">amount</td>
        <td class="sub_subcategory" id="date">date</td>
        <td class="sub_subcategory" id="comment">comment</td>
        <td class="sub_subcategory">
            <button class="edit_button"> Edit</button>
        </td>
    </tr>
</template>
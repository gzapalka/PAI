

const search = document.querySelector('input[placeholder="search transaction..."]');
const transactionContainer = document.querySelector(".input_table");

search.addEventListener("keyup", function (event) {

    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};
        console.log(JSON.stringify(data));
        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(function (response) {

            return response.json();
        }).then(function (transactions) {
            transactionContainer.innerHTML = "";
            loadTransactions(transactions)
        });
    }
}
    );

function loadTransactions(transactions) {

    transactions.forEach(txn => {
        console.log(txn);
        createTxn(txn);
    })
}

// function openEditTxnForm(id) {
//     document.getElementById("edit_txn_id").value = id;
//     document.getElementById("edit_txn_id").style.display = "none";
//     document.getElementById("editTxnForm").style.display = "block";
// }

function createTxn(txn) {
    const template = document.querySelector("#project-template");
    const clone = template.content.cloneNode(true);

    const categoryName = clone.getElementById("category");
    categoryName.innerHTML = txn['name'];
    const amount = clone.getElementById("amount");
    amount.innerHTML = txn['amount'];
    const date = clone.getElementById("date");
    date.innerHTML = txn['create_time'].replace('00:00:00', '');
    const comment = clone.getElementById("comment");
    comment.innerHTML = txn['comment'];
    const editBtn = clone.querySelector("button");
    editBtn.setAttribute('onclick', `openEditTxnForm(${txn['transaction_id']})`);

    transactionContainer.appendChild(clone);

}


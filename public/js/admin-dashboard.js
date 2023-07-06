
function getOrders() {
    fetch('http://localhost:5000/api/orders')
        .then(response => response.json())
        .then(data => {
            const menuContainer = document.getElementById("order-container");

            data = data.data;

            data.forEach(item => {
                const menuItem = document.createElement("div");
                menuItem.classList.add("order-item");

                const customerName = document.createElement("h4");
                customerName.textContent = "Customer Name: " + item.customer_name;

                const address = document.createElement("p");
                address.textContent = "Address: " + item.address;

                const email = document.createElement("p");
                email.textContent = item.email;

                const phone = document.createElement("p");
                phone.textContent = item.phone_number;

                const foodName = document.createElement("p");
                foodName.textContent = item.food.food_name;

                const price = document.createElement("p");
                price.textContent = "Total: " + item.food.price + " MMK";

                const remark = document.createElement("p");
                remark.textContent = "Remark: " + item.remark;

                const status = document.createElement("p");
                status.textContent = "Status: " + item.status;

                menuItem.appendChild(customerName);
                menuItem.appendChild(address);
                menuItem.appendChild(email);
                menuItem.appendChild(phone);
                menuItem.appendChild(foodName);
                menuItem.appendChild(price);
                menuItem.appendChild(remark);
                menuItem.appendChild(status);

                if (item.status == "Pending") {
                    const approveButton = document.createElement("button");
                    approveButton.textContent = "Accept";
                    approveButton.classList.add("form-button");
                    approveButton.addEventListener("click", function () { updateOrderStatus(item.id, 2) });
                    menuItem.appendChild(approveButton);

                    const rejectButton = document.createElement("button");
                    rejectButton.textContent = "Reject";
                    rejectButton.classList.add("form-button");
                    rejectButton.addEventListener("click", function () { updateOrderStatus(item.id, 3) });
                    menuItem.appendChild(rejectButton);
                } else if (item.status != "Done" && item.status != "Rejected") {
                    const doneButton = document.createElement("button");
                    doneButton.textContent = "Done";
                    doneButton.classList.add("form-button");
                    doneButton.addEventListener("click", function () { updateOrderStatus(item.id, 4) });
                    menuItem.appendChild(doneButton);
                }


                menuContainer.appendChild(menuItem);
            });
        })
        .catch(error => {
            // Handle any errors
            console.error('Error:', error);
        });
}

function updateOrderStatus(id, status) {
    const jsonData = {};
    jsonData["status"] = status;

    const url = "http://localhost:5000/api/orders/" + id;
    fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(jsonData)
    })
        .then(response => response.json())
        .then(result => {
            // Handle the response from the server
            console.log(result);
        })
        .catch(error => {
            // Handle any errors that occur during the request
            console.error(error);
        });

    location.reload();
}

// Call the function when the window is loaded
window.onload = getOrders;
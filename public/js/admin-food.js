function getMenu() {
    fetch('http://localhost:5000/api/foods')
        .then(response => response.json())
        .then(data => {
            const menuContainer = document.getElementById("menu-container");

            data = data.data;

            data.forEach(item => {
                const menuItem = document.createElement("div");
                menuItem.classList.add("menu-item");

                const foodName = document.createElement("h3");
                foodName.textContent = item.food_name;

                const description = document.createElement("p");
                description.textContent = item.description;

                const price = document.createElement("p");
                price.textContent = "Price: " + item.price + " MMK";

                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.classList.add("form-button");
                deleteButton.addEventListener("click", function () { deleteFood(item.id) });

                menuItem.appendChild(foodName);
                menuItem.appendChild(description);
                menuItem.appendChild(price);
                menuItem.appendChild(deleteButton);

                menuContainer.appendChild(menuItem);
            });
        })
        .catch(error => {
            // Handle any errors
            console.error('Error:', error);
        });
}

function createFood() {
    const form = document.getElementById("form-main");
    const formData = new FormData(form);
    const jsonData = {};
    for (let [key, value] of formData.entries()) {
        jsonData[key] = value;
    }

    const url = 'http://localhost:5000/api/foods';

    fetch(url, {
        method: "POST",
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
            // window.alert(error);
        });
}

function deleteFood(id) {

    const url = "http://localhost:5000/api/foods/" + id;
    fetch(url, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
    })
        .then(response => response)
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
window.onload = getMenu;
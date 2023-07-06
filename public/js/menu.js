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

                menuItem.appendChild(foodName);
                menuItem.appendChild(description);
                menuItem.appendChild(price);

                menuContainer.appendChild(menuItem);
            });
        })
        .catch(error => {
            // Handle any errors
            console.error('Error:', error);
        });
}

// Call the function when the window is loaded
window.onload = getMenu;
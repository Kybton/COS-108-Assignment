var selectedFoodId = "";

function getMenu() {
    fetch('http://localhost:5000/api/foods')
        .then(response => response.json())
        .then(data => {
            const foodDropdown = document.getElementById("foodDropdown");

            data = data.data;


            data.forEach((item) => {
                const option = document.createElement("option");
                option.value = item.id;
                option.text = item.food_name;
                foodDropdown.appendChild(option);
            });
        })
        .catch(error => {
            // Handle any errors
            console.error('Error:', error);
        });
}

foodDropdown.addEventListener("change", (event) => {
    selectedFoodId = event.target.value;
});

function orderNow() {
    const form = document.getElementById("form-main");
    const formData = new FormData(form);
    const jsonData = {};
    for (let [key, value] of formData.entries()) {
        jsonData[key] = value;
    }

    jsonData["food_id"] = selectedFoodId;
    console.log(jsonData);

    const url = 'http://localhost:5000/api/orders';

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
        });
}
// Call the function when the window is loaded
window.onload = getMenu;

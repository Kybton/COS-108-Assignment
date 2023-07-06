function login() {
    const form = document.getElementById("form-main");
    const formData = new FormData(form);
    const jsonData = {};
    for (let [key, value] of formData.entries()) {
        jsonData[key] = value;
    }

    const url = 'http://localhost:5000/api/admin-login';

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(jsonData)
    })
        .then(result => {
            // Handle the response from the server
            if (result.ok) {
                window.location.href = "admin-dashboard";
            } else {
                window.location.href = "admin-login";
            }
        })
        .catch(error => {
            // Handle any errors that occur during the request
            console.error(error);
            // window.alert(error);
        });
}
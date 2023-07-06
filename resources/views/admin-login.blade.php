<!DOCTYPE html>
<html>

<head>
    <title>Good Food</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
</head>

<body>
    <div class="login-container">
        <div class="login-form">
            <div>
                <h1>Admin Login</h1>
                <form id="form-main">
                    <div class="form-group">
                      <input type="text" id="name" name="name" class="form-input" placeholder="Name" required>
                    </div>

                    <div class="form-group">
                      <input type="text" id="password" name="password" class="form-input" placeholder="Password" required>
                    </div>
                
                    <div>
                        <input type="button" value="Login" class="form-button" onclick="login()">
                    </div>
                  </form>
            </div>
        </div>
    </div>

    <!--<script type="module" src="../javascripts/menu.js"></script> -->
    <script src="{{ asset('js/admin-login.js') }}"></script>

</body>

</html>
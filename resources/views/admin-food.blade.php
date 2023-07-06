<!DOCTYPE html>
<html>

<head>
    <title>Good Food</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
</head>

<body>
    <div class="base-container">
        <!-- Navigation bar here -->
        <div class="nav-bar">
            <a class="logo" href="{{ route('admin-dashboard') }}">Good Food</a>
            <ul class="nav-bar-list">
                <a href="{{ route('admin-food') }}"><button>Food</button></a>
                <a href="{{ route('home') }}"><button>Log Out</button></a>
            </ul>
        </div>

        <div class="menu">
            <div id="menu-container">
                <h1>Menu</h1>
            </div>
        </div>

        <div class="food-form">
            <div>
                <h1>Create New Item</h1>
                <form id="form-main">
                    <div class="form-group">
                      <input type="text" id="name" name="name" class="form-input" placeholder="Name" required>
                    </div>
                
                    <div class="form-group">
                      <textarea id="message" class="form-input" name="description" placeholder="Description" rows=3></textarea>
                    </div>

                    <div class="form-group">
                      <input type="text" id="price" name="price" class="form-input" placeholder="Price" required>
                    </div>
                
                    <div>
                        <input type="submit" value="Create" class="form-button" onclick="createFood()">
                    </div>
                  </form>
        <!-- Navigation bar here -->
    <script src="{{ asset('js/admin-food.js') }}"></script>
</body>

</html>
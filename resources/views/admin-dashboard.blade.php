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
        <!-- Navigation bar here -->

        <div class="orders">
            <div id="order-container">
                <h1>Orders</h1>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin-dashboard.js') }}"></script>
</body>

</html>
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
            <a class="logo" href="{{ route('home') }}">Good Food</a>
            <ul class="nav-bar-list">
                <a href="{{ route('menu') }}"><button>Menu</button></a>
                <a href="{{ route('order') }}"><button>Order Now</button></a>
                <a href="{{ route('admin-login') }}"><button>Admin Log In</button></a>
            </ul>
        </div>
        <!-- Navigation bar here -->

        <div class="home">
            <div>
                <h2>SPECIAL NIGHTS DESERVE A GREAT RESTAURANT.</h2>
            </div>
        </div>

        <div class="footer">
            <div class="footer-col">
                <span>Social</span>
                <ul>
                    <li>Instagram</li>
                    <li>Thread</li>
                    <li>Facebook</li>
                    <li>Twitter</li>
                </ul>
            </div>
            <div class="footer-col">
                <span>Location</span>
                <ul>
                    <li>No(40), KayTuMaLa Avenue</li>
                    <li>South Okkalapa</li>
                    <li>Yangon</li>
                    <li>Myanmar</li>
                </ul>
            </div>
            <div class="footer-col">
                <span>Opening Hours</span>
                <ul>
                    <li>09:00 AM - 09:00PM</li>
                    <li>Phone: 09969923999</li>
                    <li>Email: contact@goodfood.com</li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>
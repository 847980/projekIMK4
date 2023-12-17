<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        .checkout-container {
            max-width: 70%;
        }
        .checkout-title {
            display: flex;
            align-items: center;
        }
        .poster img {
            max-width: 9em;
            max-height: 15em;
        }

        .checkout-card {
            background-color: rgb(57, 62, 70);
            padding: 1.7em 2em;
            border-radius: 10px;
            margin: 1em;
        }
        .row {
            display: flex;
            justify-content: space-between;
            flex-flow: row wrap;
        }

        .row .checkout-card {
            width: 10em;
            padding: 1.5em;
            padding-bottom: 1.2em;
            padding-top: 1.2em;
        }

        .row .checkout-card h2 {
            font-size: 2rem;
            font-weight: bold;
        }

        .row .checkout-card p {
            margin-top: 1.5em;
            font-size: 0.8rem;
            color: rgb(255, 211, 105);
            font-weight: bold;
        }
        .border-bottom {
            border-bottom: 1.5px solid #EEEEEE;
            margin-top: 1em;
            margin-bottom: 1em;
        }

        @media only screen and (max-width: 768px) {
            .row .checkout-card {
                flex: 0 0 calc(50% - 2em);
            }
        }

        @media only screen and (max-width: 480px) {
            .row .checkout-card {
                flex: 0 0 calc(100% - 2em);
            }
        }
        .seat-card {
            background-color: rgb(255, 211, 105);
            width: 5em;
            padding: 1.3em;
            border-radius: 10px;
            margin: 1em;
            display: flex;
            justify-content: center;
        }
        .seat-card p {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .pay-btn {
            background-color: rgb(255, 211, 105);
            color: #EEEEEE;
            border-radius: 10px;
            padding: 1em;
            text-align: center;
            font-size: 1.3rem;
            border-style: none;
        }
    </style>
</head>
<body>
    <header>
        <div id="menu-icon" class='bx bx-menu'></div>
        <ul class="navbar">
            <li><a href="/home" class="home-active">HOME</a></li>
            <li><a href="/home#movies">MOVIES</a></li>
            <li><a href="/home#coming">COMING</a></li>
            <li><a href="/home#newsletter">NEWSLETTER</a></li>
        </ul>       
    </header>
    <div class="flex-container">
        <div class="checkout-container">
            <div class="checkout-title checkout-card">
                <div class="poster">
                    <img src="assets/spirit_poster.jpg">
                </div>
                <div class="home-text">
                    <div class="title-container">
                        <h1>Spirited Away</h1>
                    </div>
                    <h2>R-13&emsp;|&emsp;125 min&emsp;|&emsp;Drama</h2><br>
                    <ul class="desc-movie">
                        <li class="movie_genre">
                            <p>Comedy, Drama, Action</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="checkout-card ">
                        <h2>27 Sep</h2>
                        <p>Date</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout-card">
                        <h2>17:30</h2>
                        <p>Time</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout-card">
                        <h2>Lorem</h2>
                        <p>Studio</p>
                    </div>
                </div>
            </div>
            <div class="transaction-details">
                <div class="checkout-card">
                    <div class="row">
                        <div class="col-6"><h3>Cinema Name</h3></div>
                        <div class="col-6"><p>Cinema name</p></div>
                    </div>
                    <div class="border-bottom"></div>
                    <div class="row">
                        <div class="col-6"><h3>Studio</h3></div>
                        <div class="col-6"><p>Studio XYZ</p></div>
                    </div>
                    <div class="border-bottom"></div>
                    <div class="row">
                        <div class="col-6"><h3>Date</h3></div>
                        <div class="col-6"><p>27-9-2023</p></div>
                    </div>
                    <div class="border-bottom"></div>
                    <div class="row">
                        <div class="col-6"><h3>Start time</h3></div>
                        <div class="col-6"><p>19:30 WIB</p></div>
                    </div>

                    <div class="border-bottom"></div>
                    <div class="row">
                        <div class="col-6"><h3>Seat Booked</h3></div>
                    </div>
                    <div id="seat"></div>
                    <div class="border-bottom"></div>
                    <div class="row">
                        <div class="col-6"><h3>TOTAL</h3></div>
                        <div class="col-6"><h1>$15.99</h1></div>
                    </div>
                    <div class="border-bottom"></div>
                    <div class="row" style="display: flex; justify-content: center;">
                        <div class="col"><button class="pay-btn">PAYMENT</button></div>
                        
                    </div>
                </div>
            </div>


            


        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#seat").append("<div class=\"seat-card\"><p>A1</p></div>")
        })
    </script>
</body>
</html>
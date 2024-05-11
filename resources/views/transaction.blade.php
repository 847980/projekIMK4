@extends('layouts.basic')
@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
            object-fit: cover; 
        }

        .checkout-card {
            background-color: rgb(57, 62, 70);
            padding: 1.7em 2em;
            border-radius: 10px;
            margin: 1em;
            width: 100%;
        }
        .row {
            display: flex;
            justify-content: space-between;
            flex-flow: row wrap;
            width: 100%;
        }
        

        .row .checkout-card {
            width: 10em;
            margin: 0.5em 0;
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
        .seat-card {
            background-color: rgb(255, 211, 105);
            width: 5em;
            padding: 1.3em;
            border-radius: 10px;
            margin: 1em;
            display: flex;
            justify-content: center;
        }
        .big-card {

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
        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 60%;
            margin: 0 auto;
        }
        @media only screen and (max-width: 825px) {
            .flex-container {
                width: 73%
            }
            .big-card {
                justify-content: center;
                margin: 0.5em 10em;
                gap: 1em 2em;
                width: 100%;
            }
        }   
        @media only screen and (max-width: 480px) {
            .flex-container {
                width: 80%
            }
            .row .checkout-card {
                width: 100%;
            }
        }   
    </style>
</head>
<body>
<a class="btn btn-danger" href="{{ route('user.dashboard') }}" style="margin: 20px">Cancel</a>

    <div class="flex-container">
            <div class="checkout-title checkout-card">
                <div class="poster">
                    <img id="posterFilm" >
                </div>
                <div class="home-text">
                    <div class="title-container">
                        <h1><span id="judul"></span></h1>
                    </div>
                    <span id="keterangan"></span>
                </div>
            </div>
            <div class="row big-card">
                <div class="col-4 checkout-card ">
                        <h2><span id="tanggal"></span></h2>
                        <p>Date</p>
                </div>
                <div class="col-4 checkout-card">
                        <h2><span id="jam"></span></h2>
                        <p>Time</p>
                </div>
                <div class="col-4 checkout-card">
                        <h2><span id="studioName"></span></h2>
                        <p>Studio</p>
                </div>
            </div>
            <div class="checkout-card">
                <div class="row">
                    <div class="col-6"><h3>Cinema Name</h3></div>
                    <div class="col-6"><p><span id="cinemaName"></span></p></div>
                </div>
                <div class="border-bottom"></div>
                <div class="row">
                    <div class="col-6"><h3>Studio</h3></div>
                    <div class="col-6"><p><span id="studioName2"></span></p></div>
                </div>
                <div class="border-bottom"></div>
                <div class="row">
                    <div class="col-6"><h3>Date</h3></div>
                    <div class="col-6"><p><span id="tanggal2"></span></p></div>
                </div>
                <div class="border-bottom"></div>
                <div class="row">
                    <div class="col-6"><h3>Start time</h3></div>
                    <div class="col-6"><p><span id="jam2"></span> WIB</p></div>
                </div>

                <div class="border-bottom"></div>
                <div class="row">
                    <div class="col-6"><h3>Seat Booked</h3></div>
                    <div class="col-6"><p><span id="seat"></span></p></div>
                </div>
                {{-- <div id="seat container">dfafdasfasf</div> --}}
                <div class="border-bottom"></div>
                <div class="row">
                    <div class="col-6"><h3>TOTAL</h3></div>
                    <div class="col-6"><h1>$<span id="totalBayar"></span></h1></div>
                </div>
                <div class="border-bottom"></div>
                <div class="row" style="display: flex; justify-content: center;">
                    <div class="col">
                        <button class="pay-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">PAYMENT</button>
                    </div>
                    
                </div>
            </div>
    </div>




<?php
$allSessionData = session()->all();
$desiredKey = 'login_web_'; 

$sessionId = null;

foreach ($allSessionData as $key => $value) {
    if (strpos($key, $desiredKey) === 0) {
        $sessionId = $value;
        break;
    }
}

?>

<?php

foreach ($_POST as $key => $value) {
    if ($key == 'film_id') {
        ?>
                <input type="hidden" name='film_id' id="film_id" value="{{ $value }}">
            <?php
        } elseif ($key == 'cinema_id') {
            ?>
                <input type="hidden" name='cinema_id' id="cinema_id" value="{{ $value }}">
                <?php
        } elseif ($key == 'studio_id2') {
            ?>
                <input type="hidden" name="studio_id" id="studio_id" value="{{ $value }}">
                <?php
        } elseif ($key == 'date') {
            ?>
                <input type="hidden" name="date" id="date" value="{{ $value }}">
                <?php
        } elseif ($key == 'time') {
            ?>
                <input type="hidden" name="time" id="time" value="{{ $value }}">
                <?php
        } elseif ($key == 'poster') {
            ?>
                <input type="hidden" name="posterAddress" id="posterAddress" value="{{ $value }}">
                <?php
        } elseif ($key == 'show_timeId') {
            ?>
                <input type="hidden" name="show_timeId" id="show_timeId" value="{{ $value }}">
                <?php
        } else {
            if ($key != '_token') {
                ?>
                <input type="hidden" class="seats" name="{{ $key }}" id="{{ $key }}" value="{{ $value }}">
                <?php
        }
    }
}
?>
<input type="hidden" name="seatNums" id="seatNums" value="">
<input type="hidden" name='user_id' id="user_id" value="{{ $sessionId }}">
<input type="hidden" name='transaction_id' id="transaction_id" value="">
<form action="" id="csrfForm">
    @csrf
</form>

<form action="{{ route('paypal') }}" method="post">
    @csrf
    <input type="hidden" name="price" id="price" value="-1">
    <button type="submit" id="pay" style="display: none;">Pay with PayPal</button>
</form>
    

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel">Confirm</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-dark">
            The order cannot be canceled. Are you sure?
        </div>
        <div class="modal-footer">
  <button class="btn btn-warning" onclick="checkSeat()">Confirm</button> 
  {{-- should be paypal() --}}
  
  <p id="testing"></p>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var seats = [];
    var totalSeat = -1;
    var filmName = "";
    var studioName = "";
    var cinemaName = "";
    var price = -1;
    var totalPrice = -1;
    var genre_id = "";
    var genreName = "";
    var ageCat = "";
    var seatStat = [];
    var duration = -1;

    $(document).ready(function(){
        console.log("ready");
        $('#posterFilm').attr('src', $('#posterAddress').val());
        var dateString = $('#date').val();
        var dateObject = new Date(dateString);
        var day = dateObject.getDate();
        var month = dateObject.toLocaleString('en-us', { month: 'short' });
        var formattedDate = day + " " + month;
        console.log(formattedDate);
        $('#tanggal').html(formattedDate);
        $('#tanggal2').html($('#date').val());
        var timeString = $('#time').val();
        var dateObject = new Date("1970-01-01 " + timeString);
        var formattedTime = dateObject.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false });
        console.log(formattedTime);

        $('#jam').html(formattedTime);
        $('#jam2').html($('#time').val());

        runAsyncOperations();
        
    });
    
    async function runAsyncOperations() {
    try {
        await getSeats();

        await Promise.all([getCinema(), getStudio(), getFilm(), getPrice(), showSeat()]);
        console.log("All operations finished");
        
    } catch (error) {
        console.error("Error:", error);
        }
    };
    function getGenre(){
        $.ajax({
            url: 'get-genre/'+genre_id,
            type: 'get',
            success: function (response) {
                console.log(response[0]['name']);
                genreName = response[0]['name'];
                $('#keterangan').append(
                    '<h2>'+ageCat+'&emsp;|&emsp;'+duration+' min&emsp;|&emsp;'+genreName+'</h2><br>'
                );
            },
            error: function (error) {
                console.log(error);
            }
        });
    };
    function getSeats(){
        $('.seats').each(function(index, seat){
            seats.push($(this).val());
        })
        totalSeat = seats.length;
        console.log(totalSeat);
    };
    function getFilm(){
        var id = $('#film_id').val();
        $.ajax({
            url: 'get-film-title/'+id,
            type: 'get',
            success: function (response) {
                console.log(response);
                filmName = response[0]['judul'];                
                console.log(filmName);
                $('#description').append("<p>"+filmName+"</p>");
                $('#judul').html(filmName);
                ageCat = response[0]['age_cat'];
                duration = response[0]['duration'];
                genre_id=response[0]['genre_id'];
                getGenre();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    function getStudio(){
        var id = $('#studio_id').val();
        $.ajax({
            url: 'get-studio/'+id,
            type: 'get',
            success: function (response) {
                console.log(response);
                studioName = response[0]['name'];
                console.log(studioName);
                $('#description').append("<p>"+studioName+"</p>");
                $('#studioName').html(studioName);
                $('#studioName2').html(studioName);

            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    function getCinema(){
        var id = $('#cinema_id').val();
        $.ajax({
            url: 'get-cinema/'+id,
            type: 'get',
            success: function (response) {
                console.log(response);
                cinemaName = response[0]['name'];
                console.log(cinemaName);
                $('#description').append("<p>"+cinemaName+"</p>");
                $('#cinemaName').html(cinemaName);

            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    function getPrice(){
        var id = $('#show_timeId').val();
        $.ajax({
            url: 'get-price/'+id,
            type: 'get',
            success: function (response) {
                console.log(response);
                price = response[0]['price'];
                console.log(price);
                $('#description').append("<p>Price: "+price+"</p>");
                totalPrice = totalSeat * price;
                $('#description').append("<p>Total: "+totalPrice+"</p>");
                $('#price').val(totalPrice);
                
                var currencyValue = totalPrice;
                var formattedCurrency = currencyValue.toLocaleString('en-US');
                console.log(formattedCurrency);
                $('#totalBayar').html(formattedCurrency);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function showSeat(){
        let arrSeat = [];
        $.each(seats, function(index, seat){
            $.ajax({
            url: 'get-seats-number/'+seat,
            type: 'get',
            success: function (response) {
                console.log('show seat: ')
                console.log(response)
                console.log("chair:");
                console.log(response[0]['chair_number']);
                var temp = $("#seatNums").val();
                let convert = response[0]['chair_number'];
                arrSeat.push(String.fromCharCode('A'.charCodeAt(0) + (convert/24)) + "" + (convert % 24));
                
                let seatsNumFix = arrSeat.join(",");
                console.log("tes seat");
                console.log(seatsNumFix);
                $("#seat").text(seatsNumFix);
            },
            error: function (error) {
                console.log(error);
            }
            });
        });
    }
    function showstat(){
        console.log(seatStat);
        var paynow = true;
        $.each(seatStat, function(index, seat){
            if (seat == 1) {
                paynow = false;
            }
        });
        console.log(paynow);
        if(paynow){
            paypal();
        } else {
            showAlertAndRedirect();
        }
    };
    
        // Function to show the alert and redirect when OK is clicked
        function showAlertAndRedirect() {
      window.alert("Seat taken. Kindly return to the main menu for other options.");
      // Redirect to another site after clicking OK
      window.location.href = "dashboard";
    }

    function checkSeat(){
        $.each(seats, function(index, seat){
            $.ajax({
            url: 'check-seat/'+seat,
            type: 'get',
            success: function (response) {
                console.log("chair:");
                console.log(response[0]['chair_status']);
                if (response[0]['chair_status'] == 0) {
                    console.log("kosong");
                    seatStat.push(0);
                } else {
                    seatStat.push(1);
                }
                if (index == seats.length - 1) {
                    showstat();
                }
            },
            error: function (error) {
                console.log(error);
            }
            });
        });
    }
    function paypal(){
        var userId = $('#user_id').val();
        var transId;
        $.ajax({
            url: 'create-transaction/'+userId +"/"+totalPrice,
            type: 'get',
            datatype: 'json',
            success: function (response) {
                console.log(response);
                $('#transaction_id').val(response['transaction_id']);
                console.log($('#transaction_id').val());
                transId = response['transaction_id'];
                console.log("transID: " + transId);

                // membuat detail transaksi dan mengupdate status kursi
                $.each(seats, function(index, seat) {
                    // First AJAX request to 'create-detail'
                    $.ajax({
                        url: 'create-detail/' + transId + '/' + seat,
                        type: 'get',
                        success: function(response) {
                            console.log('detail transaksi')
                            console.log(response);
                            if (index === seats.length - 1) {
                                // Perform actions specific to the last iteration
                                $('#pay').click();
                            }
                        },
                        error: function(error) {
                            console.log('error detail transaksi')
                            console.log(error);
                        }
                    });

                    // Second AJAX request to 'update-seat'
                    $.ajax({
                        url: 'update-seat/' + seat,
                        type: 'get',
                        success: function(response) {
                            console.log('update seat')
                            console.log(response);
                            if (index === seats.length - 1) {
                                // Perform actions specific to the last iteration
                                $('#pay').click();
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    }); 
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>
@endsection


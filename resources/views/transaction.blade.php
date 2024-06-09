{{-- Pembayaran, get semua data --}}

@extends('layouts.basic')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

{{-- swal --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Include SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        background: linear-gradient(140deg, rgba(240, 252, 252, 1) 0%, rgba(173, 246, 246, 1) 100%) no-repeat center center fixed;
    }

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
        color: #EEEEEE;
    }

    .row {
        display: flex;
        justify-content: space-between;
        flex-flow: row wrap;
        width: 100%;
    }

    .border-bottom {
        border-bottom: 1.5px solid #EEEEEE;
        margin-top: 1em;
        margin-bottom: 1em;
    }

    .pay-btn {
        background-color: var(--bg-color);
        /* color: rgb(57, 62, 70); */
        color: var(--text-color);
        border-radius: 10px;
        padding: 1em;
        text-align: center;
        justify-content: center;
        align-items: center;
        font-size: 1.3rem;
        border-style: none;
        width: 100%;
    }

    .pay-btn:hover {
        background-color: #4a6987;
    }

    .flex-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        /* width: 60%;
        margin: 0 auto; */
        width: auto;
        margin: 4.5rem;
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

    .Btn {
        margin: 0;
        margin-left: 10px;
    }

    .Btn:hover {
        width: 125px;
        border-radius: 40px;
        transition-duration: .3s;
    }

    .Btn:hover #sign {
        width: 40%;
        transition-duration: .3s;
    }

    /* hover effect button's text */
    .Btn:hover .text {
        opacity: 1;
        width: 70%;
        transition-duration: .3s;
        padding-right: 10px;
    }

    /* button click effect*/
    .Btn:active {
        transform: translate(2px, 2px);
    }

    .Btn {
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        left: 3vw;
        top: 2vh;
        width: 45px;
        height: 45px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        position: absolute;
        overflow: hidden;
        transition-duration: .3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        background-color: #585f6b;
    }

    /* back sign */
    #sign {
        width: 100%;
        transition-duration: .3s;
    }

    #sign i {
        width: 17px;
        color: #FFD369;
    }

    .text {
        position: absolute;
        right: 0%;
        width: 0%;
        opacity: 0;
        color: #FFD369;
        font-size: 1.2em;
        font-weight: 600;
        transition-duration: .3s;
    }
</style>
@endsection

<?php
/* Get session id that starts with 'login_web_' */

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

@section('body')

<body>
    <a href="#" class="exit-btn" onclick="window.history.back()">
        <button class="Btn">
            <div id="sign">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </div>
            <div class="text">BACK</div>
        </button>
    </a>

    <div class="flex-container" id="information-card">
        <div class="checkout-title checkout-card">
            <div class="poster">
                <img id="posterFilm">
            </div>
            <div class="home-text">
                <div>
                    <h1><span id="judul"></span></h1>
                </div>
                <span id="keterangan"></span>
            </div>
        </div>
        <div class="checkout-card">
            <div class="row">
                <div class="col-6">
                    <p>Cinema Name</p>
                </div>
                <div class="col-6">
                    <h3><span id="cinemaName"></span></h3>
                </div>
            </div>
            <div class="border-bottom"></div>
            <div class="row">
                <div class="col-6">
                    <p>Studio</p>
                </div>
                <div class="col-6">
                    <h3><span id="studioName2"></span></h3>
                </div>
            </div>
            <div class="border-bottom"></div>
            <div class="row">
                <div class="col-6">
                    <p>Date</p>
                </div>
                <div class="col-6">
                    <h3><span id="tanggal2"></span></h3>
                </div>
            </div>
            <div class="border-bottom"></div>
            <div class="row">
                <div class="col-6">
                    <p>Start time</p>
                </div>
                <div class="col-6">
                    <h3><span id="jam2"></span> WIB</h3>
                </div>
            </div>

            <div class="border-bottom"></div>
            <div class="row">
                <div class="col-6">
                    <p>Seat Booked</p>
                </div>
                <div class="col-6">
                    <h3><span id="seat"></span></h3>
                </div>
            </div>
            <div class="border-bottom"></div>
            <div class="row">
                <div class="col-6">
                    <p>TOTAL</p>
                </div>
                <div class="col-6">
                    <h1>$<span id="totalBayar"></span></h1>
                </div>
            </div>
            <div class="mt-4"></div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-12">
                    <button class="pay-btn w-100" onclick="showConfirmation()" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal">BAYAR</button>
                </div>
            </div>
        </div>
    </div>

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
    } elseif ($key == 'film_judul') {
            ?>
    <input type="hidden" name="film_judul" id="film_judul" value="{{ $value }}">
    <?php
    } elseif ($key == 'film_age') {
            ?>
    <input type="hidden" name="film_age" id="film_age" value="{{ $value }}">
    <?php
    } elseif ($key == 'film_min') {
            ?>
    <input type="hidden" name="film_duration" id="film_duration" value="{{ $value }}">
    <?php
    } elseif ($key == 'film_genre') {
            ?>
    <input type="hidden" name="film_genre" id="film_genre" value="{{ $value }}">
    <?php
    } elseif ($key == 'film_genreID') {
            ?>
    <input type="hidden" name="film_genreId" id="film_genreId" value="{{ $value }}">
    <?php
    } elseif ($key == 'studioName') {
            ?>
    <input type="hidden" name="studio_name" id="studio_name" value="{{ $value }}">
    <?php
    } elseif ($key == 'cinemaName') {
            ?>
    <input type="hidden" name="cinema_name" id="cinema_name" value="{{ $value }}">
    <?php
    } elseif ($key == 'film_price') {
            ?>
    <input type="hidden" name="film_price" id="film_price" value="{{ $value }}">
    <?php
    } elseif ($key == 'numSeatStr') {
            ?>
    <input type="hidden" name="numSeats" id="numSeats" value="{{ $value }}">
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


    <!-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel">Confirm</h1>
                    <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    The order cannot be canceled. Are you sure?
                </div>
                <div class="modal-footer">
                    <button id="confirmButton" class="btn btn-warning" onclick="checkSeat()">Confirm</button>
                    {{-- should be paypal() --}}

                    <p id="testing"></p>
                </div>
            </div>
        </div>
    </div> -->
</body>
@endsection

@section('script')
<script>
    $('#posterFilm').attr('src', $('#posterAddress').val());

    var seats = [];
    $('.seats').each(function (index, seat) {
        seats.push($(this).val());
    });
    let seatTemp = $('#numSeats').val();
    let seatSplit = seatTemp.split(", ");
    let arrSeat = [];
    seatSplit.forEach(seat => {
        let num = parseInt(seat);
        arrSeat.push(String.fromCharCode('A'.charCodeAt(0) + (num / 24)) + "" + (num % 24));
    });
    let seatsNumFix = arrSeat.join(", ");
    $("#seat").text(seatsNumFix);

    var totalSeat = seats.length;

    var filmName = $('#film_judul').val();
    var studioName = $('#studio_name').val();
    $('#studioName').text(studioName);
    $('#studioName2').text(studioName);
    $('#judul').text(filmName);
    var cinemaName = $('#cinema_name').val();
    $('#cinemaName').text(cinemaName);
    var price = $('#film_price').val();

    var totalPrice = totalSeat * price;
    $('#price').val(totalPrice);
    var currencyValue = totalPrice;
    var formattedCurrency = currencyValue.toLocaleString('en-US');
    console.log(formattedCurrency);
    $('#totalBayar').html(formattedCurrency);

    var genre_id = $('#film_genreId').val();
    var genreName = $('#film_genre').val();
    var ageCat = $('#film_age').val();
    var duration = $('#film_duration').val();
    $('#keterangan').append('<h2>' + ageCat + '&emsp;|&emsp;' + duration + ' min&emsp;|&emsp;' + genreName + '</h2><br>');
    var seatStat = [];

    $(document).ready(function () {
        console.log("ready");
        var dateString = $('#date').val();
        var dateObject = new Date(dateString);
        var day = dateObject.getDate();
        var month = dateObject.toLocaleString('en-us', { month: 'short' });
        var formattedDate = day + " " + month;
        console.log(formattedDate);
        $('#tanggal').text(formattedDate);
        $('#tanggal2').text($('#date').val());
        var timeString = $('#time').val();
        var dateObject = new Date("1970-01-01 " + timeString);
        var formattedTime = dateObject.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false });
        console.log(formattedTime);

        $('#jam').text(formattedTime);
        $('#jam2').text(formattedTime);
    });

    // Function to show the alert and redirect when OK is clicked
    function showAlertAndRedirect() {
        Swal.fire({
            icon: 'warning',
            title: 'Seat taken',
            text: 'Kindly return to the main menu for other options.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to another site after clicking OK
                window.location.href = "dashboard";
            }
        });
    }


    function showConfirmation() {
        Swal.fire({
            title: 'Are you sure?',
            text: "The order cannot be canceled. Are you sure?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                // Call the function to handle confirmation
                checkSeat();
            }
        });
    }

    // function checkSeat() {
    //     // Your checkSeat logic
    //     Swal.fire({
    //         title: 'Confirmed!',
    //         text: 'Your order has been confirmed.',
    //         icon: 'success'
    //     });
    // }

    function checkSeat() {
        $('#closeModal').prop('disabled', true);
        $('#confirmButton').prop('disabled', true);
        $('#exampleModalToggle').modal({ backdrop: 'static', keyboard: false });

        $.each(seats, function (index, seat) {
            $.ajax({
                url: 'check-seat/' + seat,
                type: 'get',
                success: function (response) {
                    console.log("chair:");
                    console.log(response[0]['chair_status']);
                    if (response[0]['chair_status'] == 0) {
                        console.log("kosong");
                        seatStat.push(0);
                    } else {
                        showAlertAndRedirect()
                    }
                    if (index == seats.length - 1) {
                        $('#exampleModalToggle').modal({ backdrop: 'static', keyboard: false });
                        paypal();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    }

    function paypal() {
        var userId = $('#user_id').val();
        var transId;
        $.ajax({
            url: 'create-transaction/' + userId + "/" + totalPrice,
            type: 'get',
            datatype: 'json',
            success: function (response) {
                console.log(response);
                $('#transaction_id').val(response['transaction_id']);
                console.log($('#transaction_id').val());
                transId = response['transaction_id'];
                console.log("transID: " + transId);

                // membuat detail transaksi dan mengupdate status kursi
                $.each(seats, function (index, seat) {
                    // First AJAX request to 'create-detail'
                    $.ajax({
                        url: 'create-detail/' + transId + '/' + seat,
                        type: 'get',
                        success: function (response) {
                            console.log('detail transaksi')
                            console.log(response);
                            if (index === seats.length - 1) {
                                // Perform actions specific to the last iteration
                                $('#pay').click();
                            }
                        },
                        error: function (error) {
                            console.log('error detail transaksi')
                            console.log(error);
                        }
                    });

                    // Second AJAX request to 'update-seat'
                    $.ajax({
                        url: 'update-seat/' + seat,
                        type: 'get',
                        success: function (response) {
                            console.log('update seat')
                            console.log(response);
                            if (index === seats.length - 1) {
                                // Perform actions specific to the last iteration
                                $('#pay').click();
                            }
                        },
                        error: function (error) {
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
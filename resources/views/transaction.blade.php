@extends('layouts.basic')

@section('body')
<?php
// In your Blade view (dashboard.blade.php) or controller
$allSessionData = session()->all();

// Find the key dynamically
$desiredKey = 'login_web_'; // The prefix of the key you're looking for

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

<div id="description">
    
</div>
<a class="btn btn-danger" href="{{ route('user.dashboard') }}">Cancel</a>
<form action="{{ route('paypal') }}" method="post">
    @csrf
    <input type="hidden" name="price" id="price" value="-1">
    <button type="submit" id="pay" style="display: none;">Pay with PayPal</button>
</form>
    

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            The order cannot be canceled. Are you sure?
        </div>
        <div class="modal-footer">
  <button class="btn btn-warning" onclick="paypal()">Confirm</button>
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Payment</button>

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

    $(document).ready(function(){
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
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function showSeat(){
        $("#seatNums").val("");
        $.each(seats, function(index, seat){
            $.ajax({
            url: 'get-seats-number/'+seat,
            type: 'get',
            success: function (response) {
                console.log('show seat: ')
                console.log(response)
                console.log(response[0]['chair_number']);
                var temp = $("#seatNums").val();
                $("#seatNums").val(temp + "," +response[0]['chair_number']);
                if (index === seats.length - 1) {
                    // Perform actions specific to the last iteration
                    var tempSeatNumber = $("#seatNums").val().substring(1);
                    console.log(tempSeatNumber);
                    $('#description').append("<p> Seat Number: "+tempSeatNumber+"</p>");
                }
            },
            error: function (error) {
                console.log(error);
            }
            });
        });
        
        // $('#description').append("<p> seats: "+chairNumbers+"</p>");
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


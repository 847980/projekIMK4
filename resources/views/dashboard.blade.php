@extends('layouts.basic')


@section('style')
<style>
    h1 {
        color: red;
    }
</style>
@endsection

@section('body')
<select name="city" id="city" onchange="getCinema()">
    <option value="-1" selected> </option>
</select>
<select name="cinema" id="cinema" onchange="getFilm()">
    <option value="-1" selected> </option>
</select>
<p>Daftar Film</p>
<div id="filmsHere"></div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
    $(document).ready(function(){
        loadCity();
        
    });
    function loadCity(){
        $.ajax({
            url: 'get-cities',
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.cities, function(index, city) {
                    $('#city').append($('<option>', {
                        value: city.id,  
                        text: city.name  
                    }));
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    };
    function getCinema(){
            $("#cinema").find("option").remove();
            $('#cinema').append($('<option>', {
                        value: '-1',  
                        text: " ",
                        selected: true  
                    }));
            var id = $("#city").val();
            console.log(id);
            $.ajax({
            url: 'get-cinemas/'+id,
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.cinemas, function(index, cinema) {
                    $('#cinema').append($('<option>', {
                        value: cinema.id,  
                        text: cinema.name  
                    }));
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    };
    function getFilm(){
            $('#filmsHere').html("");
            var cinemaId = $("#cinema").val();
            console.log(cinemaId);
            $.ajax({
            url: 'get-films/'+cinemaId,
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.films, function(index, film){
                    $('#filmsHere').append(
                        "<form action='{{ route('user.get-detail') }}' method='post'> " +
                        "<input type='hidden' name='_token' value='{{ csrf_token() }}' autocomplete='off'>"+
                        "<p> " + film[0].judul + "<br>"+ film[0].description +
                        "<input type='hidden' name='film_id' value='"+film[0].id+"'>"+
                        "<input type='hidden' name='cinema_id' value='"+cinemaId+"'>"+
                         "<br><button class='btn btn-primary'>Buy Ticket</button>"
                         + "</p>"+ "</form>");
                })
                /*
                for (let i = 0; i < response.data1.films.length; i++) {
                    var film = response.data1.films[i];
                    var studio = response.data2.studios[i];
                    var st = response.showtime.showtimes[i];
                    // "<form action='"++"'' method='post'>" +
                        // "<input type='hidden' name='"+st+"'>"
                        // +
                        // </form>
                    $('#filmsHere').append(
                        "<p> " + film[0].judul + "<br>" + studio[0].name + "<br>" + film[0].description +
                        
                         "<br><button class='btn btn-primary' id='"+st+"' onClick='redirectFilm' >Buy Ticket</button>"
                        + "</p>");
                }
                 
                $orders = Order::where('user_id', 1)
    ->where('status', 'completed')
    ->where('another_column', 'some_value') // Add additional conditions as needed
    ->select('columns')
    ->get();
                */
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

</script>
@endsection


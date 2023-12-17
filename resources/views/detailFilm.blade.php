{{-- @dd($_POST['cinema_id']); --}}
@extends('layouts.basic')

@section('body')

<select name="show_date" id="show_date" onchange="changeDate()">
    <option value="-1" selected> </option>
</select>
<select name="studio_id" id="studio_id" onchange="changeStudio()">
    <option value="-1" selected> </option>
</select>
<p>Pilih Kursi</p>
<div id="chairs"></div>

<a class="btn btn-danger" href="{{ route('user.dashboard') }}">Back</a>
<button class="btn btn-warning" onclick="next()">next</button>
<form action="{{ route('user.transaction') }}" id="form" method="post">
    <input type='hidden' name='_token' value='{{ csrf_token() }}' autocomplete='off'>
    <input type="hidden" name='film_id' id="film_id" value="{{ $_POST['film_id'] }}">
    <input type="hidden" name='cinema_id' id="cinema_id" value="{{ $_POST['cinema_id'] }}">
    <input type="hidden" name="studio_id2" id="studio_id2" value="-1">
    <input type="hidden" name="date" id="date" value="-1">
    <input type="hidden" name="time" id="timeChoose" value="-1">
    <input type="hidden" name="show_timeId" id="show_timeId" value="-1">
    <button id="order" type="submit" style="display: none;">Go</button>
</form>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var seats = [];
    $(document).ready(function(){
        getDate();
    });
    function getDate(){
        var filmId = $('#film_id').val();
        console.log(filmId);
        var cinemaId = $('#cinema_id').val();
        console.log(cinemaId);
        $("#date").val(-1);
        $("#studio_id2").val(-1);
        $("#timeChoose").val(-1);
        $("#show_timeId").val(-1);
        $.ajax({
            url: 'get-date/'+cinemaId +"/"+filmId,
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.dates, function(index, date) {
                    $('#show_date').append($('<option>', {
                        value: date,  
                        text: date  
                    }));
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    };
    function changeDate(){
        var id = $('#film_id').val();
        var date = $('#show_date').val();
        $("#studio_id").find("option").remove();
            $('#studio_id').append($('<option>', {
                        value: '-1',  
                        text: " ",
                        selected: true  
                    }));
        $("#date").val(date);
        $("#timeChoose").val(-1);
        $("#show_timeId").val(-1);
        $("#studio_id2").val(-1);
        $.ajax({
            url: 'get-studio-time/'+id+"/"+date,
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.studioTimes, function(index, studioTime) {
                    $('#studio_id').append($('<option>', {
                        value: studioTime['studio_id'],  
                        text: studioTime.studio['name'] + " - " + studioTime['start_time'],
                        time: studioTime['start_time'],
                        showtime: studioTime['id']
                    }));
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    function changeStudio(){
        $("#studio_id2").val(-1);
        $("#timeChoose").val(-1);
        $("#show_timeId").val(-1);
        $("#studio_id2").val($('#studio_id').val());
        $("#timeChoose").val($('#studio_id').find('option:selected').attr('time'));
        $("#show_timeId").val($('#studio_id').find('option:selected').attr('showtime'));
        console.log($("#timeChoose").val());
        console.log($("#show_timeId").val());
        getChair(); 
    }
    function getChair(){
        var showtimeId =  $("#show_timeId").val();
        $.ajax({
            url: 'get-chair/'+showtimeId,
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.chairs, function(index, seat) {
                    $('#chairs').append($('<button class="btn '+(seat['chair_status'] === 0 ? 'btn-success"' : 'btn-danger" disabled')
                    + ' id="'+seat['id']+'" onClick="setChair(\''+seat['id']+'\')">'+seat['chair_number']+'</button>'
                    ));
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function setChair(id){
        var chairId =  id;
        var classBefore = $('#'+chairId).attr('class'); //btn btn-success
        console.log(classBefore);
        var splitter = classBefore.split('-');
        var firstClass = splitter[0] + "-";
        console.log('firstClass: '+firstClass) //btn btn-   
        console.log("splitter: "+splitter[1]) //success
        var color = "";
        if (splitter[1] === 'success') {
            seats.push(chairId);
            color="warning";
            console.log(seats);
        } else if (splitter[1] === 'warning') {
            deleteSeatById(chairId);
            color="success";
            console.log(seats);
        }
        splitter = firstClass + color;
        console.log("new class: "+splitter)
        $('#'+chairId).attr('class', splitter);
        console.log($('#'+chairId).attr('class'));
        console.log(seats.length);

        console.log("array seats: "+seats);

    }

    function deleteSeatById(idToDelete) {
        console.log("idToDelete: "+idToDelete);
        for (let i = 0; i < seats.length; i++) {
            if (seats[i] === idToDelete) {
                seats.splice(i, 1);
            }
        }
}
function next(){
        $.each(seats, function(index, seat){
            $('#form').append('<input type="hidden" name="'+seat+'" id="'+seat+'" value="'+seat+'">')
        });
        $('#order').click();
    }
</script>
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/book2.css') }}">
    <title>Ivan Cinema</title>
</head>

<body>
    <a href="{{ route('user.dashboard') }}" class="exit-btn">
        <button class="Btn">
            <div class="sign"><svg viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                </svg></div>
            <div class="text">BACK</div>
        </button>
    </a>
    <div class="content">
        <div class="book">
            <div class="right">

                <div class="head_time">
                    <h1 id="title">{{ $film->judul }}</h1>
                    <div class="time">
                        <h6><i class="bi bi-clock"></i> {{ $film->duration }} minutes</h6>
                    </div>
                </div>

                <div class="date_type">
                    <div class="left_card">
                        {{-- carbon format --}}
                        @php
                            $current_date = $date->copy();
                        @endphp
                        <h6 class="title">Today: {{ $date->format('l j F') }}</h6>
                        <div class="card_month crd">
                            {{-- hari pertama --}}
                                <li>
                                    <h6>{{ $current_date->format('D') }}</h6>
                                    <h6 class="date_point active" id="{{ $current_date->format('Y-m-d') }}">{{ $current_date->format('j') }}</h6>
                                </li>
                                @php
                                    $current_date->addDay();
                                @endphp

                            {{-- loop hingga end_date --}}
                                @while ($current_date <= $end_date)
                                    <li>
                                        <h6>{{ $current_date->format('D') }}</h6>
                                        <h6 class="date_point" id="{{ $current_date->format('Y-m-d') }}">{{ $current_date->format('j') }}</h6>
                                    </li>
                                    @php
                                        $current_date->addDay();
                                    @endphp
                                @endwhile

                        </div>
                        {{-- <div class="card_month crd">
                            <li>
                                <h6>Mon</h6>
                                <h6 class="date_point">20</h6>
                            </li>
                            <li>
                                <h6>Tue</h6>
                                <h6 class="date_point">21</h6>
                            </li>
                            <li>
                                <h6>Wed</h6>
                                <h6 class="date_point">22</h6>
                            </li>
                            <li>
                                <h6>Thu</h6>
                                <h6 class="date_point">23</h6>
                            </li>
                            <li>
                                <h6>Fri</h6>
                                <h6 class="date_point">24</h6>
                            </li>
                            <li>
                                <h6>Sat</h6>
                                <h6 class="date_point">25</h6>
                            </li>
                            <li>
                                <h6>Sun</h6>
                                <h6 class="date_point">26</h6>
                            </li>
                            <li>
                                <h6>Mon</h6>
                                <h6 class="date_point">27</h6>
                            </li>
                            <li>
                                <h6>Tue</h6>
                                <h6 class="date_point">28</h6>
                            </li>
                            <li>
                                <h6>Wed</h6>
                                <h6 class="date_point">29</h6>
                            </li>
                            <li>
                                <h6>Thu</h6>
                                <h6 class="date_point">30</h6>
                            </li>
                            <li>
                                <h6>Fri</h6>
                                <h6 class="date_point">1</h6>
                            </li>
                            <li>
                                <h6>Sat</h6>
                                <h6 class="date_point">2</h6>
                            </li>
                            <li>
                                <h6>Sun</h6>
                                <h6 class="date_point">3</h6>
                            </li>
                        </div> --}}
                    </div>
                    
                    <div class="right_card">
                        <h6 class="title">Show Time</h6>
                        <div class="card_month crd showtime-container">
                            {{-- <li>
                                <h6 style="padding: 0px 5px">studio1</h6>
                                <h6 class="showtime">12:30</h6>
                            </li> --}}
                        </div>
                    </div>
                </div>

                <div class="book_scroll_parent crd">
                    <div class="book_scroll">
                        <div class="screen" id="screen">
                            Screen
                        </div>

                        <!-- chairs  -->
                        {{-- <div class="chair" id="chair">
                            <div class="row">
                                <span id="6">F</span>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <span>F</span>
                            </div>
                            <div class="row">
                                <span id="5">E</span>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <span>E</span>
                            </div>
                            <div class="row">
                                <span id="4">D</span>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <span>D</span>
                            </div>
                            <div class="row">
                                <span id="3">C</span>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <span>C</span>
                            </div>
                            <div class="row">
                                <span id="2">B</span>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <span>B</span>
                            </div>
                            <div class="row">
                                <span id="1">A</span>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <li class="seat">560</li>
                                <span>A</span>
                            </div>
                        </div> --}}

                        <div class="chair" id="chair">
                            {{-- chair di append kesini ajax (done) --}}
                        </div>
                    </div>
                </div>

                <!-- Details  -->
                <div class="details" id="det">
                    <div class="details_chair">
                        <li>Avalable</li>
                        <li>Booked</li>
                        <li>Selected</li>
                    </div>
                </div>

                <div class="confirm_button" >
                    <button class="book_tic" id="book_ticket">
                        <i class="bi bi-arrow-right-short"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
{{-- hidden form --}}
<form action="{{ route('user.transaction') }}" id="form" method="post">
    @csrf
    <input type="hidden" name='film_id' id="film_id" value="{{ session('film_id') }}">
    <input type="hidden" name='cinema_id' id="cinema_id" value="{{ session('cinema_id') }}">
    <input type="hidden" name="studio_id2" id="studio_id2" value="-1">
    <input type="hidden" name="date" id="date" value="-1">
    <input type="hidden" name="time" id="timeChoose" value="-1">
    <input type="hidden" name="show_timeId" id="show_timeId" value="-1">
    <button id="order" type="submit" style="display: none;">Go</button>
</form>


    <script src="{{asset('js/book.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.js" integrity="sha512-wkHtSbhQMx77jh9oKL0AlLBd15fOMoJUowEpAzmSG5q5Pg9oF+XoMLCitFmi7AOhIVhR6T6BsaHJr6ChuXaM/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
        JsBarcode("#barcode", "J18800792023");
    </script> --}}

<script>
    $(document).ready(function(){
        var id_film = "{{ session('film_id') }}" ; //id film
        var id_cinema = "{{ session('cinema_id') }}";
        var seats = [];

        function reset(){
            seats = [];
            $('#chair').html("");
        }

        //ketika date dirubah 
        $('.date_point').click(function(){
            $('.date_point').removeClass('active');
            $(this).addClass('active');
            getStudioTime();
            reset();
            // isi form
            $('#date').val($(this).attr('id'));
            // reset form
            $("#studio_id2").val(-1);
            $("#show_timeId").val(-1);
            $("#timeChoose").val(-1);
        });
    

        // mendapatkan list showtime:studio dan time (ketika date dirubah)
        function getStudioTime(){
            var id = id_film ; //id film
            var date = $('.date_point.active').attr('id'); //date
            
            $.ajax({
                url: 'get-studio-time/' + id + "/" + date,
                type: 'get',
                success: function (response) {
                    console.log("yes")
                    console.log(response);
                    $('.showtime-container').html("");
                    $.each(response.studioTimes, function(index, studioTime) {
                        $('.showtime-container').append(`
                            <li>
                                <h6 style="padding: 0px 5px">${ studioTime.studio['name']}</h6>
                                <h6 class="showtime" id="${studioTime['id']}" studioId = "${studioTime.studio['id']}" startTime="${studioTime['start_time']}" >${studioTime['start_time'].substring(0,5)}</h6>
                            </li>
                        `);
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        // ketika showtime di klik
        $('.showtime-container').on('click', '.showtime', function(){
            $('.showtime').removeClass('active');
            $(this).addClass('active');
            var showtimeId = $(this).attr('id');
            console.log(showtimeId);
            getChair(showtimeId);
            reset();

            // reset form
            $("#studio_id2").val(-1);
            $("#show_timeId").val(-1);
            $("#timeChoose").val(-1);
            // isi form
            $("#studio_id2").val($(this).attr('studioId'));
            $("#show_timeId").val($(this).attr('id'));
            $("#timeChoose").val($(this).attr('startTime'));
            
        });


        // mendapatkan list kursi (ketika showtime dirubah)
        function getChair(showtimeId){
            var showtimeId =  showtimeId;
            
            $.ajax({
                url: 'get-chair/'+showtimeId,
                type: 'get',
                success: function (response) {
                    // clean chair
                    reset();
                    console.log(response);
                    var row = 0;
                    var endRow = 6;
                    var colNow = 1;
                    $.each(response.chairs, function(index, seat) {
                        if(colNow % 24 == 1){
                            row++;
                            colNow = 1;
                            // append row to chair
                            $('#chair').append(`
                                <div class="row row-${row}">
                                    <span id="${row}">${String.fromCharCode(64+row)}</span>
                                </div>
                            `);
                        }
                        // append to current row
                        $(`.row-${row}`).append($(`<li class='seat ${seat['chair_status'] === 0 ? "available" : "booked"}' 
                        id="${seat['id']}">${String.fromCharCode(64+row)} ${colNow}</li>`))
                        colNow++;
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        // pilih dan batalkan chair
        function setChair(id){
            var chairId =  id;

            if($('#'+chairId).hasClass('selected')){
                console.log('has selected')
                $('#'+chairId).removeClass('selected');
                deleteSeatById(chairId);
            }
            else if($('#'+chairId).hasClass('available')){
                console.log('no selected')
                $('#'+chairId).removeClass('available');
                $('#'+chairId).addClass('selected');
                seats.push(chairId);
            }

            console.log("array seats: ");
            console.log(seats)            
        }

        function deleteSeatById(idToDelete) {
            console.log("idToDelete: "+idToDelete);
            for (let i = 0; i < seats.length; i++) {
                if (seats[i] === idToDelete) {
                    seats.splice(i, 1);
                }
            }
        }

        // seat click
        $('#chair').on('click', '.seat', function(){
            var chairId = $(this).attr('id');
            console.log(chairId);
            setChair(chairId);
        });


        getStudioTime();


        // ketika submit
        $('.confirm_button').click(function(){
            console.log("yee")
            $.each(seats, function(index, seat){
                $('#form').append('<input type="hidden" name="'+seat+'" id="'+seat+'" value="'+seat+'">')
            });
            $('#order').click();
            
        });
        
    });
</script>
</body>

</html>
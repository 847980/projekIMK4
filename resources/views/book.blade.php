{{-- lanjutan untuk pilih kursi, oper data --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* back sign */
        .Btn:hover #sign {
            width: 40%;
            transition-duration: .3s;
        }

        #sign {
            width: 100%;
            transition-duration: .3s;
        }

        #sign i {
            width: 17px;
            color: #FFD369;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/book2.css') }}">
    <title>Ivan Cinema</title>
</head>

<body>
    <a href="#" class="exit-btn" onclick="window.history.back()">
        <button class="Btn">
            <div id="sign">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </div>
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
                                <h6 class="date_point active now" id="{{ $current_date->format('Y-m-d') }}">
                                    {{ $current_date->format('j') }}
                                </h6>
                            </li>
                            @php
                                $current_date->addDay();
                            @endphp

                            {{-- loop hingga end_date --}}
                            @while ($current_date <= $end_date)
                                                        <li>
                                                            <h6>{{ $current_date->format('D') }}</h6>
                                                            <h6 class="date_point" id="{{ $current_date->format('Y-m-d') }}">
                                                                {{ $current_date->format('j') }}
                                                            </h6>
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

                <div class="confirm_button d-flex flex-row align-items-center">
                    <div id="harga" class="money align-self-end" style="color: white;"></div>
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
        <input type="hidden" name='film_id' id="film_id" value="{{ $film->id }}">
        <input type="hidden" name='film_judul' id="film_judul" value="{{ $film->judul }}">
        <input type="hidden" name='film_age' id="film_age" value="{{ $film->age_cat }}">
        <input type="hidden" name='film_min' id="film_min" value="{{ $film->duration }}">
        <input type="hidden" name='film_genre' id="film_genre" value="{{ $_POST['genre'] }}">
        <input type="hidden" name='film_genreID' id="film_genreID" value="{{ $_POST['genre_id'] }}">
        <input type="hidden" name='poster' id="poster" value="{{ $_POST['poster'] }}">
        <input type="hidden" name='cinema_id' id="cinema_id" value="{{ session('cinema_id') }}">
        <input type="hidden" name="studio_id2" id="studio_id2" value="-1">
        <input type="hidden" name="date" id="date2" value="{{ $date->format('Y-m-d') }}">
        <input type="hidden" name="time" id="timeChoose" value="-1">
        <input type="hidden" name="cinemaName" id="cinemaName" value="">
        <button id="order" type="submit" style="display: none;">Go</button>
    </form>


    <script src="{{ asset('js/book.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.js"
        integrity="sha512-wkHtSbhQMx77jh9oKL0AlLBd15fOMoJUowEpAzmSG5q5Pg9oF+XoMLCitFmi7AOhIVhR6T6BsaHJr6ChuXaM/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{--
    <script>
        JsBarcode("#barcode", "J18800792023");
    </script> --}}

    <script>
        $(document).ready(function () {
            var id_film = "{{ session('film_id') }}"; //id film
            var id_cinema = "{{ session('cinema_id') }}";
            var cinema_name = "";
            var studio_name = "";
            var price = 0;
            var seats = [];
            var nums = [];

            function reset() {
                seats = [];
                $('#chair').html("");
            }
            $('#date').val($('.date_point.active').attr('id'));

            //ketika date dirubah 
            $('.date_point').click(function () {
                if ($(this).hasClass('now')) {
                    // console log this class
                    return;
                }
                $('.date_point').removeClass('active now');
                $(this).addClass('active now');
                reset();
                getStudioTime();
                // isi form
                $('#date').val($(this).attr('id'));
                // reset form
                $("#studio_id2").val(-1);
                $("#show_timeId").val(-1);
                $("#timeChoose").val(-1);
            });


            // mendapatkan list showtime:studio dan time (ketika date dirubah)
            function getStudioTime() {
                var id = id_film; //id film
                var date = $('.date_point.active').attr('id'); //date

                $.ajax({
                    url: 'get-studio-time/' + id + "/" + date,
                    type: 'get',
                    success: function (response) {
                        console.log(response);
                        $('.showtime-container').html("");
                        let first = true;
                        $.each(response.studioTimes, function (index, studioTime) {
                            if (first) {
                                first = false;
                                $('.showtime-container').append(`
                            <li>
                                <h6 style="padding: 0px 5px">${studioTime.studio['name']}</h6>
                                <h6 data-cinemaName="${studioTime.cinema['name']}" data-price=${studioTime['price']} data-studioName="${studioTime.studio['name']}" class="showtime active" id="${studioTime['id']}" studioId = "${studioTime.studio['id']}" startTime="${studioTime['start_time']}" >${studioTime['start_time'].substring(0, 5)}</h6>
                            </li>
                        `       );
                            } else {
                                $('.showtime-container').append(`
                            <li>
                                <h6 style="padding: 0px 5px">${studioTime.studio['name']}</h6>
                                <h6 data-cinemaName="${studioTime.cinema['name']}" data-price=${studioTime['price']} data-studioName="${studioTime.studio['name']}" class="showtime" id="${studioTime['id']}" studioId = "${studioTime.studio['id']}" startTime="${studioTime['start_time']}" >${studioTime['start_time'].substring(0, 5)}</h6>
                            </li>
                        `);
                            }
                        });
                        firstTime();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

            function firstTime() {
                var showtimeId = $('.showtime').attr('id');
                let cinName = $('.showtime').attr('data-cinemaName');
                let stuName = $('.showtime').attr('data-studioName');
                let pri = $('.showtime').attr('data-price');
                price = pri;
                console.log($('.showtime').attr('data-price'));
                $('#form').append('<input type="hidden" name="studioName" id="studioName" value="' +
                    stuName + '">')
                $('#form').append('<input type="hidden" name="cinemaName" id="cinemaName" value="' +
                    cinName + '">')
                $('#form').append('<input type="hidden" name="film_price" id="film_price" value="' + pri +
                    '">')
                getChair(showtimeId);

                var currencyValue = parseInt(price);
                var formattedCurrency = currencyValue.toLocaleString('en-US');
                console.log(formattedCurrency);
                $('#harga').html("$ " + formattedCurrency + " /seat");
                console.log(price);

                reset();
                $("#studio_id2").val($('.showtime').attr('studioId'));
                $("#show_timeId").val($('.showtime').attr('id'));
                $("#timeChoose").val($('.showtime').attr('startTime'));
            };
            // ketika showtime di klik
            $('.showtime-container').on('click', '.showtime', function () {
                console.log("ye");
                if ($(this).hasClass('now')) {
                    return;
                }
                $('.showtime').removeClass('active now');
                $(this).addClass('active now');
                var showtimeId = $(this).attr('id');
                console.log(showtimeId);
                let cinName = $(this).attr('data-cinemaName');
                let stuName = $(this).attr('data-studioName');
                let pri = $(this).attr('data-price');
                price = pri;
                //         <input type="hidden" name="studioName" id="studioName" value="">
                // <input type="hidden" name="price" id="price" value="0">
                // <input type="hidden" name="show_timeId" id="show_timeId" value="-1">
                $('#form').append('<input type="hidden" name="studioName" id="studioName" value="' +
                    stuName + '">')
                $('#form').append('<input type="hidden" name="cinemaName" id="cinemaName" value="' +
                    cinName + '">')
                $('#form').append('<input type="hidden" name="film_price" id="film_price" value="' + pri +
                    '">')
                getChair(showtimeId);

                var currencyValue = parseInt(price);
                var formattedCurrency = currencyValue.toLocaleString('en-US');
                console.log(formattedCurrency);
                $('#harga').html("$ " + formattedCurrency + " /seat");
                console.log(price);

                reset();

                // // reset form
                // $("#studio_id2").val(-1);
                // $("#show_timeId").val(-1);
                // $("#timeChoose").val(-1);
                // isi form
                $("#studio_id2").val($(this).attr('studioId'));
                $("#show_timeId").val($(this).attr('id'));
                $("#timeChoose").val($(this).attr('startTime'));

            });


            // mendapatkan list kursi (ketika showtime dirubah)
            function getChair(showtimeId) {
                var showtimeId = showtimeId;

                $.ajax({
                    url: 'get-chair/' + showtimeId,
                    type: 'get',
                    success: function (response) {
                        // clean chair
                        reset();
                        console.log(response);
                        var row = 0;
                        var endRow = 6;
                        var colNow = 1;
                        $.each(response.chairs, function (index, seat) {
                            if (colNow % 24 == 1) {
                                row++;
                                colNow = 1;
                                // append row to chair
                                $('#chair').append(`
                                <div class="row row-${row}">
                                    <span id="${row}">${String.fromCharCode(64 + row)}</span>
                                </div>
                            `);
                            }
                            // append to current row
                            $(`.row-${row}`).append($(
                                `<li class='seat ${seat['chair_status'] === 0 ? "available" : "booked"}' 
                        id="${seat['id']}"  data-num="${seat.chair_number}">${String.fromCharCode(64 + row)} ${colNow}</li>`
                            ))
                            colNow++;
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

            // pilih dan batalkan chair
            function setChair(id, num) {
                var chairId = id;

                if ($('#' + chairId).hasClass('selected')) {
                    console.log('has selected')
                    $('#' + chairId).removeClass('selected');
                    $('#' + chairId).addClass('available');
                    deleteSeatById(chairId, num);
                } else if ($('#' + chairId).hasClass('available')) {
                    console.log('no selected')
                    $('#' + chairId).removeClass('available');
                    $('#' + chairId).addClass('selected');
                    seats.push(chairId);
                    nums.push(num);
                }

                console.log("array seats: ");
                console.log(seats);
                console.log(nums);
            }

            function deleteSeatById(idToDelete, num) {
                console.log("idToDelete: " + idToDelete);
                for (let i = 0; i < seats.length; i++) {
                    if (seats[i] === idToDelete) {
                        seats.splice(i, 1);
                        nums.splice(nums.indexOf(num), 1);
                    }
                }
            }

            // seat click
            $('#chair').on('click', '.seat', function () {
                var chairId = $(this).attr('id');
                var chairNum = $(this).attr('data-num');
                setChair(chairId, chairNum);
            });


            getStudioTime();


            // ketika submit
            $('.confirm_button').click(function () {
                var date = $("#date2").val();
                var studio = $("#studio_id2").val();
                var showtime = $("#show_timeId").val();
                var time = $("#timeChoose").val();

                if (date == -1 || studio == -1 || showtime == -1 || time == -1) {
                    Swal.fire({
                        text: "Please choose date, studio, and showtime",
                        icon: "warning",
                        confirmButtonText: 'OK'
                    });
                    // alert("Please choose date, studio, and showtime")
                    return;
                }
                if (seats.length <= 0) {
                    Swal.fire({
                        text: "Please choose at least one seat",
                        icon: "warning",
                        confirmButtonText: 'OK'
                    });
                    // alert("Please choose at least one seat")
                    return;
                }
                $.each(seats, function (index, seat) {
                    $('#form').append('<input type="hidden" name="' + seat + '" id="' + seat +
                        '" value="' + seat + '">')
                });
                let numString = nums.join(", ");
                $('#form').append('<input type="hidden" name="numSeatStr" id="numSeatStr" value="' +
                    numString + '">');
                $('#order').click();

            });

        });
    </script>
</body>

</html>
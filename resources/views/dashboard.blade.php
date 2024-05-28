<!-- penanda navbar -> sdg aktif dmn blm ada -->
<script>
    var success = "{{ $title }}";
    console.log("{{ $title }}");
</script>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Cinema Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>


<body>
    <header>
        <div id="menu-icon" class='bx bx-menu'></div>
        <ul class="navbar">
            <li><a href="#home" class="home-active">HOME</a></li>
            <li><a href="#movies">MOVIES</a></li>
            <li><a href="#coming">COMING</a></li>
            <li><a href="#newsletter">NEWSLETTER</a></li>
            <li><a href="{{ route('user.profile') }}" id="profile">PROFILE</a></li>
            <li><a href="{{ route('logout') }}" id="logout">LOGOUT</a></li>
        </ul>
    </header>
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <div class="swiper-slide container">
                <img src="{{ asset('storage/assets/starwars.jpg') }}">
                <div class="swiper-overlay">
                    <div class="home-text">
                        <span>Lucasfilm</span>
                        <h1>Star Wars</h1>
                        <a href="/detail" class="btn">TRAILER</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="{{ asset('storage/assets/avatar.jpg') }}">
                <div class="swiper-overlay">
                    <div class="home-text">
                        <span>20th Century Fox</span>
                        <h1>Avatar</h1>
                        <a href="/detail" class="btn">TRAILER</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="{{ asset('storage/assets/spirited.png') }}">
                <div class="swiper-overlay">
                    <div class="home-text">
                        <span>Studio Ghibli</span>
                        <h1>Spirited Away</h1>
                        <a href="/detail" class="btn">TRAILER</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </section>


    <div class="flex-container">
        <div class="wrapper">
            <div class="dropdown">
                <label for="cityDropdown">City&emsp;</label>
                <select id="cityDropdown" onchange="getCinema()">

                </select>
            </div>
        </div>


        <div class="wrapper">
            <div class="dropdown">
                <label for="cinemaDropdown">Cinema&ensp;</label>
                <select id="cinemaDropdown" onchange="getFilm()">
                </select>
            </div>
        </div>
    </div>


    <section class="movies" id="movies">
        <h2 class="heading">Playing Now</h2>
        <div class="movies-container" id="movies-container">
            {{-- Playing Now --}}
        </div>
    </section>


    <section class="coming" id="coming">
        <h2 class="heading">Coming Soon</h2>
        <div class="movies-container" id="coming-movies-container">
            <div class="box">
                <div class="box-img">
                    <img src="{{ asset('storage/assets/film5_potrait.jpg') }}">
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="{{ asset('storage/assets/film4_potrait.jpg') }}">
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="{{ asset('storage/assets/film3_potrait.jpg') }}">
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="{{ asset('storage/assets/film2_potrait.jpg') }}">
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="{{ asset('storage/assets/film1_potrait.jpg') }}">
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var movieDescElements = document.querySelectorAll('.movie-desc');


            movieDescElements.forEach(function (descElement) {
                var maxLength = 100; // Set the maximum length to 10 characters
                var originalText = descElement.textContent.trim();


                if (originalText.length > maxLength) {
                    var trimmedText = originalText.substring(0, maxLength) + '...';
                    descElement.textContent = trimmedText;
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}" defer></script>


    <section class="newsletter" id="newsletter">
        <footer>
            <div class="col">
                <h4>FOLLOW US ON</h4>
                <div class="social">
                    <a href="https://www.instagram.com/alicia.claresta31?igsh=MXR4MmRibGYwbXhleg==" target="_blank"
                        class="social-icons"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </footer>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        loadCity();
        console.log(success);
        if (success == "Success") {
            alert("Payment Success")
            window.location.href = "http://127.0.0.1:8000/user/dashboard#home";
            // console.log($("#back").click());
        };

    });


    function loadCity() {
        $.ajax({
            url: 'get-cities',
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.cities, function (index, city) {
                    $('#cityDropdown').append($('<option>', {
                        value: city.id,
                        text: city.name
                    }));
                });
                getCinema();
            },
            error: function (error) {
                console.log(error);
            }
        });
    };
    // <option hidden disabled selected value="">--Silahkan Pilih Waktu--</option>


    function getCinema() {
        $('#movies-container').html("");
        $("#cinemaDropdown").find("option").remove();
        $('#cinemaDropdown').append($('<option>', {
            value: '',
            text: "-- Select Cinema --",
            selected: false,
            disabled: true,
            hidden: true
        }));
        var id = $("#cityDropdown").val();
        console.log(id);
        $.ajax({
            url: 'get-cinemas/' + id,
            type: 'get',
            success: function (response) {
                console.log(response);

                $.each(response.cinemas, function (index, cinema) {
                    $('#cinemaDropdown').append($('<option>', {
                        value: cinema.id,
                        text: cinema.name
                    }));
                });
                getFilm();
            },
            error: function (error) {
                console.log(error);
            }
        });
    };
    function getFilm() {
        $('#movies-container').html("");
        var cinemaId = $("#cinemaDropdown").val();
        console.log(cinemaId);
        $.ajax({
            url: 'get-films-lengkap/' + cinemaId,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (!response.success) {
                    $("#movies-container").append(`
                        <div class='box-none' data-aos='fade-up' data-aos-duration='2500'>
                            <h3>There is no movie playing in this cinema from today until ${response.until}</h3>
                        </div>
                    `)
                }

                $.each(response.films, function (index, film) {
                    $('#movies-container').append(
                        "<div class='box' data-aos='fade-up' data-aos-duration='2500'>" +
                        "<div class='box-img'>" +
                        `<img src = "{{ asset('storage/assets/${film[0].poster_potrait}')}}" alt= "${film[0].judul}" >`+
                        "<form action='{{ route('user.detail') }}' method='post'>" +
                        "<input type='hidden' name='_token' value='{{ csrf_token() }}' autocomplete='off'>" +
                        "<div class='overlay'>" +
                        "<input type='hidden' name='film_id' value='" + film[0].id + "'>" +
                        "<input type='hidden' name='cinema_id' value='" + cinemaId + "'>" +
                        "<p class='movie-desc'>" + film[0].description + "</p>" +
                        "<button class='btn btn-primary'>Detail</button>" +
                        "</div>" +
                        "</div>" +
                        "<h3>" + film[0].judul + "</h3>" +
                        "<span>" + film[0].name + " | " + film[0].age_cat + "</span>" +
                        "</form>" +
                        "</div>");
                })
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Cinema Homepage</title>
    <link rel="stylesheet" href="css/home.css">
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
            <li><a href="/profile" id="profile" style="display: none;">PROFILE</a></li>
            <li><a href="/login" id="signin" style="display: inline;">SIGN IN</a></li>
        </ul>
    </header>

    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <div class="swiper-slide container">
                <img src="{{ asset('storage/assets/starwars.jpg') }}">
                <div class="home-text">
                    <span>Lucasfilm</span>
                    <h1>Star Wars</h1>
                    <a href="/detail" class="btn">BOOK NOW</a>                    
                    <a href="https://youtu.be/bD7bpG-zDJQ?si=ab3C2pS0hBNuPGH_" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>      
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="{{ asset('storage/assets/avatar.jpg') }}">
                <div class="home-text">
                    <span>20th Century Fox</span>
                    <h1>Avatar</h1>
                    <a href="/detail" class="btn">BOOK NOW</a>
                    <a href="https://youtu.be/5PSNL1qE6VY?si=x2aIZjZ-rwnZYqCp" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="{{ asset('storage/assets/spirited.png') }}">
                <div class="home-text">
                    <span>Studio Ghibli</span>
                    <h1>Spirited Away</h1>
                    <a href="/detail" class="btn">BOOK NOW</a>
                    <a href="https://youtu.be/ByXuk9QqQkk?si=qYtpG3GYmT0xUZ_2" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>
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
                <label for="cinemaDropdown" >Cinema&ensp;</label>
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
        <div class="coming-container swiper">
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="{{ asset('storage/assets/starwars.jpg') }}">
                </div>
            </div>
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="{{ asset('storage/assets/avatar.jpg') }}">
                </div>
            </div>
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="{{ asset('storage/assets/spirited.png') }}">
                </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/home.js" defer></script>

    <section class="newsletter" id="newsletter">
        <footer>
            <div class="col">
                <h4>FOLLOW US ON</h4>
                <div class="social">
                    <a href="#" class="social-icons"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </footer>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
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
function getCinema(){
            $('#movies-container').html("");
            $("#cinemaDropdown").find("option").remove();
            $('#cinemaDropdown').append($('<option>', {
                        value: '-1',  
                        text: " ",
                        selected: true  
                    }));
            var id = $("#cityDropdown").val();
            console.log(id);
            $.ajax({
            url: 'get-cinemas/'+id,
            type: 'get',
            success: function (response) {
                console.log(response);
                $.each(response.cinemas, function(index, cinema) {
                    $('#cinemaDropdown').append($('<option>', {
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
    function getFilm(){ //berubah************************************
            $('#movies-container').html("");
            var cinemaId = $("#cinemaDropdown").val();
            console.log(cinemaId);
            $.ajax({
            url: 'get-films-lengkap/'+cinemaId,
            type: 'get',            
            success: function (response) {
                console.log(response);
                $.each(response.films, function(index, film){
                    
                    // $('#movies-container').append(
                    //     "<form action='{{ route('user.get-detail') }}' method='post'> " +
                    //     "<input type='hidden' name='_token' value='{{ csrf_token() }}' autocomplete='off'>"+
                    //     "<div data-aos='fade-up' data-aos-duration='2500'>" +
                    //     "<div class='box-img'>" + "<img src='" + {{ asset('storage/assets/spirited.png') }} + "'>" +
                    //     "</div>" +
                    //     "</div>" +
                    //     "</form>");
                    $('#movies-container').append(
                        "<div data-aos='fade-up' data-aos-duration='2500'>" +
                        "<div class='box-img'>"+"<img src='" + "{{ asset('storage/assets/spirited.png') }}" + "'>" +
                        "<form action='{{ route('user.get-detail') }}' method='post'> " +
                        "<input type='hidden' name='_token' value='{{ csrf_token() }}' autocomplete='off'>"+
                        "<p> " + film[0][0].judul + " " + film[0][0].name +" "+ film[0][0].age_cat + "<br>"+ film[0][0].description +
                        "<input type='hidden' name='film_id' value='"+film[0][0].id+"'>"+
                        "<input type='hidden' name='cinema_id' value='"+cinemaId+"'>"+
                        "<br><button class='btn btn-primary'>Buy Ticket</button>"
                        + "</p>"+ "</form>"+"</div>"+"</div>");
                })

                


        //         `<div data-aos="fade-up" data-aos-duration="2500">
        // //                 <div class="box-img">
        // //                     <img src="${item.img}">
        // //                     <div class="overlay">
        // //                         <p class="movie-desc">${item.desc}</p>
        // //                         <a href="/detail" class="btn-mov">BOOK</a>
        // //                     </div>
        // //                 </div>
        // //                 <h3>${item.title}</h3>
        // //                 <span>${item.duration} | ${item.genre}</span>
        // //             </div>`;
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>
</html>
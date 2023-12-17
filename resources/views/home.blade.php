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

    <script>
        // const cities = ["Select City", "City 1", "City 2", "City 3"];
        // const cinemas = {
        //     "Select City": {
        //         "Select Cinema": []
        //         //kasi select all
        //     },
        //     "City 1": {
        //         "Cinema 1A": [
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
        //         ],
        //         "Cinema 1B": [
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
        //         ]
        //     },
        //     "City 2": {
        //         "Cinema 2A": [
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
        //         ]
        //     },
        //     "City 3": {
        //         "Cinema 3A": [
        //                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
        //         ],
        //         "Cinema 3B": [
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
        //         ],
        //         "Cinema 3C": [
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
        //             { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
        //         ]
        //     }
        // };

        // function populateCities() {
        //     const cityDropdown = document.getElementById("cityDropdown");
        //     if (!cityDropdown) {
        //         console.error("City dropdown not found");
        //         return;
        //     }

        //     const cinemaDropdown = document.getElementById("cinemaDropdown");
        //     const selectedCity = cityDropdown.value;
        //     const cinemaOptions = Object.keys(cinemas[selectedCity] || {});

        //     cinemaDropdown.innerHTML = '';
        //     cinemaOptions.forEach(cinema => {
        //         const option = document.createElement("option");
        //         option.text = cinema;
        //         cinemaDropdown.add(option);
        //     });
        //     showMovies();
        // }
        
        // function showMovies() {
        //     const selectedCity = document.getElementById("cityDropdown").value;
        //     const selectedCinema = document.getElementById("cinemaDropdown").value;
        //     const moviesContainer = document.querySelector(".movies-container");

        //     moviesContainer.innerHTML = '';

        //     if (selectedCity === "Select City" || selectedCinema === "Select Cinema") {
        //         const initialCinemaMovies = getMoviesForCityAndCinema("City 1", "Cinema 1A");
        //         updateMovie(moviesContainer, initialCinemaMovies);
        //     } else {
        //         const cinemaMovies = getMoviesForCityAndCinema(selectedCity, selectedCinema);
        //         updateMovie(moviesContainer, cinemaMovies);
        //     }
        // }

        // function getMoviesForCityAndCinema(city, cinema) {
        //     return cinemas[city][cinema];
        // }

        // function updateMovie(container, data) {
        //     container.innerHTML = '';
        //     data.forEach((item, index) => {
        //         const movieElement = document.createElement("div");
        //         movieElement.className = "box";
        //         movieElement.innerHTML =
        //             `<div data-aos="fade-up" data-aos-duration="2500">
        //                 <div class="box-img">
        //                     <img src="${item.img}">
        //                     <div class="overlay">
        //                         <p class="movie-desc">${item.desc}</p>
        //                         <a href="/detail" class="btn-mov">BOOK</a>
        //                     </div>
        //                 </div>
        //                 <h3>${item.title}</h3>
        //                 <span>${item.duration} | ${item.genre}</span>
        //             </div>`;
        //         container.appendChild(movieElement);
        //     });
        // }

        // const moviesContainer = document.querySelector('.movies-container');

        // const initialCity = "City 1";
        // const initialCinema = "Cinema 1A";
        // const initialCinemaMovies = getMoviesForCityAndCinema(initialCity, initialCinema);
        // updateMovie(moviesContainer, initialCinemaMovies);

        // const cityDropdown = document.getElementById("cityDropdown");
        // const cinemaDropdown = document.getElementById("cinemaDropdown");

        // if (cityDropdown && cinemaDropdown) {
        //     cityDropdown.addEventListener("change", populateCities);
        //     cinemaDropdown.addEventListener("change", showMovies);
        // }
        // populateCities();
    </script>
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
                <img src="assets/starwars.jpg">
                <div class="home-text">
                    <span>Lucasfilm</span>
                    <h1>Star Wars</h1>
                    <a href="/detail" class="btn">BOOK NOW</a>                    
                    <a href="https://youtu.be/bD7bpG-zDJQ?si=ab3C2pS0hBNuPGH_" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>      
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="assets/avatar.jpg">
                <div class="home-text">
                    <span>20th Century Fox</span>
                    <h1>Avatar</h1>
                    <a href="/detail" class="btn">BOOK NOW</a>
                    <a href="https://youtu.be/5PSNL1qE6VY?si=x2aIZjZ-rwnZYqCp" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="assets/spirited.png">
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
                <select id="cityDropdown" onchange="populateCities()">
                    <script>
                        const cities = ["Select City", "City 1", "City 2", "City 3"];
                        cities.forEach(city => {
                            document.write(`<option value="${city}">${city}</option>`);
                        });
                    </script>
                </select>
            </div>
        </div>
        <div class="wrapper">    
            <div class="dropdown">
                <label for="cinemaDropdown">Cinema&ensp;</label>
                <select id="cinemaDropdown">
                </select>
            </div>
        </div>    
    </div>

    <section class="movies" id="movies">
        <h2 class="heading">Playing Now</h2>
        <div class="movies-container">
            {{-- Playing Now --}}
        </div>
    </section>

    <section class="coming" id="coming">
        <h2 class="heading">Coming Soon</h2>
        <div class="coming-container swiper">
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="assets/starwars.jpg">
                </div>
            </div>
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="assets/avatar.jpg">
                </div>
            </div>
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="assets/spirited.png">
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

</html>
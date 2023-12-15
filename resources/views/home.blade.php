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
        const cities = ["Select City", "City 1", "City 2", "City 3"];
        const cinemas = {
            "Select City": ["Select Cinema"],
            "City 1": ["Cinema 1A", "Cinema 1B"],
            "City 2": ["Cinema 2A", "Cinema 2B", "Cinema 2C"],
            "City 3": ["Cinema 3A", "Cinema 3B", "Cinema 3C", "Cinema 3D"]
        };

        function populateCities() {
            const cityDropdown = document.getElementById("cityDropdown");
            const cinemaDropdown = document.getElementById("cinemaDropdown");
            const selectedCity = cityDropdown.value;
            cinemaDropdown.innerHTML = '';
            const cinemaOptions = cinemas[selectedCity] || [];
            cinemaOptions.forEach(cinema => {
                const option = document.createElement("option");
                option.text = cinema;
                cinemaDropdown.add(option);
            });
        }

        function showMovies() {
            const selectedCity = document.getElementById("cityDropdown").value;
            const selectedCinema = document.getElementById("cinemaDropdown").value;
            const moviesContainer = document.querySelector(".movies-container");

            moviesContainer.innerHTML = '';

            const movies = getMoviesForCityAndCinema(selectedCity, selectedCinema);

            movies.forEach(movie => {
                const movieElement = createMovieElement(movie);
                moviesContainer.appendChild(movieElement);
            });
        }


        //fungsi ini aku krg tau soale liak gpt :(
        function getMoviesForCityAndCinema(city, cinema) {
            const cityCinemas = cinemas[city] || [];
            if (cityCinemas.includes(cinema)) {
                switch (cinema) {
                    case "Cinema 1A":
                        return [
                            { title: "Movie A1", duration: "120 min", genre: "Action" },
                            { title: "Movie A2", duration: "110 min", genre: "Drama" },
                            // Add more movies as needed
                        ];
                    // Add cases for other cinemas
                    // ...
                }
            } else {
                return [];
            }
        }

        function createMovieElement(movie) {
            const movieElement = document.createElement("div");
            movieElement.className = "box";
            movieElement.innerHTML = 
                `<div data-aos="fade-up" data-aos-duration="2500">
                    <div class="box-img">
                        <img src="assets/insidious.jpg"> //POSTER
                        <div class="overlay">
                            <p class="movie-desc">DESKRIPSI</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>JUDUL FILM</h3>
                    <span>DURASI | GENRE</span>
                </div>`;                
            return movieElement;
        }

        if (cityDropdown && cinemaDropdown) {
            cityDropdown.addEventListener("change", () => {
                populateCities();
                showMovies(); 
            });

            cinemaDropdown.addEventListener("change", () => {
                populateCities();
                showMovies(); 
            });
        }
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
            <li><a href="#newsletter"></i>SIGN IN</a></li>
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
            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">                
                    <div class="box-img">
                        <img src="assets/starwars.jpg">
                        <div class="overlay">
                            <p class="movie-desc">The heroic development of Luke Skywalker as a Jedi and his fight
                                against Palpatine's Galactic Empire alongside his sister, Leia</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Star Wars</h3>
                    <span>136 min | Action</span>
                </div>
            </div>

            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">                
                    <div class="box-img">
                        <img src="assets/avatar.jpg">
                        <div class="overlay">
                            <p class="movie-desc">A paraplegic Marine dispatched to the moon Pandora on a unique mission
                                becomes torn between following his orders and protecting the world he feels is his home
                            </p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Avatar</h3>
                    <span>162 min | Adventure</span>
                </div>
            </div>

            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">
                    <div class="box-img">
                        <img src="assets/spirited.png">
                        <div class="overlay">
                            <p class="movie-desc">10-year-old girl who wanders into a world ruled by witches and
                                spirits, where humans are changed into animals</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Spirited Away</h3>
                    <span>125 min | Drama</span>
                </div>
            </div>

            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">
                    <div class="box-img">
                        <img src="assets/before.jpg">
                        <div class="overlay">
                            <p class="movie-desc">A girl in a small town forms an unlikely bond with a
                                recently-paralyzed man she's taking care of</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Me Before You</h3>
                    <span>110 min | Romance</span>
                </div>
            </div>

            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">
                    <div class="box-img">
                        <img src="assets/insidious.jpg">
                        <div class="overlay">
                            <p class="movie-desc">A gripping story of a family in search of help for their son, Dalton,
                                who fell into a coma after a mysterious incident in the attic</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Insidious</h3>
                    <span>103 min | Horror</span>
                </div>
            </div>

            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">
                    <div class="box-img">
                        <img src="assets/cinder.jpg">
                        <div class="overlay">
                            <p class="movie-desc">A live-action retelling of the classic fairytale about a servant
                                stepdaughter who is abused by her jealous stepmother and stepsisters after her father
                                died</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Cinderella</h3>
                    <span>105 min | Romance</span>
                </div>
            </div>

            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">
                    <div class="box-img">
                        <img src="assets/trans.jpg">
                        <div class="overlay">
                            <p class="movie-desc">A deadly threat from Earth's history reappears and a hunt for a lost
                                artifact takes place between Autobots and Decepticons</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Transformer: The Last Knight</h3>
                    <span>148 min | Action</span>
                </div>
            </div>

            <div class="box">
                <div data-aos="fade-up" data-aos-duration="2500">
                    <div class="box-img">
                        <img src="assets/pixel.jpg">
                        <div class="overlay">
                            <p class="movie-desc">When aliens misinterpret video feeds of classic arcade games as a
                                declaration of war, they attack the Earth in the form of the video games</p>
                            <a href="/detail" class="btn-mov">BOOK</a>
                        </div>
                    </div>
                    <h3>Pixels</h3>
                    <span>105 min | Comedy</span>
                </div>
            </div>
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
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="assets/before.jpg">
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
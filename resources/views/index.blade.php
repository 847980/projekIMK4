
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
</head>

<body>
    <header id="header">
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="#home" class="home-active">HOME</a></li>
            <li><a href="#movies">MOVIES</a></li>
            <li><a href="#coming">COMING</a></li>
            <li><a href="#newsletter">NEWSLETTER</a></li>
        </ul>
        <a href="#" class="btn">SIGN IN</a>
    </header>

    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <div class="swiper-slide container">
                <img src="assets/starwars.jpg">
                <div class="home-text">
                    <span>Lucasfilm</span>
                    <h1>Star Wars</h1>
                    <a href="#" class="btn">BOOK NOW</a>
                    <a href="https://youtu.be/bD7bpG-zDJQ?si=ab3C2pS0hBNuPGH_" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="assets/avatar.jpg">
                <div class="home-text">
                    <span>20th Century Fox</span>
                    <h1>Avatar</h1>
                    <a href="#" class="btn">BOOK NOW</a>
                    <a href="https://youtu.be/5PSNL1qE6VY?si=x2aIZjZ-rwnZYqCp" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="assets/spirited.png">
                <div class="home-text">
                    <span>Studio Ghibli</span>
                    <h1>Spirited Away</h1>
                    <a href="#" class="btn">BOOK NOW</a>
                    <a href="https://youtu.be/ByXuk9QqQkk?si=qYtpG3GYmT0xUZ_2" class="btn btn-primary"><i
                            class='bx bx-play'></i></a>
                    <!-- <a href="#" class="btn">BOOK NOW</a>
                    <a href="https://youtu.be/ByXuk9QqQkk?si=qYtpG3GYmT0xUZ_2" class="play"><i class='bx bx-play'></i></a> -->
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </section>

    <section class="movies" id="movies">
        <h2 class="heading">Playing Now</h2>
        <div class="movies-container">
            <div class="box">
                <div class="box-img">
                    <img src="assets/starwars.jpg">
                    <div class="overlay">
                        <p class="movie-desc">The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>
                </div>
                <h3>Star Wars</h3>
                <span>136 min | Action</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="assets/avatar.jpg">
                    <div class="overlay">
                        <p class="movie-desc">A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>                    
                </div>
                <h3>Avatar</h3>
                <span>162 min | Adventure</span>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="assets/spirited.png">
                    <div class="overlay">
                        <p class="movie-desc">10-year-old girl who wanders into a world ruled by witches and spirits, where humans are changed into animals</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>
                </div>
                <h3>Spirited Away</h3>
                <span>125 min | Drama</span>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="assets/before.jpg">
                    <div class="overlay">
                        <p class="movie-desc">A girl in a small town forms an unlikely bond with a recently-paralyzed man she's taking care of</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>
                </div>
                <h3>Me Before You</h3>
                <span>110 min | Romance</span>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="assets/insidious.jpg">
                    <div class="overlay">
                        <p class="movie-desc">A gripping story of a family in search of help for their son, Dalton, who fell into a coma after a mysterious incident in the attic</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>                    
                </div>
                <h3>Insidious</h3>
                <span>103 min | Horror</span>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="assets/cinder.jpg">
                    <div class="overlay">
                        <p class="movie-desc">A live-action retelling of the classic fairytale about a servant stepdaughter who is abused by her jealous stepmother and stepsisters after her father died</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>                    
                </div>
                <h3>Cinderella</h3>
                <span>105 min | Romance</span>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="assets/trans.jpg">
                    <div class="overlay">
                        <p class="movie-desc">A deadly threat from Earth's history reappears and a hunt for a lost artifact takes place between Autobots and Decepticons</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>
                </div>
                <h3>Transformer: The Last Knight</h3>
                <span>148 min | Action</span>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="assets/pixel.jpg">
                    <div class="overlay">
                        <p class="movie-desc">When aliens misinterpret video feeds of classic arcade games as a declaration of war, they attack the Earth in the form of the video games</p>
                        <a href="#" class="btn-mov">BOOK</a>
                    </div>    
                </div>
                <h3>Pixels</h3>
                <span>105 min | Comedy</span>
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
                <h3>Star Wars</h3>
            </div>
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="assets/avatar.jpg">
                </div>
                <h3>Avatar</h3>
            </div>
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="assets/spirited.png">
                </div>
                <h3>Spirited Away</h3>
            </div>
            <div class="box-coming">
                <div class="box-img-coming">
                    <img src="assets/before.jpg">
                </div>
                <h3>Me Before You</h3>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/home.js"></script>

    <section class="newsletter" id="newsletter">
        <footer>
            <div class="col">
                <h4>FOLLOW US ON</h4>
                <div class="social">
                    <a href="#" class="social-icons"><i class='bx bxl-instagram' ></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-youtube' ></i></a>
                </div>
            </div>
        </footer>
    </section>
</body>
</html>
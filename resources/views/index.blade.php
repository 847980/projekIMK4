<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Cinema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Chivo&display=swap');

        * {
            font-family: "Chivo";
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            scroll-padding-top: 2rem;
            scroll-behavior: smooth;
        }

        :root {
            --main-color: rgb(255, 211, 105);
            --text-color: rgb(34, 40, 49);
            --text-color-light: rgb(57, 62, 70);
            --bg-color: rgb(238, 238, 238);
        }

        body {
            background: var(--text-color);
            color: var(--bg-color);
        }

        section {
            padding: 4.5rem 0 1.5rem;
        }

        /* NAVBAR */
        header {
            position: fixed;
            width: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 100px;
            transition: 0.5s;
            background-color: rgba(57, 62, 70, 0.7);
        }

        .navbar {
            display: flex;
            column-gap: 5rem;
            overflow: hidden;
        }

        .navbar li {
            position: relative;
        }

        .navbar a {
            font-size: 1rem;
            font-weight: 500;
            color: var(--bg-color);
        }

        .navbar a::after {
            content: '';
            width: 0;
            height: 2px;
            background: var(--main-color);
            position: absolute;
            bottom: -4px;
            left: 0;
            transition: 0.4s all linear;
        }

        .navbar a:hover::after

        /* , .navbar .home-active::after */
            {
            width: 100%;
        }

        #menu-icon {
            font-size: 24px;
            cursor: pointer;
            z-index: 1000001;
            display: none;
        }

        .btn {
            transition: all .3s ease;
            color: var(--bg-color);
            border: 3px solid var(--bg-color);
            text-align: center;
            line-height: 1;
            padding: 0.7rem 1.4rem;
            font-weight: 400;
            border-radius: 0.5rem;
            background-color: transparent;
            outline: none;
        }

        .btn-mov {
            transition: all .3s ease;
            color: var(--bg-color);
            border: 3px solid var(--bg-color);
            text-align: center;
            line-height: 1;
            font-weight: 50;
            border-radius: 0.5rem;
            background-color: transparent;
            outline: none;
            padding: 10px;
        }

        .btn:hover, .btn-mov:hover {
            color: var(--text-color);
            background-color: var(--main-color);
            border: 3px solid var(--main-color);
        }

        /* HOME SECTION */
        .container {
            width: 100%;
            min-height: 640px;
            position: relative;
            display: flex;
            align-items: center;
            background: rgb(2, 3, 7, 0.4);
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* Vertically center the buttons */
            position: relative;
        }

        .container img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: -1;
        }

        .swiper-pagination-bullet {
            width: 6px !important;
            height: 6px !important;
            border-radius: 0.2rem !important;
            background: var(--bg-color) !important;
            opacity: 1 !important;
        }

        .swiper-pagination-bullet-active {
            width: 1.5 rem !important;
            background: var(--main-color) !important;
        }

        .home-text {
            z-index: 1000;
            padding: 20px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: left;
        }

        .home-text span {
            color: var(--bg-color);
            font-weight: 500;
        }

        .home-text h1 {
            color: var(--bg-color);
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .play {
            z-index: 1000;
            padding: 20px;
            padding-top: 110px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: left;
        }

        .play .bx {
            background: var(--bg-color);
            padding: 10px;
            font-size: 2rem;
            border-radius: 50%;
            border: 4px solid rgb(2, 3, 7, 0.4);
            color: var(--main-color);
        }

        .play .bx:hover {
            background: var(--main-color);
            color: var(--bg-color);
            transition: 0.2s all linear;
        }

        /* PLAYING NOW */
        .heading {
            max-width: 968px;
            margin-left: auto;
            margin-right: auto;
            font-size: 1.2rem;
            font-weight: 500;
            text-transform: uppercase;
            border-left: 5px solid var(--main-color);
            padding-left: 1vw;
        }

        .movies-container,
        .coming-container {
            max-width: 968px;
            margin-right: auto;
            margin-left: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, auto));
            gap: 1rem;
            margin-top: 2rem;
        }

        .box-img{
            background: var(--text-color);
        }
        .box .box-img, .box-coming .box-img-coming {
            width: 100%;
            height: 270px;
            border-radius: 15px;
        }

        .box-coming .box-img-coming img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .box .box-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 1s ease-in-out;
            padding: 7px;
            border-radius: 15px;
        }

        .box-coming .box-img-coming img:hover {
            transform: translateY(-10px);
            /* transform: scale(1.2); */
            transition: 0.2s all linear;
            border-radius: 15px;
        }

        .box .box-img img:hover {
            /* transform: translateY(-10px); */
            transform: scale(1.2);
            transition: 0.2s all linear;
        }

        .box h3, .box-coming h3 {
            font-size: 1rem;
            font-weight: 500;
        }

        .box span, .box-coming span {
            font-size: 13px;
        }

        .box .box-img {
            position: relative;
            overflow: hidden; 
        }

        .box .box-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;    
            transition: all 1s ease-in-out;
        }

        .box:hover .box-img img {
            transform: scale(1.2); 
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.7);
            background-color: rgba(34, 40, 49, 0.7);
            transition: opacity 0.3s ease-in-out;
        }

        .box:hover .overlay {
            opacity: 1;
        }

        .movie-desc {
            color: var(--bg-color);
            font-size: 14px;
            text-align: center;
            padding: 5px;
        }


        /* FOOTER */
        footer {
            background-color: var(--text-color);
            color: var(--bg-color);
            padding: 20px;
            text-align: center;
        }

        .social {
            padding: 30px;
        }

        .social-icons {
            font-size: 24px;
            margin: 0 10px;
            color: white;
            text-decoration: none;
        }

        .social-icons:hover {
            color: var(--main-color);
        }

        /* RESPONSIVE */
        @media (max-width: 1080px) {
            .home-text {
                padding: 0 100px;
            }
        }

        @media (max-width: 991px) {
            header {
                padding: 18px 4%;
            }

            section {
                padding: 50px 4%;
            }

            .home-text {
                padding: 0 4%;
            }

            .home-text h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 774px) {
            header {
                padding: 12px 4%;
            }

            #menu-icon {
                display: initial;
                color: var(--bg-color);
            }

            header.shadow #menu-icon {
                color: var(--text-color);
            }

            .home-text h1 {
                font-size: 2.4rem;
            }

            .btn {
                padding: 0.6rem 1.2 rem;
            }

            .movies-container {
                grid-template-columns: repeat(auto-fit, minmax(160px, auto));
            }
        }

        @media (max-width: 370px) {
            header {
                padding: 6px 4%;
            }

            .home-text h1 {
                font-size: 1.7rem;
            }

            .play {
                right: 2rem;
                bottom: 8%;
            }
        }
    </style>
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
        <a href="signup" class="btn">SIGN UP</a>
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
                <!-- <img src="assets/avatar.jpg"> -->
                <img src="https://wallpapercave.com/wp/wp9424755.jpg">
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
    <script src="js/main.js"></script>

    <section class="newsletter" id="newsletter">
        <footer>
            <div class="col">
                <h4>FOLLOW US ON</h4>
                <div class="social">
                    <a href="#" class="social-icons"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-instagram' ></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="social-icons"><i class='bx bxl-youtube' ></i></a>
                </div>
            </div>
        </footer>
    </section>
</body>
</html>
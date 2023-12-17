<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprited Away - Ivan Cinema</title>
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const detailFilm = {
                background: "assets/spirited.png",
                poster: "assets/spirit_poster.jpg",
                title: "Spirited Away",
                trailer: "https://youtu.be/ByXuk9QqQkk?si=qYtpG3GYmT0xUZ_2",
                rating: "R-13",
                duration: "125 min",
                genre: "Drama",
                release: "20 July 2001",
                director: "Hayao Miyazaki",
                stars: "Daveigh Chase, Suzanne Pleshette, Miyu Irino",
                syp: "10-year-old girl who wanders into a world ruled by witches and spirits, where humans are changed into animals."
            };

            const container = document.querySelector('.flex-container');
            updateSection(container, detailFilm);
        });

        function updateSection(container, data) {
            container.innerHTML = '';

            const body = document.body;
            const backgroundLayer = document.createElement('div');
            backgroundLayer.className = 'background-layer';
            backgroundLayer.style.backgroundImage = `url(${data.background})`;

            body.appendChild(backgroundLayer);

            const flexContainer = document.createElement('div');
            flexContainer.className = 'flex-container';
            const poster = document.createElement('div');
            poster.className = 'poster';
            poster.innerHTML = `
                <img src="${data.poster}">
                <a href="#" class="ticket-button">Buy Ticket</a>
            `;
            flexContainer.appendChild(poster);

            const homeText = document.createElement('div');
            homeText.className = 'home-text';

            const titleContainer = document.createElement('div');
            titleContainer.className = 'title-container';
            titleContainer.innerHTML = `
                <h1>${data.title}</h1>
                <a href="${data.trailer}" target="_blank" rel="noopener noreferrer" class="play-button">
                    <i class='bx bx-play-circle'></i>
                </a>
            `;
            homeText.appendChild(titleContainer);

            homeText.innerHTML += `
                <h2>${data.rating}&emsp;|&emsp;${data.duration}&emsp;|&emsp;${data.genre}</h2><br>
                <ul class="desc-movie">
                    <li class="movie_date">Release:&ensp;${data.release}</li>
                    <li class="movie_dir">Director:&ensp;${data.director}</li>
                    <li class="movie_cast">Stars:&ensp;${data.stars}</li><br>
                    <li class="movie_syp">${data.syp}</li>
                </ul>
            `;
            flexContainer.appendChild(homeText);
            document.body.appendChild(flexContainer);
        }
    </script>
</head>

<body>
    <header>
        <div id="menu-icon" class='bx bx-menu'></div>
        <ul class="navbar">
            <li><a href="/home" class="home-active">HOME</a></li>
            <li><a href="/home#movies">MOVIES</a></li>
            <li><a href="/home#coming">COMING</a></li>
            <li><a href="/home#newsletter">NEWSLETTER</a></li>
            <li><a href="/profile"></i>SIGN IN</a></li>
        </ul>       
    </header>
    <div class="flex-container"></div>
    <script src="js/detail.js"></script>
</body>
</html>
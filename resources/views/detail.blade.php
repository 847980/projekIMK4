<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprited Away - Ivan Cinema</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const detailFilm = {
                background: "{{ asset('storage/assets/spirited.png') }}",
                poster: "{{ asset('storage/assets/' . $film->poster_potrait) }}",
                title: "{{ $film->judul }}",
                trailer: "{{ $film->trailer }}",
                rating: "{{ $film->age_cat }}",
                duration: "{{ $film->duration  }}",
                genre: "{{ $film->genre->name  }}",
                release: "{{ $film->release_date  }}",
                director: "{{ $film->sutradara   }}",
                stars: "{{ $film->cast }}",
                syp: "{{ $film->description }}"
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
                "<form action='{{ route('user.get-detail') }}' method='post'>" 
                        "<input type='hidden' name='_token' value='{{ csrf_token() }}' autocomplete='off'>" 
                        "<input type='hidden' name='film_id' value='{{ $film->id }}'>" 
                        "<input type='hidden' name='cinema_id' value='{{ session('cinema_id') }}'>" 
                        <button type="submit" class='ticket-button'>Buy Ticket</button>
                </form>" 
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
            <li><a href="#home" class="home-active">HOME</a></li>
            <li><a href="#movies">MOVIES</a></li>
            <li><a href="#coming">COMING</a></li>
            <li><a href="#newsletter">NEWSLETTER</a></li>            
            <li><a href="{{ route('user.profile') }}" id="profile" >PROFILE</a></li>
            <li><a href="{{ route('logout') }}" id="logout" >LOGOUT</a></li>
        </ul>       
    </header>
    <div class="flex-container"></div>
    <script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>
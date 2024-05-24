<!-- penanda navbar -> sdg aktif dmn blm ada -->
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Cinema</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const detailFilm = {
                background: "{{ asset('storage/assets/' . $film->poster_potrait) }}",
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
                <form action="{{ route('user.get-detail') }}" method="post" style="margin: 0; padding: 0;">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    <input type="hidden" name="poster" value="{{ asset('storage/assets/' . $film->poster_potrait) }}">
                    <input type="hidden" name="cinema_id" value="{{ session('cinema_id') }}">
                    <button type="submit" class="ticket-button">Buy Ticket</button>
                </form>
            `;
            flexContainer.appendChild(poster);


            const homeText = document.createElement('div');
            homeText.className = 'home-text';


            const titleContainer = document.createElement('div');
            titleContainer.className = 'title-container';
            titleContainer.innerHTML = `
                <h1>${data.title}</h1>
            `;
            homeText.appendChild(titleContainer);


            homeText.innerHTML += `
                <div class="movie-info">
                    <h2>${data.rating}&emsp;|&emsp;${data.duration} min&emsp;|&emsp;${data.genre}</h2>
                    <ul class="desc-movie">
                        <li class="movie_info-row">
                            <span class="movie_info-label">Director</span>
                            <span class="movie_info-value">${data.director}</span>
                        </li>
                        <li class="movie_info-row">
                            <span class="movie_info-label">Stars</span>
                            <span class="movie_info-value">${data.stars}</span>
                        </li>
                        <li class="movie_info-row" style="padding-top: 20px;">
                            <span class="movie_info-value">${data.syp}</span>
                        </li>
                    </ul>
                </div>
            `;
            flexContainer.appendChild(homeText);
            document.body.appendChild(flexContainer);
        }        
    </script>
    <!-- <a href="${data.trailer}" target="_blank" rel="noopener noreferrer" class="play-button">
                    <i class='bx bx-play-circle'></i>
                </a> -->
<!--
                <form action="{{ route   ('user.get-detail') }}" method="post" style="margin: 0; padding: 0;">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    <input type="hidden" name="poster" value="{{ asset('storage/assets/' . $film->poster_potrait) }}">
                    <input type="hidden" name="cinema_id" value="{{ session('cinema_id') }}">
                    <button type="submit" class="ticket-button">Buy Ticket</button>
                </form> -->


    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var movieDescElements = document.querySelectorAll('.movie_info-value');


            movieDescElements.forEach(function(descElement) {
                var maxLength = 100;
                var originalText = descElement.textContent.trim();


                if (originalText.length > maxLength) {
                var trimmedText = originalText.substring(0, maxLength);
                descElement.textContent = trimmedText.replace(/.{100}/g, '$&\n');
                }
            });
        });
    </script> -->
</head>


<body>
    <!-- <header>
        <div id="menu-icon" class='bx bx-menu'></div>
        <ul class="navbar">
            <li><a href="dashboard" class="home-active">HOME</a></li>
            <li><a href="dashboard">MOVIES</a></li>
            <li><a href="dashboard">COMING</a></li>
            <li><a href="dashboard">NEWSLETTER</a></li>            
            <li><a href="{{ route('user.profile') }}" id="profile" >PROFILE</a></li>
            <li><a href="{{ route('logout') }}" id="logout" >LOGOUT</a></li>
        </ul>      
    </header> -->
    <a href="{{ route('user.dashboard') }}" class="exit-btn">
        <button class="Btn">
            <div class="sign"><svg viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                </svg></div>
            <div class="text">BACK</div>
        </button>
    </a>
    
    <div class="flex-container"></div>
    <script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>


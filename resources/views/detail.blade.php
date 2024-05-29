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
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
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
        .rounded-corners-img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .rounded-corners-button {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>


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
            // container.innerHTML = '';
            const body = document.body;
            const wrapper = document.createElement('div');
            wrapper.className = 'wrapper';
            const flexContainer = document.createElement('div');
            flexContainer.className = 'flex-container';
            const poster = document.createElement('div');
            poster.className = 'poster';
            poster.innerHTML = `
                <img src="${data.poster}" class="rounded-corners-img">
                <form action="{{ route('user.get-detail') }}" method="post" style="margin: 0; padding: 0;">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    <input type="hidden" name="poster" value="{{ asset('storage/assets/' . $film->poster_potrait) }}">
                    <input type="hidden" name="cinema_id" value="{{ session('cinema_id') }}">
                    <input type="hidden" name="genre" value="${data.genre}">
                    <input type="hidden" name="genre_id" value="{{ $film->genre_id}}">
                    <button type="submit" class="ticket-button rounded-corners-button">Buy Ticket</button>
                </form>
            `;
            wrapper.appendChild(poster);

            const homeText = document.createElement('div');
            homeText.className = 'home-text';

            const titleContainer = document.createElement('div');
            titleContainer.className = 'title-container';
            titleContainer.innerHTML = `
                <h1>${data.title}</h1>
            `;
            homeText.appendChild(titleContainer);

            const descriptionWrapper = document.createElement('div');
            descriptionWrapper.className = 'description-wrapper';
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
            descriptionWrapper.appendChild(homeText);
            flexContainer.appendChild(wrapper)
            flexContainer.appendChild(descriptionWrapper)
            body.appendChild(flexContainer);
        }        
    </script> 
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
    <script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>
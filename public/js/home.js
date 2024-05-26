let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
let prevScrollpos = window.scrollY;


// window.addEventListener('scroll', () => {
//     var currentScrollPos = window.scrollY;


//     if (currentScrollPos > 50) {
//         header.style.backgroundColor = 'var(--text-color-light)';
//         navbar.style.backgroundColor = 'var(--text-color-light)';
//     } else {
//         header.style.backgroundColor = 'transparent';
//         navbar.style.backgroundColor = 'transparent';
//     }


//     if (currentScrollPos === 0) {
//         header.style.backgroundColor = 'transparent';
//         navbar.style.backgroundColor = 'transparent';
//     }


//     prevScrollpos = currentScrollPos;
// });




// document.addEventListener("DOMContentLoaded", function() {
//     var movieDescElements = document.querySelectorAll('.movie-desc');


//     movieDescElements.forEach(function(descElement) {
//         var originalText = descElement.textContent.trim();
//         var maxLength = 10;


//         // Check if the text length exceeds the maximum length
//         if (originalText.length > maxLength) {
//             // Trim the text to the maximum length and add ellipsis
//             var trimmedText = originalText.substring(0, maxLength) + '...';
//             descElement.textContent = trimmedText;
//         }
//     });
// });


// document.addEventListener("DOMContentLoaded", function() {
//     var movieDescElements = document.querySelectorAll('.movie-desc');


//     movieDescElements.forEach(function(descElement) {
//         var maxLength = parseInt(descElement.getAttribute('data-maxlength'), 10);
//         var originalText = descElement.textContent.trim();


//         if (originalText.length > maxLength) {
//             var trimmedText = originalText.substring(0, maxLength) + '...';
//             descElement.textContent = trimmedText;
//         }
//     });
// });


$(document).ready(function() {
    // Loop through the sections
    $('.section').each(function() {
        // Get the section ID
        var sectionId = $(this).attr('id');

        // Get the corresponding navbar link
        var navbarLink = $('a[href="#' + sectionId + '"]');

        // Check if the section is in view
        $(window).scroll(function() {
            if ($(this).scrollTop() >= $('#' + sectionId).offset().top - 100) {
                // Add the active class to the navbar link
                navbarLink.addClass('active');
                navbarLink.addClass('active-underline');
            } else {
                // Remove the active class from the navbar link
                navbarLink.removeClass('active');
                navbarLink.removeClass('active-underline');
            }
        });
    });
});

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
    if (navbar.classList.contains('open')) {
        header.style.display = 'flex';
        header.style.alignItems = 'center';
        header.style.justifyContent = 'center';
        header.style.backgroundColor = 'var(--text-color-light)';
        navbar.style.backgroundColor = 'var(--text-color-light)';
    } else {
        header.style.display = '';
        header.style.alignItems = '';
        header.style.justifyContent = '';
        header.style.backgroundColor = 'transparent';
        navbar.style.backgroundColor = 'transparent';
    }
};


document.getElementById('menu-icon').addEventListener('click', function () {
    document.querySelector('.navbar').classList.toggle('show');
});


var swiper = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});


document.addEventListener("DOMContentLoaded", function () {
    AOS.init();
});


// document.addEventListener("DOMContentLoaded", function () {
//     const cities = ["Select City", "City 1", "City 2", "City 3"];
//     const cinemas = {
//         "Select City": {
//             "Select Cinema": []
//             //kasi select all
//         },
//         "City 1": {
//             "Cinema 1A": [
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
//             ],
//             "Cinema 1B": [
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
//             ]
//         },
//         "City 2": {
//             "Cinema 2A": [
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
//             ]
//         },
//         "City 3": {
//             "Cinema 3A": [
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
//             ],
//             "Cinema 3B": [
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
//             ],
//             "Cinema 3C": [
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" },
//                 { title: "Star Wars", duration: "136 min", genre: "Action", img: "assets/starwars.jpg", desc: "The heroic development of Luke Skywalker as a Jedi and his fight against Palpatine's Galactic Empire alongside his sister, Leia" }
//             ]
//         }
//     };


//     function populateCities() {
//         const cityDropdown = document.getElementById("cityDropdown");
//         if (!cityDropdown) {
//             console.error("City dropdown not found");
//             return;
//         }


//         const cinemaDropdown = document.getElementById("cinemaDropdown");
//         const selectedCity = cityDropdown.value;
//         const cinemaOptions = Object.keys(cinemas[selectedCity] || {});


//         cinemaDropdown.innerHTML = '';
//         cinemaOptions.forEach(cinema => {
//             const option = document.createElement("option");
//             option.text = cinema;
//             cinemaDropdown.add(option);
//         });
//         showMovies();
//     }


//     function showMovies() {
//         const selectedCity = document.getElementById("cityDropdown").value;
//         const selectedCinema = document.getElementById("cinemaDropdown").value;
//         const moviesContainer = document.querySelector(".movies-container");


//         moviesContainer.innerHTML = '';


//         if (selectedCity === "Select City" || selectedCinema === "Select Cinema") {
//             const initialCinemaMovies = getMoviesForCityAndCinema("City 1", "Cinema 1A");
//             updateMovie(moviesContainer, initialCinemaMovies);
//         } else {
//             const cinemaMovies = getMoviesForCityAndCinema(selectedCity, selectedCinema);
//             updateMovie(moviesContainer, cinemaMovies);
//         }
//     }


//     function getMoviesForCityAndCinema(city, cinema) {
//         return cinemas[city][cinema];
//     }


//     function updateMovie(container, data) {
//         container.innerHTML = '';
//         data.forEach((item, index) => {
//             const movieElement = document.createElement("div");
//             movieElement.className = "box";
//             movieElement.innerHTML =
//                 `<div data-aos="fade-up" data-aos-duration="2500">
//                     <div class="box-img">
//                         <img src="${item.img}">
//                         <div class="overlay">
//                             <p class="movie-desc">${item.desc}</p>
//                             <a href="/detail" class="btn-mov">BOOK</a>
//                         </div>
//                     </div>
//                     <h3>${item.title}</h3>
//                     <span>${item.duration} | ${item.genre}</span>
//                 </div>`;
//             container.appendChild(movieElement);
//         });
//     }


//     const moviesContainer = document.querySelector('.movies-container');


//     const initialCity = "City 1";
//     const initialCinema = "Cinema 1A";
//     const initialCinemaMovies = getMoviesForCityAndCinema(initialCity, initialCinema);
//     updateMovie(moviesContainer, initialCinemaMovies);


//     const cityDropdown = document.getElementById("cityDropdown");
//     const cinemaDropdown = document.getElementById("cinemaDropdown");


//     if (cityDropdown && cinemaDropdown) {
//         cityDropdown.addEventListener("change", populateCities);
//         cinemaDropdown.addEventListener("change", showMovies);
//     }
// });
// selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));
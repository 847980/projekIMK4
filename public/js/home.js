let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');
let prevScrollpos = window.scrollY;

window.addEventListener('scroll', () => {
    var currentScrollPos = window.scrollY;

    if (currentScrollPos > 50) {
        header.style.backgroundColor = 'var(--text-color-light)';
    } else {
        header.style.backgroundColor = 'transparent';
    }

    if (currentScrollPos === 0) {
        header.style.backgroundColor = 'transparent';
    }

    prevScrollpos = currentScrollPos;
});

menu.onclick = () => {
    menu.classList.toggle('bx-x');
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


const wrapper = document.querySelector(".wrapper"),
selectBtn = wrapper.querySelector(".select-btn"),
searchInp = wrapper.querySelector("input"),
options = wrapper.querySelector(".options");

let countries = ["Jakarta", "Semarang", "Sidoarjo", "Situbondo", "Surabaya", "Probolinggo"];

function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}
addCountry();

function updateName(selectedLi) {
    searchInp.value = "";
    options.querySelectorAll('li').forEach(li => {
        li.classList.remove('selected');
    });
    selectedLi.classList.add('selected');
    selectBtn.firstElementChild.innerText = selectedLi.innerText;
    wrapper.classList.remove("active");
}

searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp.value.toLowerCase();
    arr = countries.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
    }).join("");
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">City not found</p>`;
});

selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));
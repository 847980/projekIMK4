<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Cinema Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    //ayok ambil data :>
        const userData = {
            name: "John Doe",
            ongoing: [
                { title: "Spirited Away", date: "01-01-2024", seat: "A1", time: "12:00", cinema: "Pakuwon City", studio: "3" },
                { title: "Avatar", date: "02-02-2024", seat: "H13", time: "20:30", cinema: "Tunjungan Plaza", studio: "1" }
            ],
            history: [
                { title: "Star wars", date: "01-01-2023", cinema: "Pakuwon City, Surabaya" },
                { title: "Cinderella", date: "02-02-2023", cinema: "Galaxy Mall, Surabaya" }
            ]
        };

        const profile = document.querySelector('.subhead');
        profile.textContent = `${userData.name}`; 

        const ongoingContainer = document.querySelector('.ongoing-container');
        updateSection(ongoingContainer, userData.ongoing, 'ongoing');

        const historyContainer = document.querySelector('.history-container');
        updateSection(historyContainer, userData.history, 'history');
    });

    function updateSection(container, data, type) {
        container.innerHTML = '';
        data.forEach((item, index) => {
            const box = document.createElement('div');
            box.className = type === 'ongoing' ? 'box-ongoing' : 'box-history';

            const ul = document.createElement('ul');
            ul.className = 'desc';
            if (type === 'ongoing') {
                ul.innerHTML = `
                <li class="movie_title">${item.title}</li>
                <li class="movie_date">Date: ${item.date}</li>
                <li><button class="openModalBtn" id="openModalBtn${index + 1}">Detail</button></li>
                `;
            } else if (type === 'history') {
                ul.innerHTML = `
                <li class="movie_title">${item.title}</li>
                <li class="movie_date">Date: ${item.date}</li>
                <li class="movie_place">Cinema: ${item.cinema}</li>
                `;
            }
            box.appendChild(ul);
            container.appendChild(box);

            if (type === 'ongoing') {
                const modalOverlay = document.createElement('div');
                modalOverlay.className = 'overlay';
                modalOverlay.id = `modalOverlay${index + 1}`;
                modalOverlay.style.display = 'none';

                const modal = document.createElement('div');
                modal.className = 'modal';
                modal.innerHTML = `
                    <span class="close" onclick="closeModal()">&times;</span>
                    <div class="cardWrap">
                        <div class="card cardLeft">
                            <h1>Ivan <span>Cinema</span></h1>
                            <div class="title">
                                <h2>${item.title}</h2>
                                <span>movie</span>
                            </div>
                            <div class="date">
                                <h2>${item.date}</h2>
                                <span>date</span>
                            </div>
                            <div class="seat">
                                <h2>${item.seat}</h2>
                                <span>seat</span>
                            </div>
                            <div class="time">
                                <h2>${item.time}</h2>
                                <span>time</span>
                            </div>
                        </div>
                        <div class="card cardRight">
                            <div class="number">
                                <h1>${item.cinema}</h1>
                                <h3>${item.studio}</h3>
                                <span>studio</span>
                            </div>
                            <div class="barcode"></div>
                        </div>
                    </div>
                `;
                modalOverlay.appendChild(modal);
                document.body.appendChild(modalOverlay);
            }
        });
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
            <li><a href="#" id="profile">PROFILE</a></li>
        </ul>
    </header>    

    <div class="profile-layer">
        <section class="profile" id="profile">
            <h3 class="heading">Welcome,</h3></br>   
            <h3 class="subhead">Name &emsp;</h3>
        </section>

        <section class="ongoing" id="ongoing">
            <h3 class="subhead">ONGOING</h3>
            <div class="ongoing-container">
                
            </div>         
        </section>

        <section class="history" id="history">
            <h3 class="subhead">HISTORY</h3>
            <div class="history-container">
                
            </div>    
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/profile.js" defer></script>
</body>

</html>
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
                { title: "Spirited Away", date: "01-01-2024", seat: "A1", time: "12:00", cinema: "Pakuwon City" },
                { title: "Avatar", date: "02-02-2024", seat: "H13", time: "20:30", cinema: "Tunjungan Plaza" }
            ],
            history: [
                { title: "Star wars", date: "01-01-2023", cinema: "Pakuwon City, Surabaya" },
                { title: "Cinderella", date: "02-02-2023", cinema: "Galaxy Mall, Surabaya" }
            ]
        };

        const profile = document.querySelector('.subhead');
        profile.textContent = `${userData.name} \u2003\u2003\u2003\u2003 \u270E`; 

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

        // Append the ul to the box
            box.appendChild(ul);

        // Append the box to the container
            container.appendChild(box);
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

    <section class="profile" id="profile">
        <h3 class="heading">Welcome,</h3></br>   
        <h3 class="subhead">Name &emsp;<i class='bx bxs-pencil' id="editProfileBtn"></i></h3>
    </section>

    <!-- <div class="overlay" id="editProfileModal">
        <div class="modal">
            <span class="close" onclick="closeEditProfileModal()">&times;</span>
            <h2>Edit Profile</h2>
            <form id="editProfileForm">
                <input type="text" id="newName" name="newName" placeholder="Username">
                <input type="text" id="newName" name="newpass" placeholder="Password">
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div> -->

    <section class="ongoing" id="ongoing">
        <h3 class="subhead">ONGOING</h3>
        <div class="ongoing-container">
            <div class="box-ongoing">                
                <ul class="desc">
                    <li class="movie_title">Spirited Away</li>
                    <li class="movie_date">Date: 01-01-2024</li>     
                    <li><button class="openModalBtn" id="openModalBtn1">Detail</button></li>
                </ul>                  
                <div class="overlay" id="modalOverlay1">
                    <div class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <div class="cardWrap">
                            <div class="card cardLeft">
                                <h1>Ivan <span>Cinema</span></h1>
                                <div class="title">
                                    <h2>Spirited Away</h2>
                                    <span>movie</span>
                                </div>
                                <div class="date">
                                    <h2>01-01-2024</h2>
                                    <span>date</span>
                                </div>
                                <div class="seat">
                                    <h2>A1</h2>
                                    <span>seat</span>
                                </div>
                                <div class="time">
                                    <h2>12:00</h2>
                                    <span>time</span>
                                </div>                                        
                            </div>
                            <div class="card cardRight">
                                <div class="number">
                                    <h1>Pakuwon City</h1>
                                    <h3>3</h3>
                                    <span>studio</span>
                                </div>
                                <div class="barcode"></div>
                            </div>
                        </div>  
                    </div>
                </div>                 
            </div>   
            <div class="box-ongoing">                
                <ul class="desc">
                    <li class="movie_title">Avatar</li>
                    <li class="movie_date">Date: 02-02-2024</li>  
                    <li><button class="openModalBtn" id="openModalBtn2">Detail</button></li>   
                </ul>    
                <div class="overlay" id="modalOverlay2">
                    <div class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <div class="cardWrap">
                            <div class="card cardLeft">
                                <h1>Ivan <span>Cinema</span></h1>
                                <div class="title">
                                    <h2>Avatar</h2>
                                    <span>movie</span>
                                </div>
                                <div class="date">
                                    <h2>02-02-2024</h2>
                                    <span>date</span>
                                </div>
                                <div class="seat">
                                    <h2>H13</h2>
                                    <span>seat</span>
                                </div>
                                <div class="time">
                                    <h2>20:30</h2>
                                    <span>time</span>
                                </div>                                        
                            </div>
                            <div class="card cardRight">
                                
                                <div class="number">
                                    <h1>Tunjungan Plaza</h1>
                                    <h3>1</h3>
                                    <span>studio</span>
                                </div>
                                <div class="barcode"></div>
                            </div>
                        </div>  
                    </div>
                </div>                                 
            </div> 
        </div>         
    </section>

    <section class="history" id="history">
        <h3 class="subhead">HISTORY</h3>
        <div class="history-container">
            <div class="box-history">                
                <ul class="desc">
                    <li class="movie_title">Star wars</li>
                    <li class="movie_date">Date: 01-01-2023</li> 
                    <li class="movie_place">Cinema: Pakuwon City, Surabaya</li>    
                </ul>                    
            </div>   
            <div class="box-history">                
                <ul class="desc">
                    <li class="movie_title">Cinderella</li>
                    <li class="movie_date">Date: 02-02-2023</li>
                    <li class="movie_place">Cinema: Pakuwon City, Surabaya</li>      
                </ul>                    
            </div> 
        </div>    
       
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/profile.js" defer></script>
</body>

</html>
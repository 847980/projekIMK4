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
         
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
        // ... Your existing code ...

        // Add a click event listener to the "Detail" button
        const detailButton = document.querySelector('.btn-primary');
        detailButton.addEventListener('click', function () {
            // Show the Bootstrap modal
            const modal = new bootstrap.Modal(document.getElementById('ongoingModal'));
            modal.show();
        });
    });
    </script>    -->
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
        <h3 class="subhead">Name &emsp;<i class='bx bxs-pencil'></i></h3>
        <h3 class="subhead">Not you? Press here</h3>
    </section>

    <section class="ongoing" id="ongoing">
        <h3 class="subhead">ONGOING</h3>
        <div class="ongoing-container">
            <div class="box-ongoing">                
                <ul class="desc">
                    <li class="movie_title">Spirited Away</li>
                    <li class="movie_date">Date: 01-01-2024</li>     
                    <li><button id="openModalBtn">Detail</button></li>
                </ul>  
                
                <div class="overlay" id="modalOverlay">
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
                </ul>                    
            </div> 
        </div>    
                <!-- <div class="cardWrap">
                    <div class="card cardLeft">
                        <h1>Ivan <span>Cinema</span></h1>
                        <div class="title">
                            <h2>Spirited Away</h2>
                            <span>movie</span>
                        </div>
                        <div class="date">
                            <h2>01-01-2023</h2>
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
                            <h3>3</h3>
                            <span>studio</span>
                        </div>
                        <div class="barcode"></div>
                    </div>
                </div>                                  
            </div>
        </div> -->
       
    </section>
    <section class="history" id="history">
        <h3 class="subhead">HISTORY</h3>
        <div class="history-container">
            <div class="box-history">                
                <ul class="desc">
                    <li class="movie_title">Star wars</li>
                    <li class="movie_date">Date: 01-01-2023</li>     
                </ul>                    
            </div>   
            <div class="box-history">                
                <ul class="desc">
                    <li class="movie_title">Cinderella</li>
                    <li class="movie_date">Date: 02-02-2023</li>     
                </ul>                    
            </div> 
        </div>    
       
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/profile.js" defer></script>
</body>

</html>
<?php
// In your Blade view (dashboard.blade.php) or controller
$allSessionData = session()->all();

// Find the key dynamically
$desiredKey = 'login_web_'; // The prefix of the key you're looking for

$sessionId = null;

foreach ($allSessionData as $key => $value) {
    if (strpos($key, $desiredKey) === 0) {
        $sessionId = $value;
        break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Cinema Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    <input type="hidden" name="user_id" id="user_id" value="{{ $sessionId }}">
    <header>
        <div id="menu-icon" class='bx bx-menu'></div>
        <ul class="navbar">
            <li><a href="{{ route('user.dashboard') }}#home" class="home-active">HOME</a></li>
            <li><a href="{{ route('user.dashboard') }}#movies">MOVIES</a></li>
            <li><a href="{{ route('user.dashboard') }}#coming">COMING</a></li>
            <li><a href="{{ route('user.dashboard') }}#newsletter">NEWSLETTER</a></li>
            <li><a href="#" id="profile">PROFILE</a></li>
            <li><a href="{{ route('logout') }}" id="logout" >LOGOUT</a></li>

        </ul>
    </header>    
    
    <div class="profile-layer">
        <section class="profile" id="profile">
            <h3 class="heading">Welcome,</h3><br>   
            <h3 class="subhead" id="nama">Name &emsp;</h3>
        </section>

        <section class="ongoing" id="ongoing">
            <h3 class="subhead">ONGOING</h3>
            <div class="ongoing-container">
            </div>         
        </section>

        <section class="history" id="history">
            <h3 class="subhead" id="test">HISTORY</h3>
            <div class="history-container">
                
            </div>    
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/profile.js') }}" defer></script>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



<script>
    $(document).ready(function(){
        console.log("saau");
    });

    function buttonSelector() {
        const detailButtons = document.querySelectorAll('.box-ongoing button');

        detailButtons.forEach((button, index) => {
            button.addEventListener('click', function () {
                const modalOverlay = document.getElementById(`modalOverlay${index + 1}`);
                modalOverlay.style.display = 'flex';
                const modal = modalOverlay.querySelector('.ticket-modal');
            });
        });

        const closeButtons = document.querySelectorAll('.modal .close');

        closeButtons.forEach((closeButton) => {
            closeButton.addEventListener('click', function () {
                const modalOverlay = this.closest('.overlay');
                modalOverlay.style.display = 'none';
            });
        });
    }
    document.addEventListener('DOMContentLoaded', function () {
        function updateSection(container, data, type) {
            container.innerHTML = '';
            data.forEach((item, index) => {
                let arrSeat = item[1].seat.split(", ");
                let seatFix = [];
                arrSeat.forEach(seat => {
                    let seatNum = String.fromCharCode('A'.charCodeAt(0) + (seat/24)) + "" + (seat % 24);
                    seatFix.push(seatNum);
                });
                let seatNumCorrect = seatFix.join(", ");
                console.log(seatNumCorrect);
                const box = document.createElement('div');
                box.className = type === 'ongoing' ? 'box-ongoing' : 'box-history';

                const ul = document.createElement('ul');
                ul.className = 'desc';
                if (type === 'ongoing') {
                    ul.innerHTML = `
                    <li class="movie_title">${item[1].title}</li>
                    <li class="movie_date">Date: ${item[1].date}</li>
                    <li><button class="openModalBtn" id="openModalBtn${index + 1}">Detail</button></li>
                    `;
                } else if (type === 'history') {
                    ul.innerHTML = `
                    <li class="movie_title">${item[1].title}</li>
                    <li class="movie_date">Date: ${item[1].date}</li>
                    <li class="movie_place">Cinema: ${item[1].cinema}</li>
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
                                    <h2>${item[1].title}</h2>
                                    <span>movie</span>
                                </div>
                                <div class="date">
                                    <h2>${item[1].date}, ${item[1].time}</h2>
                                    <span>date</span>
                                </div>
                                <div class="seat">
                                    <h2>${seatNumCorrect}</h2>
                                    <span>seat</span>
                                </div>
                            </div>
                            <div class="card cardRight">
                                <div class="number">
                                    <h1>${item[1].cinema}</h1>
                                    <h3>${item[1].studio}</h3>
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

        function getName(){
            $.ajax({
            url: 'get-user/'+$('#user_id').val(),
            type: 'get',
            success: function (response) {
                console.log(response);
                $('#nama').html(response.user[0]['username']);
            },
            error: function (error) {
                console.log(error);
            }
        });
        }

        function getTicket(){
            $.ajax({
                url:"{{ route('user.getTicket') }}",
                type:"GET",
                dataType:"json",
                success:function(res){
                    if(res['ongoing'].length != 0){
                        updateSection(document.querySelector('.ongoing-container'), Object.entries(res['ongoing']), 'ongoing');
                    }
                    if(res['past'].length != 0){
                        updateSection(document.querySelector('.history-container'), Object.entries(res['past']), 'history');
                    }
                    buttonSelector();

                },
                error:function(error){
                    alert("error")
                    console.log(error);
                }
            })
        }
        getTicket();
        getName();


        buttonSelector();
        
    });

    

</script>
</html>
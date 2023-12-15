<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan Cinema</title>

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="css/login.css">

    <script>
        function clearInput() {
            var usernameInput = document.getElementsByName('username')[0];
            var emailInput = document.getElementsByName('email')[0];
            var passwordInput = document.getElementsByName('password')[0];

            usernameInput.value = '';
            emailInput.value = '';
            passwordInput.value = '';
        }

        function clearInput2() {
            var usernameInput = document.getElementsByName('username2')[0];
            var passwordInput = document.getElementsByName('password2')[0];

            usernameInput.value = '';
            passwordInput.value = '';
        }
    </script>
</head>

<body>
    <a href="home"  class="exit-btn">
        <button class="Btn">
            <div class="sign"><svg viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                </svg></div>
            <div class="text">BACK</div>
        </button>
    </a>

    <div class="main">
        <input type="checkbox" id="check" aria-hidden="true">

        <div class="signup">
            <form>
                <label for="check" onclick="clearInput(), clearInput2()" aria-hidden="true">Sign Up</label>
                <span>
                    <i class="fas fa-user"></i>
                    Username
                </span>
                <input type="text" name="username" placeholder="Username" required="">
                
                <span>
                    <i class="fas fa-envelope"></i>    
                    Email
                </span>
                <input type="email" name="email" placeholder="Email" required="">
                
                <span>
                    <i class="fas fa-lock"></i>
                    Password
                </span>
                <input type="password" name="password" placeholder="Password" required="">
                
                <button>Sign Up</button>
            </form>
        </div>

        <div class="login">
            <form>
                <label for="check" onclick="clearInput(), clearInput2()" aria-hidden="true">Login</label>
                <span>
                    <i class="fas fa-user"></i>
                    Username
                </span>
                <input type="text" name="username2" placeholder="Username" required="">
                
                <span>
                    <i class="fas fa-lock"></i> 
                    Password
                </span>
                <input type="password" name="password2" placeholder="Password" required="">
                
                <button>Login</button>
            </form>
        </div>

    </div>
</body>

</html>
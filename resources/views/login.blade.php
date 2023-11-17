<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

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
    <div class="main">
        <input type="checkbox" id="check" aria-hidden="true">

        <div class="signup">
            <form>
                <label for="check" onclick="clearInput(), clearInput2()" aria-hidden="true">Sign Up</label>
                <span>Username</span>
                <input type="text" name="username" placeholder="Username" required="">
                <span>Email</span>
                <input type="email" name="email" placeholder="Email" required="">
                <span>Password</span>
                <input type="password" name="password" placeholder="Password" required="">
                <button>Sign Up</button>
            </form>
        </div>

        <div class="login">
            <form>
                <label for="check" onclick="clearInput(), clearInput2()" aria-hidden="true">Login</label>
                <span>Username</span>
                <input type="text" name="username2" placeholder="Username" required="">
                <span>Password</span>
                <input type="password" name="password2" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>

    </div>
</body>

</html>
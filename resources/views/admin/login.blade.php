<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Web | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #222831;
    }

    h1 {
        text-align: center;
        color: #EEEEEE;
        margin-bottom: 1em;
        text-shadow: 2px 2px #393E46;
        font-weight: bold;
    }

    label {
        color: #EEEEEE;
        text-shadow: 2px 2px #393E46;
        font-weight: bold;
    }

    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column  ;
        height: 100vh;
    }

    .main-container .container label {
        display: block;
    }

    .signin-button {
        width: 100%;
        background-color: #FFD369;
        border-color: #FFD369;
        color: #393E46;
        font-weight: bold;
        margin-top: 2.5em;
        padding: 0.6em 0;
    }

    .signin-button:hover {
        background-color: #FDBE3B;
        border-color: #FDBE3B;
    }

    .main-container .container {
        margin: 0 auto;
        margin-bottom: 3.6em;
        background-color: #393E46;
        padding: 2.5em;
        padding-bottom: 3em;
        border-radius: 1.2em;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #id, #password {
        border: none;
        outline: none;
        background-color: #393E46;
        border-bottom: 1px solid #EEEEEE;
        width: 100%;
        caret-color: #EEEEEE;
        border-radius: 0;
        margin-top: 0.5em;
        color: #EEEEEE;
        font-weight:bold;
    }

    #id:focus, #password:focus {
        box-shadow: 0 0 3px 3px #FFD369;
        border: 1px solid #FDBE3B;
        border-radius: 1em;
        transition: 0.2s;
        transition-timing-function: ease-out;
    }

</style>
<body>


    @if (session('error'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{ session('error')  }}",
            icon: "error",
        });
    </script>
    @endif
    <div class="container main-container">
        <div class="container" style="width: 24em">
            <h1>Welcome back!</h1>
            <form action="{{ route('admin.login.send') }}" method="post">
            @csrf
            <label for="id">Email
                <input type="text" id="id" class="form-control  @error('email') is-invalid  @enderror" name="email" value="{{ old('email') }}" >
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </label><br>

            <label for="password">Password<input type="password" id="password" class="form-control @error('password') is-invalid  @enderror" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
            </label>
            <button type="submit" class="signin-button btn btn-primary">Sign in</button>
            </form>
        </div>
        
    </div>
</body>
</html>
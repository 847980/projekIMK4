<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Welcome Admin!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('admin/admin-style.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/styles.css') }}" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://kit.fontawesome.com/04d941aae7.js" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="{{asset('admin/sidebar-scripts.js')}}"></script>
        {{-- swal --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @yield("custom")
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom">Responsive Cinema Website</div>
                <div class="list-group list-group-flush">
                    <a class="sidebar-link" href="#!">Dashboard</a>
                    <a class="sidebar-link" href="{{ route('admin.film.index') }}">Management Film</a>
                    <a class="sidebar-link" href="{{ route('admin.showtime.index') }}">Management ShowTime</a>
                    <a class="sidebar-link" href="{{ route('admin.city.index') }}">Management City</a>
                    <a class="sidebar-link" href="{{ route('admin.cinema.index') }}">Management Cinema</a>
                    <a class="sidebar-link" href="{{ route('admin.studio.index') }}">Management Studio</a>
                    <a class="sidebar-link" href="{{ route('admin.genre.index') }}">Management Genre</a>
                </div>
            </div>
            
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid" style="margin-left: 1.4em;">
                        <button id="sidebarToggle" class="toggle-button"><span><<</span></button>
                    </div>
                </nav>
                
                <!-- Page content-->
                <div class="container-fluid">
                    <div class="content-with-margin">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @yield("script")
    </body>
</html>

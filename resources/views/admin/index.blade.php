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
        <link href="{{ asset('admin/styles.css') }}" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('admin/sidebar-scripts.js')}}"></script>
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
            <div id="page-content-wrapper container">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button id="sidebarToggle" class="toggle-button"><span><<</span></button>
                    </div>
                </nav>
                
                <!-- Page content-->
                <div class="container-fluid" class="page-content" style="color:white">
                    <div class="row">
                        <div class="col-12 title">
                            <h2>Dashboard</h2>
                            <button class="add-item-btn">ADD ITEM</button>
                        </div>
                        
                        <!-- stats -->
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="stats">
                                <span>Unique views this month</span>
                                <p>5 678</p>
                            </div>
                        </div>
                        <!-- end stats -->

                        <!-- stats -->
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="stats">
                                <span>Items added this month</span>
                                <p>172</p>
                                
                            </div>
                        </div>
                        <!-- end stats -->

                        <!-- stats -->
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="stats">
                                <span>New comments</span>
                                <p>2 573</p>
                                
                            </div>
                        </div>
                        <!-- end stats -->

                        <!-- stats -->
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="stats">
                                <span>New reviews</span>
                                <p>1 021</p>
                                
                            </div>
                        </div>
                        <!-- end stats -->
                        <!-- dashbox -->
                        <div class="col-12 col-xl-6">
                            <div class="dashbox">
                                <div class="dashbox__title">
                                    <h3>Top items</h3
                                    <div class="dashbox__wrap">
                                        <a class="dashbox__refresh" href="#">Refresh</a>
                                        <a class="dashbox__more" href="catalog.html">View All</a>
                                    </div>
                                </div>

                                <div class="dashbox__table-wrap dashbox__table-wrap--1">
                                    <table class="main__table main__table--dash">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TITLE</th>
                                                <th>CATEGORY</th>
                                                <th>RATING</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">321</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.2</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">54</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Benched</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.1</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">670</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Whitney</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">241</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting 2</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">22</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end dashbox -->
                                                <!-- dashbox -->
                        <div class="col-12 col-xl-6">
                            <div class="dashbox">
                                <div class="dashbox__title">
                                    <h3>Top items</h3>

                                    <div class="dashbox__wrap">
                                        <a class="dashbox__refresh" href="#">Refresh</a>
                                        <a class="dashbox__more" href="catalog.html">View All</a>
                                    </div>
                                </div>

                                <div class="dashbox__table-wrap dashbox__table-wrap--1">
                                    <table class="main__table main__table--dash">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TITLE</th>
                                                <th>CATEGORY</th>
                                                <th>RATING</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">321</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.2</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">54</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Benched</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.1</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">670</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Whitney</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">241</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting 2</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">22</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end dashbox -->
                                                <!-- dashbox -->
                        <div class="col-12 col-xl-6">
                            <div class="dashbox">
                                <div class="dashbox__title">
                                    <h3>Top items</h3>

                                    <div class="dashbox__wrap">
                                        <a class="dashbox__refresh" href="#">Refresh</a>
                                        <a class="dashbox__more" href="catalog.html">View All</a>
                                    </div>
                                </div>

                                <div class="dashbox__table-wrap dashbox__table-wrap--1">
                                    <table class="main__table main__table--dash">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TITLE</th>
                                                <th>CATEGORY</th>
                                                <th>RATING</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">321</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.2</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">54</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Benched</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.1</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">670</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Whitney</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">241</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting 2</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">22</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end dashbox -->
                        <!-- dashbox -->
                        <div class="col-12 col-xl-6">
                            <div class="dashbox">
                                <div class="dashbox__title">
                                    <h3>Top items</h3>

                                    <div class="dashbox__wrap">
                                        <a class="dashbox__refresh" href="#">Refresh</a>
                                        <a class="dashbox__more" href="catalog.html">View All</a>
                                    </div>
                                </div>

                                <div class="dashbox__table-wrap dashbox__table-wrap--1">
                                    <table class="main__table main__table--dash">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TITLE</th>
                                                <th>CATEGORY</th>
                                                <th>RATING</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">321</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">I Dream in Another Language</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.2</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">54</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Benched</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.1</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">670</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Whitney</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 9.0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">241</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting 2</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text">22</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Show</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.9</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end dashbox -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

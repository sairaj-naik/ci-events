<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<header>
    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" aria-current="page" href="/UsersController/insertUserDetail">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/UsersController/UsersList">Get All Users</a> <!-- /UsersController/getallusers -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/EventsController/EventsList">Get All Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/BookingController/PendingBookingList">Pending List</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="container">
        <div>
            <div class="card w-50">
                <div class="card-body">
                    <form action="<?php echo site_url().'/UsersController/insertUserDetails'; ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name"placeholder="Enter your Name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"placeholder="Enter your Email Address" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="<?php echo base_url(); ?>"><?php echo base_url(); ?></a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>
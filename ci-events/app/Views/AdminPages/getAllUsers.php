<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- viewport meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/assets/css/main.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- jquery data table js cdn-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

    <!-- jquery data tables css cdn-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body id="index">
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
                <!-- modal start-->
                <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">User Details</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="form-data">
                                    <div class="field-block">
                                        <label>Name:</label>
                                        <input type="text" name="Name" id="nametxt" class="form-control form-control-lg"/>
                                    </div>
                                    
                                    <div class="field-block">
                                        <label>Email:</label>
                                        <input type="email" name="Email"  id="emailtxt" class="form-control form-control-lg"/>
                                    </div>

                                    <div class="modal-footer">
                                        <button id="add-user" class="btn btn-success">Add User</button>
                                        <button id="update-user" class="btn btn-warning">Update User</button>

                                    </div>

                            </div>
                            <!-- form end-->
                        </div>
                        
                        </div>
                    </div>
                </div>
                <!-- modal end -->
            </div>

            <div class="block-above-datatable">
                <button id="create-user-btn" class="btn btn-dark">Create a User</button>
            </div>

            <!-- jquery data table-->
            <div class="table-container">
                <table id="myTable" class="datatable">
                    <thead>
                        <tr>
                            <th>Uid</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            
            <!-- jquery data table end-->
            <div class="alert-dialog" style="display:none" role="alert"></div>
            <div class="alert-dialog" style="display:none" role="alert"></div>
        </div>
    
        <script src="/assets/js/main.js"></script>
</body>
</html>
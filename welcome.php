<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="./welcome.css">


    <style>
    body {
        margin: 0;
        padding: 0;
        background: #eaf1f6;
        overflow-x: hidden;
    }

    .intro {
        margin: 24px 0;
        padding: 80px 0;
        color: #fff;
    }

    .background {
        padding: 0;
    }

    .background::before {
        content: '';
        width: 100vw;
        min-width: 1000px;
        height: 100vh;
        min-height: 600px;
        border-radius: 50%;
        background: #008dff;
        position: absolute;
        top: -70%;
        left: 50%;
        transform: translateX(-50%) scale(2.5);
        z-index: -1;
    }

    .footer {
        margin-top: 40px;
        width: 100%;
        height: 200px;
    }

    .links .card-body {
        padding: 2rem 1rem;
    }

    .links-cards {
        padding: 4px 40px;
    }

    .links-cards .col .card {
        margin: auto;
    }

    .navbar .nav-item {
        margin: 2px 20px;
        font-size: 16px;
    }
    </style>
</head>

<body>
    <div class="container-fluid background">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#" style="font-weight: 500; font-size: 24px;">HMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Appointment</a></li>
                                <li><a class="dropdown-item" href="#">Manage Patients</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Manage Doctors</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div>
                    <form action="admin.html"> <button class="btn btn-danger">Log Out</button></form>
                   
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="intro">
                <h1 class="display-5 fw-bold">Hospital Management System</h1>
                <h4 class="display-5 fw-bold">Get Better Care For Your Health</h4>
                <p class="col-md-8 fs-4"> ADMIN | DASHBOARD </p>
            </div>
        </div>
    </div>
    <div class="container links">
        <div class="row align-items-center links-cards">
            <div class="col">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Appointment</h5>
                        <p class="card-text">To get an appointment, Register here with appropiate details</p>
                        <a href="/isaa/appointments.php" class="btn btn-primary">Register Here</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Manage Patients</h5>
                        <p class="card-text">Manages the Patients informations, Add or display patients registered in
                            the hospital
                        </p>
                        <a href="/isaa/getpatient.php" class="btn btn-primary">Enter Here</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Manage Doctors</h5>
                        <p class="card-text">Hospital's prestiged Doctor informations and availability can be found here
                        </p>
                        <a href="/isaa/getdoctors.php" class="btn btn-primary">Enter Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code-Latte</title>
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                padding: 3px;
            }

            .sidenav {
                width: 200px;
                height: 100%;
                padding: 15px;
                background-color: black;
                position: fixed;
            }

            .sidenav a {
                display: block;
                font-size: 20px;
                text-decoration: none;
                color: white;
                padding: 6px;
            }

            .main {
                margin-left: 200px;
                font-size: 18px;
                padding: 70px 20px;
            }
        </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- navigation --}}
                <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="#">Personal-Blog</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Kaung
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                {{-- side bar menu --}}
                <div class="sidenav">
                    <a href="">Skill</a>
                    <a href="">Project</a>
                    <a href="">Category</a>
                    <a href="">Post</a>
                </div>
                {{-- main content --}}
                <div class="main">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem error? Ab voluptate, vel, adipisci temporibus animi quae soluta facilis dicta reprehenderit atque veritatis alias aspernatur nesciunt sequi! Eum, laboriosam.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem error? Ab voluptate, vel, adipisci temporibus animi quae soluta facilis dicta reprehenderit atque veritatis alias aspernatur nesciunt sequi! Eum, laboriosam.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem error? Ab voluptate, vel, adipisci temporibus animi quae soluta facilis dicta reprehenderit atque veritatis alias aspernatur nesciunt sequi! Eum, laboriosam.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">

<head>
    <title>Group Finder</title>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/img/icon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.scss') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
</head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-dice-d20"></i> Group Finder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dokumentacija.pdf" target="_blank">Dokumentacija <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=author">Author <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=register">Register <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=posts">Posts <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=account">Account <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=admin">Admin <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="models/logout.php">Logout <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="vh-100 login-bg">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-3">
                                <h2 class="fw-bold mb-2 text-uppercase"><i class="fa-solid fa-dice-d20"></i> Login</h2>
                                <div class="form-outline form-white mb-3">
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg mt-3" />
                                    <label class="form-label mt-2" for="typeEmailX">Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label mt-2" for="typePasswordX">Password</label>
                                </div>
                                <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </div>
                            <div>
                                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="footer" class="bg-dark">
        <div id="linkovi" class="d-flex flex-row justify-content-center">
            <div class="pt-3 text-white-50">
                <p>NESTO</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>

    </html>
    </body>
</html>

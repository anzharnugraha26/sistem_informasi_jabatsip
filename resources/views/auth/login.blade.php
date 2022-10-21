<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Informasi Arsip Jabpatsip</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('tmp/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('tmp/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('tmp/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tmp/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('tmp/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tmp/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('tmp/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('tmp/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('tmp/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('tmp/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <img src="{{ asset('img/HEADER.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('img/login-key.png') }}" alt="" class="rounded mx-auto d-block mt-5 mb-3">
                                        </div>
                                        <div class="col-md-4">
                                            <form class="row g-3 needs-validation" novalidate method="POST"
                                        action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" value="{{ old('username') }}" required
                                                    autocomplete="username" autofocus>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required required autocomplete="current-password">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="true"
                                                    id="rememberMe" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="pages-register.html">Create an account</a></p>
                                        </div>
                                    </form>
                                        </div>
                                    </div>



                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('tmp/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tmp/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tmp/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('tmp/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('tmp/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('tmp/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('tmp/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('tmp/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('tmp/assets/js/main.js') }}"></script>

</body>

</html>

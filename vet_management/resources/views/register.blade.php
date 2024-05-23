<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d491c37d6e.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5"
            style="
            background-color:darkslategray;
            height: 150px;
            ">
        </div>
        <!-- Background image -->

        <div class=" d-flex align-items-center justify-content-center">
            <div class="card mx-4 mx-md-5 shadow-5-strong col-md-6"
                style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
            ">
                <div class="card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <img src="{{ URL('img/PawPoint-b.png') }}" style="width: 250px;" class="px-3 py-2">
                            <h2 class="fw-bold mb-5">Sign Up</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="/register" method="POST">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="first_name" class="form-control" />
                                            <label class="form-label" for="first_name">First name</label>
                                            @error('first_name')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="last_name" class="form-control" />
                                            <label class="form-label" for="last_name">Last name</label>
                                            @error('last_name')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" class="form-control" />
                                    <label class="form-label" for="email">Email address</label>
                                    @error('email')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="phone" name="phone" class="form-control" />
                                    <label class="form-label" for="phone">Phone number</label>
                                    @error('phone')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" />
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label for="account_type">Account Type</label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="client">Client</option>
                                        <option value="admin">Clinic</option>
                                    </select>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Sign up
                                </button>

                                {{-- <!-- Register buttons -->
                                <div class="text-center">
                                    <p>or sign up with:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                </div> --}}
                            </form>

                            <p>Already have an account? Log in <a href="{{ route('login.view') }}">here</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
</body>

<x-footer />

</html

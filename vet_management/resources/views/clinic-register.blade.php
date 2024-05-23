<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Clinic</title>

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
                            <h2 class="fw-bold mb-5">Register Clinic</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="/clinic-register" method="POST">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="name" class="form-control" />
                                        <label class="form-label" for="name">Clinic Name</label>
                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
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
                                    <input type="text" name="phone" class="form-control" />
                                    <label class="form-label" for="phone">Phone number</label>
                                    @error('phone')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="address_line_1" class="form-control" />
                                    <label class="form-label" for="address_line_1">Address Line 1</label>
                                    @error('address_line_1')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="address_line_2" class="form-control" />
                                    <label class="form-label" for="address_line_2">Address Line 2</label>
                                    @error('address_line_2')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="city" class="form-control" />
                                    <label class="form-label" for="city">City</label>
                                    @error('city')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="county" class="form-control" />
                                    <label class="form-label" for="county">County</label>
                                    @error('county')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="eircode" class="form-control" />
                                    <label class="form-label" for="eircode">Eircode</label>
                                    @error('eircode')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Register
                                </button>

                            </form>

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

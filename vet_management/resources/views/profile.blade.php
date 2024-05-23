<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PawPoint</title>

    <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d491c37d6e.js" crossorigin="anonymous"></script>
</head>

<body>
    <x-navbar />
    <div class="container rounded bg-white mt-3 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}</span>
                    <span class="text-black-50">{{ Auth::user()->email }}</span>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <form action="/editDetails/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Your Details</h4>
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="first name"
                                    value="{{ Auth::user()->first_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="surname"
                                    value="{{ Auth::user()->last_name }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Phone Number</label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="enter phone number" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line 1</label>
                                @if (Auth::user()->address)
                                    <input type="text" name="address_line_1" class="form-control"
                                        placeholder="enter address line 1"
                                        value="{{ Auth::user()->address->address_line_1 }}">
                                @else
                                    <input type="text" name="address_line_1" class="form-control"
                                        placeholder="enter address line 1">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line 2</label>
                                @if (Auth::user()->address)
                                    <input type="text" name="address_line_2" class="form-control"
                                        placeholder="enter address line 2"
                                        value="{{ Auth::user()->address->address_line_2 }}">
                                @else
                                    <input type="text" name="address_line_2" class="form-control"
                                        placeholder="enter address line 2">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label class="labels">City</label>
                                @if (Auth::user()->address)
                                    <input type="text" name="city" class="form-control" placeholder="enter city"
                                        value="{{ Auth::user()->address->city }}">
                                @else
                                    <input type="text" name="city" class="form-control"
                                        placeholder="enter city">
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">County</label>
                                @if (Auth::user()->address)
                                    <input type="text" name="county" class="form-control" placeholder="county"
                                        value="{{ Auth::user()->address->county }}">
                                @else
                                    <input type="text" name="county" class="form-control"
                                        placeholder="enter county">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Eircode</label>
                                @if (Auth::user()->address)
                                    <input type="text" name="eircode" class="form-control" placeholder="eircode"
                                        value="{{ Auth::user()->address->eircode }}">
                                @else
                                    <input type="text" name="eircode" class="form-control"
                                        placeholder="enter eircode">
                                @endif
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<x-footer />

</html>

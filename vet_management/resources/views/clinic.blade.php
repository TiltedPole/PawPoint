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
                    <i class="fa-solid fa-building fa-10x"></i>
                    <span class="font-weight-bold">{{ Auth::user()->clinic->name }}</span>
                    <span>Admin: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    <span class="text-black-50">{{ Auth::user()->clinic->email }}</span>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <form action="/updateClinic/{{ Auth::user()->clinic->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Clinic Details</h4>
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                {{ Session::forget('success') }}
                            @endif

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="first name"
                                    value="{{ Auth::user()->clinic->name }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Phone Number</label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="enter phone number" value="{{ Auth::user()->clinic->phone }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Email Address</label>
                                <input type="text" name="email" class="form-control"
                                    placeholder="enter phone number" value="{{ Auth::user()->clinic->email }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line 1</label>
                                <input type="text" name="address_line_1" class="form-control"
                                    placeholder="enter address line 1"
                                    value="{{ Auth::user()->address->address_line_1 }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line 2</label>
                                <input type="text" name="address_line_2" class="form-control"
                                    placeholder="enter address line 2"
                                    value="{{ Auth::user()->address->address_line_2 }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">City</label>
                                <input type="text" name="city" class="form-control" placeholder="enter city"
                                    value="{{ Auth::user()->address->city }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">County</label>
                                <input type="text" name="county" class="form-control" placeholder="county"
                                    value="{{ Auth::user()->address->county }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Eircode</label>
                                <input type="text" name="eircode" class="form-control" placeholder="eircode"
                                    value="{{ Auth::user()->address->eircode }}">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Details</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<x-footer />

</html>

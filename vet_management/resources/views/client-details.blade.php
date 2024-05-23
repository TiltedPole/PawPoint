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

@php
    use App\Models\User;
    use App\Models\Patient;
@endphp

<body>
    <x-navbar />
    <div class="container rounded bg-white mt-3 mb-5">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{ User::find(request()->route('id'))->first_name }}
                        {{ User::find(request()->route('id'))->last_name }}</span>
                    <span class="text-black-50">{{ User::find(request()->route('id'))->email }}</span>
                </div>
            </div>
            <div class="col-md-6 border-right">
                <form action="/editDetails/" method="POST">
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
                                    value="{{ Auth::user()->first_name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="surname"
                                    value="{{ Auth::user()->last_name }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Phone Number</label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="enter phone number" value="{{ Auth::user()->phone }}" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line 1</label>
                                <input type="text" name="address_line_1" class="form-control"
                                    placeholder="enter address line 1"
                                    value="{{ Auth::user()->address->address_line_1 }}" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line 2</label>
                                <input type="text" name="address_line_2" class="form-control"
                                    placeholder="enter address line 2"
                                    value="{{ Auth::user()->address->address_line_2 }}" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">City</label>
                                <input type="text" name="city" class="form-control" placeholder="enter city"
                                    value="{{ Auth::user()->address->city }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">County</label>
                                <input type="text" name="county" class="form-control" placeholder="county"
                                    value="{{ Auth::user()->address->county }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Eircode</label>
                                <input type="text" name="eircode" class="form-control" placeholder="eircode"
                                    value="{{ Auth::user()->address->eircode }}" disabled>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    @php
                        $patients = Patient::where('owner_id', User::find(request()->route('id'))->id)->get();
                    @endphp
                    @foreach ($patients as $patient)
                        <li class="list-group-item align-items-center d-flex">
                            <div class="container">
                                <div class="row">
                                    <a class="btn text-white btn-floating m-1 me-3 col" {{-- rgb({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }}); --}}
                                        style="background-color:mediumturquoise" href="#" role="button">
                                        <i class="fa fa-paw fa-2x"></i>
                                    </a>
                                    <h3 class="col-md-8">{{ $patient->name }}</h3>

                                    <a class="btn text-white btn-floating m-1 me-3 col" data-toggle="modal"
                                        data-target="#view{{ $patient->id }}Modal"
                                        style="background-color: grey; max-width:50px;" role="button">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        {{-- Creating the update modal with default values for each patient --}}
                        <div class="modal fade" id="view{{ $patient->id }}Modal" tabindex="-1" role="dialog"
                            aria-labelledby="view{{ $patient->id }}ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="view{{ $patient->id }}ModalLabel">Update Pet
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container rounded bg-white mt-3 mb-5">
                                            <div class="row">
                                                <div>
                                                    <div class="p-3">
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label class="labels">Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control"
                                                                    value="{{ $patient->name }}" disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Species</label>
                                                                <select name="species" class="form-select" disabled>
                                                                    <option value="Dog"
                                                                        {{ $patient->species == 'Dog' ? 'selected' : '' }}>
                                                                        Dog</option>
                                                                    <option value="Cat"
                                                                        {{ $patient->species == 'Cat' ? 'selected' : '' }}>
                                                                        Cat</option>
                                                                    <option value="Bird"
                                                                        {{ $patient->species == 'Bird' ? 'selected' : '' }}>
                                                                        Bird</option>
                                                                    <option value="Fish"
                                                                        {{ $patient->species == 'Fish' ? 'selected' : '' }}>
                                                                        Fish</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12">
                                                                <label class="labels">Breed</label>
                                                                <select name="breed" class="form-select" disabled>
                                                                    <option value="Labrador"
                                                                        {{ $patient->breed == 'Labrador' ? 'selected' : '' }}>
                                                                        Labrador</option>
                                                                    <option value="Poodle"
                                                                        {{ $patient->breed == 'Poodle' ? 'selected' : '' }}>
                                                                        Poodle</option>
                                                                    <option value="Siamese"
                                                                        {{ $patient->breed == 'Siamese' ? 'selected' : '' }}>
                                                                        Siamese</option>
                                                                    <option value="Persian"
                                                                        {{ $patient->breed == 'Persian' ? 'selected' : '' }}>
                                                                        Persian</option>
                                                                    <option value="Parrot"
                                                                        {{ $patient->bredd == 'Parrot' ? 'selected' : '' }}>
                                                                        Parrot</option>
                                                                    <option value="Goldfish"
                                                                        {{ $patient->breed == 'Goldfish' ? 'selected' : '' }}>
                                                                        Goldfish</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Sex</label>
                                                                <select name="sex" class="form-select" disabled>
                                                                    <option value="Male"
                                                                        {{ $patient->sex == 'Male' ? 'selected' : '' }}>
                                                                        Male</option>
                                                                    <option value="Female"
                                                                        {{ $patient->sex == 'Female' ? 'selected' : '' }}>
                                                                        Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Age</label>
                                                                <input type="text" class="form-control"
                                                                    name="age" value="{{ $patient->age }}" disabled>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Weight</label>
                                                                <input type="text" class="form-control"
                                                                    name="weight" value="{{ $patient->weight }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

<x-footer />

</html>

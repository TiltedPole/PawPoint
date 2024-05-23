<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Clinics</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <link href="/bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d491c37d6e.js" crossorigin="anonymous"></script>
</head>

<body>
    <x-navbar />
    <div class="containter pb-5">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 py-3">
                <ul class="list-group">
                    @foreach ($clinics as $clinic)
                        <li class="list-group-item align-items-center d-flex">
                            <div class="container">
                                <div class="row">
                                    <a class="btn text-white btn-floating m-1 me-3 col" {{-- rgb({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }}); --}}
                                        style="background-color:mediumturquoise" href="#" role="button">
                                        <i class="fa fa-building fa-2x"></i>
                                    </a>
                                    <h3 class="col-md-8">{{ $clinic->name }}</h3>
                                    <form action="/clinic-sign-up/{{ $clinic->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
                                        <button class="btn text-white btn-floating m-1 me-3 col" type="submit"
                                            style="background-color:lightseagreen; max-width:100px;" role="button">
                                            Register
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        {{-- Creating the update modal with default values for each clinic
                        <div class="modal fade" id="update{{ $clinic->id }}Modal" tabindex="-1" role="dialog"
                            aria-labelledby="update{{ $clinic->id }}ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="update{{ $clinic->id }}ModalLabel">Update Pet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container rounded bg-white mt-3 mb-5">
                                            <div class="row">
                                                <div>
                                                    <form action="/update/{{ $clinic->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="p-3">
                                                            <div class="row mt-2">
                                                                <div class="col-md-6">
                                                                    <label class="labels">Name</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control" value="{{ $clinic->name }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="labels">Species</label>
                                                                    <select name="species" class="form-select">
                                                                        <option value="Dog"
                                                                            {{ $clinic->species == 'Dog' ? 'selected' : '' }}>
                                                                            Dog</option>
                                                                        <option value="Cat"
                                                                            {{ $clinic->species == 'Cat' ? 'selected' : '' }}>
                                                                            Cat</option>
                                                                        <option value="Bird"
                                                                            {{ $clinic->species == 'Bird' ? 'selected' : '' }}>
                                                                            Bird</option>
                                                                            <option value="Fish"
                                                                            {{ $clinic->species == 'Fish' ? 'selected' : '' }}>
                                                                            Fish</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-12">
                                                                    <label class="labels">Breed</label>
                                                                    <select name="breed" class="form-select">
                                                                        <option value="Labrador"
                                                                            {{ $clinic->breed == 'Labrador' ? 'selected' : '' }}>
                                                                            Labrador</option>
                                                                        <option value="Poodle"
                                                                            {{ $clinic->breed == 'Poodle' ? 'selected' : '' }}>
                                                                            Poodle</option>
                                                                        <option value="Siamese"
                                                                            {{ $clinic->breed == 'Siamese' ? 'selected' : '' }}>
                                                                            Siamese</option>
                                                                        <option value="Persian"
                                                                            {{ $clinic->breed == 'Persian' ? 'selected' : '' }}>
                                                                            Persian</option>
                                                                        <option value="Parrot"
                                                                            {{ $clinic->bredd == 'Parrot' ? 'selected' : '' }}>
                                                                            Parrot</option>
                                                                        <option value="Goldfish"
                                                                            {{ $clinic->breed == 'Goldfish' ? 'selected' : '' }}>
                                                                            Goldfish</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="labels">Sex</label>
                                                                    <select name="sex" class="form-select">
                                                                        <option value="Male"
                                                                            {{ $clinic->sex == 'Male' ? 'selected' : '' }}>
                                                                            Male</option>
                                                                        <option value="Female"
                                                                            {{ $clinic->sex == 'Female' ? 'selected' : '' }}>
                                                                            Female</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="labels">Age</label>
                                                                    <input type="text" class="form-control"
                                                                        name="age" value="{{ $clinic->age }}">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="labels">Weight</label>
                                                                    <input type="text" class="form-control"
                                                                        name="weight" value="{{ $clinic->weight }}">
                                                                </div>
                                                            </div>
                                                            <div class="mt-5 text-center">
                                                                <button class="btn btn-primary profile-button"
                                                                    type="submit">Update Pet</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- Creating delete modal for each pet --}}
                        {{-- <div class="modal fade" id="delete{{ $clinic->id }}Modal" tabindex="-1" role="dialog"
                            aria-labelledby="delete{{ $clinic->id }}ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="delete{{ $clinic->id }}ModalLabel">Confirm Delete
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this item?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form id="deleteForm" method="POST" action="/delete/{{ $clinic->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </ul>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>

</body>

<x-footer />

</html>

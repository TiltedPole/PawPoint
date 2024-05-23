<div class="containter pb-5">
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
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
                                    data-target="#update{{ $patient->id }}Modal"
                                    style="background-color: orange; max-width:50px;" role="button">
                                    <i class="fa fa-pen-to-square"></i>
                                </a>
                                <a class="btn text-white btn-floating m-1 me-3 col" data-toggle="modal"
                                    data-target="#delete{{ $patient->id }}Modal"
                                    style="background-color: red; max-width:50px;" role="button">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    {{-- Creating the update modal with default values for each patient --}}
                    <div class="modal fade" id="update{{ $patient->id }}Modal" tabindex="-1" role="dialog"
                        aria-labelledby="update{{ $patient->id }}ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="update{{ $patient->id }}ModalLabel">Update Pet</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container rounded bg-white mt-3 mb-5">
                                        <div class="row">
                                            <div>
                                                <form action="/updatePatient/{{ $patient->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="p-3">
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label class="labels">Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control" value="{{ $patient->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Species</label>
                                                                <select name="species" class="form-select">
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
                                                                <select name="breed" class="form-select">
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
                                                                <select name="sex" class="form-select">
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
                                                                    name="age" value="{{ $patient->age }}">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Weight</label>
                                                                <input type="text" class="form-control"
                                                                    name="weight" value="{{ $patient->weight }}">
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
                    </div>
                    {{-- Creating delete modal for each pet --}}
                    <div class="modal fade" id="delete{{ $patient->id }}Modal" tabindex="-1" role="dialog"
                        aria-labelledby="delete{{ $patient->id }}ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="delete{{ $patient->id }}ModalLabel">Confirm Delete
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
                                    <form id="deleteForm" method="POST" action="/deletePatient/{{ $patient->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>

        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">
                Register Pet
            </button>
        </div>
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
            aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Register Pet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container rounded bg-white mt-3 mb-5">
                            <div class="row">
                                <div>
                                    <form action="/register/{{ Auth::user()->id }}" method="POST">
                                        @csrf
                                        <div class="p-3">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label class="labels">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="labels">Species</label>
                                                    <select name="species" class="form-select">
                                                        <option value="Dog">Dog</option>
                                                        <option value="Cat">Cat</option>
                                                        <option value="Cat">Bird</option>
                                                        <option value="Cat">Fish</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label class="labels">Breed</label>
                                                    <select name="breed" class="form-select">
                                                        <option value="Labrador">Labrador</option>
                                                        <option value="Poodle">Poodle</option>
                                                        <option value="Siamese">Siamese</option>
                                                        <option value="Persian">Persian</option>
                                                        <option value="Parrot">Parrot</option>
                                                        <option value="Goldfish">Goldfish</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="labels">Sex</label>
                                                    <select name="sex" class="form-select">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="labels">Age (Years)</label>
                                                    <input type="text" class="form-control" placeholder="age"
                                                        name="age">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="labels">Weight (Kg)</label>
                                                    <input type="text" class="form-control" placeholder="weigth"
                                                        name="weight">
                                                </div>
                                            </div>
                                            <div class="mt-5 text-center">
                                                <button class="btn btn-primary profile-button" type="submit">Register
                                                    Pet</button>
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
        </div>
    </div>
</div>

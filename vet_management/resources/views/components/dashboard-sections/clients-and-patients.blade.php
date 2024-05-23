<div class="containter pb-5">
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                @foreach ($users as $user)
                    <li class="list-group-item align-items-center d-flex">
                        <div class="container">
                            <div class="row">
                                <a class="btn text-white btn-floating m-1 me-3 col" {{-- rgb({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }}); --}}
                                    style="background-color:mediumturquoise" href="#" role="button">
                                    <i class="fa fa-user fa-2x"></i>
                                </a>
                                <h3 class="col-md-8">{{ $user->first_name }}</h3>
                                <a href="{{ route('client-details.view', ['id' => $user->id]) }}" class="btn text-white btn-floating m-1 me-3 col"
                                    style="background-color:gray; max-width:50px;" role="button">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn text-white btn-floating m-1 me-3 col" data-toggle="modal"
                                    data-target="#remove{{ $user->id }}Modal"
                                    style="background-color: red; max-width:50px;" role="button">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    {{-- Creating the update modal with default values for each user
                    <div class="modal fade" id="update{{ $user->id }}Modal" tabindex="-1" role="dialog"
                        aria-labelledby="update{{ $user->id }}ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="update{{ $user->id }}ModalLabel">Update Pet</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container rounded bg-white mt-3 mb-5">
                                        <div class="row">
                                            <div>
                                                <form action="/update/{{ $user->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="p-3">
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label class="labels">Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control" value="{{ $user->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Species</label>
                                                                <select name="species" class="form-select">
                                                                    <option value="Dog"
                                                                        {{ $user->species == 'Dog' ? 'selected' : '' }}>
                                                                        Dog</option>
                                                                    <option value="Cat"
                                                                        {{ $user->species == 'Cat' ? 'selected' : '' }}>
                                                                        Cat</option>
                                                                    <option value="Bird"
                                                                        {{ $user->species == 'Bird' ? 'selected' : '' }}>
                                                                        Bird</option>
                                                                        <option value="Fish"
                                                                        {{ $user->species == 'Fish' ? 'selected' : '' }}>
                                                                        Fish</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12">
                                                                <label class="labels">Breed</label>
                                                                <select name="breed" class="form-select">
                                                                    <option value="Labrador"
                                                                        {{ $user->breed == 'Labrador' ? 'selected' : '' }}>
                                                                        Labrador</option>
                                                                    <option value="Poodle"
                                                                        {{ $user->breed == 'Poodle' ? 'selected' : '' }}>
                                                                        Poodle</option>
                                                                    <option value="Siamese"
                                                                        {{ $user->breed == 'Siamese' ? 'selected' : '' }}>
                                                                        Siamese</option>
                                                                    <option value="Persian"
                                                                        {{ $user->breed == 'Persian' ? 'selected' : '' }}>
                                                                        Persian</option>
                                                                    <option value="Parrot"
                                                                        {{ $user->bredd == 'Parrot' ? 'selected' : '' }}>
                                                                        Parrot</option>
                                                                    <option value="Goldfish"
                                                                        {{ $user->breed == 'Goldfish' ? 'selected' : '' }}>
                                                                        Goldfish</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Sex</label>
                                                                <select name="sex" class="form-select">
                                                                    <option value="Male"
                                                                        {{ $user->sex == 'Male' ? 'selected' : '' }}>
                                                                        Male</option>
                                                                    <option value="Female"
                                                                        {{ $user->sex == 'Female' ? 'selected' : '' }}>
                                                                        Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Age</label>
                                                                <input type="text" class="form-control"
                                                                    name="age" value="{{ $user->age }}">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Weight</label>
                                                                <input type="text" class="form-control"
                                                                    name="weight" value="{{ $user->weight }}">
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
                    <div class="modal fade" id="remove{{ $user->id }}Modal" tabindex="-1" role="dialog"
                        aria-labelledby="remove{{ $user->id }}ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="remove{{ $user->id }}ModalLabel">Confirm Removal
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to remove this client?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel</button>
                                    <form id="deleteForm" method="POST" action="/removeFromClinic/{{ $user->id }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>

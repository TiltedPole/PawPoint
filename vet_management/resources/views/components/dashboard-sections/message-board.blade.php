@php
    use App\Models\User;
    use App\Models\Clinic;
@endphp

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                <h5 class="font-weight-bold mb-3 text-center text-lg-start">Clinic Admin</h5>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="p-2 border-bottom" style="background-color: #eee;">
                                <a href="#" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <i class="fa-solid fa-user fa-3x"></i>
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">
                                                {{ User::find(Clinic::find(Auth::user()->clinic_id)->admin_id)->first_name }}
                                                {{ User::find(Clinic::find(Auth::user()->clinic_id)->admin_id)->last_name }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-7 col-xl-8">
                <ul class="list-unstyled">
                    @foreach ($messages as $message)
                        <div class="message-container" style="display:flex;">
                            <li class="d-flex justify-content-between mb-4">
                                {{-- retrieving sent messages --}}
                                @if (
                                    $message->sender_id == Auth::user()->id &&
                                        $message->recipient_id == Clinic::find(Auth::user()->clinic_id)->admin_id)
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">You</p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                                {{ $message->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{ $message->message }}
                                            </p>
                                        </div>
                                    </div>
                                    <i class="fa-solid fa-user fa-3x"></i>
                                    {{-- retrieving received messages --}}
                                @elseif (
                                    $message->recipient_id == Auth::user()->id &&
                                        $message->sender_id == Clinic::find(Auth::user()->clinic_id)->admin_id)
                                    <i class="fa-solid fa-user fa-3x"></i>
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">{{ $message->sender->first_name }}
                                                {{ $message->sender->last_name }}
                                            </p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                                {{ $message->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{ $message->message }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        </div>
                    @endforeach
                </ul>
                <form id="messageForm" method="POST" action="/sendMessage">
                    @csrf
                    <input name="sender_id" value="{{ Auth::user()->id }}" type="hidden">
                    <input name="recipient_id" value="{{ Clinic::find(Auth::user()->clinic_id)->admin_id }}"
                        type="hidden">
                    <div class="form-outline bg-white mb-3">
                        <textarea class="form-control" id="message_content" name="message_content" rows="4" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>

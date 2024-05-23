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
                            @foreach ($users as $user)
                                <li class="p-2 border-bottom" style="background-color: #eee;">
                                    <a href="#" class="user-link d-flex justify-content-between"
                                        data-user-id="{{ $user->id }}">
                                        <div class="d-flex flex-row">
                                            <i class="fa-solid fa-user fa-3x"></i>
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">
                                                    {{ $user->first_name }}
                                                    {{ $user->last_name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-7 col-xl-8">
                <ul class="list-unstyled">
                    @foreach ($messages as $message)
                        <div class="message-container" style="display: none;" data-sender-id="{{ $message->sender_id }}"
                            data-recipient-id="{{ $message->recipient_id }}">
                            <li class="d-flex justify-content-between mb-4 message-item">
                                {{-- retrieving sent messages --}}
                                @if ($message->sender_id == Auth::user()->id)
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">{{ $message->sender->first_name }}
                                                {{ $message->sender->last_name }}</p>
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
                                @elseif ($message->recipient_id == Auth::user()->id)
                                    <i class="fa-solid fa-user fa-3x"></i>
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
                                @endif
                            </li>
                        </div>
                    @endforeach

                </ul>
                <form id="messageForm" method="POST" action="/sendMessage">
                    @csrf
                    <input name="sender_id" value="{{Auth::user()->id}}" type="hidden">
                    <input id="recipient_id" name="recipient_id" value="" type="hidden">
                    <div class="form-outline bg-white mb-3">
                        <textarea class="form-control" id="message_content" name="message_content" rows="4" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const userLinks = document.querySelectorAll(".user-link");

        userLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();

                const userId = link.getAttribute("data-user-id");
                document.getElementById('recipient_id').value = userId

                // Hide all message containers
                const messageContainers = document.querySelectorAll(".message-container");
                messageContainers.forEach(function(container) {
                    container.style.display = "none";
                });

                // Show message containers for the selected user
                const userMessageContainers = document.querySelectorAll(
                    `.message-container[data-sender-id="${userId}"], .message-container[data-recipient-id="${userId}"]`
                );
                userMessageContainers.forEach(function(container) {
                    container.style.display = "flex";
                });
            });
        });
    });
</script>

<!DOCTYPE html>
<html>
<head>
    <title>Author Book App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
</head>
<body style="background-color: #1CAD60;">
    <h1 class="text-center mt-4 text-white">Author & Book Details Management</h1>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <!-- Author Card -->
            <div class="col-md-5 mb-4">
                <div class="card shadow rounded-4">
                    <div class="card-body text-center">
                        <h3 class="card-title"><i class="fa-solid fa-user-pen me-2"></i>Authors</h3>
                        <p class="card-text">Manage all authors: create, update, list and delete them.</p>
                        <a href="{{ route('authors.index') }}" class="btn btn-success">
                            Go to Authors
                        </a>
                    </div>
                </div>
            </div>

            <!-- Book Card -->
            <div class="col-md-5 mb-4">
                <div class="card shadow rounded-4">
                    <div class="card-body text-center">
                        <h3 class="card-title"><i class="fa-solid fa-book me-2"></i>Books</h3>
                        <p class="card-text">View and manage all books assigned to authors.</p>
                        <a href="{{ route('books.index') }}" class="btn btn-primary">
                            Go to Books
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Chatbot (Fixed at Bottom Right) -->
    <div style="position:fixed; bottom:20px; right:20px; width:300px;">
        <h5>
            <span>Ask Chat Bot</span>
            <span class="ms-2"><i class="fa-solid fa-robot fa-lg"></i></span>
        </h5>
        <div id="chat-output" style="background:#f9f9f9; border:1px solid #ccc; padding:10px; height:150px; overflow-y:auto; font-size:14px;"></div>
        <input type="text" id="chat-question" class="form-control mt-2" placeholder="Ask something..." />
    </div>

    <script>
        document.getElementById('chat-question').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const question = this.value;
                const output = document.getElementById('chat-output');
                output.innerHTML += "<div><b>You:</b> " + question + "</div>";
                fetch("{{ route('chatbot.ask') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ question: question })
                })
                .then(response => response.json())
                .then(data => {
                    output.innerHTML += "<div><b>Bot:</b> " + data.answer + "</div>";
                    document.getElementById('chat-question').value = '';
                    output.scrollTop = output.scrollHeight;
                });
            }
        });
    </script>

</body>
</html>

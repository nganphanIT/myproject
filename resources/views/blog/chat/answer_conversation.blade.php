@extends('blog.general.master')
@section('content')
<body>
    <h2>KHÁCH CHỜ TƯ VẤN</h2>
    <div class="container mt-1">
        <table class="table table-dark">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Câu hỏi</th>
                    <th>Trả lời</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conversations as $conversation)
                <tr>
                    <td class="center">{{ $conversation->id }}</td>
                    <td>{{ $conversation->user }}</td>
                    <td>{{ $conversation->question }}</td>
                    <td>
                        <form class="answer-form" action="/blog/chat/answer/{{ $conversation->id }}" method="post">
                            @csrf
                            <input type="text" name="answer" required class="form-control">
                            <button type="submit" class="btn btn-primary mt-2">Phản hồi khách</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container mt-1">
            <button class="btn btn-primary mt-2" id="allMessagesButton">
                <a href="{{ url('blog/chat/') }}"><i class="fas fa-envelope mt-2"></i> Tất cả tin nhắn</a>
            </button>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<style>
    .btn-primary{
        background-color: rgb(248, 237, 217);
        color: black;
        margin-left: 75%;
    }
    a:link {
        text-decoration: none;
        color: black;
    }
    .btn-primary:hover{
        background-color: black;
        color: white;
    }
    .table-dark {
        width: 125%;
        margin-left: -30%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }
    .center,th{
        background-color: black;
        text-align: center;

    }
    td{
        background-color: rgb(179, 176, 176);
    }

    h2 {
        font-style: bold;
        margin-left: -40%;
        font-size: 40px; /* Set the font size to 36 pixels */
        color: black; /* Set the text color to a dark shade (adjust the color code as needed) */
        text-transform: uppercase; /* Convert text to uppercase */
        text-align: center; /* Center-align the text */
        margin-bottom: 20px; /* Add some bottom margin for spacing */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add a subtle text shadow */
    }
    body {
        background-color: white; /* Bootstrap background color */
        color:black; /* Bootstrap text color */
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */

    }
</style>
@endsection

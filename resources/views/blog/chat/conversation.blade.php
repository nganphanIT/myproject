@extends('blog.general.master')
@section('content')
<body>
    <div class="container mt-5">
        <table class="table table-dark">
            <H2>CHI TIẾT HỘI THOẠI CHĂM SÓC KHÁCH HÀNG</H2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Câu hỏi</th>
                    <th>Trả lời</th>
                    <th>Thời gian tạo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conversations as $conversation)
                <tr>
                    <td>{{ $conversation->id }}</td>
                    <td>{{ $conversation->user }}</td>
                    <td>{{ $conversation->question }}</td>
                    <td>{{ $conversation->answer }}</td>
                    <td>{{ $conversation->created_at }}</td>
                    {{-- <td>{{ $conversation->updated_at }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="script.js"></script> <!-- Link to your JavaScript file -->
</body>
</html>
<style>
     .table-dark {
        width: 125%;
        margin-left: -30%;
        border-collapse: collapse;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }
    th{
        text-align: center;

    }

    h2 {
        font-style: bold;
        margin-left: -10%;
        font-size: 40px; /* Set the font size to 36 pixels */
        color: black; /* Set the text color to a dark shade (adjust the color code as needed) */
        text-transform: uppercase; /* Convert text to uppercase */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add a subtle text shadow */
    }
    body {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */

    }
</style>
@endsection


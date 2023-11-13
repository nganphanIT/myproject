@extends('blog.general.master')
@section('content')
    <div class="container">
        <div class="row">
            <h1>PHÂN QUYỀN TRUY CẬP</h1>
            <div class="col-50">
                <table class="table">
                    <tr class="title">
                        <td>STT</td>
                        <td>TÊN TÀI KHOẢN</td>
                        <td>EMAIL</td>
                        <td>QUYỀN TRUY CẬP</td>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td class="center border-cell">{{ $loop->iteration }}</td>
                            <td class="border-cell">{{ $user->name }}</td>
                            <td class="border-cell">{{ $user->email }}</td>
                            <td class="border-cell">
                                <select class="role border-cell" data-user-id="{{ $user->id }}">
                                    <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Administrators</option>
                                    <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>Client</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </table>
            <div>
        </div>
    </div>
@endsection
<style>
    /* CSS cho dropdown */
    .select-container {
        position: relative;
    }

    .select-container select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* CSS cho dropdown khi mở */
    .select-container.select-open select {
        border-color: #007bff;
        box-shadow: 0px 0px 5px 0px #007bff;
    }

    .border-cell, .table {
        border: 1px solid #000; /* Màu và độ dày của viền cho các ô trong cột */
    }
    .center{
        text-align: center;
    }

    .table .title {
        text-align: center;
        border: 1px solid #000;
        font-weight: bold; /* In đậm chữ trên title */
    }

    .paginate svg{
        width: 20px;
    }
    .table{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
        height: max-content;
        background-attachment: fixed;
        background-position: center;
        border-radius: 2%;
        margin-left: -20%;
    }
    .alert{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }
    h1{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
        font-size: 40pt;
        margin-left: 5%;
    }
    .user {
        margin-bottom: 10px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }

    .role {
        margin-left: 10px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }

</style>
<script>
        document.addEventListener("DOMContentLoaded", function() {
        // Lắng nghe sự kiện khi click vào dropdown
        document.querySelectorAll('.select-container select').forEach(function(select) {
            select.addEventListener('click', function() {
                this.parentNode.classList.toggle('select-open');
            });
        });

        // Lắng nghe sự kiện khi click ra ngoài dropdown để đóng dropdown
        window.addEventListener('click', function(event) {
            document.querySelectorAll('.select-container').forEach(function(container) {
                if (!container.contains(event.target)) {
                    container.classList.remove('select-open');
                }
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện khi người dùng thay đổi vai trò
    document.querySelectorAll('.role').forEach(function(select) {
        select.addEventListener('change', function() {
            // Lấy ID của người dùng và vai trò mới
            var id = this.getAttribute('data-user-id');
            var role = this.value;

            // Gửi yêu cầu AJAX đến server để cập nhật vai trò của người dùng
            fetch('/update-role', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id: id,
                    role: role
                })
            })
            .then(function(response) {
                if (response.ok) {
                    console.log('Vai trò đã được cập nhật thành công.');
                } else {
                    console.error('Đã xảy ra lỗi khi cập nhật vai trò.');
                }
            })
            .catch(function(error) {
                console.error('Đã xảy ra lỗi khi gửi yêu cầu.');
                console.error(error);
            });
        });
    });
});
</script>

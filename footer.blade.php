<style>
    footer{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
        background-color: black;
        color:white;
    }
 </style>
 <footer >
    <hr>
    <div class="container col-12 p-4 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
        <div class="col-3">
            <h5>VỀ PERFUME.VN</h5>
            <p>Trang chủ</p>
            <p>Giới thiệu</p>
            <p>Sản phẩm</p>
            <p>Liên hệ</p>
        </div>
        <div class="col-3">
            <h5>HƯỚNG DẪN  </h5>
            <p>Hướng dẫn mua hàng</p>
            <p>Hướng dẫn thanh toán</p>
            <p>Hướng dẫn giao nhận</p>
            <p>Điều khoản sử dụng</p>
        </div>
        <div class="col-3">
            <h5>CHÍNH SÁCH </h5>
            <p>Chính sách mua hàng</p>
            <p>Chính sách bảo mật thông tin</p>
            <p>Chính sách giao hàng</p>
            <p>Chính sách đổi trả - bảo hành</p>
        </div>
        <div class="col-3">
            <h5>HỖ TRỢ      </h5>
            <p>Tìm kiếm</p>
            <p>Đăng nhập</p>
            <p>Đăng ký</p>
            <p>Cộng tác viên</p>
        </div>
    </div>
    <p class="text-center">Copyright &copy; {{ date('Y') }} by myself</p>
</footer>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
let YourEditor;
ClassicEditor
  .create(document.querySelector('#edit-reply-modal'))
  .then(editor => {
    window.editor = editor;
    YourEditor = editor;
  })
</script>

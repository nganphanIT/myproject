@extends('blog.client.layouts')
@if(session('success'))
    <script>
        // Hiển thị hộp thoại xác nhận (confirm dialog)
        if(confirm("{{ session('success') }}")) {
            // Nếu người dùng nhấn OK, reload trang
            window.location.href = "{{ url()->current() }}";
        }
    </script>
@endif
@section('content')
<style>
    .flex{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: space-between;
    }
    .flex-container{
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 400px;
        perspective: 1000px;
        margin: 3px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }
    .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-card-front {
        background-color: white;
        color: black;

    }

    .flip-card-back {
        background-color: rgb(255, 246, 208);
        color: black;
        transform: rotateY(180deg);

    }

    .flip-card-back p{
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
                line-clamp: 2;
        -webkit-box-orient: vertical;

    }
    p{
        margin-left: 3%;
    }
    .center{
        margin-left: 10%;
    }
    .promo {
        background: #ccc;
        padding: 3px;
    }

    .expire {
        color: red;
    }
    .sale-off-icon {
        width: 20%;
        background-color: #ff0000;
        color: #ffffff;
        font-size: 16px;
        padding: 8px 16px;
        border-radius: 30px;
    }
    .new-icon {
        width: 20%;
        background-color: greenyellow;
        color: #ffffff;
        font-size: 16px;
        padding: 8px 16px;
        border-radius: 30px;
    }
    .btn-container {
    display: flex;
    }
    .btn-fa {
        margin-right: 10px;
        width: 50px;
        height: 50px;
    }

    #likes-count {
        margin-right: 10px; /* Để tạo khoảng cách giữa nút thả tim và phần tử tiếp theo */
    }

</style>
<h2>Nước hoa chính hãng -  Cam kết 100%</h2>
    <div class="container border">
           <div class="flex">
                <span class="fw-bold">Xếp theo:</span>
                <form action="{{ url('blog/client/sort') }}" method="get">
                    <label for="label">
                        <input type="radio" name="create_at"   onclick="this.form.submit()">
                        Hàng mới
                    </label>
                </form>
                <form action="{{ url('blog/client/sale_off') }}" method="get">
                    <label for="label">
                        <input type="radio" name="sale_off"   onclick="this.form.submit()">
                        Giảm giá
                    </label>
                </form>
                <form action="{{ url('blog/client/sort_up') }}" method="get">
                    <label for="min_price">
                        <input type="radio" id="min_price" name="sort_up"  onclick="this.form.submit()">
                        Giá cao đến thấp
                    </label>
                </form>
                <form action="{{ url('blog/client/sort_down') }}" method="get">
                    <label for="max_price">
                        <input type="radio" id="max_price" name="sort_down" onclick="this.form.submit()">
                    Giá thấp đến cao
                    </label>
                </form>
           </div>
        <hr>
        <div class="d-flex" id="productList">
            @foreach ($blog as $blog)
                <div>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                @if($blog->sale_off == 0)
                                    <div class="new-icon">
                                        <b> New </b>
                                    </div>
                                    <td>
                                        <img src="{{ url('/') }}/{{ $blog->image }}" alt="" width="300px" height="280px"  >
                                    </td> <br>
                                    <td >
                                        <b>{!! Str::limit($blog->title,30) !!}</b>
                                    </td> <br>
                                    <td style="text-align: center"><b>Giá: </b>{{ number_format($blog->price,0)}} đồng</td>
                                    <br>
                                @else
                                    <div class="sale-off-icon">
                                        <b> {{$blog->sale_off  }}%</b>
                                    </div>
                                    <td>
                                        <img src="{{ url('/') }}/{{ $blog->image }}" alt="" width="300px" height="280px"  >
                                    </td>
                                    <td >
                                        <b>{!! Str::limit($blog->title,30) !!}</b>
                                    </td>
                                    <td style="margin-left:0%;white-space: nowrap;">
                                        <p style="display: inline;">
                                            <br>
                                            <strong style="display: inline;">Giá cũ:</strong>
                                            <p style="display: inline; text-decoration: line-through; margin-left: 5px;">{{ number_format($blog->price, 0) }} đồng</p> <br>
                                            <strong style="display: inline;">Giá mới:</strong>
                                            <p style="display: inline; color: red; font-weight: bold; margin-left: 5px;">{{ number_format($blog->price - ($blog->price * $blog->sale_off / 100)) }} đồng</p>
                                        </p>
                                    </td>   <br>
                                @endif
                            </div>
                            <div class="flip-card-back">
                                <td> <p style="text-align: center"><strong>Thông tin chi tiết:</strong></p></td>
                                <td >
                                   <p>
                                        <b> {{$blog->title  }}</b>
                                   </p>
                                </td>
                                <td>
                                    <p>
                                        {!! Str::limit($blog->description, 100) !!}
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {!! Str::limit($blog->content, 190) !!}
                                    </p>
                                </td>
                            </div> <br>
                        </div>
                    </div>
                    <div class="center" >
                        <div class="btn-container">
                            <button class="btn-fa">
                                <a href="{{ url('blog/client/cart/add') }}/{{ $blog->id }}">
                                    <i style="font-size:26px; color:black" class="fa fa-shopping-cart"></i>
                                </a>
                            </button>
                            <button class="btn-fa">
                                <a href="{{ url('blog/client/detail') }}/{{ $blog->id }}">
                                    <i class="fas fa-bars" style="font-size:26px; color:black"></i>
                                </a>
                            </button>
                             {{-- <button id="like-btn" class="btn-fa" type="submit" onclick="toggleLike()">
                                    <i id="like-icon" class='far fa-heart' style="font-size:24px; color:black"></i>
                                </button> --}}
                            <form id="like-form" action="{{ url('blog/client/like') }}/{{ $blog->id }}" method="post">
                                @csrf
                                <button id="like-btn" id="like-btn-{{ $blog->id }}" type="submit" class="btn-fa" onclick="toggleLike() onclick="toggleLike({{ $blog->id }})">
                                    <i id="like-icon-{{ $blog->id }}" class='far fa-heart' style="font-size:26px; color:{{ App\Models\Like::where(['user_id' => Auth::user()->id, 'product_id' => $blog->id])->exists() ? 'red' : 'black' }}"></i>
                                </button>
                            </form>
                            <button class="btn-fa">
                                {{ App\Models\Like::where('product_id', $blog->id)->count() }} Likes
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-12">
            <div class="paginate">
            {{-- <br>{{ $blog }} --}}
            </div>
        </div>
    </div>
   <button id="openChatBtn">
        <i class="fas fa-perfume"></i> Chat
    </button>
    <form id="chat-form">
        <div id="chatPopup" class="chat-popup">
            <button id="closeChatBtn">
                <i class="fa">&#xf00d;</i>
            </button>
            <h3>Chat với Perfume.vn</h3>
            <div class="chat-container">
                <p><strong></strong> Xin chào, bạn đang tìm kiếm sản phẩm nước hoa như thế nào? </p>
                <div id="clock">
                </div>
                <div id="chatArea">
                    <div id="chat-history"></div>
                </div>
                <div class="chat-container">
                    <input type="text" id="user" class="input-box" placeholder="Bạn tên gì...">
                    <input type="text" id="question" class="input-box" placeholder="Bạn hỏi gì đi...">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <button id="sendBtn" onclick="sendMessage()" class="send-button" type="submit">Gửi</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function toggleLike(blogId) {
            const productId = blogId;
            const likeForm = document.getElementById('like-form-' + blogId);
            const likeIcon = document.getElementById('like-icon-' + blogId);
            // Event listener for the like form submission
            likeForm.addEventListener('submit', function (e) {
                e.preventDefault();
                fetch(`/blog/client/like/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(() => {
                    updateLikesCount(blogId);
                    fetchIsLiked(blogId);
                });
            });
        }
        function updateLikesCount(blogId) {
            const likesCountElement = document.getElementById('likes-count-' + blogId);
            fetch(`/blog/client/like/count/${blogId}`)
                .then(response => response.json())
                .then(data => {
                    likesCountElement.innerText = data.likesCount + ' Likes';
                    location.reload();
                })
                .catch(error => {

                    console.error('Error:', error);
                });
        }
        function fetchIsLiked(blogId) {
            const likeIcon = document.getElementById('like-icon-' + blogId);
            fetch(`/blog/client/like/is-liked/${blogId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.isLiked) {
                        likeIcon.style.color = 'red';
                        likeIcon.style.backgroundColor = 'pink';
                    } else {
                        likeIcon.style.color = 'black';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
    <script>
                function sendMessage() {
                var today = new Date();
                var year = today.getFullYear();
                var mes = today.getMonth()+1;
                var dia = today.getDate();
                var fecha =dia+"-"+mes+"-"+year;
                document.getElementById("clock").innerHTML = fecha;
                var user = document.getElementById('user').value;
                var message = document.getElementById('question').value;
                if (!user || !message) {
                    alert('Vui lòng nhập tên và câu hỏi.');
                    return;
                }
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/send-message', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        var chatMessages = document.getElementById('chat-messages');
                        chatMessages.innerHTML += '<strong>' + response.user + ':</strong> ' + response.message + '<br>';
                        document.getElementById('user').value = '';
                        document.getElementById('question').value = '';
                    }
                };
                var data = JSON.stringify({ user: user, message: message });
                xhr.send(data);
            }
            const openChatBtn = document.getElementById('openChatBtn');
            const chatPopup = document.getElementById('chatPopup');
            const closeChatBtn = document.getElementById('closeChatBtn');
            const question = document.getElementById('question');
            const chatArea = document.getElementById('chatArea');
            const user = document.getElementById('user').value;


            openChatBtn.addEventListener('click', () => {
                chatPopup.style.display = 'block';
            });

            closeChatBtn.addEventListener('click', () => {
                chatPopup.style.display = 'none';
            });

            document.getElementById('sendBtn').addEventListener('click', () => {
                Date.prototype.timeNow = function () {
                    return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
                }
                const time=new Date().toLocaleTimeString();
                const message = question.value;
                const user = user.value;

                if (message.trim() !== '') {
                    chatArea.innerHTML += `<p>${user}: ${message}</p>
                                            <p style="font-style:italic"> ${time}</p> `;
                    question.value = '';
                   // chatArea.scrollTop = chatArea.scrollHeight;
                   function appendMessage() {
                        const message = document.getElementsByClassName('chatArea')[0];
                        const newMessage = message.cloneNode(true);
                        messages.appendChild(newMessage);
                        }

                        function getMessages() {

                        shouldScroll = messages.scrollTop - messages.clientHeight  === messages.scrollHeight;

                        appendMessage();

                        if (!shouldScroll) {
                            scrollTop();
                        }
                        }
                        function scrollTop() {
                            messages.scrollTop = messages.scrollHeight;
                        }
                        scrollTop();
                        setInterval(getMessages, 100);
                }

            });
            document.getElementById('chat-form').addEventListener('submit', function(event) {
                event.preventDefault();
                const question = document.getElementById('question').value;
                const user = document.getElementById('user').value;
                fetch('/blog/chat/ask', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                    },
                    body: JSON.stringify({ user:user }),
                    body: JSON.stringify({ question: question })
                })
                .then(response => response.json())
                .then(data => {
                    Date.prototype.timeNow = function () {
                        return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
                    }
                    const time=new Date().toLocaleTimeString();

                    const chatHistory = document.getElementById('chat-history');
                    chatHistory.innerHTML += `<div><strong> ${user}</strong> ${question}</div>
                                                <p style="font-style:italic"> ${time}</p>`;
                    // chatHistory.innerHTML += `<div><strong>Bot:</strong> ${data.answer}</div>
                    //                             <p style="font-style:italic"> ${time}</p>`;
                });
            });
            document.getElementById('chat-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const question = document.getElementById('question').value;
            const user = document.getElementById('user').value;


            fetch('/blog/chat/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ user:user,question: question })
            })
            .then(response => response.json())
            .then(data => {

                Date.prototype.timeNow = function () {
                    return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
                }
                const time=new Date().toLocaleTimeString();
                const chatHistory = document.getElementById('chat-history');
                chatHistory.innerHTML += `<div><strong>${user}</strong> ${question}</div>
                                            <p style="font-style:italic"> ${time}</p>`;
                chatHistory.innerHTML += `<div><strong>Bot:</strong> ${data.answer}</div>
                                            <p style="font-style:italic"> ${time}</p>`;
                document.getElementById('question').value = '';
            });
        });

    </script>
@endsection

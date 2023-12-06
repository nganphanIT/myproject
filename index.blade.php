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
        <div id="main">
            @foreach ($blog as $key=>$value )
                <div class="border">
                    @if($value->sale_off == 0)
                        <span class="new-icon">New</span>
                        <div class="img-container">
                            <img src="{{ url('/') }}/{{ $value->image }}" alt="" width="300px" height="280px">
                        </div>
                        <p><b>{!! Str::limit($value->title, 30) !!}</b></p>
                        <p><strong>Giá: </strong>{{ number_format($value->price, 0) }} đồng</p>
                        <p style="color:white"><strong>Giá: </strong>{{ number_format($value->price, 0) }} đồng</p>

                    @else
                        <span class="sale-off-icon">{{$value->sale_off}}%</span>
                        <div class="img-container">
                            <img src="{{ url('/') }}/{{ $value->image }}" alt="" width="300px" height="280px">
                        </div>
                        <p><b>{!! Str::limit($value->title, 30) !!}</b></p>
                        <p style="text-decoration: line-through;"><strong>Giá cũ:</strong> {{ number_format($value->price, 0) }} đồng</p>
                        <p style="color: red"><strong>Giá mới: </strong>{{ number_format($value->price - ($value->price * $value->sale_off / 100)) }} đồng</p>
                    @endif
                    <div class="btn-container">
                        <a href="{{ url('blog/client/cart/add') }}/{{ $value->id }}">
                            <button class="btn-fa">
                                <i style="font-size:26px; color:black" class="fa fa-shopping-cart"></i>
                            </button>
                        </a>
                        <a href="{{ url('blog/client/detail') }}/{{ $value->id }}">
                            <button class="btn-fa">
                            <i class="fas fa-bars" style="font-size:26px; color:black"></i>
                            </button>
                        </a>
                        <form id="like-form" action="{{ url('blog/client/like') }}/{{ $value->id }}" method="post">
                            @csrf
                            <button id="like-btn" id="like-btn-{{ $value->id }}" type="submit" class="btn-fa" onclick="toggleLike() onclick="toggleLike({{ $value->id }})">
                                <i id="like-icon-{{ $value->id }}" class='far fa-heart' style="font-size:26px; color:{{ App\Models\Like::where(['user_id' => Auth::user()->id, 'product_id' => $value->id])->exists() ? 'red' : 'black' }}"></i>
                            </button>
                        </form>
                        <button class="btn-fa">
                            {{ App\Models\Like::where('product_id', $value->id)->count() }} Likes
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="col-12">
            <div class="paginate">
             {{ $blog }}
            </div>
        </div>
    </div>


    <button id="openChatBtn">
        <i class='far fa-comment' style='font-size:36px'></i>
    </button>
    <button id="callPhone" onmouseover="showPhoneNumber()" onmouseout="hidePhoneNumber()">
        <i class="fa fa-phone" style="font-size:40px;color: white"></i>
        <div id="phoneNumberTooltip">  <span>0782-988-214</span></div>
    </button>
     <button id="zaloIcon" onmouseover="showZaloQRCode()" onmouseout="hideZaloQRCode()">
        <i class="fab fa-zalo" style="font-size:40px;"></i>
        <span>Zalo</span>
        <div id="zaloQRCode">
            <img src="{{ asset('uploads/zalo.jpg') }}" alt="Zalo QR Code">
        </div>
    </button>
    <script>
        function showZaloQRCode() {
            var zaloQRCode = document.getElementById("zaloQRCode");
            zaloQRCode.style.display = "block";
        }

        function hideZaloQRCode() {
            var zaloQRCode = document.getElementById("zaloQRCode");
            zaloQRCode.style.display = "none";
        }
        function showPhoneNumber() {
            var phoneNumberTooltip = document.getElementById("phoneNumberTooltip");
            phoneNumberTooltip.style.display = "block";
        }

        function hidePhoneNumber() {
            var phoneNumberTooltip = document.getElementById("phoneNumberTooltip");
            phoneNumberTooltip.style.display = "none";
        }
    </script>
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
            var user = @json(Auth::user()->id);
            var message = document.getElementById('question').value;
            if (!message) {
                alert('Vui lòng nhập câu hỏi.');
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
            const user = @json(Auth::user()->id);
            openChatBtn.addEventListener('mouseover', () => {
                chatPopup.style.display = 'block';
                const  greet = 'Chào mừng bạn đến với dịch vụ của chúng tôi! Tôi là chatbot tự động, tôi ở đây để giúp bạn. Hãy hỏi tôi bất kỳ điều gì bạn muốn.';
                const chatHistory = document.getElementById('chat-history');
                const timeNow = new Date().toLocaleTimeString();
                chatHistory.innerHTML += `<div><strong>Bot:</strong> ${greet}</div>
                                    <p style="font-style:italic">${timeNow}</p>`;
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
                    chatArea.scrollTop = chatArea.scrollHeight;
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
                const user = @json(Auth::user()->name);


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

<style>
    #zaloIcon {
        background-color: #30b1f1; /* Zalo color */
        border: none;
        color: white;
        padding: 10px;
        cursor: pointer;
        position: relative;
        width: 130px;
        height: 80px;
    }

    #zaloQRCode {
        display: none;
        position: absolute;
        top: -400%;
        right:400px;
        transform: translateX(-50%);
        border-radius: 5px;
        width: 150px;
        text-align: left;
        position: absolute;
        z-index: 1;


    }
    #zaloQRCode img {
        image-rendering: pixelated;
        object-fit: contain;
        width: 550px;
        height: 520px;

    }
   #callPhone {
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            position: relative;
        }

    #phoneNumberTooltip {
        display: none;
        position: absolute;
        top: -50%;
        left: -90%;
        transform: translateX(-50%);
        background-color: black;
        color: white;
        border-radius: 5px;
        width: 150px;
        text-align: center;
        position: absolute;
        z-index: 1;
        margin-left: 10%;
    }
    .flex{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: space-between;
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

    .btn-container {
        display: flex;
        margin-left: 10%;
    }
    .btn-fa {
        margin-right: 10px;
        width: 50px;
        height: 50px;
        padding-top: 0%;
        margin-bottom: 5px;
    }

    #likes-count {
        margin-right: 10px;
    }
    .paginate svg{
        width: 30px;
    }
    .new-icon {
        height: 50px;
        width: 50px;
        background-color: green;
        border-radius: 30%;
        display: inline-flex; /* Use inline-flex to center vertically and horizontally */
        align-items: center; /* Center vertically */
        justify-content: center; /* Center horizontally */
        font-weight: bold;
        color: white;
    }
    .sale-off-icon{
        height: 50px;
        width: 50px;
        background-color: red;
        border-radius: 30%;
        display: inline-flex; /* Use inline-flex to center vertically and horizontally */
        align-items: center; /* Center vertically */
        justify-content: center; /* Center horizontally */
        font-weight: bold;
        color: white;

    }
    #main {
        width: 100%;
        height: fit-content;
        border: 1px solid #c3c3c3;
        display: flex;
        flex-wrap: wrap;
    }

    #main .container {
        width: 300px;
        height: 500px;
    }
    .hide-details {
    display: none;
    }

    .container {
        position: relative;
        overflow: hidden; /* Ensure the hidden details do not affect layout */
    }

    .img-container {
        position: relative;
    }

    .details {
        position: absolute;
        top: 0;
        left: 0;
        background-color: white;
        padding: 10px;
        border: 1px solid #ccc;
        z-index: 999;
        width: 100%;
    }

    .container:hover .hide-details {
        display: block;
    }

</style>

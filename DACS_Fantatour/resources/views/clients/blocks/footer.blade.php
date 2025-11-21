<!-- footer area start -->
<footer class="main-footer footer-two bgp-bottom bgc-black rel z-15 pt-100 pb-115" style="background-image: url({{ asset('clients/assets/images/backgrounds/footer-two.png')}});">
    <div class="widget-area">
        <div class="container">
            <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2">
                <div class="col col-small" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-text">
                        <div class="footer-logo mb-40">
                            <a href="{{ route('home') }}"><img src="{{ asset('clients/assets/images/logos/logo.png') }}" alt="Logo"></a>
                        </div>
                        <div class="footer-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.6857729938574!2d106.7587396101279!3d10.835341558060687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527ae7b121297%3A0x9fda1a8492c5074d!2zNDgvMy8zQSDEkC4gU-G7kSAzLCBUcsaw4budbmcgVGjhu40sIFRo4bunIMSQ4bupYywgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1748119699944!5m2!1svi!2s" 
                            style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links ms-sm-5">
                        <div class="footer-title">
                            <h5>Dịch vụ</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{ route('travel-guides') }}">Hướng dẫn viên du lịch tốt nhất</a></li>
                            <li><a href="{{ route('tours') }}">Đặt tour</a></li>
                            <li><a href="{{ route('tours') }}">Đặt vé</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links ms-md-4">
                        <div class="footer-title">
                            <h5>Công ty</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{ route('about') }}">Giới thiệu về công ty</a></li>
                            <li><a href="{{ route('contact') }}">Việc làm và nghề nghiệp</a></li>
                            <li><a href="{{ route('contact') }}">Liên hệ với chúng tôi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-small" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links ms-lg-4">
                        <div class="footer-title">
                            <h5>Điểm đến</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{ route('destination') }}">Miền Bắc</a></li>
                            <li><a href="{{ route('destination') }}">Miền Trung</a></li>
                            <li><a href="{{ route('destination') }}">Miền Nam</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-md-6 col-10 col-small" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-contact">
                        <div class="footer-title">
                            <h5>Liên hệ</h5>
                        </div>
                        <ul class="list-style-one">
                            <li><i class="fal fa-map-marked-alt"></i>48/3/3A, Đường số 3, Trường thọ, Thủ đức< TP.HCM</li>
                            <li><i class="fal fa-envelope"></i> <a
                                    href="mailto:tranlongvu02102004@gmail.com">tranlongvu02102004@gmail.com</a></li>
                            <li><i class="fal fa-phone-volume"></i> <a href="callto:+88012334588">+880 (123)
                                    345 88</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-transparent pt-20 pb-5">
        <div class="container">
            <div class="row">
               <div class="col-lg-5">
                    <div class="copyright-text text-center text-lg-start">
                        <p>@Copy 2025 <a href="\">Fantatour</a>, All rights reserved</p>
                    </div>
               </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

</div>
<!--End pagewrapper-->

{{-- hộp thoại zalo and mess --}}
<div class="floating-social">
    <!-- Card chứa các icon chat -->
    <div class="card">
        <ul>
            <!-- Messenger Icon -->
            <li class="iso-pro">
                <span></span>
                <span></span>
                <span></span>
                <a href="https://m.me/your_page_id" target="_blank" title="Chat Messenger">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48" class="svg">
                        <path fill="#448AFF" d="M24,4C13.5,4,5,12.1,5,22c0,5.2,2.3,9.8,6,13.1V44l7.8-4.7c1.6,0.4,3.4,0.7,5.2,0.7c10.5,0,19-8.1,19-18C43,12.1,34.5,4,24,4z"></path>
                        <path fill="#FFF" d="M12 28L22 17 27 22 36 17 26 28 21 23z"></path>
                    </svg>
                </a>
            </li>
            
            <!-- Zalo Icon -->
            <li class="iso-pro">
                <span></span>
                <span></span>
                <span></span>
                <a href="#" title="Chat Zalo" onclick="toggleZaloWidget(); return false;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" class="svg">
                        <path fill="#2962ff" d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z"></path>
                        <path fill="#eee" d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z"></path>
                        <path fill="#2962ff" d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z"></path>
                        <path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"></path>
                        <path fill="#2962ff" d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z"></path>
                        <path fill="#2962ff" d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z"></path>
                    </svg>
                </a>
            </li>
            
            <!-- Chat AI Icon -->
            <li class="iso-pro">
                <span></span>
                <span></span>
                <span></span>
                <a href="#" title="Trợ lý AI" onclick="toggleAIChat(); return false;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="svg">
                        <path fill="#007bff" d="M20 9V7c0-1.1-.9-2-2-2h-3c0-1.66-1.34-3-3-3S9 3.34 9 5H6c-1.1 0-2 .9-2 2v2c-1.66 0-3 1.34-3 3s1.34 3 3 3v4c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-4c1.66 0 3-1.34 3-3s-1.34-3-3-3zM7.5 11.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5S9.83 13 9 13s-1.5-.67-1.5-1.5zM16 17H8v-2h8v2zm-1-4c-.83 0-1.5-.67-1.5-1.5S14.17 10 15 10s1.5.67 1.5 1.5S15.83 13 15 13z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Widget Zalo - CHỈ CÓ 1 WIDGET DUY NHẤT -->
<div id="zalo-chat-widget" class="zalo-chat-widget zalo-hidden">
    <!-- Widget Zalo sẽ được tích hợp ở đây -->
    <div class="zalo-widget-content">
        <div class="zalo-header">
            <h4>Chat với Zalo</h4>
            <p>Tourista hỗ trợ bạn</p>
        </div>
        <div class="zalo-chat-area">
            <!-- Nội dung chat Zalo thực tế sẽ được tích hợp ở đây -->
            <div class="zalo-placeholder">
                <p>Kết nối với Zalo Official Account</p>
                <div class="zalo-qr-code">
                    <!-- Có thể thêm QR code Zalo ở đây -->
                    <div class="qr-placeholder">QR Code Zalo</div>
                </div>
                <div class="zalo-contact-info">
                    <p><strong>Số điện thoại:</strong> 0123.456.789</p>
                    <p><strong>Zalo ID:</strong> tourista</p>
                </div>
            </div>
        </div>
        <button onclick="toggleZaloWidget()" class="zalo-close-btn">
            Đóng
        </button>
    </div>
</div>

<!-- Hộp thoại chatbot AI -->
<div id="ai-chat-box" class="ai-chat-box">
    <div class="ai-chat-header">
        Trợ lý du lịch Tourista
    </div>
    <div id="messages" class="ai-chat-messages">
        <div class="bot-message"><b>Bot:</b> Xin chào 👋! Tôi có thể giúp bạn tìm tour trong hệ thống.</div>
    </div>
    <div class="ai-chat-input">
        <input id="userInput" type="text" placeholder="Nhập tin nhắn..." 
               onkeydown="if(event.key === 'Enter') sendMessage();">
        <button onclick="sendMessage()">Gửi</button>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    window.chatbotUrl = "{{ route('chatbot.handle') }}";
    window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    
    // Khởi tạo - Ẩn widget Zalo khi trang load
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('zalo-chat-widget').classList.add('zalo-hidden');
        document.getElementById('ai-chat-box').style.display = 'none';
    });
    
    // Hàm toggle Zalo Widget - ĐÃ SỬA
    function toggleZaloWidget() {
        const widget = document.getElementById('zalo-chat-widget');
        const isHidden = widget.classList.contains('zalo-hidden');
        
        // Đóng AI chat nếu đang mở
        document.getElementById('ai-chat-box').style.display = 'none';
        
        if (isHidden) {
            widget.classList.remove('zalo-hidden');
            widget.classList.add('zalo-visible');
        } else {
            widget.classList.remove('zalo-visible');
            widget.classList.add('zalo-hidden');
        }
        
        // Ngăn sự kiện click lan ra ngoài
        event.stopPropagation();
    }
    
    // Hàm toggle AI Chat
    function toggleAIChat() {
        const chatBox = document.getElementById('ai-chat-box');
        const isVisible = chatBox.style.display === 'flex';
        
        // Đóng Zalo nếu đang mở
        document.getElementById('zalo-chat-widget').classList.add('zalo-hidden');
        document.getElementById('zalo-chat-widget').classList.remove('zalo-visible');
        
        if (!isVisible) {
            chatBox.style.display = 'flex';
        } else {
            chatBox.style.display = 'none';
        }
        
        // Ngăn sự kiện click lan ra ngoài
        event.stopPropagation();
    }
    
    // Hàm gửi tin nhắn AI
    function sendMessage() {
        const userInput = document.getElementById('userInput');
        const messages = document.getElementById('messages');
        
        if (userInput.value.trim() === '') return;
        
        // Thêm tin nhắn người dùng
        const userMessage = document.createElement('div');
        userMessage.className = 'user-message';
        userMessage.innerHTML = `<b>Bạn:</b> ${userInput.value}`;
        messages.appendChild(userMessage);
        
        // Hiệu ứng typing
        const typingMessage = document.createElement('div');
        typingMessage.className = 'typing-message';
        typingMessage.innerHTML = '<b>Bot:</b> <span class="typing-dots">...</span>';
        messages.appendChild(typingMessage);
        messages.scrollTop = messages.scrollHeight;
        
        // Gửi yêu cầu đến server
        fetch(window.chatbotUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.csrfToken
            },
            body: JSON.stringify({ message: userInput.value })
        })
        .then(response => response.json())
        .then(data => {
            // Xóa tin nhắn typing
            typingMessage.remove();
            
            // Thêm phản hồi từ bot
            const botMessage = document.createElement('div');
            botMessage.className = 'bot-message';
            botMessage.innerHTML = `<b>Bot:</b> ${data.response}`;
            messages.appendChild(botMessage);
            
            // Cuộn xuống cuối
            messages.scrollTop = messages.scrollHeight;
        })
        .catch(error => {
            console.error('Error:', error);
            // Xóa tin nhắn typing
            typingMessage.remove();
            
            const errorMessage = document.createElement('div');
            errorMessage.className = 'bot-message';
            errorMessage.innerHTML = `<b>Bot:</b> Xin lỗi, đã xảy ra lỗi. Vui lòng thử lại.`;
            messages.appendChild(errorMessage);
            messages.scrollTop = messages.scrollHeight;
        });
        
        // Xóa input
        userInput.value = '';
    }
    
    // Đóng widget khi click ra ngoài
    document.addEventListener('click', function(event) {
        const zaloWidget = document.getElementById('zalo-chat-widget');
        const aiChatBox = document.getElementById('ai-chat-box');
        const floatingSocial = document.querySelector('.floating-social');
        
        // Kiểm tra click có phải trên widget hoặc floating social không
        const isClickInsideZalo = zaloWidget.contains(event.target);
        const isClickInsideAI = aiChatBox.contains(event.target);
        const isClickInsideFloating = floatingSocial.contains(event.target);
        
        if (!isClickInsideZalo && !isClickInsideFloating && !zaloWidget.classList.contains('zalo-hidden')) {
            zaloWidget.classList.add('zalo-hidden');
            zaloWidget.classList.remove('zalo-visible');
        }
        
        if (!isClickInsideAI && !isClickInsideFloating && aiChatBox.style.display === 'flex') {
            aiChatBox.style.display = 'none';
        }
    });
</script>

<style>
    /* icon Zalo - GIỮ NGUYÊN */
    .floating-social {
        position: fixed;
        right: 20px;
        bottom: 50px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 16px;
        z-index: 1000;
    }

    /* CSS MỚI CHO CARD */
    .card {
        max-width: fit-content;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        align-content: center;
        justify-content: center;
        gap: 1rem;
        backdrop-filter: blur(15px);
        background: rgba(173, 173, 173, 0.05);
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.192),
            inset 0 0 5px rgba(255, 255, 255, 0.274), 0 5px 5px rgba(0, 0, 0, 0.164);
        transition: 0.5s;
    }

    .card:hover {
        animation: ease-out 5s;
        background: rgba(173, 173, 173, 0.1);
    }

    .card ul {
        padding: 1rem;
        display: flex;
        list-style: none;
        gap: 1rem;
        align-items: center;
        justify-content: center;
        align-content: center;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .card ul li {
        cursor: pointer;
        position: relative;
    }

    .card .svg {
        transition: all 0.3s;
        padding: 1rem;
        height: 60px;
        width: 60px;
        border-radius: 100%;
        color: rgb(255, 174, 0);
        fill: currentColor;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.3),
            inset 0 0 5px rgba(255, 255, 255, 0.5), 0 5px 5px rgba(0, 0, 0, 0.164);
    }

    .card .text {
        opacity: 0;
        border-radius: 5px;
        padding: 8px 12px;
        transition: all 0.3s;
        color: white;
        background-color: rgba(0, 0, 0, 0.7);
        position: absolute;
        z-index: 9999;
        box-shadow: -5px 0 1px rgba(153, 153, 153, 0.2),
            -10px 0 1px rgba(153, 153, 153, 0.2),
            inset 0 0 20px rgba(255, 255, 255, 0.1),
            inset 0 0 5px rgba(255, 255, 255, 0.2), 0 5px 5px rgba(0, 0, 0, 0.082);
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 15px;
        white-space: nowrap;
        text-align: left;
    }

    /*isometric projection cho card*/
    .iso-pro {
        transition: 0.5s;
        position: relative;
    }

    .iso-pro:hover a > .svg {
        transform: translate(-5px, -5px);
        border-radius: 100%;
    }

    .iso-pro:hover .text {
        opacity: 1;
        transform: translateY(-50%) translateX(-5px);
    }

    .iso-pro span {
        opacity: 0;
        position: absolute;
        color: #1877f2;
        border-color: #1877f2;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.3),
            inset 0 0 5px rgba(255, 255, 255, 0.5), 0 5px 5px rgba(0, 0, 0, 0.164);
        border-radius: 50%;
        transition: all 0.3s;
        height: 60px;
        width: 60px;
    }

    .iso-pro:hover span {
        opacity: 1;
    }

    .iso-pro:hover span:nth-child(1) {
        opacity: 0.2;
    }

    .iso-pro:hover span:nth-child(2) {
        opacity: 0.4;
        transform: translate(-5px, -5px);
    }

    .iso-pro:hover span:nth-child(3) {
        opacity: 0.6;
        transform: translate(-10px, -10px);
    }

    /* Chat widget - ĐÃ SỬA HOÀN TOÀN */
    .zalo-chat-widget {
        position: fixed;
        bottom: 125px;
        right: 20px;
        width: 350px;
        z-index: 10000;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .zalo-hidden {
        display: none !important;
    }

    .zalo-visible {
        display: block !important;
    }

    .zalo-widget-content {
        background: #fff;
        border-radius: 12px;
        padding: 15px;
        width: 100%;
        height: 420px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        display: flex;
        flex-direction: column;
    }

    .zalo-header {
        text-align: center;
        margin-bottom: 15px;
    }

    .zalo-header h4 {
        color: #0068ff;
        margin: 0;
        font-size: 18px;
    }

    .zalo-header p {
        color: #666;
        font-size: 14px;
        margin: 5px 0 0 0;
    }

    .zalo-chat-area {
        flex: 1;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 15px;
        background: #f9f9f9;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .zalo-placeholder {
        text-align: center;
        color: #888;
    }

    .zalo-qr-code {
        margin: 15px 0;
        padding: 10px;
        background: white;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .qr-placeholder {
        padding: 20px;
        background: #f5f5f5;
        border-radius: 4px;
        font-weight: bold;
    }

    .zalo-contact-info {
        margin-top: 15px;
        font-size: 14px;
    }

    .zalo-contact-info p {
        margin: 5px 0;
    }

    .zalo-close-btn {
        width: 100%;
        padding: 10px;
        background: #0068ff;
        color: white;
        border: none;
        border-radius: 6px;
        margin-top: 10px;
        cursor: pointer;
        font-weight: bold;
    }

    .zalo-close-btn:hover {
        background: #0055cc;
    }

    /* AI Chat Box Styles */
    .ai-chat-box {
        position: fixed;
        bottom: 180px;
        right: 20px;
        width: 300px;
        height: 400px;
        border: 1px solid #ccc;
        background: #fff;
        border-radius: 8px;
        display: none;
        flex-direction: column;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .ai-chat-header {
        background: #007bff;
        color: #fff;
        padding: 10px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        font-weight: bold;
    }

    .ai-chat-messages {
        flex: 1;
        padding: 10px;
        overflow-y: auto;
        max-height: 300px;
    }

    .user-message {
        text-align: right;
        margin: 5px 0;
        padding: 8px;
        background: #e3f2fd;
        border-radius: 10px;
        margin-left: 20px;
    }

    .bot-message {
        text-align: left;
        margin: 5px 0;
        padding: 8px;
        background: #f5f5f5;
        border-radius: 10px;
        margin-right: 20px;
    }

    .typing-message {
        text-align: left;
        margin: 5px 0;
        padding: 8px;
        background: #f5f5f5;
        border-radius: 10px;
        margin-right: 20px;
        font-style: italic;
    }

    .typing-dots {
        animation: typing 1.5s infinite;
    }

    @keyframes typing {
        0%, 20% { opacity: 0; }
        50% { opacity: 1; }
        100% { opacity: 0; }
    }

    .ai-chat-input {
        display: flex;
        border-top: 1px solid #ccc;
    }

    .ai-chat-input input {
        flex: 1;
        border: none;
        padding: 8px;
        outline: none;
    }

    .ai-chat-input button {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
    }

    .ai-chat-input button:hover {
        background: #0056b3;
    }

    /* Hiệu ứng cho icon trong card */
    .card .iso-pro:hover .svg {
        transform: scale(1.1);
        transition: transform 0.2s ease-in-out;
    }
</style>
{{-- End --}}

@if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
@endif
    
    <!-- Jquery -->
    <script src="{{asset('clients/assets/js/jquery-3.6.0.min.js')}}"></script>


    {{-- jquery-toast  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('clients/assets/js/bootstrap.min.js')}}"></script>
    <!-- Appear Js -->
    <script src="{{asset('clients/assets/js/appear.min.js')}}"></script>
    <!-- Slick -->
    <script src="{{asset('clients/assets/js/slick.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('clients/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Nice Select -->
    <script src="{{asset('clients/assets/js/jquery.nice-select.min.js')}}"></script>
    <!-- Image Loader -->
    <script src="{{asset('clients/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- Skillbar -->
    <script src="{{asset('clients/assets/js/skill.bars.jquery.min.js')}}"></script>
    <!-- Isotope -->
    <script src="{{asset('clients/assets/js/isotope.pkgd.min.js')}}"></script>
    <!--  AOS Animation -->
    <script src="{{asset('clients/assets/js/aos.js')}}"></script>
    <!-- Custom script -->
    <script src="{{asset('clients/assets/js/script.js')}}"></script>
    {{-- paypal-payment  --}}
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
    <!-- Custom script -->
    <script src="{{asset('clients/assets/js/custom-js.js')}}"></script>
    <script src="{{asset('clients/assets/js/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

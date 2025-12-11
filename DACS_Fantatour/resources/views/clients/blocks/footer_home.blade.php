<!-- footer area start -->
<footer class="main-footer bgs-cover overlay rel z-1 pb-25"
    style="background-image: url({{ asset('clients/assets/images/backgrounds/mui-dinh-cau-dep-me-hon-luc-hoang-hon.jpeg') }});">
    <div class="container">
        <div class="footer-top pt-100 pb-30">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-text">
                        <div class="footer-logo mb-25">
                            <a href="{{ route('home') }}"><img src="{{ asset('clients/assets/images/logos/logo.png') }}"
                                    alt="Logo"></a>
                        </div>
                        <p>Chúng tôi biên soạn các hành trình riêng biệt phù hợp với sở thích của bạn, đảm bảo mọi
                            chuyến đi đều
                            liền mạch và làm phong phú thêm những viên ngọc ẩn giấu</p>
                        <div class="social-style-one mt-15">
                            <a href=><i class="fab fa-facebook-f"></i></a>
                            <a href="contact.html"><i class="fab fa-youtube"></i></a>
                            <a href="contact.html"><i class="fab fa-pinterest"></i></a>
                            <a href="contact.html"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="section-title counter-text-wrap mb-35">
                        <h2>Đăng ký nhận bản tin</h2>
                    </div>
                    <form class="newsletter-form mb-50" action="#">
                        <input id="news-email" type="email" placeholder="Email Address" required>
                        <button type="submit" class="theme-btn bgc-secondary style-two">
                            <span data-hover="Đăng ký">Đăng ký</span>
                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area pt-95 pb-45">
        <div class="container">
            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                <div class="col col-small" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-links">
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
                <div class="col col-small" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="footer-widget footer-links">
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
                <div class="col col-small" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="footer-widget footer-links">
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
                <div class="col col-small" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="footer-widget footer-links">
                        <div class="footer-title">
                            <h5>Thể loại</h5>
                        </div>
                        <ul class="list-style-three">
                            <li><a href="{{ route('contact') }}">Phiêu lưu</a></li>
                            <li><a href="{{ route('contact') }}">Tour gia đình</a></li>
                            <li><a href="{{ route('contact') }}">Tour động vật hoang dã</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-md-6 col-10 col-small" data-aos="fade-up" data-aos-delay="200"
                    data-aos-duration="1500" data-aos-offset="50">
                    <div class="footer-widget footer-contact">
                        <div class="footer-title">
                            <h5>Liên hệ</h5>
                        </div>
                        <ul class="list-style-one">
                            <li><i class="fal fa-map-marked-alt"></i> 48/3/3A, Đường số 3, Trường thọ, Thủ đức, TP.HCM</li>
                            <li><i class="fal fa-envelope"></i> <a
                                    href="mailto:tranlongvu02102004@gmail.com">tranlongvu02102004@gmail.com</a></li>
                            <li><i class="fal fa-clock"></i> Thứ 2 - Thứ 6, 08am - 05pm</li>
                            <li><i class="fal fa-phone-volume"></i> <a href="callto:+88012334588">+880 (123)
                                    345 88</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-20 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="copyright-text text-center text-lg-start">
                        <p>@Copy 2025 <a href="{{ route('home') }}">Tourista</a>, All rights reserved</p>
                    </div>
                </div>
            </div>
            <!-- Scroll Top Button -->
            <button class="scroll-top scroll-to-target" data-target="html"><img
                    src="{{ asset('clients/assets/images/icons/scroll-up.png') }}" alt="Scroll  Up"></button>
        </div>
    </div>
</footer>
<!-- footer area end -->

</div>
<!--End pagewrapper-->

{{-- CHATBOT AI DUY NHẤT – ĐÃ FIX TẤT CẢ LỖI --}}
<div class="floating-ai-chat">
    <div class="chat-bubble" onclick="toggleAIChat()">
        <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="white" stroke-width="2.5">
            <path d="M21 11.5a8.5 8.5 0 0 1-13.5 6.8l-4.5 1.5 1.5-4.5A8.5 8.5 0 1 1 21 11.5z"/>
            <circle cx="9" cy="11" r="1"/><circle cx="15" cy="11" r="1"/>
        </svg>
    </div>

    <div id="ai-chat-box" class="ai-chat-container">
        <div class="ai-chat-header">
            <div class="header-info">
                <div class="avatar">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="white">
                        <path d="M12 2a10 10 0 0 1 10 10a10 10 0 0 1-7.33 9.67a1 1 0 0 1-.8-.2l-3.16-1.58a1 1 0 0 0-.89 0l-3.16 1.58a1 1 0 0 1-.8.2A10 10 0 0 1 2 12A10 10 0 0 1 12 2z"/>
                    </svg>
                </div>
                <div>
                    <div class="title">Tourista Assistant</div>
                    <div class="status">Đang online</div>
                </div>
            </div>
            <button onclick="toggleAIChat()" class="close-btn">×</button>
        </div>

        <div id="messages" class="ai-messages">
            <div class="bot-msg">
                <div class="bubble">Xin chào bạn! Mình là trợ lý Tourista đây ạ<br>Bạn muốn đi đâu, mấy ngày, ngân sách bao nhiêu thì cứ nói mình nhé!</div>
            </div>
        </div>

        <div class="ai-input-area">
            <input type="text" id="userInput" placeholder="Nhập tin nhắn..." autocomplete="off">
            <button onclick="sendMessage()">Gửi</button>
        </div>
    </div>
</div>

<style>
    /* ================== CHATBOT NỔI SIÊU ĐẸP 2025 ================== */
    .floating-ai-chat {
        position: fixed;
        right: 18px;
        bottom: 150px;
        z-index: 9999;
        pointer-events: none; /* cho phép click xuyên qua vùng trống */
    }

    .chat-bubble {
        width: 120px;
        height: 120px;
        background: none !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        position: relative;
        overflow: visible;
        cursor: pointer;
        pointer-events: auto;
        transition: transform 0.3s ease;
        
        /* Hiệu ứng bồng bềnh chính */
        animation: gentleFloat 4.8s ease-in-out infinite;
    }

    /* Hover nhẹ nhàng phóng to */
    .chat-bubble:hover {
        transform: scale(1.12) !important;
    }

    /* Ẩn SVG gốc nếu có */
    .chat-bubble svg { display: none; }

    /* Ảnh chatbot PNG */
    .chat-bubble::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: url('{{asset('clients/assets/images/chatbot/chatbot-removebg-preview.png')}}') center/contain no-repeat;
        right: 15px;
        bottom: -5px;
        pointer-events: none;
    }

    /* Bóng đổ “thở” theo chuyển động (tăng chiều sâu cực đẹp) */
    .chat-bubble::before {
        content: "";
        position: absolute;
        width: 80px;
        height: 30px;
        border-radius: 50%;
        bottom: -25px;
        left: 50%;
        transform: translateX(-50%);
        z-index: -1;
        animation: shadowBreath 4.8s ease-in-out infinite;
        opacity: 0.6;
    }

    /* ================== KEYFRAMES ================== */
    @keyframes gentleFloat {
        0%, 100% { transform: translateY(0px); }
        50%      { transform: translateY(-18px); }
    }

    @keyframes shadowBreath {
        0%, 100% { 
            transform: translateX(-50%) translateY(0px) scale(0.9);
            opacity: 0.4;
        }
        50% { 
            transform: translateX(-50%) translateY(8px) scale(1.1);
            opacity: 0.7;
        }
    }

    /* Hiệu ứng pulse nhẹ khi hover (tùy chọn, rất sang) */
    .chat-bubble:hover::before {
        animation: shadowPulse 1.5s ease-in-out infinite;
    }

    @keyframes shadowPulse {
        0%   { opacity: 0.6; transform: translateX(-50%) translateY(8px) scale(1.1); }
        50%  { opacity: 0.9; transform: translateX(-50%) translateY(8px) scale(1.3); }
        100% { opacity: 0.6; transform: translateX(-50%) translateY(8px) scale(1.1); }
    }

    /* ================== KHUNG CHAT ================== */
    .ai-chat-container {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 360px;
        height: 520px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.18);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .ai-chat-container.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .ai-chat-header {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: #fff;
        padding: 16px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width:  width: 44px;
        height: 44px;
        background: rgba(255,255,255,0.25);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(10px);
    }

    .title { font-weight: 600; font-size: 16px; }
    .status { font-size: 12px; opacity: 0.9; margin-top: 2px; }

    .close-btn {
        background: none;
        border: none;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .close-btn:hover { background: rgba(255,255,255,0.2); }

    .ai-messages {
        flex: 1;
        padding: 18px;
        overflow-y: auto;
        background: #f8f9fa;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .bot-msg .bubble {
        background: #fff;
        padding: 12px 18px;
        border-radius: 18px 18px 18px 4px;
        max-width: 85%;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        align-self: flex-start;
        font-size: 14.5px;
        line-height: 1.5;
    }

    .user-msg .bubble {
        background: #007bff;
        color: #fff;
        padding: 12px 18px;
        border-radius: 18px 18px 4px 18px;
        max-width: 85%;
        align-self: flex-end;
        font-size: 14.5px;
        line-height: 1.5;
    }

    .ai-input-area {
        display: flex;
        padding: 14px;
        background: #fff;
        border-top: 1px solid #eee;
        gap: 10px;
    }

    .ai-input-area input {
        flex: 1;
        border: none;
        outline: none;
        padding: 12px 18px;
        font-size: 15px;
        border-radius: 30px;
        background: #f1f3f5;
        transition: background 0.2s;
    }

    .ai-input-area input:focus {
        background: #e8f0fe;
    }

    .ai-input-area button {
        width: 48px;
        height: 48px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: all 0.3s;
    }

    .ai-input-area button:hover {
        background: #0056b3;
        transform: scale(1.1);
    }

    /* Hiệu ứng gõ chữ (nếu cần) */
    .typing .dots::after {
        content: "...";
        animation: dots 1.5s infinite;
    }

    @keyframes dots {
        0%, 20% { opacity: 0.3; }
        50% { opacity: 1; }
        100% { opacity: 0.3; }
    }
</style>

<script>
    // ĐÃ ĐƯỢC LARAVEL RENDER → KHÔNG BAO GIỜ LỖI 404 NỮA
    window.chatbotUrl = "{{ route('chatbot.handle') }}";
    window.csrfToken  = "{{ csrf_token() }}";

    function toggleAIChat() {
        document.getElementById('ai-chat-box').classList.toggle('show');
        if (document.getElementById('ai-chat-box').classList.contains('show')) {
            setTimeout(() => document.getElementById('userInput').focus(), 300);
        }
    }

    async function sendMessage() {
        const input = document.getElementById('userInput');
        const messages = document.getElementById('messages');
        const msg = input.value.trim();
        if (!msg) return;

        messages.insertAdjacentHTML('beforeend', `<div class="user-msg"><div class="bubble">${msg}</div></div>`);
        input.value = '';
        messages.scrollTop = messages.scrollHeight;

        const typing = document.createElement('div');
        typing.className = 'bot-msg typing';
        typing.innerHTML = '<div class="bubble"><span class="dots">•••</span></div>';
        messages.appendChild(typing);
        messages.scrollTop = messages.scrollHeight;

        try {
            const res = await fetch(window.chatbotUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.csrfToken
                },
                body: JSON.stringify({ message: msg })
            });
            const data = await res.json();
            typing.remove();
            const reply = (data.reply || "Mình đang tìm tour cho bạn...").replace(/\n/g, '<br>');
            messages.insertAdjacentHTML('beforeend', `<div class="bot-msg"><div class="bubble">${reply}</div></div>`);
            messages.scrollTop = messages.scrollHeight;
        } catch (err) {
            typing.remove();
            messages.insertAdjacentHTML('beforeend', `<div class="bot-msg"><div class="bubble error">Mình đang bị lag, bạn gửi lại giúp mình nhé!</div></div>`);
        }
    }

    document.getElementById('userInput').addEventListener('keypress', e => {
        if (e.key === 'Enter') sendMessage();
    });

    document.addEventListener('click', e => {
        const chat = document.querySelector('.floating-ai-chat');
        const box = document.getElementById('ai-chat-box');
        if (!chat.contains(e.target) && box.classList.contains('show')) {
            box.classList.remove('show');
        }
    });
</script>

@if (session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
<!-- Jquery -->
<script src="{{ asset('clients/assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('clients/assets/js/bootstrap.min.js') }}"></script>
<!-- Appear Js -->
<script src="{{ asset('clients/assets/js/appear.min.js') }}"></script>
<!-- Slick -->
<script src="{{ asset('clients/assets/js/slick.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('clients/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Nice Select -->
<script src="{{ asset('clients/assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Image Loader -->
<script src="{{ asset('clients/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- Skillbar -->
<script src="{{ asset('clients/assets/js/skill.bars.jquery.min.js') }}"></script>
<!-- Jquery UI -->
<script src="{{ asset('clients/assets/js/jquery-ui.min.js') }}"></script>
<!-- Isotope -->
<script src="{{ asset('clients/assets/js/isotope.pkgd.min.js') }}"></script>
<!--  AOS Animation -->
<script src="{{ asset('clients/assets/js/aos.js') }}"></script>
<!-- Custom script -->
<script src="{{ asset('clients/assets/js/script.js') }}"></script>
{{-- jquery-toast  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="js/jquery.smartWizard.js"></script>

<!-- Custom script by longvu-->
<script src="{{ asset('clients/assets/js/custom-js.js') }}"></script>
<script src="{{ asset('clients/assets/js/jquery.datetimepicker.full.min.js') }}"></script>
{{-- paypal-payment  --}}
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&currency=USD&locale=vi_VN&components=buttons&enable-funding=paylater"></script>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>

<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Thêm Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>








</body>

</html>
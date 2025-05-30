@include('clients.blocks.header')
@include('clients.blocks.banner')

<!-- About Area start -->
<section class="about-area-two py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                <span class="subtitle mb-35">Giới thiệu về công ty</span>
            </div>
            <div class="col-xl-9">
                <div class="about-page-content" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="row">
                        <div class="col-lg-8 pe-lg-5 me-lg-5">
                            <div class="section-title mb-25">
                                <h2>Kinh nghiệm và công ty lữ hành chuyên nghiệp trên thế giới</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="experience-years rmb-20">
                                <span class="title bgc-secondary">Số năm kinh nghiệm</span>
                                <span class="text">Chúng tôi có</span>
                                <span class="years">28+</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p>Chúng tôi chuyên tạo ra những trải nghiệm thành phố khó quên cho du khách muốn khám phá trái tim và tâm hồn của cảnh quan đô thị. Các tour du lịch có hướng dẫn viên chuyên nghiệp của chúng tôi sẽ đưa du khách qua những con phố sôi động, các địa danh lịch sử và những viên ngọc ẩn giấu của mỗi thành phố.</p>
                            <ul class="list-style-two mt-35">
                                <li>Cơ quan kinh nghiệm</li>
                                <li>Đội ngũ chuyên nghiệp</li>
                                <li>Du lịch giá rẻ</li>
                                <li>Hỗ trợ trực tuyến 24/7</li>
                            </ul>
                            <a href="about.html" class="theme-btn style-three mt-30">
                                <span data-hover="Explore Tours">Khám phá các tour du lịch</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Area end -->


<!-- Features Area start -->
<section class="about-features-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 col-md-6">
                <div class="about-feature-image" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <img src="{{asset('clients/assets/images/about/about-feature1.jpg')}}" alt="About">
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="about-feature-image" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <img src="{{asset('clients/assets/images/about/about-feature2.jpg')}}" alt="About">
                </div>
            </div>
            <div class="col-xl-4 col-md-8">
                <div class="about-feature-boxes" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <div class="feature-item style-three bgc-secondary">
                        <div class="icon-title">
                            <div class="icon"><i class="flaticon-award-symbol"></i></div>
                            <h5><a href="destination-details.html">Chúng tôi là công ty đạt giải thưởng</a></h5>
                        </div>
                        <div class="content">
                            <p>Tại Pinnacle Business Solutions cam kết về sự xuất sắc và đổi mới đã đạt được</p>
                        </div>
                    </div>
                    <div class="feature-item style-three bgc-primary">
                        <div class="icon-title">
                            <div class="icon"><i class="flaticon-tourism"></i></div>
                            <h5><a href="destination-details.html">5000+ Điểm đến du lịch phổ biến</a></h5>
                        </div>
                        <div class="content">
                            <p>Đội ngũ chuyên gia của chúng tôi tận tâm phát triển các chiến lược tiên tiến thúc đẩy thành công</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features Area end -->


<!-- About Us Area start -->
<section class="about-us-area pt-70 pb-100 rel z-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mb-25">
                        <h2>Du lịch với sự tự tin Lý do hàng đầu để chọn công ty của chúng tôi</h2>
                    </div>
                    <p>Chúng tôi hợp tác chặt chẽ với khách hàng để hiểu rõ những thách thức và mục tiêu, cung cấp các giải pháp tùy chỉnh nhằm nâng cao hiệu quả, tăng lợi nhuận và thúc đẩy tăng trưởng bền vững.</p>
                    <div class="row pt-25">
                        <div class="col-6">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text k-plus" data-speed="3000" data-stop="3">0</span>
                                <span class="counter-title">Điểm đến phổ biến</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text m-plus" data-speed="3000" data-stop="9">0</span>
                                <span class="counter-title">Khách hàng hài lòng</span>
                            </div>
                        </div>
                    </div>
                    <a href="destination-details.html" class="theme-btn mt-10 style-two">
                        <span data-hover="Explore Destinations">Khám phá Điểm đến</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                <div class="about-us-page">
                    <img src="{{ asset('clients/assets/images/about/about-page.jpg')}}" alt="About">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Area end -->
 
 
<!-- Team Area start -->
<section class="about-team-area pb-70 rel z-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Gặp gỡ những hướng dẫn viên du lịch giàu kinh nghiệm của chúng tôi</h2>
                    <p>Một trang wed <span class="count-text plus bgc-primary" data-speed="3000" data-stop="34500">0</span> trải nghiệm phổ biến nhất mà bạn sẽ nhớ</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="team-item hover-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <img src="{{ asset('clients/assets/images/team/guide1.jpg')}}" alt="Guide">
                    <div class="content">
                        <h6>Long Vũ</h6>
                        <span class="designation">Người đồng sáng lập</span>
                        <div class="social-style-one inner-content">
                            <a href="contact.html"><i class="fab fa-twitter"></i></a>
                            <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                            <a href="contact.html"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Area end -->


<!-- Features Area start -->
<section class="about-feature-two bgc-black pt-100 pb-45 rel z-1">
    <div class="container">
        <div class="section-title text-center text-white counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
            <h2>Làm thế nào để hưởng lợi từ fantatour của chúng tôi</h2>
            <p>Một trang wed <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> trải nghiệm phổ biến nhất mà bạn sẽ nhớ</p>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="feature-item style-two">
                    <div class="icon"><i class="flaticon-save-money"></i></div>
                    <div class="content">
                        <h5><a href="destination-details.html">Đảm bảo giá tốt nhất</a></h5>
                        <p>Cắm trại bằng lều là cách tuyệt vời để kết nối với thiên nhiên</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                <div class="feature-item style-two">
                    <div class="icon"><i class="flaticon-travel-1"></i></div>
                    <div class="content">
                        <h5><a href="destination-details.html">Điểm đến đa dạng</a></h5>
                        <p>Đạp xe leo núi là môn thể thao thú vị giúp rèn luyện thể lực</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                <div class="feature-item style-two">
                    <div class="icon"><i class="flaticon-booking"></i></div>
                    <div class="content">
                        <h5><a href="destination-details.html">Đặt chỗ nhanh</a></h5>
                        <p>Chèo thuyền là một hoạt động ngoài trời thú vị mang tính phiêu lưu</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                <div class="feature-item style-two">
                    <div class="icon"><i class="flaticon-guidepost"></i></div>
                    <div class="content">
                        <h5><a href="destination-details.html">Hướng dẫn du lịch tốt nhất</a></h5>
                        <p>Hoạt động câu cá và chèo thuyền mang lại</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape">
        <img src="{{ asset('clients/assets/images/video/shape1.png')}}" alt="shape">
    </div>
</section>
<!-- Features Area end -->


<!-- Video Area start -->
<div class="video-area pt-25 rel z-1">
    <div class="container">
        <div class="video-wrap" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
            <img src="{{ asset('clients/assets/images/video/video-bg.jpg')}}" alt="Video">
            <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play" tabindex="-1"><i class="fas fa-play"></i></a>
        </div>
    </div>
    <div class="for-bg bgc-black">
        <div class="shape">
            <img src="{{ asset('clients/assets/images/video/shape2.png')}}" alt="shape">
        </div>
    </div>
</div>
<!-- Video Area end -->



<!-- Client Logo Area start -->
<div class="client-logo-area mb-100">
    <div class="container">
        <div class="client-logo-wrap pt-60 pb-55">
            <div class="text-center mb-40" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                <h6>Chúng tôi được giới thiệu bởi:</h6>
            </div>
            <div class="client-logo-active">
                <div class="client-logo-item" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                    <a href="#"><img src="{{asset('clients/assets/images/client-logos/client-logo1.png')}}" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                    <a href="#"><img src="{{asset('clients/assets/images/client-logos/client-logo2.png')}}" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item" data-aos="flip-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                    <a href="#"><img src="{{asset('clients/assets/images/client-logos/client-logo3.png')}}" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item" data-aos="flip-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                    <a href="#"><img src="{{asset('clients/assets/images/client-logos/client-logo4.png')}}" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item" data-aos="flip-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                    <a href="#"><img src="{{asset('clients/assets/images/client-logos/client-logo5.png')}}" alt="Client Logo"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Client Logo Area end -->

@include('clients.blocks.footer')
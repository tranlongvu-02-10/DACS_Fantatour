@include('clients.blocks.header')
@include('clients.blocks.banner_home')


        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
     
        <!-- Destinations Area start -->
        <section class="destinations-area bgc-black pt-100 pb-70 rel z-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-white text-center counter-text-wrap mb-70" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Trải nghiệm và khám phá du lịch cùng fantatour</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($tours as $tour)
                    <div class="col-xxl-3 col-xl-4 col-md-6 ">
                        <div class="destination-item block_tour" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <div class="ratting"><i class="fas fa-star"></i> {{ number_format($tour->rating, 1) }}</div>
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                @if(!empty($tour->imagess) && count($tour->imagess) > 0)
                                    <img src="{{ asset('clients/assets/images/gallery-tours/' . $tour->imagess[0]) }}" alt="Destination">
                                @else
                                    <img src="{{ asset('clients/assets/images/default-image.jpg') }}" alt="Default Image">
                                @endif

                            </div>
                            <div class="content">
                                <span class="location"><i class="fal fa-map-marker-alt"></i>{{ $tour->destination }}</span>
                                <h5><a href="{{ route('tours-detail', ['id' => $tour->tourId]) }}">{{ $tour->title }}</a></h5>
                                <span class="time">{{ $tour->time }}</span>
                            </div>
                            <div class="destination-footer">
                                <span class="price"><span>{{ number_format($tour->priceAdult, 0, ',', '.') }}</span> VND / người</span>
                                <a href="{{ route('tours-detail', ['id' => $tour->tourId]) }}" class="read-more">Đặt ngay <i class="fal fa-angle-right"></i></a>
                            </div>                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Destinations Area end -->
         
         
        <!-- About Us Area start -->
<section class="about-us-area py-100 rpb-90 rel z-1">
<div class="container">
    <div class="row align-items-center">
        <div class="col-xl-5 col-lg-6">
            <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                <div class="section-title mb-25">
                    <h2>Du lịch với sự tự tin Lý do hàng đầu để chọn fantatour của chúng tôi</h2>
                </div>
                <p>Chúng tôi sẽ nỗ lực hết mình để biến giấc mơ du lịch của bạn thành hiện thực, những viên ngọc ẩn và những điểm tham quan không thể bỏ qua</p>
                <div class="divider counter-text-wrap mt-45 mb-55"><span>Chúng tôi có <span><span class="count-text plus" data-speed="3000" data-stop="25">0</span> Năm</span> của kinh nghiệm</span></div>
                <div class="row">
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
                <a href="{{ route('destination') }}" class="theme-btn mt-10 style-two">
                    <span data-hover="Khám phá Điểm đến">Khám phá Điểm đến</span>
                    <i class="fal fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
        <img src="{{asset('clients/assets/images/features/anh.webp')}}" alt="features" style="width:100%; height:auto;">
        </div>
    </div>
</div>
</section>
<!-- About Us Area end -->

<!-- Features Area start -->
<section class="features-area pt-100 pb-45 rel z-1 features-bg">
<div class="container">
    <div class="row align-items-center">
        <div class="col-xl-6">
            <div class="features-content-part mb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                <div class="section-title mb-60">
                    <h2>"Khám Phá Những Hành Trình Tuyệt Vời – Nơi Mỗi Chuyến Đi Là Một Ký Ức Đáng Nhớ Cùng Fantatour"</h2>
                </div>
                <div class="features-customer-box">
                    <div class="image">
                        <img src="{{asset('clients/assets/images/features/features-box.jpg')}}" alt="Features">
                    </div>
                    <div class="content">
                        <div class="feature-authors mb-15">
                            <img src="{{asset('clients/assets/images/features/27b7e2a7ec8d59d3009c (2).jpg')}}" alt="Author">
                            <span>4k+</span>
                        </div>
                        <h6>Khách hàng hài lòng</h6>
                        <div><span></div>
                        <p>Chúng tôi tự hào cung cấp các hành trình được cá nhân hóa</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
            <div class="row pb-25">
                <div class="col-md-6 d-flex flex-column justify-content-between h-100">
                    <div class="feature-item h-100">
                        <div class="icon"><i class="flaticon-tent"></i></div>
                        <div class="content">
                            <h5><a href="tour-details.html">Cắm trại</a></h5>
                            <p>Cắm trại là cách tuyệt vời để kết nối với thiên nhiên</p>
                        </div>
                    </div>
                    <div class="feature-item h-100">
                        <div class="icon"><i class="flaticon-tent"></i></div>
                        <div class="content">
                            <h5><a href="tour-details.html">Chèo thuyền</a></h5>
                            <p>Chèo thuyền là hoạt động ngoài trời thú vị mang tính phiêu lưu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-between h-100">
                    <div class="feature-item h-100">
                        <div class="icon"><i class="flaticon-tent"></i></div>
                        <div class="content">
                            <h5><a href="tour-details.html">Xe đạp leo núi</a></h5>
                            <p>Đạp xe leo núi là môn thể thao thú vị giúp rèn luyện thể lực</p>
                        </div>
                    </div>
                    <div class="feature-item h-100">
                        <div class="icon"><i class="flaticon-tent"></i></div>
                        <div class="content">
                            <h5><a href="tour-details.html">Câu cá & Thuyền</a></h5>
                            <p>Câu cá và chèo thuyền mang lại niềm vui là hoạt động cốt lõi</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
<!-- Features Area end -->
<!-- Popular Destinations Area start -->
    <section class="popular-destinations-area rel z-1">
    <div class="container-fluid">
    <div class="popular-destinations-wrap br-20 bgc-lighter pt-100 pb-70">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up"
                data-aos-duration="1500" data-aos-offset="50">
                <h2>Khám phá các điểm đến phổ biến</h2>
                <p>Website trải
                    nghiệm phổ biến nhất</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @php $count = 0; @endphp
            @foreach ($toursPopular as $tour)
                @if ($count == 2 || $count == 3)
                    <!-- Cột thứ 3 và thứ 4 sẽ là col-md-6 -->
                    <div class="col-md-6 item ">
                    @else
                        <!-- Các cột còn lại sẽ là col-xl-3 col-md-6 -->
                        <div class="col-xl-3 col-md-6 item ">
                @endif

                <div class="destination-item style-two" data-aos-duration="1500" data-aos-offset="50">
                    <div class="image" style="max-height: 250px">
                        <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                        @if(!empty($tour->images) && count($tour->images) > 0)
                            <img src="{{ asset('clients/assets/images/gallery-tours/' . $tour->images[0]) }}" alt="Destination">
                        @else
                            <img src="{{ asset('clients/assets/images/default-image.jpg') }}" alt="Default">
                        @endif
                    </div>
                    <div class="content">
                        <h6 class="tour-title"><a
                                href="{{ route('tours-detail', ['id' => $tour->tourId]) }}">{{ $tour->title }}</a>
                        </h6>
                        <span class="time">{{ $tour->time }}</span>
                        <a href="{{ route('tours-detail', ['id' => $tour->tourId]) }}" class="more"><i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

        </div> <!-- Đóng div col-md-6 hoặc col-xl-3 col-md-6 -->

        @php $count++; @endphp
        @endforeach
    </div>
    </div>
    </div>
    </div>
    </section>
<!-- Popular Destinations Area end -->
         
         
        <!-- CTA Area start -->
<section class="cta-area pt-100 rel z-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-duration="1500" data-aos-offset="50">
                <div class="cta-item"
                    style="background-image: url( {{ asset('clients/assets/images/cta/cta1.jpg') }});">
                    <span class="category">Khám Phá Vẻ Đẹp Văn Hóa Việt</span>
                    <h2>Tìm hiểu những giá trị văn hóa độc đáo của các vùng miền Việt Nam.</h2>
                    <a href="{{ route('tours') }}" class="theme-btn style-two bgc-secondary">
                        <span data-hover="Khám phá">Khám phá</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="50" data-aos-duration="1500"
                data-aos-offset="50">
                <div class="cta-item"
                    style="background-image: url( {{ asset('clients/assets/images/cta/cta2.jpg') }});">
                    <span class="category">Bãi biển Sea</span>
                    <h2>Bãi trong xanh dạt dào ở Việt Nam</h2>
                    <a href="{{ route('tours') }}" class="theme-btn style-two">
                        <span data-hover="Khám phá">Khám phá</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="100" data-aos-duration="1500"
                data-aos-offset="50">
                <div class="cta-item"
                    style="background-image: url( {{ asset('clients/assets/images/cta/cta3.jpg') }});">
                    <span class="category">Thác nước</span>
                    <h2>Thác nước lớn nhất Việt Nam</h2>
                    <a href="{{ route('tours') }}" class="theme-btn style-two bgc-secondary">
                        <span data-hover="Khám phá">Khám phá</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA Area end -->

<!-- Popup quảng bá tour -->
<div id="tourPopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <button id="closePopup" class="popup-close">×</button>

        <!-- Hình ảnh poster -->
        <img src="{{ asset('clients/assets/images/poster/banner-poster-tour1.png') }}" alt="Poster Tour" style="width: 100%; height: auto; display: block;">

        <!-- Phần nội dung thêm -->
        <div style="padding: 16px;">
            <h3 style="margin-top: 0;">🔥 TOUR DU LỊCH TRONG TẦM TAY, BOOK NGAY!</h3>
            <p>Độc quyền đặt tour online để săn ngay chùm tour <strong>VIỆT NAM</strong> siêu hot với ưu đãi <strong>GIẢM ĐẾN 1.000.000₫ 🎁</strong>, số lượng có hạn!</p>

            <!-- Nút dẫn đến trang đặt tour -->
            <div style="text-align: right; margin-top: 10px;">
                <a href="{{ route('tours') }}" class="btn btn-primary" style="
                    background-color: #0056b3;
                    color: white;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 6px;
                    display: inline-block;
                ">
                    Xem chi tiết
                </a>
            </div>
        </div>
    </div>
</div>


@include('clients.blocks.footer_home')
           
       
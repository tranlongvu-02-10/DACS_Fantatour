@include('clients.blocks.header')
@include('clients.blocks.banner')

<!-- Tour List Area start -->
<section class="tour-list-page py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Danh sách tour đã đặt của bạn -->
            <div class="col-lg-10">

                <!-- Tiêu đề -->
                <div class="col-12 mb-5 text-center">
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="mb-3 fw-bold text-primary">Khám phá các Tour của bạn</h2>
                        <p class="text-muted fs-6">Danh sách tour bạn đã đặt – xem lại hành trình, đánh giá và những kỷ niệm đáng nhớ.</p>
                    </div>
                </div>

                {{-- DANH SÁCH TOUR ĐÃ ĐẶT --}}
                @forelse ($myTours as $tour)
                    <div class="destination-item style-three bgc-lighter mb-4 rounded shadow-sm overflow-hidden"
                        data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image position-relative">
                            @if ($tour->bookingStatus == 'b')
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Đợi xác nhận</span>
                            @elseif ($tour->bookingStatus == 'y')
                                <span class="badge bg-pink text-white position-absolute top-0 start-0 m-2">Sắp khởi hành</span>
                            @elseif ($tour->bookingStatus == 'f')
                                <span class="badge bg-primary position-absolute top-0 start-0 m-2">Hoàn thành</span>
                            @elseif ($tour->bookingStatus == 'c')
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">Đã hủy</span>
                            @endif

                            <img class="w-100"
                                src="{{ asset('clients/assets/images/gallery-tours/' . $tour->images[0]) }}"
                                alt="Tour đã đặt">
                        </div>

                        <div class="content p-4">
                            <div class="destination-header d-flex justify-content-between align-items-center mb-2">
                                <span class="location text-muted"><i class="fal fa-map-marker-alt"></i> {{ $tour->destination }}</span>
                                <div class="ratting text-warning">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($tour->rating && $i < $tour->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>

                            <h5 class="fw-semibold">
                                <a href="{{ route('tour-booked', ['bookingId' => $tour->bookingId, 'checkoutId' => $tour->checkoutId]) }}"
                                    class="text-dark">
                                    {{ $tour->title }}
                                </a>
                            </h5>

                            <div class="truncate-3-lines mt-2 mb-3 text-secondary small">
                                {!! $tour->description !!}
                            </div>

                            <ul class="blog-meta list-inline text-muted small mb-3">
                                <li class="list-inline-item me-3"><i class="far fa-clock me-1"></i>{{ $tour->time }}</li>
                                <li class="list-inline-item"><i class="far fa-user me-1"></i>{{ $tour->numAdults + $tour->numChildren }} người</li>
                            </ul>

                            <div class="destination-footer d-flex justify-content-between align-items-center mt-3">
                                <span class="price fw-bold text-primary fs-6">
                                    {{ number_format($tour->totalPrice, 0) }} vnđ
                                </span>

                                @if ($tour->bookingStatus == 'f')
                                    <a href="{{ route('tours-detail', ['id' => $tour->tourId]) }}"
                                        class="theme-btn style-two style-three">
                                        @if ($tour->rating)
                                            <span data-hover="Đã đánh giá">Đã đánh giá</span>
                                        @else
                                            <span data-hover="Đánh giá">Đánh giá</span>
                                        @endif
                                        <i class="fal fa-arrow-right ms-1"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center mt-5">
                        Bạn chưa đặt tour nào.
                    </div>
                @endforelse

                {{-- PHẦN GỢI Ý TOUR – ĐÃ HOÀN CHỈNH, SIÊU ĐẸP --}}
                @if($toursPopular && $toursPopular->count() > 0)
                    <div class="mt-5">
                        <div class="section-title text-center mb-4" data-aos="fade-up">
                            <h3 class="text-primary">
                                <i class="fas fa-heart text-danger"></i>
                                Gợi ý dành riêng cho bạn
                            </h3>
                            <p class="text-muted">Dựa trên lịch sử đặt tour và sở thích của bạn</p>
                        </div>

                        <div class="row g-4">
                            @foreach($toursPopular as $tour)
                                <div class="col-md-6 col-lg-4">
                                    <div class="destination-item tour-grid style-three bgc-lighter h-100 shadow-sm hover-shadow position-relative"
                                         data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                        <span class="badge bg-danger text-white position-absolute top-0 start-0 m-2 px-3 py-1 rounded-pill"
                                              style="font-size: 11px; z-index: 2;">
                                            <i class="fas fa-magic"></i> Cá nhân hóa
                                        </span>

                                        <div class="image">
                                            <img src="{{ asset('clients/assets/images/gallery-tours/' . ($tour->images[0] ?? 'default.jpg')) }}"
                                                 alt="{{ $tour->title }}"
                                                 class="w-100"
                                                 style="height: 200px; object-fit: cover;"
                                                 onerror="this.src='{{ asset('clients/assets/images/default-tour.jpg') }}'">
                                        </div>

                                        <div class="content p-3">
                                            <div class="destination-header mb-2">
                                                <span class="location text-muted small">
                                                    <i class="fal fa-map-marker-alt"></i> {{ $tour->destination }}
                                                </span>
                                                <div class="ratting text-warning small">
                                                    <i class="fas fa-star"></i>
                                                    <span>({{ number_format($tour->rating ?? 4.5, 1) }})</span>
                                                </div>
                                            </div>

                                            <h6 class="mb-2">
                                                <a href="{{ route('tours-detail', ['id' => $tour->tourId]) }}"
                                                   class="text-dark text-decoration-none">
                                                    {{ Str::limit($tour->title, 50) }}
                                                </a>
                                            </h6>

                                            <div class="d-flex justify-content-between align-items-end">
                                                <strong class="text-primary fs-5">
                                                    {{ number_format($tour->priceAdult) }}đ
                                                </strong>
                                                <a href="{{ route('tours-detail', ['id' => $tour->tourId]) }}"
                                                   class="btn btn-sm btn-primary rounded-pill px-3">
                                                    Xem chi tiết
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('tours') }}" class="theme-btn style-two">
                                Xem tất cả tour
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Quote truyền cảm hứng -->
                <div class="col-12 mt-5 text-center">
                    <blockquote class="p-4 bg-light border rounded fs-5 fw-light fst-italic text-dark">
                        "Du lịch là cách duy nhất khiến bạn giàu có hơn về trải nghiệm mà không mất đi thứ gì."
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tour List Area end -->

@include('clients.blocks.footer_home')

<!-- Style đẹp hơn cho phần gợi ý -->
<style>
    .truncate-3-lines {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 72px;
    }

    .destination-item:hover {
        transform: translateY(-8px);
        transition: all 0.3s ease;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }

    .bg-pink { background-color: #ff6b81 !important; }

    .theme-btn.style-two.style-three {
        background-color: #007bff;
        color: #fff;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 14px;
        transition: 0.3s;
    }

    .theme-btn.style-two.style-three:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .hover-shadow {
        transition: all 0.3s ease;
    }
</style>
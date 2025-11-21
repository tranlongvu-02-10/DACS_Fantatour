@include('clients.blocks.header')
@include('clients.blocks.banner')

<!-- Tour List Area start -->
<section class="tour-list-page py-100 rel z-1">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Danh sách tour -->
            <div class="col-lg-10">

                <!-- Giới thiệu đầu trang -->
                <div class="col-12 mb-5 text-center">
                    <div class="section-title" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="mb-3 fw-bold text-primary">Khám phá các Tour của bạn</h2>
                        <p class="text-muted fs-6">Danh sách tour bạn đã đặt – xem lại hành trình, đánh giá và những kỷ
                            niệm đáng nhớ.</p>
                    </div>
                </div>

                @forelse ($myTours as $tour)
                    <div class="destination-item style-three bgc-lighter mb-4 rounded shadow-sm overflow-hidden"
                        data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image position-relative">
                            @if ($tour->bookingStatus == 'b')
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Đợi xác
                                    nhận</span>
                            @elseif ($tour->bookingStatus == 'y')
                                <span class="badge bg-pink text-white position-absolute top-0 start-0 m-2">Sắp khởi
                                    hành</span>
                            @elseif ($tour->bookingStatus == 'f')
                                <span class="badge bg-primary position-absolute top-0 start-0 m-2">Hoàn thành</span>
                            @elseif ($tour->bookingStatus == 'c')
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">Đã hủy</span>
                            @endif

                            <img class="w-100"
                                src="{{ asset('clients/assets/images/gallery-tours/' . $tour->images[0]) }}"
                                alt="Tour List">
                        </div>

                        <div class="content p-4">
                            <div class="destination-header d-flex justify-content-between align-items-center mb-2">
                                <span class="location text-muted"><i class="fal fa-map-marker-alt"></i>
                                    {{ $tour->destination }}</span>
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
                                <li class="list-inline-item me-3"><i class="far fa-clock me-1"></i>{{ $tour->time }}
                                </li>
                                <li class="list-inline-item"><i
                                        class="far fa-user me-1"></i>{{ $tour->numAdults + $tour->numChildren }} người
                                </li>
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

                <!-- Quote truyền cảm hứng -->
                <div class="col-12 mt-5 text-center">
                    <blockquote class="p-4 bg-light border rounded fs-5 fw-light fst-italic text-dark">
                        "Du lịch là cách duy nhất khiến bạn giàu có hơn về trải nghiệm mà không mất đi thứ gì." 🌏✈️
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tour List Area end -->

@include('clients.blocks.footer')

<!-- Style thêm -->
<style>
    .truncate-3-lines {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 72px;
    }

    .destination-item {
        border-radius: 12px;
        background-color: #fff;
        transition: all 0.3s ease;
    }

    .destination-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    }

    .bg-pink {
        background-color: #ff6b81 !important;
    }

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
</style>

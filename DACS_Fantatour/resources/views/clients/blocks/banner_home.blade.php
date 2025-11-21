<!-- Hero Area Start -->
<section class="hero-area pt-200 rpt-120 rel z-2" style="position: relative; overflow: visible;">
    <!-- Nền Matrix Grid -->
    <div class="matrix-container">
        <div class="matrix-grid"></div>
    </div>
    
    <div class="container-fluid" style="position: relative; z-index: 10;">
        <h1 class="hero-title" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">KHÁM PHÁ & TRẢI NGHIỆM</h1>
        <!-- Hiệu ứng chữ động "Tìm kỳ nghỉ lý tưởng" -->
        <div class="loader-wrapper">
            <div class="loader"></div>
            <span class="loader-letter">T</span>
            <span class="loader-letter">ì</span>
            <span class="loader-letter">m</span>
            <span class="loader-letter">&nbsp;</span>
            <span class="loader-letter">k</span>
            <span class="loader-letter">ỳ</span>
            <span class="loader-letter">&nbsp;</span>
            <span class="loader-letter">n</span>
            <span class="loader-letter">g</span>
            <span class="loader-letter">h</span>
            <span class="loader-letter">ỉ</span>
            <span class="loader-letter">&nbsp;</span>
            <span class="loader-letter">l</span>
            <span class="loader-letter">ý</span>
            <span class="loader-letter">&nbsp;</span>
            <span class="loader-letter">t</span>
            <span class="loader-letter">ư</span>
            <span class="loader-letter">ở</span>
            <span class="loader-letter">n</span>
            <span class="loader-letter">g</span>
        </div>
        <div class="main-hero-image bgs-cover" style="background-image: url({{asset('clients/assets/images/hero/hero.jpg')}});"></div>
    </div>

    <form action="{{ route('search') }}" method="GET" id="search_form" style="position: relative; z-index: 10;">
        <div class="container container-1400">
            <div class="search-filter-inner" data-aos="zoom-out-down" data-aos-duration="1500" data-aos-offset="50">
                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                    <span class="title">Điểm đến</span>
                    <select name="destination" id="destination">
                        <option value="">Chọn điểm đến</option>
                        <option value="dn">Đà Nẵng</option>
                        <option value="qnn">Quảng Nam</option>
                        <option value="cd">Côn Đảo</option>
                        <option value="hn">Hà Nội</option>
                        <option value="hcm">TP. Hồ Chí Minh</option>
                        <option value="hl">Hạ Long</option>
                        <option value="nb">Ninh Bình</option>
                        <option value="pq">Phú Quốc</option>
                        <option value="ld">Lâm Đồng</option>
                        <option value="qt">Quảng Trị</option>
                        <option value="kh">Khánh Hòa (Nha Trang)</option>
                        <option value="ct">Cần Thơ</option>
                        <option value="vt">Vũng Tàu</option>
                        <option value="qn">Quảng Ninh</option>
                        <option value="sp">SAPA</option>
                        <option value="bd">Bình Định (Quy Nhơn)</option>
                    </select>
                    
                </div>
                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                    <span class="title">Ngày khởi hành</span>
                    <input type="text" id="start_date" name="start_date" class="datetimepicker datetimepicker-custom"
                        placeholder="Chọn ngày đi" readonly>
                </div>
                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                    <span class="title">Ngày kết thúc</span>
                    <input type="text" id="end_date" name="end_date" class="datetimepicker datetimepicker-custom"
                        placeholder="Chọn ngày về" readonly>
                </div>
                <div class="search-button">
                    <button class="theme-btn" type="submit">
                        <span data-hover="Tìm kiếm">Tìm kiếm</span>
                        <i class="far fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <style>
        /* CSS cho Matrix Grid */
        .matrix-container {
            width: 100%;
            height: 100%;
            perspective: 1500px;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #0d0d1a;
            overflow: hidden;
            z-index: 0;
        }

        .matrix-grid {
            width: 100%;
            height: 100%;
            background: linear-gradient(#262645 1px, transparent 1px),
                linear-gradient(90deg, #262645 1px, transparent 1px),
                repeating-linear-gradient(
                    45deg,
                    rgba(0, 255, 170, 0.05) 0px 1px,
                    transparent 1px 12px
                ),
                repeating-linear-gradient(
                    -45deg,
                    rgba(0, 255, 170, 0.05) 0px 1px,
                    transparent 1px 12px
                ),
                radial-gradient(circle at center, #0a0a1a 0%, #000 100%);
            background-size:
                28px 28px,
                28px 28px,
                50px 50px,
                50px 50px,
                cover;
            border: 1px solid rgba(0, 255, 170, 0.1);
            box-shadow:
                inset 0 0 40px rgba(0, 255, 170, 0.1),
                0 0 60px rgba(0, 255, 170, 0.15);
            transform-style: preserve-3d;
            transition: all 0.6s ease-in-out;
            position: relative;
        }

        .matrix-grid::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(0, 255, 170, 0.4),
                transparent
            );
            animation: borderFlow 6s linear infinite;
            pointer-events: none;
            mask:
                linear-gradient(#fff 0 0) padding-box,
                linear-gradient(#fff 0 0);
            mask-composite: exclude;
        }

        .matrix-grid::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 160px;
            height: 160px;
            background: radial-gradient(
                circle,
                rgba(0, 255, 170, 0.15) 0%,
                transparent 70%
            );
            transform: translate(-50%, -50%);
            animation: pulse 3.5s ease-in-out infinite alternate;
            z-index: 1;
        }

        @keyframes borderFlow {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 200% 50%;
            }
        }

        @keyframes pulse {
            0% {
                transform: translate(-50%, -50%) scale(0.85);
                opacity: 0.2;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.1);
                opacity: 0.5;
            }
        }

        /* Đảm bảo nội dung hiển thị rõ trên nền */
        .hero-title {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
        }
        
        .hero-subtitle {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
        }
    </style>
</section>
<!-- Hero Area End -->
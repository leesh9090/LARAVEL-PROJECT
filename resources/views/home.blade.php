@extends('layouts.app')

@section('title', 'Home')

@section('header')
    <div class="header-container">
        <div class="logo">
            <a href="/" class="logo-text">LARAVEL PROJECT</a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="/login">LOGIN</a></li>
                <li><a href="/mypage">MYPAGE</a></li>
                <li><a href="/cart">CART</a></li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentSlide = 0;
            const slides = document.querySelectorAll(".slide");
            const totalSlides = slides.length;
            let slideInterval;
            let isPlaying = true;

            function goToSlide(slideIndex) {
                currentSlide = (slideIndex + totalSlides) % totalSlides;
                document.querySelector(".slides").style.transform = `translateX(-${currentSlide * 100}%)`;
            }

            function nextSlide() {
                goToSlide(currentSlide + 1);
            }

            function prevSlide() {
                goToSlide(currentSlide - 1);
            }

            function startSlideShow() {
                slideInterval = setInterval(nextSlide, 3000);
                isPlaying = true;
            }

            function stopSlideShow() {
                clearInterval(slideInterval);
                isPlaying = false;
            }

            function toggleSlideShow() {
                if (isPlaying) {
                    stopSlideShow();
                } else {
                    startSlideShow();
                }
            }

            startSlideShow();

            document.getElementById("play-pause").addEventListener("click", toggleSlideShow);
            document.getElementById("prev-slide").addEventListener("click", prevSlide);
            document.getElementById("next-slide").addEventListener("click", nextSlide);

            // Pagination logic for THE LATEST UPDATE
            function showLatestUpdatePage(page) {
                const latestUpdateSections = document.querySelectorAll('.latest-update .product-gallery');
                latestUpdateSections.forEach((section, index) => {
                    section.classList.toggle('hidden', index !== (page - 1));
                });
            }
            document.querySelectorAll('.latest-update .pagination button').forEach((button, index) => {
                button.addEventListener('click', () => showLatestUpdatePage(index + 1));
            });
            showLatestUpdatePage(1);

            // Pagination logic for BEST OF THE WEEK
            function showBestOfWeekPage(page) {
                const bestOfWeekSections = document.querySelectorAll('.best-of-week .product-grid');
                bestOfWeekSections.forEach((section, index) => {
                    section.classList.toggle('hidden', index !== (page - 1));
                });
            }
            document.querySelectorAll('.best-of-week .pagination button').forEach((button, index) => {
                button.addEventListener('click', () => showBestOfWeekPage(index + 1));
            });
            showBestOfWeekPage(1);

            // Pagination logic for ACCESSORIES YOU'LL LOVE
            function showAccessoriesPage(page) {
                const accessorySections = document.querySelectorAll('.accessories .accessory-grid');
                accessorySections.forEach((section, index) => {
                    section.classList.toggle('hidden', index !== (page - 1));
                });
            }
            document.querySelectorAll('.accessories .pagination button').forEach((button, index) => {
                button.addEventListener('click', () => showAccessoriesPage(index + 1));
            });
            showAccessoriesPage(1);
        });
    </script>

    <aside class="side-menu">
        <nav>
            <ul>
                <li><a href="#">About us</a></li>
                <li><a href="#">BEST 100</a></li>
                <li><a href="#">All-in-one</a></li>
                <li><a href="#">Outer</a></li>
                <li><a href="#">Top(short sleeve)</a></li>
                <li><a href="#">Top(long sleeve)</a></li>
                <li><a href="#">Bottoms</a></li>
                <li><a href="#">Bottoms(Shorts)</a></li>
                <li><a href="#">Bags</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Women only</a></li>
                <li><a href="#">YouTube</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Notice</a></li>
                <li><a href="#">Review</a></li>
                <li><a href="#">Q&A</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </nav>
        <div class="counseling">
            <p>Counseling Center</p>
            <p>02 436 1009</p>
            <p>13:00 - 17:00</p>
            <p>sat.sun.holiday off</p>
        </div>
    </aside>

    <div class="main-content">
        <section class="banner-slider">
            <div class="slides">
                @for($i = 1; $i <= 12; $i++)
                    <div class="slide">
                        <div class="image-container">
                            @if(isset(${'imagePath' . $i}) && ${'imagePath' . $i})
                                <img src="{{ asset('images/banner' . $i . '.jpg') }}" alt="Slide {{ $i }}">
                            @else
                                <p>Image Not Available</p>
                            @endif
                        </div>
                        <h2>Slide Title {{ $i }}</h2>
                        <p>Slide Subtitle {{ $i }}</p>
                    </div>
                @endfor
            </div>

            <div class="slider-controls">
                <button id="play-pause">Pause</button>
            </div>
            <div class="arrow arrow-left" id="prev-slide">&#10094;</div>
            <div class="arrow arrow-right" id="next-slide">&#10095;</div>
        </section>

        <section class="latest-update">
            <h2>THE LATEST UPDATE</h2>
            <p>UNISEX CLOTHES</p>
            @for($page = 1; $page <= 4; $page++)
                <div class="product-gallery {{ $page > 1 ? 'hidden' : '' }}">
                    @for($i = 1; $i <= 3; $i++)
                        <div class="product-item">
                            <div class="image-container">
                                @if(isset(${'imagePathProduct' . (($page - 1) * 3 + $i)}) && ${'imagePathProduct' . (($page - 1) * 3 + $i)})
                                    <img src="{{ asset('images/product' . (($page - 1) * 3 + $i) . '.jpg') }}" alt="Product {{ (($page - 1) * 3 + $i) }}">
                                @else
                                    <p>Image Not Available</p>
                                @endif
                            </div>
                            <p>Product {{ (($page - 1) * 3 + $i) }} Name</p>
                            <p>Price {{ (($page - 1) * 3 + $i) * 1000 }} KRW</p>
                        </div>
                    @endfor
                </div>
            @endfor
            <div class="pagination">
                @for($page = 1; $page <= 4; $page++)
                    <button>{{ $page }}</button>
                @endfor
            </div>
        </section>

        <section class="best-of-week">
            <h2>BEST OF THE WEEK</h2>
            @for($page = 1; $page <= 2; $page++)
                <div class="product-grid {{ $page > 1 ? 'hidden' : '' }}">
                    @for($i = 1; $i <= 8; $i++)
                        <div class="product-item">
                            <div class="image-container">
                                @if(isset(${'imagePathProduct' . (($page - 1) * 8 + $i)}) && ${'imagePathProduct' . (($page - 1) * 8 + $i)})
                                    <img src="{{ asset('images/product' . (($page - 1) * 8 + $i) . '.jpg') }}" alt="Product {{ (($page - 1) * 8 + $i) }}">
                                @else
                                    <p>Image Not Available</p>
                                @endif
                            </div>
                            <p>Product {{ (($page - 1) * 8 + $i) }} Name</p>
                            <p>Price {{ (($page - 1) * 8 + $i) * 1000 }} KRW</p>
                        </div>
                    @endfor
                </div>
            @endfor
            <div class="pagination">
                @for($page = 1; $page <= 2; $page++)
                    <button>{{ $page }}</button>
                @endfor
            </div>
        </section>

        <section class="accessories">
            <h2>ACCESSORIES YOU'LL LOVE</h2>
            @for($page = 1; $page <= 3; $page++)
                <div class="accessory-grid {{ $page > 1 ? 'hidden' : '' }}">
                    @for($i = 1; $i <= 4; $i++)
                        <div class="accessory-item">
                            <div class="image-container">
                                @if(isset(${'imagePathAccessory' . (($page - 1) * 4 + $i)}) && ${'imagePathAccessory' . (($page - 1) * 4 + $i)})
                                    <img src="{{ asset('images/accessory' . (($page - 1) * 4 + $i) . '.jpg') }}" alt="Accessory {{ (($page - 1) * 4 + $i) }}">
                                @else
                                    <p>Image Not Available</p>
                                @endif
                            </div>
                            <p>Accessory {{ (($page - 1) * 4 + $i) }} Name</p>
                            <p>Price {{ (($page - 1) * 4 + $i) * 1000 }} KRW</p>
                        </div>
                    @endfor
                </div>
            @endfor
            <div class="pagination">
                @for($page = 1; $page <= 3; $page++)
                    <button>{{ $page }}</button>
                @endfor
            </div>
        </section>

        <footer class="footer">
            <p>FADE ROOM | CEO Kim Han Kyung | Personal Info Manager Kim Han Kyung | Account No. KB 450901-01-456435 | Email info@faderoom.co.kr</p>
            <p>201, 240, Bongujae-ro, Jungnang-gu, Seoul | Reg. No. 174-05-01533 | Ecommerce Reg. No. 2020-SeoulJungnang-0207</p>
            <p><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></p>
            <p>&copy; 2020 FADE ROOM</p>
        </footer>
    </div>
@endsection

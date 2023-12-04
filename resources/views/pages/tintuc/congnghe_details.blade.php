@extends('layout')
@section('content')

<style>
    .sub-banner{
        display: none;
    }
    .bartop{
        display: none;
    }

    .content{
    background-color: #ffffff;
    margin: 0 0;
    
}
</style>
<div class="container-fluid py-3 align-items-center tech_news" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h2>Phổ biến</h2>
                                
                                <a class="text-secondary font-weight-medium text-decoration-none" href="" style="font-size: 16px;">Xem tất cả</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/news_apple_watch.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h4" href="">Apple Watch không còn 'kẽ hở về giá', chỉ từ 6.09 triệu sẽ có ngay 1 mẫu xịn sò</a>
                                    <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/2.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-03</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/1.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-04</span>
                                    </div>
                                    <a class="h4" href="">24h công nghệ có gì HOT 7/5: Cận cảnh iPhone 15 Ultra, OPPO Reno7 5G được cập nhật giao diện ColorOS 13.1</a>
                                    <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/news-100x100-3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-06</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/news-100x100-4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-06</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="./public/frontend/assets/images/ads-700x70.jpg" alt=""></a>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h2>Mới nhất</h2>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="" style="font-size: 16px;">Xem tất cả</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/news-500x280-5.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h4" href="">Tin vui: Samsung sẽ tung ra bản cập nhật vá lỗi camera cho Galaxy S23 5G Series</a>
                                    <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/5.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/news-500x280-6.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h4" href="">Hotsale cuối tuần: Galaxy S23 và S23+ giảm giá tưng bừng đến 5.6 triệu</a>
                                    <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/6.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/7.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
    </div>


    <div class="container-fluid py-3 align-items-center tech_news_mobile" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h2 style="font-size: 13px;">Phổ biến</h2>
                                
                                <a  class="text-secondary font-weight-medium text-decoration-none" href="" style="font-size: 13px;">Xem tất cả</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/news_apple_watch.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h4" href="" style="font-size: 13px;">Apple Watch không còn 'kẽ hở về giá', chỉ từ 6.09 triệu sẽ có ngay 1 mẫu xịn sò</a>
                                    <p class="m-0" style="font-size: 13px;">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/2.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="" style="font-size: 13px;">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-03</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/1.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="" style="font-size: 13px;">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-04</span>
                                    </div>
                                    <a class="h4" href="" style="font-size: 13px;">24h công nghệ có gì HOT 7/5: Cận cảnh iPhone 15 Ultra, OPPO Reno7 5G được cập nhật giao diện ColorOS 13.1</a>
                                    <p class="m-0" style="font-size: 13px;">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/news-100x100-3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="" style="font-size: 13px;">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-06</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/news-100x100-4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="" style="font-size: 13px;">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-03-06</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="./public/frontend/assets/images/ads-700x70.jpg" alt=""></a>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h2 style="font-size: 13px;">Mới nhất</h2>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="" style="font-size: 13px;">Xem tất cả</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/news-500x280-5.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h4" href="" style="font-size: 13px;">Tin vui: Samsung sẽ tung ra bản cập nhật vá lỗi camera cho Galaxy S23 5G Series</a>
                                    <p class="m-0" style="font-size: 13px;">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/5.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./public/frontend/assets/images/news-500x280-6.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h4" href="" style="font-size: 13px;">Hotsale cuối tuần: Galaxy S23 và S23+ giảm giá tưng bừng đến 5.6 triệu</a>
                                    <p class="m-0" style="font-size: 13px;">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/6.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="./public/frontend/assets/images/7.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="">Công nghệ</a>
                                        <span class="px-1">/</span>
                                        <span>2023-05-08</span>
                                    </div>
                                    <a class="h6 m-0" href="" style="font-size: 13px;">Lorem ipsum dolor sit amet consec adipis elit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->



@endsection
@extends('layouts.app')

@section('title', 'Dịch Vụ')
@section('head')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">

@section('content')
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="hero"
                    style="background: url('/img/service.webp') no-repeat center center/cover; height: 500px;">
                    <div class="container text-center text-white">

                    </div>
                </div>
            </div>


        </div>
        <div class="relative w-full bg-light-white-blue">
            <div class="relative flex justify-center gap-x pad-top">
                <!-- Gọi tổng đài -->
                <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center"
                    style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
                    <a href="/contact"
                        class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#00AEEF]">
                        <img alt="Gọi tổng đài" loading="lazy" width="24" height="24" decoding="async" data-nimg="1"
                            class="h-6 w-6" src="/img/phone.png" style="color: transparent; width: 24px; height: 24px;" />
                        <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Liên Hệ Hỗ Trợ
                        </p>
                    </a>
                    <a href="/contact" class="mt-1 flex h-[60px] flex-col justify-center">
                        <span class="p-1 text-center font-medium text-textSpan lg:p-4">
                            Tổng đài viên của chúng tôi sẽ giải đáp các câu hỏi của bạn
                        </span>
                    </a>
                </div>
                <!-- Đặt lịch hẹn -->
                <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center"
                    style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
                    <a href="/appointments/create"
                        class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#03428E]">
                        <img alt="Gọi tổng đài" loading="lazy" width="24" height="24" decoding="async" data-nimg="1"
                            class="h-6 w-6" src="/img/lich.png" style="color: transparent; width: 24px; height: 24px;" />
                        <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Đặt lịch hẹn</p>
                    </a>
                    <a href="/appointments/create" class="mt-1 flex h-[60px] flex-col justify-center">
                        <span class="p-1 text-center font-medium text-textSpan lg:p-4">
                            Đặt lịch hẹn với các chuyên gia của PHENIKAAMEC
                        </span>
                    </a>
                </div>
                <!-- Tìm bác sĩ -->
                <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center"
                    style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
                    <a href="/doctors"
                        class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#F58220]">
                        <img alt="Gọi tổng đài" loading="lazy" width="24" height="24" decoding="async" data-nimg="1"
                            class="h-6 w-6" src="/img/icon-doctor.png"
                            style="color: transparent; width: 24px; height: 24px;" />
                        <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Tìm bác sĩ</p>
                    </a>
                    <a href="/doctors" class="mt-1 flex h-[60px] flex-col justify-center">
                        <span class="p-1 text-center font-medium text-textSpan lg:p-4">
                            Chọn bác sĩ theo tên, chuyên môn và nhiều hơn thế
                        </span>
                    </a>
                </div>
            </div>
            <div class=" flex w-full justify-center">
                <div class="container size-full flex-col flex " style="width:1000px">
                    <div class="mt-8">


                        <div class="csvc">
                            <div class="title-csvc">Danh Sách Dịch Vụ</div>
                            <div class="sub-title-csvc">
                                PHENIKAAMEC cung cấp các giải pháp y tế tiên tiến với chất lượng cao, đội ngũ bác sĩ và nhân
                                viên chuyên nghiệp, trang thiết bị hiện đại, cùng sự hỗ trợ toàn diện cho bệnh nhân quốc tế,
                                từ dịch vụ phiên dịch và hỗ trợ visa đến các tiện nghi và dịch vụ chăm sóc đặc biệt, nhằm
                                đảm bảo trải nghiệm điều trị tốt nhất cho người bệnh.
                            </div>


                            <style>
                                .relative {
                                    position: relative;
                                }

                                .w-full {
                                    width: 100%;
                                }

                                .flex {
                                    display: flex;
                                }

                                a {
                                    text-decoration: none !important;
                                }

                                .gap-x {
                                    column-gap: 2rem;
                                }

                                .pad-top {
                                    padding-top: 2rem;
                                }

                                .bg-\[\#FFFFFF\] {
                                    --tw-bg-opacity: 1;
                                    background-color: rgb(255 255 255 / var(--tw-bg-opacity, 1));
                                }

                                .rounded-\[16px\] {
                                    border-radius: 16px;
                                }

                                .h-\[124px\] {
                                    height: 124px;
                                }

                                .w-\[276px\] {
                                    width: 276px;
                                }

                                .p-3 {
                                    padding: .75rem !important;
                                }

                                .bg-\[\#00AEEF\] {
                                    --tw-bg-opacity: 1;
                                    background-color: rgb(0 174 239 / var(--tw-bg-opacity, 1));
                                }

                                .rounded-t-\[16px\] {
                                    border-top-left-radius: 16px;
                                    border-top-right-radius: 16px;
                                }

                                .gap-x-3 {
                                    -moz-column-gap: .75rem;
                                    column-gap: .75rem;
                                }

                                .justify-center {
                                    justify-content: center;
                                }

                                .items-center {
                                    align-items: center;
                                }

                                .bg-\[\#03428E\] {
                                    --tw-bg-opacity: 1;
                                    background-color: rgb(3 66 142 / var(--tw-bg-opacity, 1));
                                }

                                .text-base {
                                    font-size: 1rem;
                                    line-height: 1.5rem;
                                }

                                .bg-\[\#F58220\] {
                                    --tw-bg-opacity: 1;
                                    background-color: rgb(245 130 32 / var(--tw-bg-opacity, 1));
                                }

                                .leading-normal {
                                    line-height: 1.5;
                                }

                                .font-\[700\],
                                .font-bold {
                                    font-weight: 700;
                                }

                                .h-\[60px\] {
                                    height: 60px;
                                }

                                .flex-col {
                                    flex-direction: column;
                                }

                                .mt-1 {
                                    margin-top: .25rem;
                                }

                                .font-medium {
                                    font-weight: 500;
                                }

                                .text-textSpan {
                                    --tw-text-opacity: 1;
                                    color: rgb(4 11 19 / var(--tw-text-opacity, 1));
                                }

                                .container {
                                    width: 100%;
                                }

                                .size-full {
                                    width: 100%;
                                    height: 100%;
                                }

                                .bg-light-white-blue {
                                    /* background-color: #d5edff; */
                                    background-image: linear-gradient(to top, #fff, #cfeaff);
                                }

                                .mt-8 {
                                    margin-top: 2rem;
                                }

                                .lg\:\!uppercase {
                                    text-transform: uppercase !important;
                                }

                                .lg\:text-\[24px\] {
                                    font-size: 24px;
                                }

                                .lg\:text-center {
                                    text-align: center;
                                }

                                .text-secondary-2 {
                                    --tw-text-opacity: 1;
                                    color: rgb(3 66 142 / var(--tw-text-opacity, 1));
                                }

                                .md\:text-2xl {
                                    font-size: 1.5rem;
                                    line-height: 2rem;
                                }

                                .gachchan {
                                    display: block;
                                    margin-top: .75rem;
                                    --tw-bg-opacity: 1;
                                    background-color: rgb(75 173 233 / var(--tw-bg-opacity, 1));
                                    width: 320.25px;
                                    height: .375rem;
                                }

                                .title-blue-1 {
                                    margin-top: 3.5rem;
                                    font-size: 24px;
                                    text-transform: uppercase;
                                    color: rgb(3 66 142 / var(--tw-text-opacity, 1));
                                    line-height: 1.5;
                                }




                                .scrollbar-thin {
                                    scrollbar-width: thin;
                                    scrollbar-color: #4bade9 transparent;
                                }

                                .overflow-y-auto {
                                    overflow-y: auto;
                                }

                                .h-\[312px\] {
                                    height: 312px;
                                }

                                .leading-loose {
                                    line-height: 2;
                                }

                                .article-content p {
                                    margin-bottom: 9px;
                                    color: #040b13;
                                }

                                .article-content span {
                                    line-height: 27px;
                                    color: #040b13;
                                }

                                .object-cover {
                                    -o-object-fit: cover;
                                    object-fit: cover;
                                }

                                .rounded-xl {
                                    border-radius: .75rem;
                                }






                                .hover-blue:hover {
                                    background-color: #0056b3;
                                    color: rgb(255 255 255 / var(--tw-bg-opacity, 1));
                                }


                                .card {
                                    background-color: white;
                                    border-radius: 15px;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    overflow: hidden;
                                    max-width: 350px;
                                    transition: transform 0.3s, box-shadow 0.3s;
                                    cursor: pointer;
                                }

                                .card:hover {
                                    transform: translateY(-5px);
                                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                                }

                                .card-image {
                                    width: 100%;
                                    height: 200px;
                                    object-fit: cover;
                                }

                                .card-content {
                                    padding: 15px;
                                    text-align: left;
                                }

                                .card-content h3 {
                                    font-size: 18px;
                                    color: #002E6D;
                                    margin-bottom: 10px;
                                }

                                .card-content p {
                                    font-size: 14px;
                                    color: #555;
                                    line-height: 1.6;
                                }

                                .load-more {
                                    background-color: #FF7F50;
                                    color: white;
                                    border: none;
                                    border-radius: 20px;
                                    padding: 10px 20px;
                                    font-size: 16px;
                                    cursor: pointer;
                                    transition: background-color 0.3s;
                                }

                                .load-more:hover {
                                    background-color: #FF4500;
                                }

                                .csvc {
                                    text-align: center;
                                    padding: 20px;
                                }

                                .title-csvc {
                                    font-size: 24px;
                                    font-weight: bold;
                                    margin-bottom: 20px;
                                    color: #004a80;
                                }

                                .sub-title-csvc {
                                    font-size: 16px;
                                    color: #666;
                                    margin-bottom: 40px;
                                }

                                .tag-csvc {
                                    display: grid;
                                    grid-template-columns: auto auto auto;
                                    justify-content: center;
                                    gap: 20px;
                                    flex-wrap: wrap;
                                }

                                .tag {
                                    background-color: white;
                                    border-radius: 10px;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    width: 240px;
                                    overflow: hidden;
                                }

                                .tag img {
                                    width: 100%;
                                    object-fit: cover;
                                }

                                .tag-content {
                                    padding: 15px;
                                }

                                .tag-content h3 {
                                    font-size: 18px;
                                    color: #004a80;
                                    margin: 0 0 10px;
                                }

                                .tag-content p {
                                    font-size: 14px;
                                    color: #555;
                                    line-height: 1.6;
                                }

                                /* Grid hiển thị dịch vụ */
                                .grid-3 {
                                    display: grid;
                                    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                                    gap: 20px;
                                    justify-content: center;
                                    max-width: 1000px;
                                    margin: 20px auto;
                                }

                                /* Ô chứa mỗi dịch vụ */
                                .grid-item {
                                    background: white;
                                    border-radius: 12px;
                                    overflow: hidden;
                                    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                                    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                                    text-align: center;
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                    /* Căn đều ảnh và tên */
                                    align-items: stretch;
                                    height: auto;
                                    /* Loại bỏ chiều cao cố định */
                                }

                                .grid-item:hover {
                                    transform: translateY(-5px);
                                    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
                                }

                                /* Hình ảnh dịch vụ */
                                .grid-item img {
                                    width: 100%;
                                    height: 200px;
                                    object-fit: cover;
                                    /* Ảnh che kín ô */
                                    border-bottom: 3px solid #00AEEF;
                                }

                                /* Tên dịch vụ */
                                .grid-item h3 {
                                    font-size: 16px;
                                    font-weight: bold;
                                    color: #03428E;
                                    padding: 15px;
                                    margin: 0;
                                    background: #EAF6FF;
                                    border-radius: 0 0 12px 12px;
                                    text-align: center;
                                    flex-grow: 1;
                                    /* Đẩy sát ảnh, tránh khoảng thừa */
                                }
                            </style>

                            <!-- Hiển thị dịch vụ -->
                            <div class="grid-3">
                                @if(isset($services) && $services->count() > 0)
                                    @foreach($services as $service)
                                        <div class="grid-item">
                                            <img src="{{ asset($service->image) }}" alt="{{ $service->name }}"
                                                onerror="this.onerror=null; this.src='{{ asset('img/default.jpg') }}';">
                                            <h3>{{ $service->name }}</h3>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-center">Hiện chưa có dịch vụ nào.</p>
                                @endif
                            </div>







                            <div class="flex w-full justify-center">
                                <button class="load-more">Xem thêm &gt;&gt;</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
@endsection
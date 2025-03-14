@extends('layouts.app')

@section('title', 'Home')
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

.grid-2 {
    display: grid;
    grid-template-columns: 50% 50%;
    gap: 1.5rem;
}

.grid-3 {
    display: grid;
    grid-template-columns: 30% 30% 30%;
    gap: 1.5rem;
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

.grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.grid-item {
    background-color: #e6f7ff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.grid-item img {
    width: 100%;
    height: auto;
}

.grid-item h3 {
    color: #0056b3;
    margin: 0;
    font-size: 20px;
    padding: 10px 0;
    font-size: 18px;
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity, 1));
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 20px 0px;
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
</style>
@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero" style="background: url('/img/bg1.png') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg2.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg3.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="relative w-full bg-light-white-blue">
    <div class="relative flex justify-center gap-x pad-top">
         <!-- Gọi tổng đài -->
    <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="tel:1900886648" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#00AEEF]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/phone.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Gọi tổng đài</p>
    </a>
    <a href="tel:1900886648" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
        Tổng đài viên của chúng tôi sẽ giải đáp các câu hỏi của bạn
      </span>
    </a>
    </div>
  <!-- Đặt lịch hẹn -->
  <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="/" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#03428E]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/lich.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Đặt lịch hẹn</p>
    </a>
    <a href="tel:1900886648" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
      Đặt lịch hẹn với các chuyên gia của PHENIKAAMEC
      </span>
    </a>
  </div>
  <!-- Tìm bác sĩ -->
  <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="/" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#F58220]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/icon-doctor.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Tìm bác sĩ</p>
    </a>
    <a href="/" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
      Chọn bác sĩ theo tên, chuyên môn và nhiều hơn thế
      </span>
    </a>
    </div>
  </div>
  <div class=" flex w-full justify-center">
    <div class="container size-full flex-col flex " style="width:1000px">
      <div class="mt-8">
        <div class="flex flex-col items-center">
          <h1 class=" text-[20px] normal-case leading-8 text-secondary-2 lg:text-[24px] lg:!uppercase text-md md:text-2xl lg:text-center">Phenikaamec - Hệ thống y tế hàn lâm đẳng cấp quốc tế</h1>
          <div class="gachchan"></div>
        </div>
        <h2 class="title-blue-1">Về chúng tôi</h2>
        <div class="grid-2">
          <div class="relative">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;">
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">PhenikaaMec là hệ thống y tế hàn lâm đẳng cấp quốc tế thuộc Hệ sinh thái Chăm sóc sức khỏe Tập đoàn Phenikaa. Thành lập năm 2010, PHENIKAA hiện là tập đoàn kinh tế đa ngành với hơn 30 đơn vị thành viên hoạt động trong và ngoài nước (Mỹ, Canada…), trên các lĩnh vực cốt lõi: Công nghiệp, Công nghệ, Giáo dục đào tạo, Chăm sóc sức khỏe và các dịch vụ khác.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Với định hướng phát triển bền vững và nền tảng vững chắc về khoa học công nghệ, hệ thống chuyên nghiệp, con người sẵn sàng thích ứng - đổi mới, hoạt động theo mô hình Hệ sinh thái “3 Nhà”: Nhà Sản xuất Kinh doanh – Nhà Khoa học – Nhà Giáo dục, gắn kết chặt chẽ và tương hỗ lẫn nhau, Tập đoàn đang xây dựng và phát triển PHENIKAA trở thành thương hiệu tiên phong, uy tín tại Việt Nam và quốc tế về vật liệu tiên tiến, vật liệu sinh thái cao cấp, sản phẩm ; giải pháp thông minh, dịch vụ giáo dục - chăm sóc sức khỏe nhân văn và xuất sắc.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Sở hữu thế mạnh về nền tảng đào tạo nguồn nhân lực Y - Dược và Nghiên cứu khoa học, Tập đoàn Phenikaa phát triển hệ sinh thái khép kín trong lĩnh vực Chăm sóc sức khỏe với 4 mảng: Giáo dục và Đào tạo – Chăm sóc sức khỏe - Sản xuất kinh doanh – Công nghệ và chuyển giao.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">PHENIKAAMEC nuôi dưỡng khát vọng cống hiến, vun đắp niềm tin, nỗ lực vươn tầm nhằm mang đến các giá trị cho xã hội và nâng cao sức khỏe cộng đồng với mục tiêu:</span></p>
            </div>
          </div>
          <img src="./img/img36.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
        </div>
        <h2 class="title-blue-1">Tầm nhìn - sứ mệnh - giá trị cốt lõi</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="grid-item">
              <img src="/img/img2.webp" alt="Tầm nhìn" style="height: 169.14;">
              <h3 class="hover-blue" style="cursor:pointer;">Tầm nhìn</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img3.webp" alt="Sứ mệnh">
              <h3 class="hover-blue" style="cursor:pointer;">Sứ mệnh</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img4.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Giá trị cốt lõi</h3>
          </div>
        </div>

        <div class="csvc">
        <div class="title-csvc">CƠ SỞ VẬT CHẤT HIỆN ĐẠI</div>
        <div class="sub-title-csvc">
            PHENIKAAMEC là hệ thống y tế hàn lâm đẳng cấp Quốc tế thuộc hệ sinh thái chăm sóc sức khỏe Phenikaa của Tập đoàn Phenikaa. Với sự đầu tư mạnh mẽ, sử dụng các trang thiết bị y tế, máy móc hiện đại bậc nhất trên thế giới cùng với cơ sở vật chất tiêu chuẩn 5 sao, PHENIKAAMEC sẽ là một trong những mô hình có dịch vụ y tế chất lượng cao, quy mô lớn trên cả nước.
        </div>

        <div class="tag-csvc">
            <div class="tag">
                <img src="/img/img20.webp" alt="Facility 1">
                <div class="tag-content">
                    <h3>Khu vực lễ tân</h3>
                    <p>Khu vực tiếp đón hiện đại, tiện nghi, mang đến trải nghiệm tốt nhất cho khách hàng.</p>
                </div>
            </div>

            <div class="tag">
                <img src="/img/img21.webp" alt="Facility 2" style="height:280px">
                <div class="tag-content">
                    <h3>Phòng làm việc</h3>
                    <p>Được trang bị các thiết bị y tế hiện đại nhất, đảm bảo tiêu chuẩn quốc tế.</p>
                </div>
            </div>

            <div class="tag">
                <img src="/img/img22.webp" alt="Facility 3">
                <div class="tag-content">
                    <h3>Phòng điều trị</h3>
                    <p>Không gian rộng rãi, thoải mái, mang lại cảm giác yên tâm cho bệnh nhân.</p>
                </div>
            </div>

        </div>
      </div>

      <div class="csvc">
        <div class="title-csvc">Danh Sách Dịch Vụ</div>
        <div class="sub-title-csvc">
            PHENIKAAMEC cung cấp các giải pháp y tế tiên tiến với chất lượng cao, đội ngũ bác sĩ và nhân
            viên chuyên nghiệp, trang thiết bị hiện đại, cùng sự hỗ trợ toàn diện cho bệnh nhân quốc tế,
            từ dịch vụ phiên dịch và hỗ trợ visa đến các tiện nghi và dịch vụ chăm sóc đặc biệt, nhằm
            đảm bảo trải nghiệm điều trị tốt nhất cho người bệnh.
        </div>
        <!-- Hiển thị dịch vụ -->
        <div class="grid-3">
              @if(isset($services) && $services->count() > 0)
                  @foreach($services as $service)
                      <div class="grid-item">
                          <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" style="height: 169.14px;"
                              onerror="this.onerror=null; this.src='{{ asset('img/default.jpg') }}';">
                          <h3>{{ $service->name }}</h3>
                      </div>
                  @endforeach
              @else
                  <p class="text-center">Hiện chưa có dịch vụ nào.</p>
              @endif
          
      </div>
      <div class="flex w-full justify-center mt-8">
          <button class="load-more">Xem thêm &gt;&gt;</button>
        </div>

        <h2 class="title-blue-1">Trang thiết bị tân tiến</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="grid-item">
              <img src="/img/img5.webp" alt="Tầm nhìn">
              <h3 class="hover-blue" style="cursor:pointer;">Y học hạt nhân</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img6.webp" alt="Sứ mệnh">
              <h3 class="hover-blue" style="cursor:pointer;">Máy xạ trị</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img7.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Hệ thống can thiệp mạch</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img8.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy CT</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img9.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy MRI</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img10.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy X-Quang</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img11.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Máy đo đa năng</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img12.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Bộ đo mạch và huyết áp</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img13.jpeg" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Máy chẩn đoán hiện đại</h3>
          </div>
        </div>
        <h2 class="title-blue-1">Thành tựu Phenikaamec</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="card">
            <img src="/img/img14.webp" alt="HDF Online" class="card-image">
            <div class="card-content">
              <h3>PHENIKAAMEC sẵn sàng đưa vào hoạt động kỹ thuật lọc thận HDF online</h3>
              <p>Khoa Thận nhân tạo – Bệnh viện Đại học Phenikaa ngay từ đầu thành lập đã được chú trọng đầu tư...</p>
            </div>
          </div>
          <div class="card">
            <img src="/img/img15.webp" alt="DSA Technology" class="card-image">
            <div class="card-content">
              <h3>PhenikaaMec làm chủ kỹ thuật chụp DSA – “thủ thuật Vàng” trong chẩn đoán hình ảnh</h3>
              <p>Chụp mạch số hóa xóa nền (DSA) chính là “cánh tay đắc lực” hỗ trợ các chuyên gia...</p>
            </div>
          </div>
          <div class="card">
            <img src="/img/img16.webp" alt="I131 Treatment" class="card-image">
            <div class="card-content ">
              <h3>Sắp thêm một địa chỉ điều trị ung thư tuyến giáp bằng I131 tại Hà Nội</h3>
              <p>Xạ trị I131 là dược chất phóng xạ, dùng trong điều trị bệnh nhân ung thư tuyến giáp...</p>
            </div>
          </div>
        </div>
        <div class="flex w-full justify-center">
          <button class="load-more">Xem thêm &gt;&gt;</button>
        </div>

        <h2 class="title-blue-1">Về hoạt động của PhenikaaMec</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="grid-item">
              <img src="/img/img32.webp" alt="Nghiên cứu khoa học">
              <h3 class="hover-blue" style="cursor:pointer;">Nghiên cứu khoa học</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img33.webp" alt="Đào tạo">
              <h3 class="hover-blue" style="cursor:pointer;">Đào tạo</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img34.webp" alt="Hội thảo và hợp tác">
              <h3 class="hover-blue" style="cursor:pointer;">Hội thảo và hợp tác</h3>
          </div>
        </div>

      </div>
    

    </div>
  </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-3 title-blue-1" style="margin-top: -5px;">Hợp tác bác sĩ</h2>
            <p class="lead">Bệnh viện Đại học Phenikaa là một trong số ít bệnh viện tại Việt Nam triển khai chương trình hợp tác với các chuyên gia, bác sĩ đến từ nhiều bệnh viện lớn cả trong nước và quốc tế.</p>
        </div>
    </div>
    <img src="/img/img35.webp" alt="Hợp tác bác sĩ" style="height: 375px;margin-bottom: 70px;">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-3">Liên hệ với chúng tôi</h2>
            <p class="lead">Bạn có câu hỏi hoặc cần hỗ trợ? Hãy để lại tin nhắn, chúng tôi sẽ phản hồi sớm nhất.</p>
        </div>
    </div>

    <!-- Form hỗ trợ bệnh nhân -->
    <div class="container py-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-3">Gửi Yêu Cầu Hỗ Trợ</h4>
            <form action="{{ route('support.store_home') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Tuổi</label>
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Nội dung cần hỗ trợ</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Gửi yêu cầu</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Địa chỉ & Liên hệ -->
    <div class="row text-center mt-5">
        <div class="col-md-4">
            <h5><i class="bi bi-geo-alt"></i> Địa chỉ</h5>
            <p>Tầng 1, 2, 3 - Số 167 Hoàng Ngân, Hà Nội</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-telephone"></i> Điện thoại</h5>
            <p>02422226699</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-envelope"></i> Email</h5>
            <p>support@phenikaamec.com</p>
        </div>
    </div>
</div>
























<!-- Chatbot Floating Button -->
<style>
.chatbot-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.chatbot-button:hover {
    transform: scale(1.1);
}

.chatbot-tooltip {
    position: fixed;
    bottom: 90px;
    right: 30px;
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 14px;
    display: none;
}

.chatbot-button i {
    font-size: 28px;
}
</style>

<!-- Tooltip -->
<div class="chatbot-tooltip" id="chatbot-tooltip">Chat ngay với PhenikaaMec AI</div>

<!-- Chatbot Button with Message Icon -->
<div class="chatbot-button" id="chatbot-button">
    <i class="fas fa-comment-dots"></i> <!-- Thay icon bằng tin nhắn -->
</div>

<script>
document.getElementById('chatbot-button').addEventListener('click', function() {
    window.location.href = "{{ route('chatbot.index') }}";
});

document.getElementById('chatbot-button').addEventListener('mouseenter', function() {
    document.getElementById('chatbot-tooltip').style.display = 'block';
});

document.getElementById('chatbot-button').addEventListener('mouseleave', function() {
    document.getElementById('chatbot-tooltip').style.display = 'none';
});
</script>

@endsection
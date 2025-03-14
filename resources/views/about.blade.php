@extends('layouts.app')

@section('title', 'About Us')
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
            <div class="hero" style="background: url('/img/bg1.webp') no-repeat center center/cover; height: 500px;">
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
          <img src="./img/img1.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
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
        <h2 class="title-blue-1">Công ty cổ phần y học vĩnh thiện</h2>
        <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px ; white-space: pre-wrap;">Là đơn vị chủ quản của Bệnh viện Đại học Phenikaa, nằm trong hệ sinh thái chăm sóc sức khỏe của Tập đoàn Phenikaa, Công ty CP Y học Vĩnh Thiện là đơn vị bảo hộ và quản lý các hoạt động cho các đơn vị trong lĩnh vực chăm sóc sức khỏe của Tập đoàn và đảm bảo công tác vận hành, đào tạo chuyên môn, nghiên cứu khoa học.<br>Trong mảng Chăm sóc sức khỏe, các dự án trọng tâm của Vĩnh Thiện bao gồm: Bệnh viện Đại học Phenikaa và Hệ thống phòng khám vệ tinh, Trung tâm Y khoa phục vụ giảng dạy và nghiên cứu, Hệ thống bệnh án điện tử, quản lý bệnh viện theo hướng số hóa, triển khai Y tế từ xa…. Với Hệ sinh thái Khoa học sức khỏe Phenikaa được bảo hộ bởi Công ty Cổ phần Vĩnh Thiện, Tập đoàn Phenikaa đặt mục tiêu trở thành thương hiệu uy tín hàng đầu chuyên cung cấp các sản phẩm dịch vụ chất lượng vượt trội trong lĩnh vực Chăm sóc sức khỏe, góp phần nâng cao chất lượng cuộc sống, mang đến sức khỏe, bình an và hạnh phúc cho người Việt.</span></p>
        <div class="grid-2" style="margin: 0 55px;margin-bottom: 2.5rem;">
          <img src="./img/img17.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
          <div class="relative" style="background-color: rgb(231 249 255 / var(--tw-bg-opacity, 1));">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;padding: 25px">
              <h3 style="color: rgb(3 66 142 / var(--tw-text-opacity, 1));font-size: 16px;">Bệnh viện Đại học Phenikaa</h3>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Bệnh viện Đại học Phenikaa là dự án trọng điểm trong lĩnh vực chăm sóc sức khỏe của Tập đoàn Phenikaa. Với tổng diện tích sàn xây dựng xấp xỉ 90.000 m2 trong khuôn viên rộng hơn 3,1 hecta gồm 4 tòa nhà chính và các công trình cảnh quan, giao thông đáp ứng hơn 2000 lượt khám mỗi ngày với gần 800 giường bệnh phục vụ điều trị nội trú. Bệnh viện Đại học Phenikaa mang nhiều kỳ vọng sẽ tạo dựng được dấu ấn của Phenikaa trong xu hướng xã hội hóa y tế hiện nay với tầm nhìn</span></p>
            </div>
          </div>
          <div class="relative" style="background-color: rgb(231 249 255 / var(--tw-bg-opacity, 1));">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;padding: 25px">
              <h3 style="color: rgb(3 66 142 / var(--tw-text-opacity, 1));font-size: 16px;">Phòng khám Đa khoa Đại học Phenikaa</h3>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Phòng khám Đa khoa Bệnh viện Đại học Phenikaa thuộc Hệ sinh thái chăm sóc sức khỏe Phenikaa với nền tảng Con người tri thức và nhân văn – Hệ thống thông minh – Công nghệ tiên tiến, mang đến chất lượng điều trị xuất sắc, dịch vụ chăm sóc hoàn hảo, kết quả nghiên cứu mang tính đột phá và giáo dục nâng tầm tri thức trong lĩnh vực y học vì một cộng đồng khỏe mạnh, nhân văn và tri thức.   Với dịch vụ khám, chữa bệnh chất lượng cao và tinh thần phục vụ chu đáo, Phòng Khám Đa khoa Bệnh viện Đại học Phenikaa là một địa chỉ khám, chữa bệnh tin cậy cho người dân Thành phố Hà Nội và các khu vực lân cận.</span></p>
            </div>
          </div>
          <img src="./img/img18.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
          <img src="./img/img19.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
          <div class="relative" style="background-color: rgb(231 249 255 / var(--tw-bg-opacity, 1));">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;padding: 25px">
              <h3 style="color: rgb(3 66 142 / var(--tw-text-opacity, 1));font-size: 16px;">Phòng khám Răng Hàm Mặt Đại học Phenikaa</h3>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Cuối năm 2023, Phòng khám Răng Hàm Mặt đại học Phenikaa ra đời và đi vào vận hành, đánh dấu bước đầu tiên trong việc hiện thực hóa các cam kết trong lĩnh vực Chăm sóc sức khỏe của Tập đoàn. Sứ mệnh của Phòng khám không chỉ dừng lại ở việc chăm sóc răng miệng truyền thống, mà còn tạo ra môi trường nuôi dưỡng tối ưu, nơi sức khỏe răng miệng và sức khỏe tổng thể của khách hàng được đặt lên hàng đầu, mang đến công nghệ tiên tiến, đội ngũ chuyên nghiệp với kĩ năng cao, cam kết cung cấp dịch vụ tốt nhất phù hợp với nhu cầu cá nhân của từng người. Với dịch vụ khám, chữa bệnh chất lượng cao và tinh thần phục vụ chu đáo, Phòng Khám Đa khoa Bệnh viện Đại học Phenikaa là một địa chỉ khám, chữa bệnh tin cậy cho người dân Thành phố Hà Nội và các khu vực lân cận.</span></p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
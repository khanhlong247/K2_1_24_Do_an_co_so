# Hệ Thống Quản Lý Phòng Khám Da Liễu

## 👨‍💻 Nhóm phát triển: [Trương Long Khánh - Lưu Mai Tuyết - Trịnh Phúc Lương]

---

## Giới thiệu

Hệ thống quản lý phòng khám da liễu hỗ trợ quản lý thông tin bệnh nhân, bác sĩ, lịch hẹn, và các thông tin khác trong phòng khám. Dự án tập trung vào việc cung cấp giao diện trực quan, đảm bảo bảo mật và hỗ trợ quản lý hiệu quả các quy trình trong phòng khám.

---

## Chức năng chính

### Quản lý bệnh nhân

- Thêm mới, sửa, xóa và tìm kiếm bệnh nhân.
- Quản lý lịch sử khám bệnh và thông tin liên hệ.

### Quản lý lịch hẹn

- Đặt lịch hẹn cho bệnh nhân với bác sĩ.
- Gửi thông báo lịch hẹn qua email hoặc SMS.
- Cập nhật trạng thái lịch hẹn (đã hoàn thành, đang chờ, hủy).

### Quản lý bác sĩ

- Thêm mới, sửa, xóa thông tin bác sĩ.
- Theo dõi lịch làm việc và phân công bác sĩ.

### Quản lý hóa đơn và kê đơn thuốc

- Lập hóa đơn khám bệnh.
- Kê đơn thuốc và theo dõi trạng thái thanh toán.

### Báo cáo và thống kê

- Thống kê số lượng bệnh nhân theo ngày, tuần, tháng.
- Báo cáo doanh thu và hiệu suất bác sĩ.

---

## Công nghệ sử dụng

- **Ngôn ngữ**: PHP (Laravel Framework).
- **Frontend**: Blade Templates, Livewire.
- **Cơ sở dữ liệu**: MySQL.
- **Hệ thống kiểm soát phiên bản**: Git.
- **Thư viện hỗ trợ**:
  - Composer: Quản lý thư viện PHP.
  - npm: Quản lý thư viện JavaScript.

---

## Cài đặt (Installation)

```bash
composer install
npm install
php artisan migrate --seed
php artisan serve
```

---

## Triển khai (Deployment)

### Bản local:

```bash
php artisan serve
```

### Truy cập trên trình duyệt:

```
http://127.0.0.1:8000
```

---

## Database (Cơ sở dữ liệu)

### Bảng `patients` (Thông tin bệnh nhân):

| **Tên Cột**       | **Kiểu Dữ Liệu**       | **Ràng buộc**               |
| ----------------- | ---------------------- | --------------------------- |
| `patient_id`      | INT                    | PRIMARY KEY, AUTO_INCREMENT |
| `name`            | VARCHAR(255)           | NOT NULL                    |
| `gender`          | ENUM('MALE', 'FEMALE') | NOT NULL                    |
| `dob`             | DATE                   | NOT NULL                    |
| `phone`           | VARCHAR(15)            | UNIQUE, NOT NULL            |
| `email`           | VARCHAR(255)           | UNIQUE, NOT NULL            |
| `password`        | VARCHAR(255)           | NOT NULL                    |
| `address`         | TEXT                   | NULL                        |
| `medical_history` | TEXT                   | NULL                        |
| `created_at`      | TIMESTAMP              | NOT NULL                    |
| `updated_at`      | TIMESTAMP              | NOT NULL                    |

### Bảng `doctors` (Thông tin bác sĩ):

| **Tên Cột**            | **Kiểu Dữ Liệu** | **Ràng buộc**               |
| ---------------------- | ---------------- | --------------------------- |
| `doctor_id`            | INT              | PRIMARY KEY, AUTO_INCREMENT |
| `name`                 | VARCHAR(255)     | NOT NULL                    |
| `specialty`            | VARCHAR(255)     | NOT NULL                    |
| `position`             | VARCHAR(255)     | NOT NULL                    |
| `phone`                | VARCHAR(15)      | UNIQUE, NOT NULL            |
| `email`                | VARCHAR(255)     | UNIQUE, NOT NULL            |
| `password`             | VARCHAR(255)     | NOT NULL                    |
| `max_patients_per_day` | INT              | DEFAULT 10                  |

### Bảng `appointments` (Lịch hẹn):

| **Tên Cột**        | **Kiểu Dữ Liệu**                          | **Ràng buộc**                                         |
| ------------------ | ----------------------------------------- | ----------------------------------------------------- |
| `appointment_id`   | INT                                       | PRIMARY KEY, AUTO_INCREMENT                           |
| `patient_id`       | INT                                       | FOREIGN KEY REFERENCES patients(patient_id), NOT NULL |
| `doctor_id`        | INT                                       | FOREIGN KEY REFERENCES doctors(doctor_id), NOT NULL   |
| `appointment_date` | DATETIME                                  | NOT NULL                                              |
| `status`           | ENUM('Pending', 'Confirmed', 'Cancelled') | DEFAULT 'Pending'                                     |

### Bảng `medications` (Thông tin thuốc):

| **Tên Cột**     | **Kiểu Dữ Liệu** | **Ràng buộc**               |
| --------------- | ---------------- | --------------------------- |
| `medication_id` | INT              | PRIMARY KEY, AUTO_INCREMENT |
| `name`          | VARCHAR(255)     | NOT NULL                    |
| `description`   | TEXT             | NULL                        |
| `price`         | DECIMAL(10,2)    | NOT NULL                    |
| `quantity`      | INT              | DEFAULT 0                   |

---

## Sơ đồ Use Case (Use Case Diagram)

Hệ thống có các tác nhân và chức năng chính như sau:

### Tác nhân chính (Actors):

1. **Admin**: Quản lý toàn bộ hệ thống.
2. **Bác sĩ**: Quản lý thông tin bệnh nhân và lịch khám.
3. **Bệnh nhân**: Đặt lịch, xem thông tin bác sĩ, và nhận thông báo.
4. **Người dùng (User)**: Thực hiện đăng nhập, thay đổi mật khẩu.

---

## Quy trình nghiệp vụ

### Quy trình 1: Đặt lịch hẹn

1. Nhân viên tiếp nhận thông tin bệnh nhân.
2. Đặt lịch hẹn và phân công bác sĩ.
3. Gửi thông báo lịch hẹn qua email hoặc SMS.

### Quy trình 2: Khám bệnh

1. Bác sĩ xem thông tin bệnh nhân và lịch sử khám.
2. Thực hiện khám bệnh, kê đơn thuốc.
3. Lập hóa đơn và cập nhật trạng thái thanh toán.

### Quy trình 3: Báo cáo

1. Admin xem báo cáo tổng quan trên dashboard.
2. Thống kê doanh thu, số lượng bệnh nhân và hiệu suất bác sĩ.

---

## Liên hệ

Nếu cần hỗ trợ, vui lòng liên hệ qua email: **support@clinicmanager.com**

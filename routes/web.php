<?php

use App\Http\Controllers\PatientController;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MedicalRecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorMedicalRecordController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminInvoiceController;



// Trang chủ
Route::get('/', function () {
    return view('home'); // Trang Home
})->name('home');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


Route::middleware(['auth'])->group(function () {
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
});


// Routes cho Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('role.admin');
    })->name('admin.dashboard');

    Route::get('/admin/doctors', [AdminController::class, 'showDoctors'])->name('admin.doctors.index');
    Route::post('/admin/doctors', [AdminController::class, 'storeDoctor'])->name('admin.doctors.store');
    Route::get('/admin/doctors/{id}/edit', [AdminController::class, 'editDoctor'])->name('admin.doctors.edit');
    Route::post('/admin/doctors/{id}/update', [AdminController::class, 'updateDoctor'])->name('admin.doctors.update');
    Route::delete('/admin/doctors/{id}', [AdminController::class, 'destroyDoctor'])->name('admin.doctors.destroy');


    // Admin quản lý lịch khám (có thể duyệt, từ chối)
    Route::get('/admin/appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments.index');
    Route::put('/admin/appointments/{id}/approve', [AdminController::class, 'approveAppointment'])->name('admin.appointments.approve');
    Route::put('/admin/appointments/{id}/reject', [AdminController::class, 'rejectAppointment'])->name('admin.appointments.reject');
    Route::delete('/admin/appointments/{id}', [AdminController::class, 'deleteAppointment'])->name('admin.appointments.delete');
    Route::get('/admin/medicalrecords', [MedicalRecordController::class, 'index'])->name('admin.medicalrecords.index');
    Route::get('/admin/medicalrecords/{id}/edit', [MedicalRecordController::class, 'edit'])->name('admin.medicalrecords.edit');
    Route::post('/admin/medicalrecords', [MedicalRecordController::class, 'store'])->name('admin.medicalrecords.store');
    Route::put('/admin/medicalrecords/{id}', [MedicalRecordController::class, 'update'])->name('admin.medicalrecords.update');
    Route::delete('/admin/medicalrecords/{id}', [MedicalRecordController::class, 'destroy'])->name('admin.medicalrecords.destroy');
    // Routes for managing supports
    Route::get('/admin/supports', [SupportController::class, 'index'])->name('admin.supports.index');
    Route::delete('/admin/supports/{id}', [SupportController::class, 'destroy'])->name('admin.supports.destroy');

    // Quản lý dịch vụ
    Route::get('/admin/manageservices', [ServiceController::class, 'manageServices'])->name('admin.manageservices');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services/{id}/update', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Đảm bảo route này chỉ hiển thị danh sách dịch vụ cho người dùng
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
});

// Routes cho quản lý Hồ Sơ Bệnh Án (Medical Records)

Route::middleware(['auth', 'role:admindoctor'])->group(function () {
    Route::get('/admindoctor/dashboard', function () {
        return view('role.admindoctor');
    })->name('admindoctor.dashboard');

    // Quản lý lịch khám
    Route::get('/admindoctor/schedule', [DoctorController::class, 'showSchedule'])->name('doctor.schedule');
    Route::get('/admindoctor/patients', [DoctorController::class, 'showPatients'])->name('doctor.patients');

    // Quản lý hồ sơ bệnh án
    Route::middleware(['auth', 'role:admindoctor'])->group(function () {
        Route::get('/admindoctor/medicalrecords', [DoctorMedicalRecordController::class, 'index'])->name('admindoctor.medicalrecords.index');
        Route::get('/admindoctor/medicalrecords/create', [DoctorMedicalRecordController::class, 'createFromAppointment'])->name('admindoctor.medicalrecords.create');
        Route::post('/admindoctor/medicalrecords', [DoctorMedicalRecordController::class, 'store'])->name('admindoctor.medicalrecords.store');
        Route::get('/admindoctor/medicalrecords/{id}/edit', [DoctorMedicalRecordController::class, 'edit'])->name('admindoctor.medicalrecords.edit');
        Route::put('/admindoctor/medicalrecords/{id}', [DoctorMedicalRecordController::class, 'update'])->name('admindoctor.medicalrecords.update');
        Route::delete('/admindoctor/medicalrecords/{id}', [DoctorMedicalRecordController::class, 'destroy'])->name('admindoctor.medicalrecords.destroy');
        Route::get('/admindoctor/medicalrecords', [DoctorMedicalRecordController::class, 'index'])->name('admindoctor.medicalrecords.index');
        Route::get('/admindoctor/medicalrecords/create', [DoctorMedicalRecordController::class, 'createFromAppointment'])->name('admindoctor.medicalrecords.create');
        Route::post('/admindoctor/medicalrecords', [DoctorMedicalRecordController::class, 'store'])->name('admindoctor.medicalrecords.store');
        Route::get('/admindoctor/medicalrecords/{id}/edit', [DoctorMedicalRecordController::class, 'edit'])->name('admindoctor.medicalrecords.edit');
        Route::put('/admindoctor/medicalrecords/{id}', [DoctorMedicalRecordController::class, 'update'])->name('admindoctor.medicalrecords.update');
        Route::delete('/admindoctor/medicalrecords/{id}', [DoctorMedicalRecordController::class, 'destroy'])->name('admindoctor.medicalrecords.destroy');

        Route::get('/admindoctor/invoices/create', [InvoiceController::class, 'create'])->name('admindoctor.invoices.create');
        Route::post('/admindoctor/invoices', [InvoiceController::class, 'store'])->name('admindoctor.invoices.store');
        Route::get('/admindoctor/invoices', [InvoiceController::class, 'index'])->name('admindoctor.invoices.index');
        Route::resource('admindoctor/invoices', InvoiceController::class);

    });
});


// Routes cho AdminDoctor (Xem lịch nhưng không chỉnh sửa)
Route::middleware(['auth', 'role:admindoctor'])->group(function () {
    Route::get('/admindoctor/dashboard', function () {
        return view('role.admindoctor');
    })->name('admindoctor.dashboard');

    Route::get('/admindoctor/schedule', [DoctorController::class, 'showSchedule'])->name('doctor.schedule');
    Route::get('/admindoctor/patients', [DoctorController::class, 'showPatients'])->name('doctor.patients');
});

// Routes chung
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/about', function () {
    return view('about'); // Trang About Us
})->name('about');
Route::get('/get-doctors/{specialty}', [DoctorController::class, 'getDoctorsBySpecialty']);

// Route hiển thị dịch vụ cho bệnh nhân
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
// Route hiển thị dịch vụ cho bệnh nhân view home
Route::get('/', [ServiceController::class, 'index_home'])->name('services.index_home');

Route::get('/contact', function () {
    return view('contact'); // Trang Contact
})->name('contact');

// Home Route sau khi đăng nhập
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// Routes đặt lịch khám
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments.index');
    Route::post('/admin/appointments/store', [AdminController::class, 'storeAppointment'])->name('admin.appointments.store');
    Route::post('/admin/appointments/{id}/update', [AdminController::class, 'updateAppointment'])->name('admin.appointments.update');
    Route::delete('/admin/appointments/{id}', [AdminController::class, 'deleteAppointment'])->name('admin.appointments.destroy');
    Route::put('/admin/appointments/{id}/approve', [AdminController::class, 'approveAppointment'])->name('admin.appointments.approve');
    Route::put('/admin/appointments/{id}/reject', [AdminController::class, 'rejectAppointment'])->name('admin.appointments.reject');
    Route::get('/get-doctors-by-specialty', [AdminController::class, 'getDoctorsBySpecialty']);

    Route::middleware(['auth', 'role:admindoctor'])->group(function () {
        Route::get('/admindoctor/dashboard', [DoctorController::class, 'showDashboard'])->name('admindoctor.dashboard');
    });

    // Doctor xem lịch khám ngay khi bệnh nhân đặt (không cần Admin duyệt)
    Route::middleware(['role:admindoctor'])->group(function () {
        Route::get('/doctor/schedule', [DoctorController::class, 'showSchedule'])->name('doctor.schedule');
    });

    // Admin vẫn có thể xem toàn bộ lịch khám
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments.index');
        Route::get('/admin/patients', [AdminController::class, 'showAllPatients'])->name('admin.patients');
    });
});

// Routes cho Hỗ trợ
Route::get('/support', [SupportController::class, 'create'])->name('support.create');
Route::post('/support', [SupportController::class, 'store'])->name('support.store');

// Route cho Hỗ trợ trên home
Route::post('/', [SupportController::class, 'store'])->name('support.store_home');

// Chatbot
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage'])->name('chatbot.send');
Route::prefix('admindoctor')->name('admindoctor.')->group(function () {
    Route::resource('invoices', InvoiceController::class);
});

Route::prefix('admin/invoices')->group(function () {
    Route::get('/', [AdminInvoiceController::class, 'index'])->name('admin.invoices.index');
    Route::get('/create', [AdminInvoiceController::class, 'create'])->name('admin.invoices.create');
    Route::post('/', [AdminInvoiceController::class, 'store'])->name('admin.invoices.store');
    Route::get('/{id}', [AdminInvoiceController::class, 'show'])->name('admin.invoices.show');
    Route::get('/{id}/edit', [AdminInvoiceController::class, 'edit'])->name('admin.invoices.edit');
    Route::put('/{id}', [AdminInvoiceController::class, 'update'])->name('admin.invoices.update');
    Route::put('/admin/invoices/{id}', [AdminInvoiceController::class, 'update'])->name('admin.invoices.update');
    Route::delete('/{id}', [AdminInvoiceController::class, 'destroy'])->name('admin.invoices.destroy');
});
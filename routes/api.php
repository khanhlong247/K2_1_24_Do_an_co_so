<?php

use App\Http\Controllers\Api\PatientApiController;

Route::prefix('patients')->group(function () {
    Route::get('/', [PatientApiController::class, 'index']);          // Lấy danh sách
    Route::get('/{id}', [PatientApiController::class, 'show']);       // Lấy chi tiết
    Route::post('/', [PatientApiController::class, 'store']);         // Tạo mới
    Route::put('/{id}', [PatientApiController::class, 'update']);     // Cập nhật
    Route::delete('/{id}', [PatientApiController::class, 'destroy']); // Xóa
});
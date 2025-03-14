@extends('layouts.app')

@section('title', 'Đăng ký')

@section('content')
<div class="container py-5">
    <h2 class="text-center">Đăng ký tài khoản</h2>
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select name="role" id="role" class="form-select" required>
                <option value="admin">Admin</option>
                <option value="admindoctor">Admin Doctor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
    </form>

</div>
@endsection
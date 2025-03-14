@extends('layouts.app')

@section('title', 'Quản lý hỗ trợ')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Quản lý hỗ trợ</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($supports->isEmpty())
    <div class="alert alert-info">Không có yêu cầu hỗ trợ nào.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Họ và tên</th>
                <th>Tuổi</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supports as $support)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $support->name }}</td>
                <td>{{ $support->age }}</td>
                <td>{{ $support->phone }}</td>
                <td>{{ $support->email }}</td>
                <td>{{ $support->message }}</td>
                <td>
                    <form action="{{ route('admin.supports.destroy', $support->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    // Hiển thị form hỗ trợ cho bệnh nhân
    public function create()
    {
        return view('support');
    }

    // Lưu thông tin hỗ trợ vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Support::create($request->all());

        return redirect()->route('support.create')->with('success', 'Yêu cầu hỗ trợ của bạn đã được gửi!');
    }

    // Admin xem danh sách hỗ trợ
    public function index()
    {
        $supports = Support::all();
        return view('role.managesupport', compact('supports'));
    }

    // Admin xóa yêu cầu hỗ trợ
    public function destroy($id)
    {
        $support = Support::findOrFail($id);
        $support->delete();

        return redirect()->route('role.managesupport')->with('success', 'Đã xóa yêu cầu hỗ trợ.');
    }
}
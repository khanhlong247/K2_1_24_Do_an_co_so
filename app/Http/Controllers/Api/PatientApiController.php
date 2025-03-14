<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientApiController extends Controller
{
    // Lấy danh sách bệnh nhân
    public function index()
    {
        $patients = Patient::all();
        return response()->json(['data' => $patients], 200);
    }

    // Lấy thông tin chi tiết của một bệnh nhân
    public function show($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }

        return response()->json(['data' => $patient], 200);
    }

    // Tạo mới bệnh nhân
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $patient = Patient::create($request->all());

        return response()->json(['data' => $patient, 'message' => 'Patient created successfully'], 201);
    }

    // Cập nhật thông tin bệnh nhân
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $patient->update($request->all());

        return response()->json(['data' => $patient, 'message' => 'Patient updated successfully'], 200);
    }

    // Xóa bệnh nhân
    public function destroy($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //ดึงข้อมูล
    function employeeData()
    {
        $dataEm = Employee::all();
        return view('home', compact('dataEm'));
    }

    //เพิ่มข้อมูล
    function insertEm(Request $request)
    {
        $request->validate([
            'em_name' => 'required',
            'em_email' => 'required',
            'em_phone' => 'required',
            'em_salary' => 'required',
            'em_position' => 'required',
            'em_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('em_img')) {
            $image = $request->file('em_img');
            $nameImg = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile'), $nameImg);

            Employee::create([
                'em_name' => $request->em_name,
                'em_email' => $request->em_email,
                'em_phone' => $request->em_phone,
                'em_salary' => $request->em_salary,
                'em_position' => $request->em_position,
                'em_img' => 'profile/' . $nameImg,
            ]);

            $dataEm = Employee::all();

            return view('home', compact('dataEm'));
        }
    }


    //ลบข้อมูล
    function deleteData($id)
    {
        $data = Employee::find($id);
        if ($data) {
            $data->delete();
            // ลบไฟล์รูปที่อยู่ใน public
            unlink(public_path($data->em_img));

            $dataEm = Employee::all();
            return view('home', compact('dataEm'));
        }
    }


    // แสดงฟอร์มแก้ไขข้อมูลพนักงาน
    public function editData($id)
    {
        $employee = Employee::findOrFail($id);
        return view('edit', compact('employee'));
    }


    // แก้ไขข้อมูล
    public function updateData(Request $request, $id)
    {
        // ตรวจสอบข้อมูลที่จะแก้ไข
        $employee = Employee::find($id);

        // ตรวจสอบว่าพบข้อมูลหรือไม่
        if (!$employee) {
            return redirect()->route('home')->with('error', 'Employee not found.');
        }

        // ตรวจสอบข้อมูลที่รับมา
        $request->validate([
            'em_name' => 'required',
            'em_email' => 'required',
            'em_phone' => 'required',
            'em_salary' => 'required',
            'em_position' => 'required',
            'em_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // อัปโหลดรูปภาพใหม่ (ถ้ามี)
        if ($request->hasFile('em_img')) {
            $image = $request->file('em_img');
            $nameImg = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile'), $nameImg);

            // ลบรูปเก่า (ถ้ามี)
            if ($employee->em_img) {
                unlink(public_path($employee->em_img));
            }

            // อัปเดตข้อมูล
            $employee->update([
                'em_name' => $request->em_name,
                'em_email' => $request->em_email,
                'em_phone' => $request->em_phone,
                'em_salary' => $request->em_salary,
                'em_position' => $request->em_position,
                'em_img' => 'profile/' . $nameImg,
            ]);
        } else {
            // อัปเดตข้อมูล (ไม่มีการอัปโหลดรูป)
            $employee->update([
                'em_name' => $request->em_name,
                'em_email' => $request->em_email,
                'em_phone' => $request->em_phone,
                'em_salary' => $request->em_salary,
                'em_position' => $request->em_position,
            ]);
        }
        $dataEm = Employee::all();

        return view('home', compact('dataEm'))->with('success', 'Employee updated successfully.');
    }

}

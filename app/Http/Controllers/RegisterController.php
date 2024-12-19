<?php

namespace App\Http\Controllers;
use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Register;


class RegisterController extends Controller
{
    
    public function getAllList(Request $request)
    {
        // รับค่า status จาก query string ถ้ามี
        $status = $request->query('status');

        // เริ่มต้นการ query
        $query = Register::join('status', 'register.register_status', '=', 'status.status_id')
            ->select(
                'register.register_id as number', 
                DB::raw("DATE_FORMAT(register.register_datetime, '%d-%m-%Y %H:%i') as datetime"),
                'register.register_name as name', 
                'register.register_tel as tel', 
                'register.register_mail as email',
                'register.register_image as image',
                'status.status_name as status'
            )
            ->orderByRaw("
                CASE 
                    WHEN status.status_id = '1' THEN 1
                    WHEN status.status_id = '2' THEN 2
                    WHEN status.status_id = '3' THEN 3
                    ELSE 4
                END
            ");

        if ($status && $status !== 'ทั้งหมด') {
            $query->where('status.status_name', $status);
        }

        $query->orderByRaw("register.register_id ASC");
        // ดึงข้อมูลตาม query
        $registers = $query->get();

        return response()->json($registers);
    }
    public function updateStatus(Request $request)
    {

        $status = $request->input('status');
        // dd($status);
        foreach ($status as $id => $status) {
            if ($status === 'confirm') {
                $updateStatus = '2';
            } elseif ($status === 'decline') {
                $updateStatus = '3';
            } else {
                continue;
            }

            // อัปเดตข้อมูลในฐานข้อมูล
            $register = Register::find($id); // ค้นหา register ตาม ID
            if ($register) {
                $register->register_status = $updateStatus; // ตั้งค่าค่าของสถานะ
                $register->save(); // บันทึกการเปลี่ยนแปลง
            }
        }

    }

}

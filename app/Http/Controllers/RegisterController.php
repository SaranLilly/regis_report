<?php

namespace App\Http\Controllers;
use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class RegisterController extends Controller
{
    public function getAllList(Request $request)
    {
        $registers = DB::table('register')
            ->join('status', 'register.register_status', '=', 'status.status_id')
            ->select('register.register_id as number', 
                     'register.register_datetime as datetime', 
                     'register.register_name as name', 
                     'register.register_tel as tel', 
                     'register.register_mail as email',
                     'status.status_name as status')
                     ->orderByRaw("
                     CASE 
                         WHEN status.status_id = '1' THEN 1
                         WHEN status.status_id= '2' THEN 2
                         WHEN status.status_id = '3' THEN 3
                         ELSE 4
                     END
                 ")
            ->get();

        // dd($registers);
        return view('list', ['registers' => $registers]);
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
            DB::table('register')
                ->where('register_id', $id) // อ้างอิง ID
                ->update(['register_status' => $updateStatus]);
        }

        // ดึงข้อมูลใหม่ (ถ้าจำเป็น) แล้วส่งกลับ
        $updatedRegisters = DB::table('register')
        ->join('status', 'register.register_status', '=', 'status.status_id')
        ->select('register.register_id as number', 
                'register.register_datetime as datetime', 
                'register.register_name as name', 
                'register.register_tel as tel', 
                'register.register_mail as email',
                'status.status_name as status')
                ->orderByRaw("
                     CASE 
                         WHEN status.status_id = '1' THEN 1
                         WHEN status.status_id= '2' THEN 2
                         WHEN status.status_id = '3' THEN 3
                         ELSE 4
                     END
                 ")
        ->get();

        return response()->json([
            'message' => 'Status updated successfully.',
            'updatedRegisters' => $updatedRegisters,
        ]);
    }

}
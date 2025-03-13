<?php
namespace App\Models;

class User
{
    // Mock methods (จริงๆ ต้องเชื่อม DB ด้วย PDO)
    public static function all()
    {
        return [['id' => 1, 'name' => 'John'], ['id' => 2, 'name' => 'Jane']];
    }

    public static function find($id)
    {
        return ['id' => $id, 'name' => 'User ' . $id];
    }

    public static function create($data)
    {
        // Logic บันทึกข้อมูลลง DB
        return 1; // คืนค่า ID (ตัวอย่าง)
    }

    public static function update($id, $data)
    {
        // Logic อัปเดตข้อมูล
    }

    public static function delete($id)
    {
        // Logic ลบข้อมูล
    }
}
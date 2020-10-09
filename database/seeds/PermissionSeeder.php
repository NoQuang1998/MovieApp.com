<?php

use App\Permissions;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Quản lý người dùng',
                'display_name' => 'Quản lý người dùng',
                'parent_id' => 0,
                'key_code' => ' ',
                
            ],
            [
                'name' => 'Danh sách người dùng',
                'display_name' => 'Danh sách người dùng',
                'parent_id' => 1,
                'key_code' => 'List_User',
                
            ],
            [
                'name' => 'Thêm người dùng',
                'display_name' => 'Thêm người dùng',
                'parent_id' => 1,
                'key_code' => 'Create_User',
                
            ],
            [
                'name' => 'Sửa người dùng',
                'display_name' => 'Sửa người dùng',
                'parent_id' => 1,
                'key_code' => 'Edit_User',
                
            ],
            [
                'name' => 'Xóa người dùng',
                'display_name' => 'Xóa người dùng',
                'parent_id' => 1,
                'key_code' => 'Del_User',
                
            ],
        ];

        Permissions::insert($data);
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

class AddCanManagePermission extends Migration
{
    public function up()
    {
        \Spatie\Permission\Models\Permission::insert([
            'name' => 'shipping:manage',
            'guard_name' => 'staff',
        ]);
    }

    public function down()
    {
        \Spatie\Permission\Models\Permission::query()->where('name', 'shipping:manage')->delete();
    }
}

<?php

use Database\Seeders\AdReportCategoriesPermissionSeeder;
use Database\Seeders\AdReportCategoriesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Counting super admin role table rows
        $role_count = DB::table('roles')->count();
        if ($role_count == 0) {
            $this->callPermissionSeeder();
        }

        $this->createAdReportCategories();
        $this->createAdReportCategoriesPermission();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

    public function callPermissionSeeder()
    {
        Artisan::call('db:seed', [
            '--class' => RolePermissionSeeder::class,
        ]);
    }

    public function createAdReportCategories()
    {
        Artisan::call('db:seed', [
            '--class' => AdReportCategoriesSeeder::class,
        ]);
    }

    public function createAdReportCategoriesPermission()
    {
        Artisan::call('db:seed', [
            '--class' => AdReportCategoriesPermissionSeeder::class,
        ]);
    }
};

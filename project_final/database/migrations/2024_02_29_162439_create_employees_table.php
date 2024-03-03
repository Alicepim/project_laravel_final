<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('em_name')->comment('ชื่อพนักงาน');
            $table->string('em_email')->comment('อีเมล');
            $table->string('em_phone')->comment('เบอร์โทร');
            $table->string('em_position')->comment('ตำแหน่งงาน');
            $table->integer('em_salary')->comment('เงินเดือน');
            $table->string('em_img')->comment('รูป');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

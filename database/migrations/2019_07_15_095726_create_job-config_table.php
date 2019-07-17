<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job-config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('domain_id')->comment('id của domain cần config');
            $table->string('job_name')->comment('tên công việc,tiêu để công việc');
            $table->string('workplace')->nullable()->comment('nơi làm việc');
            $table->string('hard_salary_min')->nullable()->comment('lương cứng min');
            $table->string('hard_salary_max')->nullable()->comment('lương cứng max');
            $table->string('job_posting_date')->nullable()->comment('ngày đăng tuyển');
            $table->string('expiration_date')->nullable()->comment('ngày hết hạn');
            $table->string('job_description')->nullable()->comment('mô tả công việc');
            $table->string('entitlements')->nullable()->comment('quyền lợi được hưởng');
            $table->string('job_requirements')->nullable()->comment('yêu cầu công việc');
            $table->string('skills')->nullable()->comment('kĩ năng');
            $table->string('degree')->nullable()->comment('bằng cấp,trình độ');
            $table->string('company_name')->nullable()->comment('tên công ty');
            $table->string('company_address')->nullable()->comment('địa chỉ công ty');
            $table->string('contact')->nullable()->comment('sdt liên hệ của công ty');
            $table->string('email')->nullable()->comment('email liên hệ của công ty');
            $table->string('website')->nullable()->comment('website công ty');
            $table->string('logo')->nullable()->comment('logo công ty');
            $table->string('image')->nullable()->comment('hình ảnh công ty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job-config');
    }
}

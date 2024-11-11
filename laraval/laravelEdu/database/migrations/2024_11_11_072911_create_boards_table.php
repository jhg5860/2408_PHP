<?php
// table를 만들고 이력을 관리해주는 파일 - 스키마 코드를 관리하고 변경된 사항에대한 이력을 관리 해주는 파일
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 마이그레이션 파일 실행 : php artisan make:migration 파일명
    // 마이그레이션 실행 : php artisan migrate
    // 마이그레이션 롤백(직전의 마이그레이션 작업 되돌리기) : php artisan migrate:rollback
    // 마이그레이션 리셋(모든 마이그레이션 작업 되돌리기) :php artisan migrate:reset
    
    /**
     * Run the migrations.
     * migrations 실행
     * @return void
     */
    public function up()
    {
        Schema::create('boards_test', function (Blueprint $table) { // 'boards' 말고는 고정으로 쓰임
            $table->id('b_id');
            // $table->bigInteger('u_id', false, true); // 컬럼명, auto_increment , unsigned
            $table->bigInteger('u_id')->unsigned(); // 컬럼명-> unsigned();
            $table->char('bc_type', 1);  // 컬럼명 , 길이
            $table->string('b_title', 50); // 컬럼명 , 길이 = varchar
            $table->string('b_content', 200);
            $table->string('b_img', 100);            
            // $table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('current_timestamp'));
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp'));
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * migrations reverse
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards_test');
    }
};



<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob');
            // $table->text('avatar');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create(['name' => 'franklin', 'dob' => '2001-07-21', 'email' => 'franklinroswer@gmail.com', 'password' => Hash::make('12345678'), 'created_at' => now(),]);
        // User::create(['name' => 'admin','dob'=>'2001-07-21','email' => 'franklinroswer@gmail.com','password' => Hash::make('12345678'),'email_verified_at'=>'2025-07-09 00:00:00','avatar' => 'images/avatar-1.jpg','created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

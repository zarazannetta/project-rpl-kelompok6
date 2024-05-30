<?php

use App\Models\Userdata;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('taskName');
            $table->string('taskCategory');
            $table->dateTime('taskDueDate');
            $table->text('taskDescription')->nullable();
            $table->boolean('isCompleted')->default(false);
            $table->timestamps();   
            $table->foreignId('user_id')->constrained('userdatas')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
    
};

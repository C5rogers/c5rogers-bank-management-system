<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER user_trigger 
        BEFORE INSERT ON users FOR EACH ROW
            BEGIN 
                IF NEW.balance IS NULL THEN SET NEW.balance=0.0;
                END IF; 
            END      
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER user_trigger');
    }
};

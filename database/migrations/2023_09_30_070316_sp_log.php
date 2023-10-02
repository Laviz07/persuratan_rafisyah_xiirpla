<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $name = 'logger';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE PROCEDURE $this->name
            (
             Username varchar(100),
             Action enum('INSERT','UPDATE','DELETE'),
             log TEXT  
            )
            MODIFIES SQL DATA
            BEGIN
                INSERT INTO logs (username, Action, log)
                VALUES (username, Action, log);
            END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private $triggerName = 'trigger_after_insert_surat';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE TRIGGER $this->triggerName
            AFTER INSERT ON surat for each row
            BEGIN
                DECLARE v_username varchar(100);
                DECLARE j_surat varchar(100);

                SELECT username into v_username from user where id = New.id_user;
                SELECT jenis_surat into j_surat from jenis_surat where id = New.id_jenis_surat;

                SET @ringkasan := IFNULL(NEW.ringkasan, '[NULL]');
                SET @file := IFNULL(NEW.file, '[NULL]');

                CALL logger(v_username, 'INSERT',
                    CONCAT(
                        'id: ', NEW.id,
                        ', jenis_surat: ', j_surat,
                        ', tanggal_surat: ', NEW.tanggal_surat,
                        ', ringkasan: ', @ringkasan,
                        ', file: ', @file
                        )
                    ); 
                END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared("DROP TRIGGER IF EXISTS $this->triggerName");
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectefondStatutProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $procedure = "DROP PROCEDURE IF EXISTS `set_collectefond_statut`;
           CREATE PROCEDURE `set_collectefond_statut` ()
           BEGIN
              DECLARE today DATE;
              set today =  CURDATE();
              UPDATE collectefonds SET statut = 'Passée'
      		  WHERE DATEDIFF(today, date_lancement) > 3
              AND statut = 'En cours';
           END;";

      \DB::unprepared($procedure);

      $event = "DROP EVENT IF EXISTS `collectefond_statut_verification`;
            CREATE EVENT `collectefond_statut_verification`
            ON SCHEDULE EVERY 1 DAY
            STARTS '2022-02-28 00:30:00'
            DO
               CALL set_collectefond_statut();";

      \DB::unprepared($event);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}

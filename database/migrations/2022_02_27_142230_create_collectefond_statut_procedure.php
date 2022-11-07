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

      $proc0 = "DROP PROCEDURE IF EXISTS `set_collectefond_statut`;
           CREATE PROCEDURE `set_collectefond_statut` ()
           BEGIN
              DECLARE today DATE;
              SET today =  CURDATE();
              UPDATE collectefonds SET statut = 'Passée'
              WHERE statut = 'En cours'
              #AND TIMESTAMPDIFF(MINUTE,date_lancement,NOW()) >= 5 
              AND DATEDIFF(today, date_lancement) >= 1;
              CALL participation_echec();
           END;";
      \DB::unprepared($proc0);

      $proc1 = "DROP PROCEDURE IF EXISTS `participation_echec`;
         CREATE PROCEDURE `participation_echec` ()
         BEGIN
            DECLARE collecteid INT DEFAULT 0;
            DECLARE today DATE;
            DECLARE maxdate DATE;
            SET today =  CURDATE();
            
            select Max(date_lancement) into @maxdate from collectefonds;
            select id INTO @collecteid from collectefonds 
            where date_lancement = @maxdate
            AND statut='Passée'
            #AND TIMESTAMPDIFF(MINUTE,date_lancement,NOW()) >= 5;
            AND DATEDIFF(today, date_lancement) = 1;
            
            IF collecteid != '' OR collecteid IS NOT NULL THEN
               UPDATE membres SET penalites = penalites + 2
               WHERE membres.id NOT IN 
               (	SELECT membre_id FROM participantcollectes
                  WHERE participantcollectes.collectefond_id = @collecteid
               ); 
            END IF;
            
         END;";
      \DB::unprepared($proc1);

      $proc2 ="DROP PROCEDURE IF EXISTS `bloc_member_on_fullechec`;
         CREATE PROCEDURE `bloc_member_on_fullechec` ()
         BEGIN
            UPDATE membres SET statut = 0
            WHERE penalites >= 6;
         END;";
     \DB::unprepared($proc2);
      
      $proc31 = "DROP PROCEDURE IF EXISTS `global_collecte_verification`;
         CREATE PROCEDURE `global_collecte_verification` ()
         BEGIN
            CALL set_collectefond_statut();
            #CALL participation_echec();
            CALL bloc_member_on_fullechec();
         END;";   
      \DB::unprepared($proc31);

      $event = "DROP EVENT IF EXISTS `collectefond_verification`;
         CREATE EVENT `collectefond_verification`
         ON SCHEDULE EVERY 1 DAY 
         STARTS '2022-09-16 00:06:00' ON COMPLETION PRESERVE
         DO
            CALL global_collecte_verification();";

      \DB::unprepared($event);

      // ===============================================

      $proc4 = "DROP TRIGGER IF EXISTS `after_participation`;
         CREATE TRIGGER after_participation
         AFTER INSERT
         ON participantcollectes FOR EACH ROW
         BEGIN
            DECLARE nbpenalites int;
            DECLARE type_participation VARCHAR(25);
            SELECT penalites INTO @nbpenalites FROM membres
               WHERE id = NEW.membre_id; 
            SELECT evenements.qualificatif INTO @type_participation
               FROM collectefonds
               JOIN evenements ON evenements.id = collectefonds.evenement_id
               WHERE collectefonds.id = NEW.collectefond_id;   
            IF nbpenalites = 0 THEN
               IF type_participation = 'Heureux' THEN  
                  UPDATE membres SET membres.partcipation_heureuse = membres.partcipation_heureuse + 1
                  WHERE membres.id = NEW.membre_id;
               ELSE
                  UPDATE membres SET membres.partcipation_malheureuse = membres.partcipation_malheureuse + 1
                  WHERE membres.id = NEW.membre_id;
               END IF;
            ELSEIF nbpenalites >= 1 THEN
               UPDATE membres SET membres.penalites = membres.penalites - 1
                  WHERE membres.id = NEW.membre_id;
            END IF;
         END;";
      \DB::unprepared($proc4);

      // ==================== GOOD CODE ==============================================
      // select Max(date_lancement) into @maxdate from collectefonds where statut="Passée";
      // select id from collectefonds where date_lancement = @maxdate;
      // SELECT id INTO @collecteid  FROM collectefonds
      // WHERE collectefonds.statut = 'Passée' 
      // AND DATEDIFF(today, date_lancement) = 3;
      // WHERE DATEDIFF(today, date_lancement) >= 1
      // AND DATEDIFF(today, date_lancement) = 1;
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
/**
 * N'oublie pas de modifié et de tester le code ce member eligibilite
 * en prenant en compte le nb de penalite
 * dans le tableau de gestoin des membre ajouter un champs qui compte le nombre de participation et echecs consecutives
*/
// ======= actual
// CREATE PROCEDURE `participation_echec` ()
// BEGIN
//    DECLARE collecteid INT DEFAULT 0;
   // SELECT id INTO @collecteid  FROM collectefonds
   // INNER JOIN (
   //    SELECT id as collecte_id, MAX(date_lancement) date_lancement FROM collectefonds 
   // )collecte
   // ON collectefonds.id = collecte.collecte_id
   // WHERE collectefonds.statut = 'Passée';

//    UPDATE membres SET penalites = penalites + 2
//    WHERE membres.id NOT IN 
//    (	SELECT membre_id FROM participantcollectes
//       WHERE participantcollectes.collectefond_id = @collecteid
//    ); 
// END;

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
/**
 * N'oublie pas de modifié et de tester le code ce member eligibilite
 * en prenant en compte le nb de penalite
 * dans le tableau de gestoin des membre ajouter un champs qui compte le nombre de participation et echecs consecutives
*/

// =================== ALTER TABLE MEMBRES: ADD COLUMN PENALITES =====================
// ALTER TABLE membres
// ADD penalites int NOT NULL DEFAULT 0;

// =================== STORED PROCEDURE: LAUNCH PARTICIPATION PROCEDURE =====================
/**
 * add penalities after echec on participation
*/
// CREATE PROCEDURE `participation_echec` ()
// BEGIN

// 	DECLARE @collecteid int;
// 	SELECT id INTO @collecteid  FROM collectefonds
// 	INNER JOIN (
// 		SELECT id as collecte_id, MAX(date_lancement) date_lancement FROM collectefonds
// 	)collecte
// 	ON collectefonds.id = collecte.collecte_id
//    WHERE collectefonds.statut = 'Passée';

// 	UPDATE membres SET penalites = penalites + 2
// 	WHERE membres.id NOT IN 
// 	(	SELECT membre_id FROM participantcollectes
// 		WHERE participantcollectes.collectefond_id = @collecteid
// 	);
    
// END$$
// ==========================================================================

/**
 * block a member after reach max number of penalities
*/
// DELIMITER ;

// CREATE PROCEDURE `bloc_member_on_fullechec` ()
// BEGIN
// 	UPDATE membres SET statut = 0
// 	WHERE penalites >= 6;
// END$$

// DELIMITER ;
// ==========================================================================

/**
 * call both precedent procedure
*/
// DELIMITER $$
// USE `epiz_30985687_yourcommune`$$
// CREATE PROCEDURE `global_participation_verification` ()
// BEGIN
// 	CALL participation_echec();
//     CALL bloc_member_on_fullechec();
// END$$

// DELIMITER ;


// =================== EVENT: LAUNCH PARTICIPATION PROCEDURE =====================
// CREATE EVENT `eligibilite_membre_verification`
// ON SCHEDULE EVERY 1 DAY
// STARTS '2022-06-20 00:40:00' ON COMPLETION PRESERVE ENABLE 
// DO
//    CALL global_participation_verification();


// =================== TRIGGER: AFTER PARTICIPATION =====================
// DELIMITER $$

// CREATE TRIGGER after_participation
// AFTER INSERT
// ON participantcollectes FOR EACH ROW
// BEGIN
// 	DECLARE nbpenalites int;
//     DECLARE type_participation VARCHAR(25);
    
//     SELECT penalites INTO @nbpenalites FROM membres
// 		WHERE id = NEW.membre_id;
        
// 	SELECT evenements.qualificatif INTO @type_participation
// 		FROM collectefonds
//       JOIN evenements ON evenements.id = collectefonds.evenement_id
// 		WHERE collectefonds.id = NEW.collectefond_id;
        
	
// 	IF nbpenalites = 0 THEN
	
// 		IF type_participation = 'Heureux' THEN  
// 			UPDATE membres SET membres.partcipation_heureuse = membres.partcipation_heureuse + 1
// 			WHERE membres.id = NEW.membre_id;
// 		ELSE
// 			UPDATE membres SET membres.partcipation_malheureuse = membres.partcipation_malheureuse + 1
// 			WHERE membres.id = NEW.membre_id;
// 		END IF;
		
	
// 	ELSEIF nbpenalites >= 1 THEN
    
// 		UPDATE membres SET membres.penalites = membres.penalites - 1
// 			WHERE membres.id = NEW.membre_id;
			
// 	END IF;
        
// END$$

// DELIMITER ;

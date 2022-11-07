/**
      Pb kouti online: 
       - penaltie increase itself ?? surveille 
       - modify participation echenc proc : (line 10-12) : WHERE collectefonds.statut = 'Passée' AND DATEDIFF(CURDATE(), collectefonds.date_lancement) = 3 ;
      
      ToDo:
       1- eligibiity criteria when launching an event
       2- eligibility criterai when add a participation
       3- display member account: add icon for number of loss in participation
      

      Action taken kouti online:
      ALTER TABLE membres
      ADD penalites int NOT NULL DEFAULT 0;
       - SET SQL_SAFE_UPDATES = 0;
       - UPDATE membres set statut = true, penalites = 0;
       - UPDATE epiz_30985687_yourcommune.membres set statut = true, penalites= 0 ;

*/


/**
1- eligibiity criteria when launching an event
      * statut = 1 
      * nbparticipation min % qualite de l'evt
        type = heureux => ancienete = 3 & participation successive = 6
        type = malheureux => ancienete = 2 & participation successive = 3

2- eligibility criterai when add a participation
      * statut = 1   
      * n'a pas deja participé   


*/
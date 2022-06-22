@extends('layouts.app',['title'=>'Liste des membres'])
@push('styles')
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto+Slab&display=swap" rel="stylesheet">
      <style>
            .company-up-info > img{
                  width: 90px;
                  height: 90px;
            }
            .bd-callout {
            padding: 1.25rem;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            border: 2px solid #eee;
            border-left-width: .25rem;
            border-radius: .25rem;
            }
            .bd-callout-default{
            border-left-color: #6c757d;
            border-left-width: 5px;
            }
            .bd-callout-defaulth4 {
            color: #6c757d;
            }
            
            .jumbotron h3{
                  font-family: 'Roboto Slab', serif;
            }
      </style> 
@endpush

@push('script')
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
@endpush

@section('content')

      {{-- <div class="container" style="">
            
      </div> --}}
      
      <div class="container" style="padding-top:105px;">
            <div class="jumbotron" style="text-align: center;padding:15px 60px;">
                  <h3 class="display-4">Règles d'utilisation du groupe</h3>
                  <ol class="breadcrumb" style="width:200px;margin:0 auto;">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Règles du groupe</li>
                  </ol>
                  {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
            </div>
           
           
            <div class="bd-callout bd-callout-default">
                  <h3>DES DISPOSITIONS PRATIQUES </h3>
                  <p>
                        L’association ‘’KOUTI VIVRE ENSEMBLE’’ exerce principalement dans le social en assistant ses membres lors des événements heureux et malheureux et en appuyant les actions de Développement. .
                  </p>
                  <h4>Article 5 : Evénement heureux </h4>
                  <p>
                        Dans cette rubrique, seul le mariage d’un membre solvable est pris en compte. <br>
                        Alinéa 1: Le membre bénéficiaire ne peut prétendre à une autre aide en cas d'un nouveau mariage. <br>
                        Alinéa 2: La date limite d'annonce du mariage par le membre est d’un mois au minimum avant le mariage. <br>
                        Alinéa 3 : Pour être éligible à cette assistance, un membre nouvellement inscrit doit justifier d’une période d’observation de trois (3) mois avec au moins six (6) contributions successives sans échec. <br>
                        Alinéa 4 : La remise de l'enveloppe se fait un jour avant le mariage ;<br>
                        Alinéa 5 : Tout échec met le membre sous une observation d’un mois de plus. 

                  </p>
                  <h4>Article 6 : Evénement malheureux </h4>
                  <p>
                        Il s’agit de : <br>
                        Alinéa 1 : Décès de :  <br>
                        	membre actif ;  <br>
                        	parent biologique,  <br>
                        	épouse/époux légitime (mariage civil/religieux/traditionnel) et <br>
                        	enfant au foyer (âge minimum du décès : 72 heures) <br>
                        Alinéa 2 : Maladie grave : il s’agit de : <br>
                        	Accident Vasculaire Cérébral AVC ; <br>
                        	Maladie qui nécessite une opération chirurgicale ; <br>
                        	Accident grave (fracture ouverte) ;<br>
                        	Cancer ;<br>
                        	Insuffisance rénale. <br>
                        Alinéa 3 : Un membre malade au moment de son inscription ne pourra prétendre à une assistance pour cette maladie.<br>
                        Alinéa 4 : Incendie grave au domicile principal d’un membre actif. <br>
                        Alinéa 5 : Pour être éligible à cette assistance, un membre nouvellement inscrit doit justifier d’une ancienneté de deux (2) mois avec au moins trois (3) contributions successives sans échec. <br>

                  </p>
                  <h4>Article 7 : Appui au développement </h4>
                  <p>
                        Alinéa 1 : Un taux de 1 à 10% du montant total (selon l’importance) sera prélevé sur le montant total à la fin de chaque quête pour la caisse de développement. <br>
                        Alinéa 2 : A la première semaine du mois d’août, une quête spéciale sera ouverte pour la circonstance et le montant collecté sera partagé aux comités de développement des trois villages au prorata des membres issus de chaque village. <br>
                        Alinéa 3 : Pour financer ses activités, KVE compte sur les efforts personnels (frais d’inscription et cotisations lors des événements) de ses adhérents, des appuis divers des âmes de bonne volonté ou d’organismes humanitaires. 
                  </p>
                  <h4>Article 8 : des taux de cotisation </h4>
                  <p>
                        Alinéa 1 : 500 FCFA  par membre pour un événement heureux (mariage) confer article 5 ; <br>
                        Alinéa 2 : 500FCFA par membre pour un événement malheureux (décès, maladies ou incendie) conformément à l’article 6. <br>
                        Alinéa 3 : 1000CFA pour la quête du développement. <br>
                        Alinéa 4 : chaque membre actif aura droit à une carte d’adhésion régulièrement établie par le bureau exécutif. 

                  </p>
                  <h4>Article 9 : de l’assistance proprement dite </h4>
                  <p>
                        Alinéa 1 : de l’annonce officielle et du constat d’un événement <br>
                              a)	A chaque événement, le membre concerné doit prendre toutes les dispositions pour informer le délégué ou un conseiller de sa zone par tout moyen. <br>
                              b)	Seuls les délégués sont habiletés à déclarer les faits d'un événement et d'en informer le bureau exécutif ainsi que les sages. Pour le constat un collège d’au moins deux personnes est constitué par le Président. <br>
                              c)	En cas d'empêchement d'un délégué, le membre peut saisir le président exécutif ou le président des sages et à cet effet, une commission est désignée soit par ce dernier ou par le président exécutif ou encore par le président du bureau des sages si les deux premiers sont indisponibles pour effectuer cette mission. <br>
                              d)	 les frais de la mission pour le constat et la remise de l’enveloppe sont supportés par la quête y relative après évaluation des coûts de déplacement et d’autres aléas y relatifs. <br> 
                                    La délégation qui effectuera les remises des enveloppes sera toujours conduite par un délégué assisté de deux membres maximum officiellement désignés à cet effet, et ces membres seront permutés à chaque descente.<br>
                       
                        Alinéa 2 : du lancement et de la durée de la quête <br>
                              a)	Après validation du rapport de constat avec preuves à l’appui, le président ordonne l’ouverture de la quête dans le forum des sages et le chargé de communication publie officiellement cette information dans les grands foras en précisant l’heure de lancement (minuit ce jour) et la date de fermeture.  <br>
                              b)	La durée de chaque quête est de trois (03) jours à compter de la date d’ouverture <br>
                              c)	 Après la fermeture de la quête, le bureau exécutif a un jour pour faire les états, dresser le rapport et procéder à la remise de l’enveloppe au bénéficiaire. <br>
                        
                        Alinéa 3 : Du montant de l’enveloppe d’aide
                              a)	Evénement heureux :<br>
                              b)	Evénement malheureux :<br>
                                    
                  </p>
            </div>

            <div class="bd-callout bd-callout-default">
                  <h3>DES DISPOSITIONS CONSERVATOIRES</h3>
                  <h4>Article 10 : des modalités   </h4>
                  <p>
                        Alinéa 1 : Les grands foras  seront spécialement ouverts lors des quêtes et fermés juste après la remise de l'enveloppe au bénéficiaire.  <br>
                        Alinéa 2 : La remise de l'enveloppe à chaque événement se fait contre une décharge du bénéficiaire avec CNI à l'appui, à défaut des présentes dispositions le bénéficiaire se fait assister de deux personnes identifiables à travers leur CNI. <br>
                        Alinéa 3 : Le membre a le choix de décider de la façon dont il veut recevoir son aide. <br>
                        Alinéa 4 : En cas d'un deuil impliquant plusieurs membres ou de plusieurs événements, le même montant de 1000frs est contribué et la somme collectée est divisés aux membres concernés selon les orientations du bureau exécutif. <br>
                        Alinéa 5 : si au cours d’une quête un autre événement survient, ce cas sera automatiquement pris en compte par les ressources issues de la quête en cours.<br>
                        Alinéa 6 : Seule la dernière liste validera la collecte de fonds en faveur d’un membre. 
                  </p>
                  <h4>Article 11 : des mesures disciplinaires </h4>
                  <p>
                        Alinéa 1 : On ne rembourse pas une quête déjà passée, et le membre défaillant verra deux (2) croix devant son nom sur la liste des adhérents. Pour être à nouveau éligible à une assistance, ce dernier devra contribuer pour deux événements successifs.  <br>
                        Alinéa 2 : Après deux échecs successifs par un membre n’ayant pas encore bénéficié d’une assistance, un avertissement lui est adressé par le Président via le délégué de sa zone  de rattachement. En cas de récidive, ce membre est convoqué au conseil de sages. S’il refuse d’obtempérer,  sa radiation est officiellement prononcée. <br>
                        Alinéa 3 : En cas d'échec à une quête par un membre ayant déjà bénéficié d’une assistance, ce dernier est passible d’une poursuite judiciaire au cas où un arrangement à l’amiable avec l’administration de l’association s’avère impossible. <br>
                        Alinéa 4 : En cas de fausse déclaration d’un événement, l’auteur est frappé d’une sanction qui lui impose la contribution à quatre (4) événements successifs avant d’être à nouveau éligible avec lettre d’avertissement à l’appui. S’il refuse d’obtempérer il sera immédiatement radié de l’association.<br>
                  </p>
            </div> 
      
            <div class="bd-callout bd-callout-default">
                 <p>
                      Pour plus d'informations, veuillez consulter le fichier complet du statut de 
                      l'association Kouti Vivre Ensemble. Ce fichier est téléchargeable <a href="">ici</a>
                  </p>  
            </div> 
      
      </div>

      {{-- footer --}}
      @include('layouts.footer')


@endsection

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Dataset1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //first user
        DB::unprepared("
            INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `url_photo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
            (2, 'KOUOTOU AKIM', 'KOUOTOU...@gmail.com', NULL, NULL, '\$2y\$10\$746EaQEr7Juk2A9wTl5x3.vj8NC8H0dj4DgEQ1QZLxFLLtsCz5whW', NULL, '2022-05-18 13:04:38', '2022-05-18 13:04:38'),
            (3, 'NSANGOU YOUSSOUF', 'NSANGOU...@gmail.com', NULL, NULL, '\$2y\$10\$7QAiLaF.HFUATfxm4ouS6eYa2obKZQ85IES83xt.e5VteHvI8OVkm', NULL, '2022-05-18 13:09:38', '2022-05-18 13:09:38'),
            (4, 'LIETMBOUO ISSOFA', 'LIETMBO...@gmail.com', NULL, NULL, '\$2y\$10\$HYuZOGS1JyYtkQZVf4zYeuRlpf/DLOktMdDMdztrhNjKAK1.O9ZZ2', NULL, '2022-05-18 13:18:57', '2022-05-18 13:18:57'),
            (5, 'NJIKAM MOHAMMED MOUSTAPHA', 'NJIKAM...@gmail.com', NULL, NULL, '\$2y\$10\$OWtPKDsW0Fp.1x8Ra.OOye0oKglnMufmBRWKES4dVPmj7/5E3Jwoy', NULL, '2022-05-18 13:46:17', '2022-05-18 13:46:17'),
            (6, 'POUAMOUN MOHAMMED CHERIF', 'POUAMOU...@gmail.com', NULL, NULL, '\$2y\$10\$HcgfuurStf6hW2aK88kLDeiDlSkfmq3s4XfYF3jrz6y8Gg6jZJ.2e', NULL, '2022-05-18 14:05:56', '2022-05-18 14:05:56'),
            (7, 'SANI MOHAMMED MOUNIR', 'SANI MO...@gmail.com', NULL, NULL, '\$2y\$10\$DhGx7JVKqfVWVd.983PG7.M/7V5/gDZBQI4BjZxh42gfCyuBFuYB6', NULL, '2022-05-18 14:32:15', '2022-05-18 14:32:15');
        ");


        //second role and permission user
        DB::unprepared("
            INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
            (1, 'App\\Models\\User', 2),
            (1, 'App\\Models\\User', 3),
            (1, 'App\\Models\\User', 4),
            (1, 'App\\Models\\User', 5),
            (1, 'App\\Models\\User', 6),
            (3, 'App\\Models\\User', 7);
        ");
        DB::unprepared("
            INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
            (2, 'App\\Models\\User', 2),
            (2, 'App\\Models\\User', 3),
            (2, 'App\\Models\\User', 4),
            (2, 'App\\Models\\User', 5),
            (2, 'App\\Models\\User', 6),
            (4, 'App\\Models\\User', 7);
        ");

        //third zone 
        DB::unprepared("
            INSERT INTO `zones` (`id`, `localisation`, `identifiant`, `created_at`, `updated_at`) VALUES
            (2, 'kouti 1', 'kt1', '2022-05-18 12:44:51', '2022-05-18 12:44:51'),
            (3, 'kouti 2', 'kt2', '2022-05-18 12:45:24', '2022-05-18 12:45:24'),
            (4, 'kouti 3', 'kt3', '2022-05-18 12:46:19', '2022-05-18 12:46:19'),
            (5, 'douala', 'dla', '2022-05-18 12:46:38', '2022-05-18 12:46:38'),
            (6, 'gabon', 'Gbn', '2022-05-18 12:47:08', '2022-05-18 12:47:08'),
            (7, 'guinée equatoriale', 'GNE', '2022-05-18 12:47:44', '2022-05-18 12:47:44');
        ");


        //last member user
        DB::unprepared("
        INSERT INTO `membres` (`id`, `user_id`, `zone_id`, `village_id`, `name`, `matricule`, `telephone`, `deleguate`, `statut`, `numero_cni`, `partcipation_heureuse`, `partcipation_malheureuse`, `url_photo`, `registered_date`, `created_at`, `updated_at`) VALUES
        (2, NULL, 3, 1, 'NJIMOGNI Mama', '21A0001kt2', '666777446', 0, 1, '2334555', 0, 0, '1652882022.png', '2021-03-01', '2022-05-18 12:53:42', '2022-05-18 12:53:42'),
        (3, NULL, 1, 1, 'NJI NJOYA Dairou', '21A0002YDE', '693614062', 0, 1, '122376654', 0, 0, '1652882186.png', '2021-03-01', '2022-05-18 12:56:26', '2022-05-18 12:56:26'),
        (4, NULL, 4, 3, 'NJI KAPELUOP', '21A0003kt3', '123456789', 0, 1, '111122233', 0, 0, '1652882558.png', '2021-03-01', '2022-05-18 13:02:38', '2022-05-18 13:02:38'),
        (5, 2, 5, 1, 'KOUOTOU AKIM', '21A0004dla', '670621154', 1, 1, '1233456678', 0, 0, '1652882678.png', '2021-03-01', '2022-05-18 13:04:38', '2022-05-18 13:04:38'),
        (6, NULL, 1, 1, 'NDAM YOUCHAHOU', '21A0005YDE', '699656367', 0, 1, '1290883', 0, 0, '1652882788.png', '2021-03-01', '2022-05-18 13:06:28', '2022-05-18 13:06:28'),
        (7, NULL, 1, 1, 'NSANGOU AROUNA', '21A0006YDE', '123768549', 0, 1, '12345', 0, 0, '1652882887.png', '2021-03-01', '2022-05-18 13:08:07', '2022-05-18 13:08:07'),
        (8, 3, 1, 1, 'NSANGOU YOUSSOUF', '21A0007YDE', '697275891', 1, 1, '1234587', 0, 0, '1652882977.png', '2021-03-01', '2022-05-18 13:09:37', '2022-05-18 13:09:38'),
        (9, NULL, 1, 1, 'NSANGOU KAINTOUMA', '21A0008YDE', '238764589', 0, 1, '234658569', 0, 0, '1652883067.png', '2021-03-01', '2022-05-18 13:11:07', '2022-05-18 13:11:07'),
        (10, NULL, 1, 1, 'MEFIRE DAHIROU', '21A0009YDE', '699491580', 0, 1, '234567', 0, 0, '1652883162.png', '2021-03-01', '2022-05-18 13:12:42', '2022-05-18 13:12:42'),
        (11, NULL, 3, 3, 'NGAPOUT AFASSETOU ESPE NJIEMESSA', '21A0010kt2', '657574712', 0, 1, '2354758987', 0, 0, '1652883267.png', '2021-03-01', '2022-05-18 13:14:27', '2022-05-18 13:14:27'),
        (12, NULL, 3, 3, 'NJIEMESSA MOUSTAPHA', '21A0011kt2', '690210145', 0, 1, '23465778', 0, 0, '1652883382.png', '2021-03-01', '2022-05-18 13:16:22', '2022-05-18 13:16:22'),
        (13, 4, 4, 1, 'LIETMBOUO ISSOFA', '21A0012kt3', '699622002', 1, 1, '988766544', 0, 0, '1652883536.png', '2021-03-01', '2022-05-18 13:18:56', '2022-05-18 13:18:57'),
        (14, 7, 1, 1, 'SANI MOHAMMED MOUNIR', '21A0013YDE', '690898283', 0, 1, '2345566879', 0, 0, '1652883656.png', '2021-03-01', '2022-05-18 13:20:56', '2022-05-18 14:32:15'),
        (15, NULL, 5, 1, 'MOTAPON AOUDOU', '21A0014dla', '897465324', 0, 1, '234567', 0, 0, '1652883751.png', '2021-03-01', '2022-05-18 13:22:31', '2022-05-18 13:22:31'),
        (16, NULL, 1, 2, 'MOUAFON YAYA', '21A0015YDE', '234578654', 0, 1, '233445', 0, 0, '1652883847.png', '2021-03-01', '2022-05-18 13:24:07', '2022-05-18 13:24:07'),
        (17, NULL, 1, 1, 'REIMBEKET ZENABOU', '21A0016YDE', '234876589', 0, 1, '2334456', 0, 0, '1652883955.png', '2021-03-01', '2022-05-18 13:25:55', '2022-05-18 13:25:55'),
        (18, NULL, 1, 1, 'NDINCHOUT SOUMI', '21A0017YDE', '098723456', 0, 1, '265431', 0, 0, '1652884043.png', '2021-03-01', '2022-05-18 13:27:23', '2022-05-18 13:27:23'),
        (19, NULL, 1, 1, 'NJUNGAM SANI SOULE', '21A0018YDE', '699913928', 0, 1, '2344556', 0, 0, '1652884117.png', '2021-03-01', '2022-05-18 13:28:37', '2022-05-18 13:28:37'),
        (20, NULL, 6, 1, 'SANI RACHIDETOU', '21A0019Gbn', '987231409', 0, 1, '23450987', 0, 0, '1652884208.png', '2021-03-01', '2022-05-18 13:30:08', '2022-05-18 13:30:08'),
        (21, NULL, 1, 3, 'NJIKAM IDRISSOU', '21A0020YDE', '655598104', 0, 1, '1234098', 0, 0, '1652884288.png', '2021-03-01', '2022-05-18 13:31:28', '2022-05-18 13:31:28'),
        (22, NULL, 3, 1, 'YIAGNIGNI OUSMANOU', '21A0021kt2', '987234561', 0, 1, '2334176', 0, 0, '1652884373.png', '2021-03-01', '2022-05-18 13:32:53', '2022-05-18 13:32:53'),
        (23, NULL, 5, 1, 'NGAMLIYA NJIKAM BALKISS', '21A0022dla', '908761234', 0, 1, '233458', 0, 0, '1652884497.png', '2021-03-01', '2022-05-18 13:34:57', '2022-05-18 13:34:57'),
        (24, NULL, 4, 1, 'MBOUOMBOUO MOHAMMED RAMADAN', '21A0023kt3', '298734098', 0, 1, '0987321', 0, 0, '1652884588.png', '2021-03-01', '2022-05-18 13:36:28', '2022-05-18 13:36:28'),
        (25, NULL, 1, 1, 'NJIFON AMZA', '21A0024YDE', '987612345', 0, 1, '263533', 0, 0, '1652884731.png', '2021-03-01', '2022-05-18 13:38:51', '2022-05-18 13:38:51'),
        (26, NULL, 5, 1, 'MVUH AOUDOU', '21A0025dla', '987234567', 0, 1, '346542', 0, 0, '1652884817.png', '2021-03-01', '2022-05-18 13:40:17', '2022-05-18 13:40:17'),
        (27, NULL, 1, 1, 'MOUNCHIKPOU ISMAEL', '21A0026YDE', '677877526', 0, 1, '236478', 0, 0, '1652884904.png', '2021-03-01', '2022-05-18 13:41:44', '2022-05-18 13:41:44'),
        (28, NULL, 1, 1, 'NSANGOU SAIDOU', '21A0027YDE', '987234576', 0, 1, '123765', 0, 0, '1652885004.png', '2021-03-01', '2022-05-18 13:43:24', '2022-05-18 13:43:24'),
        (29, NULL, 1, 1, 'TOUKOUPEN ABDOU JALIL', '21A0028YDE', '098734562', 0, 1, '18765543', 0, 0, '1652885096.png', '2021-03-01', '2022-05-18 13:44:56', '2022-05-18 13:44:56'),
        (30, 5, 6, 1, 'NJIKAM MOHAMMED MOUSTAPHA', '21A0029Gbn', '980762345', 1, 1, '7653421', 0, 0, '1652885177.png', '2021-03-01', '2022-05-18 13:46:17', '2022-05-18 13:46:18'),
        (31, NULL, 6, 1, 'NGOUNGOURE SOUMIATOU', '21A0030Gbn', '908712345', 0, 1, '9812345', 0, 0, '1652885263.png', '2021-03-01', '2022-05-18 13:47:43', '2022-05-18 13:47:43'),
        (32, NULL, 6, 1, 'MOUNTAPBEME NJIKAM MOUSSA', '21A0031Gbn', '987623456', 0, 1, '346521', 0, 0, '1652885343.png', '2021-03-01', '2022-05-18 13:49:03', '2022-05-18 13:49:03'),
        (33, NULL, 6, 1, 'FOUPAPOUOGNIGNI AFSA', '21A0032Gbn', '698765234', 0, 1, '1887654', 0, 0, '1652885439.png', '2021-03-01', '2022-05-18 13:50:39', '2022-05-18 13:50:39'),
        (34, NULL, 6, 1, 'NDAM KOUOTOU MOHAMMED NOURDIH', '21A0033Gbn', '678987236', 0, 1, '2334586', 0, 0, '1652885533.png', '2021-03-01', '2022-05-18 13:52:13', '2022-05-18 13:52:13'),
        (35, NULL, 6, 1, 'NDAM NJIKAM MOHAMMED ALI', '21A0034Gbn', '309876542', 0, 1, '3384774', 0, 0, '1652885625.png', '2021-03-01', '2022-05-18 13:53:45', '2022-05-18 13:53:45'),
        (36, NULL, 6, 1, 'KOUMCHENGAM FADIMATOU', '21A0035Gbn', '987625436', 0, 1, '219876', 0, 0, '1652885714.png', '2021-03-01', '2022-05-18 13:55:14', '2022-05-18 13:55:14'),
        (37, NULL, 6, 1, 'MBOUAKAM MAIMOUNA', '21A0036Gbn', '908721345', 0, 1, '129877', 0, 0, '1652885787.png', '2021-03-01', '2022-05-18 13:56:27', '2022-05-18 13:56:27'),
        (38, NULL, 6, 1, 'MANDOU SAFIATOU', '21A0037Gbn', '698763542', 0, 1, '233456', 0, 0, '1652885861.png', '2021-03-01', '2022-05-18 13:57:41', '2022-05-18 13:57:41'),
        (39, NULL, 6, 1, 'MOUNTAPBEME KOUOTOU ABDEL AZIZ', '21A0038Gbn', '698763542', 0, 1, '2346588', 0, 0, '1652885945.png', '2021-03-01', '2022-05-18 13:59:05', '2022-05-18 13:59:05'),
        (40, NULL, 6, 1, 'MOUNCHIKPOU NJIKAM INOUSSA', '21A0039Gbn', '698763423', 0, 1, '1234988', 0, 0, '1652886042.png', '2021-03-01', '2022-05-18 14:00:42', '2022-05-18 14:00:42'),
        (41, NULL, 6, 1, 'NJOULIAMUMCHE ZENABOU', '21A0040Gbn', '698709342', 0, 1, '3490887', 0, 0, '1652886124.png', '2021-03-01', '2022-05-18 14:02:04', '2022-05-18 14:02:04'),
        (42, NULL, 6, 1, 'SAMBA JAMILA', '21A0041Gbn', '698076344', 0, 1, '3098721', 0, 0, '1652886192.png', '2021-03-01', '2022-05-18 14:03:12', '2022-05-18 14:03:12'),
        (43, NULL, 6, 1, 'NTIECHE KASSIMOU', '21A0042Gbn', '690872345', 0, 1, '57635431', 0, 0, '1652886278.png', '2021-03-01', '2022-05-18 14:04:38', '2022-05-18 14:04:38'),
        (44, 6, 7, 1, 'POUAMOUN MOHAMMED CHERIF', '21A0043GNE', '690883245', 1, 1, '222334455', 0, 0, '1652886355.png', '2021-03-01', '2022-05-18 14:05:55', '2022-05-18 14:05:56'),
        (45, NULL, 7, 1, 'PIPTOUM NDAM SOULEMAN', '21A0044GNE', '690098344', 0, 1, '233453699', 0, 0, '1652886451.png', '2021-03-01', '2022-05-18 14:07:31', '2022-05-18 14:07:31'),
        (46, NULL, 7, 1, 'MOUCHILI INOUSSA', '21A0045GNE', '477584678', 0, 1, '34457488', 0, 0, '1652886614.png', '2021-03-01', '2022-05-18 14:10:14', '2022-05-18 14:10:14'),
        (47, NULL, 7, 2, 'NGOUTANE NCHOUWAT RAISSA', '21A0046GNE', '988776342', 0, 1, '3456783', 0, 0, '1652886702.png', '2021-03-01', '2022-05-18 14:11:42', '2022-05-18 14:11:42'),
        (48, NULL, 2, 1, 'MBAKOUOP AMINETOU', '21A0047kt1', '908736278', 0, 1, '239871665', 0, 0, '1652886791.png', '2021-03-01', '2022-05-18 14:13:11', '2022-05-18 14:13:11'),
        (49, NULL, 7, 1, 'NTIEJEM MOUNDEN MOHAMMED', '21A0048GNE', '698734421', 0, 1, '549871434', 0, 0, '1652886879.png', '2021-03-01', '2022-05-18 14:14:39', '2022-05-18 14:14:39'),
        (50, NULL, 7, 1, 'NTIEJEM MOUNDEN MOHAMMED', '21A0049GNE', '698734421', 0, 1, '549871434', 0, 0, '1652886881.png', '2021-03-01', '2022-05-18 14:14:41', '2022-05-18 14:14:41'),
        (51, NULL, 1, 1, 'YOUMO KOUOTOU ISMAILA', '21A0050YDE', '399876527', 0, 1, '2334566', 0, 0, '1652886947.png', '2021-03-01', '2022-05-18 14:15:47', '2022-05-18 14:15:47'),
        (52, NULL, 5, 1, 'MANCHUT ABOUBAKAR SIDIK', '21A0051dla', '699837828', 0, 1, '5687231', 0, 0, '1652887018.png', '2021-03-01', '2022-05-18 14:16:58', '2022-05-18 14:16:58');        
        ");
    }
}
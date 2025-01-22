<?php


try {

              //Connect to database 
              require_once 'include/database.php';
   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Script SQL de la migration
    $sql = "
    DROP TABLE IF EXISTS `utilisateur`;
    CREATE TABLE IF NOT EXISTS `utilisateur` (
      `id` int NOT NULL AUTO_INCREMENT,
      `login` varchar(150) NOT NULL,
      `password` varchar(100) NOT NULL,
      `date_creation` date NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

    INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`) VALUES
    (13, 'anass', '16548858', '2024-12-05'),
    (12, '11', '11', '2024-12-04'),
    (11, 'changre ', 'change ', '2024-12-04');
    ";

    // Exécution de la migration
    $pdo->exec($sql);
    echo "La migration de la table `utilisateur` a été exécutée avec succès.";

} catch (PDOException $e) {
    // En cas d'erreur
    echo "Erreur lors de la migration : " . $e->getMessage();
}
?>
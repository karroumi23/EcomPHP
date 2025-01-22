<?php


try {
          //Connect to database 
          require_once 'include/database.php';
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Script SQL de la migration
    $sql = "
    DROP TABLE IF EXISTS `produit`;
    CREATE TABLE IF NOT EXISTS `produit` (
      `id` int NOT NULL AUTO_INCREMENT,
      `libelle` varchar(100) NOT NULL,
      `prix` decimal(10,0) NOT NULL,
      `discount` int NOT NULL,
      `id_categorie` int NOT NULL,
      `date_creation` date NOT NULL,
      `description` varchar(255) NOT NULL,
      `image` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    );

    INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_creation`, `description`, `image`) VALUES
    (1, 'tomate', 3, 0, 1, '2025-01-21', 'origine marocaine', '678f7da099021678a76a31d990Tomatoes.jpg'),
    (2, 'pomme de terre', 6, 0, 1, '2025-01-21', 'Origine marocaine', '678f7dd3cbf73678a781e90bcfpomme de terre.jpg'),
    (3, 'fromage (emmental)', 109, 10, 4, '2025-01-21', 'Origine France', '678fa139cf60f678ab47c94097fromage (emmental).png'),
    (4, 'framboise', 3, 0, 3, '2025-01-21', 'la pomme origin marocaine', '678fb45a1ccb86789038e30968images.jpg'),
    (5, 'oignons', 4, 0, 1, '2025-01-21', '...', '678fb688982f5678a7652e5af8oignons.jpg');
    ";

    // Exécution de la migration
    $pdo->exec($sql);
    echo "La migration de la table `produit` a été exécutée avec succès.";

} catch (PDOException $e) {
    // En cas d'erreur
    echo "Erreur lors de la migration : " . $e->getMessage();
}
?>
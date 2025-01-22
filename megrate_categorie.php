<?php


try {
          //Connect to database 
          require_once 'include/database.php';
          
      // le mode de gestion des erreurs 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Script SQL de la migration
    $sql = "
    DROP TABLE IF EXISTS `categorie`;
    CREATE TABLE IF NOT EXISTS `categorie` (
      `id` int NOT NULL AUTO_INCREMENT,
      `libelle` varchar(150) NOT NULL,
      `description` varchar(255) NOT NULL,
      `icone` varchar(255) NOT NULL,
      `date_creation` date NOT NULL,
      PRIMARY KEY (`id`)
    );
    
    INSERT INTO `categorie` (`id`, `libelle`, `description`, `icone`, `date_creation`) VALUES
    (1, 'légumes', 'catégorie légumes', 'fa-solid fa-carrot', '0000-00-00'),
    (3, 'fruits', 'catégorie fruits', 'fa-solid fa-apple-whole', '2025-01-21'),
    (4, 'Produits laitiers', 'categorie Produits laitiers ', 'fa-solid fa-cow', '2025-01-21');
    ";

    // Exécution de la migration
    $pdo->exec($sql);
    echo "La migration a été exécutée avec succès.";

} catch (PDOException $e) {
    // En cas d'erreur
    echo "Erreur lors de la migration : " . $e->getMessage();
}
?>
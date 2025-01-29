<?php

try {
    // Connect to database
    require_once 'include/database.php';
    
    // Set the error mode to throw exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL Script for migration
    $sql = "
    DROP TABLE IF EXISTS `categorie`;
    CREATE TABLE IF NOT EXISTS `categorie` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `libelle` VARCHAR(150) NOT NULL,
      `description` VARCHAR(255) NOT NULL,
      `icone` VARCHAR(255) NOT NULL,
      `date_creation` DATE NOT NULL,
      PRIMARY KEY (`id`)
    );
    
    INSERT INTO `categorie` (`id`, `libelle`, `description`, `icone`, `date_creation`) VALUES
    (1, 'légumes', 'catégorie légumes', 'fa-solid fa-carrot', '2025-01-01'),
    (3, 'fruits', 'catégorie fruits', 'fa-solid fa-apple-whole', '2025-01-21'),
    (4, 'Produits laitiers', 'categorie Produits laitiers', 'fa-solid fa-cow', '2025-01-21');
    ";

    // Execute the SQL migration
    $pdo->exec($sql);
    echo "La migration a été exécutée avec succès.";

} catch (PDOException $e) {
    // Handle migration errors
    echo "Erreur lors de la migration : " . $e->getMessage();
}
?>

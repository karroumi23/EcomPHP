<?php

try {
    // Connect to database 
    require_once 'include/database.php';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Disable foreign key checks temporarily
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");

    // Drop the table if it exists
    $sql = "
    DROP TABLE IF EXISTS `ligne_commande`;

    CREATE TABLE IF NOT EXISTS `ligne_commande` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `id_produit` INT NOT NULL,
      `id_commande` INT NOT NULL,
      `prix` DECIMAL(10,2) NOT NULL,
      `quantite` INT NOT NULL,
      `total` DECIMAL(10,2) GENERATED ALWAYS AS (prix * quantite) STORED,
      PRIMARY KEY (`id`),
      FOREIGN KEY (`id_produit`) REFERENCES `produit`(`id`) ON DELETE CASCADE,
      FOREIGN KEY (`id_commande`) REFERENCES `commande`(`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB;
";


    // Execute the migration
    $pdo->exec($sql);

    // Re-enable foreign key checks
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");

    echo "✅ Migration of the `ligne_commande` table completed successfully.";

} catch (PDOException $e) {
    // Handle errors
    echo "❌ Error during migration: " . $e->getMessage();
}

?>

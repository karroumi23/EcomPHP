<?php

try {
    // Connect to database
    require_once 'include/database.php';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the `commande` table
    $sql = "
    CREATE TABLE IF NOT EXISTS `commande` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `id_client` INT NOT NULL,
      `total` DECIMAL(10, 2) NOT NULL,
      `date_creation` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB;
    ";

    // Execute the SQL statement
    $pdo->exec($sql);

    echo "✅ `commande` table created successfully.";

} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}

?>

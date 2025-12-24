<?php
// includes/functions.php

/**
 * Load content from the JSON file.
 *
 * @return array The decoded JSON content.
 */
function get_content() {
    $json_data = file_get_contents(__DIR__ . '/../data/content.json');
    return json_decode($json_data, true);
}

/**
 * Get the SQLite database connection.
 *
 * @return PDO
 */
function get_db_connection() {
    $db_path = __DIR__ . '/../data/database.sqlite';
    try {
        $pdo = new PDO('sqlite:' . $db_path);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

/**
 * Save a contact message to the database.
 *
 * @param string $name
 * @param string $email
 * @param string $message
 * @return bool True on success, False on failure.
 */
function save_message($name, $email, $message) {
    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        return $stmt->execute();
    } catch (PDOException $e) {
        // Log error ideally
        return false;
    }
}
?>

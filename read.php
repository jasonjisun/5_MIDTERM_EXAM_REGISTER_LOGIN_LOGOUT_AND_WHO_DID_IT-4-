<?php
function getAllSoftwareEngineers($pdo) {
    $stmt = $pdo->query("SELECT * FROM software_engineers");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

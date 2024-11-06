<?php
function deleteSoftwareEngineer($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM software_engineers WHERE id = :id");
    $stmt->execute(['id' => $id]);
}
?>

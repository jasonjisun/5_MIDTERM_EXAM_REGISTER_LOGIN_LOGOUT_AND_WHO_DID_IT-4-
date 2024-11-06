<?php
function updateSoftwareEngineer($pdo, $id, $first_name, $last_name, $email, $phone_number, $specialization, $years_of_experience, $salary_expectation, $updated_by) {
    $stmt = $pdo->prepare("UPDATE software_engineers SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number, specialization = :specialization, years_of_experience = :years_of_experience, salary_expectation = :salary_expectation, updated_by = :updated_by WHERE id = :id");
    $stmt->execute([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone_number' => $phone_number,
        'specialization' => $specialization,
        'years_of_experience' => $years_of_experience,
        'salary_expectation' => $salary_expectation,
        'updated_by' => $updated_by,
        'id' => $id
    ]);
}
?>

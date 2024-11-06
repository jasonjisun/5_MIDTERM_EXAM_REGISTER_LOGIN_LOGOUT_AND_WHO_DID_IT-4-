<?php
function createSoftwareEngineer($pdo, $first_name, $last_name, $email, $phone_number, $specialization, $years_of_experience, $salary_expectation, $added_by) {
    $stmt = $pdo->prepare("INSERT INTO software_engineers (first_name, last_name, email, phone_number, specialization, years_of_experience, salary_expectation, added_by) VALUES (:first_name, :last_name, :email, :phone_number, :specialization, :years_of_experience, :salary_expectation, :added_by)");
    $stmt->execute([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone_number' => $phone_number,
        'specialization' => $specialization,
        'years_of_experience' => $years_of_experience,
        'salary_expectation' => $salary_expectation,
        'added_by' => $added_by
    ]);
}
?>

<?php
// Assuming your MySQL connection details
$servername = "localhost";
$username = "root";
$password = "Panwar24";
$dbname = "stayfit";

// Create connection
$conn = new mysqli($servername, $username ,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $age = (int) $_POST['age'];
    $fitness_goal = $conn->real_escape_string($_POST['fitness_goal']);
    $fitness_level = $conn->real_escape_string($_POST['fitness_level']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $height = $conn->real_escape_string($_POST['height']);
    $weight = $conn->real_escape_string($_POST['weight']);
    $workout_frequency = (int) $_POST['workout_frequency'];
    $workout_location = $conn->real_escape_string($_POST['workout_location']);
    $workout_mode = $conn->real_escape_string($_POST['workout_mode']);

    // Insert data into MySQL table
    $sql = "INSERT INTO profile (email, password, age, fitness_goal, fitness_level, gender, height, weight, workout_frequency, workout_location, workout_mode)
    VALUES ('$email', '$password', $age, '$fitness_goal', '$fitness_level', '$gender', '$height', '$weight', $workout_frequency, '$workout_location', '$workout_mode')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
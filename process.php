<?php
require './model/HumanBeing.php';
// require './model/BmiIndexer.php';
// require './model/HealthAnalyzer.php';

session_start();

// Ensure both height and weight are provided
if (isset($_POST['height']) && isset($_POST['weight'])) {
    // Retrieve height and weight from form submission
    $height = $_POST['height'] ?? '';
    $weight = $_POST['weight'] ?? '';
    
    $hb = new HumanBeing();
    $hb->setHeight($height);
    $hb->setWeight($weight);
    $hb->calculateBMI();

    $bmi = $hb->getBmi();
    $result = $hb->analyzeBmi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Results</title>
</head>
<body>
    <h1>BMI Results</h1>
    <p>BMI: <?php echo $bmi; ?></p>
    <p>Result: <?php echo $result; ?></p>
    <a href="index.html">Go back to BMI Calculator</a>
</body>
</html>

<?php
} else {
    echo "<p>Please provide both height and weight.</p>";
}
?>

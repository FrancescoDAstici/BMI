<?php
// Ricezione dati dalla pagina precedente
$nome = $_POST['nome'];
$peso = $_POST['peso'];
$altezza_cm = $_POST['altezza'];

// Calcolo del BMI: peso in kg / (altezza in metri)^2
$altezza_m = $altezza_cm / 100;
$bmi = 0;

if ($altezza_m > 0) {
    $bmi = $peso / ($altezza_m * $altezza_m);
}

// Determinazione classe e nome della fascia in base alle 4 condizioni
$classe_card = "";
$testo_fascia = "";

if ($bmi < 18.5) {
    $classe_card = "sottopeso";
    $testo_fascia = "SOTTOPESO";
} elseif ($bmi >= 18.5 && $bmi <= 24.99) {
    $classe_card = "normopeso";
    $testo_fascia = "NORMOPESO";
} elseif ($bmi >= 25 && $bmi <= 29.99) {
    $classe_card = "sovrappeso";
    $testo_fascia = "SOVRAPPESO";
} else {
    $classe_card = "obesita";
    $testo_fascia = "OBESITÀ";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo BMI</title>
    <link rel="stylesheet" href="foglioDiStileBMI.css">
</head>
<body>

    <div class="container">
        <h1>Il tuo BMI</h1>

        <div class="card-box">
            <!-- La card cambia colore in base alla classe dinamica inserita con il PHP -->
            <div class="card <?php echo $classe_card; ?>">
                <div class="user-name"><?php echo $nome; ?></div>
                <div class="user-info">Peso <?php echo $peso; ?> kg · Altezza <?php echo $altezza_cm; ?> cm</div>
                <div class="bmi-value"><?php echo number_format($bmi,2) ?></div>
                <div class="fascia"><?php echo $testo_fascia; ?></div>
            </div>

            <div style="text-align: center; margin-top: 12px;">
                <a href="formBMI.html" class="link-ritorno">Calcola di nuovo</a>
            </div>
        </div>
    </div>

</body>
</html>

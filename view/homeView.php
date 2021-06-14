<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/card.css">
    <link rel="stylesheet" href="style/home.css">

    <title>Home</title>
</head>
<body>
    <header>
        header
    </header>

    <main>
        <section id="blank-section">
            <header>
                <h1>BIJOUR</h1>
                <h2>Bijour bih=jour</h2>
            </header>


        </section>
        <section id="main-section">
            <header>
                <h2>
                    Voir nos logements
                </h2>
            </header>
            <?php
                include "filter.php";

                include "cardsView.php";
            ?>
        </section>


        
    </main>

<footer>
    footer
</footer>
</body>
</html>
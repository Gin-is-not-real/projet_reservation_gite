<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/card.css">
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/interface.css">

    <link rel="stylesheet" href="style/media_queries.css">

    <title>Home</title>
</head>
<body>
    <header>
        <a href="index.php?action=to-admin">Admin</a>
    </header>

    <main>
        <section id="title-section">
            <header>
                <h1>Bienvenue chez Nina et Alice</h1>
                <h2>Trouver la location de vos rêves !</h2>
            </header>
        </section>
        
        <section id="main-section">
            <header>
                <h2>
                    Voir nos gîtes
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

    <script type="text/javascript" src="scripts/ajax.js"></script>
    <script type="text/javascript" src="scripts/interface.js"></script>

</body>
</html>
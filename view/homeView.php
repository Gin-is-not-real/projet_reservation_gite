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
    <link rel="stylesheet" href="style/datePicker.css">
    <!-- <link rel="stylesheet" href="style/media_queries.css"> -->

    <title>Home</title>
</head>

<body>
    <header>
        <div class="a-adminer" id="go-admin">
            <a href="index.php?action=to-admin">Admin</a>
        </div>
    </header>

    <main>
        <section id="title-section">
            <header>
                <h1>Gites Casa Tranquilla</h1>
                <h2>Trouver la location de vos rêves !</h2>
            </header>
        </section>
        
        <section id="main-section">
            <header>
                <a id="ancre-cardsView" href="#main-section">
                    <h2> Chercher un Gîte</h2>
                </a>
            </header>


            <?php
                include "filter.php";
                include "cardsView.php";
            ?>
            
        </section>
        
    </main>

    <footer class="footer">
    <p class="footer-suiveznous"> Suivez-nous! </p>
    <div class="lien">
    
            <a href="https://github.com/Alice58000" target="_blank"><img src="static/icons/github.png" alt="git" width="48px"></a>

            <a href="https://github.com/Gin-is-not-real" target="_blank"><img src="static/icons/github.png" alt="git" width="48px"></a>
    </div>
    <div class="lien2">

            <a href="https://www.linkedin.com/in/alice-finot/" target="_blank"><img src="static/icons/logo-linkedin.png" alt="link"
                    width="48px"></a>
  

            <a href="https://www.linkedin.com/in/nina-pariat-6b554920a/" target="_blank"><img src="static/icons/logo-linkedin.png" alt="link"
                    width="48px"></a>
    </div>

    <small> &copy; Copyright 2021 </small> 

    </footer>

    <script type="text/javascript" src="scripts/GnrDatePicker.js"></script>
    <script type="text/javascript" src="scripts/interface.js"></script>

</body>
</html>
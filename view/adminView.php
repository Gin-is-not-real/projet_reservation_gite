<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/card.css">
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="style/media_queries.css">
</head>

<body>
    <!-- <header>
        <h3>Admin Interface</h3>
    </header> -->
    <main>
        <header>
            <h1>Admin Interface</h1>
        </header>

        <section id="admin-container">
            <?php 
                include 'voidForm.php'; 
            
                include 'adminFormsView.php';
            ?>


        </section>
    </main>

    <script src="scripts/interface.js"></script>
</body>
</html>
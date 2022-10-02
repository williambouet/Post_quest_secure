<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thanks</title>
</head>

<body>
    <?php

    $errors = [];

    if (!filter_var('bob@example.com', FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Un problème a été rencontré avec le mail";
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // nettoyage et validation des données soumises via le formulaire 
        if (!isset($_POST['user_firstname']) || trim($_POST['user_firstname']) === '')
            $errors[] = "Le prénom est obligatoire";
        if (!isset($_POST['user_lastname']) || trim($_POST['user_lastname']) === '')
            $errors[] = "Le prénom est obligatoire";
        if (!isset($_POST['user_object']) || trim($_POST['user_object']) === '')
            $errors[] = "L'objet est obligatoire";
        if (!isset($_POST['user_email']) || trim($_POST['user_email']) === '')
            $errors[] = "Le mail est obligatoire";
        if (!isset($_POST['user_phone']) || trim($_POST['user_phone']) === '')
            $errors[] = "Le téléphone est obligatoire";
        if (!isset($_POST['user_message']) || trim($_POST['user_message']) === '')
            $errors[] = "Le message est obligatoire";
        if (empty($errors)) {
            // traitement du formulaire
    ?>
            <h1>Merci <?php echo $_POST['user_firstname'] . ' ' . $_POST['user_lastname']; ?> de nous avoir contacté.</h1>
            <p>Vous souhaitez savoir <?php echo $_POST['user_object']; ?></p>
            <p>Un de nos conseiller vous contactera à l’adresse <?php echo $_POST['user_email']; ?></p>
            <p>ou par téléphone au <?php echo $_POST['user_phone']; ?> dans les plus brefs délais pour traiter votre demande.</p>
            <p>Pour rappel, voici votre message : <?php echo $_POST['user_message']; ?></p>
            <?php
        } else {
            // Affichage des éventuelles erreurs 
            if (count($errors) > 0) : ?>
                <div class="border border-danger rounded p-3 m-5 bg-danger">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
    <?php endif;
        }
    }
    ?>

</body>

</html>
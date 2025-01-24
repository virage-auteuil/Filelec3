<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Upload d'Image</title>
</head>
<body>
    <h1>Formulaire d'Upload d'Image</h1>
    
    <!-- Formulaire d'upload -->
    <form action="votre_script_php.php" method="POST" enctype="multipart/form-data">
        <label for="image_file">Choisissez une image à télécharger :</label>
        <br>
        <input type="file" name="image_file" id="image_file" required>
        <br><br>
        <button type="submit">Envoyer l'image</button>
    </form>

    <?php
        // Vérification des messages dans l'URL (ex: succès, erreurs)
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
            if ($message == 'success') {
                echo "<p>Image téléchargée avec succès !</p>";
            } elseif ($message == 'erreur_fichier_non_trouve') {
                echo "<p>Erreur : Aucun fichier n'a été sélectionné.</p>";
            } elseif ($message == 'erreur_extension_non_autorisee') {
                echo "<p>Erreur : L'extension du fichier n'est pas autorisée.</p>";
            } elseif ($message == 'erreur_creation_repertoire') {
                echo "<p>Erreur : Impossible de créer le répertoire pour l'image.</p>";
            } elseif ($message == 'erreur_deplacement_fichier') {
                echo "<p>Erreur : Impossible de déplacer le fichier téléchargé.</p>";
            }
        }
    ?>
</body>
</html>

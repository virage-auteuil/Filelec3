<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Profil</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="profile-container">
        <h1>Mon Profil</h1>

        <!-- Section de la photo de profil -->
        <div class="profile-picture-section">
            <img src="img/profil_logo.png" alt="Photo de profil" class="profile-picture">
            <form action="upload_photo.php" method="POST" enctype="multipart/form-data">
                <label for="profile-picture">Changer de photo</label>
                <input type="file" name="profile-picture" id="profile-picture" accept="image/*">
                <button type="submit">Mettre à jour</button>
            </form>
        </div>

        <!-- Section des informations utilisateur -->
        <form action="update_profile.php" method="POST" class="profile-form">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="tel" name="telephone" id="telephone" placeholder="Votre téléphone" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse de domicile :</label>
                <input type="text" name="adresse" id="adresse" placeholder="Votre adresse" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" placeholder="Nouveau mot de passe" required>
            </div>

            <button type="submit" class="save-button">Enregistrer les modifications</button>
        </form>

        <!-- Boutons de déconnexion et suppression -->
        <div class="action-buttons">
            <a href="logout.php" class="logout-button">Se déconnecter</a>
            <a href="delete_account.php" class="delete-button">Supprimer mon compte</a>
        </div>
    </div>
</body>
</html>

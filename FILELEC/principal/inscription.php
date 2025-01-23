<link rel="stylesheet" href="assets/css/inscription.css">
<?php

require_once "vue/insert/vue_insert_inscription.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifie si un fichier a été soumis
            if (empty($_FILES["image_file"]["tmp_name"])) {
                header("Location: index.php?message=erreur_fichier_non_trouve");
                exit;
            }

            // Gestion du fichier : extraction du nom et extension
            $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);
            $file_extension = strtolower(pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION));

            // Vérification de l'extension de fichier autorisée
            $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($file_extension, $allowed_extensions)) {
                header("Location: index.php?message=erreur_extension_non_autorisee");
                exit;
            }

            // Génère un nouveau nom unique pour l'image
            $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;

            // Chemin où l'image sera stockée
            $upload_directory = "img/image_navbar/profil_client";
            $upload_path = $upload_directory . $new_image_name;

            // Vérifie que le répertoire d'upload existe, sinon le crée
            if (!is_dir($upload_directory)) {
                if (!mkdir($upload_directory, 0755, true)) {
                    header("Location: index.php?message=erreur_creation_repertoire");
                    exit;
                }
            }

            // Déplace le fichier uploadé vers le dossier défini
            if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $upload_path)) {
                // Succès : redirection ou autre logique
                header("Location: index.php?message=success&image=" . urlencode($new_image_name));
            } else {
                // Erreur lors du déplacement du fichier
                header("Location: index.php?message=erreur_deplacement_fichier");
            }
            exit;
        }

require_once("vue/select/vue_inscription.php");
?>
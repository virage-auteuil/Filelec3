<?php
// Inclure le fichier PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous que PHPMailer est installé

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $code_postal = htmlspecialchars($_POST['code_postal']);
    $ville = htmlspecialchars($_POST['ville']);
    $message = htmlspecialchars($_POST['message']);

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Serveur SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'ton-email@gmail.com'; // Remplace par ton adresse Gmail
        $mail->Password = 'ton-mot-de-passe-app'; // Utilise le mot de passe d'application de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Définir l'expéditeur et le destinataire
        $mail->setFrom('ton-email@gmail.com', 'Nom de l\'expéditeur');
        $mail->addAddress('destinataire@example.com', 'Nom du destinataire'); // Adresse de réception

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de contact';
        $mail->Body    = "Nom: $nom<br>Prénom: $prenom<br>Email: $email<br>Téléphone: $telephone<br>Adresse: $adresse<br>Code Postal: $code_postal<br>Ville: $ville<br>Message:<br>$message";

        // Envoi de l'email
        $mail->send();

        // Réponse pour l'utilisateur
        echo "<script>
            Swal.fire({
                title: 'Message envoyé!',
                text: 'Nous avons bien reçu votre message.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => { window.location.href = 'contact.php'; });
        </script>";
    } catch (Exception $e) {
        // En cas d'erreur
        echo "<script>
            Swal.fire({
                title: 'Erreur!',
                text: 'Une erreur s\'est produite lors de l\'envoi du message.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}
?>

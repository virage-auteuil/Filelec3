<?php
require_once("modele/modele.contact.php");

class Controleur {
    private $unContactModele; // instance of the Modele class

    public function __construct() {
        $this->unContactModele = new Modele();
    }

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $code_postal = htmlspecialchars($_POST['code_postal']);
            $ville = htmlspecialchars($_POST['ville']);
            $message = htmlspecialchars($_POST['message']);

            // Save to DB
            if ($this->unContactModele->insertContact($nom, $prenom, $email, $telephone, $adresse, $code_postal, $ville, $message)) {
                // Send confirmation email
                $to = "filelec98@gmail.com";
                $subject = "Nouveau message de contact";
                $body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\nTéléphone: $telephone\nAdresse: $adresse\nCode Postal: $code_postal\nVille: $ville\nMessage:\n$message";
                $headers = "From: $email\r\nReply-To: $email";

                if (mail($to, $subject, $body, $headers)) {
                    echo "<script>
                        Swal.fire({
                            title: 'Message envoyé!',
                            text: 'Nous avons bien reçu votre message.',
                            icon: 'success'
                        }).then(() => { window.location.href = 'contact.php'; });
                    </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            title: 'Erreur!',
                            text: 'Une erreur s\'est produite lors de l\'envoi du message.',
                            icon: 'error'
                        });
                    </script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                        title: 'Erreur!',
                        text: 'Une erreur s\'est produite lors de l\'enregistrement des données.',
                        icon: 'error'
                    });
                </script>";
            }
        }
    }
}
?>

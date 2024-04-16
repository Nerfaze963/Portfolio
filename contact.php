<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Adresse e-mail de réception
    $to = "natsu.gadjadhar@gmail.com";

    // Entête du mail
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    
    // Contenu du mail
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Sujet: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    // Envoi du mail
    mail($to, $subject, $email_content, $headers);
    
    // Réponse au client
    echo "Votre message a bien été envoyé. Merci!";
} else {
    // Si la méthode de requête n'est pas POST, renvoyer une erreur
    http_response_code(403);
    echo "Une erreur s'est produite lors de l'envoi du formulaire. Veuillez réessayer.";
}
?>

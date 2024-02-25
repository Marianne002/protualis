<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['prenom']);
    $surname = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);


    if (empty($name) || empty($surname) || empty($email) || empty($subject) || empty($message)) {

        echo "Veuillez remplir tous les champs obligatoires.";
        exit();
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        echo "Veuillez entrer une adresse e-mail valide.";
        exit();
    }


    $to = "agence.crealize@gmail.com";
    $subject = "Mail From Protualis";
    $txt = "Name: $name $surname \r\nEmail: $email \r\nSubject: $subject \r\nMessage: $message";
    $headers = "From: noreply@https://marianne002.github.io/protualis/";

    // Send the email
    if (mail($to, $subject, $txt, $headers)) {
        //header("Location: thank_you.html");
        echo'
    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Protualis - Contact</title>
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
    
        <body class="font-sans bg-gray-100">
            <!-- Header -->
            <header class="sticky top-0 z-10">
                <!-- Sticky Navbar -->
                <nav class="bg-green-800 shadow-md p-4">
                    <div class="container mx-auto flex items-center justify-between">
                        <a href="index.html"><img src="assets/img/ProTualis_logo.png" alt=""></a>
                        <!-- Navbar Links for Desktop -->
                        <div class="hidden md:flex items-center space-x-4 nav-links">
                            <a href="index.html#faq" class="text-white">FAQ</a>
                            <a href="media.html" class="text-white">MEDIA</a>
                            <a href="contact.html" class="bg-blue-200 rounded-lg p-2">CONTACT</a>
                        </div>
                        <!-- Hamburger Toggle for Mobile -->
                        <button class="md:hidden text-white nav-toggle">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7">
                                </path>
                            </svg>
                        </button>
                    </div>
                </nav>
                <!-- Mobile Menu -->
                <div class="md:hidden fixed top-16 left-0 right-0 bg-green-800 p-4 nav-mobile hidden">
                    <a href="index.html#faq" class="text-white">FAQ</a>
                    <a href="media.html" class="text-white">MEDIA</a>
                    <a href="contact.html" class="bg-blue-200 rounded-lg p-2">CONTACT</a>
                </div>
            </header>
                
            <!-- Main -->
            <main>
                <div class="container text-center">
                    <h1>Merci de m\'avoir contacter. Je reviens vers vous le plus rapidement possible !</h1>
                    <p class="back">Revenir à l\'<a href="../index.html">accueil</a>.</p>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-green-800 text-white p-8">
                <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="md:col-span-1">
                        <a href="index.html"><img src="assets/img/ProTualis_logo.png" alt="" class="h-16"></a>
                    </div>
                    <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <a href="#" class="text-gray-300 hover:text-white">Accueil</a>
                        </div>
                        <div>
                            <a href="#" class="text-gray-300 hover:text-white">À propos</a>
                        </div>
                        <div>
                            <a href="#" class="text-gray-300 hover:text-white">Contact</a>
                        </div>
                    </div>
                </div>
            
                <div class="container mx-auto flex justify-between mt-4">
                    <div>
                        <p class="text-sm">&copy; 2023 Votre Entreprise. Tous droits réservés.</p>
                    </div>
                    <div>
                        <a href="confidentialite.html" class="text-sm text-gray-300 hover:text-white">Politique de confidentialité</a>
                    </div>
                    <div class="md:col-span-1 flex flex-col items-end">
                        <p class="text-sm mb-2">Suivez-nous:</p>
                        <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            f
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            ff
                        </a>
                        </div>
                    </div>
                </div>
                </footer>

                <!-- Script -->
                <script src="assets/js/script.js"></script>
            </body>
        </html>
    ';
        exit();
    } else {
        // Handle the case where the email could not be sent
        echo "Une erreur s'est produite lors de l'envoi du formulaire.";
        exit();
    }
} else {
    // Handle the case where the form is not submitted properly
    echo "Erreur de soumission du formulaire.";
}
?>

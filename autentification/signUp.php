<?php
require_once '../connection/conn.php';
require_once '../classes/utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    if ($user->register($nom, $prenom, $email, $password)) {
        header("Location: ../autentification/login.php");
        exit();
    } else {
        $error_message = "An error occurred or the email is already taken.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelEase - Sign Up</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">
    <!-- Navigation -->
    <nav class="bg-blue-900 fixed w-full z-20 top-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-3">
                <span class="self-center text-2xl font-bold text-white">TravelEase</span>
            </a>

            <!-- Mobile menu button -->
            <button type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            <!-- Menu -->
            <div class="hidden w-full md:block md:w-auto">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="../index.php" class="block py-2 pl-3 pr-4 text-white hover:text-blue-200 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="../pages/activities.php" class="block py-2 pl-3 pr-4 text-white hover:text-blue-200 md:p-0">Activities</a>
                    </li>
                </ul>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="../autentification/login.php" class="text-white hover:text-blue-200 font-medium rounded-lg text-sm px-4 py-2">Login</a>
                <a href="../autentification/signUp.php" class="text-blue-900 bg-white hover:bg-blue-100 font-medium rounded-lg text-sm px-4 py-2">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Sign Up Section -->
    <section class="min-h-screen pt-24 pb-12 flex items-center">
        <div class="max-w-screen-xl px-4 mx-auto flex flex-col md:flex-row items-center gap-12">
            <!-- Left side - Welcome message -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl font-bold text-blue-900 mb-4">Start Your Journey!</h1>
                <p class="text-gray-600 text-lg mb-6">Create your account to unlock exclusive travel deals and personalized experiences.</p>
                <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-4">Benefits of joining:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path>
                            </svg>
                            Exclusive member discounts
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path>
                            </svg>
                            Personalized travel recommendations
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path>
                            </svg>
                            Early access to deals
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right side - Sign Up form -->
            <div class="w-full md:w-1/2 max-w-md">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <form class="space-y-6" method="post">
                        <!-- Name Fields -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" id="firstName" name="nom" placeholder="First Name" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" id="lastName" name="prenom" placeholder="Last Name" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email" class="block w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="your@email.com" required>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input type="password" id="password" name="password" class="block w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="••••••••" required>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Must be at least 8 characters long</p>
                        </div>

                        <!-- Sign Up Button -->
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-colors">
                            Create Account
                        </button>

                        <!-- Login Link -->
                        <p class="text-center text-sm text-gray-600">
                            Already have an account? 
                            <a href="../autentification/login.php" class="font-medium text-blue-600 hover:text-blue-500">Log in here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once '../connection/conn.php';
    require_once 'supreAdmin.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        
        $registement = new superAdmin();
        if($registement->registement($nom, $prenom, $email, $password)){
            header('Location: ../autentification/login.php');
            exit();
        }
        }
    ?>

    <!-- Footer -->
    <footer class="bg-blue-950 text-white">
        <div class="max-w-screen-xl px-4 py-8 mx-auto">
            <div class="text-center">
                <span class="text-sm text-blue-200">© 2024 TravelEase™. All rights reserved.</span>
            </div>
        </div>
    </footer>
</body>
</html>
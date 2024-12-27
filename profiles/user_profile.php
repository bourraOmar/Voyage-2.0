<?php
session_start();

require_once '../Activities/Activities_Create.php';
$activity = new Activities();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Reservation System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen p-8">
        <!-- Header with Logout -->
        <div class="flex justify-between items-center mb-8 bg-blue-800 text-white p-4 rounded-lg">
            <h1 class="text-2xl font-bold">My Profile</h1>

            <form action="../user_Management/user_manager.php" method="post">
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Logout
            </button>
            </form>
            
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Left Column - Profile Card -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-blue-600 h-32"></div>
                    <div class="relative px-4 pb-6">
                        <div class="absolute -top-16 left-1/2 transform -translate-x-1/2">
                            <img src="../imgs/profile-major.svg"  alt="Profile Picture" 
                                 class="w-32 h-32 rounded-full border-4 border-white bg-white shadow-lg">
                        </div>
                        <div class="pt-16 text-center">
                            <h2 class="text-2xl font-bold text-gray-800"><?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"] ?></h2>
                            <p class="text-blue-600 font-semibold">User</p>
                            <p class="text-gray-500 mt-2"><?php echo $_SESSION["email"] ?></p>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white rounded-lg shadow-lg mt-8 p-6">
                    <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-phone text-blue-600 w-6"></i>
                            <span class="ml-3">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-blue-600 w-6"></i>
                            <span class="ml-3">john.smith@example.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-blue-600 w-6"></i>
                            <span class="ml-3">New York, USA</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Reservations & User Description -->
            <div class="md:col-span-2">
                <!-- Reservations Table -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">My Reservations</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php 
                                $activity->showreservationOfUser();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
require_once '../Activities/Activities_Create.php';

$showall = new Activities();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Reservation System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Main Content -->
    <div class="p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8 bg-blue-800 text-white p-4 rounded-lg">
            <h1 class="text-2xl font-bold">Admin Dashboard</h1>
            <div class="flex items-center">
                <div class="mr-4">
                    <span>Admin</span>
                    <i class="fas fa-user-circle ml-2"></i>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Total Users</h3>
                    <i class="fas fa-users text-blue-500"></i>
                </div>
                <p class="text-2xl font-bold mt-2">1,234</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Active Reservations</h3>
                    <i class="fas fa-calendar-check text-green-500"></i>
                </div>
                <p class="text-2xl font-bold mt-2">845</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Refused Reservations</h3>
                    <i class="fas fa-ban text-red-500"></i>
                </div>
                <p class="text-2xl font-bold mt-2">56</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Banned Users</h3>
                    <i class="fas fa-user-slash text-orange-500"></i>
                </div>
                <p class="text-2xl font-bold mt-2">23</p>
            </div>
        </div>

        <!-- Reservations Table -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold">Recent Reservations</h2>
            </div>
            <div class="p-4">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left">ID</th>
                            <th class="p-3 text-left">Client</th>
                            <th class="p-3 text-left">Activity</th>
                            <th class="p-3 text-left">Date</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="p-3">#12345</td>
                            <td class="p-3">Mary Wilson</td>
                            <td class="p-3">Paris-London Flight</td>
                            <td class="p-3">Dec 26, 2024</td>
                            <td class="p-3">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                            </td>
                            <td class="p-3">
                                <button class="text-green-500 hover:text-green-700 mr-2">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="p-3">#12346</td>
                            <td class="p-3">James Brown</td>
                            <td class="p-3">Luxor Hotel</td>
                            <td class="p-3">Dec 28, 2024</td>
                            <td class="p-3">
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full">Refused</span>
                            </td>
                            <td class="p-3">
                                <button class="text-green-500 hover:text-green-700 mr-2">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Activities -->
        <div class="bg-white rounded-lg shadow mt-4 ">
            <div class="p-4 border-b ">
                <h2 class="text-xl font-bold">Recent Activities</h2>
                <div class="flex justify-end">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i>Add Activitie
                    </button>
                </div>
            </div>
            <div class="p-4">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left">ID</th>
                            <th class="p-3 text-left">Activity</th>
                            <th class="p-3 text-left">Description</th>
                            <th class="p-3 text-left">Price</th>
                            <th class="p-3 text-left">Date Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr></tr> -->
                        <?php 
                        $showall->ShowActivities();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
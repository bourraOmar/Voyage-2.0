

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
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Logout
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Left Column - Profile Card -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-blue-600 h-32"></div>
                    <div class="relative px-4 pb-6">
                        <div class="absolute -top-16 left-1/2 transform -translate-x-1/2">
                            <img src="/api/placeholder/120/120" alt="Profile Picture" 
                                 class="w-32 h-32 rounded-full border-4 border-white shadow-lg">
                        </div>
                        <div class="pt-16 text-center">
                            <h2 class="text-2xl font-bold text-gray-800">John Smith</h2>
                            <p class="text-blue-600 font-semibold">User</p>
                            <p class="text-gray-500 mt-2">john.smith@example.com</p>
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Conference Room A</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Dec 26, 2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap">10:00 AM - 11:30 AM</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Meeting Room B</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Dec 27, 2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap">2:00 PM - 3:00 PM</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
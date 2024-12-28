<?php
session_start();

require_once '../Activities/Activities_Create.php';
require_once '../Activities/stats_management.php';
require_once '../user_Management/user_manager.php';

$showall = new Activities();
$statsObject = new stats_Manager();
$usermanage = new Users_manager();

if(isset($_SESSION['role']) && $_SESSION['role'] == 1){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard - Reservation System</title>
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
                <div class="mr-4 flex gap-6">
                    <span>Super Admin</span>
                    <div class="">
                <a href="../profiles/superadmin_profile.php"><img width="25px" class="bg-white rounded-full" src="../imgs/profile-major.svg" alt=""></a>
                    </div>
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
                <p class="text-2xl font-bold mt-2">
                    <?php
                    $statsObject->CountUser();
                    ?>
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Active Reservations</h3>
                    <i class="fas fa-calendar-check text-green-500"></i>
                </div>
                <p class="text-2xl font-bold mt-2">
                <?php
                    $statsObject->CountActiveReservation();
                ?>
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Refused Reservations</h3>
                    <i class="fas fa-ban text-red-500"></i>
                </div>
                <p class="text-2xl font-bold mt-2">
                <?php
                    $statsObject->CountRefusedReservation();
                ?>
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Banned Users</h3>
                    <i class="fas fa-user-slash text-orange-500"></i>
                </div>
                <p class="text-2xl font-bold mt-2">
                <?php
                    $statsObject->CountBannedUser();
                ?>
                </p>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow mb-8">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold">User Management</h2>
            </div>
            <div class="p-4">
                <div class="flex justify-end mb-4">
                <button onclick="openUserModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i>Add Admin
                </button>
                </div>
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 text-left">User</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">Role</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $usermanage->showUserList();
                        ?>
                    </tbody>
                </table>
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
                        <?php
                        $usermanage->ShowReservations();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Activities -->
        <div class="bg-white rounded-lg shadow mt-4 ">
            <div class="p-4 border-b ">
                <h2 class="text-xl font-bold">Recent Activities</h2>
                <div class="flex justify-end">
                <button onclick="document.getElementById('activityModal').classList.remove('hidden')" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i>Add Activity
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
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr></tr> -->
                        <?php 
                        $showall->ShowActivitiesOndashboard();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- modal -->
    <div id="activityModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-6 m-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Add New Activity</h2>
            <button onclick="document.getElementById('activityModal').classList.add('hidden')" 
                    class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form class="space-y-4" method="POST" action="../Activities/Activities_Create.php">
            <div>
                <label class="block text-gray-700 mb-2">Activity Name</label>
                <input type="text" class="w-full border rounded-lg p-2" name="activity_name">
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Description</label>
                <textarea class="w-full border rounded-lg p-2 h-24" name="activity_description"></textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Price</label>
                    <input type="number" class="w-full border rounded-lg p-2" name="activity_price">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Activity Date</label>
                    <input type="date" class="w-full border rounded-lg p-2" name="activity_date">
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" 
                        onclick="document.getElementById('activityModal').classList.add('hidden')"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Add Activity
                </button>
            </div>
        </form>
    </div>
</div>

<!-- userModal -->
<div id="userModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-6 m-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Add New User</h2>
            <button onclick="closeUserModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="userForm" class="space-y-4" method="POST" action="../user_Management/user_manager.php">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">First Name</label>
                    <input type="text" name="firstname" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Last Name</label>
                    <input type="text" name="lastname" class="w-full border rounded-lg p-2" required>
                </div>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" class="w-full border rounded-lg p-2" required>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password" class="w-full border rounded-lg p-2" required>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Role</label>
                <input type="text" name="Role" class="w-full border rounded-lg p-2" value="admin" readonly required>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="closeUserModal()" class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700" name="addUser">
                    Add Admin
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openUserModal() {
    document.getElementById('userModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeUserModal() {
    document.getElementById('userModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('userForm').reset();
}

document.getElementById('userModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeUserModal();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !document.getElementById('userModal').classList.contains('hidden')) {
        closeUserModal();
    }
});
</script>


    </div>

</body>
</html>
<?php 
}else{
    header("Location: ../index.php");
    exit();
}
?>
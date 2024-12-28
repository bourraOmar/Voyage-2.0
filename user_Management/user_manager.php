<?php 

require_once '../connection/conn.php';
require_once '../classes/utilisateur.php';

class Users_manager{
    protected $pdo;
    protected $table = 'user';

    function showUserList(){
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();

        $sql = "SELECT u.user_id, u.nom, u.prenom, u.email, r.titre, u.status 
                FROM user u 
                LEFT JOIN role r 
                ON u.role_id = r.role_id;";
        $stmt = $pdo->query($sql);
        if($stmt->execute()){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['titre'] == 'client' || $row['titre'] == 'admin'){
                echo '<tr class="border-t">
                            <td class="p-3">'. $row['nom'] . " " . $row['prenom'] .'</td>
                            <td class="p-3">'. $row['email'] .'</td>
                            <td class="p-3">'. $row['titre'] .'</td>';
                            if($row['status'] == 'active'){
                            echo '<td class="p-3">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full">'. $row['status'] .'</span>
                            </td>';
                            }else if($row['status'] == 'blocked'){
                                echo '<td class="p-3">
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full">'. $row['status'] .'</span>
                                </td>';
                            }
                        
                        echo '<td class="p-3">
                            <a href="../user_Management/user_manager.php?userid='. $row['user_id'] .'">
                                <button class="text-red-500 hover:text-red-700 mr-2">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </a>
                            </td>
                </tr>';
                }
            }
        }
    }
    
    function ShowReservations(){
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();

        $sql = "SELECT r.reservation_id, u.nom, u.prenom, a.nom AS activite_nom, r.date_activite, r.status
                FROM reservation r
                LEFT JOIN user u ON r.user_id = u.user_id
                LEFT JOIN activity a ON r.activity_id = a.activity_id";

        $stmt = $pdo->query($sql);
        if($stmt->execute()){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<tr class="border-t">
                            <td class="p-3">'. $row['reservation_id'] .'</td>
                            <td class="p-3">'. $row['nom'] . " " . $row['prenom'] .'</td>
                            <td class="p-3">'. $row['activite_nom'] .'</td>
                            <td class="p-3">'. $row['date_activite'] .'</td>';
                            if($row['status'] == 'waiting'){
                            echo'<td class="p-3">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">'. $row['status'] .'</span>
                            </td>';
                            }else if($row['status'] == 'accepte'){
                                echo'<td class="p-3">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full">'. $row['status'] .'</span>
                                </td>';
                            }else if($row['status'] == 'refuse'){
                                echo'<td class="p-3">
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full">'. $row['status'] .'</span>
                                </td>';
                            }
                            echo '<td class="p-3">
                            <a href="../user_Management/user_manager.php?resIDaccepte='. $row['reservation_id'] .'">
                                <button class="text-green-500 hover:text-green-700 mr-2">
                                    <i class="fas fa-check"></i>
                                </button>
                            </a>
                            <a href="../user_Management/user_manager.php?resIDrefuse='. $row['reservation_id'] .'">
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </a>
                            </td>
                        </tr>';
            }
        }
    }
    function BannedUser($userID){
        $this->pdo = new DBconnect;
        $pdo = $this->pdo->connectpdo();

        $sql = "UPDATE user 
                SET status = 'blocked'
                WHERE user_id = :userid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userid', $userID);
        if($stmt->execute()){
            header("location:../pages/dashboard_superAdmin.php");
            exit();
        }
    }
    function userDisconnect(){
        session_start();
        session_destroy();
        header('Location: ../index.php');
        exit();
    }
    
}

if(isset($_GET['userid'])){
    require_once '../connection/conn.php';

    $pdo = new DBconnect();
    $pdo->connectpdo();

    $usermanager = new Users_manager();
    $userid = $_GET['userid'];
    $usermanager->BannedUser($userid);
}
if(isset($_POST['LogoutBTN'])){
    $usermanage = new Users_manager();
    $usermanage->userDisconnect();
}

if(isset($_GET['resIDaccepte'])){
    $acceptedResID = $_GET['resIDaccepte'];

    $connection = new DBconnect();
    $pdo = $connection->connectpdo();

    $sql = "UPDATE reservation
            SET status = 'accepte'
            WHERE reservation_id = :acceptedactivityid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam('acceptedactivityid', $acceptedResID);
    if($stmt->execute()){
        if($_SESSION["role"] == 1){
            header("location:../pages/dashboard_superAdmin.php");
            exit();
        }else{
            header("location:../pages/dashboard_Admin.php");
            exit();
        }
        
    }
    
}

if(isset($_GET['resIDrefuse'])){
    $acceptedResID = $_GET['resIDrefuse'];

    $connection = new DBconnect();
    $pdo = $connection->connectpdo();

    $sql = "UPDATE reservation
            SET status = 'refuse'
            WHERE reservation_id = :acceptedactivityid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam('acceptedactivityid', $acceptedResID);
    if($stmt->execute()){
        if($_SESSION["role"] == 1){
            header("location:../pages/dashboard_superAdmin.php");
            exit();
        }else{
            header("location:../pages/dashboard_Admin.php");
            exit();
        }
        
    }
    
}

if(isset($_POST['addUser'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    if ($user->registerAdmin($firstname, $lastname, $email, $password)) {
        header("location:../pages/dashboard_superAdmin.php");
        exit();
    }
}
?>
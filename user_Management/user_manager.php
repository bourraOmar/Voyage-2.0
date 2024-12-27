<?php 
class Users_manager{
    protected $pdo;
    protected $table = 'user';

    function showUserList(){
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();

        $sql = "SELECT u.User_id, u.nom, u.prenom, u.email, r.titre, u.status 
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
                            <a href="../user_Management/user_manager.php?userid='. $row['User_id'] .'">
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
                LEFT JOIN user u ON r.User_id = u.User_id
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
                                <button class="text-green-500 hover:text-green-700 mr-2">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i>
                                </button>
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
                WHERE User_id = :userid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userid', $userID);
        if($stmt->execute()){
            header("location:../pages/dashboard_superAdmin.php");
            exit();
        }
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
?>
<a href=""></a>
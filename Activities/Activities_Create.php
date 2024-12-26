<?php 
require_once '../connection/conn.php';

class Activities{
    protected $nom;
    protected $description;
    protected $price;
    protected $date_activite;
    private $tablename = 'activity';
    private $pdo;
    
    function CreateNewActivitie($nom, $description, $price, $date_activite){
        $this->nom = $nom;
        $this->description = $description;
        $this->price = $price;
        $this->date_activite = $date_activite;

        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();
        
        $sql = "INSERT INTO {$this->tablename} (nom, description, price, date_activite) 
                VALUES (:nom, :description, :price, :date_activite)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindparam(':nom', $this->nom);
        $stmt->bindparam(':description', $this->description);
        $stmt->bindparam(':price', $this->price);
        $stmt->bindparam(':date_activite', $this->date_activite);

        if($stmt->execute()){
            echo 'done';
        }
        return $pdo;
    }
    function ShowActivitiesOndashboard(){
        $selectAll = "SELECT * FROM {$this->tablename}";

        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();
        
        $result = $pdo->prepare($selectAll);
        if($result->execute()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo '<tr class="border-t">
                            <td class="p-3">'. $row['activity_id'] .'</td>
                            <td class="p-3">'. $row['nom'] .'</td>
                            <td class="p-3">'. $row['description'] .'</td>
                            <td class="p-3">'. $row['price'] .'</td>
                            <td class="p-3">'. $row['date_activite'] .'</td>
                            <td class="p-3">
                            <a href="../Activities/Activities_Create.php?actId='. $row['activity_id'] .'">
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </a>
                            </td>
                </tr>';
            }
        }   
    }
    
    function ShowActivitiesForUsers(){
        $selectAll = "SELECT * FROM {$this->tablename}";

        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();

        $result = $pdo->prepare($selectAll);
        if($result->execute()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-blue-900">'. $row['nom'] .'</h3>
                                <p class="text-gray-600">'. $row['description'] .'</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex items-center mb-12">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-600">'. $row['date_activite'] .'</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-blue-900">'. $row['price'] .' $</span>
                            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                Reserve Now
                            </button>
                        </div>
                    </div>
                </div>';
            }
        }   
    }
    function deleteActivities(){
        if(isset($_GET['actId'])){
            $actId = $_GET['actId'];

            $this->pdo = new DBconnect();
            $pdo = $this->pdo->connectpdo();

            $deleteActivitySql = "DELETE FROM {$this->tablename} WHERE activity_id = :actId";
            $stmt = $pdo->prepare($deleteActivitySql);
            $stmt->bindParam(':actId', $actId);
            if($stmt->execute()){
                header('Location: ../pages/dashboard_Admin.php');
                exit();
            }
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $activity_name = $_POST['activity_name'];
    $activity_description = $_POST['activity_description'];
    $activity_price = $_POST['activity_price'];
    $activity_date = $_POST['activity_date'];

$activity = new Activities();
if($activity->CreateNewActivitie($activity_name, $activity_description, $activity_price, $activity_date)){
    header('Location: ../pages/dashboard_Admin.php');
    exit();
}
}
if(isset($_GET['actId'])){
    $activity = new Activities();
    $activity->deleteActivities();
}
?>

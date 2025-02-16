<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function conn() {
    include(dirname(__FILE__)."/config.php");
    return $conn;
}

use PhpOffice\PhpSpreadsheet\IOFactory;

class Crud {
    private $db;
    private $pdo;

    public function __construct($db_conn) {
        $conn = conn();
        $this->db = $db_conn;
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {
        $this->pdo = new PDO("mysql:host=".$conn['host'].";dbname=".$conn['dbname']."", $conn['user'], $conn['password'], $options);
        } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
        }
    }

    public function create($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $set_values = '';
    
        foreach($data as $key => $value) {
            $set_values .= $key.'=:'.$key.', ';
        }
        if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_content = file_get_contents($_FILES['file']['tmp_name']);
            $columns .= ', file';
            $values .= ', :file';
        }
    
        $set_values = rtrim($set_values, ', ');
    
        $stmt = $this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($values)");
    
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
        }
    
        if(isset($file_name) && isset($file_type) && isset($file_size) && isset($file_content)) {
            $stmt->bindParam(':file', $file_content, PDO::PARAM_LOB);
        }
    
        $result = $stmt->execute();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function read($table, $id) {
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function read_all($table) {

        $query = "SELECT * FROM $table ORDER BY id DESC";
    
        $result = $this->db->query($query);
    
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        if ($rows) {
            return $rows;
        } else {
            return false;
        }
    }

    // LINEAR SEARCH ALGORITHM
    public function search($table, $search_term, $select) {
        $selected_term = "";
        $index = 1;

        foreach($select as $selected) {
            $selected_term .= $selected . " LIKE :search_term ";
            if(++$index <= count($select)) {
                $selected_term .= "OR ";
            }
        }
        
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $selected_term ORDER BY id DESC");
        $stmt->bindValue(':search_term', "%$search_term%", PDO::PARAM_STR);
        $stmt->execute();
    
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $table WHERE $selected_term");
        $stmt->bindValue(':search_term', "%$search_term%", PDO::PARAM_STR);
        $stmt->execute();
    
        if ($records) {
            return $records;
        } else {
            return false;
        }
    }

    public function read_by($table, $items, $select) {
        $selected_term = "";
        $index = 1;
    
        foreach($select as $selected) {
            $selected_term .= $selected . " =  :" . $selected . " ";
            if(++$index <= count($select)) {
                $selected_term .= "OR ";
            }
        }
    
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $selected_term ORDER BY id DESC LIMIT :limit OFFSET :offset");
    
        $count = 0;
        foreach ($select as $selected) {
            $stmt->bindValue(':' . $selected, $items[$count], PDO::PARAM_STR);
            $count++;
        }
        
        $stmt->bindValue(':limit', $items['limit'] ?? 0, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $items['offset'] ?? 0, PDO::PARAM_INT);
    
        $stmt->execute();
    
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $table WHERE $selected_term");
    
        $count2 = 0;
        // Bind the values for placeholders
        foreach ($select as $selected) {
            $stmt->bindValue(':' . $selected, $items[$count2], PDO::PARAM_STR);
            $count2++;
        }
    
        $stmt->execute();
    
        if ($records) {
            return $records;
        } else {
            return false;
        }
    }

    public function update($table, $id, $data) {
        $columns = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));
        $set_values = '';
    
        foreach($data as $key => $value) {
            $set_values .= $key.'=:'.$key.', ';
        }
    
        if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_content = file_get_contents($_FILES['file']['tmp_name']);
            $set_values .= 'file=:file, ';
        }
    
        $set_values = rtrim($set_values, ', ');
    
        $stmt = $this->pdo->prepare("UPDATE $table SET $set_values WHERE id=:id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
        }
    
        if(isset($file_name) && isset($file_type) && isset($file_size) && isset($file_content)) {
            $stmt->bindParam(':file', $file_content, PDO::PARAM_LOB);
        }
    
        $stmt->execute();
    }

    public function delete($table, $id) {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->db->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function login($table, $email, $password) {
        $query = "SELECT * FROM $table WHERE (email = '$email' OR phone = '$email') AND password = '$password'";
        $result = $this->db->query($query);
    
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function importProducts($file) {
        require_once '../vendor/autoload.php';
        $reader = IOFactory::createReaderForFile($file);
        $spreadsheet = $reader->load($file);
        
        $worksheet = $spreadsheet->getActiveSheet();
    
        $highest_row = $worksheet->getHighestRow();
        $highest_column = $worksheet->getHighestColumn();
    
        for($row = 2; $row <= $highest_row; $row++) {
            $columns = ['name', 'type', 'location', 'price', 'discount', 'stock', 'image', 'description'];
            $data = [];
            for($col = 'A'; $col <= 'H'; $col++) {
                $cell_value = $worksheet->getCell($col.$row)->getValue();
                if ($col == 'D' || $col == 'E') {
                    $data[] = (int)$cell_value;
                } else {
                    $data[] = $cell_value;
                }
            }

            $row_data = array_combine($columns, $data);
            
            $row_data['seller_id'] = $_SESSION['user_id'];

            // $filePath = str_replace('"', "", $row_data['image']);
            // $destinationFilePath = '../assets/products/'.preg_replace('/[^a-zA-Z0-9_ -]/s', '' ,$row_data['name']).".".pathinfo($filePath, PATHINFO_EXTENSION);
            // $row_data['image'] = preg_replace('/[^a-zA-Z0-9_ -]/s', '' ,$row_data['name']).".".pathinfo($filePath, PATHINFO_EXTENSION);
            // if( !copy($filePath, $destinationFilePath) ) {  
            //     // echo "File can't be moved!";  
            // }  
            // else {  
            //     // echo "File has been moved!";  
            // }

            $this->create('product', $row_data);

            header("Location: ../dashboard/admin.php?page=products");
        }
    }

    public function getSalesData($seller_id) {
        try {
            // WEEKLY SALES DATA (CURRENT WEEK)
            $startOfWeek = date("Y-m-d 00:00:00", strtotime("monday this week"));
            $endOfWeek = date("Y-m-d 23:59:59", strtotime("sunday this week"));
    
            $stmt = $this->pdo->prepare("
                SELECT 
                    DATE(datetime) as sale_date, 
                    SUM(CASE WHEN type = 'complete' THEN price WHEN type = 'refund' THEN -price ELSE 0 END) as total_sales
                FROM audit_log
                WHERE datetime BETWEEN :startOfWeek AND :endOfWeek AND seller_id = :seller_id
                GROUP BY sale_date
                ORDER BY sale_date
            ");
            $stmt->execute(['startOfWeek' => $startOfWeek, 'endOfWeek' => $endOfWeek, 'seller_id' => $seller_id]);
            $currentWeekSales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // WEEKLY SALES DATA (LAST WEEK)
            $startOfLastWeek = date("Y-m-d 00:00:00", strtotime("monday last week"));
            $endOfLastWeek = date("Y-m-d 23:59:59", strtotime("sunday last week"));
    
            $stmt = $this->pdo->prepare("
                SELECT 
                    DATE(datetime) as sale_date, 
                    SUM(CASE WHEN type = 'complete' THEN price WHEN type = 'refund' THEN -price ELSE 0 END) as total_sales
                FROM audit_log
                WHERE datetime BETWEEN :startOfLastWeek AND :endOfLastWeek AND seller_id = :seller_id
                GROUP BY sale_date
                ORDER BY sale_date
            ");
            $stmt->execute(['startOfLastWeek' => $startOfLastWeek, 'endOfLastWeek' => $endOfLastWeek, 'seller_id' => $seller_id]);
            $lastWeekSales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // MONTHLY SALES DATA (CURRENT MONTH)
            $startOfMonth = date("Y-m-01 00:00:00");
            $endOfMonth = date("Y-m-t 23:59:59");
    
            $stmt = $this->pdo->prepare("
                SELECT 
                    DATE(datetime) as sale_date, 
                    SUM(CASE WHEN type = 'complete' THEN price WHEN type = 'refund' THEN -price ELSE 0 END) as total_sales
                FROM audit_log
                WHERE datetime BETWEEN :startOfMonth AND :endOfMonth AND seller_id = :seller_id
                GROUP BY sale_date
                ORDER BY sale_date
            ");
            $stmt->execute(['startOfMonth' => $startOfMonth, 'endOfMonth' => $endOfMonth, 'seller_id' => $seller_id]);
            $currentMonthSales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // MONTHLY SALES DATA (LAST MONTH)
            $startOfLastMonth = date("Y-m-01 00:00:00", strtotime("first day of last month"));
            $endOfLastMonth = date("Y-m-t 23:59:59", strtotime("last day of last month"));
    
            $stmt = $this->pdo->prepare("
                SELECT 
                    DATE(datetime) as sale_date, 
                    SUM(CASE WHEN type = 'complete' THEN price WHEN type = 'refund' THEN -price ELSE 0 END) as total_sales
                FROM audit_log
                WHERE datetime BETWEEN :startOfLastMonth AND :endOfLastMonth AND seller_id = :seller_id
                GROUP BY sale_date
                ORDER BY sale_date
            ");
            $stmt->execute(['startOfLastMonth' => $startOfLastMonth, 'endOfLastMonth' => $endOfLastMonth, 'seller_id' => $seller_id]);
            $lastMonthSales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // YEARLY SALES DATA (CURRENT YEAR)
            $startOfYear = date("Y-01-01 00:00:00");
            $endOfYear = date("Y-12-31 23:59:59");
    
            $stmt = $this->pdo->prepare("
                SELECT 
                    DATE(datetime) as sale_date, 
                    SUM(CASE WHEN type = 'complete' THEN price WHEN type = 'refund' THEN -price ELSE 0 END) as total_sales
                FROM audit_log
                WHERE datetime BETWEEN :startOfYear AND :endOfYear AND seller_id = :seller_id
                GROUP BY sale_date
                ORDER BY sale_date
            ");
            $stmt->execute(['startOfYear' => $startOfYear, 'endOfYear' => $endOfYear, 'seller_id' => $seller_id]);
            $currentYearSales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // YEARLY SALES DATA (LAST YEAR)
            $startOfLastYear = date("Y-01-01 00:00:00", strtotime("first day of January last year"));
            $endOfLastYear = date("Y-12-31 23:59:59", strtotime("last day of December last year"));
    
            $stmt = $this->pdo->prepare("
                SELECT 
                    DATE(datetime) as sale_date, 
                    SUM(CASE WHEN type = 'complete' THEN price WHEN type = 'refund' THEN -price ELSE 0 END) as total_sales
                FROM audit_log
                WHERE datetime BETWEEN :startOfLastYear AND :endOfLastYear AND seller_id = :seller_id
                GROUP BY sale_date
                ORDER BY sale_date
            ");
            $stmt->execute(['startOfLastYear' => $startOfLastYear, 'endOfLastYear' => $endOfLastYear, 'seller_id' => $seller_id]);
            $lastYearSales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fill in missing days/months/years with 0 sales
            $salesThisWeek = $this->fillWeekData($currentWeekSales, 'this week');
            $salesLastWeek = $this->fillWeekData($lastWeekSales, 'last week');
            $salesThisMonth = $this->fillMonthData($currentMonthSales, 'this month');
            $salesLastMonth = $this->fillMonthData($lastMonthSales, 'last month');
            $salesThisYear = $this->fillYearData($currentYearSales, 'this year');
            $salesLastYear = $this->fillYearData($lastYearSales, 'last year');
    
            return [
                'sales_this_week' => $salesThisWeek,
                'sales_last_week' => $salesLastWeek,
                'sales_this_month' => $salesThisMonth,
                'sales_last_month' => $salesLastMonth,
                'sales_this_year' => $salesThisYear,
                'sales_last_year' => $salesLastYear
            ];
    
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }    
    
    // Helper function to fill missing days for weekly data
    private function fillWeekData($salesData, $weekType) {
        $weekData = [];
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    
        foreach ($daysOfWeek as $day) {
            if ($weekType == 'this week') {
                $date = date("Y-m-d", strtotime($day . " this week"));
            } else {
                $date = date("Y-m-d", strtotime($day . " last week"));
            }
    
            $found = false;
            foreach ($salesData as $data) {
                if ($data['sale_date'] == $date) {
                    $weekData[] = (float)$data['total_sales'];
                    $found = true;
                    break;
                }
            }
    
            if (!$found) {
                $weekData[] = 0;
            }
        }
    
        return $weekData;
    }
    
    // Helper function to fill missing days for monthly data
    private function fillMonthData($salesData, $monthType) {
        $monthData = [];
        $daysInMonth = date("t"); // Get number of days in the current month or last month
    
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $date = ($monthType == 'this month') ? date("Y-m-d", strtotime("this month +$i days -1 day")) :
                date("Y-m-d", strtotime("last month +$i days -1 day"));
    
            $found = false;
            foreach ($salesData as $data) {
                if ($data['sale_date'] == $date) {
                    $monthData[] = (float)$data['total_sales'];
                    $found = true;
                    break;
                }
            }
    
            if (!$found) {
                $monthData[] = 0;
            }
        }
    
        return $monthData;
    }
    
    // Helper function to fill missing months for yearly data
    private function fillYearData($salesData, $yearType) {
        $yearData = [];
        $monthsOfYear = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    
        foreach ($monthsOfYear as $month) {
            $date = ($yearType == 'this year') ? date("Y-m-d", strtotime($month . " this year")) :
                date("Y-m-d", strtotime($month . " last year"));
    
            $found = false;
            foreach ($salesData as $data) {
                if (substr($data['sale_date'], 0, 7) == substr($date, 0, 7)) {
                    $yearData[] = (float)$data['total_sales'];
                    $found = true;
                    break;
                }
            }
    
            if (!$found) {
                $yearData[] = 0;
            }
        }
    
        return $yearData;
    }
        
    
    

}
$conn = conn();
$db_conn = new mysqli($conn['host'], $conn['user'], $conn['password'], $conn['dbname']);
    
$crud = new Crud($db_conn);
?>
<?php 
                header('Content-Type: application/json');

                require $_SERVER['DOCUMENT_ROOT']."/user63202040097/src/Database/conn.php";
                $sql = "SELECT lend_tran, COUNT(*) AS total_lend 
                FROM transection
                GROUP BY lend_tran
                ORDER BY lend_tran DESC";
                $result = mysqli_query($conn,$sql);
                $counts = mysqli_num_rows($result);
                $n="0";
                if($counts>0){
                    if($n<5){
                        $data = array();
                        foreach($result as $row){
                            $data[] = $row;
                        }
                    }
                }
                mysqli_close($conn);
                echo json_encode($data);
                
?>
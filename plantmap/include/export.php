<?php 
        
        if(isset($_POST["export"])){
                $conn = mysqli_connect("localhost", "root", "", "plant");
                header('Content-Type: text/csv; carset=utf-8');
                header('Content-Disposition: attachment; filename=history-data.csv');
                $output =fopen("php://output", "w");
                fputcsv($output, array('Common Name', 'Scientific Name','Family', 'Category'));
                $query = "SELECT common_name, scientific_name, family, category FROM plants ORDER BY family DESC";
                    if($result= mysqli_query($conn, $query)){
                        while ($rows=mysqli_fetch_assoc($result))
                            {
                                fputcsv($output, $rows);
                            }
                            fclose($output);
                        }
                    }

 ?>
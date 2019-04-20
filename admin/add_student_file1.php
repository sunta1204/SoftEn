 <?php

    include "../connect.php";
    include ("ExcelRead.php");
    

            $target_dir = "student_file/";
            $target_file = $target_dir . basename($_FILES["student_file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $id = $_POST['id'];
            $c_id = $_POST['c_id'];
            $c_sec = $_POST['c_sec'];

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["student_file"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "xls" && $imageFileType != "xlsx") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            $file_name="123.".$imageFileType;
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (isset($_FILES['student_file'])) {
                    $data_array=ReadExcel($_FILES['student_file']['tmp_name']);
                    


                            $i=0; 
                            foreach ($data_array as $result) {
                                
                                $sId['s_id'] = $result['s_id'];
                                $sName['s_name'] = $result['s_name'];
                                $sDepartment['s_department'] = $result['s_department'];

                                $stmt=$pdo->prepare("SELECT * FROM enroll WHERE s_id = ?  AND c_id = ? AND c_year = ? AND c_term = ?");
                                $stmt->bindParam(1,$sId['s_id']);
                                $stmt->bindParam(2,$_POST['c_id']);
                                $stmt->bindParam(3,$_POST['c_year']);
                                $stmt->bindParam(4,$_POST['c_term']);
                                $stmt->execute();
                                $rowCount=$stmt->rowCount();
                                $i++;    

                            }
                            if ($rowCount > 0 ) {
                                setcookie('add_student_same',1,time()+5,'/');
                                echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
                            } else {
                                $k=0;
                                foreach ($data_array as $result) {
                                $sId['s_id'] = $result['s_id'];
                                $sName['s_name'] = $result['s_name'];
                                $sDepartment['s_department'] = $result['s_department'];     
                                $k++; 

                                $stmt2=$pdo->prepare("INSERT INTO enroll ( c_id , c_name , c_sec , c_year , c_term , s_id , s_name , s_department) VALUE(?,?,?,?,?,?,?,?)");
                                $stmt2->bindParam(1,$_POST['c_id']);
                                $stmt2->bindParam(2,$_POST['c_name']);
                                $stmt2->bindParam(3,$_POST['c_sec']);
                                $stmt2->bindParam(4,$_POST['c_year']);
                                $stmt2->bindParam(5,$_POST['c_term']);
                                $stmt2->bindParam(6,$result['s_id']);
                                $stmt2->bindParam(7,$result['s_name']);
                                $stmt2->bindParam(8,$result['s_department']);
                                $stmt2->execute();
                                $rowCount1=$stmt2->rowCount(); 
                            }
                            if ($rowCount1 > 0) {
                                setcookie('add_student_success',1,time()+5,'/');
                                echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
                            } else {
                                setcookie('add_student_fail',1,time()+5,'/');
                                echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
                            }
                                  
                        }
            }
        }
            ?>

<?php
// include('../../db.php');
$con = mysqli_connect("localhost","admin","12345","dx2017");

//$id=$_COOKIE['Id'];
$data=explode('_',$_POST['ExamId']);

$query="SELECT AD.Name,ES.subject_name FROM `sch_exam_teacher` AS ET 
                   INNER JOIN sch_exam_subjects AS ES ON ES.exam_sub_id=ET.`exam_sub_id` 
                   INNER JOIN sch_exams AS SE ON SE.exam_id=ES.exam_id 
                   INNER JOIN admin_sch AS AD ON AD.unique_id=ET.teacher_id  
    WHERE SE.mdm='".$data[0]."' AND SE.std='".$data[1]."' AND SE.`sec`='".$data[2]."'  AND SE.exam_name='".$data[3]."'";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)!=0)
                {
                    ?>
  <table class="table table-bordered table-striped table-condensed">
     <tr> <th><b>Teacher Name </b></th><th><b>Subjects </b></th> </tr>
<?php               $i=0;
                    $tName="";
					while($row=mysqli_fetch_row($result))
                    {
                        
                        $count=0;
                        if($tName !=$row[0])
                        {
                            if($i != 0)
                            {
                           ?>
                            </table></td></tr>
                            
                            <?php
                            }
                        ?>
                            <tr><td><?php echo $row[0]; ?></td>
                            <td> <table  class="table table-bordered table-striped table-condensed">
                        <?php
                       $tName= $row[0];
                       $i++;
                        }
                        ?>
                      <tr><td><?php echo $row[1]; ?></td></tr>
                        
                        
                        
                        <?php
                    }
                }
                        
                ?>
               
                  
                  




	
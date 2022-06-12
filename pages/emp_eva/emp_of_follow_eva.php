<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
  error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
session_start();
require_once 'header.php';
?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title" >
                        <h1>تقييم موظف المتابعة</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">تقييمات الموظفين</a></li>
                            <li class="active">تقييم موظف المتابعة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" style=" margin: 20px; text-align: right;" >
                    <label for="exampleInputPassword1" >الفرع</label>
                    <select class='form-control form-control-user choose_branch' style="text-align: right;" id="branchval"  name='branch'>
                    <option selected>اختر الفرع</option>
                        <?php
                            require_once '../../connection.php';
                            $sql = "select * from branches";
                            $result = $conn->query($sql);
                            while ($rows=$result->fetch_assoc()){?>
                            <option value='<?php echo $rows['branch_id']; ?>'><?php echo $rows['branch_name']; ?></option>
                            <?php }
                            echo $sql ;
                        ?>
                    </select>
                    <div style="text-align: center; margin-top: 30px;">
                    <button type="submit" name="submit_search"  class="btn btn-primary sub submit_branch" style=" width:50%; text-align: center;">بحث</button>
                    </div>
                    </form> 


<?php 
require_once '../../connection.php';
$branch = isset($_POST['branch']) ? $_POST['branch'] : false;

 if ($branch) {
    $txt="SELECT * FROM employee WHERE `department_id`=2 AND `job_title_id`=6 AND `branch_id`= $branch";
    $conn->query($txt);
    $results=$conn->query($txt);
    while($rows=$results->fetch_assoc()){
        $head_of_retail_code=$rows["employee_code"] ;
    }
 }
?>

    <?php
 require_once '../../connection.php';
 $branch = isset($_POST['branch']) ? $_POST['branch'] : false;
 if ($branch) {
$txt="select * from 	employee WHERE `department_id`=2 AND `job_title_id`=6 AND `branch_id`= $branch";
$conn->query($txt);
$results=$conn->query($txt);
$total=0;
while($rows=$results->fetch_assoc()){
  $total++;
}
?>

<!-- $data="-->
<div class="row" style='margin:40px 30px ; display: flow-root;'>
    <div class='col-3'>
      <a type='button' href='print.php' class='btn btn-primary'>طباعة</a>
    </div>
    <div class='col-3'></div>
    <div class='input-group input-group-lg col-5' style='width:30%; position: relative;   ' dir='rtl'>
      <span class='input-group-text' id='inputGroup-sizing-lg'> عدد الموظفين</span>
      <input type='text' class='form-control' style='text-align: center;' id="countnumb" value='<?php echo $total; ?>' name="countnumb" aria-label='Sizing example input;' aria-describedby='inputGroup-sizing-lg' disabled>
    </div>
  </div>
<!--";-->

<?php
}

?>



<?php 
require_once '../../connection.php';
$branch = isset($_POST['branch']) ? $_POST['branch'] : false;

 if ($branch) {

$txt="select * from 	employee WHERE `department_id`=2 AND `job_title_id`=6 AND `branch_id`= $branch";
$results=$conn->query($txt);
?>
<!-- $data="-->
<div class="col-md-12" dir="rtl">
                        <div class="card">
                            <div class="card-header" style="text-align: right;">
                                <strong class="card-title">تقييم موظفين متابعة <?php
                                 if ($branch) {
                                  $sql = "select * from branches where branch_id=$branch";
                                  $result = $conn->query($sql);
                                  while ($rows=$result->fetch_assoc()){
                                    $branch_name=$rows["branch_name"] ;
                                   }
                                   echo $branch_name;
                                  }?></strong>
                            </div>
                            <form dir='rtl' name='' method='POST' style='text-algin:right;' >

                            <div class="form-group col col-lg-6"><label for="vat" class="form-control-label">التاريخ</label><input type="date" name="emp_of_follow_eva_date" data-date-format="DD MMMM YYYY" id="vat" placeholder="dd-mm-yyyy" class="form-control" required></div> 
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>اسم الموظف</th>
                                            <th style="display:none;">اسم الموظف</th>
                                            <th>الرقم الوظيفي</th>
                                            <th>انهاء الشكاوي خلال فترة</th>
                                            <th>التواصل مع العملاء</th>
                                            <th>الالتزام بالحضور</th>
                                            <th>تعليمات الرئيس المباشر</th>
                                            <th>الالتزام بنماذج الجودة</th>
                                            <th>متابعة المعاينات المتوقفة</th>
                                            <th>العلاقة مع الموظفين</th>
                                            <th>التعاون مع باقي الاقسام </th>
                                            <th>انهاء التسويات المتوقفة</th>
                                            <th>نسبة جودة الرد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      $counter=1;
                                        while($rows=$results->fetch_assoc())
                                        {
                                          $emp_name=$rows["employee_name"];
                                          $employee_code=$rows["employee_code"];
                                    ?>
                                   
                                        <tr>
                                            <td>
                                              <div class='form-group'>
                                                <?php echo $emp_name ?>
                                              </div>
                                            </td>
                                            <td style="display:none;">  
                                              <div class='form-group' >
                                                <input type='text' class='form-control main_days' name='branch2[<?php echo $counter; ?>]' id='main_days' value='<?php echo $branch ?>' >
                                              </div>
                                            </td>
                                            <td >  
                                              <div class='form-group' >
                                                <input type='text' class='form-control main_days' name='code[<?php echo $counter; ?>]' id='main_days' value='<?php echo $employee_code ?>' readonly >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_finish_complaint[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_commonucation[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_attendance[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_direct_manger[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_quality_preview[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_follow_preview[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_follow_relationship[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_collaboration_with_other[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_finishing_preview[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_quality_response[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                        </tr>
                                        <?php
                                          $counter++;
                                            } 
                                          ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <div class='card-footer' dir='rtl' style="margin:20px;">
                        <button type='submit' style='width:100%;' name='add_eva' id='' class='btn btn-primary' >تسجيل</button>
                        </div>
                      </form>
                    </div>
<!--";-->

<?php
}

?>

<?php
require_once '../../connection.php';
if (isset($_POST["add_eva"]))
{
  /*$branch = $_POST['branch_id'] ;
    $salaryDate=isset($_POST['salaryDate']) ? $_POST['salaryDate']  : false;
    $worker_id=$_POST['worker_id'] ;
    $super_id=$_POST['super_id'] ;
    $main_days=$_POST['main_days'];
    $main_category=$_POST['main_category'] ;
    $main_salary=$_POST['main_salary'];
    $additional_days=$_POST['additional_days'];
    $additional_category=$_POST['additional_category'];
    $additional_salary=$_POST['additional_salary'];
    $nob_days=$_POST['nob_days'];
    $nob_category=$_POST['nob_category'];
    $nob_salary=$_POST['nob_salary'];*/

  /*  $branch = isset($_POST['branch']) ? $_POST['branch'] : false;

   $txt="select * from 	employee WHERE `department_id`=1 AND `job_title_id`=6 AND `branch_id`= $branch";
   $conn->query($txt);
   $results=$conn->query($txt);
   $total=0;
   while($rows=$results->fetch_assoc()){
     $total++;
   }*/
//echo "السابميت تمام" ;

    for ($count=1 ; $count <= 40  ; $count++) 
      {
        $branch = $_POST['branch2'][$count] ;
        $emp_of_follow_eva_date=$_POST['emp_of_follow_eva_date'] ;
        $employee_code=$_POST['code'][$count] ;
        $emp_finish_complaint=$_POST['emp_finish_complaint'][$count];
        $emp_commonucation=$_POST['emp_commonucation'][$count] ;
        $emp_attendance=$_POST['emp_attendance'][$count];
        $emp_direct_manger=$_POST['emp_direct_manger'][$count];
        $emp_quality_preview=$_POST['emp_quality_preview'][$count];
        $emp_follow_preview=$_POST['emp_follow_preview'][$count];
        $emp_follow_relationship=$_POST['emp_follow_relationship'][$count];
        $emp_collaboration_with_other=$_POST['emp_collaboration_with_other'][$count];
        $emp_finishing_preview=$_POST['emp_finishing_preview'][$count];
        $emp_quality_response=$_POST['emp_quality_response'][$count];
        
        /*echo "السابميت تمام" ;
        echo "<br>";
        echo $branch ;
        echo "<br>";
        echo $emp_of_retail_eva_date ;
        echo "<br>";
        echo $employee_code ;
        echo "<br>";


        echo $emp_finish_complaint ;
        echo "<br>";

        echo $emp_commonucation ;
        echo "<br>";

        echo $emp_attendance ;
        echo "<br>";

        echo $emp_direct_manger ;
        echo "<br>";

        echo $emp_quality_preview ;
        echo "<br>";

        echo $emp_follow_preview ;
        echo "<br>";

        echo $emp_follow_relationship ;
        echo "<br>";

        echo $emp_collaboration_with_other ;
        echo "<br>";

        echo $emp_finishing_preview ;
        echo "<br>";

        echo $emp_quality_response ;*/

      
          $txt='INSERT INTO emp_of_follow_eva (`branch_id`,`emp_of_follow_eva_date`,`employee_code`,
          `emp_finish_complaint`,`emp_commonucation`,`emp_attendance`,
          `emp_direct_manger`,`emp_quality_preview`,`emp_follow_preview`,
          `emp_follow_relationship`,
          `emp_collaboration_with_other`,`emp_finishing_preview`,`emp_quality_response`)
          values ("'.$branch.'","'.$emp_of_follow_eva_date.'","'.$employee_code.'","'.$emp_finish_complaint.'",
          "'.$emp_commonucation.'","'.$emp_attendance.'","'.$emp_direct_manger.'",
          "'.$emp_quality_preview.'","'.$emp_follow_preview.'","'.$emp_follow_relationship.'",
          "'.$emp_collaboration_with_other.'","'.$emp_finishing_preview.'","'.$emp_quality_response.'")';
          $stmt=$conn->prepare($txt);
          $stmt->execute();
        }
      
      if ($txt !=''){
        echo "<script type='text/javascript'>";
        echo "alert('تم تسجيل تقييمات الموظفين بنجاح')";
        echo "</script>";
      }else {
        echo "<script type='text/javascript'>";
        echo "alert('حدث خطأ في تسجيل التقييمات')";
        echo "</script>";     
      }
    }

?>

<?php
require_once 'footer.php';
?>


<script>
    if ( window.history.replaceState ) {,
        window.history.replaceState( null, null, window.location.href );
    }


$(document).ready(function(){
    $(".choose_branch").change(function(){
        var choose_branch = $(this).children("option:selected").val();
    });
});

</script>




<script>
function calcManiDays() {
    let tbl = document.querySelectorAll("table #main_days"),
        sumVal = 0;

    for (let i = 0; i < tbl.length; i++) {
      sumVal += Number(tbl[i].value);
    }
    document.getElementById("total_main_days").innerHTML = sumVal;
  }


  function calcMainSalary() {
    let tbl = document.querySelectorAll("table #main_salary"),
        sumVal = 0;

    for (let i = 0; i < tbl.length; i++) {
      sumVal += Number(tbl[i].value);
    }
    document.getElementById("total_main_salary").innerHTML = sumVal;
  }

  function calcAddidditionalDays() {
    let tbl = document.querySelectorAll("table #additional_days"),
        sumVal = 0;

    for (let i = 0; i < tbl.length; i++) {
      sumVal += Number(tbl[i].value);
    }
    document.getElementById("total_additional_days").innerHTML = sumVal;
  }


  function calcAdditionalSalary() {
    let tbl = document.querySelectorAll("table #additional_salary"),
        sumVal = 0;

    for (let i = 0; i < tbl.length; i++) {
      sumVal += Number(tbl[i].value);
    }
    document.getElementById("total_additional_salary").innerHTML = sumVal;
  }

  function calcNobDays() {
    let tbl = document.querySelectorAll("table #nob_days"),
        sumVal = 0;

    for (let i = 0; i < tbl.length; i++) {
      sumVal += Number(tbl[i].value);
    }
    document.getElementById("total_nob_days").innerHTML = sumVal;
  }


  function calcNobSalary() {
    let tbl = document.querySelectorAll("table #nob_salary"),
        sumVal = 0;

    for (let i = 0; i < tbl.length; i++) {
      sumVal += Number(tbl[i].value);
    }
    document.getElementById("total_nob_salary").innerHTML = sumVal;
  }
  
  
  function calcNetSalary() {
    let tbl = document.querySelectorAll("table #net_salary"),
        sumVal = 0;

    for (let i = 0; i < tbl.length; i++) {
      sumVal += Number(tbl[i].value);
    }
    document.getElementById("total_net_salary").innerHTML = sumVal;
  }
</script>


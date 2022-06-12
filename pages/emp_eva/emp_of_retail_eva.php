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
                        <h1>تقييم موظف المنفذ</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">تقييمات الموظفين</a></li>
                            <li class="active">تقييم موظف المنفذ</li>
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
    $txt="SELECT * FROM employee WHERE `department_id`=1 AND `job_title_id`=6 AND `branch_id`= $branch";
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
$txt="select * from employee WHERE `department_id`=1 AND `job_title_id`=6 AND `branch_id`= $branch";
$conn->query($txt);
$results=$conn->query($txt);
$total=0;
while($rows=$results->fetch_assoc()){
  $total++;
}
?>

<!-- $data="-->
<div class="row" style='margin:40px 30px ;display: flow-root; '>
<form dir='rtl' name='' method='POST' style='text-algin:right;' >
    <div class='col-3'>
      <a type='button' href='print.php' class='btn btn-primary'>طباعة</a>
    </div>
    <div class='col-3'></div>
    <div class='input-group input-group-lg col-5' style=' position: relative;' dir='rtl'>
      <span class='input-group-text' id='inputGroup-sizing-lg'> عدد الموظفين</span>
      <input type='text' class='form-control' style='text-align: center;' id="countnumb" value='<?php echo $total; ?>' name="countnumb" aria-label='Sizing example input;' aria-describedby='inputGroup-sizing-lg' disabled>
    </div>
</form> 
  </div>
<!--";-->

<?php
}

?>



<?php 
require_once '../../connection.php';
$branch = isset($_POST['branch']) ? $_POST['branch'] : false;

 if ($branch) {

$txt="select * from 	employee WHERE `department_id`=1 AND `job_title_id`=6 AND `branch_id`= $branch";
$results=$conn->query($txt);
?>
<!-- $data="-->
<div class="col-md-12" dir="rtl">
                        <div class="card">
                            <div class="card-header" style="text-align: right;">
                                <strong class="card-title">تقييم موظفين منفذ <?php
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

                             <div class="form-group col col-lg-6"><label for="vat" class="form-control-label">التاريخ</label><input type="date" name="emp_of_retail_eva_date" data-date-format="DD MMMM YYYY" id="vat" placeholder="dd-mm-yyyy" class="form-control" required></div> 

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>اسم الموظف</th>
                                            <th style="display:none;">كود الفرع</th>
                                            <th>الرقم الوظيفي</th>
                                            <th>متوسط انتظار العملاء</th>
                                            <th>متوسط الخدمة</th>
                                            <th>الحفاظ علي المواعيد</th>
                                            <th>الالتزام بالمظهر العام</th>
                                            <th>الاخطاء ( طلبات + شكاوي )</th>
                                            <th>خدمات الشباك الواحد</th>
                                            <th>العلاقة مع الموظفين</th>
                                            <th>تعليمات الرئيس المباشر</th>
                                            <th>نسبة انجاز الخدمات</th>
                                            <th>استطلاعات الراي</th>
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
                                                <input type='text' class='form-control main_days' name='emp_avg_wating[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_avg_serv[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_attendance[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_outfit[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_wrongs[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_sub_serv[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_relationship[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_direct_manger[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_performance_percent[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                            <td>
                                              <div class='form-group'>
                                                <input type='text' class='form-control main_days' name='emp_surv[<?php echo $counter; ?>]' id='main_days' value='' >
                                              </div>
                                            </td>
                                        </tr>
                                        <?php
                                          $counter++;
                                            } 
                                          ?>
                                    </tbody>
                                    
                                </table>
                          <div class='card-footer' dir='rtl' style="margin:20px;">
                            <button type='submit' style='width:100%;' name='add_eva' id='' class='btn btn-primary' >تسجيل</button>
                          </div>
                      </div>

                    </form>
                </div>

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
    if ($branch) {
   $txt="select * from 	employee WHERE `department_id`=1 AND `job_title_id`=6 AND `branch_id`= $branch";
   $conn->query($txt);
   $results=$conn->query($txt);
   $total=0;
   while($rows=$results->fetch_assoc()){
     $total++;
   }*/
//echo "السابميت تمام" ;

      for ($count=1 ; $count <= 40 ; $count++) 
      {

       
        $branch = $_POST['branch2'][$count] ;
        $emp_of_retail_eva_date=$_POST['emp_of_retail_eva_date'] ;
        $employee_code=$_POST['code'][$count] ;
        $emp_avg_wating=$_POST['emp_avg_wating'][$count];
        $emp_avg_serv=$_POST['emp_avg_serv'][$count] ;
        $emp_attendance=$_POST['emp_attendance'][$count];
        $emp_outfit=$_POST['emp_outfit'][$count];
        $emp_wrongs=$_POST['emp_wrongs'][$count];
        $emp_sub_serv=$_POST['emp_sub_serv'][$count];
        $emp_relationship=$_POST['emp_relationship'][$count];
        $emp_direct_manger=$_POST['emp_direct_manger'][$count];
        $emp_performance_percent=$_POST['emp_performance_percent'][$count];
        $emp_surv=$_POST['emp_surv'][$count];
        
      /*  echo "السابميت تمام" ;
        echo "<br>";
     

        echo $branch ;
        echo "<br>";
        echo $emp_of_retail_eva_date ;
        echo "<br>";
        echo $employee_code ;
        echo "<br>";


        echo $emp_avg_wating ;
        echo "<br>";

        echo $emp_avg_serv ;
        echo "<br>";

        echo $emp_attendance ;
        echo "<br>";

        echo $emp_outfit ;
        echo "<br>";

        echo $emp_wrongs ;
        echo "<br>";

        echo $emp_sub_serv ;
        echo "<br>";

        echo $emp_relationship ;
        echo "<br>";

        echo $emp_direct_manger ;
        echo "<br>";

        echo $emp_performance_percent ;
        echo "<br>";

        echo $emp_surv ;*/

      
          $txt='INSERT INTO emp_of_retail_eva (`branch_id`,`emp_of_retail_eva_date`,`employee_code`,
          `emp_avg_wating`,`emp_avg_serv`,`emp_attendance`,
          `emp_outfit`,`emp_wrongs`,`emp_sub_serv`,
          `emp_relationship`,
          `emp_direct_manger`,`emp_performance_percent`,`emp_surv`)
          values ("'.$branch.'","'.$emp_of_retail_eva_date.'","'.$employee_code.'","'.$emp_avg_wating.'",
          "'.$emp_avg_serv.'","'.$emp_attendance.'","'.$emp_outfit.'",
          "'.$emp_wrongs.'","'.$emp_sub_serv.'","'.$emp_relationship.'",
          "'.$emp_direct_manger.'","'.$emp_performance_percent.'","'.$emp_surv.'")';
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





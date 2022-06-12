<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
  error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
session_start();
require_once 'header.php';
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom:20px;">
    <!-- Content Header (Page header) -->
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title" >
                        <h1>جميع الموظفين</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="../../home-page.php">الصفحة الرئيسية</a></li>
                            <li class="active">جميع الموظفين</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <?php
require_once '../../connection.php';
$txt="SELECT * FROM `employee` 
INNER JOIN branches ON employee.branch_id=branches.branch_id  
JOIN sectors on branches.sectors_id=sectors.sectors_id 
 ";
$conn->query($txt);
$results=$conn->query($txt);
?>
        <div class="card-body">
          <table id="bootstrap-data-table-export" dir="rtl"  class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>اسم الموظف</th>
                <th>الرقم الوظيفي</th>
                <th>الإدارة</th>
                <th>الفرع</th>
                <th>تفاصيل</th>
              </tr>
            </thead>
            
               
            <tbody>
<?php
$counter=1;
while($rows=$results->fetch_assoc()){
$emp_name=$rows["employee_name"] ;
$emp_code=$rows["employee_code"];
$branch=$rows["branch_name"];
$sector=$rows["sectors_name"];
$department=$rows["department_id"];
$title=$rows["job_title_id"];

?>

            <tr>
              <td>
                <?php echo $emp_name ;?>
              </td>
              <td>
                <?php echo $emp_code; ?>
              </td>
              <td>
                <?php echo $branch ;?>
              </td>
              <td>
                <?php echo $sector ;?>
              </td>
              <td>
                <div class='row'>
                  <div class='col-4'>
                    <a href='profile.php?emp_code=<?php echo $emp_code;?> & department=<?php echo $department;?> & title=<?php echo $title;?>'  style='width:100%; text-align:center; padding: 6px;' class='btn btn-info'>تفاصيل</a>
                  </div>
                  <div class='col-4'>
                    <a href='details-colsed-unit.php?supervaisorName=$supervaisorName & supervaisorID=$supervaisorID & 
                    supervaisorDatebirth=$supervaisorDatebirth & supervaisorNum=$supervaisorNum & supervaisorNum2=$supervaisorNum2 &
                    supervaisorAddress=$supervaisorAddress '  style='width:100%; text-align:center;' class='btn btn-primary'>تعديل </a>
                  </div>
                  <div class='col-4'>
                    <a href='details-colsed-unit.php?supervaisorName=$supervaisorName & supervaisorID=$supervaisorID & 
                    supervaisorDatebirth=$supervaisorDatebirth & supervaisorNum=$supervaisorNum & supervaisorNum2=$supervaisorNum2 &
                    supervaisorAddress=$supervaisorAddress '  style='width:100%; text-align:center;' class='btn btn-danger'>مسح </a>
                  </div>
                </div>
              </td>
            </tr>




<?php
}
?>

            </tbody>
          </table>
        </div>









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





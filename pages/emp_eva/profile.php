<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
  error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
session_start();
require_once 'header.php';
?>

<?php
require_once '../../connection.php';
$emp_code=$_GET['emp_code'];
$department=$_GET['department'];
$title=$_GET['title'];

$txt="SELECT * FROM `employee` 
INNER JOIN branches ON employee.branch_id=branches.branch_id  
JOIN sectors on branches.sectors_id=sectors.sectors_id 
JOIN job_title ON employee.job_title_id = job_title.job_title_id 
JOIN contract_type on employee.contract_type_id = contract_type.contract_type_id 
WHERE `employee_code`= $emp_code; ";
$conn->query($txt);
$results=$conn->query($txt);
$counter=1;
while($rows=$results->fetch_assoc()){
$emp_name=$rows["employee_name"];
$emp_code=$rows["employee_code"];
$branch=$rows["branch_name"];
$sector=$rows["sectors_name"];
$department_id=$rows['department_id'];
$job_title=$rows['job_title_name'];
$contract_tybe=$rows['contract_type_name'];
$employee_id = $rows['employee_id'];
$employee_certification = $rows['employee_certification'];
$employee_phone1 = $rows['employee_phone1'];
$employee_DOB = $rows['employee_DOB'];
$employee_address = $rows['employee_address'];
$employee_status = $rows['employee_status'];
$employee_age = $rows['employee_age'];
$employee_email = $rows['employee_email'];
$employee_co_join = $rows['employee_co_join'];
$employee_years_of_service = $rows['employee_years_of_service'];
$employee_number_of_courses = $rows['employee_number_of_courses'];
$employee_grade = $rows['employee_grade'];
$employee_cs_join = $rows['employee_cs_join'];
$employee_grade = $rows['employee_grade'];
$employee_job_rank = $rows['employee_job_rank'];
$employee_grade = $rows['employee_grade'];
$employee_year_of_graduation = $rows['employee_year_of_graduation'];
$employee_last_course_date = $rows['employee_last_course_date'];
$counter++;
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom:20px;">
    <!-- Content Header (Page header) -->
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title" >
                        <h1>الصفحة الرئيسية للموظف</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">الصفحة الرئيسية</a></li>
                            <li class="active">الصفحة الرئيسية للموظف</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../images/admin.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $emp_name; ?></h3>

                <p class="text-muted text-center"><?php echo $job_title ;?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>الرقم الوظيفي</b> <a class="float-right"><?php echo $_GET['emp_code'] ; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>العمر</b> <a class="float-right"><?php echo $employee_age ;?></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $employee_email ;?></b> 
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#main_info" data-toggle="tab">البيانات الاساسية</a></li>
                  <li class="nav-item"><a class="nav-link" href="#annual_eva" data-toggle="tab">التقييم السنوي</a></li>
                  <li class="nav-item"><a class="nav-link" href="#eva_details" data-toggle="tab">التقيم الشهري تفصيلي</a></li>
                  <li class="nav-item"><a class="nav-link" href="#edit_info" data-toggle="tab">تعديل بيانات الموظف</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                
                  <div class="active tab-pane" id="main_info">

                      <form style="text-align: right;">
                        <div class="card-title retail_eva">
                          <h3 class="text-center">بيانات اساسية</h3>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">رقم الموبايل</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_phone1 ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">الرقم القومي</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_id ?> " readonly>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">الموؤهل الدراسي</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_certification ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">سنة التخرج</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_year_of_graduation ?> " readonly>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">تاريخ الميلاد</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_DOB ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">عمر الموظف</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_age ?> " readonly>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">التقدير</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_grade ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">الحالة الإجتماعية</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_status ?> " readonly>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-12">
                            <label for="exampleInputPassword1" class="form-label">العنوان</label>
                            <input type="textarea" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_address ?> " readonly>
                          </div>
                        </div>

                      </form>
                      <form style="text-align: right;">
                        <div class="card-title retail_eva">
                          <h3 class="text-center"> البيانات الوظيفية</h3>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">الإدارة</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $sector ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">القسم</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $department_id ?> " readonly>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">الوظيفة</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $job_title ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">الحالة الوظيفة</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $contract_tybe ?> " readonly>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">تاريخ الانضمام للشركة</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_co_join ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label"> سنين الخدمة </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_years_of_service ?> " readonly>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="col-sm-12 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">الدرجة الوظيفية</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $employee_grade ?> " readonly>
                          </div>
                          <div class="col-sm-12 col-lg-6">
                          </div>
                        </div>
                        

                      </form>

                  </div>
                  <!-- /.tab-pane -->
                  








                  <div class="tab-pane" id="annual_eva">

                  </div>

                  <!-- /.tab-pane -->
        


                  <?php
require_once '../../connection.php';
if ($_GET['department'] == 1 && $_GET['title'] == 4){
$sql1="SELECT * FROM `employee` INNER JOIN `head_of_retail_eva`
ON employee.branch_id = head_of_retail_eva.branch_id AND employee.employee_code = head_of_retail_eva.employee_code 
AND head_of_retail_eva.`employee_code` = $emp_code; 
";
$conn->query($sql1);
$results=$conn->query($sql1);
$counter=1;
?>
                  <div class="tab-pane" id="eva_details">

                  <table id=""  dir="rtl" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width:10%;">الشهر</th>
                          <th style="width:9%;">متوسط انتظار العملاء</th>
                          <th style="width:9%;">متوسط الخدمة</th>
                          <th style="width:9%;">الحفاظ علي المواعيد</th>
                          <th style="width:9%;">الالتزام بالمظهر العام</th>
                          <th style="width:9%;">الاخطاء ( طلبات + شكاوي )</th>
                          <th style="width:9%;">خدمات الشباك الواحد</th>
                          <th style="width:9%;">العلاقة مع الموظفين</th>
                          <th style="width:9%;">تعليمات الرئيس المباشر</th>
                          <th style="width:9%;">نسبة انجاز الخدمات</th>
                          <th style="width:9%;">استطلاعات الراي</th>
                          <th style="width:9%;">المجموع</th>
                        </tr>
                        </thead>
                        <tbody>  
                          <?php
                            while($rows=$results->fetch_assoc()){
                              $head_of_retail_date = $rows['head_of_retail_eva_date'];
                              $retail_avg_wating = $rows['retail_avg_wating'] ;
                              $retail_paid_orders = $rows['retail_paid_orders'] ;
                              $retail_attendance = $rows['retail_attendance'] ;
                              $retail_cleanliness = $rows['retail_cleanliness'] ;
                              $retail_emp_wrong = $rows['retail_emp_wrong'];
                              $retail_delivering_information =$rows['retail_delivering_information'] ;
                              $retail_relationship_employees = $rows['retail_relationship_employees'] ;
                              $retail_modifications_of_eva = $rows['retail_modifications_of_eva'] ;
                              $retail_pending_orders = $rows['retail_pending_orders'];
                              $retail_pending_signature = $rows['retail_pending_signature'];
                              ?>
                          <tr>
                              <td style="width:10%;"><?php echo $head_of_retail_date;?></td>
                              <td style="width:10%;"><?php echo $retail_avg_wating;?></td>
                              <td style="width:10%;"><?php echo $retail_paid_orders;?></td>
                              <td style="width:10%;"><?php echo $retail_attendance;?></td>
                              <td style="width:10%;"><?php echo $retail_cleanliness;?></td>
                              <td style="width:10%;"><?php echo $retail_emp_wrong;?></td>
                              <td style="width:10%;"><?php echo $retail_delivering_information;?></td>
                              <td style="width:10%;"><?php echo $retail_relationship_employees;?></td>
                              <td style="width:10%;"><?php echo $retail_modifications_of_eva;?></td>
                              <td style="width:10%;"><?php echo $retail_pending_orders;?></td>
                              <td style="width:10%;"><?php echo $retail_pending_signature;?></td>
                              <td style="width:10%;">
                                <?php
                                 echo $retail_avg_wating 
                                 +$retail_paid_orders
                                 +$retail_attendance
                                 +$retail_cleanliness
                                 +$retail_emp_wrong
                                 +$retail_delivering_information
                                 +$retail_relationship_employees
                                 +$retail_modifications_of_eva
                                 +$retail_pending_orders
                                 +$retail_pending_signature;
                                   ?>
                              </td>
                          </tr>
                          <?php
                            $counter++;
                             }
                            ?>
                        </tbody>
                    </table>
                    </div>
                    <?php
                     }
                        elseif($_GET['department'] == 2 && $_GET['title'] == 4){
                          $sql2="SELECT * FROM `employee` INNER JOIN `head_of_follow_eva`
ON employee.branch_id = head_of_follow_eva.branch_id AND employee.employee_code = head_of_follow_eva.employee_code 
AND head_of_follow_eva.`employee_code` = $emp_code; 
";
$conn->query($sql2);
$results=$conn->query($sql2);
$counter=1;
?>
                          <div class="tab-pane" id="eva_details">

                          <table id=""  dir="rtl" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th style="width:10%;">الشهر</th>
                                  <th style="width:9%;">نسبة انهاء الشكاوي</th>
                                  <th style="width:9%;">نسبة التواصل مع العملاء</th>
                                  <th style="width:9%;">ترتيب حضور الموظفين</th>
                                  <th style="width:9%;">تعديلات التقييم و التطوير</th>
                                  <th style="width:9%;"> متابعة المعاينات المتوقفة</th>
                                  <th style="width:9%;">ايصال المعلومة المرسلة</th>
                                  <th style="width:9%;">العلاقة مع الموظفين</th>
                                  <th style="width:9%;">التعاون مع باقي الاقسام</th>
                                  <th style="width:9%;">متابعة انهاء التسويات </th>
                                  <th style="width:9%;">نسبة جودة الرد</th>
                                  <th style="width:9%;">المجموع</th>
                                </tr>
                                </thead>
                                <tbody>  
                                  <?php
                                    while($rows=$results->fetch_assoc()){
                                      $head_of_follow_code = $rows['employee_code'];
                                      $head_of_follow_eva_date = $rows['head_of_follow_eva_date'];
                                      $follow_end_complaints = $rows['follow_end_complaints'];
                                      $follow_contact_with_clients = $rows['follow_contact_with_clients'];
                                      $follow_attendance = $rows['follow_attendance'];
                                      $follow_modifications_of_eva = $rows['follow_modifications_of_eva'];
                                      $follow_previews = $rows['follow_previews'];
                                      $follow_delivering_information =$rows['follow_delivering_information'];
                                      $follow_relationship_employees =$rows['follow_relationship_employees'];
                                      $follow_collaboration_with_other = $rows['follow_collaboration_with_other'];
                                      $follow_settlements = $rows['follow_settlements'];
                                      $follow_response_quality = $rows['follow_response_quality'];

                                      ?>
                                  <tr>
                                      <td style="width:10%;"><?php echo $head_of_follow_eva_date;?></td>
                                      <td style="width:10%;"><?php echo $follow_end_complaints;?></td>
                                      <td style="width:10%;"><?php echo $follow_contact_with_clients;?></td>
                                      <td style="width:10%;"><?php echo $follow_attendance;?></td>
                                      <td style="width:10%;"><?php echo $follow_modifications_of_eva;?></td>
                                      <td style="width:10%;"><?php echo $follow_previews;?></td>
                                      <td style="width:10%;"><?php echo $follow_delivering_information;?></td>
                                      <td style="width:10%;"><?php echo $follow_relationship_employees;?></td>
                                      <td style="width:10%;"><?php echo $follow_collaboration_with_other;?></td>
                                      <td style="width:10%;"><?php echo $follow_settlements;?></td>
                                      <td style="width:10%;"><?php echo $follow_response_quality;?></td>
                                      <td style="width:10%;">
                                        <?php
                                         echo 
                                         $follow_end_complaints
                                         +$follow_contact_with_clients
                                         +$follow_attendance
                                         +$follow_modifications_of_eva
                                         +$follow_previews
                                         +$follow_delivering_information
                                         +$follow_relationship_employees
                                         +$follow_collaboration_with_other
                                         +$follow_settlements
                                         +$follow_response_quality;
                                           ?>
                                      </td>
                                  </tr>
                                  <?php
                                    $counter++;
                                     }
                                    ?>
                                </tbody>
                            </table>
                                    </div>
<?php
}
elseif($_GET['department'] == 1 && $_GET['title'] == 6){
  $sql3="SELECT * FROM `employee` INNER JOIN `emp_of_retail_eva`
ON employee.branch_id = emp_of_retail_eva.branch_id AND employee.employee_code = emp_of_retail_eva.employee_code 
AND emp_of_retail_eva.`employee_code` = $emp_code; 
";
$conn->query($sql3);
$results=$conn->query($sql3);
$counter=1;

?>
                      <div class="tab-pane" id="eva_details">

                      <table id=""  dir="rtl" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th style="width:10%;">الشهر</th>
                              <th style="width:9%;">متوسط انتظار العملاء</th>
                              <th style="width:9%;">متوسط الخدمة</th>
                              <th style="width:9%;">الحفاظ علي المواعيد</th>
                              <th style="width:9%;">الالترزام بالمظهر العام</th>
                              <th style="width:9%;">الاخطاء ( طلبات + شكاوي )</th>
                              <th style="width:9%;">خدمات الشباك الواحد</th>
                              <th style="width:9%;">العلاقة مع الموظفين</th>
                              <th style="width:9%;">تعليمات الرئيس المباشر</th>
                              <th style="width:9%;">نسبة انجاز الخدمات</th>
                              <th style="width:9%;">استطلاعات الرأي</th>
                              <th style="width:9%;">المجموع</th>
                            </tr>
                            </thead>
                            <tbody>  
                              <?php
                                while($rows=$results->fetch_assoc()){
                                $emp_of_retail_eva_date=$rows['emp_of_retail_eva_date'] ;
                                $employee_code=$rows['code'];
                                $emp_avg_wating=$rows['emp_avg_wating'];
                                $emp_avg_serv=$rows['emp_avg_serv'] ;
                                $emp_attendance=$rows['emp_attendance'];
                                $emp_outfit=$rows['emp_outfit'];
                                $emp_wrongs=$rows['emp_wrongs'];
                                $emp_sub_serv=$rows['emp_sub_serv'];
                                $emp_relationship=$rows['emp_relationship'];
                                $emp_direct_manger=$rows['emp_direct_manger'];
                                $emp_performance_percent=$rows['emp_performance_percent'];
                                $emp_surv=$rows['emp_surv'];
                              
                                  ?>
                              <tr>
                                  <td style="width:10%;"><?php echo $emp_of_retail_eva_date;?></td>
                                  <td style="width:10%;"><?php echo $emp_avg_wating;?></td>
                                  <td style="width:10%;"><?php echo $emp_avg_serv;?></td>
                                  <td style="width:10%;"><?php echo $emp_attendance;?></td>
                                  <td style="width:10%;"><?php echo $emp_outfit;?></td>
                                  <td style="width:10%;"><?php echo $emp_wrongs;?></td>
                                  <td style="width:10%;"><?php echo $emp_sub_serv;?></td>
                                  <td style="width:10%;"><?php echo $emp_relationship;?></td>
                                  <td style="width:10%;"><?php echo $emp_direct_manger;?></td>
                                  <td style="width:10%;"><?php echo $emp_performance_percent;?></td>
                                  <td style="width:10%;"><?php echo $emp_surv;?></td>
                                  <td style="width:10%;">
                                    <?php
                                    echo $emp_avg_wating 
                                    +$emp_avg_serv
                                    +$emp_attendance
                                    +$emp_outfit
                                    +$emp_wrongs
                                    +$emp_sub_serv
                                    +$emp_relationship
                                    +$emp_direct_manger
                                    +$emp_performance_percent
                                    +$emp_surv;
                                    ;
                                      ?>
                                  </td>
                              </tr>
                              <?php
                                $counter++;
                                }
                                ?>
                            </tbody>
                        </table>
                                </div>
                                <?php
                      }
elseif($_GET['department'] == 2 && $_GET['title'] == 6){
$sql4="SELECT * FROM `employee` INNER JOIN `emp_of_follow_eva`
ON employee.branch_id = emp_of_follow_eva.branch_id AND employee.employee_code = emp_of_follow_eva.employee_code 
AND emp_of_follow_eva.`employee_code` = $emp_code; 
";
$conn->query($sql4);
$results=$conn->query($sql4);
$counter=1;
?>
                                      <div class="tab-pane" id="eva_details">

                  <table id=""  dir="rtl" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width:10%;">الشهر</th>
                          <th style="width:9%;">انهاء الشكاوي خلال فترة</th>
                          <th style="width:9%;">التواصل مع العملاء</th>
                          <th style="width:9%;">الالتزام بالحضور</th>
                          <th style="width:9%;">تعليمات الرئيس المباشر</th>
                          <th style="width:9%;">الالتزام بنماذج الجودة</th>
                          <th style="width:9%;">متابعة المعاينات المتوقفة</th>
                          <th style="width:9%;">العلاقة مع الموظفين</th>
                          <th style="width:9%;">التعاون مع باقي الاقسام</th>
                          <th style="width:9%;">انهاء التسويات المتوقفة</th>
                          <th style="width:9%;">نسبة جودة الرد</th>
                          <th style="width:9%;">المجموع</th>
                        </tr>
                        </thead>
                        <tbody>  
                          <?php
                            while($rows=$results->fetch_assoc()){
                              $emp_of_follow_eva_date=$rows['emp_of_follow_eva_date'] ;
                              $employee_code=$rows['code'] ;
                              $emp_finish_complaint=$rows['emp_finish_complaint'];
                              $emp_commonucation=$rows['emp_commonucation'] ;
                              $emp_attendance=$rows['emp_attendance'];
                              $emp_direct_manger=$rows['emp_direct_manger'];
                              $emp_quality_preview=$rows['emp_quality_preview'];
                              $emp_follow_preview=$rows['emp_follow_preview'];
                              $emp_follow_relationship=$rows['emp_follow_relationship'];
                              $emp_collaboration_with_other=$rows['emp_collaboration_with_other'];
                              $emp_finishing_preview=$rows['emp_finishing_preview'];
                              $emp_quality_response=$rows['emp_quality_response'];
                          
                              ?>
                          <tr>
                              <td style="width:10%;"><?php echo $emp_of_follow_eva_date;?></td>
                              <td style="width:10%;"><?php echo $emp_finish_complaint;?></td>
                              <td style="width:10%;"><?php echo $emp_commonucation;?></td>
                              <td style="width:10%;"><?php echo $emp_attendance;?></td>
                              <td style="width:10%;"><?php echo $emp_direct_manger;?></td>
                              <td style="width:10%;"><?php echo $emp_quality_preview;?></td>
                              <td style="width:10%;"><?php echo $emp_follow_preview;?></td>
                              <td style="width:10%;"><?php echo $emp_follow_relationship;?></td>
                              <td style="width:10%;"><?php echo $emp_collaboration_with_other;?></td>
                              <td style="width:10%;"><?php echo $emp_finishing_preview;?></td>
                              <td style="width:10%;"><?php echo $emp_quality_response;?></td>
                              <td style="width:10%;">
                                <?php
                                echo $emp_finish_complaint 
                                +$emp_commonucation
                                +$emp_attendance
                                +$emp_direct_manger
                                +$emp_quality_preview
                                +$emp_follow_preview
                                +$emp_follow_relationship
                                +$emp_collaboration_with_other
                                +$emp_finishing_preview
                                +$emp_quality_response;
                                ;
                                  ?>
                              </td>
                          </tr>
                          <?php
                            $counter++;
                            }
                            ?>
                        </tbody>
                    </table>
                            </div>
                            <?php
                      }?>
                  <!-- /.tab-pane -->















                  <div class="tab-pane" id="edit_info">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php
require_once 'footer.php';
?>
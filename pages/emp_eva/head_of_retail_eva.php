
<?php
session_start();
require_once 'header.php';
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>تقييم رئيس المنفذ</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">تقييمات الموظفين</a></li>
                            <li class="active">تقييم رئيس المنفذ</li>
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
    $txt="SELECT * FROM employee WHERE `department_id`=1 AND `job_title_id`=4 AND `branch_id`= $branch";
    $conn->query($txt);
    $results=$conn->query($txt);
    while($rows=$results->fetch_assoc()){
        $head_of_retail_code=$rows["employee_code"] ;
    }
 }
?>

<div style="margin: 30px 20px;">

    <div class="card" dir="rtl" style="text-align:right;">
        <div class="card-header" dir="rtl"><strong>تقييم رئيس المنفذ</strong></div>
        <form method="post">
            <div class="card-body card-block">
                    
                <div class="row retail_eva">  
                    <div class="row col col-lg-6"> 
                        <h3 class="col col-lg-6">اسم رئيس المنفذ</h3>     
                        <div class='form-group' >
                            <input type='text' class='form-control main_days' name='employee_code' id='employee_code' value='<?php
                            require_once '../../connection.php';
                            $branch = isset($_POST['branch']) ? $_POST['branch'] : false;
                            if ($branch) {
                            $txt="SELECT * FROM employee WHERE `department_id`=1 AND `job_title_id`=4 AND `branch_id`= $branch";
                            $conn->query($txt);
                            $results=$conn->query($txt);
                            while($rows=$results->fetch_assoc()){
                                $head_of_follow_name=$rows["employee_name"] ;
                                echo $head_of_follow_name;
                            }
                            }
                            ?>' readonly >
                        </div>
                    </div>  
                    <div class="form-group col col-lg-6"></div> 
                </div>
                <div class="row retail_eva" style="margin-top:20px;">  
                    <div class="row col col-lg-6"> 
                        <h3 class="col col-lg-6">الرقم الوظيفي</h3>     
                        <div class='form-group' >
                            <input type='text' class='form-control main_days' name='employee_code' id='employee_code' value='<?php 
                                require_once '../../connection.php';
                                $branch = isset($_POST['branch']) ? $_POST['branch'] : false;

                                if ($branch) {
                                    $txt="SELECT * FROM employee WHERE `department_id`=1 AND `job_title_id`=4 AND `branch_id`= $branch";
                                    $conn->query($txt);
                                    $results=$conn->query($txt);
                                    while($rows=$results->fetch_assoc()){
                                        $head_of_retail_code=$rows["employee_code"] ;
                                        echo $head_of_retail_code;

                                    }
                                }
                                ?>'readonly >
                        </div>
                    </div>  
                </div>
                <div class="row retail_eva" style="margin-top:20px; display:none;">  
                    <div class="row col col-lg-6"> 
                        <h3 class="col col-lg-6">الفرع</h3>     
                        <div class='form-group' >
                            <input type='text' class='form-control main_days' name='branch2' id='branch2' value=
                            "<?php
                            $branch = isset($_POST['branch']) ? $_POST['branch'] : false;
                            echo $branch;
                            ?>"readonly>
                        </div>
                    </div>  
                </div>
                <div class="row retail_eva" style="margin-top:20px;">  
                    <div class="row col col-lg-6"> 
                        <h3 class="col col-lg-6">التاريخ</h3>     
                        <div class='form-group' >
                            <input type='date' class='form-control main_days' name='head_of_retail_eva_date' id='' required >
                        </div>
                    </div>  
                </div>
                <hr>
                <div class="card-title retail_eva">
                    <h3 class="text-center">حس المسئولية</h3>
                </div>
                <hr>
                <div class="row retail_eva">
                    <div class="form-group col col-lg-6" ><label for="company" class=" form-control-label">متوسط انتظار العملاء داخل المنفذ</label><input type="text" name="retail_avg_wating" id="company" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="vat" class=" form-control-label">نسبة الطلبات المسددة خلال الشهر</label><input type="text" name="retail_paid_orders" id="vat" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <div class="row retail_eva">   
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label">ترتيب حضور و انصراف الموظفين</label><input type="text" name="retail_attendance" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label">الالتزام بنضافة المكان</label><input type="text" name="retail_cleanliness" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <hr>
                <div class="card-title retail_eva">
                    <h3 class="text-center">التطوير و التعاون مع الموظفين</h3>
                </div>
                <hr>
                <div class="row retail_eva">
                    <div class="form-group col col-lg-6" ><label for="company" class=" form-control-label">حصر اخطاء الموظفين ( طلبات + شكاوي )</label><input type="text" name="retail_emp_wrong" id="company" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="vat" class=" form-control-label">ايصال المعلومة المرسلة من القادة الي الموظفين</label><input type="text" name="retail_delivering_information" id="vat" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <div class="row retail_eva">   
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label">العلاقة مع الموظفين</label><input type="text" name="retail_relationship_employees" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label">التعاون مع جهه التقييم</label><input type="text" name="retail_modifications_of_eva" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <hr>
                <div class="card-title retail_eva">
                    <h3 class="text-center">تحقيق النتائج</h3>
                </div>
                <hr>
                <div class="row retail_eva">
                    <div class="form-group col col-lg-6" ><label for="company" class=" form-control-label">نسبة الطلبات المتوقفة علي بند الخزينة</label><input type="text" name="retail_pending_orders" id="company" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="vat" class=" form-control-label">نسبة الطلبات المتوقفة علي بند توقيع مشترك</label><input type="text" name="retail_pending_signature" id="vat" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
            </div>
            <div class="retail_eva" style="text-align: center; margin-bottom: 30px;" >
                <button type="submit" name="submit"  class="btn btn-primary sub" style=" width:50%; text-align: center; ">تسجيل التقييم</button>
            </div>
        </form>
    </div>
</div>


<?php
require_once '../../connection.php';
if (isset($_POST["submit"]))
{ 
    
        $head_of_retail_date = $_POST['head_of_retail_eva_date'];
        $retail_avg_wating = $_POST['retail_avg_wating'];
        $retail_paid_orders = $_POST['retail_paid_orders'];
        $retail_attendance = $_POST['retail_attendance'];
        $retail_cleanliness = $_POST['retail_cleanliness'];
        $retail_emp_wrong = $_POST['retail_emp_wrong'];
        $retail_delivering_information =$_POST['retail_delivering_information'];
        $retail_relationship_employees = $_POST['retail_relationship_employees'];
        $retail_modifications_of_eva = $_POST['retail_modifications_of_eva'];
        $retail_pending_orders = $_POST['retail_pending_orders'];
        $retail_pending_signature = $_POST['retail_pending_signature'];
        $head_of_retail_code=$_POST["employee_code"] ;
        $branch = $_POST['branch2'];

        /*echo $branch;
        echo "<br>";
        echo $head_of_retail_date ;
        echo "<br>";
        echo $retail_avg_wating ;
        echo "<br>";
        echo $retail_paid_orders ;
        echo "<br>";
        echo $retail_attendance ;
        echo "<br>";
        echo $retail_cleanliness ;
        echo "<br>";
        echo $retail_emp_wrong ;
        echo "<br>";
        echo $retail_delivering_information ;
        echo "<br>";
        echo $retail_relationship_employees ;
        echo "<br>";
        echo $head_of_retail_code;
        echo "<br>";
        echo $retail_modifications_of_eva ;
        echo "<br>";
        echo $retail_pending_orders ;
        echo "<br>";
        echo $retail_pending_signature ;
        echo "<br>";
        echo $head_of_retail_code ;*/


     
          $txt='INSERT INTO `head_of_retail_eva` 
          (`branch_id`,`head_of_retail_eva_date`,`employee_code`,`retail_avg_wating`,
          `retail_paid_orders`,`retail_attendance`,`retail_cleanliness`,
          `retail_emp_wrong`,`retail_delivering_information`,`retail_relationship_employees`,
          `retail_modifications_of_eva`,`retail_pending_orders`,`retail_pending_signature`) 
          VALUES ("'.$branch.'" , "'.$head_of_retail_date.'" , "'.$head_of_retail_code.'" , "'.$retail_avg_wating.'" ,
           "'.$retail_paid_orders.'" , "'.$retail_attendance.'" , "'.$retail_cleanliness.'" , 
           "'.$retail_emp_wrong.'" , "'.$retail_delivering_information.'" , "'.$retail_relationship_employees.'" , 
           "'.$retail_modifications_of_eva.'" , "'.$retail_pending_orders.'" , "'.$retail_pending_signature.'" )';
          $stmt=$conn->prepare($txt);
          $stmt->execute();
       
          if($txt !=''){
            echo "<script type='text/javascript'>";
            echo "alert('تم التسجيل بنجاح')";
            echo "</script>";
         }else {
            echo "<script type='text/javascript'>";
            echo "alert('حدث خطأ في تسجيل التقييم')";
            echo "</script>";
          }
    }
?>



<?php
require_once 'footer.php';
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
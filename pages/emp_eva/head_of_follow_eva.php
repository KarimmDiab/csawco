
<?php
session_start();
require_once 'header.php';
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>تقييم رئيس المتابعة</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">تقييمات الموظفين</a></li>
                            <li class="active">تقييم رئيس المتابعة</li>
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
    $txt="SELECT * FROM employee WHERE `department_id`=2 AND `job_title_id`=4 AND `branch_id`= $branch";
    $conn->query($txt);
    $results=$conn->query($txt);
    while($rows=$results->fetch_assoc()){
        $head_of_retail_code=$rows["employee_code"] ;
    }
 }
?>

<div style="margin: 30px 20px;">

    <div class="card" dir="rtl" style="text-align:right;">
        <div class="card-header" dir="rtl"><strong>تقييم رئيس المتابعة</strong></div>
        <form method="post">
            <div class="card-body card-block">
                    
            <div class="row retail_eva">  
                    <div class="row col col-lg-6"> 
                        <h3 class="col col-lg-6">اسم رئيس المتابعة</h3>     
                        <div class='form-group' >
                            <input type='text' class='form-control main_days' name='employee_code' id='employee_code' value='<?php
                            require_once '../../connection.php';
                            $branch = isset($_POST['branch']) ? $_POST['branch'] : false;
                            if ($branch) {
                            $txt="SELECT * FROM employee WHERE `department_id`=2 AND `job_title_id`=4 AND `branch_id`= $branch";
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
                                    $txt="SELECT * FROM employee WHERE `department_id`=2 AND `job_title_id`=4 AND `branch_id`= $branch";
                                    $conn->query($txt);
                                    $results=$conn->query($txt);
                                    while($rows=$results->fetch_assoc()){
                                        $head_of_follow_code=$rows["employee_code"] ;
                                        echo $head_of_follow_code;
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
                            <input type='date' class='form-control main_days' name='head_of_follow_eva_date' id='' required >
                        </div>
                    </div>  
                </div>
                <hr>
                <div class="card-title retail_eva">
                    <h3 class="text-center">إنجاز العمل</h3>
                </div>
                <hr>
                <div class="row retail_eva">
                    <div class="form-group col col-lg-6" ><label for="company" class=" form-control-label">نسبة انهاء الشكاوي خلال فنرة زمنية محددة</label><input type="text" name="follow_end_complaints" id="company" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="vat" class=" form-control-label">نسبة التواصل مع العملاء</label><input type="text" name="follow_contact_with_clients" id="vat" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <div class="row retail_eva">   
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label">ترتيب حضور و انصراف الموظفين</label><input type="text" name="follow_attendance" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label">نسبة انجاز التعديلات الواردة من تقارير التقييم و التطوير</label><input type="text" name="follow_modifications_of_eva" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <hr>
                <div class="card-title retail_eva">
                    <h3 class="text-center">التطوير و التعاون مع التقييم و التطوير</h3>
                </div>
                <hr>
                <div class="row retail_eva">
                    <div class="form-group col col-lg-6" ><label for="company" class=" form-control-label">متابعة المعاينات المتوقفة</label><input type="text" name="follow_previews" id="company" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="vat" class=" form-control-label">ايصال المعلومة المرسلة من القادة الي الموظفين</label><input type="text" name="follow_delivering_information" id="vat" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <div class="row retail_eva">   
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label">العلاقة مع الموظفين</label><input type="text" name="follow_relationship_employees" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="street" class=" form-control-label"> التعاون مع باقي الاقسام لانهاء الشكاوي المتوقفة</label><input type="text" name="follow_collaboration_with_other" id="street" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                </div>
                <hr>
                <div class="card-title retail_eva">
                    <h3 class="text-center">تحقيق النتائج</h3>
                </div>
                <hr>
                <div class="row retail_eva">
                    <div class="form-group col col-lg-6" ><label for="company" class=" form-control-label">متابعة انهاء التسويات المتوقفة</label><input type="text" name="follow_settlements" id="company" placeholder="ادخل درجة التقييم" class="form-control" required></div>
                    <div class="form-group col col-lg-6"><label for="vat" class=" form-control-label">نسبة جودة الرد السليمة</label><input type="text" name="follow_response_quality" id="vat" placeholder="ادخل درجة التقييم" class="form-control" required></div>
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
        $head_of_follow_code = $_POST['employee_code'];
        $head_of_follow_eva_date = $_POST['head_of_follow_eva_date'];
        $follow_end_complaints = $_POST['follow_end_complaints'];
        $follow_contact_with_clients = $_POST['follow_contact_with_clients'];
        $follow_attendance = $_POST['follow_attendance'];
        $follow_modifications_of_eva = $_POST['follow_modifications_of_eva'];
        $follow_previews = $_POST['follow_previews'];
        $follow_delivering_information =$_POST['follow_delivering_information'];
        $follow_relationship_employees =$_POST['follow_relationship_employees'];
        $follow_collaboration_with_other = $_POST['follow_collaboration_with_other'];
        $follow_settlements = $_POST['follow_settlements'];
        $follow_response_quality = $_POST['follow_response_quality'];
        $branch = $_POST['branch2'];

       /* echo $branch ;
        echo "<br>";
        echo $head_of_follow_eva_date ;
        echo "<br>";
        echo $head_of_follow_code ;
        echo "<br>";
        echo $follow_end_complaints ;
        echo "<br>";
        echo $follow_contact_with_clients ;
        echo "<br>";
        echo $follow_attendance ;
        echo "<br>";
        echo $follow_modifications_of_eva ;
        echo "<br>";
        echo $follow_previews ;
        echo "<br>";
        echo $follow_delivering_information ;
        echo "<br>";
        echo $follow_relationship_employees;
        echo "<br>";
        echo $follow_collaboration_with_other ;
        echo "<br>";
        echo $follow_settlements ;
        echo "<br>";
        echo $follow_response_quality ;
        echo "<br>";*/

          $txt='INSERT INTO `head_of_follow_eva` 
          (`branch_id`,`head_of_follow_eva_date`,`employee_code`,
          `follow_end_complaints`,`follow_contact_with_clients`,`follow_attendance`,
          `follow_modifications_of_eva`,`follow_previews`,`follow_delivering_information`,
          `follow_relationship_employees`,`follow_collaboration-with_other`,`follow_settlements`,`follow_response_quality`) 
          VALUES ("'.$branch.'" , "'.$head_of_follow_eva_date.'" , "'.$head_of_follow_code.'" , "'.$follow_end_complaints.'" ,
           "'.$follow_contact_with_clients.'" , "'.$follow_attendance.'" , "'.$follow_modifications_of_eva.'" , 
           "'.$follow_previews.'" , "'.$follow_delivering_information.'" , "'.$follow_relationship_employees.'" , 
           "'.$follow_collaboration_with_other.'" , "'.$follow_settlements.'" , "'.$follow_response_quality.'" )';
          $stmt=$conn->prepare($txt);
          $stmt->execute();
       
          if($txt !=''){
            echo "<script type='text/javascript'>";
            echo "alert('تم اتسجيل التقييم')";
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





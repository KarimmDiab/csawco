<?php
session_start();
require_once 'header.php';
?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Advanced</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong> احصائية الموظفين للإدارة كاملة</strong>
                            </div>
                            <div class='card-footer' dir='rtl' style="margin:20px;">
                                <button type='submit' style='width:100%;' name='add_eva' id='' class='btn btn-primary' >احصائية الموظفين للإدارة كاملة</button>
                            </div>  
                            
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Standard Select</strong>
                            </div>
                            <div class="card-body">
                                <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="sectors">
                                <option selected>اختر الادارة</option>  
                                    <?php
                                        require_once '../../connection.php';
                                        $sql = "select * from sectors";
                                        $result = $conn->query($sql);
                                        while ($rows=$result->fetch_assoc()){?>
                                        <option value='<?php echo $rows['sectors_id']; ?>'><?php echo $rows['sectors_name']; ?></option>
                                        <?php }
                                        echo $sql ;
                                    ?>
                                </select>
                            </div>

                            <div class="card-body">
                                <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="branch">
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
                            </div>

                            <div class="card-body">
                                <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="department">
                                <option selected>اختر القسم</option>  
                                    <?php
                                        require_once '../../connection.php';
                                        $sql = "select * from department";
                                        $result = $conn->query($sql);
                                        while ($rows=$result->fetch_assoc()){?>
                                        <option value='<?php echo $rows['department_id']; ?>'><?php echo $rows['department_name']; ?></option>
                                        <?php }
                                        echo $sql ;
                                    ?>
                                </select>
                            </div>

                            <div class="card-body">
                                <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="contract_type">
                                <option selected>اختر حالة التعاقد</option>  
                                    <?php
                                        require_once '../../connection.php';
                                        $sql = "select * from contract_type";
                                        $result = $conn->query($sql);
                                        while ($rows=$result->fetch_assoc()){?>
                                        <option value='<?php echo $rows['contract_type_id']; ?>'><?php echo $rows['contract_type_name']; ?></option>
                                        <?php }
                                        echo $sql ;
                                    ?>
                                </select>
                            </div>

                            <div class='card-footer' dir='rtl' style="margin:20px;">
                                <button type='submit' style='width:100%;' name='add_eva' id='' class='btn btn-primary' >تسجيل</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php
require_once 'footer.php';
?>

<?php
session_start();
require_once 'header.php';
?>



<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 mt-80">
                <div class="card bg-white  d-flex align-items-center justify-content-center ">
                    <div class="w-100"><img src="images/mustawa.jpg" alt="" class="rounded-circle"></div>
                    <div class="text-center ">
                        <p class="name">تقييم الموظفين</p>
                         <p class="dis pb-4" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur.</p>

                       <button type="button" class="btn btn-light">see more</button>

       
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-80">
                <div class="card bg-white  d-flex align-items-center justify-content-center">
                    <div class="w-100"><img src="images/313.jpg" alt="" class="rounded-circle"></div>
                    <div class="text-center ">
                        <p class="name">الملخص</p>
                        <p class="dis pb-4" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a role="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> تقييم الموظفين</a></li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">تقييم رئيس المنفذ</a></li>
                            <li><a class="dropdown-item" href="#"> تقييم رئيس المتابعة</a></li>
                            <li><a class="dropdown-item" href="#">تقييم موظفين المنفذ</a></li>
                            <li><a class="dropdown-item" href="#">تقييم موظفين المتابعة</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-80">
                <div class="card bg-white  d-flex align-items-center justify-content-center">
                    <div class="w-100"><img src="images/iso.jpg" alt="" class="rounded-circle"></div>
                    <div class="text-center ">
                        <p class="name">ISO</p>
                     <p class="dis pb-4" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur.</p>
                     <button type="button" class="btn btn-light">see more</button>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-80">
                <div class="card bg-white  d-flex align-items-center justify-content-center">
                    <div class="w-100"><img src="images/tata.jpg" alt="" class="rounded-circle"></div>
                    <div class="text-center ">
                        <p class="name"> االعمليات الداخلية(طلبات وشكاوي)</p>
                        <p class="dis pb-4" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur.</p>
                        <button type="button" class="btn btn-light">see more</button>

                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
require_once 'footer.php';
?>

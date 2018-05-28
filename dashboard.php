<?php
include_once('include/get_header.php') ;

?>
            <!---content start-->
            <div class="content">
                    <!---second row-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="green">
                                    <div class="ct-chart" id="dailySalesChart"><h1 style="text-align:center ;padding-top:40px;font-weight:bold;" ><?php echo get_total_certificate() ; ?></h1></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title" style="text-align:center ;">Todal certificate issued</h4>
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i>  <a href="certificate.php">click here view certificate details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="orange">
                                    <div class="ct-chart" id="dailySalesChart"><h1 style="text-align:center ;padding-top:40px;font-weight:bold;" ><?php echo get_total_student() ; ?></h1></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title" style="text-align:center ;">Total student registered</h4>
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i>  <a href="student_list.php">click here view student list</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="red">
                                    <div class="ct-chart" id="dailySalesChart"><h1 style="text-align:center ;padding-top:40px;font-weight:bold;" >1</h1></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title" style="text-align:center ;">Total adminstrator's</h4>
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i>  <a href="student_list.php">click here view admin profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div><!---content end-->

<?php include_once('include/get_footer.php') ; ?>
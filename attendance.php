<?php 
include_once('include/get_header.php');
if( isset( $_POST['submit'] ) && $_POST['submit']=='update'  ){
    /* call the function ,that fetch the data and push to database */
    update_student_attendance() ;
}
?>
            <div class="content">           
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Student Attendance</h4>
                                    <p class="category">Status of user attendance</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Pass Number</th>
                                            <th>Name</th>
                                            <th>Class Attended</th>
                                            <th>Update attenance</th>
                                            <th>Submit</th>                                                                                                                              
                                        </thead>
                                        <tbody>                                            
                                            <!--- php code goes here-->
                                            <?php  
                                             /*
                                              * get student attenance
                                              */
                                              get_student_attendance() ;
                                              
                                            ?>
                                            <!--- php code end -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!---content end-->
<?php
include_once('include/get_footer.php');
?>
            
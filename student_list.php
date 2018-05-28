<?php 
include_once('include/get_header.php');
?>
            <div class="content">           
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">STUDENT ENROLLED IN YHF</h4>
                                    <p class="category">Register user in the course</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>MOBILE</th>
                                            <th>EMAIL</th>
                                            <th>DUE AMOUNT</th>
                                        </thead>
                                        <tbody>                                            
                                            <!--- php code goes here-->
                                            <?php  
                                             /*
                                              * get registered student list
                                              */
                                              get_student_list() ;
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
            
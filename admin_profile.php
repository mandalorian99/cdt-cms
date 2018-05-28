<?php 
include_once('include/get_header.php');

$action = ( isset( $_GET['type'] ) == 'update' )?$_GET['type']:'' ;

if( isset( $_POST['submit'] )  && $_POST['submit']=='update' ){
    /**
     * call function  to UPDATE data into table>registration_details
     */
    update_admin_data()  ;
}
?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!---register user card profile-->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title"><?php echo $action ;?> admin details  </h4>
                                    <p class="category">Here you can update your credentials</p>
                                </div>
                                <div class="card-content">
                                <!---php code here-->
                                <?php                                        
                                    
                                    
                                        /*
                                         * call function to retrive data 
                                         */                                        
                                         //$data = get_admin_data( ) ;
                                                                               
                                        /* now send data array to get_signup_form  */ 
                                        $data = get_admin_data();                                       
                                        get_admin_form( $action ,$data ) ;
                                                              
                                                              
                                   
                                ?>
                                <!--- php code end-->
                                </div>
                            </div><!---card box-->
                        </div><!---profi pic box col-md-8 end-->

                        <!---pic box-->
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="assets/img/faces/marc.jpg" />
                                    </a>
                                </div>                                
                                <div class="content">
                                    <h6 class="category text-gray">Adminstrator</h6>
                                    <h4 class="card-title">Welcome Admin</h4>
                                    <p class="card-content">
                                     You can register a new student and when you need to update existing user delails you can update to .If you want to update your prouile you can follow the button below.
                                    </p>
                                    <a href="#pablo" class="btn btn-primary btn-round">admin profile</a>
                                </div>
                            </div>
                        </div><!---pic box end-->

                    </div><!---row end-->
                </div><!---contianer-fluid end-->
            </div><!---content end-->

<?php 
include_once('include/get_footer.php');
?>
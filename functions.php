<?php
/**
 * UTILITY FUNCTION 
 */
function get_total_certificate(){
    global $conn ;
    $query ='SELECT count(status) as total from certificate_details WHERE status =1';
    $result = mysqli_query($conn , $query) ;
    $row = mysqli_fetch_assoc( $result ) ;
    return( $row['total'] ) ;
}

function get_total_student(){
    global $conn ;
    $query ='SELECT count(user_id) as total from registration_details ';
    $result = mysqli_query($conn , $query) ;
    $row = mysqli_fetch_assoc( $result ) ;
    return( $row['total'] ) ;
}

/**
 * This function display the admin form
 */
function get_admin_form($action ,$data ){
    ?>
                                        <!---form start-->
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Username</label>
                                                        <input type="text" name="admin_name" value="<?php echo $data['username'] ; ?>" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <!---first row end -->
    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Email</label>
                                                        <input type="email" name="admin_email" value="<?php echo $data['email'] ;  ?>"   class="form-control">
                                                    </div>
                                                </div>
                                                
                                            </div><!---second row end-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Password</label>
                                                        <input type="password" name="admin_password" value="<?php echo $data['password'] ;  ?>"   class="form-control" >
                                                    </div>
                                                </div>
                                                
                                            </div><!---third row end-->
    
                                            
                                             
                                              
                                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="update" >
    
                                                
                                            
                                            <div class="clearfix"></div>
    
                                        </form><!---form end-->
    
    <?php
}
/**
 * This funciton fetch the admin credentilas data ,into the form 
 */

function get_admin_data( ){
    global $conn ;
    /*
     * query to fetch data form registration details 
     */
    $query = 'SELECT * FROM admincredentials WHERE id=1 ';
    $result = mysqli_query( $conn , $query ) or die("<h2>ERROR IN QUERING:</h2>".mysqli_query( $conn ) ) ;
    $row =mysqli_fetch_assoc( $result ) ;
    extract( (array)$row ) ;
    //print_r( $row ) ;
    //return array
    return( $row ) ;
}
/**
 * This function update the admin data
 */
function update_admin_data(){
    global $conn ;
    /* fetching user form data */
    $adminName      = $_POST['admin_name'] ;
    $adminEmail     = $_POST['admin_email'] ;
    $adminPassword  = $_POST['admin_password'] ;

    /** query to update admin details  */
    $query = 'UPDATE admincredentials 
              SET username ="'.$adminName.'",
                  email    ="'.$adminEmail.'",
                  password ="'.$adminPassword.'"
              WHERE id = 1
    ';

     mysqli_query( $conn , $query ) or die("Check your sql query :".mysqli_query( $conn ) );
}

/*
 *  This script contains the function , called by the base template
 */

 function add_active_class($page){
     $url = $_SERVER['PHP_SELF'] ;
     $name=basename($url , '.php') ;
     
    if( $page == $name ){
        return( 'class="active"' ) ;
    }else{
        return '' ;
     }
     
 }

/*
 *  function to authrize the user 
 *  If a valid session is set ,
 *  then only this funciton allow to login the user 
 */

 function authrizeUser(){

    if( !isset( $_SESSION['logged'] ) && $_SESSION['logged'] !=1 ){
        //redirect to the login page
        $redirect='index.php' ; 
        header('refresh:2 ; url='.$redirect) ;
        echo'<h2>It seem you are not login ,you are redirect </h2>' ;
        echo'if not ,<a href="index.php?redirect='.$redirect.'">click this link</a>';
        exit() ;
    }

 }

 function loginCheck(){
    /*
     * making database connection global ,to access in function
     */
    global $conn ;

        $userName = mysqli_real_escape_string($conn , $_POST['username']) ;
        $passwd   = mysqli_real_escape_string( $conn , $_POST['password'] ) ;
    
        /*
         * query to match from 
         */
        $query = 'SELECT username FROM admincredentials 
                  WHERE password="'.$passwd.'" AND username="'.$userName.'"  ';
    
        $result = mysqli_query($conn , $query) or die("not quered properly....") ;
    
        if( mysqli_num_rows( $result )  > 0){
            $row=mysqli_fetch_assoc( $result ) ;
            extract( $row ) ;
    
            /*
             * Since user is authrized , start session 
             */
            $redirect='dashboard.php';
            $_SESSION['username'] = $row['username'] ;
            $_SESSION['logged'] = 1 ;
            header('Refresh:0;URL='.$redirect);
        }else{
            /*
             *  Redisplaying login form with ,error validating message
             */
            echo 'Username and password is incorrect';
            displayLoginForm() ;

        }    
}

 /* function to displayu login form */
 function displayLoginForm(){
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Akshaya Patra | Log IN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />

	<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
	<link href="assets/css/font-awesome.css" rel="stylesheet">
    <style>
        #error{
            border-bottom-color:red ;          
        }
    </style>

	<!-- //end-smoth-scrolling -->
	<!---link href="//fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet"-->
</head>

<body>
	
	<div class="agileits-main-grid">

	<div class="right-grid-w3ls text-center" style="border-color:red;">
		<h3>login here</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<div class="img-grid1">
				<img src="assets/img/2.png" alt=" " class="img-responsive" />
			</div>
			<div class="w3ls-icon">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<input type="text" class="user" name="username" placeholder="Username" required="" />
			</div>
			<div class="w3ls-icon">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" class="lock" name="password" placeholder="Password" required="" />
			</div>
			<input type="submit" name="submit" value="login">
		</form>

	</div>

	</div>
	<div class="copy-right w3l-agile">
		<p style="color:purple"> © 2018 All Rights Reserved  by
			<a style="color:black" href="http://thecodestuff.com">Mahendra Choudhary</a>
		</p>
	</div>
	<!---script src="js/jquery-2.1.4.min.js"></script>
	<script>
		$(document).ready(function (c) {
			$('.alert-close').on('click', function (c) {
				$('.content').fadeOut('slow', function (c) {
					$('.content').remove();
				});
			});
		});
	</script---->

</body>

</html>
<?php
 }

 /*
  * This function fetch the list of registered user for the yfh course
  * Here important details of user is displayed , so that whenver require
  * user can update the details of users 
  * Here name of user is supplied by the user_id ,quered in via url
 */

function get_student_list(){
global $conn ;
/*
 * Sql query to fetch the list of registered user
 */ 

 $query = 'SELECT user_id , name , mobile , email , amt_due 
           FROM registration_details 
          ';
 $result = mysqli_query( $conn , $query ) ;
    /* 
    * querying through the fetched data using while  loop
    */
    while( $row = mysqli_fetch_assoc( $result ) ){
        extract( $row ) ; //it enable to use, column name as regular values 
        $fields = array(
            'uid'=>$user_id 
        );
        ?>
            <tr>
                <td class="text-primary">
                    <a href="register.php?<?php echo http_build_query($fields, '', "&") ; ?>"> <?php echo $name ; ?></a>
                </td>
                <td><?php echo $mobile ; ?></td>
                <td><?php echo $email ; ?></td>
                <td <?php echo ($amt_due>0)? 'style="color:red;"' : 'style="color:green ;"' ;?> ><?php echo ( $amt_due >0.0  )? $amt_due :"PAID"; ?></td>
            </tr>
        <?php
    }
 
 }

/**
 * This function  insert or update the form data send by the registration form
 */
function insert_form_data( $action  ){
    global $conn ;        
    //echo"uid->".$uid ;
        /*
         * fetching the input credentials from form 
         */
        $user_id =( isset( $_POST['decoy_user_id'] ) )?$_POST['decoy_user_id']:0 ;
        $name = $_POST['name'] ;
        $gender=$_POST['gender'];
        $age=   $_POST['age'];
        $address=$_POST['address'] ;
        
        $mobileNumber=$_POST['mobile'];
        $passNumber=$_POST['pass_no']; 
        
        $regDay  = $_POST['reg_date']; 
        $regMonth=$_POST['reg_month'];
        $regYear =$_POST['reg_year'] ;
        
        $registerBy=$_POST['registrar_name'] ;
        
        $area= $_POST['area'] ;
        $city=$_POST['city'] ;
        
        $amountPaid=$_POST['amt_paid'] ;
        $amountDue=$_POST['amt_due'] ;
        
        $status=$_POST['registration_type'] ;  
        $email =$_POST['email'] ;
        $occupation = $_POST['occupation'] ;
        /*
         * pushing fetched values into the database
         */    
        
        if( $action =='update' ){
            /**
             * Intiate UPDATE query
             */
            $query='UPDATE registration_details 
            SET registration_type = "'.$status.'",
                pass_no           = "'.$passNumber.'" ,
                name              =  "'.$name.'" ,
                registrar_name    = "'.$registerBy.'",
                reg_date         = "'.$regDay.'",
                reg_month        = "'.$regMonth.'" ,
                reg_year          = "'.$regYear.'" ,
                address           = "'.$address.'" ,
                area              = "'.$area.'",
                city              = "'.$city.'" ,
                gender            = "'.$gender.'",
                age               = "'.$age.'",
                occupation        = "'.$occupation.'",
                mobile            = "'.$mobileNumber.'",
                email             = "'.$email.'" ,
                amt_paid          = "'.$amountPaid.'" ,
                amt_due           = "'.$amountDue.'" WHERE user_id = '.$user_id ;
            

        }else{
            
            $query="INSERT INTO registration_details(
                                                    `registration_type`,
                                                    `pass_no`,
                                                    `name`,
                                                    `registrar_name`
                                                    ,`reg_date`
                                                    ,`reg_month`,
                                                    `reg_year` ,
                                                    `address`,
                                                    `area`,
                                                    `city`,
                                                    `gender`,
                                                    `age`,
                                                    `occupation`,
                                                    `mobile`,
                                                    `email`,
                                                    `amt_paid`,
                                                    `amt_due`
                                                  )VALUES(
                                                    '$status',
                                                    '$passNumber',
                                                    '$name',
                                                    '$registerBy',
                                                    '$regDay',
                                                    '$regMonth',
                                                    '$regYear',
                                                    '$address',
                                                    '$area',
                                                    '$city',
                                                    '$gender',
                                                    '$age',
                                                    '$occupation',
                                                    '$mobileNumber',
                                                    '$email',
                                                    '$amountPaid',
                                                    '$amountDue'
                    )";
        }

         /*querying the sql query*/
         if( $result=mysqli_query( $conn , $query ) ){

             $last_auto_user_id = mysqli_insert_id( $conn ) ;
             insert_key( $last_auto_user_id ) ;
         }else{
             die("failed to perfomr query..") ;
         }
        
        
        
}
/**
 * Inserting last key to other tables 
 */
function insert_key($key){
    global $conn ;
             /**
              * When new user register , put its user_id to the table certificate details
              * and attendance details 
              */
              $query = "INSERT INTO certificate_details(user_id) VALUES('$key') ";
              
              if( !mysqli_query($conn,$query) )
              echo"<h2>not abe to updated certificate</h2>".mysqli_error($conn) ;
              /**
               * inserting new registration user_id into attendance_details 
               */
 
               $query = "INSERT INTO attendance_details(user_id) VALUES( '$key' )  " ;

               if( !mysqli_query($conn,$query) )
               echo"<h2>not abe to updated certificate</h2>".mysqli_error($conn) ;
}
/**
 * This function retrive form data from database ,and return as a array
 */
function get_form_data( $uid ){
    global $conn ;
    /*
     * query to fetch data form registration details 
     */
    $query = 'SELECT * FROM registration_details WHERE user_id ="'.$uid.'" ';
    $result = mysqli_query( $conn , $query ) or die("<h2>ERROR IN QUERING:</h2>".mysqli_query( $conn ) ) ;
    $row =mysqli_fetch_assoc( $result ) ;
    extract( (array)$row ) ;
    //print_r( $row ) ;
    //return array
    return( $row ) ;
}
/**
 * This function fetch student attandance data from database and display as table
 */
function get_student_attendance(){
    global $conn ;
    $query ='SELECT r.pass_no , r.name ,a.user_id, a.class_attended 
            FROM registration_details r INNER JOIN attendance_details a
            ON r.user_id = a.user_id WHERE a.class_attended <= 6
    ';

    $result = mysqli_query($conn ,$query ) or die("Check your sql query:".mysqli_query( $conn ) ) ;    

    while( $row = mysqli_fetch_assoc( $result )  ){
        extract( $row ) ;
        ?>
        <tr>
            <td><?php echo $pass_no ;?></td>
            <td><?php echo $name ;?></td>
            <td><?php echo $class_attended ;?></td>
            <td>
             <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="post" >
                <select name="new-attendance" id="new-attendance">
                    <option value=0>update attenace</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                </select>
            </td>
            <td>  
              <input type="hidden" name="uid" value="<?php echo $user_id ;?>" >
               <input type="submit" name="submit" value="update">
            </form> 
            </td>
        </tr>
        <?php
    }
 }

 /**
  * Update student attendance
  */
  function update_student_attendance(){
      global $conn ;
    /**
     * fetch data 
     */
    $userId       = $_POST['uid'] ;
    $newAttendance= $_POST['new-attendance'] ;
    /**
     * update attendance ,
     */
    $query ='UPDATE attendance_details 
             SET class_attended = "'.$newAttendance.'" 
             WHERE user_id ="'.$userId.'"
    ';

    mysqli_query( $conn , $query ) or die('Check your query :'.mysqli_query($conn) ) ;
  }

/**
 * This function fetch student certificate data from database and display as table
 */
function get_student_certificate(){
    global $conn ;
    $query ='SELECT r.user_id , r.pass_no , r.name ,c.status 
            FROM registration_details r INNER JOIN certificate_details c
            ON r.user_id = c.user_id
    ';

    $result = mysqli_query($conn ,$query ) or die("Check your sql query:".mysqli_query( $conn ) ) ;    

    while( $row = mysqli_fetch_assoc( $result )  ){
        extract( $row ) ;
        ?>
        <tr>
            <td><?php echo $pass_no ;?></td>
            <td><?php echo $name ;?></td>
            <td <?php echo ($status==0)?'style="color:red"':'style="color:green"' ; ?>><?php echo ($status==0 )?"Not issued":"Issued" ;?></td>
            <td>
             <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="post" >
                <select name="new-attendance" id="new-attendance">
                    <option value="">certificate</option>
                    <option value=0>Not issued</option>
                    <option value=1>Issue Certificate</option>
                </select>
            </td>
            <td>  
              <input type="hidden" name="uid" value="<?php echo $user_id ;?>" >
               <input type="submit" name="submit" value="update">
            </form> 
            </td>
        </tr>
        <?php
    }
 }

 /**
  * Update certificate
  */
  function update_student_certificate(){
      global $conn ;
    /**
     * fetch data 
     */
    $userId       = $_POST['uid'] ;
    $newAttendance= $_POST['new-attendance'] ;
    /**
     * update attendance ,
     */
    $query ='UPDATE certificate_details
             SET status = "'.$newAttendance.'" 
             WHERE user_id ="'.$userId.'"
    ';

    mysqli_query( $conn,$query ) or die('Check your query :'.mysqli_query($conn) ) ;
  }

/*
 * User registration  form 
 */
function get_signup_form($action , $data ){
?>
                                    <!---form start-->
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Pass Number</label>
                                                    <input type="text" name="pass_no" value="<?php echo ( !empty( $data ) )?$data['pass_no']:"" ;?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="name" value="<?php echo ( !empty( $data ) )?$data['name']:"" ;?>"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Register By</label>
                                                    <input type="text" name="registrar_name"  value="<?php echo ( !empty( $data ) )?$data['registrar_name']:"" ;?>"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!---first row end -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Mobile Number</label>
                                                    <input type="tel" name="mobile" value="<?php echo ( !empty( $data ) )?$data['mobile']:"" ;?>"   class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" value="<?php echo ( !empty( $data ) )?$data['email']:"" ;?>"  class="form-control">
                                                </div>
                                            </div>
                                        </div><!---second row end-->
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Date</label>
                                                    <input type="text" name="reg_date" value="<?php echo ( !empty( $data ) )?$data['reg_date']:"" ;?>"   class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Month</label>
                                                    <input type="text" name="reg_month" value="<?php echo ( !empty( $data ) )?$data['reg_month']:"" ;?>"   class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Year</label>
                                                    <input type="text" name="reg_year"  value="<?php echo ( !empty( $data ) )?$data['reg_year']:"" ;?>"  class="form-control">
                                                </div>
                                            </div>
                                        </div><!---third row end-->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Adress</label>
                                                    <input type="text" name="address"  value="<?php echo ( !empty( $data ) )?$data['address']:"" ;?>"  class="form-control">
                                                </div>
                                            </div>
                                        </div><!---fourth row end-->

                                        

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Area</label>
                                                    <input type="text" name="area" value="<?php echo ( !empty( $data ) )?$data['area']:"" ;?>"   class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">City</label>
                                                    <input type="text" name="city"  value="<?php echo ( !empty( $data ) )?$data['city']:"" ;?>"   class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Relation Status</label>
                                                    <input type="text" name="registration_type" value="<?php echo ( !empty( $data ) )?$data['registration_type']:"" ;?>"   class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Occupation</label>
                                                    <input type="text" name="occupation"  value="<?php echo ( !empty( $data ) )?$data['occupation']:"" ;?>"  class="form-control">
                                                </div>
                                            </div>                                            
                                        </div><!---6th row end-->

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Amount Paid</label>
                                                    <input type="text" name="amt_paid" value="<?php echo ( !empty( $data ) )?$data['amt_paid']:"" ;?>"   class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Amount Due</label>
                                                    <input type="text" name="amt_due"  value="<?php echo ( !empty( $data ) )?$data['amt_due']:"" ;?>"  class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Gender</label>
                                                    <input type="text"  name="gender" value="<?php echo ( !empty( $data ) )?$data['gender']:"" ;?>"  class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Age</label>
                                                    <input type="text" name="age" value="<?php echo ( !empty( $data ) )?$data['age']:"" ;?>"  class="form-control">
                                                </div>
                                            </div>                                            
                                        </div><!---7th row end-->

                                        
                                        <?php 
                                          if( $action =='update' ){
                                            echo'<input type="hidden" value="'.$data['user_id'].'" name="decoy_user_id" >';
                                            echo'<input type="submit" name="submit" class="btn btn-primary pull-right" value="update" >';

                                          }else{
                                            echo'<input type="submit" name="submit" class="btn btn-primary pull-right" value="register" >';
                                          }    
                                        ?>
                                        <div class="clearfix"></div>

                                    </form><!---form end-->

<?php
}
?>
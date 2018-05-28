<?php
/*
 * Database connection credentials 
 */
define( 'MYSQL_HOST' ,'localhost' ) ;
define( 'MYSQL_USER' ,'root' ) ;/*change this on live server */
define( 'MYSQL_PASSWORD' , '' ) ;/*change this on live server */
define( 'MYSQL_DATABASE' ,'dev_hdev' ) ;

/*connecting to database*/
$conn = mysqli_connect( MYSQL_HOST , MYSQL_USER , MYSQL_PASSWORD , MYSQL_DATABASE ) ;

    if( !$conn )
        echo"database connection is lost:".mysqli_query( $conn )  ;
?>
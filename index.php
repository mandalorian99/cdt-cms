<?php
session_start() ;
require_once('include/db.inc.php') ;
require_once('functions.php') ;
/* 
 * if form is submitted , process form
 */
if( isset( $_SESSION['logged'] ) && $_SESSION['logged']==1 ){
	$redirect='dashboard.php' ;
	header('Refresh:0 ; URL='.$redirect) ;
}
 if( isset( $_POST['submit'] ) && $_POST['submit'] == 'login' ){
	/*
     * calling loginCheck function 
     */
	loginCheck() ;
		
 }else{
	 displayLoginForm() ; 
 }
 
?>
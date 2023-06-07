<?php
/**
 * Student Name:            Shinya Aoi
 * Student ID:              300369796
 * Assignment/File Name:    Assignment2
 * Section:                 001
 * 
 * Description: 
 *      This portion describes the File/Assignment
 * 
 * References:
 *      Please make sure you provide the appropriate url references
 *      or any comment for example if you referenced some help you
 *      received from your instructor or demo code provided in class      
**/
require_once("./inc/Page.class.SAo69796.php");
require_once("./inc/Validate.class.SAo69796.php");

// Make sure to call all your include files


// if the form was posted, validate the input and to update the valid status

//Show the header
Page::getHeader();

// If there was post data and there were errors
// display the error messages and the form
// Note that the correct entry needs to be printed in the form's inputs
if (!empty($_POST)) {
  Validate::validateForm();
}
if (!empty($_POST) && count(Validate::$valid_status) > 0) {
  Page::showForm(Validate::$valid_status);
  Page::ShowErrorMessage(Validate::$valid_status);
} else if (!empty($_POST)) {
  // If there was post data and there were no errors...
  // Display thank you message
  // Display the data
  Page::showThanks();
  Page::showData();
} else {
  // Other than that, display the form
  Page::showForm(Validate::$valid_status);
}
    


// Show the footer
Page::getFooter();

?>
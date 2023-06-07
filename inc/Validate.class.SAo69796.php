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
 *      - https://www.php.net/manual/en/function.preg-match.php
 *      - https://www.w3schools.com/php/filter_validate_int.asp
 *      - https://stackoverflow.com/questions/69207368/constant-filter-sanitize-string-is-deprecated
**/

class Validate{

    static $valid_status=[];
    
    static function validateForm() {
        if (strlen($_POST["fullName"]) == 0) {
            SELF::$valid_status["fullName"] = "Please enter a valid name.";
        }
          
        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            SELF::$valid_status["email"] = "Please enter a valid email address.";
        }
        
        $phoneNumberPattern = "/^\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/";
        $phoneNumber = filter_input(INPUT_POST, "phoneNumber", FILTER_UNSAFE_RAW);
        if (!preg_match($phoneNumberPattern, $phoneNumber)) {
            SELF::$valid_status["phoneNumber"] = "Please enter a valid 10 digits phone number.";
        }
        
        $ageOptions = array('options' => array(
            "min_range" => 13,
            "max_range" => 60
        ));
        if (!filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT, $ageOptions)) {
            SELF::$valid_status["age"] = "The age should be between 13 and 60.";
        }
        
        if (!isset($_POST["profilePic"])) {
            SELF::$valid_status["profilePic"] = "Please choose one of the profile picture.";
        }
               
        if ($_POST["learning"] == "Select...") {
            SELF::$valid_status["learning"] = "Please select one of the learning paths!";
        }
    }
}
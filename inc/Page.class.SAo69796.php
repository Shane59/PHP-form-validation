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
require_once("config.inc.php");

class Page{
    static private $title="Assignment 2: Form Processing by " . STUDENT_NAME . " (" . STUDENT_ID . ")";

    static function getHeader(){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="author" content="">
            <title><?= self::$title ?></title>        
            <link href="css/styles.css" rel="stylesheet">
        </head>
        <body>
        <header>
            <h1><?= self::$title ?></h1>
        </header>
        <section class="main">
        <?php
    }

    static function getFooter(){
        ?>
        </body>
        </html>     
        <?php
    }

    static function showForm($valid_status){
        ?>
            <div class="form">
                <form action="" method="post">
                    <fieldset id="form">
                        <legend>User Registration Page</legend>
                        <div>                                
                            <label for="fullName">Full Name</label>
                            <input
                                type="text"
                                name="fullName"
                                id="fullName"
                                placeholder="First and last name"
                                <?php
                                    if (!empty($_POST) && !isset($valid_status["fullName"])) {
                                        echo "value='{$_POST['fullName']}'";
                                    }
                                ?>
                            >
                        </div>
                        <div>                                
                            <label for="email">Email Address</label>
                            <input 
                                ype="email"
                                name="email"
                                id="email"
                                placeholder="someone@here.ca"
                                <?php
                                    if (!empty($_POST) && !isset($valid_status["email"])) {
                                        echo "value='{$_POST['email']}'";
                                    }
                                ?>
                            >
                        </div>                              
                        <div>
                            <label for="phoneNumber">Phone Number</label>
                            <input
                                type="text"
                                name="phoneNumber"
                                id="phoneNumber"
                                placeholder="(nnn) nnn nnnn"
                                <?php
                                    if (!empty($_POST) && !isset($valid_status["phoneNumber"])) {
                                        echo "value='{$_POST['phoneNumber']}'";
                                    }
                                ?>
                            >
                        </div>                                                          
                        <div>
                            <label for="age">Age</label>
                            <input
                                type="text"
                                name="age"
                                id="age"
                                placeholder="age between 13 and 60"
                                <?php
                                    if (!empty($_POST) && !isset($valid_status["age"])) {
                                        echo "value='{$_POST['age']}'";
                                    }
                                ?>
                            >
                        </div>                                                
                        <div>
                            <label for="profilePic">Profile Picture</label>
                            <div class="button">
                                <span>
                                    <input
                                        type="radio"
                                        name="profilePic"
                                        id="profilePic1"
                                        value="profile1"
                                        <?php 
                                            if (!empty($_POST) && isset($_POST["profilePic"])) {
                                                if ($_POST["profilePic"] == 'profile1') {
                                                    echo "checked";
                                                }
                                            }
                                        ?>
                                    >
                                    <img src="images/profile1.png">
                                    <input
                                        type="radio"
                                        name="profilePic"
                                        id="profilePic2"
                                        value="profile2"
                                        <?php 
                                            if (!empty($_POST) && isset($_POST["profilePic"])) {
                                                if ($_POST["profilePic"] == 'profile2') {
                                                    echo "checked";
                                                }
                                            }
                                        ?>
                                    >
                                    <img src="images/profile2.png">                    
                                    <input
                                        type="radio"
                                        name="profilePic"
                                        id="profilePic3"
                                        value="profile3"
                                        <?php 
                                            if (!empty($_POST) && isset($_POST["profilePic"])) {
                                                if ($_POST["profilePic"] == 'profile3') {
                                                    echo "checked";
                                                }
                                            }
                                        ?>
                                    >
                                    <img src="images/profile3.png">
                                    <input
                                        type="radio"
                                        name="profilePic"
                                        id="profilePic4"
                                        value="profile4"
                                        <?php 
                                            if (!empty($_POST) && isset($_POST["profilePic"])) {
                                                if ($_POST["profilePic"] == 'profile4') {
                                                    echo "checked";
                                                }
                                            }
                                        ?>
                                    >
                                    <img src="images/profile4.png">                                        
                                </span>
                            </div>
                        </div>
                        <div>
                            <label for="learning">Learning Path</label>
                            <select name="learning">
                                <option
                                    value="Select..."
                                >Please select one option</option>
                                <option
                                    value="data"
                                    <?php 
                                        if (!empty($_POST) && isset($_POST["learning"])) {
                                            if ($_POST["learning"] == 'data') {
                                                echo "selected";
                                            }
                                        }
                                    ?>
                                >Data Science</option>
                                <option
                                    value="software"
                                    <?php 
                                        if (!empty($_POST) && isset($_POST["learning"])) {
                                            if ($_POST["learning"] == 'software') {
                                                echo "selected";
                                            }
                                        }
                                    ?>
                                >Software Developer</option>
                                <option
                                    value="cyber"
                                    <?php 
                                        if (!empty($_POST) && isset($_POST["learning"])) {
                                            if ($_POST["learning"] == 'cyber') {
                                                echo "selected";
                                            }
                                        }
                                    ?>
                                >CyberSecurity</option>
                            </select>
                        </div>                  
                        <div>
                            <input type="submit" name="submit" value="Submit Registration">
                            <input type="reset" name="reset" value="Clear Data">
                        </div>
                    </fieldset>
                </form>
            </div>
        <?php
    }

    static function ShowErrorMessage($valid_status){
        ?>
            <div class="highlight">
                <p>Please fix the following errors:</p>
                <ul>
                <?php
                    foreach($valid_status as $message) {
                        echo "<li>{$message}</li>";
                    }
                ?>
                </ul>                                        
            </div>
        <?php
    }

    static function showThanks(){
        ?>
            <div class="highlight">
                <h2>
                    Your registration has been submitted.<br>
                </h2>                                  
            </div>
        <?php
    }

    static function showData(){
        ?>
            <div class="data">
                <b>Entered data is:</b>
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?= $_POST["fullName"] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $_POST["email"] ?></td>
                    </tr>
                    <tr>
                    <th>Phone</th>
                    <td><?= $_POST["phoneNumber"] ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?= $_POST["age"] ?></td>
                    </tr>                        
                    <tr>
                        <th>Profile Picture</th>
                        <td>
                            <?php
                                switch ($_POST["profilePic"]) {
                                    case 'profile1':
                                        echo "<img src='../images/profile1.png'";
                                        break;
                                    case 'profile2':
                                        echo "<img src='../images/profile2.png'";
                                        break;
                                    case 'profile3':
                                        echo "<img src='../images/profile3.png'";
                                        break;
                                    default:
                                        echo "<img src='../images/profile4.png'";
                                        break;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>                            
                        <th>Learning Path</th>                        
                        <td><?= $_POST["learning"] ?></td>                        
                    </tr>
                </table>
            </div>
        <?php
    }
}
?>
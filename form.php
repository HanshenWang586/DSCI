<?php
include "nav.php";


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// variables for the classroom purposes to help find errors.

$debug = false;

// This if statement allows us in the classroom to see what our variables are
// This is NEVER done on a live site 
if (isset($_GET["debug"])) {
    $debug = true;
}

if ($debug) {
    print "<p>DEBUG MODE IS ON</p>";
}

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.

$thisURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form


$email = "hanshen.wang@du.edu";
$firstName = "Hanshen";
$lastName = "Wang";
$gender = "Male";
$preference = "Denver";
$preference2 = "Kunming";
$places = "Europe";
$hiking = true;    // checked
$kayaking = false; // not checked
$biking = true;
$safaripark = false;
$scubadiving = true;
$camping = false;
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.


$emailERROR = false;
$firstNameERROR = false;
$lastNameERROR = false;


////%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.

$errorMsg = array();

// array used to hold form values that will be written to a CSV file

$dataRecord = array();
// have we mailed the information to the user?
$mailed = false;


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
if (isset($_POST["btnSubmit"])) {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    // 
    if (!securityCheck($thisURL)) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.

    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");

    $dataRecord[] = $firstName;

    $lastName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");

    $dataRecord[] = $lastName;


    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);

    $dataRecord[] = $email;
    $places = htmlentities($_POST["lstInterest"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $places;
    $gender = htmlentities($_POST["radGender"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $gender;
    $preference = htmlentities($_POST["radPrefencetype"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $preference;
    $preference2 = htmlentities($_POST["radPrefencetype2"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $preference2;
    if (isset($_POST["chkHiking"])) {
        $hiking = true;
    } else {
        $hiking = false;
    }
    $dataRecord[] = $hiking;
    if (isset($_POST["chkKayaking"])) {
        $kayaking = true;
    } else {
        $kayaking = false;
    }
    $dataRecord[] = $kayaking;
    if (isset($_POST["biking"])) {
        $biking = true;
    } else {
        $biking = false;
    }
    $dataRecord[] = $biking;
    if (isset($_POST["safaripark"])) {
        $safaripark = true;
    } else {
        $safaripark = false;
    }
    $dataRecord[] = $safaripark;
    if (isset($_POST["scubadiving"])) {
        $scubadiving = true;
    } else {
        $scubadiving = false;
    }
    $dataRecord[] = $scubadiving;
    if (isset($_POST["camping"])) {
        $camping = true;
    } else {
        $camping = false;
    }
    $dataRecord[] = $camping;

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.




    if ($firstName == "") {

        $errorMsg[] = "Please enter your first name";

        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {

        $errorMsg[] = "Your first name appears to have extra character.";

        $firstNameERROR = true;
    }
    if ($lastName == "") {

        $errorMsg[] = "Please enter your last name";

        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($lastName)) {

        $errorMsg[] = "Your last name appears to have extra character.";

        $firstNameERROR = true;
    }




    if ($email == "") {
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Your email address appears to be incorrect.";
        $emailERROR = true;
    }


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //    
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";


        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2e Save Data
        //
        // This block saves the data to a CSV file.
        $fileExt = "registration.csv";
        $myFileName = "data/registration"; // NOTE YOU MUST MAKE THE FOLDER !!!

        $filename = $myFileName . $fileExt;

        if ($debug) {
            print "\n\n<p>filename is " . $filename;
        }

        // now we just open the file for append
        $file = fopen($filename, 'a');

        // write the forms informations
        fputcsv($file, $dataRecord);

        // close the file
        fclose($file);

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2f Create message
        //
        // build a message to display on the screen in section 3a and to mail
        // to the person filling out the form (section 2g).

        $message = '<h2>Join us today!</h2>';

        foreach ($_POST as $key => $value) {
            $message .= "<p>";

            // breaks up the form names into words. for example
            // txtFirstName becomes First Name
            $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));

            foreach ($camelCase as $one) {
                $message .= $one . " ";
            }

            $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";
        }




        // breaks up the form names into words. for example
        // txtFirstName becomes First Name

        $to = $email; // the person who filled out the form
        $cc = "";
        $bcc = "";

        $from = "Auto-Confirmation message <hanshen.wang@du.edu>";

        // subject of mail should make sense to your form
        $todaysDate = strftime("%x");
        $subject = "you are registered!: " . $todaysDate;

        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);










        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2g Mail to user
        //
        // Process for mailing a message which contains the forms data
        // the message was built in section 2f.
        // subject of mail should make sense to your form
    } // end form is valid
}    // ends if form was submitted.
//#############################################################################
//
// SECTION 3 Display Form
//
?>

<article id="main">

    <?php
//####################################
//
// SECTION 3a. 
// 
// If its the first time coming to the form or there are errors we are going
// to display the form.
    if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit 
        print "<h1>Your Request has been processed</h1>";
        print $message;
    }
    ?>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="shortcut icon" href="http://example.com/myicon.ico" />
    <style>

        nav, footer {
            height: 50px;
            width:100%;
            background-image: url("images/denbackground.jpg");
            filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')";
            -moz-background-size:100%, 100%;
            background-size: 100%, 100%;
        }



        nav ul {
            margin: 0px;
            padding: 10px 5px 10px 30px;
        }

        nav li {	
            display: inline;
            font-size: 150%;
            font-family: Georgia;
            margin-right: 80px;
        }

        footer {
            margin: 0px;
            margin-left: 0px;
            text-align: center;
            width: 100%;
            display: inline;
            font-size: 150%;
            font-family: Georgia;
            color: rgb(230,219,118);
            padding: 10px 5px 10px 30px;
            clear:both;
        }

        nav li a {
            color: rgb(230,219,118);
        }

        nav li a:hover, nav li a.current {

            color: lightblue;}

        nav{ 
            height:50px; 
            width:100%;
            position:fixed;
            top:0; 
            left:0; 
            right:0;
            z-index:999; 
        }
        .wrapperTwo legend{
            font-family: cursive;
            color: white;
            font-size: 250%;
            font-weight: bold;
        }
        .wrapper{
            background-image: url("images/back8.jpg");
            -moz-background-size:100%, 100%;
            background-size: 100%, 100%;
        }
        .wrapper label{
            font-family: times;
            color: white;
            font-size: 150%;
            font-weight: bold;
        }
    </style>
    <link rel="formstyle" type="text/css" href="formstyle.css">
    <form action="<?php print $phpSelf; ?>"
          method="post"
          id="frmRegister">

        <fieldset class="wrapper">
            <legend>Register Today</legend>
            <img src="images/joinus.jpg" style="height:200px;width: 1000px;opacity: 0.85; box-shadow: 0 18px 23px 0 rgba(0, 0, 0, 0.5), 0 20px 60px 0 rgba(0, 0, 0, 0.6);
                 ">
            <br>
            <br>
            <br>
            <fieldset class="wrapperTwo">
                <legend>Please complete the following form</legend>

                <fieldset class="contact">
                    <legend>Contact Information</legend>

                    <label for="txtFirstName" class="required">First Name</label>
                    <input type="text" 
                           id="txtFirstName" 
                           name="txtFirstName"
                           value="<?php print $firstName; ?>"
                           tabindex="120" 
                           maxlength="45" 
                           placeholder="Enter your first name"
                           <?php if ($emailERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()"
                           autofocus
                           >
                    <label for="txtLastName" class="required">Last Name</label>
                    <input type="text" 
                           id="txtLastName" 
                           name="txtLastName"
                           value="<?php print $lastName ?>"
                           tabindex="120" 
                           maxlength="45" 
                           placeholder="Enter your first name"
                           <?php if ($emailERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()"

                           >

                    <label for="txtEmail" class="required">Email</label>
                    <input type="text" 
                           id="txtEmail" 
                           name="txtEmail"
                           value="<?php print $email; ?>"
                           tabindex="120" 
                           maxlength="45" 
                           placeholder="Enter a valid email address"
                           <?php if ($emailERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()"

                           >




                </fieldset> <!-- ends contact -->
                <fieldset class="interests"><!-- adding interest-->
                    <label for="interests">Select the places you have interest in:
                        <select id="interests" 
                                name='lstInterest' 
                                >
                            <option value = ''>Select</option>
                            <option value = 'Europe'>Europe</option>
                            <option value = 'Asia'>Asia</option>
                            <option value = 'North America'>North America</option>
                            <option value = 'South America'>South America</option>
                            <option value = 'Africa'>Africa</option>
                            <option value = 'Australia'>Australia</option>
                        </select>
                    </label>  
                </fieldset><!-- ending interest-->
                <fieldset class="radio">

                    <legend>Select your gender</legend>
                    <label><input type="radio" 

                                  id="radGenderMale" 

                                  name="radGender" 

                                  value="Male"

                                  <?php if ($gender == "Male") print 'checked' ?>
                                  tabindex="330">Male</label>



                    <label><input type="radio" 

                                  id="radGenderFemale" 

                                  name="radGender" 

                                  value="Female"

                                  <?php if ($gender == "Female") print 'checked' ?>

                                  tabindex="340">Female</label>
                </fieldset>
                <fieldset>
                    <legend>Select the side you prefer working with</legend>
                    <label><input type="radio" 

                                  id="single" 

                                  name="radPrefencetype" 

                                  value="single"

                                  <?php if ($preference == "single") print 'checked' ?>
                                  tabindex="330">Denver</label>



                    <label><input type="radio" 

                                  id="group" 

                                  name="radPrefencetype" 

                                  value="group"

                                  <?php if ($preference == "group") print 'checked' ?>

                                  tabindex="340">Kunming</label>
                </fieldset>
                <fieldset>
                    <label><input type="radio" 

                                  id="domestic" 

                                  name="radPrefencetype2" 

                                  value="domestic"

                                  <?php if ($preference2 == "domestic") print 'checked' ?>

                                  tabindex="340">domestic</label>
                    <label><input type="radio" 

                                  id="international" 

                                  name="radPrefencetype2" 

                                  value="international"

                                  <?php if ($preference2 == "international") print 'checked' ?>

                                  tabindex="340">international</label>


                </fieldset>
                <fieldset class="checkbox">
                    <legend>Do you like (check all that apply):</legend>
                    <label><input type="checkbox" 
                                  id="chkHiking" 
                                  name="chkHiking" 
                                  value="Hiking"
                                  <?php if ($hiking) print " checked "; ?>
                                  tabindex="420"> Hiking</label>

                    <label><input type="checkbox" 
                                  id="chkKayaking" 
                                  name="chkKayaking" 
                                  value="Kayaking"
                                  <?php if ($kayaking) print " checked "; ?>
                                  tabindex="430"> Kayaking</label>
                    <label><input type="checkbox" 
                                  id="chkBiking" 
                                  name="chkBiking" 
                                  value="Biking"
                                  <?php if ($biking) print " checked "; ?>
                                  tabindex="420"> Biking</label>
                    <label><input type="checkbox" 
                                  id="chksafaripark" 
                                  name="chksafaripark" 
                                  value="Safari Park"
                                  <?php if ($safaripark) print " checked "; ?>
                                  tabindex="420"> Safari Park</label>
                    <label><input type="checkbox" 
                                  id="chkscubadiving" 
                                  name="chkscubadiving" 
                                  value="Scuba Diving"
                                  <?php if ($scubadiving) print " checked "; ?>
                                  tabindex="420"> Scuba Diving</label>
                    <label><input type="checkbox" 
                                  id="chkCamping" 
                                  name="chkCamping" 
                                  value="Camping"
                                  <?php if ($camping) print " checked "; ?>
                                  tabindex="420"> Camping</label>
                </fieldset>

            </fieldset> <!-- ends wrapper Two -->

            <fieldset class="buttons">

                <input type="submit" id="btnSubmit" name="btnSubmit" value="Register" tabindex="900" class="button">
            </fieldset> <!-- ends buttons -->

        </fieldset> <!-- Ends Wrapper -->
    </form>

    <?php
    // end body submit
    ?>

</article>
</body>

<?php include "footer.php"; ?>

</html>
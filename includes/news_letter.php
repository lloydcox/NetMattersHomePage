<?php 
require('includes/connection.php');
?>

<!-- Newsletter sign up  -->
<!-- <div class="news-letter">
    <div class="container">
        <div class="inner-news">
            <div class="news-title">
                <h2> Email Newsletter Sign-up</h2>
            </div>
                <div class="news-boxes">
                    <div class="box-name">
                        <label class="label-n">Your Name</label>
                        <input class="input" required="required">
                    </div>
                        <div class="box-email">
                            <label class="label-n">Your Email</label>
                            <input class="input">
                        </div>
                </div>
                    <div class="consent">
                        <div class="checkbox">
                            <input class="tick-box" type="checkbox" id ="check-box1" value ="" required>
                            <div class="label">
                                <label class="tickbox-text" for="checkbox">	Please tick this box if you wish to receive marketing information from us. Please see our 
                                <a class="privacy-policy" href="#">Privacy Policy</a> for more information on how we use your data</label>
                            </div>
                        </div> 
                    </div>
        </div>
    </div>
</div> -->

<div class="contact-form-details news-letter">
    <div class="container mt-5">
        <div class="inner-news">
            <div class="news-title">
                <h2> Email Newsletter Sign-up</h2>
            </div>

            <!-- contact form php  -->
            <?php
                include('includes/database.php');
                include('includes/validate.php');
                if( !empty( $_POST ) ) {

                    if((isset($name)) && (isset($email))){

                        if(!empty($_POST["send"])) {
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                        }
                    }   
                }                  
            ?>
    

            <!-- Contact form -->
                <form class="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="contactForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="contact-label">Your Name<span class="error">*<?php echo $nameErr;?></span></label>
                        <input type="text" class="form-control" name="name" id="name">

                        
                    </div>
                    <div class="form-group">
                        <label class="contact-label">Your Email<span class="error">*<?php echo $emailErr;?></span></label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                    <div class="checkbox">
                        <input class="tick-box" type="checkbox" name="marketing" id ="marketing" value ="" >
                        <?php
                            if (isset($_POST['marketing'])) {
                                $marketing = true;
                            } 
                            ?>
                        <div class="label">
                            <label class="tickbox-text" for="checkbox">	Please tick this box if you wish to receive marketing information from us. Please see our 
                            <a class="privacy-policy" href="#">Privacy Policy</a> for more information on how we use your data</label>
                        </div>
                    </div>    

                    <?php 
                    // Store contactor data in database
                    if ((isset($_POST["name"])) && (isset($_POST["email"])) ) {
                    $sql = $connection->query("INSERT INTO newsletter( name, email, marketing, reg_date)
                    VALUES ('{$name}', '{$email}', '{$marketing}', now())");

                        if(!$sql) {
                            die("MySQL query failed.");
                            } if ($marketing = true) {
                                $response = array(
                                    "status" => "alert-success",
                                    "message" => "We have received your details and stored your information.
                                        You will now receive our Newsletter and marketing emails."                                        
                                );     
                            }
                            else {
                            $response = array(
                                "status" => "alert-success",
                                "message" => "We have received your details and stored your information. You will now receive our Newsletter."
                            );              
                        }
                    }
                    ?>

                    <div class="news-button">
                        <input id="checkBtn" class="contact-button-submit" type="submit" name="submit" value="Send Enquiry" required>
                    </div>              
                </form>
            <?php 
                if(isset($_POST["submit"])) {
                if(!empty($response)) {?>
                        <div class="alert text-center <?php echo $response['status']; ?>" role="alert">
                            <?php echo $response['message']; ?>
                        </div>
            <?php } ?>
            <script type="text/javascript">
            window.location = "index.php";
            </script> 
        <?php
            }
        ?>
        </div>
    </div>
</div>
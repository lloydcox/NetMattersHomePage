<?php

include('includes/header.php');
require('includes/connection.php');
?>

<div class="container">

        <div class="heading">
            <div class="home-title"><p class="contact-home-title"><strong>Home</strong > / How can we help you?</p>
            </div>
        </div>
</div>  
<div class="contact-container">      
    <div class="container">
        <div class="contact-main">
            <div class="how-can">
                <h2 class="how-can-title">How can we help you?</h2>
            </div>

                <div class="contact-form-details">
                    <div class="container form-container mt-5">
                            <!-- contact form php  -->
                            <?php
                                include('includes/database.php');

                                // define variables and set to empty values
                                $nameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";
                                $name = $email = $phone = $subject = $message = "";

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($_POST["name"])) {
                                    $nameErr = "Name is required";
                                } else {
                                    $name = test_input($_POST["name"]);
                                }

                                if (empty($_POST["email"])) {
                                    $emailErr = "Email is required";
                                } else {
                                    $email = test_input($_POST["email"]);
                                }

                                if (empty($_POST["phone"])) {
                                    $phoneErr = "Phone is required";
                                } else {
                                    $phone = test_input($_POST["phone"]);
                                }

                                if (empty($_POST["subject"])) {
                                    $subjectErr = "Subject is required";
                                } else {
                                    $comment = test_input($_POST["subject"]);
                                }

                                if (empty($_POST["message"])) {
                                    $messageErr = "A message is required";
                                } else {
                                    $message = test_input($_POST["message"]);
                                }
                                }

                                function test_input($data) {
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);
                                    return $data;
                                  }

                                if(!empty($_POST["send"])) {
                                    $name = $_POST["name"];
                                    $email = $_POST["email"];
                                    $phone = $_POST["phone"];
                                    $subject = $_POST["subject"];
                                    $message = $_POST["message"];

                                    // Recipient email
                                    $toMail = "lloydcox13@aol.com";
                                    
                                    // Build email header
                                    $header = "From: " . $name . "<". $email .">\r\n";

                                    // Send email
                                    if(mail($toMail, $subject, $message, $header)) {

                                        // Store contactor data in database
                                        $sql = $connection->query("INSERT INTO contacts_list(name, email, phone, subject, message, sent_date)
                                        VALUES ('{$name}', '{$email}', '{$phone}', '{$subject}', '{$message}', now())");

                                        if(!$sql) {
                                        die("MySQL query failed.");
                                        } else {
                                        $response = array(
                                            "status" => "alert-success",
                                            "message" => "We have received your query and stored your information. We will contact you shortly."
                                        );              
                                        }
                                        } else {
                                            $response = array(
                                                "status" => "alert-danger",
                                                "message" => "Message coudn't be sent, try again"
                                            );
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

                            <div class="form-group">
                                <label class="contact-label">Your Phone<span class="error">*<?php echo $phoneErr;?></span></label>
                                <input type="text" class="form-control" name="phone" id="contact-phone">
                            </div>

                            <div class="form-group">
                                <label class="contact-label">Subject<span class="error">*<?php echo $subjectErr;?></span></label>
                                <input type="text" class="form-control" name="subject" id="subject">
                            </div>

                            <div class="form-group-message">
                                <label class="contact-label">Message<span class="error">*<?php echo $messageErr;?></span></label>
                                <textarea class="form-control-message" name="message" id="message" rows="4"></textarea>
                            </div>

                            <div class="checkbox">
                                <input class="tick-box" type="checkbox" id ="check-box" value ="" required>
                                <div class="label">
                                    <label class="tickbox-text" for="checkbox">	Please tick this box if you wish to receive marketing information from us. Please see our 
                                    <a class="privacy-policy" href="https://www.netmatters.co.uk/privacy-policy">Privacy Policy</a> for more information on how we use your data</label>
                                </div>
                            </div>    

                            <div>
                                <input id="checkBtn" class="contact-button-submit" type="submit" name="send" value="Send Enquiry" required>
                            </div>              
                        </form>
                            <!-- Message -->
                            <?php if(!empty($response)) {?>
                                <div class="alert text-center <?php echo $response['status']; ?>" role="alert">
                                    <?php echo $response['message']; ?>
                                </div>
                            <?php }?>
                    </div>
                        
                    <div class="contact-details">
                        <div class="contact-number">
                            <h3>Call us on:</h3>
                                <a href="" class="contact-link">01603 70 40 20</a>
                        </div>
                        <div class="contact-email">
                            <h3>Email us on:</h3>
                                <a href="sales@netmatters.com" class="contact-link">sales@netmatters.com</a>
                        </div>
                        <div class="contact-number">
                            <h3>Call us at our Gorleston branch on:</h3>
                                <a href="" class="contact-link">01493 603204</a>
                        </div>
                        <div class="business-hours">
                            <h3>Business hours:</h3>

                            <h3>Monday - Friday 07:00 - 18:00</h3> 
                                <div id="flip" class="question-text">
                                    <h3 id="down" class="question-title">Out of Hours IT Support<i id="arrow" class="block fas fa-chevron-up rotate"></i></h3>
                                </div>
                                    <div id="panel" class="answer-text">
                                        <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>

                                        <h3>Monday - Friday 18:00 - 22:00 Saturday 08:00 - 16:00
                                            Sunday 10:00 - 18:00</h3>

                                        <p>To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of Hours voicemail.
                                            A technician will contact you on the number provided within 45 minutes of your call.</p> 
                                    </div>
                           
                        </div>
                    </div>
                </div>
        </div>

        <div class="location-container container">
            <div class="wymondham">   
                <div class="wymondham-details">
                    <div class="inner-contact-container">
                        <div class="contact-icon">
                            <i class="fas fa-home"></i>
                        </div>
                            <h4 class="contact-sub-title-w">Netmatters: Wymondham</h4>
                                <p class="contact-sub-text">Netmatters<br>
                                11 Penfold Drive<br>
                                Wymondham<br>
                                Norfolk<br>
                                NR18 0WZ</p>    
                    </div>
                </div>

                <div class="wymondham-location">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77588.8266570317!2d1.066223693430509!3d52.57592537972587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d9ddac8dba0b4b%3A0x9c77ffbfe7911dab!2sNetmatters!5e0!3m2!1sen!2suk!4v1605106449185!5m2!1sen!2suk" 
                    width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

            </div>

            <div class="great-yarmouth">   
                <div class="great-yarmouth-details">
                    <div class="inner-contact-container">
                        <div class="contact-icon">
                            <i class="fas fa-road"></i>
                        </div>
                            <h4 class="contact-sub-title-g">Netmatters Office: Gorleston, Great Yarmouth</h4>
                                <p class="contact-sub-text">Netmatters - Great Yarmouth<br>
                                Suite F23 Beacon Innovation Centre, Beacon Park<br>
                                Gorleston, Great Yarmouth<br>
                                Norfolk<br>
                                NR31 7RA<br>
                    </div>
                </div>
                
                <div class="great-yarmount-location">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38811.73304656896!2d1.6780356636864702!3d52.55634867972206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47da04f37d5f7dad%3A0x25a3836b6c0d66b1!2sBeacon%20Innovation%20Centre!5e0!3m2!1sen!2suk!4v1605106538037!5m2!1sen!2suk" 
                    width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

            </div>
        </div>
    </div>
</div>

<?php

include('includes/footer.php');
?>
<?php 
                               
                                // define variables and set to empty values
                                $nameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";
                                $name = $email = $phone = $subject = $message = "";

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    function test_input($data) {
                                        $data = trim($data);
                                        $data = stripslashes($data);
                                        $data = htmlspecialchars($data);
                                        return $data;
                                      } 

                                if (empty($_POST["name"])) {
                                    $nameErr = "Name is required";
                                    unset($name);
                                  } else {
                                    $name = test_input($_POST["name"]);
                                    // check if name only contains letters and whitespace
                                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                                      $nameErr = "Only letters and white space allowed";
                                      unset($name);
                                    } 
                                  }

                                if (empty($_POST["email"])) {
                                    $emailErr = "Email is required";
                                    unset($email);
                                  }  else {
                                    $email = test_input($_POST["email"]);
                                    // check if e-mail address is well-formed    
                                    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
                                        $emailErr = "Invalid email format";
                                        unset($email);
                                      }                            
                                  }

                                if (empty($_POST["phone"])) {
                                    $phoneErr = "Phone is required";
                                    unset($phone);
                                  } else {
                                    $phone = test_input($_POST["phone"]);

                                    if (!preg_match("/^((\\(?0\\d{4}\\)?\\s?\\d{3}\\s?\\d{3})|(\\(?0\\d{3}\\)?\\s?\\d{3}\\s?\\d{4})|(\\(?0\\d{2}\\)?\\s?\\d{4}\\s?\\d{4}))(\\s?\\#(\\d{4}|\\d{3}))?$/", $phone))
                                    {
                                    $phoneErr = "A valid phone number is required";
                                    unset($phone);
                                    }                                  
                                  }

                                if (empty($_POST["subject"])) {
                                    $subjectErr = "Subject is required";
                                    unset($subject);
                                } else {
                                    $subjectt = test_input($_POST["subject"]);
                                }
                                

                                if (empty($_POST["message"])) {
                                    $messageErr = "A message is required";
                                    unset($message);
                                } else {
                                    $message = test_input($_POST["message"]);
                                }
                             
                                }

    // if(!$_POST) return "No post request found";
    // $fields = ["name","email","phone",...]; //etc
    // //this way 
    // $validate = ["email"=>["email"], "phone"=>["phone"]]
    // //or simpler
    // $validate['email'] = ['email'];
    // $validate['phone'] = ['phone'];
    // $validation['email'] = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // $validation['phone'] = "/^((\\(?0\\d{4}\\)?\\s?\\d{3}\\s?\\d{3})|(\\(?0\\d{3}\\)?\\s?\\d{3}\\s?\\d{4})|(\\(?0\\d{2}\\)?\\s?\\d{4}\\s?\\d{4}))(\\s?\\#(\\d{4}|\\d{3}))?$/";

    // $errors = [];
    // foreach($fields as $field){
    //     if(empty($_POST[$field])){
    //         $errors[] = $field . " is not set."
    //     }
    //     foreach($validate as $k=>$v){
    //         if(in_array($v, $field)){
    //             if (!preg_match($validation[$k], $field)) {
    //                 $errors[] = "Invalid " . $field . " format";
    //                 unset($email);
    //             } 
    //         }
    //     }
    // }
    // if(count($errors)){
    //     $report = implode($errors, '/n');
    //     return $report; //or throw exception with report
    // }
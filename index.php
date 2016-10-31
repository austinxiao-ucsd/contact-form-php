<?php
//If the form is submitted
if(isset($_POST['submit'])) {

  //Check to make sure that the name field is not empty
  if(trim($_POST['contactname']) == '') {
    $hasError = true;
  } else {
    $name = trim($_POST['contactname']);
  }

  //Check to make sure that the phone field is not empty
  if(trim($_POST['phone']) == '') {
    $hasError = true;
  } else {
    $phone = trim($_POST['phone']);
  }

  //Check to make sure that the name field is not empty
  if(trim($_POST['weburl']) == '') {
    $hasError = true;
  } else {
    $weburl = trim($_POST['weburl']);
  }

  //Check to make sure that the subject field is not empty
  if(trim($_POST['subject']) == '') {
    $hasError = true;
  } else {
    $subject = trim($_POST['subject']);
  }

  //Check to make sure sure that a valid email address is submitted
  if(trim($_POST['email']) == '')  {
    $hasError = true;
  } else if (!filter_var( trim($_POST['email'], FILTER_VALIDATE_EMAIL ))) {
    $hasError = true;
  } else {
    $email = trim($_POST['email']);
  }

  //Check to make sure comments were entered
  if(trim($_POST['message']) == '') {
    $hasError = true;
  } else {
    if(function_exists('stripslashes')) {
      $comments = stripslashes(trim($_POST['message']));
    } else {
      $comments = trim($_POST['message']);
    }
  }

  //If there is no error, send the email
  if(!isset($hasError)) {
    $emailTo = 'you@yourwebsite.com'; // Put your own email address here
    $body = "Name: $name \n\nEmail: $email \n\nPhone Number: $phone \n\nSubject: $subject \n\nComments:\n $comments";
    $headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
  }
}
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Bootstrap Contact Form</title>

<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js" type="text/javascript"></script>
<script src="js/bootstrap-contact.js" type="text/javascript"></script>

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-push-1">
        <div class="jumbotron">
          <h1>Classroom of the Future</h1>
          INNOVATION IN EDUCATION AWARDS NOMINATION

          <h3>  Innovation in Education Awards Program  </h3>
          <label> Nomination Deadline: Extended until Friday, March 18, 2016 5:00 PM PDT </label>
          <p> Event date: Wednesday, May 25, 2016, 5:00 PM – 8:00 PM PDT </p>

          <h3> LOCATION: </h3>
          <p> CFF 2016 Annual Awards Event </p>
          <p> University of San Diego </p>
          <p> Hahn University Center, 5998 Alcala Park </p>
          <p> San Diego, CA 92110 </p>
          <!--p><a class="btn btn-large btn-primary" href="http://www.github.com/jackilyn/bootstrap-contact/">View Repo on Github &raquo;</a></p-->
        </div><!-- jumbotron -->
      </div>
    </div>


      <div class="col-md-6 col-md-push-3">
        <div class = "row">
           <h3>STEPS TO COMPLETE THE FORM:</h3>
          <p> * Complete each section below </p>
          <p> * Complete all of the required fields </p>
          <p> * Caution: This form can not save partial 
              responses for later revision, so prepare all
               of your answers elsewhere then copy and paste 
              when ready to submit. </p>
          <p> * Upload a file (PDF preferred), photos, and/or 
              video with your evidence about the program </p>
          <p> * Submit the form using the SUBMIT button
               at the bottom </p>


        </div>


        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
          <fieldset>
            <legend>CONTACT INFORMATION:</legend>

            <?php if(isset($hasError)) { //If errors are found ?>
              <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
            <?php } ?>

            <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
              <div class="alert alert-success">
                <p><strong>Message Successfully Sent!</strong></p>
                <p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
              </div>
            <?php } ?>


            <div class="row">
                <div class="col-sm-6">
                   <div class="form-group">
                     <label for="name">Your Name<span class="help-required">*</span></label>
                     <input type="text" name="contactname" id="contactname" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                     <label for="name">Job Title<span class="help-required">*</span></label>
                     <input type="text" name="title" id="title" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                     <label for="name">Organization/School<span class="help-required">*</span></label>
                     <input type="text" name="orgname" id="orgname" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                     <label for="name">Address Line 1<span class="help-required">*</span></label>
                     <input type="text" name="address1" id="address1" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                     <label for="name">Address Line 2</span></label>
                     <input type="text" name="address2" id="address2" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                     <label for="name">City<span class="help-required">*</span></label>
                     <input type="text" name="city" id="cityname" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                </div>

                <div class="col-sm-6">
                   <div class="form-group">
                      <label for="name">State<span class="help-required">*</span></label>
                      <input type="text" name="statename" id="statename" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                      <label for="name">ZIP/Postal Code<span class="help-required">*</span></label>
                      <input type="text" name="postcode" id="postcode" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                      <label for="phone">Phone Number<span class="help-required">*</span></label>
                      <input type="text" name="phone" id="phone" value="" class="form-control required" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                      <label for="email">Email<span class="help-required">*</span></label>
                      <input type="text" name="email" id="email" value="" class="form-control required email" role="input" aria-required="true" />
                   </div>

                   <div class="form-group">
                      <label for="weburl">Website<span class="help-required">*</span></label>
                      <input type="text" name="weburl" id="weburl" value="" class="form-control required url" role="input" aria-required="true" />
                   </div>
               </div>
            </div>

            <legend> NOMINATED PROGRAM INFORMATION: </legend>
            <p> 
                Caution: This form can not save partial responses for later 
                revision, so prepare all of your answers elsewhere then copy 
                and paste when ready to submit. 
            </p>

            <div class="form-group">
              <label for="name">Nominated Program Name<span class="help-required">*</span></label>
              <input type="text" name="progname" id="progname" value="" class="form-control required" role="input" aria-required="true" />
            </div>

            <div class="form-group">
              <label for="message">Description of Nominated Program (2-3 sentences)<span class="help-required">*</span></label>
              <textarea rows="8" name="progdescription" id="progdescription" class="form-control required" role="textbox" aria-required="true"></textarea>
            </div>

            <div class="form-group">
              <label for="subject">Nominated School District<span class="help-required">*</span></label>
              <select name="subject" id="subject" class="form-control required" role="select" aria-required="true">
                <option></option>
                <option>Alpine Union School District</option>
                <option>Bonsall Union School District</option>
                <option>More to come ....</option>
              </select>
            </div>

            <div class="form-group">
              <label for="name">Nominated School:<span class="help-required">*</span></label>
              <input type="text" name="nominatedschool" id="nominatedschool" value="" class="form-control required" role="input" aria-required="true" />
            </div>


           <legend> NOMINATION CATEGORIES: </legend>
           <p> 
              Innovative programs may be nominated in more than one category for inspire, innovate or achieve awards, so check one or more categories and answer the related questions. Nominations for the impact award must check that box and answer all seven (7) questions.
           </p>

           <div class="form-group">
              <label for="message">
              1. Describe the unique attributes of the program that get kids excited about learning: 
              <span class="help-required">*</span></label>
              <textarea rows="2" name="nommessage1" id="nommessage1" class="form-control required" role="textbox" aria-required="true"></textarea>
           </div>

           <div class="form-group">
              <label for="message">
              2. How did the specific program attributes enhance student learning and behavior?: 
              <span class="help-required">*</span></label>
              <textarea rows="2" name="nommessage2" id="nommessage2" class="form-control required" role="textbox" aria-required="true"></textarea>
           </div>

           <div class="form-group">
              <label for="message">
              3. Describe the unique learning innovations of the program: 
              <span class="help-required">*</span></label>
              <textarea rows="2" name="nommessage3" id="nommessage3" class="form-control required" role="textbox" aria-required="true"></textarea>
           </div>

           <div class="form-group">
              <label for="message">
              4. How will the specific innovations affect teaching and student learning?: 
              <span class="help-required">*</span></label>
              <textarea rows="2" name="nommessage4" id="nommessage4" class="form-control required" role="textbox" aria-required="true"></textarea>
           </div>

           <div class="form-group">
              <label for="message">
              5. Outline the objective results that validate the effectiveness of the program: 
              <span class="help-required">*</span></label>
              <textarea rows="2" name="nommessage5" id="nommessage5" class="form-control required" role="textbox" aria-required="true"></textarea>
           </div>

           <div class="form-group">
              <label for="message">
              6. How did the program enhance teaching and student learning to achieve these results?: 
              <span class="help-required">*</span></label>
              <textarea rows="2" name="nommessage6" id="nommessage6" class="form-control required" role="textbox" aria-required="true"></textarea>
           </div>

           <div class="form-group">
              <label for="message">
              7. What were short- and long-term effects on teachers and students?:
              <span class="help-required">*</span></label>
              <textarea rows="2" name="nommessage7" id="nommessage7" class="form-control required" role="textbox" aria-required="true"></textarea>
           </div>

           <legend> EVIDENCE - FILE UPLOAD: </legend>
 
           <div class="form-group">
             <form action="" method="POST" enctype="multipart/form-data">
                <label>
                A file upload with supporting evidence is highly recommended (not required):  
                </label>
                <input type="file" name="image" />
             </form>
           </div>

            <div class="actions">
              <input type="submit" value="Submit Form" name="submit" id="submitButton" class="btn btn-primary" title="Click here to submit your message!" />
              <input type="reset" value="Clear Form" class="btn btn-danger" title="Remove all the data from the form." />
            </div>
          </fieldset>
        </form>
      </div><!-- col -->
    </div><!-- row -->

      <hr>

      <div class="footer">
        <p>&copy; Team HunnitD 2016</p>
      </div>

    </div> <!-- /container -->
</body>
</html>
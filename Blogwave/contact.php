    <?php
    include 'includes/db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = trim($_POST['username']);
      $email = trim($_POST['email']);
      $contactno = trim($_POST['contact']);
      $message = trim($_POST['textbox']);

      // Basic server-side validation
      if (!empty($username) && !empty($email) && !empty($contactno) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contact_message (username, email, contactno, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $contactno, $message);

        if ($stmt->execute()) {
          echo "<script>alert('Message submitted successfully.'); window.location.href='contact.php';</script>";
        } else {
          echo "<script>alert('Error saving message.');</script>";
        }

        $stmt->close();
      }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Contact</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/style.css">
    </head>

    <body>
    <?php include 'includes/nav.php'; ?>

      <div class="container">
        <form action="contact.php" method="POST" onsubmit="return contact_validate()">
          <div class="container contact border px-5 py-2 my-5 col-md-4">
            <h2 class="text-center my-4">Write us</h2>
            <!-- name -->
            <div class="mb-3 input-group">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Your name" id="conname" placeholder="Enter Your Name">
              <p id="conuserempty" class="text-danger"></p>
            </div>

            <!-- email -->
            <div class="mb-3 input-group">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" name="email" id="conemail" placeholder="Your e-mail">
              <p id="conemptyemail" class="text-danger"></p>
            </div>
            <!-- contact no -->
            <div class="mb-3 input-group">
              <span class="input-group-text"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" name="contact" id="contact" placeholder="Mobile no" />
              <p id="emptycontact" class="text-danger"></p>
            </div>

            <!-- text field -->
            <div>
              <label for="disc" class="form-label">Write your concern here:</label>
              <textarea class="form-control mb-4" name="textbox" id="textbox" rows="4" maxlength="250" cols="20"
                placeholder="write discription about your concern"></textarea>
              <p id="condisc" class="text-danger"></p>
            </div>

            <!--button  -->
            <div class="mt-3 d-grid d-md-flex justify-content-md-end">
              <button class="btn btn-info btn-block mb-4" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>


      <!-- footer -->
      <?php include 'includes/footer.php'; ?>

      <script>
        function contact_validate() {
          // pattern for username and mail validation
          const userconRegex = /^[a-zA-Z0-9_]+$/;
          const emailconRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          const cRegex = /^[6-9][0-9]{9}$/;

          // input values
          const conname = document.getElementById('conname').value;
          const conemail = document.getElementById('conemail').value;
          const contact = document.getElementById('contact').value;
          const textbox = document.getElementById('textbox').value


          // Trimmed values for comparison
          const trimconusername = conname.trim();
          const trimtextbox = textbox.trim();

          //Username validation 
          if (conname === '') {
            document.getElementById('conuserempty').innerHTML = 'Please enter your username';
            return false;
          }
          // Check for leading or trailing whitespace
          if (conname !== trimconusername) {
            alert('Username cannot have leading or trailing whitespace');
            return false; // Prevent form submission
          }
          //Validate username format
          if (!userconRegex.test(conname)) {
            alert("Username can only contain letters, numbers, and underscores.");
            return false;
          }

          // email validation
          if (conemail === '') {
            document.getElementById('conemptyemail').innerHTML = 'Please enter your email';
            return false;
          }


          if (!emailconRegex.test(conemail)) {
            alert("Enter a valid email address.");
            return false;
          }

          // contact validation
          if (contact === "") {
            document.getElementById('emptycontact').innerHTML = "Contact can not be blank";
            return false;
          }
          if (cRegex.test(contact)) {
            // alert("contact number is valid");  
          } else {
            alert(' contact number is invalid');
            return false;
          }

          // textarea validation
          if (textbox === '') {
            document.getElementById('condisc').innerHTML = "Discription can not be blank";
            return false;
          }

          alert("form submitted successfully")
          return true;
        }
      </script>
    </body>

    </html>
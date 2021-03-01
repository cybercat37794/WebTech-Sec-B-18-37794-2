<?php
 $message = '';
 $error = '';
 if(isset($_POST["submit"]))
 {
      if(empty($_POST["name"]))
      {
           $error = "<label class='text-danger'>Enter Name</label>";
      }
      if(empty($_POST["password"]))
      {
           $error = "<label class='text-danger'>Enter Password</label>";
      }
      if(empty($_POST["email"]))
      {
           $error = "<label class='text-danger'>Enter Email</label>";
      }
      else if(empty($_POST["gender"]))
      {
           $error = "<label class='text-danger'>Enter Gender</label>";
      }
      else if(empty($_POST["dob"]))
      {
           $error = "<label class='text-danger'>Enter Date of Birth</label>";
      }
      else if(empty($_POST["designation"]))
      {
           $error = "<label class='text-danger'>Enter Designation</label>";
      }
      else
      {
           if(file_exists('data.json'))
           {
                $current_data = file_get_contents('data.json');
                $array_data = json_decode($current_data, true);
                $extra = array(
                     'name'            =>     $_POST['name'],
                     'password'            =>     $_POST['password'],
                     'email'            =>     $_POST['email'],
                     'gender'            =>     $_POST['gender'],
                     'dob'            =>     $_POST['dob'],
                     'designation'     =>     $_POST["designation"]
                );
                $array_data[] = $extra;
                $final_data = json_encode($array_data);
                if(file_put_contents('data.json', $final_data))
                {
                     $message = "<label class='text-success'>File Appended Success fully</p>";
                }
           }
           else
           {
                $error = 'JSON File not exits';
           }
      }
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Append Data to JSON File using PHP</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <body>
           <br />
           <div class="container" style="width:500px;">
                <h3 align="">Append Data to JSON File</h3><br />
                <form method="post">
                     <?php
                     if(isset($error))
                     {
                          echo $error;
                     }
                     ?>
                     <br />
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" /><br />
                     <label>Password</label>
                     <input type="text" name="password" class="form-control" /><br />
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" /><br />
                     <label>Gender</label>
                     <input type="text" name="gender" class="form-control" /><br />
                     <label>Designation</label>
                     <input type="text" name="dob" class="form-control" /><br />
                     <label>Date of Birth</label>                     
                     <input type="text" name="designation" class="form-control" /><br />
                     <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />
                     <?php
                     if(isset($message))
                     {
                          echo $message;
                     }
                     ?>
                </form>
           </div>
           <br />
      </body>
 </html>

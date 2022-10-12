<html>
   
   <head>
      <link rel="stylesheet" href="css/form.css">
      <title>Resume filling</title>
   </head>

   <body>
      <div class="login-box">
      <h2>Fill your Resume</h2>
      <form action = "/createresume" method = "post" enctype="multipart/form-data">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
         <div class="user-box">
            <input type="text" name="name" required="">
            <label>Name</label>
         </div>
         <div class="user-box">
            <input type="email" name="email" required="">
            <label>Email</label>
         </div>
         <div class="user-box">
            <input type="text" name="age" required="">
            <label>Age</label>
         </div>
         <div class="user-box">
            <input type="text" name="phone" required="">
            <label>Phone</label>
         </div>
         <div class="user-box">
            <input type="text" name="address" required="">
            <label>Address</label>
         </div>
         <div class="user-box">
            <input type="text" name="worktitle" required="">
            <label>Current job title</label>
         </div>
         <div class="user-box">
            <input type="text" name="workcompany" required="">
            <label>Current Company</label>
         </div>
         <div class="user-box">
            <input type="text" name="educationdiscipline" required="">
            <label>Education discipline</label>
         </div>
         <div class="user-box">
            <input type="text" name="educationplace" required="">
            <label>Education place</label>
         </div>
         <div class="user-box">
            <input type="file" name="image" required="">
            <label></label>
         </div>
         <a>
            <input type = "submit" value = "Create" />
         </a>
      </form>
      </div>
   </body>
</html>
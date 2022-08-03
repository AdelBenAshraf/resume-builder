<html>
   
   <head>
      <link rel="stylesheet" href="/css/form.css">
      <title>Resume Editing</title>
   </head>

   <body>
      <div class="login-box">
      <h2>Edit your Resume</h2>
      <form action = "/editresume" method = "post" enctype="multipart/form-data">
         @method('PUT')
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
         <input type="hidden" name="id" value="{{$data['id']}}">
         <div class="user-box">
            <input type="text" name="name" value="{{$data['name']}}">
            <label>Name</label>
         </div>
         <div class="user-box">
            <input type="email" name="email" value="{{$data['email']}}">
            <label>Email</label>
         </div>
         <div class="user-box">
            <input type="text" name="age" value="{{$data['age']}}">
            <label>Age</label>
         </div>
         <div class="user-box">
            <input type="text" name="phone" value="{{$data['phone']}}">
            <label>Phone</label>
         </div>
         <div class="user-box">
            <input type="text" name="address" value="{{$data['address']}}">
            <label>Address</label>
         </div>
         <div class="user-box">
            <input type="text" name="worktitle" value="{{$data['worktitle']}}">
            <label>Current job title</label>
         </div>
         <div class="user-box">
            <input type="text" name="workcompany" value="{{$data['workcompany']}}">
            <label>Current Company</label>
         </div>
         <div class="user-box">
            <input type="text" name="educationdiscipline" value="{{$data['educationdiscipline']}}">
            <label>Education discipline</label>
         </div>
         <div class="user-box">
            <input type="text" name="educationplace" value="{{$data['educationplace']}}">
            <label>Education place</label>
         </div>
         <div class="user-box">
            <input type="file" name="image" value="{{$data['image']}}">
            <label>Image</label>
         </div>
         <a>
            <input type = "submit" value = "Edit" />
         </a>
      </form>
      </div>
   </body>
</html>
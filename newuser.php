 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <p class="center">BLOGGGER INFO<p>

      <div class="container">
        <div class="row">
          <form class="col s12" action="addnewuser.php" method="post" enctype = "multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" name="author" class="validate" autofocus required pattern="[a-zA-Z ]{1,20}">
                <label for="name" data-error="wrong">Name</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input id="username" type="text" name="username" class="validate" required pattern="[a-zA-Z0-9@_ ]{1,20}">
                <label for="username" data-error="wrong">User Name</label>
              </div>

              <div class="file-field input-field col s6">
                <div class="btn">
                  <span>File</span>
                    <input type="file" required name="bloggerimage">
                </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" required placeholder="Blogger image">
      </div>
    </div>
    </div>
          
      
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password" required pattern="[a-zA-Z0-9@_]{4,15}">
          <label for="password" data-error="wrong">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="retypepassword" class="validate" required pattern="[a-zA-Z0-9@_]{4,15}">
          <label for="password" data-error="wrong">Retype-password</label>
        </div>
      </div>
  </div>    
  </div>

  <div class="divider"></div>

  <p class="center">BLOG INFO</p>

  <div class="container">
    <div class="row">
    <div class="input-field col s4">
    <input type="text" name="blogtitle" id=blogtitle required>
    <label for="blogtitle" data-error="wrong" >BLOG TITLE</label>
    </div>
    <div class="input-field col s4">
    <input type="text" name="blogcategory" id="category" required>
    <label for="category" data-error="wrong" >CATEGORY</label> 
    </div>
    <div class="file-field input-field col s4">
      <div class="btn">
        <span>File</span>
        <input type="file" required name="blogimage">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Blog image">
      </div>
    </div>
    </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="blogdescription" name="blogdescription" class="materialize-textarea" required></textarea>
          <label for="blogdescription" data-error="wrong">BLOG-DESCRIPTION</label>
        </div>
      </div>
  </div>
  <div class="container">
    <div class="row">
    <div class="col s12 center">
      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
  </div>
  </div>
  </div>
</form>
    </body>
  </html>
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
    <div class="container">
    <div class="row">
    <form>
      <div class="row">
                title:  <input  id="title" type="text" class="validate">
        </div>
        <div class="row">
         Blog-Description: <textarea name="blog_desc" id="blog_desc"></textarea>
        </div>
        <div class="row">
           related-image:<input type="file" name="image" />
    <button>Upload</button>
        </div>
        <div class="row center">
        <input type="submit" name="submit" value="ADD BLOG"/>
        </div>
      </form>
      </div>
      </div>

    </body>

    </html>
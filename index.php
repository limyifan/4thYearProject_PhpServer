<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Tripit Test Env</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <style>
      .container{
          width: 100%;
          height: 100vh;
      }
      
      #logo{
      width: 100%;
      height: 100%;
      }
  </style>
    </head>
    <body>
        <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><img id="logo" src="https://mahara.dkit.ie/artefact/file/download.php?file=295153&view=71662&embedded=1&description=71662"></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                
                <form action="client.php" method="POST">
                <input type="text" placeholder="Location" name="location"><br>
                <input type="text" placeholder="Time" name="time"><br>
                <input type="submit" value="Let's Go">
                </form>
                
            </div>
            <div class="col-md-4"></div>
        </div>
      
        
        </div>

    </body>

   

</html>

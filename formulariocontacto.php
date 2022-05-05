<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Contacto</title>
    <div id="error"></div>
  </head>
  <body>
     <div class="container">
      <h1>Contactanos</h1>
         <form method="post">
  <fieldset class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Ingrese Email" name="email">
    <small class="text-muted">Nunca compartiremos tu email con nadie</small>
  </fieldset>
  <fieldset class="form-group">
    <label for="asunto">Asunto </label>
    <input type="asunto" class="form-control" id="asunto" placeholder="asunto" name="asunto">
  </fieldset>
<fieldset class="form-group">
    <label for="exampleFormControlTextarea1">Mensaje</label>
    <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
  </fieldset>
  
  <button type="submit" id="submit" class="btn btn-primary">Enviar</button>
  
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
          <script type="text/javascript">
      $("form").submit(function(e){
      var error"";
      if ($("#email").val()==""){
        error +="Campo email obligatorio.<br>";
      }  
      if ($("#asunto").val()==""){
        error +="Campo asunto obligatorio.<br>";
      } 
      if ($("#contenido").val()==""){
        error +="Campo contenido obligatorio.<br>";
      } 
     if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>Hubo algún error en el formulario</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })


          </script>
  </body>
</html>
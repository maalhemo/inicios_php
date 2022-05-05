<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Localizador de códigos postales</h1>
        <p>Introduce una dirección para obtener su código postal</p>
        <div id="mensaje"></div>
        <form>
          <fieldset class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" placeholder="Introduzca la dirección">
          </fieldset>
            <button class="btn btn-primary" id="encontrar-cp">Enviar</button>
        </form>
    </div>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      <script type="application/javascript">
        $("#encontrar-cp").click(function(e){
            e.preventDefault();
            $.ajax({
                url: "https://maps.googleapis.com/maps/api/geocode/json?address="+encodeURIComponent($("#direccion").val())+"&key=AIzaSyCqxiI0iBwtCgKIXvN7dwLqqlZLCloDPgU",
                type:"GET",
                success: function(datos) {
                    console.log(datos);
                    if (datos['status']!="OK")
                        {
                            $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong>¡Imposible obtener el código postal!</strong> Intente suministrar más información</div>');
                        }
                    else{
                        $.each(datos['results'][0]['address_components'],function(clave,valor){
                            if (valor['types'][0]=="postal_code"){
                                $("#mensaje").html('<div class="alert alert-success" role="alert"><strong>¡Código postal encontrado!</strong> El C.P. es '+valor['long_name']+'</div>');
                            }
                        })
                    }
                }
            })
            
        })
      
      
      </script>
  </body>
</html>
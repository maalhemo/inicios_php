<?php
    header("Content-type:text/html;charset=\"utf-8\"");
    $previsionTiempo = ""; $error="";
    if (array_key_exists('ciudad',$_GET))
    {
        $ciudad = str_replace(' ', '', $_GET['ciudad']);
        $file = 'http://es.weather-forecast.com/locations/'.$ciudad.'/forecasts/latest';
        $file_headers = @get_headers($file);
        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $error = "No hemos podido encontrar esa ciudad";
        }
        else 
        {
            
        
            $paginaForecast = file_get_contents("http://es.weather-forecast.com/locations/".$ciudad."/forecasts/latest");
            $array1 = explode("1 - 3 Días:</b><span class=\"read-more-small\"><span class=\"read-more-content\"> <span class=\"phrase\">",$paginaForecast);
            if (sizeof($array1)>1) {
            $array2 = explode("</span></span></span></p><div class=\"forecast-cont\"><div class=\"units-cont\">",$array1[1]);
                // echo $array2[0];
                if (sizeof($array2)>0)
                {
                    $previsionTiempo = $array2[0];
                }
                else
                {
                    $error = "No hemos podido encontrar esa ciudad";

                }
            }
            else
            {
                $error = "No hemos podido encontrar esa ciudad";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <title>¿Qué tiempo hace?</title>
      <style type="text/css">
        html { 
              background: url(background.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }
        body {
              background: none;
        }
        .container {
            text-align:center;
            margin-top:250px;
            width:450px;
        }
          input {
              margin: 20px 0;
          }
          
          #previsionTiempo {
              margin-top: 30px;
          }
      </style>
  </head>
  <body>
    <div class="container">
        <h1>¿Qué tiempo hace?</h1>
        <form>
          <fieldset class="form-group">
            <label for="ciudad">Introduce el nombre de una ciudad:</label>
            <input type="ciudad" class="form-control" id="ciudad" name="ciudad" placeholder="Por ej. Londres, Tokyo" value="<? 
                if (array_key_exists('ciudad',$_GET)) {
                    echo $_GET['ciudad'];} ?>">
          
          </fieldset>

          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div id="previsionTiempo">
            <?php
                if ($previsionTiempo)
                {
                    echo '<div class="alert alert-success" role="alert">'.$previsionTiempo.'</div>';
                }
                else if ($error!="")
                {
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                }
            ?>
        </div>
    </div>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      <script type="text/javascript">
        $(".alternarFormularios").click(function() {
            $("#formularioRegistro").toggle();
            $("#formularioLogIn").toggle();
        });
        $('#diario').bind('input propertychange', function(){
            $.ajax({
              method: "POST",
              url: "actualizarBD.php",
              data: { content: $("#diario").val() }
            })
        });
      </script>
  </body>
</html>

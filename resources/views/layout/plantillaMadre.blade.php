<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("nombredepestana")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
      .detallesHabitacion{
          padding-top: 100px;
          text-decoration: underline;
          text-shadow: 1px 1px red;
          color: black;
      }
      .card{
          width: 50rem ;
          height: 15rem;
          margin-top: 3rem;
      }
    .tituloM{

          text-shadow: 1px 1px yellow;
          color: black;
          text-decoration-style: dotted;
          text-align: center;
    }

    .tituloC{
          text-decoration: underline;
         text-shadow: 1px 1px black;
          color: rgb(128, 0, 92);
          text-transform: uppercase;
          text-align: center;
    }
  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand center" href="#">Proyecto de Lenguaje 4</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>



    <div class="container">
        
        @yield("cuerpodepagina")
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>
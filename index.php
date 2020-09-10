<?php

  function Home(){
    $title = "Lista de tareas";
?>


  <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      <title><?php  echo $title ?></title>
    </head>
    <body>
      <h1><?php  echo $title ?></h1>

      <div class="container">

          <ul class="list-group">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Morbi leo risus</li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
      </div>

  <div class="container">
      <form>
          <div class="form-group">
            <label for="title">Titulo</label>
            <input class="form-control" id="title" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Titulo de la Tarea</small>
          </div>
          <div class="form-group">
            <label for="description">Descripcion</label>
            <input class="form-control" id="description">
          </div>
          <div class="form-group">
              <label for="priority">Prioridad</label>
              <input class="form-control" id="priority">
            </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="completed">
            <label class="form-check-label" for="completed">Completada</label>
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
  </html>

<?php } ?>
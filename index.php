<?php

include_once 'timezone.php';
include_once 'functions.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Task Manager</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="assets/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- Start your project here-->
<!--MODAL -->
  <div class="modal fade" id="taskName" tabindex="-1" role="dialog" aria-labelledby="taskName" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Task Name</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body mx-3">
                  <form id="form-new">
                  <div class="md-form mb-5">
                      <i class="fas fa-tasks prefix text-success"></i>
                      <input type="text" class="form-control " id="name" name="name">
                      <label for="name" data-error="wrong" data-success="right">Task Name</label>
                  </div>

                  <!--Modal Button-->
                  <div class=" d-flex justify-content-center">
                      <button type="submit" class="btn btn-danger btn-rounded">Submit<i class="fas fa-paper-plane-o ml-1"></i></button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!--End Modal-->
  <div class="container-fluid ">
      <header class="row mb-3">
          <div class="col-sm-4 mt-3">
              <a class="btn " data-mode="restore" id="btn-mode" href="#">Enter <span id="lbl-mode">Restore</span> Mode</a>
          </div>

          <div class="col-sm-4 text-center mt-3">
              <h4 class="display-4"> Task Manager </h4>
          </div>

          <div class="col-sm-4 text-right mt-3">
              <h4 class="btn btn-tally "><?php echo icon("fa-clock"); ?>Total Time - <span id="tally"></span></h4>
          </div>
      </header>


   </div>


      <!--Table-->
      <div class="card">
          <div class="card-body p-5">
              <div class="table-editable" id="table">
                  <span class="table-add float-right mb-3 mr-2"><a href="" class="text-success" data-toggle="modal" data-target="#taskName"><i class="fas fa-plus fa-2x" aria-hidden=""true></i></a></span>
                  <table class="table table-bordered table-responsive-md table-striped text-center">
                      <thead>
                      <tr>
                          <th class="text-center">Task</th>
                          <th class="text-center">Start</th>
                          <th class="text-center">End</th>
                          <th class="text-center">Time</th>
                          <th colspan="2" class="text-center">Controls</th>
                      </tr>
                      </thead>

                      <tbody id="log">

                      </tbody>
                  </table>
              </div>
          </div>
      </div>


  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>

  <!--Tracker JS File-->
  <script src="tracker.js"></script>

</body>

</html>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="title icon" href="asset/images/p.svg" type="image/svg" />
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/StyleSheet/main.css" />
    <title>Farmpeak</title>
  </head>
  <body>
    <!-- message card -->
    <div
      class="d-flex justify-content-center p-1"
      style="margin-top: 100px !important"
    >
      <div>
        <div
          class="card text-center"
          style="max-width: 450px; border-color: #038d2c9d"
        >
          <div class="msgLogo">
            <img src="asset/images/p.svg" alt="ombfarmLogo" />
          </div>
          <div class="py-4 px-2">
            <h4 id="message-Title "><?=$title?></h4>
            <p id="message-Info"><?=$msg?></p>
            <div class="text-left">
              <button onclick="goBack()" class="btn btn-farm">Go Back</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        function goBack() {
          window.history.back();
        }
      </script>
    </div>
    <!-- End of message card -->

    <!-- script -->
    <script src="asset/fontawesome-free-5.9.0-web/js/all.min.js"></script>
    <script src="asset/Scripts/jquery-3.4.1.min.js"></script>
    <script src="asset/Scripts/popper.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/Scripts/wow.min.js"></script>
    <!-- end of script -->
  </body>
</html>

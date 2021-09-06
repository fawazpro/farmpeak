<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment - OMB farm</title>
  </head>
  <body>
    <div style="margin: auto; padding: 25px 15px; text-align: center">
      <h2 style="color: #038d2c !important">OMB-farm</h2>
      <p>
        Redirecting to payment dashboard in next 4 secs and if it doesn't
        redirect automatically
      </p>
      <a href="<?=$url?>"
        type="button"
        style="
          background-color: #038d2c;
          color: #ffffff;
          box-shadow: none;
          border: none;
          cursor: pointer;
          padding: 10px 17px;
        "
      >
        click me
      </a>
    </div>

    <script type="text/javascript">
      function Redirect() {
        //feed it the necessary Url link
        window.location = "<?=$url?>";
      }

      //i set the redirect timeout to 1 second
      setTimeout("Redirect()", 1000);
    </script>
  </body>
</html>

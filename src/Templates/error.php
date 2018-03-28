<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error Page</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
        p {
            text-align : center;
        }
    </style>
  </head>
  <body>
  	<h1>Error</h1>
    <?php
    echo '<h2>' . ($errorCode ?? 500) . '</h2>';
    echo '<p>' . ($errorMessage ?? "Internal Error") . '</p>';
    ?>
  </body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error Page</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
    <h1>ARTICLE DELETED</h1>
    <?php
    echo '<h1>Error</h1>';
    echo '<h2>' . ($errorCode ?? 500) . '</h2>';
    echo '<p>' . ($errorMessage ?? "Internal Error") . '</p>';
    ?>
  </body>
</html>
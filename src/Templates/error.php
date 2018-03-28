<?php
echo '<h1>Error</h1>';
echo '<h2>' . ($controller->errorCode ?? 500) . '</h2>';
echo '<p>' . ($controller->errorMessage ?? "Internal Error") . '</p>';
<?php
echo '<h1>Error</h1>';
echo '<h2>' . ($errorCode ?? 500) . '</h2';
echo '<p>' . ($errorMessage ?? "Internal Error") . '</p>';
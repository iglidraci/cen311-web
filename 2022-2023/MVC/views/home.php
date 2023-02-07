<?php
echo "Home page of application $name <br>";

if (Application::$APP->isAuthenticated()) {
    $displayName = Application::$APP->getUser()?->getDisplayName() ?? "aa";
    echo "Welcome $displayName<br>";
} else {
    echo <<< EOF
    <p>Not authenticated</p>
    <a href="/login">Login</a> if you wish 
    EOF;
}
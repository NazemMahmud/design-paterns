<?php

declare(strict_types=1);
require_once __DIR__ . "/vendor/autoload.php";

use Piash\FacadePattern\SafeUrlLookup;


$safeUrl = new SafeUrlLookup("https://laravel.com/docs/8.x/facades");
$unsafeUrl =  new SafeUrlLookup("https://testsafebrowsing.appspot.com/s/phishing.html");

echo $safeUrl->urlLookup() . "\n";
echo $unsafeUrl->urlLookup();

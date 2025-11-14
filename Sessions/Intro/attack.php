<?php


$ch = curl_init('http://localhost:8000/login.php');

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* *********************************************************** */
/* Q1 : When dealing with sessions with cURL, we need to fix   */
/*      a cookie jar and a cookie file, where to read and      */
/*      write cookies.                                         */
/*      Set up such files with the cURL options                */
/*       'CURLOPT_COOKIEJAR' and  'CURLOPT_COOKIEFILE'         */
/* *********************************************************** */

curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');


/* *********************************************************** */
/* Q2 : Authenticate to the site with a cURL command and       */
/*      check if the session id is in the cookie file.         */
/* *********************************************************** */


/* *********************************************************** */
/* Q3 : Authenticate on the site from a browser.               */
/*      Copy the session id then do a cURL request using it.   */
/*      Verify that you can successfully access to a protected */
/*      page.                                                  */
/* *********************************************************** */


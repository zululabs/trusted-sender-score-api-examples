<?php
/**
 * Script by Zulu Labs Dev Team
 * Access a domain's Trusted Sender Score using the Trusted Sender Score API
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @description: Retrieve a domain's Trusteed Sender Score and Status for display anywhere within your application
 */

//error_reporting();
//ini_set("display_errors", 1);

//the function calls the data via the API and then
//manipluated it int and array and finally variables to use.
function getTSS($clientDomain) {
  include 'vendor/nategood/httpful/bootstrap.php';
// Set the connection header
  //obtain your API details from https://trustedsenderscore.com
  $uri = "https://zuluedm.com/api/domain/" . $clientDomain;
  $response = \Httpful\Request::get($uri)
    ->addHeader('Accept', '*/*')
    ->addHeader('X-API-USERNAME', '')
    ->addHeader('X-API-PASSWORD', '')
    ->expects('string')
    ->send();
  $elements = $response->body;
  //the response is in json format
  //by expecting a strin the elements can be accessed of the array
  if ($elements == null) {
    return false;
  } else {
    $elementsData = json_decode($elements, true);
    $elementsData = (array)$elementsData;
    $tssdata = array($elementsData[0]["ts_score"], $elementsData[0]["domain_status"], $elementsData[0]["domain_description"], $elementsData[0]["status_color"]);
    return $tssdata;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Zulu eDM Campaign Management TSS Score</title>

  <!-- Enter a brief description of your page -->
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="-1" />
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://staging.au.zuluedm.com/css/material/zulumaterial.css">
  <link rel="stylesheet" href="https://staging.au.zuluedm.comcss/material/zuluyellow.css">
  <link rel="stylesheet" href="https://staging.au.zuluedm.com/css/icons/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700">
</head>
<body>

<?php
// below you would set a domain dynamically or as a static variable
$domain = 'zululabs.com';
// call the function and have the data associated to the array
$tssdetails = getTSS($domain);
if ($tssdetails == false) {
  echo "no TSS data available for this domain";
} else {
?>
<div class="w3-half" style="margin-right:10px;margin-left:auto;">
  <div class="w3-card-2">
    <h4 class="w3-zulu">Trusted Sender Score</h4>
    <?php
    //////////////////////////////////////////////////////////////////////////////////
    /// Developers please note there are approved colours for the 3 domain status's///
    /// Please do ont change these as it will be a breach of the license /////////////
    /// //////////////////////////////////////////////////////////////////////////////
    echo '<h1 style="font-size:22px;color: ' . $tssdetails[3] . ';">' . $tssdetails[0] . '</h1>';
    echo '<span style="font-size:15px;color: ' . $tssdetails[3] . ';">' . $tssdetails[1] . '<br />';
    echo $tssdetails[2] . '</span>';
    }
    ?>
    <div class="w3-bar w3-yellow">
      <a class="w3-bar-item w3-button w3-left" href="https://zuluedm.com/trusted-sender/domain/trust-profile/<?php echo $domain; ?>" target="_blank"><i style="font-size: 17px" class="far fa-mail-bulk"></i> Domain Profile  </a><a class="w3-bar-item w3-button w3-right" href=""><i style="font-size: 17px" class="fal fa-caret-right"></i></a>
    </div>
  </div>
</div>


</body>
</html>
<?php
/////
// CACHED GLOBAL VARS
//////////
$player;

// DEBUGGING Tools
function debugDump($array) {
  printf("print_r():<pre>%s</pre>", print_r($array, TRUE));
}

/////
// REFRESH API
//////////
function refreshAPI($keyID, $vCode) {

  $xml = makeRequest('account', 'characters');

  for ($i = 0; $i < 3; $i++) {
    $char = $xml->result->rowset->row[$i];

    $player[$i]['character']['id'] = $char['characterID'];
    $player[$i]['character']['name'] = $char['name'];

    $player[$i]['corp']['id'] = $char['corporationID'];
    $player[$i]['corp']['name'] = $char['corporationName'];

    $player[$i]['alliance']['id'] = $char['allianceID'];
    $player[$i]['alliance']['name'] = $char['allianceName'];

    $player[$i]['faction']['id'] = $char['factionID'];
    $player[$i]['faction']['name'] = $char['factionName'];

  };

  //$player = $char;

  return $player;
}

/////
// EVE API HELPERS
//////////

function makeRequest($API, $URI) {
  // Needs to be reworked
  $keyID = "5971947";
  $vCode = "XmjJCTU6qinGmWHPQyJd3uYQb9ONGBUna2H5wtT94JdKXldgrlwQXEnwm2jfaWdC";

  $URItarget = "https://api.eveonline.com";

  $url = "$URItarget/$API/$URI.xml.aspx?keyID=$keyID&vCode=$vCode";

  $xml = simplexml_load_file($url);

  return $xml;
}

/////
// EVE CHARACTER ACCESSORS
//////////

function getAccountBalance($charID) {

  //$xml = makeRequest('char', 'AccountBalance');

  $url = "https://api.eveonline.com/char/AccountBalance.xml.aspx?keyID=5971947&vCode=XmjJCTU6qinGmWHPQyJd3uYQb9ONGBUna2H5wtT94JdKXldgrlwQXEnwm2jfaWdC&characterID=$charID";
  $xml = simplexml_load_file($url);

  $balance = $xml->result->rowset->row[0]['balance'];

  //debugDump($xml->result->rowset);

  return $balance;
}

function getAvatarLink($charID) {

  //$xml = makeRequest('char', 'AccountBalance');

  //$url = "https://api.eveonline.com/char/AccountBalance.xml.aspx?keyID=5971947&vCode=XmjJCTU6qinGmWHPQyJd3uYQb9ONGBUna2H5wtT94JdKXldgrlwQXEnwm2jfaWdC&characterID=$charID";
  //$xml = simplexml_load_file($url);

  //$balance = $xml->result->rowset->row[0]['balance'];

  //debugDump($xml->result->rowset);

  $link = "http://image.eveonline.com" . "/Character/" . $charID . "_128.jpg";

  return $link;
}


?>

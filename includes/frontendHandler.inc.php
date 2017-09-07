<?php
include_once("databaseHandler.inc.php");

$page = isset($_GET['page']) && $_GET['page'] != '' ? $_GET['page'] : 'home';  //If page gefüllt ist und im Array vorhanden ist wird es als URL genutzt und auf die jeweilige Seite verwiesen / falls nicht : Startseite
//$category = isset($_GET['category']) && $_GET['category'] != '' ? $_GET['category'] : '';
//$content = isset($_GET['content']) && $_GET['content'] != '' ? $_GET['content'] : '';

function getNavigation() {
    return readNavigation();
}

function getContent(){
    global $page/*,$category,$content*/;
  echo readContent($page);

}


?>
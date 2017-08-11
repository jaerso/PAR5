<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 04.07.2016
 * Time: 15:07
 */
if (file_exists('./database/data.xml')) {
    $xml = simplexml_load_file('./database/data.xml');
  }//Ende der Abrufung der Funktionen

  else {
      exit("Datei kann nicht geöffnet werden.");
  }

  function readNavigation(){
     global $xml;
      $realnavi="";

      $arr = $xml->pages->page;
      foreach($arr as $meineSeite) {

          $navi = "<a href='index.php?page=" . $meineSeite->attributes()->path . "'>" . $meineSeite->navigation . "</a>";

          $realnavi .= "<li>" . $navi ."</li>";
      }

      return $realnavi;
  }//Ende von readNavigation


  function readContent($page){
      global $xml;
      $arr = $xml->pages->page;
      foreach ($arr as $meineSeite) {
          if($meineSeite->attributes()->path==$page){
              return $meineSeite->content;
          }
        /*  else{
            return '';
          }*/
      }

  }//Ende von readContent


  ?>
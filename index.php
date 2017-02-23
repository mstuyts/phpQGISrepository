<?php
  header ("Content-Type:text/xml");
  $queryversion=$_GET['qgis'];
  $filedir = 'downloads';
  $allfiles = scandir($filedir);
  natcasesort($allfiles);
  $zipcounter=0;
  foreach ($allfiles as $file[$zipcounter+1]){
    $zipcounter++;
     if(substr($file[$zipcounter], -4,4)==".zip"){
      $zipfiles[$zipcounter]=$file[$zipcounter];
      $zip[$zipcounter] = new ZipArchive;
      if ($zip[$zipcounter]->open($filedir."/".$file[$zipcounter]) === TRUE) {
        $setting[$zipcounter]['filename']=$file[$zipcounter];
        for ($i = 0; $i < $zip[$zipcounter]->numFiles; $i++) {
          $filename=str_replace('/','',trim(substr($zip[$zipcounter]->getNameIndex($i),strrpos($zip[$zipcounter]->getNameIndex($i),"/"))));
          if($filename=='metadata.txt'){
            $metafile[$zipcounter]=$zip[$zipcounter]->getFromName($zip[$zipcounter]->getNameIndex($i));
          }
        }
        $metaarray[$zipcounter]=array_filter(array_filter(array_filter(explode("\n", $metafile[$zipcounter])),"comment"),"category");
        foreach($metaarray[$zipcounter] as $settinginput){
          $settingoutput=explode("=",$settinginput);
          $setting[$zipcounter][strtolower(trim($settingoutput[0]))]=trim($settingoutput[1]);
          $setting[$zipcounter]['id']=abs(crc32($setting[$zipcounter]['name']));
        }

        $zip[$zipcounter]->close();
      }
    }
  }
    foreach($setting as $plugin){
      if(isset($plugin['qgisminimumversion'])){$minversion=$plugin['qgisminimumversion'];}else{$minversion="2.0";}
      if(isset($plugin['qgismaximumversion'])){$maxversion=$plugin['qgismaximumversion'];}else{$maxversion="2.98";}
      if($queryversion=="" or (version_compare($queryversion, $minversion, '>=') and version_compare($queryversion, $maxversion, '<=')) ){
         $maincontent.="\n\t<pyqgis_plugin name='".$plugin['name']."' version='".$plugin['version']."' plugin_id='".$plugin['id']."'>";
         $maincontent.="\n\t\t<description><![CDATA[".$plugin['description']."]]></description>";
         $maincontent.="\n\t\t<about>".$plugin['about']."</about>";
         $maincontent.="\n\t\t<version>".$plugin['version']."</version>";
         $maincontent.="\n\t\t<qgis_minimum_version>$minversion</qgis_minimum_version>";
         $maincontent.="\n\t\t<qgis_maximum_version>$maxversion</qgis_maximum_version>";
         $maincontent.="\n\t\t<homepage><![CDATA[".$plugin['homepage']."]]></homepage>";
         $maincontent.="\n\t\t<file_name>".$plugin['filename']."</file_name>";
         $maincontent.="\n\t\t<icon>icon.png</icon>";
         $maincontent.="\n\t\t<author_name><![CDATA[".$plugin['author']."]]></author_name>";
         $maincontent.="\n\t\t<download_url>http";
         if($_SERVER['SERVER_PORT']  == 443){$maincontent.="s";}
         $maincontent.="://$_SERVER[HTTP_HOST]/downloads/".$plugin['filename']."</download_url>";
         $maincontent.="\n\t\t<uploaded_by><![CDATA[".$plugin['author']."]]></uploaded_by>";
         $maincontent.="\n\t\t<create_date><![CDATA[".$plugin['create_date']."]]></create_date>";
         $maincontent.="\n\t\t<update_date><![CDATA[".$plugin['update_date']."]]></update_date>";
         $maincontent.="\n\t\t<experimental>".$plugin['experimental']."</experimental>";
         $maincontent.="\n\t\t<deprecated>".$plugin['deprecated']."</deprecated>";
         $maincontent.="\n\t\t<tracker><![CDATA[".$plugin['tracker']."]]></tracker>";
         $maincontent.="\n\t\t<repository><![CDATA[".$plugin['repository']."]]></repository>";
         $maincontent.="\n\t\t<tags><![CDATA[".$plugin['tags']."]]></tags>";
         $maincontent.="\n\t\t<external_dependencies>".$plugin['external_dependencies']."</external_dependencies>";
         $maincontent.="\n\t\t<server>".$plugin['server']."</server>";
         $maincontent.="\n\t</pyqgis_plugin>";
       }
    }
    $header='<?xml version = "1.0" encoding = "UTF-8"?>
<?xml-stylesheet type="text/xsl" href="/plugins.xsl" ?>
<plugins>';
    $footer='
</plugins>';
echo($header.$maincontent.$footer);

function comment($var)
  {
    if(substr(trim($var),0,1)!=="#"){return true;}
  }
function category($var)
  {
    if(substr(trim($var),0,1)!=="["){return true;}
  }
?>

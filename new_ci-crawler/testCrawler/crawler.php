<?php
    // http://simplehtmldom.sourceforge.net/
    // MANUAL: http://simplehtmldom.sourceforge.net/manual.htm
    
    require("simple_form_dom.php");
    $html = file_get_html('https://www.google.com/search?source=hp&ei=iGIPXMmyCsyK8wW9qqewBw&q=coding+dojo&btnK=Google+Search&oq=coding+dojo&gs_l=psy-ab.3..0l10.1671.7320..7620...3.0..0.98.1085.14......0....1..gws-wiz.....0..0i131.msFzytDZcv8');
   var_dump($html);
    // Find all images 
   //  foreach($html->find('img') as $element) 
   //     echo $element->src . '<br>';

    // Find all links 
   //  foreach($html->find('a') as $element) 
   //     echo $element->href . '<br>';

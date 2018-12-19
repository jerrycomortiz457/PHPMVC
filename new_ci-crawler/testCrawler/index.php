<?php
    header('Access-Control-Allow-Origin: http://site-a.com', false);
    header('Access-Control-Allow-Origin: *');
    //connecting to a remote url using curl

    //see http://www.php.net/manual/en/function.curl-setopt.php for more info
    // $url = "https://www.glassdoor.com/Job/jobs.htm?suggestCount=0&suggestChosen=true&clickSource=searchBtn&typedKeyword=software+deve&sc.keyword=Software+Developer&locT=C&locId=1147436&jobType=";
    // $url = "https://www.google.com/search?source=hp&ei=iGIPXMmyCsyK8wW9qqewBw&q=coding+dojo&btnK=Google+Search&oq=coding+dojo&gs_l=psy-ab.3..0l10.1671.7320..7620...3.0..0.98.1085.14......0....1..gws-wiz.....0..0i131.msFzytDZcv8";
    $url = "https://www.google.com";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);  
    curl_close($ch);

    echo "<h1>Data</h1>";
    echo "<pre>".htmlentities($data)."</pre>";
    echo $data;

    echo "<h1>Info</h1>";
    echo "<pre>";
    // var_dump($info);
    var_dump($info);
    echo "</pre>";
  
    //http://simplehtmldom.sourceforge.net/
    //MANUAL: http://simplehtmldom.sourceforge.net/manual.htm
  

?>
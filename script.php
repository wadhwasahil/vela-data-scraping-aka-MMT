<?php
$k=0;
$id=0;
$a="";
$b="";
//$curl=$_POST['url'];
$curl="https://www.google.co.in/search?q=allintext:Theatre%20Actors&sort=date&cr=countryIN&aqs=chrome..69i57.1033j0j7&sourceid=chrome&es_sm=93&%20-site:https:://www.google.co.in";
ini_set('max_execution_time', 30000);
$label=0;
$array=array();
$file = fopen("fetch.csv", "w");

// for at max 1000 results
// increase k for more results

while($k<=1000){ 
$url=$curl."&num=100&start=".$k;
$homepage = file_get_contents($url);
//print_r($homepage);
$ans = htmlentities($homepage);
$doc = new DOMDocument();
@$doc->loadHTML($homepage);
$tags = $doc->getElementsByTagName('h3');
$finder = new DOMXPath($doc);
$node = $finder->query("//h3[contains(@class, 'r')]");
$flag=0;
foreach ($node as $tag) {
       $temp = $tag->getElementsByTagName('a');               
       $string = "";
       foreach ($temp as $key) {
            $k=0;
            $data = $key->getAttribute('href');
            //echo $data;
            for($i=0;$i<strlen($data);$i++){
                if($data[$i]=="&" || $data[$i]=='%') break;
                if($data[$i]=="="){
                    $k=1; continue;
                }
                if($k==1){
                     $string.=$data[$i];   
                }
            }
       }
       $idx=  split(":", $string);
       if(strcmp($idx[0],"http")!=0 && strcmp($idx[0],'https')!=0 && strcmp($idx[0],'www')!=0) continue;
       if(in_array($string, $array)){
          $label=1;
          break;
       }
       else{
          array_push($array, $string);
       }
       $ans = '<a href='.$string.'>'.$string.'</a>';
       $links = '=HYPERLINK('.'"'.$string.'"'.','.'"'.$string.'"'.')';
       $val = array($string);
       fputcsv($file, $val  );
       echo $id++."=".$ans;
       echo '<hr>'; 
}
if($label==1) break;
sleep(200);
$k+=100;
echo '<b><hr><hr></b>';
}
?>
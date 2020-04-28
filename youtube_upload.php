<?php
ini_set("allow_url_fopen",1);


include 'simple_html_dom.php';


$data = file_get_html("https://melon.com");
$data2 = file_get_html("https://www.melon.com/chart/");


/*foreach($data->find("div.list_wrap.typeRealtime") as $list) {


    foreach ($list->find("li.rank_item") as $item) {

        foreach( $item->find("div.rank_cntt") as $rank ){

            foreach( $rank->find("div.thumb") as $tumb){

                echo $tumb;
            }


            foreach( $rank->find("div.rank_info") as $rankinfo){

                echo $rankinfo->plaintext;
            }


        }
    }
}*/
 /*foreach($data2->find("div.calendar_prid") as $item) {
     foreach ($item->find("span.yyyymmdd") as $date) {
     }

     foreach ($item->find("span.hhmm") as $time) {
     }
     $datetime = $date." ".$time;

     echo $datetime;
 }*/


 foreach($data2->find("li.lank01") as $lank){
     foreach($lank->find("em") as $per){
         $text = $per->plaintext;

     }
 }
    $split = substr($text, 0, 2);
    echo $split;
?>


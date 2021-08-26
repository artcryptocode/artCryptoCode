<?php 
$id = $argv['1'] ?? '0000';
function encode($input)
{
    return preg_replace_callback(
        '/(.)\\1+/',
        function ($matches) {
            return strlen($matches[0]).$matches[1];
        },
        $input
    );
}
$size = '20';
$multiple = '24';
$matrice = file_get_contents("matrice-$id.txt");
$matrice = str_replace('[','',$matrice);
$matrice = str_replace(']','',$matrice);
$matrice = str_replace('), ',')-',$matrice);
$matrice = str_replace(' ','',$matrice);
$matrice = substr($matrice, 0, -1);
$matrice_arr = explode('-',$matrice);

foreach($matrice_arr as $rgb){
    $rgb = str_replace('(','',$rgb);
    $rgb = str_replace(')','',$rgb);
    $rgb_arr = explode(',',$rgb);

$new_arr[$rgb]['symbol'] = "";

$new_arr[$rgb]['hex'] = sprintf("#%02x%02x%02x", $rgb_arr[0], $rgb_arr[1], $rgb_arr[2]);
}
$i = '0';
$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
foreach($new_arr as $key => &$v){
$v['symbol'] = $alphabet[$i];
$v['replace'] = "(".$key.")";
$i++;
}
$matrice_arr = explode('-',$matrice);
foreach($matrice_arr as $rgb){
    $rgb = str_replace('(','',$rgb);
    $rgb = str_replace(')','',$rgb);
    $new_rgb = str_replace($rgb,$new_arr[$rgb]['symbol'],$rgb);
    
    $final .= "$new_rgb-";
}
$final = encode(str_replace('-','',substr($final, 0, -1)));
//print_r($new_arr);
foreach($new_arr as $k => $w){
    $symbol = $w['symbol'];
    $hex = $w['hex'];
    $colors[$w['symbol']] = $w['hex'];
}

foreach ($colors as $key => $value) {
    $color .= "['$key' , '$value'],\n";
}

$matrice = $final;
$html = file_get_contents('base.txt');
$html = str_replace('//matrice//',$final,$html);
$html = str_replace('//colors//',$color,$html);
file_put_contents("cryptocode_".$id.".html",$html);
?>

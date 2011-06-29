<?
include "ecwid_product_api.php";
$store_id = '283215'; //demo mode
$api = new EcwidProductApi($store_id);
$products = $api->get_all_products();

if (is_array($products) && !empty($products)) {
foreach ($products as $product) {
$url = "https://graph.facebook.com/comments/?ids=" . urlencode("http://bikerspost.ecwid.com/sharer?ownerid=283215&productid={$product["id"]}");
//echo $url . "\n";
$response = $api->internal_fetch_url_libcurl($url);
$comments = array_shift($api->internal_parse_json($response["data"]));
if (is_array($comments["data"])) {
foreach ($comments["data"] as $comment) {
echo "$product[name], $comment[message] \n"; 
}
}
}
} else {
//no products
}


?>

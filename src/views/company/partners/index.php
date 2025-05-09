<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Наши партнёры");
$APPLICATION->SetPageProperty("description", "Партнеры компании Vistasport в городах России");
$APPLICATION->SetTitle("Наши партнёры"); 
?>
<?
if($_REQUEST['ELEMENT_ID']!=''){
	$tpl='detail';
}else{
	$tpl='';
}

$APPLICATION->IncludeComponent(
    "bitlatepro:play",
    $tpl,
    Array(
        "IBLOCK_ID" => 18,
		"ELEMENT_ID" => $_REQUEST['ELEMENT_ID'],
        "URL_TO_COMMENT" => "/company/partners/".$_REQUEST['ELEMENT_ID'].".html"
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
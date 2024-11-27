<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Адреса экипировочных центров Vistasport в Москве и Нижнем Новгороде. Vistasport - все для настольного тенниса!");
$APPLICATION->SetTitle("Наши магазины в Москве"); 
?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.store",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"MAP_TYPE" => "0",
		"PHONE" => "Y",
		"SCHEDULE" => "Y",
		"SEF_FOLDER" => "/company/shops/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("element"=>"#store_id#.html","liststores"=>"index.php"),
		"SET_TITLE" => "N",
		"TITLE" => "Список складов с подробной информацией"
	)
);?><br>
</p>
<p>
 <br>
</p>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
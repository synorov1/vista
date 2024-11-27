<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Магазин товаров для настольного тенниса Виста Спорт в Москве. Широкий ассортимент экипировки и оборудования для пинг-понга. Адрес офиса и склада, схема проезда, режим работы, электронная почта, контакты, фото.");
$APPLICATION->SetPageProperty("title", "Контакты «Виста Спорт»");
$APPLICATION->SetTitle("Контакты ");?><div class="row">
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.store", 
	".default", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"MAP_TYPE" => "0",
		"PHONE" => "Y",
		"SCHEDULE" => "Y",
		"SEF_FOLDER" => "/company/contacts/",
		"SEF_MODE" => "Y",
		"SET_TITLE" => "N",
		"TITLE" => "Список складов с подробной информацией",
		"SEF_URL_TEMPLATES" => array(
			"liststores" => "index.php",
			"element" => "#store_id#.html",
		)
	),
	false
);?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>
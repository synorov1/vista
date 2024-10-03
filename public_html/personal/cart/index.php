<?if (isset($_REQUEST['load']) && $_REQUEST['load'] == 'Y') {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
} else {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Корзина");
}
//echo CSite::InGroup([14]) ?  "public_html/personal/order/share" : "/personal/order/make/";?>
<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"services", 
	array(
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "DISCOUNT",
			2 => "DELETE",
			3 => "PRICE",
			4 => "QUANTITY",
			5 => "SUM",
			6 => "PROPERTY_DISCOUNT",
		),
		"PATH_TO_ORDER" => CSite::InGroup([14]) ?  "/personal/order/share/" : "/personal/order/make/",
		"HIDE_COUPON" => "Y",
		"QUANTITY_FLOAT" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"SET_TITLE" => "Y",
		"OFFERS_PROPS" => array(
		),
		"USE_PREPAYMENT" => "N",
		"AUTO_CALCULATION" => "Y",
		"ACTION_VARIABLE" => "action",
		"REQUEST_LOAD" => (isset($_REQUEST["load"])&&$_REQUEST["load"]=="Y")?"Y":"N",
		"COMPONENT_TEMPLATE" => "services",
		"TEMPLATE_THEME" => "blue",
		"CORRECT_RATIO" => "N",
		"USE_GIFTS" => "N",
		"GIFTS_PLACE" => "BOTTOM",
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
		"GIFTS_SHOW_OLD_PRICE" => "N",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_CONVERT_CURRENCY" => "N",
		"GIFTS_HIDE_NOT_AVAILABLE" => "N",
		"DEFERRED_REFRESH" => "N",
		"USE_DYNAMIC_SCROLL" => "Y",
		"SHOW_FILTER" => "N",
		"SHOW_RESTORE" => "N",
		"COLUMNS_LIST_EXT" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DELETE",
			2 => "SUM",
		),
		"COLUMNS_LIST_MOBILE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DELETE",
			2 => "SUM",
		),
		"TOTAL_BLOCK_DISPLAY" => array(
			0 => "bottom",
		),
		"DISPLAY_MODE" => "extended",
		"PRICE_DISPLAY_MODE" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
		"USE_PRICE_ANIMATION" => "Y",
		"LABEL_PROP" => array(
		),
		"COMPATIBLE_MODE" => "Y",
		"EMPTY_BASKET_HINT_PATH" => "/",
		"ADDITIONAL_PICT_PROP_5" => "-",
		"ADDITIONAL_PICT_PROP_16" => "-",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"USE_ENHANCED_ECOMMERCE" => "N"
	),
	false
);?>
<?if (isset($_REQUEST['load']) && $_REQUEST['load'] == 'Y') {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
} else {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
}?>
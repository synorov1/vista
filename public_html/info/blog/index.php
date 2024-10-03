<?if (isset($_REQUEST['load']) && $_REQUEST['load'] == 'Y') {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("title", "Настольный теннис - полезная информация для любителей и профессионалов, ВистаСпорт");
$APPLICATION->SetPageProperty("description", "Полезная информация и актуальные новости для начинающих и любителей настольного тенниса от профессионалов компании «Виста Спорт». Все об инвентаре и экипировке. Техника игры, а также залы и площадки, на которых можно поиграть и потренероваться в России.");
} else {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Блог Vistasport");
}?><?//$curYear = $curYear;
//if ($curYear !='') {
    $arrFilter = array(
        "SECTION_ID"=>$_REQUEST['SECT'],
    );
//}

$APPLICATION->IncludeComponent(
	"bitrix:news", 
	".default", 
	array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "14",
		"NEWS_COUNT" => "5",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"NUM_NEWS" => "20",
		"NUM_DAYS" => "180",
		"YANDEX" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "N",
		"FILTER_NAME" => ($curYear>0)?"arrFilter":"N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/info/blog/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_PANEL" => "Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "NAME",
			1 => "TAGS",
			2 => "PREVIEW_TEXT",
			3 => "PREVIEW_PICTURE",
			4 => "DETAIL_TEXT",
			5 => "DETAIL_PICTURE",
			6 => "DATE_ACTIVE_FROM",
			7 => "ACTIVE_FROM",
			8 => "DATE_ACTIVE_TO",
			9 => "ACTIVE_TO",
			10 => "DATE_CREATE",
			11 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "BOTTOM_TEXT",
			1 => "PHOTOGALLERY",
			2 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => ".default",
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Блог",
		"BLOG_URL" => "NL_BLOG_s1",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "catalog",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_SHARE" => "N",
		"REQUEST_LOAD" => (isset($_REQUEST["load"])&&$_REQUEST["load"]=="Y")?"Y":"N",
		"CUR_YEAR" => $curYear,
		"COMPONENT_TEMPLATE" => ".default",
		"SET_LAST_MODIFIED" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_CODE#/",
			"detail" => "#ELEMENT_CODE#.html",
		)
	),
	false
);?>
<?if (isset($_REQUEST['load']) && $_REQUEST['load'] == 'Y') {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
} else {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
}?>
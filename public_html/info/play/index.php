<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Расскажем о площадках для игры в настольный теннис, дадим контакты, адреса и телефоны. Vistasport - все о настольном теннисе!");
$APPLICATION->SetTitle("Где поиграть"); 
?><?if($_REQUEST['ELEMENT_ID']!=''){
	$tpl='detail';
}else{
	$tpl='';
}

$APPLICATION->IncludeComponent(
    "bitlatepro:play",
    $tpl,
    Array(
        "IBLOCK_ID" => 17,
        "ELEMENT_ID" => $_REQUEST['ELEMENT_ID'],
    )
);?>
<div id="where_play">
<hr>
<h2>Знаете, где еще можно поиграть? Расскажите об этом Всем!</h2>
<?$APPLICATION->IncludeComponent(
	"altasib:feedback.form", 
	".default", 
	array(
		"ACTIVE_ELEMENT" => "N",
		"ADD_HREF_LINK" => "Y",
		"ADD_LEAD" => "N",
		"ALX_LINK_POPUP" => "N",
		"BBC_MAIL" => "synorov1@yandex.ru",
		"CAPTCHA_TYPE" => "default",
		"CATEGORY_SELECT_NAME" => "Выберите категорию",
		"CHANGE_CAPTCHA" => "N",
		"CHECKBOX_TYPE" => "CHECKBOX",
		"CHECK_ERROR" => "Y",
		"COLOR_OTHER" => "#009688",
		"COLOR_SCHEME" => "BRIGHT",
		"COLOR_THEME" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"EVENT_TYPE" => "ALX_FEEDBACK_FORM",
		"FB_TEXT_NAME" => "",
		"FB_TEXT_SOURCE" => "PREVIEW_TEXT",
		"FORM_ID" => "1",
		"IBLOCK_ID" => "17",
		"IBLOCK_TYPE" => "altasib_feedback",
		"INPUT_APPEARENCE" => array(
			0 => "DEFAULT",
		),
		"JQUERY_EN" => "N",
		"LINK_SEND_MORE_TEXT" => "Отправить ещё одно сообщение",
		"LOCAL_REDIRECT_ENABLE" => "N",
		"MASKED_INPUT_PHONE" => array(
		),
		"MESSAGE_OK" => "Спасибо. Новое место появится на нашем сайте после того как мы проверим предоставленную информацию.",
		"NAME_ELEMENT" => "DESCR",
		"NOT_CAPTCHA_AUTH" => "Y",
		"PROPERTY_FIELDS" => array(
			0 => "SITI",
			1 => "ADRESS",
			2 => "METRO",
			3 => "ZAL",
			4 => "DESCR",
			5 => "KOMFORT",
			6 => "TIME",
			7 => "TURNIR",
			8 => "PHONE",
			9 => "SAIT",
			10 => "PHOTO1",
			11 => "PHOTO2",
			12 => "PHOTO3",
			13 => "PHOTO4",
			14 => "PHOTO5",
		),
		"PROPERTY_FIELDS_REQUIRED" => array(
			0 => "SITI",
			1 => "ADRESS",
			2 => "ZAL",
			3 => "DESCR",
		),
		"PROPS_AUTOCOMPLETE_EMAIL" => array(
		),
		"PROPS_AUTOCOMPLETE_NAME" => array(
		),
		"PROPS_AUTOCOMPLETE_PERSONAL_PHONE" => array(
		),
		"PROPS_AUTOCOMPLETE_VETO" => "N",
		"REQUIRED_SECTION" => "N",
		"SECTION_FIELDS_ENABLE" => "N",
		"SECTION_MAIL_ALL" => "info@vistasport.ru",
		"SEND_IMMEDIATE" => "Y",
		"SEND_MAIL" => "N",
		"SHOW_LINK_TO_SEND_MORE" => "N",
		"SHOW_MESSAGE_LINK" => "Y",
		"SPEC_CHAR" => "N",
		"USERMAIL_FROM" => "N",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_INPUT_LABEL" => "",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CAPTCHA" => "N",
		"WIDTH_FORM" => "100%"
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
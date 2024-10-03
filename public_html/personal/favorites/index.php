<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Избранное");
global $favFilter;
if (CModule::IncludeModule('bitlate.proshop')) {
    $USER_FAVORITES = BitlateProUtils::getFavorits();
    if (is_array($USER_FAVORITES) && count($USER_FAVORITES) > 0) {
        $favFilter = array('ID' => array_keys($USER_FAVORITES));
    } else {
        $favFilter = array('ID' => false);
    }

    $APPLICATION->IncludeComponent("bitrix:catalog.section", "favorites_static", Array(
	"USER_FAVORITES" => $USER_FAVORITES,
		"BY_LINK" => "Y",
		"IBLOCK_TYPE" => "catalog",	// Тип инфоблока
		"IBLOCK_ID" => "16",	// Инфоблок
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_FIELD2" => "active_from",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER2" => "asc",	// Порядок второй сортировки элементов
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"BASKET_URL" => "/personal/cart/",	// URL, ведущий на страницу с корзиной покупателя
		"ACTION_VARIABLE" => "",	// Название переменной, в которой передается действие
		"PRODUCT_ID_VARIABLE" => "",	// Название переменной, в которой передается код товара для покупки
		"SECTION_ID_VARIABLE" => "",	// Название переменной, в которой передается код группы
		"PRODUCT_QUANTITY_VARIABLE" => "",	// Название переменной, в которой передается количество товара
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"FILTER_NAME" => "favFilter",	// Имя массива со значениями фильтра для фильтрации элементов
		"CACHE_TYPE" => "N",	// Тип кеширования
		"CACHE_TIME" => "0",	// Время кеширования (сек.)
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
		"PAGE_ELEMENT_COUNT" => "999999",	// Количество элементов на странице
		"LINE_ELEMENT_COUNT" => "",	// Количество элементов выводимых в одной строке таблицы
		"PRICE_CODE" => array(	// Тип цены
			0 => "retail",
			1 => "Типовое соглашение ОПТ",
			2 => "WHOLESALE",
			3 => "Типовое соглашение ДИЛЕР",
			4 => "Типовое соглашение СПЕЦ",
			5 => "Типовое соглашение СПЕЦ2",
		),
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"USE_PRODUCT_QUANTITY" => "Y",	// Разрешить указание количества товара
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRODUCT_PROPERTIES" => array(	// Характеристики товара
			0 => " ",
		),
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"PAGER_TITLE" => "",	// Название категорий
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PROPERTY_CODE" => array(	// Свойства
			0 => " ",
		),
		"OFFERS_CART_PROPERTIES" => array(	// Свойства предложений, добавляемые в корзину
			0 => "ARTNUMBER",
			1 => "TSVET",
			2 => "RAZMER",
			3 => "TIP_RUCHKI_1",
			4 => "TOLSHCHINA_1",
		),
		"OFFERS_FIELD_CODE" => "",	// Поля предложений
		"OFFERS_PROPERTY_CODE" => array(	// Свойства предложений
			0 => "ARTNUMBER",
			1 => "TSVET",
			2 => "RAZMER",
			3 => "TIP_RUCHKI_1",
			4 => "TOLSHCHINA_1",
		),
		"OFFERS_SORT_FIELD" => "sort",	// По какому полю сортируем предложения товара
		"OFFERS_SORT_FIELD2" => "name",	// Поле для второй сортировки предложений товара
		"OFFERS_SORT_ORDER" => "asc",	// Порядок сортировки предложений товара
		"OFFERS_SORT_ORDER2" => "asc",	// Порядок второй сортировки предложений товара
		"OFFERS_LIMIT" => "0",	// Максимальное количество предложений для показа (0 - все)
		"SECTION_ID" => "",	// ID раздела
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_URL" => "/catalog/#SECTION_CODE#/",	// URL, ведущий на страницу с содержимым раздела
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#.html",	// URL, ведущий на страницу с содержимым элемента раздела
		"CONVERT_CURRENCY" => "Y",	// Показывать цены в одной валюте
		"CURRENCY_ID" => "RUB",	// Валюта, в которую будут сконвертированы цены
		"HIDE_NOT_AVAILABLE" => "N",	// Недоступные товары
		"LABEL_PROP" => "SALELEADER",	// Свойство меток товара
		"ADD_PICT_PROP" => "MORE_PHOTO",	// Дополнительная картинка основного товара
		"ADD_VIDEO_PROP" => "",
		"PRODUCT_DISPLAY_MODE" => "Y",	// Схема отображения
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",	// Дополнительные картинки предложения
		"OFFER_ADD_VIDEO_PROP" => "MORE_VIDEO",
		"OFFER_TREE_PROPS" => array(	// Свойства для отбора предложений
			0 => "ARTNUMBER",
			1 => "TSVET",
			2 => "RAZMER",
			3 => "TIP_RUCHKI_1",
			4 => "TOLSHCHINA_1",
		),
		"PRODUCT_SUBSCRIPTION" => "N",	// Разрешить оповещения для отсутствующих товаров
		"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
		"SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
		"ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
		"MESS_BTN_BUY" => "",	// Текст кнопки "Купить"
		"MESS_BTN_ADD_TO_BASKET" => "",	// Текст кнопки "Добавить в корзину"
		"MESS_BTN_DETAIL" => "",	// Текст кнопки "Подробнее"
		"MESS_NOT_AVAILABLE" => "",	// Сообщение об отсутствии товара
		"TEMPLATE_THEME" => "",	// Цветовая тема
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"SECTION_USER_FIELDS" => "",	// Свойства раздела
		"SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	),
	false
);
}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
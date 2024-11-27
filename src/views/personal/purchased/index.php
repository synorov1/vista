<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Купленные товары");
?>
<?$APPLICATION->IncludeComponent("bitrix:sale.personal.order.list", "purchase", Array(
	"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SEF_MODE" => "Y",
		"PER_PAGE" => "40",
		"COMPONENT_TEMPLATE" => ".default",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"PATH_TO_DETAIL" => "",	// Страница c подробной информацией о заказе
		"PATH_TO_COPY" => "",	// Страница повторения заказа
		"PATH_TO_CANCEL" => "",	// Страница отмены заказа
		"PATH_TO_PAYMENT" => "payment.php",	// Страница подключения платежной системы
		"PATH_TO_BASKET" => "",	// Страница корзины
		"PATH_TO_CATALOG" => "/catalog/",	// Путь к каталогу
		"ORDERS_PER_PAGE" => "40",	// Количество заказов, выводимых на страницу
		"ID" => $ID,	// Идентификатор заказа
		"DISALLOW_CANCEL" => "N",	// Запретить отмену заказа
		"SAVE_IN_SESSION" => "Y",	// Сохранять установки фильтра в сессии пользователя
		"NAV_TEMPLATE" => "",	// Имя шаблона для постраничной навигации
		"HISTORIC_STATUSES" => "",	// Перенести в историю заказы в статусах
		"RESTRICT_CHANGE_PAYSYSTEM" => array(	// Запретить смену платежной системы у заказов в статусах
			0 => "0",
		),
		"REFRESH_PRICES" => "N",	// Пересчитывать заказ после смены платежной системы
		"DEFAULT_SORT" => "DATE_INSERT",	// Сортировка заказов
		"ALLOW_INNER" => "N",	// Разрешить оплату с внутреннего счета
		"ONLY_INNER_FULL" => "N",	// Разрешить оплату с внутреннего счета только в полном объеме
    "POPUP" => "N"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
    <article class="inner-container cart-container cart-container-pay cart-container-order">
        <div class="cart-qr">
            <?$APPLICATION->IncludeComponent(
                "altasib:qrcode",
                "",
                Array(
                    "CACHE_TIME" => "2592000",
                    "CACHE_TYPE" => "A",
                    "QR_COLOR" => "000000",
                    "QR_COLORBG" => "FFFFFF",
                    "QR_COPY" => "N",
                    "QR_DEL_CHACHE" => "Y",
                    "QR_ERROR_CORECT" => "L",
                    "QR_MINI" => "",
                    "QR_SIZE_VAL" => "4",
                    "QR_SQUARE" => "2",
                    "QR_TEXT" => "",
                    "QR_TYPE_INF" => "URL",
                    "QR_URL" => $_SERVER['SERVER_NAME'],
                    "QR_URL_CURRENT" => "N",
                    "QR_VALID_PROPERTY" => "BASKET_ID"
                )
            );?>
    </div>

    </article>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
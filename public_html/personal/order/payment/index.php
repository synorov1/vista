<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("Оплата заказа №".$_REQUEST['ORDER_ID']);
ob_start();
$APPLICATION->IncludeComponent(
    "bitrix:sale.order.payment",
    "",
    Array(
    )
);
$formPay = ob_get_contents();
ob_end_clean();?>
<div class="fancybox-block cart-container-pay" style="display: block;">
    <div class="fancybox-block-caption"><?=$APPLICATION->GetTitle()?></div>
    <div class="fancybox-block-wrap">
        <div class="text-center">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "PATH" => SITE_DIR . "include/pay.php"
                )
            );?>
            <!--<svg class="icon" style="fill:#0084ff; width: 100px;">
                <use xlink:href="#svg-icon-pay-by-card"></use>
            </svg>-->
        </div>
        <?echo $formPay?>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
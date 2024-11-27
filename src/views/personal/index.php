<?
define('NEED_AUTH', true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<div class="profile-column-container large-up-2 xlarge-up-3">
    <?$APPLICATION->IncludeComponent("bitrix:main.include", "",
        array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR . "include/popup/profile_user_info.php"
        ),
        false
    );?>
    <?$APPLICATION->IncludeFile(
        SITE_DIR . "include/popup/summary.php",
        Array(
            'POPUP' => 'N',
            'HISTORIC_STATUSES' => false,
        )
    );?>
    <?if (FALSE && CModule::IncludeModule('bitlate.proshop')):?>
        <div class="column profile-column-item" data-order="5">
            <div class="profile-block">
                <div class="profile-block-caption">
                    <svg class="icon">
                        <use xlink:href="#svg-icon-liked"></use>
                    </svg>
                    Избранное
                </div>
                <div class="profile-block-wrap">
                    <?if ($countFav = BitlateProUtils::getCountFavorits()):?>
                        <p>У Вас в избранном <?=$countFav?> <?=BitlateProUtils::nl_inclination($countFav, 'товар', 'товара', 'товаров')?></p>
                        <a href="#liked" class="button small secondary fancybox">Изменить</a>
                    <?else:?>
                        <p>У Вас нет товаров в избранном</p>
                    <?endif;?>
                </div>
            </div>
        </div>
    <?endif;?>
    <?$APPLICATION->IncludeComponent("bitrix:main.include", "",
        array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR . "include/popup/profile_list.php"
        ),
        false
    );?>
    <?$APPLICATION->IncludeFile(
        SITE_DIR . "include/popup/subscribe.php",
        Array(
            'TEMPLATE' => '',
            'SET_TITLE' => 'N',
        )
    );?>
    <?$APPLICATION->IncludeFile(
        SITE_DIR . "include/popup/history.php",
        Array(
            'POPUP' => 'N',
            'ORDERS_PER_PAGE' => '10',
        )
    );?>
</div>
<div id="discount_rules" class="fancybox-block cart ">
    <div class="fancybox-block-caption">Наши скидки</div>
        <div class="fancybox-block-wrap podskaska">
        	<div style="" class="row">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "PATH" => SITE_DIR . "include/discounts.php"
                )
            );?>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
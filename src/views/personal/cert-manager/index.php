<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Управление подарочными сертификатами");
$CODE = $_REQUEST['cert-code']
?>
<style>
    dl > dt {float: left;margin: 0 10px 0 0}
    dl > dd{color:#000; font-weight: 700}
    .fieldset {display: flex;justify-content: space-between;align-items: baseline}
    .fieldset > input{width:60%}
    .alert p {color: red}
</style>
<div class="column">
    <form>
        <div class="fieldset">
            <label class="show-for-large">Введите код сертификата</label>
            <input type="text" name="cert-code" value="<?=$CODE?>" placeholder="код сертификата"/>
            <button class="button small" type="submit">Показать</button>
        </div>
    </form>
    <? if ( strlen($CODE) > 0) :?>
        <?if (\Bitrix\Main\Loader::includeModule("sale") && \Bitrix\Main\Loader::includeModule("iblock")) {

            require_once ($_SERVER["DOCUMENT_ROOT"]."/local/lib/salecert/CertBuy.php");
            $cert = SaleCert::checкCoupon($CODE, true);
            if ( !empty($cert['ERROR']) ) {?>
              <div class="alert">
                  <h2><?=$cert['NAME'] ?: 'Ошибка'?></h2>
                  <p><?=$cert['ERROR']?></p>
                  <dl>
                      <?if ($cert['MODIFIED_DATE']){?><dt>Погашен: </dt><dd><?=$cert['MODIFIED_DATE']?></dd><?}
                      if ($cert['MODIFIED_USER']){?><dt>Пользователем: </dt><dd><?=$cert['MODIFIED_USER']?></dd><?}?>
                  </dl>
              </div>
            <?} else {
                $lastTime =  new Bitrix\Main\Type\DateTime($cert['ACTIVE_TO']);?>
                <h2><?=$cert['NAME']?></h2><dl>
                    <!--<dt>Номинал: </dt><dd><?=$cert['PROPERTY_NOMINAL_VALUE']?></dd>-->
                    <dt>Купон: </dt><dd><?=$cert['PROPERTY_COUPON_VALUE']?></dd>
                    <dt>Создан: </dt><dd><?=$cert['DATE_CREATE']?></dd>
                    <dt>Действителен до: </dt><dd><?=$lastTime->format("d.m.Y")?></dd>
                </dl>

                <form id="redem-form" data-ajax="/nl_ajax/cart.php">
                    <input type="hidden" name="cert-2-red-id" value="<?=$cert['ID']?>"/>
                    <input type="hidden" name="action" value="redem_cert"/>
                    <div class="fieldset">
                        <label class="show-for-large">Введите номер заказа для гашения</label>
                        <input type="text" name="cert-2-red-order" placeholder="Номер заказа"/>
                        <button class="button small" type="submit">Погасить</button>
                    </div>
                </form>

                <div id="redem-result"></div>

                <script>
                    function getFormData($form){
                        var unindexed_array = $form.serializeArray();
                        var indexed_array = {};
                        $.map(unindexed_array, function(n, i){
                            indexed_array[n['name']] = n['value'];
                        });
                        return indexed_array;
                    }



                    jQuery(document).ready(function() {
                        jQuery(document).on('submit', '#redem-form', function(e) {
                            var curForm = $(this), postData = curForm.serializeArray();
                            postData.push ({name:'sessid',value:BX.bitrix_sessid()});
                            console.log(JSON.stringify(postData));
                            //console.log(JSON.stringify( curForm.serializeObject() ))
                            $.ajax({
                                type: 'POST',
                                url: curForm.attr('data-ajax'),
                                data: postData,
                                dataType: 'json',
                                success: function(result){console.log(result)
                                    if (result.success){
                                        curForm.hide();
                                        $("#redem-result").html("<b>Сертификат №"+result.id+" успешно погашен</b>")
                                    } else
                                        $("#redem-result").html(result.error)
                                    $("#redem-result").show();
                                }
                            });
                            e.preventDefault();
                        })
                    })
                </script>
            <?}
        }
    endif;?>


    <? //endif;?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Прайс-лист товаров для настольного тенниса во всероссийском экипировочном центре Vistasport.");
$APPLICATION->SetTitle("Прайс-лист");
?>
<figure style="display: inline-block;float: right;text-align: center;">
	<a title="Скачать XLS-файл на свой компьютер" href="/upload/Price/Price.xls" target="_blank">
		<img alt="скачать" src="/upload/medialibrary/9f1/9f13e4cd7af55ebf020322d849750654.png" width="40" height="40">
		<figcaption>Скачать</figcaption>
	</a>
</figure>
<iframe name="price" src="https://docs.google.com/viewer?url=https://www.vistasport.ru/upload/Price/Price.xls&embedded=true" 
style="width: 100%; height: 600px;" frameborder="0">Ваш браузер не поддерживает фреймы</iframe><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
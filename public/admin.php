<?php
include_once '../sys/core/init.inc.php';
include_once '../sys/class/class.calendar.inc.php';

//вивести начальную страницу
$page_title = "Добавление/редактирование события";
$css_files = array("style.css", "admin.css");
include_once 'assets/common/header.inc.php';

//загрузить календарь
$cal = new Calendar($dbo);
?>
<div id="content">

<?php echo $cal->displayForm();
?>

</div><!-- конец contenta-->
<?php
include_once 'assets/common/footer.inc.php';
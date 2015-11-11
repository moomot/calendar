<?php

/*
 * Include necessary files
 */
function __autoload($class_name)
{
    $filename = '../sys/class/class.' . strtolower($class_name) . '.inc.php';
    if ( file_exists($filename) )
    {
        include $filename;
    }
}
/*
 * Load the calendar for January
 */
include_once '../sys/core/init.inc.php';
$cal = new Calendar($dbo, "2010-01-01 12:00:00");

/*
 * Set up the page title and CSS files
 */
$page_title = "Events Calendar";
$css_files = array('style.css', 'admin.css');

/*
 * Include the header
 */
include_once 'assets/common/header.inc.php';

?>

	<div id="content">
		<?php

		echo $cal->buildCalendar();

		?>

	</div><!-- end #content -->
<?php

echo  isset($_SESSION['user']) ? "Вход выполнен" : "Вход не выполнен";
/*
 * Include the footer
 */
include_once 'assets/common/footer.inc.php';

?>
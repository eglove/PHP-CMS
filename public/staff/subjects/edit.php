<?php require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirectTo(urlFor('staff/subjects/index.php'));
} else {
    $id = $_GET['id'];
}
$menu_name = '';
$position = '';
$visible = '';

if (isPostRequest()) {
    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo 'Form parameters<br />';
    echo 'Menu name: ' . $menu_name . '<br />';
    echo 'Position:' . $position . '<br />';
    echo 'Visible:' . $visible . '<br />';
}
?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo urlFor('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject edit">
        <h1>Edit Subject</h1>

        <form action="<?php echo urlFor('/staff/subjects/edit.php?id=' . h(u($id))) ?>" method="post">
            <dl>
                <dt><label for="menu_name">Menu Name</label></dt>
                <dd><input id="menu_name" type="text" name="menu_name" value="<?php echo $menu_name ?>"/></dd>
            </dl>
            <dl>
                <dt><label for="position">Position</label></dt>
                <dd>
                    <select id="position" name="position">
                        <option value="1">1</option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt><label for="visible">Visible</label></dt>
                <dd>
                    <input type="hidden" name="visible" value="0"/>
                    <input id="visible" type="checkbox" name="visible" value="1"/>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

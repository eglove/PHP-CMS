<?php require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirectTo(urlFor('staff/pages/index.php'));
}

$id = $_GET['id'];
$menu_name = '';
$position = '';
$visible = '';

if (isPostRequest()) {
    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo 'Form parameters<br />';
    echo 'Page name: ' . $menu_name . '<br />';
    echo 'Position:' . $position . '<br />';
    echo 'Visible:' . $visible . '<br />';
}
?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo urlFor('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page edit">
        <h1>Edit Page</h1>

        <form action="<?php echo urlFor('/staff/pages/edit.php?id=' . h(u($id))) ?>" method="post">
            <dl>
                <dt><label for="menu_name">Page Name</label></dt>
                <dd><input id="menu_name" type="text" name="menu_name" value="<?php echo h($menu_name) ?>"/></dd>
            </dl>
            <dl>
                <dt><label for="position">Position</label></dt>
                <dd>
                    <select id="position" name="position">
                        <option value="1" <?php if ($position == "1") {
                            echo " selected";
                        } ?>>1
                        </option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt><label for="visible">Visible</label></dt>
                <dd>
                    <input type="hidden" name="visible" value="0"/>
                    <input id="visible" type="checkbox" name="visible" value="1" <?php if ($visible == "1") {
                        echo " checked";
                    } ?>/>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Page"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

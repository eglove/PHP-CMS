<?php
require_once('../../../private/initialize.php');
$page_title = 'Create Subject';

$manu_name = '';
$position = '';
$visible = '';

if (isPostRequest()) {
    $manu_name = $_POST['manu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo 'Form parameters<br />';
    echo 'Page Name: ' . $manu_name . '<br />';
    echo 'Position:' . $position . '<br />';
    echo 'Visible:' . $visible . '<br />';
}
?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo urlFor('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page new">
        <h1>Create Page</h1>

        <form action="<?php echo urlFor('/staff/pages/new.php'); ?>" method="post">
            <dl>
                <dt><label for="manu_name">Page Name</label></dt>
                <dd><input id="manu_name" type="text" name="manu_name" value="<?php echo h($manu_name) ?>"/></dd>
            </dl>
            <dl>
                <dt><label for="position">Position</label></dt>
                <dd>
                    <select id="position" name="position">
                        <option value="1" <?php if ($position == '1') {
                            echo ' selected';
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
                <input type="submit" value="Create Page"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

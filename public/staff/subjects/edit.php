<?php require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirectTo(urlFor('staff/subjects/index.php'));
}
$id = $_GET['id'];

if (isPostRequest()) {
    $subject = [];
    $subject['id'] = $id;
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = update_subject($subject);
    if ($result === true) {
        redirectTo(urlFor('staff/subjects/show.php?id=' . $id));
    } else {
        $errors = $result;
    }
} else {
    $subject = find_subject_by_id($id);
}
$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);
?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo urlFor('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject edit">
        <h1>Edit Subject</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo urlFor('/staff/subjects/edit.php?id=' . h(u($id))) ?>" method="post">
            <dl>
                <dt><label for="menu_name">Menu Name</label></dt>
                <dd><input id="menu_name" type="text" name="menu_name" value="<?php echo h($subject['menu_name']) ?>"/>
                </dd>
            </dl>
            <dl>
                <dt><label for="position">Position</label></dt>
                <dd>
                    <select id="position" name="position">
                        <?php
                        for ($i = 1; $i <= $subject_count; $i++) {
                            echo "<option value\"{$i}\"";
                            if ($subject['position'] == $i) {
                                echo " selected";
                            }
                            echo ">{$i}</option>";
                        }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt><label for="visible">Visible</label></dt>
                <dd>
                    <input type="hidden" name="visible" value="0"/>
                    <input id="visible" type="checkbox" name="visible" value="1" <?php if ($subject['visible'] == "1") {
                        echo " checked";
                    } ?>/>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

<?php
require_once('../../../private/initialize.php');

if (isPostRequest()) {
    global $db;

    $subject = [];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirectTo(urlFor('staff/subjects/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
}

$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set) + 1;
mysqli_free_result($subject_set);

$subject = [];
$subject['position'] = $subject_count;

$page_title = 'Create Subject';
?>

<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo urlFor('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Create Subject</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo urlFor('/staff/subjects/new.php'); ?>" method="post">
            <dl>
                <dt><label for="menu_name">Menu Name</label></dt>
                <dd><input id="menu_name" type="text" name="menu_name" value=""/></dd>
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
                    <input id="visible" type="checkbox" name="visible" value="1"/>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

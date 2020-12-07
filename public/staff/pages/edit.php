<?php require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirectTo(urlFor('staff/pages/index.php'));
}

$id = $_GET['id'];

if (isPostRequest()) {
    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = update_page($page);
    redirectTo(urlFor('staff/pages/show.php?id=' . $id));
} else {
    $page = find_page_by_id($id);
    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);
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
                <dt><label for="subject_id">Subject</label></dt>
                <dd>
                    <select id="subject_id" name="subject_id">
                        <?php
                        $subject_set = find_all_subjects();
                        while ($subject = mysqli_fetch_assoc($subject_set)) {
                            echo "<option value=\"" . h($subject['id']) . "\"";
                            if ($page["subject_id"] == $subject["id"]) {
                                echo " selected";
                            }
                            echo ">" . h($subject['menu_name']) . "</option>";
                        }
                        mysqli_free_result($subject_set);
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt><label for="menu_name">Page Name</label></dt>
                <dd><input id="menu_name" type="text" name="menu_name" value="<?php echo h($page['menu_name']) ?>"/>
                </dd>
            </dl>
            <dl>
                <dt><label for="position">Position</label></dt>
                <dd>
                    <select id="position" name="position">
                        <?php
                        for ($i = 1; $i <= $page_count; $i++) {
                            echo "<option value\"{$i}\"";
                            if ($page['position'] == $i) {
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
                    <input id="visible" type="checkbox" name="visible" value="1" <?php if ($page['visible'] == "1") {
                        echo " checked";
                    } ?>/>
                </dd>
            </dl>
            <dl>
                <dt><label for="content">Content</label></dt>
                <dd>
                    <textarea id="content" name="content" cols="60" rows="10"><?php echo h($page['content']); ?></textarea>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Page"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

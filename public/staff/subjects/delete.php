<?php

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirectTo(urlFor('/staff/subjects/index.php'));
}
$id = $_GET['id'];

if (isPostRequest()) {
    delete_subject($id);
    redirectTo(urlFor('staff/subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}

?>

<?php $page_title = 'Delete Subject'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo urlFor('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo h($subject['menu_name']); ?></p>

        <form action="<?php echo urlFor('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Subject"/>
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

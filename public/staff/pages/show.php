<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1';
$page = find_page_by_id($id);
?>

<?php $pageTitle = 'Show Page' ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">
    <a href="<?php echo urlFor('/staff/pages/index.php'); ?>" class="backLink">&laquo; Back to List</a>
    <div class="page show">
        <h1>Page: <?php echo h($page['menu_name']); ?></h1>

        <div class="attributes">
            <?php $subject = find_subject_by_id($page['subject_id']); ?>
            <dl>
                <dt>Subject</dt>
                <dd><?php echo h($subject['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($page['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($page['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo h($page['visible']); ?></dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd><?php echo h($page['content']); ?></dd>
            </dl>
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

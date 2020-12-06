<?php require_once('../../../private/initialize.php'); ?>

<?php
$id = $_GET['id'] ?? '1';
?>

<?php $pageTitle = 'Show Page' ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">
    <a href="<?php echo urlFor('/staff/pages/index.php'); ?>" class="backLink">&laquo; Back to List</a>
    <div class="page show">
        Page ID: <?php echo h($id); ?>
    </div>
</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

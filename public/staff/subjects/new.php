<?php
require_once('../../../private/initialize.php');
 $page_title = 'Create Subject';
 ?>

<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo urlFor('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Create Subject</h1>

        <form action="<?php echo urlFor('/staff/subjects/create.php'); ?>" method="post">
            <dl>
                <dt><label for="menu_name">Menu Name</label></dt>
                <dd><input id="menu_name" type="text" name="menu_name" value=""/></dd>
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
                <input type="submit" value="Create Subject"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>

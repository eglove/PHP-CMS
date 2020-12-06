<?php
require_once ('../../../private/initialize.php');

$id = $_GET['id'] ?? '1';
echo h($id);
?>

<a href="show.php?name=<?php echo u('John Doe'); ?>">Link</a>
<a href="show.php?name=<?php echo u('Widgets&More'); ?>">Link</a>
<a href="show.php?name=<?php echo u('!#&?'); ?>">Link</a>

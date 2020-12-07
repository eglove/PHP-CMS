<?php

require_once('../../../private/initialize.php');

if (isPostRequest()) {
    $subject = [];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);
    $new_id = mysqli_insert_id($db);
    redirectTo(urlFor('staff/subjects/show.php?id=' . $new_id));
} else {
    redirectTo(urlFor('/staff/subjects/new.php'));
}

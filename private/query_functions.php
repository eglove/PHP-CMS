<?php
function find_all_subjects() {
    global $db;

    $sql = 'select * from subjects ';
    $sql .= 'order by position asc';
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_pages() {
    global $db;

    $sql = 'select * from pages ';
    $sql .= 'order by subject_id asc, position asc';
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
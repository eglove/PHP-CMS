<?php
function find_all_subjects()
{
    global $db;

    $sql = 'select * from subjects ';
    $sql .= 'order by position asc';
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($id): ?array
{
    global $db;

    $sql = "select * from subjects ";
    $sql .= "where id = '" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function insert_subject($subject): bool
{
    global $db;

    $sql = "insert into subjects "
        . "(menu_name, position, visible) "
        . "values ("
        . "'" . $subject['menu_name'] . "',"
        . "'" . $subject['position'] . "',"
        . "'" . $subject['visible'] . "'"
        . ")";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function update_subject($subject): bool
{
    global $db;

    $sql = "update subjects set "
        . "menu_name='" . $subject['menu_name'] . "', "
        . "position='" . $subject['position'] . "', "
        . "visible='" . $subject['visible'] . "' "
        . "where id='" . $subject['id'] . "' "
        . "limit 1";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function delete_subject($id): bool
{
    global $db;
    $sql = "delete from subjects "
        . "where id='" . $id . "' "
        . "limit 1";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function find_all_pages()
{
    global $db;

    $sql = 'select * from pages ';
    $sql .= 'order by subject_id asc, position asc';
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_page_by_id($id): ?array
{
    global $db;

    $sql = "select * from pages "
        . "where id = '" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;
}

function insert_page($page): bool
{
    global $db;

    $sql = "insert into pages "
        . "(subject_id, menu_name, position, visible, content) "
        . "values ("
        . "'" . $page['subject_id'] . "', "
        . "'" . $page['menu_name'] . "', "
        . "'" . $page['position'] . "', "
        . "'" . $page['visible'] . "', "
        . "'" . $page['content'] . "'"
        . ")";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function update_page($page): bool
{
    global $db;

    $sql = "update pages set "
        . "subject_id='" . $page['subject_id'] . "', "
        . "menu_name='" . $page['menu_name'] . "', "
        . "position='" . $page['position'] . "', "
        . "visible='" . $page['visible'] . "', "
        . "content='" . $page['content'] . "' "
        . "where id='" . $page['id'] . "' "
        . "limit 1";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function delete_page($id): bool
{
    global $db;
    $sql = "delete from pages "
        . "where id='" . $id . "' "
        . "limit 1";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}
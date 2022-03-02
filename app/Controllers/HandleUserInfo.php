<?php

$listUserTable = "";

if (count($listUser) > 0) {
    $number = 0;

    foreach ($listUser as $row) {
        $number++;

        $listUserTable .= '<tr id="' . $row["account_id"] . '"><th scope="row">' . $number . '</th>';
        $listUserTable .= '<td>' . $row["username"] . '</td>';
        $listUserTable .= '<td>' . $row["name"] . '</td>';
        $listUserTable .= '<td>' . $row["date_of_birth"] . '</td>';
        $listUserTable .= '<td>' . $row["email"] . '</td>';
        $listUserTable .= '<td><i class="user-edit fa fa-edit"></i> | <i class="user-delete fa fa-trash-o"></i></td></tr>'; //btn-disable
    }
}

<?php


function sql_connect($host, $user, $password, $database) {
    $connection = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno())
        die(mysqli_connect_error());

    return $connection;
}

function returnSum($a, $b) {
    return $a + $b;
}

function sql_close($connection) {
    if ($connection)
        mysqli_close($connection);
}

function sql_fetch_array(string $query, array $result) {
    if (!isset($result[0]))
        return $result;

    $first = $result[0];

    foreach ($first as $key => $value) {
        $key = strtolower($key);

        if (preg_match('/count\(.+\)/', $key))
            return (int)$value;

        if (preg_match('/exists\(.+\)/', $key))
            return (bool)$value;

//        if (strpos($key, 'count') !== false)
//            return $value;
//
//        if (strpos($key, 'exists') !== false)
//            return (bool)$value;
    }

    return $result;
}

function sql_query($connection, $query) {
    $result = mysqli_query($connection, $query);

    if (mysqli_errno($connection)) {
        die(mysqli_error($connection));
    }

    if (is_bool($result))
        return $result;

    if (is_array($result))
        return sql_fetch_array($query, $result);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}

function sql_escape($connection, string $str): string {
    return mysqli_real_escape_string($connection, $str);
}

function build_columns($connection, $columns) {
    if (is_array($columns)) {
        $columns = array_map(function ($column) use ($connection) {
            return sql_escape($connection, $column);
        }, $columns);

        return '(' . implode(',', $columns) . ')';
    }
    return sql_escape($connection, $columns);
}

function sql_build_where($connection, array $where): string {

    if (empty($where))
        return '';

    $result = [];
    foreach ($where as $column => $value) {
        $result[] = sql_escape($connection, $column) . '=' . sql_escape($connection, $value);
    }
    return "WHERE" . implode(" AND ", $result);
}

function sql_select($connection, $table, $columns = "*", array $where = []) {
//    $table = sql_escape($connection, $table);
//
//    if (is_array($columns)) {
//        $columns = array_map(function ($column) use ($columns, $connection) {
//            return sql_escape($connection, $column);
//        }, $columns);
//        $columns = '(' . implode(',', $columns) . ')';
//    }
//    elseif (!is_string($columns))
//        $columns = sql_escape($connection, $columns);

    $table = sql_escape($connection, $table);
    $columns = build_columns($connection, $columns);
    $where = sql_build_where($connection, $where);
    $query = "SELECT $columns FROM  {$table} {$where}";
    return sql_query($connection, $query);
}
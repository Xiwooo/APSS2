<?php
function sql_execute(string $query, array $params = [])
{
    global $db;
    $stmt = $db->prepare($query);
    if (count($params) > 0) {
        foreach ($params as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
    }
    if (!$stmt->execute()) {
        var_dump($stmt->errorInfo());
    }
    return $stmt;
}

function sql_fetch_all(string $query, array $params = [])
{
    $stmt = sql_execute($query, $params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function sql_fetch_column(string $query, array $params = [], $column = 0)
{
    $stmt = sql_execute($query, $params);
    return $stmt->fetchColumn($column);
}
?>
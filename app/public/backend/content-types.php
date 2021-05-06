<?php

class CustomContentType
{
}

$stmt = $db->prepare(
    '
    SELECT * FROM custom_content_types
    WHERE custom_content_type_id = :custom_content_type_id'
);
$stmt->bindValue(':custom_content_type_id', $custom_content_type_id);
$results = $stmt->fetch(PDO::FETCH_CLASS, 'CustomContentType');


class NewsContentType extends CustomContentType
{
}

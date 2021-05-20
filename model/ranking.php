<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//rankingを書き込み
function insert_ranking($db,$item_id){
    $sql="
        INSERT INTO
            ranking(
                item_id
            )
            VALUES(?);
    ";
    return execute_query($db, $sql,[$item_id]);
}

//rankingを更新
function update_ranking($db,$item_id,$amount){
    $sql="
        UPDATE
            ranking
        SET   
            quantity,
        WHERE
            item_id = ?
        VALUES(?,?)
        ";
  return execute_query($db, $sql,[$item_id,$amount]);
}

//rankingを読み取り
function get_ranking($db,$item_id){
    $sql = "
        SELECT
            ranking.item_id,
            ranking.quantity,
            items.name
        FROM
            ranking
        JION
            items
        WHERE
            ranking.item_id = ?
        ORDER BY
            quantity desc
        LIMIT 3
    ";
    return fetch_all_query($db, $sql,[$item_id]);
}
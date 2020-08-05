<?php

session_start();


require("connection.php");

function dd($value){
  echo "<pre>", print_r($value, true), "</pre>"; 
  die();
}


function executeQuery($sql, $data){
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);  
  $types = str_repeat('s', count($values)); 
  $stmt->bind_param($types, ...$values);
  $stmt->execute();
  return $stmt;
}



function selectAll($table, $conditions = []){
  global $conn;
  $sql = "SELECT * FROM $table";

  if (empty($conditions)) {
    $stmt = $conn->prepare($sql);  
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  } else {
    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0) {
        $sql = $sql . " WHERE $key=?"; 
      } else {
        $sql = $sql . " AND $key=?";
      }
      $i++;
    }
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
}




function selectOne($table, $conditions){
  global $conn; 
  $sql = "SELECT * FROM $table";
  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " WHERE $key=?";
    } else {
      $sql = $sql . " AND $key=?";
    }
    $i++;
  }


  $sql = $sql . " LIMIT 1";
  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_assoc(); 
  return $records;
}





function create($table, $data){
  global $conn;
  $sql = "INSERT INTO $table SET ";

  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?";
    } else {
      $sql = $sql . ", $key=?";

    }
    $i++;
  }

  $stmt = executeQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id;
}



function update($table, $id, $data){
  global $conn;
  $sql = "UPDATE $table SET ";

  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?"; 
    } else {
      $sql = $sql . ", $key=?";
    }
    $i++;
  }

  $sql = $sql . " WHERE id=?";
  $data['id'] = $id;
  $stmt = executeQuery($sql, $data);
  return $stmt->affected_rows;
}



function delete($table, $id){
  global $conn;
  $sql = "DELETE FROM $table WHERE id=?";

  $stmt = executeQuery($sql, ['id' => $id]);
  return $stmt->affected_rows;
}


function getPublishedPost(){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE published=?";
  $stmt = executeQuery($sql, ['published' => 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function getPublishedPostLimit3(){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE published=? LIMIT 3";
  $stmt = executeQuery($sql, ['published' => 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}


function getPublishedPostLimit5(){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE published=? ORDER BY created_at DESC LIMIT 5";
  $stmt = executeQuery($sql, ['published' => 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}




function searchPost($search){
  $match = '%' . $search . '%';
  global $conn;
  $sql = "SELECT 
            p.*, u.username 
          FROM posts AS p
          JOIN users AS u 
          ON p.user_id = u.id 
          WHERE published=?
          AND p.title LIKE ? OR p.body LIKE ?";
  $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}


function getPostsByTopicId($topic_id){
  global $conn;
  $sql = "SELECT p.*, u.username  FROM posts AS p JOIN users AS u ON p.user_id =u.id WHERE p.published=? AND topic_id=?";

  $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

/* FOR SELECT ALL
$users = selectAll('users');

dd($users);
*/


/* FOR SELECT WITH CONDITIONS
$conditions = [
  'username'=> 'Juan',
  'password' => 123,
];

$users = selectAll('users',$conditions);
dd($users);
*/

/* FOR SELECT ONE 
$conditions = [
  'id'=> '1'
];

$users = selectOne('users',$conditions);
dd($users);
*/

/* FOR CREATE 

$conditions = [
  'admin' => 1,
  'username'=> 'Prueba',
  'email' => 'Prueba@gmail.com',
  'password' => 123,
];

$users = create('users',$conditions);
dd($users);
*/

/* FOR UPDATE 
$conditions = [
  'admin' => 0,
  'username'=> 'Opolexso',
  'email' => 'VillaCapurroGabriel@gmail.com',
  'password' => '123',
];

$users = update('users', 1, $conditions);
dd($users);
*/

/* FOR DELETE
$users = delete('users', 16);
dd($users);
*/
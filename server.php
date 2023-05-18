<?php

  $listJson = file_get_contents('toDoList.json');
  $list = json_decode($listJson, true);

  if(isset($_POST['text'])) {
    $newNote = [
      'text' => $_POST['text'],
      'done' => false
    ];
    array_unshift($list, $newNote);
    file_put_contents('toDoList.json', json_encode($list));
  }

  if(isset($_POST['index'])) {
    array_splice($list, $_POST['index'], 1);
    file_put_contents('toDoList.json', json_encode($list));
  }

  if(isset($_POST['empty'])) {
    $list = [];
    file_put_contents('toDoList.json', json_encode($list));
  }

  header('Content-Type: application/json');
  echo json_encode($list);
  
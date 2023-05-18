<?php

  $listJson = file_get_contents('toDoList.json');
  $list = json_decode($listJson, true);

  header('Content-Type: application/json');
  echo json_encode($list);
  
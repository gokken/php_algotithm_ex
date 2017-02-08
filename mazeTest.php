<?php
require_once './part/Maze.php';
/*
深さ優先探索で迷路を解く
問題はS地点からG地点にたどり着くかどうか検証せよ
但し、0は進め、Xは進めないとする。
たどりついた場合はtrueを失敗した場合はfalseを返せ
 */

$maze = new Maze('./file/maze.csv');
var_dump($maze->search(0,2));

?>

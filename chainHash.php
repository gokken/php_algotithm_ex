<?php
require_once './part/HashBox.php';
/*
    ハッシュサーチ
    データを一定の規則にしたがってハッシュ値に変換し、ハッシュ値を比較して検索を行う方式。
    キーをハッシュ値にし値を格納する。
    ハッシュ値が同じ場合は線形リストで格納する。
    線形リストの他にオープンハッシュ法がある。
*/
/*
問題
ハッシュ形式で値を格納し1,5,15,25,100があるか調べよ。
 */

$hashbox = new Hashbox(10);
$hashbox->add(1);
$hashbox->add(11);
$hashbox->add(12);
$hashbox->add(21);
$hashbox->add(101);
$hashbox->add(121);
$hashbox->add(25);
$hashbox->add(5);
$hashbox->add(90);

$hashbox->search(1);
$hashbox->search(5);
$hashbox->search(15);
$hashbox->search(25);
$hashbox->search(100);

?>

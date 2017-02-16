<?php
require_once 'NodeTree.php';
class BinaryTree{
    public static function createNode($value){
        $node = new NodeTree();
        $node->value = $value;
        $node->left = null;
        $node->right = null;
        return $node;
    }
    /*
    データの追加
    @param int value 追加する値
    @param NodeTree tree 二分木
    */
    public static function insertNode($value,$tree){
        if($tree->value === $value){
            return $tree;
        }
    	else if($tree->value < $value){
            if($tree->left === null){
                $tree->left = self::createNode($value);
            }
            else{
                self::insertNode($value,$tree->left);
            }
        }
        else{
            if($tree->right === null){
                $tree->right = self::createNode($value);
            }
            else{
                self::insertNode($value,$tree->right);
            }
        }
        return $tree;
    }
    /*
    データの検索
    @param int value 検索する値
    @param NodeTree tree 二分木
    */

    public static function searchTree($value,$tree){
        if($tree->value === $value){
            return true;
        }
    	else if($tree->value < $value){
            if($tree->left === null){
                return false;
            }
            else{
                if(self::searchTree($value,$tree->left)){
                    return true;
                }
            }
        }
        else{
            if($tree->right === null){
                return false;
            }
            else{
                if(self::searchTree($value,$tree->right)){
                    return true;
                };
            }
        }
        return false;
    }
}


?>

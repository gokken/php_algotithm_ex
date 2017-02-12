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
    @param NodeTree tree 値を追加する木
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


}


?>

<?php
require_once 'Bucket.php';
class HashBox{

    private $size;
    private $list;
    /**
     *  コンストラクタ
     * @param int  $size
     *
     */

    public function __construct($size){
        $this->size = $size;
        $this->list = array_fill(0,$size,null);
    }

    public function createHashCode($value){
        $hash_key = $value % $this->size;
        return $hash_key;
    }

    public function add($value){
        $key = self::createHashCode($value);
        // 次のlistへのアドレス
        $address = null;
        if($this->list[$key]){
            $address = $this->list[$key];
        }
        // 次のリストが格納されているところまで処理の繰り返し
        while($address !== null){
            // 値の重複
            if($address->getValue() === $value){
                return false;
            }
            // 値がない(空のリスト)
            if($address->getValue() === null){
                break;
            }
            // 次のアドレスへ移動
            $address = $address->getNextAddress();
        }

        $this->list[$key] = new Bucket($value,null);
        return true;
    }






}
?>

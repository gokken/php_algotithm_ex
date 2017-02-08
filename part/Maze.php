<?php
define("ROW_SIZE",6);
define("COL_SIZE",4);
class Maze{
    private $maze;
    private $checked;
    private $goal;
    /**
     *  コンストラクタ
     * @param array $maze 迷路
     *
    */
    public function __construct($maze){
        $file = new SplFileObject($maze);
        $file->setFlags(
            SplFileObject::DROP_NEW_LINE | // 行末の改行無視
            SplFileObject::READ_AHEAD | // 先読み
            SplFileObject::SKIP_EMPTY | // 空行無視
            SplFileObject::READ_CSV // CSVとして読み込み
        );
        foreach ($file as $line) {
            $this->maze[] = $line;
        }
    }
    // 深さ優先探索
    public function search($col,$row){

        if($this->goal === true) {
            return true;
        }

        if(self::nullCheck($col,$row) || $this->maze[$col][$row] === "X"){
            return false;
        }

        if(isset($this->checked[$col][$row])){
            return false;
        }

        if($this->maze[$col][$row] === "G"){
            $this->goal = true;
            //echo $col;
            //echo $row;
            //echo "Goooooooooooooooal";
            //sleep(5);
            return true;
        }

        $this->checked[$col][$row] = true;


        // 周りの記号を変数に格納
        $rR = $row+1;
        $lR = $row-1;
        $tC = $col-1;
        $bC = $col+1;
        // left
        self::search($col,$lR);
        //bottom
        self::search($bC,$row);
        // right
        self::search($col,$rR);
        // top
        self::search($tC,$row);

        if($this->goal === true){
            return true;
        }else {
            return false;
        }
    }

    public function nullCheck($col,$row){
        // colのチェック
        if($col >= COL_SIZE || $col < 0){
            return true;
        }
        // rowのチェック
        else if($row >= ROW_SIZE || $row < 0){
            return true;
        }
        else{
            return false;
        }
    }
}

?>

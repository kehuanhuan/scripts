<?php



/**
 *
 */
class MyHash {

    private static $hash = [];

    public static function main() {
        //“除法取余法”
        $hashLength = 13;

        $array  = [13, 29, 27, 28, 26, 30, 38];

        //创建hash
        for ( $i = 0; $i < count($array); $i++)
        {
            self::insertHash($hashLength, $array[$i]);
        }

        // var_export(self::$hash);
        // die();

        $result = self::searchHash($hashLength, 29);

        if ($result != -1){
            echo "已经在数组中找到，索引位置为：".$result."\n";
        } else {
            echo "没有此原始";
        }
    }

    /****
     * Hash表检索数据
     *
     * @param hash
     * @param hashLength
     * @param key
     * @return
     */
    public static function searchHash($hashLength, $key) {
        // 哈希函数
        $hashAddress = $key % $hashLength;

        // 指定hashAdrress对应值存在但不是关键值，则用开放寻址法解决
        while (self::$hash[$hashAddress] != 0 && self::$hash[$hashAddress] != $key) {
            $hashAddress = (++$hashAddress) % $hashLength;
        }

        // 查找到了开放单元，表示查找失败
        if (self::$hash[$hashAddress] == 0)
            return -1;
        return $hashAddress;

    }

    /***
     * 数据插入Hash表
     *
     * @param hash 哈希表
     * @param hashLength
     * @param data
     */
    public static function insertHash($hashLength, $data)
    {
        // 哈希函数
        $hashAddress = $data % $hashLength;

        // 如果key存在，则说明已经被别人占用，此时必须解决冲突
        // while (self::$hash[$hashAddress] != 0) {
        //     // 用开放寻址法找到
        //     $hashAddress = (++$hashAddress) % $hashLength;
        // }

        // 将data存入字典中
        self::$hash[$hashAddress] = $data;
    }

}

MyHash::main();


<?php

namespace App\Command\Parser;

use App\Command\Parser\InterfaceParser;

/**
 * Парсер данных из текстовых файлов
 */
class TxtFileParser implements InterfaceParser {

    /**
     * На входе получаем путь к файлу. Функция возвращает массив данных с ключами
     * 'phone', 'comment'
     * 
     * @return array contacts array
     */
    public function parse($filePath) {
        $fileContent = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $data = array();
        //var_dump($fileContent);
        foreach ($fileContent as $key => $val) {
            $tmp = explode("|", $val);
            if(count($tmp) == 1){
                $data[] = ['phone' => $tmp[0], 'comment' => ""];
                continue;
            }
            $data[] = ['phone' => $tmp[0], 'comment' => $tmp[1]];
        }
        return $data;
    }

}

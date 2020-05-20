<?php

namespace App\Command\Parser;

use App\Command\Parser\TxtFileParser;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ParserInstanceCreater {

    /**
     * 
     * @param string $filePath
     */
    public static function getInstance($filePath) {
        $pathParts = pathinfo($filePath);
        switch ($pathParts['extension']) {
            case 'txt':
                return new TxtFileParser();
                break;
            default:
                throw new \Exception('Тип файла не поддерживается');
        }
    }

}

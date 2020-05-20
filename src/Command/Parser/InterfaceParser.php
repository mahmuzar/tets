<?php
namespace App\Command\Parser;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface InterfaceParser {

    /**
     * 
     * @param string $filePath path to txt file
     */
    function parse($filePath);
}
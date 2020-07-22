<?php
if(!defined('BASEPATH')) die('No access');

require_once APPPATH ."/libraries/PHPExcel.php";
require_once APPPATH ."/libraries/PHPExcel/IOFactory.php";
/**
 * 
 */
class Excel extends PHPExcel
{
    function __construct()
    {
        parent::__construct(); 
    }
}
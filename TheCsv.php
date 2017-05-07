<?php
namespace johnnylei\csv;
/**
 * Created by PhpStorm.
 * User: johnny
 * Date: 17-4-18
 * Time: 下午5:44
 */
use yii\base\Exception;
use yii\base\Object;

class TheCsv extends Object
{
    public $fp;
    public $fileName;
    public $header;

    public function init() {
        if(empty($this->fileName)) {
            throw new Exception('invalid property file name');
        }

        if(empty($this->header)) {
            throw new Exception('invalid property header');
        }

        header('Content-Type: text/csv');
        header("Content-Disposition: attachment;filename={$this->fileName}");
        $this->fp = fopen('php://output', 'w');

        fwrite($this->fp,chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($this->fp, $this->header);
    }

    public function putRow($row) {
        fputcsv($this->fp, $row);
    }

    public function putRows($rows) {
        foreach ($rows as $row) {
            fputcsv($this->fp, $row);
        }
    }
}
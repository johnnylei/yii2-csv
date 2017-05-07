# yii2 csv extension
这是一个基于yii2的csv导出扩展

## install
```
composer require --prefer-dist johnnylei/yii2-csv
```

## usage
> 创建一个对象
```
$csv = new TheCsv([
    'header'=>$header,
    'fileName'=>$fileName,
]);
```
> 将数据一行一行的写入即可
```
$csv->putRow($item);
```

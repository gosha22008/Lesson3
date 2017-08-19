<!DOCTYPE>
<html lang="ru">
<head>
    <title>Задание</title>
    <meta charset="utf-8">
</head>
<?php
$origin_array = [
    'Africa' => ['Loxodonta', 'Hippopotamus amphibius', 'Giraffa camelopardalis', 'Panthera leo'],
    'Eurasia' => ['Cervus elaphus', 'Ursus arctos', 'Camelus', 'Ursus thibetanus'],
    'North America' => ['Haliaeetus leucocephalus', 'Canis latrans', 'Gulo gulo dinarius', 'Lynx rufus'],
    'South America' => ['Trichechus', 'Leopardus pardalis', 'Chinchilla lanigera', 'Serrasalmus'],
    'Australia' => ['Vombatidae', 'Boiga dendrophila ogibogi', 'Casuarius', 'Nestor notabilis'],
    'Antarctica' => ['Diomedea', 'Pygoscelis adeliae', 'Leptonychotes wedalia critus izralitan']
];
$start = ' ';
$i = 0;
$two_words = [];
$first1_word = [];
$others_word = [];
foreach ($origin_array as $continent) {
    foreach ($continent as $animals) {
        $animal = trim($animals);
        $req = explode($start, $animal);
        if (count($req) == 2) {
            $two_words[] = $animal;
            $first1_word[] = $req[0];
            array_shift($req);
            $others_word[] = implode($start, $req);
            $i++;
        }
    }
}
shuffle($others_word);

for ($j = 0; $j < $i; $j++) {
    ?>
    <div style="float: left;width: 200px">
        <?= $two_words[$j] ?><br>
    </div>
    <?= $first1_word[$j] . " $others_word[$j]" ?><br>
    <?
}
$region = [];
foreach ($origin_array as $materic => $abc) {
    echo "<h2 style='clear: both'>$materic</h2>";
    foreach ($two_words as $key1 => $val) {
        if (in_array($val, $origin_array[$materic])) {
            $region[] = "$first1_word[$key1] $others_word[$key1]";
        }
    }
    echo implode(', ', $region) . '.';
    unset($region);
}
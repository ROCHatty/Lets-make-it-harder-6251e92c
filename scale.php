<?php
$num1 = intval($argv[1]);
$num2 = intval($argv[2]);
$nums = array();
foreach (explode(",", trim($argv[3])) as $num)
{
    $num = intval($num);
    array_push($nums, $num);
}
if ($num1 < $num2) {
    $small = $num1;
    $big = $num2;
} elseif ($num1 > $num2) {
    $small = $num2;
    $big = $num1;
} else {
    die("Al in balans");
}

function createPossibilities($nums) {
    $possibilities = array();
    foreach ($nums as $num) {
        array_push($possibilities, array(
            "num" => $num,
            "text" => $num
        ));
        for ($i = 0;$i < count($nums);$i++) {
            $count = 1;
            while ($i + $count < count($nums)) {
                array_push($possibilities, array(
                    "num" => $num + $nums[$i + $count],
                    "text" => $num . " and " . $nums[$i + $count]
                ));
                $c = 1;
                while ($i + $c < count($nums)) {
                    array_push($possibilities, array(
                        "num" => $num + $nums[$i + $count] + $nums[$i + $c],
                        "text" => $num . ", " . $nums[$i + $count] . " and " . $nums[$i + $c]
                    ));
                    $c++;
                }
                $count++;
            }
        }
    }
    return $possibilities;
}

function getit($small, $big, $nums, $i = null) {
    if ($i == null) {
        $i = 0;
    } else {
        if ($i >= count($nums)) {
            die("Niet in balans");
        } else {
            $i++;
        }
    }
    $possibilities = createPossibilities($nums);
    foreach ($possibilities as $p) {
        if ($small + $p['num'] == $big) {
            die("Add " . $p['text'] . " to the small number");
        }
    }
    die("Niet in balans");
}

getit($small, $big, $nums);
?>

<?php

function task17($n)
{
    $sum = 0;

    for($i = 0; $i <= $n; ++$i)
    {
        $div3 = $i % 3 == 0;
        $div5 = $i % 5 == 0;

        if($div3)
        {
            echo "$i<br>";
        }
        elseif($div5)
        {
            $sum += $i;
        }
        elseif ($div3 && $div5)
        {
            $sum -= 1;
        }
    }

    return $sum;
}

echo task17(42);
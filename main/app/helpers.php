<?php

use App\Portfolio;

function checkIsNull($item)
{
    if ($item) {
        return 'on';
    } else {
        return "off";
    }
}


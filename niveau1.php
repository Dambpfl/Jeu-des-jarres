<?php

$jarres = [];

for ($i = 0; $i < 4; $i++) {
    $jarres[] = "clé";
}

$jarres[] = "serpent";

shuffle($jarres);

print_r($jarres);
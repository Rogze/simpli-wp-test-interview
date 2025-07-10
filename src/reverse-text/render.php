<?php
$text = $attributes['content'] ?? 'Hello World';
$bg = $attributes['backgroundColor'] ?? '#ffffff';
$border = $attributes['borderColor'] ?? '#000000';

$reversed = strrev($text);

?>
<div
    style="background-color: <?= esc_attr($bg); ?>; border: 2px solid <?= esc_attr($border); ?>; padding:1rem; cursor:pointer;"
    onclick="(function(el){ el.innerText = el.innerText.split('').reverse().join(''); })(this)"
    tabindex="0"
    role="button"
    aria-label="Click to reverse text"
>
    <?= esc_html($reversed); ?>
</div>

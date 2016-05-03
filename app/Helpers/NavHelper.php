<?php

function nav_active($page, $check, $class = 'active') {
    if($page == $check) {
        echo ' class="' . $class . '"';
    }
}

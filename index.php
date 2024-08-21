<?php
spl_autoload_register(function ($class) {
    include '/Controllers/' . $class . '.php';
    include '/Models/' . $class . '.php';
});
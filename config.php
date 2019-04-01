<?php
/**
 * Created by netbeans 8.2.
 * User: Ricardo de Oliveira
 * Date: 30/03/2019
 * Time: 17:13
 */

define('DATABASE', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASS' => '',
    'NAME' => 'lista'
]);

require_once __DIR__ . '/source/crud/Conn.php';
require_once __DIR__ . '/source/crud/Read.php';
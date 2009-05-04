<?php defined('BASEPATH') or die('No direct script access.');

// Hash Type
// @see http://php.net/hash
$config['hash_type'] = 'sha1';

// Salt
$config['salt_pattern'] = '1, 3, 5, 9, 14, 15, 20, 21, 28, 30';

// Password Length
$config['length'] = 40;
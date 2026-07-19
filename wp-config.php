<?php
// Настройки базы данных из переменных окружения Render
define('DB_NAME', getenv('WORDPRESS_DB_NAME') ?: 'wordpress');
define('DB_USER', getenv('WORDPRESS_DB_USER') ?: 'wordpress');
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') ?: '');
define('DB_HOST', getenv('WORDPRESS_DB_HOST') ?: 'localhost');
define('DB_PORT', getenv('WORDPRESS_DB_PORT') ?: '5432');

// Указываем драйвер PostgreSQL (используется плагином)
define('DB_DRIVER', 'pgsql');

// Соли и ключи (сгенерированы автоматически)
define('AUTH_KEY',         'bE3{LdS8Bu|]|1hdr:m-f>S-n-O)*w2pE1rd_{Fpel~O$`l-s-=cUy<!GN}u5D-3');
define('SECURE_AUTH_KEY',  '~LgFE+.b5;5r}q{b.sLpOBFB2?U0E|4qN9IOS +0::rfbf{ElS*Mk<U n|ItC>F7');
define('LOGGED_IN_KEY',    '7daO>`-/h -l}#B%?QMFFUdv->1sR8#`*Kt-I!nfQ}!d{0b3 u-BZIsMlit*&fb!');
define('NONCE_KEY',        'b+@?auiXi#c{I16|x!GRuP~ipqVamK ]k#l]uR3s1l/--UvS p-/|8x=$/}~eG+E');
define('AUTH_SALT',        'L5[0CkYvXA#o-_,|@3^5VV}e3olUdl+Kbdvk#q/rywA0U#s.}~}jAXoRJ.zLO/|~');
define('SECURE_AUTH_SALT', ',OxV7S A&AH3,k0Mk }]H+lnz4fP-:{bbqY.xxE;UQqwB?hWw9J#B2j|4bQqTnhf');
define('LOGGED_IN_SALT',   '},$MS(!{K|%F%MjgDqI[/-Bz}%?9No.8DugghPq-H@,_4|9%|Ei=v|<s-gUkC|uC');
define('NONCE_SALT',       'ixV7MZut-I$As1B1-FsNbc;|;z~%%W-g8f;:QtZ;NaR1m9XwRyz_#qNm4%P=pAr)');

$table_prefix = 'wp_';
// Включение режима отладки
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG_LOG', true);

// Отключить автоматические обновления (опционально)
define('WP_AUTO_UPDATE_CORE', false);

// Для отладки (раскомментируйте при необходимости)
// define('WP_DEBUG', true);

if ( ! defined('ABSPATH') ) {
    define('ABSPATH', __DIR__ . '/');
}
require_once ABSPATH . 'wp-settings.php';
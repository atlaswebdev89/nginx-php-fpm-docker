<?php
//Время жизни сесии в секундах
ini_set('session.gc_maxlifetime', 100);
//Настройка планировщика удаления файлов сессий
//Вероятность запуска GC при каждом запуске скрипта  - session.gc_probability / session.gc_divisor
//По умолчанию - 1/100. Соответственно, если задать session.gc_probability = 0 GC не запустится никогда
ini_set('session.gc_probability', 100);
ini_set('session.gc_divisor', 100);

// Время жизни куки в секундах
// 0 - по завершению текущего сеанса браузера (при закрытии браузера не всегда сеанс заканчивается. Зависит от браузера))
ini_set('session.cookie_lifetime', 0);

phpinfo();
    <?php
    function check_domain_availible($domain)
    {
        if (!filter_var($domain, FILTER_VALIDATE_URL))
            return false;

        $curlInit = curl_init($domain);//проверка на соответствие введенных данных URL
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curlInit);
        curl_close($curlInit);
        if ($response)
            return true;
        return false;
    }
        echo 'Проверка на доступность сервера инфрастрктуры';
    echo '<br>';
    $domain = 'http://boberpul.asuscomm.com/'; //Сервер инфраструктуры
    $status = get_headers($domain);//проверка статуса
    foreach ($status as $st){
        echo $st.'<br>';
    }
    $url = 'http://boberpul.asuscomm.com//';
    if (check_domain_availible($url))
        echo 'Сайт '.$url.' доступен';
    else
        echo 'Сайт '.$url.' не доступен';
    echo '<br>'; // на абзац ниже.
    echo '<br>';
    echo "Проверка на доступность сервера системы управления проектов - Redmine";
    echo '<br>';
    $domain = 'http://boberpul.asuscomm.com:3000/';
    $status = get_headers($domain);
    foreach ($status as $redmine) {
        echo $redmine . '<br>';
    }
    $url = 'http://boberpul.asuscomm.com:3000';
    if (check_domain_availible($url))
        echo 'Сайт '.$url.' доступен';
    else
        echo 'Сайт '.$url.' не доступен';

    echo '<br>'; // на абзац ниже.
    echo '<br>';
    echo "Проверка на доступность сервера системы системы контроля версий - Subversion";
    $domain = 'http://boberpul.asuscomm.com:444/';
    $status = get_headers($domain);
    foreach ($status as $subver){
        echo $subver.'<br>';
    }
    $url = 'http://boberpul.asuscomm.com:444/';
    if (check_domain_availible($url))
        echo 'Сайт '.$url.' доступен';
    else
        echo 'Сайт '.$url.' не доступен';
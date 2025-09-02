<?php
declare(strict_types=1);
date_default_timezone_set('Asia/Seoul');

if (basename($_SERVER['SCRIPT_FILENAME'] ?? '') === basename(__FILE__)) { http_response_code(204); exit; }

function client_ip(): string {
    foreach (['HTTP_CF_CONNECTING_IP','HTTP_X_FORWARDED_FOR','HTTP_X_REAL_IP','HTTP_CLIENT_IP','REMOTE_ADDR'] as $k) {
        if (!empty($_SERVER[$k])) {
            $v = trim(explode(',', $_SERVER[$k])[0]);
            if (filter_var($v, FILTER_VALIDATE_IP)) return $v;
        }
    }
    return '0.0.0.0';
}

function is_bot(string $ua): bool {
    if ($ua === '') return true;
    return (bool)preg_match('/bot|crawler|spider|slurp|bingpreview|validator|fetcher|monitor|curl|wget|python-requests|axios|headless|phantom|puppeteer|httpclient|facebookexternalhit|discordbot|telegrambot|whatsapp|yandex|ahrefs|semrush/i', $ua);
}

function ip_in_cidr(string $ip, string $cidr): bool {
    if (strpos($cidr,'/') === false) return $ip === $cidr;
    [$sub,$mask] = explode('/',$cidr,2);
    if (!filter_var($ip,FILTER_VALIDATE_IP) || !filter_var($sub,FILTER_VALIDATE_IP)) return false;
    if (strpos($ip,':') !== false) {
        $ipb = inet_pton($ip); $nb = inet_pton($sub); $mask=(int)$mask; $bytes=intdiv($mask,8); $bits=$mask%8;
        if (strncmp($ipb,$nb,$bytes)!==0) return false;
        if ($bits===0) return true;
        $ir = ord($ipb[$bytes]); $nr = ord($nb[$bytes]); $mr = ~((1<<(8-$bits))-1) & 255;
        return (($ir & $mr) === ($nr & $mr));
    } else {
        $il = ip2long($ip); $nl = ip2long($sub); $mask = ((-1 << (32-(int)$mask)) & 0xFFFFFFFF);
        return (($il & $mask) === ($nl & $mask));
    }
}

$deny = ['116.125.142.203','45.155.205.0/24'];

try {
    $db = DB::getInstance();

    $ip = client_ip();
    foreach ($deny as $cidr) { if (ip_in_cidr($ip,$cidr)) { http_response_code(204); return; } }

    $ua = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 512);
    if (is_bot($ua)) return;

    $y = (int)date('Y');
    $m = (int)date('n');
    $d = (int)date('j');
    $t = date('H:i:s');
    $ref = substr($_SERVER['HTTP_REFERER'] ?? '', 0, 1024);

    $stmt = $db->prepare("INSERT IGNORE INTO `nb_analytics`
        (`year`,`month`,`day`,`time`,`user_agent`,`ip_address`,`referrer`)
        VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$y,$m,$d,$t,$ua,$ip,$ref]);
} catch (Throwable $e) {}
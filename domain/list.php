<?php


require "../init.php";

$result = $cPanel->execute('uapi', 'DomainInfo', 'list_domains');

var_dump($result);
die();

if (!$result->status == 1) {
    setE("Cannot fetch domains list : {$result->messages[0]} | {$result->errors[0]}");
    header("location: /index.php");
    die();
}

echo $twig->render('/cpanelornek/domain/list.twig', ['result' => $result->data]);
clearMessages();
die();
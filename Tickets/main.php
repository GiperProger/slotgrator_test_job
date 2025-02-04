<?php


//по хорошему тут фабрику нужно сделать, которая по типу билета,
// или параметру конфигурации будет возвращать инстанс нужного соединения

$databaseSource = new \Market\DatabaseTicketDataSource();
$ticketRepository = new \Market\TicketRepository($databaseSource);

$apiClient = new \Some\ApiClient(/* параметры подключения */);
$apiSource = new \Market\ApiTicketDataSource($apiClient);
$ticketRepository = new \Market\TicketRepository($apiSource);
<?php
namespace Market;

use Some\ApiClient; // Предположим, что имеется некий клиент для работы с API.

class ApiTicketDataSource implements TicketDataSourceInterface
{
    private ApiClient $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function load($ticketId)
    {
        // Пример запроса к API для получения данных билета.
        $response = $this->apiClient->get("/tickets/{$ticketId}");
        if ($response->isSuccess()) {
            // Преобразуем данные ответа в объект Ticket.
            return Ticket::fromArray($response->getData());
        }
        return null;
    }

    public function save(Ticket $ticket): bool
    {
        $response = $this->apiClient->post("/tickets", $ticket->toArray());
        return $response->isSuccess();
    }

    public function update(Ticket $ticket): bool
    {
        $response = $this->apiClient->put("/tickets/{$ticket->getId()}", $ticket->toArray());
        return $response->isSuccess();
    }

    public function delete(Ticket $ticket): bool
    {
        $response = $this->apiClient->delete("/tickets/{$ticket->getId()}");
        return $response->isSuccess();
    }
}

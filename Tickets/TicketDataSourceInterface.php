<?php
namespace Market;

interface TicketDataSourceInterface
{
    /**
     * Загружает билет по идентификатору.
     *
     * @param int|string $ticketId
     * @return Ticket|null
     */
    public function load($ticketId);

    /**
     * Сохраняет новый билет.
     *
     * @param Ticket $ticket
     * @return bool
     */
    public function save(Ticket $ticket): bool;

    /**
     * Обновляет существующий билет.
     *
     * @param Ticket $ticket
     * @return bool
     */
    public function update(Ticket $ticket): bool;

    /**
     * Удаляет билет.
     *
     * @param Ticket $ticket
     * @return bool
     */
    public function delete(Ticket $ticket): bool;
}

<?php

namespace Market;

class DatabaseTicketDataSource implements TicketDataSourceInterface
{
    public function load($ticketId)
    {
        // Используем ActiveRecord для загрузки билета из БД.
        return Ticket::find()->where(['id' => $ticketId])->one();
    }

    public function save(Ticket $ticket): bool
    {
        // Реализация сохранения в БД.
        return $ticket->save();
    }

    public function update(Ticket $ticket): bool
    {
        // Реализация обновления билета в БД.
        return $ticket->save();
    }

    public function delete(Ticket $ticket): bool
    {
        // Реализация удаления билета из БД.
        return $ticket->delete();
    }
}
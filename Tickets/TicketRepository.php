<?php
namespace Market;

class TicketRepository
{
    private TicketDataSourceInterface $dataSource;

    public function __construct(TicketDataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function load($ticketId)
    {
        return $this->dataSource->load($ticketId);
    }

    public function save(Ticket $ticket): bool
    {
        return $this->dataSource->save($ticket);
    }

    public function update(Ticket $ticket): bool
    {
        return $this->dataSource->update($ticket);
    }

    public function delete(Ticket $ticket): bool
    {
        return $this->dataSource->delete($ticket);
    }
}

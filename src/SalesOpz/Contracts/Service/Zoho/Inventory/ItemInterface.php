<?php

namespace Revolve\SalesOpz\Contracts\Service\Zoho\Inventory;

interface ItemInterface
{
    public function listAll();

    public function fetch(string $itemId);

    public function create(array $input = []);

    public function update(string $itemId, array $input = []);

    public function markActive(string $itemId);

    public function markInactive(string $itemId);

    public function trash(string $itemId);

    public function trashImage(string $itemId);
}

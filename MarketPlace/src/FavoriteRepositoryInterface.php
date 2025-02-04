<?php
namespace Market;

interface FavoriteRepositoryInterface
{
    /**
     *
     * @param int $userId
     * @param int $productId
     * @return bool
     */
    public function addFavorite(int $userId, int $productId): bool;

    /**
     *
     * @param int $userId
     * @param int $productId
     * @return bool
     */
    public function removeFavorite(int $userId, int $productId): bool;

    /**
     *
     * @param int   $userId
     * @param array $filters
     * @return array
     */
    public function getFavorites(int $userId, array $filters = []): array;
}

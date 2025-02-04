<?php

namespace Market;

class FavoriteManager
{
    private FavoriteRepositoryInterface $favoriteRepository;

    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     *
     * @param int $userId
     * @param int $productId
     * @return bool
     */
    public function addProductToFavorites(int $userId, int $productId): bool
    {
        return $this->favoriteRepository->addFavorite($userId, $productId);
    }

    /**
     *
     * @param int $userId
     * @param int $productId
     * @return bool
     */
    public function removeProductFromFavorites(int $userId, int $productId): bool
    {
        return $this->favoriteRepository->removeFavorite($userId, $productId);
    }

    /**
     *
     * @param int   $userId
     * @param array $filters
     * @return array
     */
    public function listFavoriteProducts(int $userId, array $filters = []): array
    {
        return $this->favoriteRepository->getFavorites($userId, $filters);
    }
}
<?php

namespace Market;

use AwsS3\Client\AwsStorageInterface;
use AwsS3\AwsUrlInterface;

class ProductImageManager {
    private FileStorageRepository $localStorage;
    private AwsStorageInterface $awsStorage;

    public function __construct(FileStorageRepository $localStorage, AwsStorageInterface $awsStorage)
    {
        $this->localStorage = $localStorage;
        $this->awsStorage = $awsStorage;
    }

    /**
     *
     * @param array $localImageFiles
     * @param array $awsImageFiles
     * @return array
     */
    public function getImageUrls(array $localImageFiles, array $awsImageFiles): array
    {
        $urls = [];

        foreach ($localImageFiles as $fileName) {
            if ($this->localStorage->fileExists($fileName)) {
                $urls[] = $this->localStorage->getUrl($fileName);
            }
        }

        foreach ($awsImageFiles as $fileName) {
            try {
                $awsUrl = $this->awsStorage->getUrl($fileName);
                $urls[] = (string)$awsUrl;
            } catch (\Exception $e) {

            }
        }

        return $urls;
    }
}
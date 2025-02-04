<?php
namespace Market;

class Product
{

    /**
     * @var array
     */
    private array $localImageFiles = [];

    /**
     * @var array
     */
    private array $awsImageFiles = [];

    /**
     * @var FileStorageRepository
     */
    private FileStorageRepository $localStorage;

    /**
     * @var AwsStorageInterface
     */
    private AwsStorageInterface $awsStorage;

    /**
     * @var ProductImageManager
     */
    private ProductImageManager $imageManager;

    public function __construct(
        FileStorageRepository $localStorage,
        AwsStorageInterface $awsStorage,
        ProductImageManager $productImageManager)
    {
        $this->localStorage = $localStorage;
        $this->awsStorage = $awsStorage;
        $this->imageManager = $productImageManager;
    }

    /**
     *
     * @param array $files
     */
    public function setLocalImageFiles(array $files): void
    {
        $this->localImageFiles = $files;
    }

    /**
     *
     * @param array $files
     */
    public function setAwsImageFiles(array $files): void
    {
        $this->awsImageFiles = $files;
    }

    /**
     *
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        if (!empty($this->localImageFiles)) {
            $fileName = $this->localImageFiles[0];
            if ($this->localStorage->fileExists($fileName)) {
                return $this->localStorage->getUrl($fileName);
            }
        }
        return null;
    }

    /**
     * Local and AWS S3 merge
     *
     * @return array
     */
    public function getImageUrls(): array
    {
        return $this->imageManager->getImageUrls($this->localImageFiles, $this->awsImageFiles);
    }
}

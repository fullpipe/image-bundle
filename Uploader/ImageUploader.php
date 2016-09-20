<?php

namespace Fullpipe\ImageBundle\Uploader;

use Symfony\Component\Filesystem\Filesystem;
use Fullpipe\ImageBundle\Entity\ImageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader implements ImageUploaderInterface
{
    /**
     * @var Symfony\Component\Filesystem\Filesystem
     */
    private $filesystem;

    /**
     * @var string
     */
    private $dataRoot;

    public function __construct(Filesystem $filesystem, $dataRoot)
    {
        $this->filesystem = $filesystem;
        $this->dataRoot = $dataRoot;
    }

    /**
     * {@inheritdoc}
     */
    public function upload(ImageInterface $image)
    {
        if (!$image->hasFile()) {
            return;
        }

        $this->remove($image);

        $imageFile = $image->getFile();

        do {
            $hash = md5(uniqid(mt_rand(), true));
            $path = $this->expandPath($hash.'.'.$imageFile->getExtension());
            $absPath = $this->getAbsolutePath($path);
        } while ($this->filesystem->exists($absPath));

        $image->setPath($path);

        if ($imageFile instanceof UploadedFile) {
            $image->setOriginalName($imageFile->getClientOriginalName());
        }

        $this->filesystem->dumpFile(
            $absPath,
            file_get_contents($imageFile->getPathname())
        );
    }

    /**
     * {@inheritdoc}
     */
    public function remove(ImageInterface $image)
    {
        $path = $image->getPath();

        if (null === $path) {
            return false;
        }

        $path = $this->getAbsolutePath($path);

        if (is_file($path)) {
            return $this->filesystem->remove($path);
        }
    }

    /**
     * Get absolute path.
     *
     * @param string $path image path
     *
     * @return string absolute image path
     */
    private function getAbsolutePath($path)
    {
        return $this->dataRoot.DIRECTORY_SEPARATOR.$path;
    }

    /**
     * Expand image path.
     *
     * @param string $path
     *
     * @return string
     */
    private function expandPath($path)
    {
        return sprintf(
            '%s/%s/%s',
            substr($path, 0, 2),
            substr($path, 2, 2),
            substr($path, 4)
        );
    }
}

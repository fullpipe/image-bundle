<?php

namespace Fullpipe\ImageBundle\Uploader;

use Symfony\Component\Filesystem\Filesystem;
use Fullpipe\ImageBundle\Entity\ImageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader implements ImageUploaderInterface
{
    protected $filesystem;

    protected $dataRoot;

    public function __construct(Filesystem $filesystem, $dataRoot)
    {
        $this->filesystem = $filesystem;
        $this->dataRoot = $dataRoot;
    }

    public function upload(ImageInterface $image)
    {
        if (!$image->hasFile()) {
            return;
        }

        $this->remove($image);

        do {
            $hash = md5(uniqid(mt_rand(), true));
            $path = $this->expandPath($hash.'.'.$image->getFile()->guessExtension());
            $absPath = $this->getAbsolutePath($path);
        } while ($this->filesystem->exists($absPath));

        $file = $image->getFile();

        $image->setPath($path);

        if ($file instanceof UploadedFile ) {
            $image->setOriginalName($image->getFile()->getClientOriginalName());
        }

        $this->filesystem->dumpFile(
            $absPath,
            file_get_contents($image->getFile()->getPathname())
        );
    }

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

    private function getAbsolutePath($path)
    {
        return $this->dataRoot . DIRECTORY_SEPARATOR . $path;
    }

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

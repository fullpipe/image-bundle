<?php

namespace Fullpipe\ImageBundle\Uploader;

use Fullpipe\ImageBundle\Entity\ImageInterface;

interface ImageUploaderInterface
{
    public function upload(ImageInterface $image);
    public function remove(ImageInterface $image);
}

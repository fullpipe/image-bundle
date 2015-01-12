<?php

namespace Fullpipe\ImageBundle\Uploader;

use Fullpipe\ImageBundle\Entity\ImageInterface;

interface ImageUploaderInterface
{
    /**
     * Upload image file
     * @param  ImageInterface $image
     */
    public function upload(ImageInterface $image);

    /**
     * Remove image file
     * @param  ImageInterface $image
     */
    public function remove(ImageInterface $image);
}

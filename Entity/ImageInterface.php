<?php

namespace Fullpipe\ImageBundle\Entity;


interface ImageInterface
{
    /**
     * @return boolean
     */
    public function isNew();

    /**
     * @return boolean
     */
    public function hasFile();

    /**
     * @return null|\SplFileInfo
     */
    public function getFile();

    /**
     * @param \SplFileInfo $file
     */
    public function setFile(\SplFileInfo $file);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param string $path
     */
    public function setPath($path);
}

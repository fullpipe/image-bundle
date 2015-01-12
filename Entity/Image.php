<?php

namespace Fullpipe\ImageBundle\Entity;

/**
 * Image
 */
class Image implements ImageInterface
{
    protected $id;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    private $thumbSizes;

    /**
     * @var \SplFileInfo
     */
    protected $file;

    /**
     * @var string
     */
    private $originalName;

    /**
     * Set path
     *
     * @param string $path
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Has path
     *
     * @return boolean
     */
    public function hasPath()
    {
        return null !== $this->path;
    }

    /**
     * {@inheritdoc}
     */
    public function hasFile()
    {
        return null !== $this->file;
    }

    /**
     * {@inheritdoc}
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * {@inheritdoc}
     */
    public function setFile(\SplFileInfo $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Set thumbSizes
     *
     * @param array $thumbSizes
     * @return Image
     */
    public function setThumbSizes(array $thumbSizes)
    {
        $this->thumbSizes = $thumbSizes;

        return $this;
    }

    /**
     * Get thumbSizes
     *
     * @return array
     */
    public function getThumbSizes()
    {
        return $this->thumbSizes;
    }

    /**
     * Set originalName
     *
     * @param string $originalName
     * @return Image
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * Get originalName
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function isNew()
    {
        return null === $this->id;
    }
}

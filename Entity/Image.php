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

    protected $url;

    /**
     * @var \SplFileInfo
     */
    protected $file;

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

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function hasUrl()
    {
        return null !== $this->url;
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
     * @var string
     */
    private $originalName;


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

    public function isNew()
    {
        return null === $this->id;
    }
}

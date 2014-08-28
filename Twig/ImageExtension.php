<?php

namespace Fullpipe\ImageBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Fullpipe\ImageBundle\Entity\ImageInterface;

class ImageExtension extends \Twig_Extension
{
    protected $dataRootWebPath;

    public function __construct($dataRootWebPath)
    {
        $this->dataRootWebPath = $dataRootWebPath;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('web_path', array($this, 'getWebPath'), array('is_safe' => array('html'))),
        );
    }

    public function getWebPath(ImageInterface $image)
    {
        return $this->dataRootWebPath . DIRECTORY_SEPARATOR . $image->getPath();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fullpipe_image_extention';
    }
}

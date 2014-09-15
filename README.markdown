About ImageBundle
=================
Simple storage for images.

## Installation

Add to your `composer.json`:
```json
{
   "require": {
        "fullpipe/image-bundle": "dev-master"
    }
}
```

And to `AppKernel.php`:
```php
// app/AppKernel.php
class AppKernel extends Kernel
{
    //...
    public function registerBundles()
    {
        $bundles = array(
            //...
            new Fullpipe\ImageBundle\FullpipeImageBundle()
        );

        return $bundles;
    }
    //...
}
```

## Configuration

```yaml
fullpipe_image:
    web_root: /media/image //Web directory
    data_root: %kernel.root_dir%/../web/media/image //Directory for storing images
```

## Usage

First you need to extend `Fullpipe\ImageBundle\Entity\Image` by you own entity.
For example we have `Acme\BannerBundle\Entity\Banner`

```yaml
//Acme/BannerBundle/Resources/config/doctrine/Banner.orm.yml

Fullpipe\BannerBundle\Entity\Banner:
    type: entity
    table: acme_banner
    lifecycleCallbacks: {  }
```
and our entity
```php
//Acme/BannerBundle/Entity/Banner.php

namespace Acme\BannerBundle\Entity;

use Fullpipe\ImageBundle\Entity\Image;

/**
 * Banner
 */
class Banner extends Image
{

}
```
after this we need to update `BannerType.php`
```php
//Acme/BannerBundle/Form/Type/BannerType.php

namespace Acme\BannerBundle\Form\Type;

use Fullpipe\ImageBundle\Form\Type\ImageType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Banner type.
 */
class BannerType extends ImageType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //...

        parent::buildForm($builder, $options);

        //..
    }
}
```

that's all

### Twig

To get web path to original image use `web_path` twig filter.
`<img src="{{ banner|web_path }}" />` -> `/media/image/some_path.png`

### With [LiipImagineBundle](https://github.com/liip/LiipImagineBundle)

Do not forget to use same `data_root` directory
```yaml
...
liip_imagine:
...
    loaders:
        default:
            filesystem:
                data_root: %kernel.root_dir%/../web/media/image
...
```

### TODO

- tests
- model abstraction



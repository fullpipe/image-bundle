About ImageBundle
=================

Installation
------------

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
//...
class AppKernel extends Kernel
{
    //...
    public function registerBundles()
    {
        $bundles = array(
            ...
            new Fullpipe\ImageBundle\FullpipeImageBundle()
        );
        //...

        return $bundles;
    }
    //...
}
```

Usage
-----

todo!

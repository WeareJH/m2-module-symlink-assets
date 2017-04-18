<h1 align="center">JH Symlink Assets on Deploy</h1>

<p align="center">

Some Badges would be nice. 

</p>

This module will ensure the magento `setup:static-content:deploy` will deploy with symlinks instead of copies in Developer mode.

## Install

```
$ composer require wearejh/m2-module-symlink-assets
```

## Usage

Make sure the module is enabled if you've installed this after Magento installation. 

```
$ bin/magento module:enable Jh_SymlinkAssetDeploys
```

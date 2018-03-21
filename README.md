# MediumRSSParser

MediumRSSParser is an open source project allowing users to get all their Medium posts and parsing them into easy to use PHP objects due to the lack of GET functionality in Medium's API. Posts are split into:

* __Title__
* __Link__
* __Publish Date__ (DateTime Object)
* __Summary__ - first 120 characters of the blog post
* __Header Image__ - first image to be found in post
* __Full Content__ - all images and text in post as they appear
* __Content__ - just the text of the post
* __Collection of Images__ (Array) - <img> tags for every image in the post

## Live Demo

https://lucaperic.com indexes all my Medium posts as an example for this project.

## Downloading and using MediumRSSParser

In order to use MediumRSSParser in your project:

You can install via Composer:

```bash
composer install MediumRSSParser
```

or just install via:

```php
	require('path/to/BlogObject.php');
```

## API Reference

API Reference to come.

## Contributing

Contribution to come.
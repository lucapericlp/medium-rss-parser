# Medium RSS Parser

Medium-rss-parser is an open source project allowing users to get all their Medium posts and parsing them into easy to use PHP objects due to the lack of GET functionality in Medium's API. Posts are split into:

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

In order to use MediumRSSParser in your project, download the library and store in your path of choice wihtin your project:

```php
	require('path/to/BlogObject.php');
```

## API Reference

### BlogObject
1. Constructor that accepts a Medium profile RSS feed in the format: 
```php
	$blogObject = new BlogObject("https://medium.com/feed/@lucaperic.lp");
```  
and it auto populates an instance array of all Post objects found throughout the feed.

2. Array of Post objects can be accessed via:
```php
	$postsArray = $blogObject->getPosts();
```

### Post
##### Public methods available:
1. ```php $post->getTitle(); ```
2. ```php $post->getLink(); ```
3. ```php $post->getPubDate(); ```
4. ```php $post->getSummary(); ```
	- returns first 120 characters appended by "..." 
5. ```php $post->getHeaderImage(); ```
	- returns first image found in post
	- returns false if no images were found
6. ```php $post->getCollectionOfImages(); ```
	- returns array of all images found within that post
7. ```php $post->getContent(); ```
	- returns just the content within p tags
8. ```php $post->getFullContent(); ```
	- returns full content as received

## Contributing

Feel free to contribute to the project and if you provide valid code, I'll try get to including them asap.
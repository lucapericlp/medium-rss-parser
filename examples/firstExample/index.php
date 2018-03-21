<?php
require('MediumRSSParser/BlogObject.php');
?>
<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv=x-ua-compatible content="ie=edge">
    <link rel=icon type=image/png href="/img/LPfavicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600" rel=stylesheet>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel=stylesheet>
    <link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css integrity=sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi crossorigin=anonymous>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel=stylesheet href=/css/styles.css>
    <title>Medium RSS Parser Example</title>
</head>

<body>
    <div class="container">
        <div class="row center-children">
            <div class="code col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-8">
                <h1>Code used:</h1>

<pre class="code-used">
<span class="pink">require</span>(<span class="yellow">'MediumRSSParser/BlogObject.php'</span>);
$blogObject <span class="pink">= new </span><span class="method">BlogObject</span>(<span class="yellow">'https://medium.com/feed/@lucaperic.lp'</span>);<br>$postsArray = $blogObject-><span class="method">getPosts</span>();<br><br><span class="pink">foreach</span>($postsArray <span class="pink">as</span> $post){
    $postImageTag <span class="pink">=</span> $post-><span class="method">getHeaderImage</span>();
    $postImage <span class="pink">=</span> $post-><span class="method">extractSource</span>($postImageTag);
    $postTitle <span class="pink">=</span> $post-><span class="method">getTitle</span>();
    $postDesc <span class="pink">=</span> $post-><span class="method">getSummary</span>();
    $postLink <span class="pink">=</span> $post-><span class="method">getLink</span>();
    $postDate <span class="pink">=</span> $post-><span class="method">getPubDate()</span>-><span class="method">format</span>(<span class="yellow">'d M Y'</span>);
}</pre>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row center-children">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-8">
                <h1>Output:</h1>
            </div>
        </div>
        <div class="row center-children">
        <?php
            $blogObject = new BlogObject('https://medium.com/feed/@lucaperic.lp');
            $postsArray = $blogObject->getPosts();

            foreach($postsArray as $post){
                $postImageTag = $post->getHeaderImage();
                $postImage = $post->extractSource($postImageTag);
                $postTitle = $post->getTitle();
                $postDesc = $post->getSummary();
                $postLink =  $post->getLink();
                $postDate =  $post->getPubDate()->format('d M Y');
                echo '
                <div class="medium-post col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-4">'
                    .$postImageTag.
                    '<p class="text-muted">postImage <b>'.$postImage.'</b></p>
                    <p class="text-muted">postTitle: <b>'.$postTitle.'</b></p>
                    <p class="text-muted">postDesc: <b>'.$postDesc.'</b></p>
                    <p class="text-muted">postLink: <b>'.$postLink.'</b></p>
                    <p class="text-muted">postDate: <b>'.$postDate.'</b></p>
                </div>';
            }
        ?>
        </div>
    </div>
</body>
</html>
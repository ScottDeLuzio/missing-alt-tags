# Missing Alt Tags
Provides a dashboard widget that lists any pages, posts, or CPTs containing images that are missing ALT tags.

WordPress automatically adds `alt=""` to images when no alt text is specified. This plugin will search for the string `alt=""` in your posts, and return a list of posts that include that string.

This plugin will *not* find something like this: `<img src="yourimage.png" />`. 

It will find something like this: `<img src="yourimage.png" alt="" />`. 

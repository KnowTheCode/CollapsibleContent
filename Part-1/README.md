# Collapsible Content Part 1

Collapsible Content is a WordPress plugin.  It allows you to show and hide content using jQuery and CSS. It’s commonly used in Q&A, FAQ, hints, and other applications. 

This plugin is [Part 1 of 4](https://knowthecode.io/labs/collapsible-content-plugin) part series on WordPress custom plugin development.  Come visit [Know the Code](https://KnowTheCode.io) and do the hands-on lab with [Tonya](https://hellofromtonya.com) as you walks you through the entire process of building this plugin.  You'll learn deeply about:
 
- Plugin development
- Plugin architecture
- PHP DocBlock that identifies the plugin in WordPress
- Shortcodes
- View Files
- Localizing variables to pass PHP variables to JavaScript
- jQuery script building
- Click events
- Animating with jQuery
- Changing content with jQuery
- Checking and changing class attributes using jQuery

This plugin is fully functional and ready for your project.

## Features

The plugin features:

1. A `collapsible_content` shortcode - for hiding captions, long posts, and other content.
2. A `qa` shortcode - for displaying Question and Answer content, where the answer is hidden by default.
3. jQuery to handle the show/hide controls as well as switching the font icon handle.

## To Use

There are multiple shortcodes available to you now for use.

### QA Shortcode

To use the `[qa]` shortcode, you will want to place it within some content. The shortcode construct is:

`[qa question="the question that is shown all the time"]the hidden answer[/qa]`

For example, let's say you wrote a blog post and want to have some question and answer content within it. Go into that blog post and then add:

```
[qa question="When to remove a WordPress hook?"]In ac dictum massa. Proin porta vestibulum gravida. Pellentesque cursus arcu ut hendrerit aliquet. Vivamus leo dolor, iaculis at lobortis sed, malesuada sit amet est. In vel dui tristique, sagittis neque vitae, molestie augue. Aenean facilisis, nulla in malesuada semper, ante risus accumsan ante, vitae ultrices arcu odio id velit. Vestibulum hendrerit tellus ultrices, pretium sem ac, semper lacus. In vitae sapien congue tellus malesuada congue. Morbi pellentesque blandit viverra. Etiam nibh ipsum, porta vitae leo id, iaculis iaculis neque. Morbi accumsan nibh eu tortor varius, sit amet malesuada lorem aliquam. Quisque vel velit nibh. Etiam pulvinar sapien quis lorem dictum interdum.[/qa]
```

By default, the font icon uses the chevrons in Dashicons to provide a visible indicator of what the click event will do.

### Collapsible Content Shortcode

To use the `[collapsible_content]` shortcode, you will want to place it within some content. The shortcode construct is:

`[collapsible_content visible_label="some content here" hide_label="label to appeal to indicate hiding the content"]the hidden content[/collapsible_content]`

For example, let's say you want to display a caption that you want to hide away.  You'll have it appear under an image.  You might do this:

```
[collapsible_content visible_label="Show caption" hide_label="Hide caption"]Vivamus leo dolor, iaculis at lobortis sed, malesuada sit amet est. In vel dui tristique, sagittis neque vitae, molestie augue. Aenean facilisis, nulla in malesuada semper, ante risus accumsan ante, vitae ultrices arcu odio id velit. Vestibulum hendrerit tellus ultrices, pretium sem ac, semper lacus. In vitae sapien congue tellus malesuada congue. Morbi pellentesque blandit viverra. Etiam nibh ipsum, porta vitae leo id, iaculis iaculis neque. Morbi accumsan nibh eu tortor varius, sit amet malesuada lorem aliquam. Quisque vel velit nibh. Etiam pulvinar sapien quis lorem dictum interdum.[/collapsible_content]
```

By default, the font icon uses the chevrons in Dashicons to provide a visible indicator of what the click event will do.


## Contributions

All feedback, bug reports, and pull requests are welcome.

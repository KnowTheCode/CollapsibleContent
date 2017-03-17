# Custom Module

This module is the handler for custom features such as:
 
- Custom Post Types
- Custom Taxonomies
- Shortcodes

## The Problem

Our plugins and themes are filled with redundant code.  We repeat ourselves over and over again.  Think about it.

Why is this a problem? 

- One change and you have to change it in multiple places.  
- One bug and it's multipled over multiple implementations.  
- It's more code to build, test, and maintain which increases your time and costs.

### Repeating Shortcode Code

If you have more than one in a project, then you are doing repetitive tasks of merging defaults with the user defined attributes, starting the output buffer, calling the view file, and then flushing out the output buffer.  

### Repeating Custom Post Type Code

If you have more than one in a project, yup, you're repeating yourself.  To register a new custom post type, you have to: The labels and arguments can be generated instead.

- specify the arguments
- generate all of the custom labels
- handle the registration
- handle the flush rewrite rules

That's a lot of tasks for a single custom post type.  Imagine that your project has two or three.  Know the Code has 5 custom post types.  Imagine copying that code 5 times.  

That's silly and time consuming.  It's prone to errors.  It's too much to test and maintain.

### Repeating Taxonomy Code

Just like with Custom Post Types, Custom Taxonomies require you to do the following for each:

- specify the arguments
- generate all of the custom labels
- handle the registration
- handle the flush rewrite rules

Imagine that you have more than one.  Know the Code we have 4 custom taxonomies.  Why would I want to copy the code 4 times when I could just generate it automatically?

## The Solution - Centralize 

The solution is to centralize the redundant code. Okay, but we can go one step further by building the code to automatically generate labels, arguments, and more.  In doing so, we further reduce our code and get it as skinny as possible.

This module plucks all of the common code out of the codebase.  It handles the following tasks:

1. For Custom Post Types and Taxonomies:
    1. Label generation (from your configuration)
    2. Building of the arguments using your configuration
    3. Registering each with WordPress
2. For shortcodes:    
    1. Registering the shortcode with WordPress
    2. Loading and storing the configuration
    3. Merging the user defined attributes with the defaults you specify in your configuration
    4. Processing other shortcodes in the content, if your shortcode has content.
    5. View processing:
        1. If you specify a function, then it calls your code's function.
        2. Or it turns on the output buffer, calls the view file you configured, and then pulls it off of the buffer and returns it to WordPress for you. (that means no extra code for you)
         
This module can be extended to include:

1. Custom Fields
2. Term metadata
3. User metadata
4. Widgets
5. and more

## Contributions

All feedback, bug reports, and pull requests are welcome.

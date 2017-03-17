# Collapsible Content Part 3

This repository is for a hands-on coding lab at Know the Code called [Making the Collapsible Content Plugin Reusable](https://knowthecode.io/labs/collapsible-content-plugin-reusable).  

This plugin is re-architected to the ModularConfig design pattern. 

## Re-architecting

This plugin's architecture has changed to do the following:

1. Runtime configuration parameters are no longer interweaved into the codebase. 
2. Instead, they are now found in configuration files.  During runtime, the codebase loads these files.
3. Redundant customization and registration tasks are moved out of the codebase into a new [Custom Module](https://github.com/KnowTheCode/CollapsibleContent/tree/master/Part-3/src/custom).

### Reusable Code

The premise of reusability is the notion of architecting your code in such a way that you can use it over and over and over again to save yourself time and reduce your costs.  ModularConfig goes one step further in that it seeks to minimize or eliminate any changes to the codebase.

Think about that.  Imagine your code built in such a way that you don't have to touch the codebase after you've fully tested it.  Instead, you pass it the implementation through runtime configurations.  Imagine how much faster you can build code.

### Runtime Configuration

Our codebases are filled with runtime configuration parameters.  The unique arguments and labels that we embed for custom post types and taxonomies.  The default attributes for shortcodes.  The setup parameters for our themes.  All of these fill our codebase, thus requiring us to edit the codebase on each project. Bummer city.

In this plugin, these parameters are plucked out of the codebase and put into configuration files.  We use an array design pattern to keep it simple.  Then at runtime, these configs are loaded.

### Custom Module

Our plugins and themes are filled with redundant code.  We repeat ourselves over and over again.  

Shortcodes.  If you have more than one in a project, then you are doing repetitive tasks of merging defaults with the user defined attributes, starting the output buffer, calling the view file, and then flushing out the output buffer.  

Custom Post Types. If you have more than one in a project, yup, you're repeating yourself.  The labels and arguments can be generated instead.

Taxonomies. Same thing.  You can generate those instead of filling your codebase with redundant code.

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

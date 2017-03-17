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

The solution is to pluck all that redundant code out of our plugins and themes, placing it into a centralized repository.  Then your code interacts with the functionality and passes its runtime configuration to it.  

If you need to extend it, no problem.  The hooks are there.  You build only what is unique for your project's implementation.  
  
## Contributions

All feedback, bug reports, and pull requests are welcome.

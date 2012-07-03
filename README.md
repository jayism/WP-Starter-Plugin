#WP-Skeleton-Class-Plugin
========================
Just a simple WordPress class based plugin I use as a base to create the rest of my plugins.

##Setup

First things first: **Always change the function and class names to a unique prefix.** Never leave the same skeletonclass_function(); names in place as they may cause a conflict if you decide to create another plugin. Always make these unique, like so: myGreatPlugin_function();.

All of the plugin functions are constructed and fire within the skeletonclass(), located in skel-plugin.php.
# Taxonomy Generator

There may be times when you want to use lowercase labels when embedding the taxonomy name into a sentence.  For example, look at our current taxonomy label generator and the parameter [`choose_from_most_used`](https://github.com/KnowTheCode/CollapsibleContent/blob/master/Part-2/src/faq/custom/taxonomy.php#L65).  Notice how it's embedding the plural label which most likely will have the first letter capitalized.  

How can we change our label generator to allow someone to use a lowercase for sentences?

This code enhancement adjusts our implementation by wrapping up the configuration parameters into an array. Notice that one of the parameters is `use_lowercase_in_sentence`.  With this enhancement, you can set it you want it to be lowercase or not for the labels embedded within a sentence.

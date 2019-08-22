<p align="center">
	<a href="https://thisisgoodmedicine.com">
		<img alt="The Good Medicine logo" src="https://thisisgoodmedicine.com/wp-content/uploads/gm-emblem-color.png" width="75">
	</a>
</p>
<h3 align="center">
	Google Tag Manager - Legacy Module Overview 👀
</h3>
<p align="center">
LEGACY NOTE: This module was built using the legacy Reactor toolset. Eventually it should be converted over to the newer Dark Matter framework.
</p>

## Overview
This module handles loading Google Tag Manager on this site. Note that currently this module automatically loads the container ID for the
`production` environment. However, a hook (`gtm_container_id`) is available to load a different container ID. For example, the WP Environment module that loads
as part of our MU Plugins suite, loads different container IDs in `staging` and `local` environments. This gives us incredible flexibility for not only testing container
changes, but also for loading different Analytics accounts on the different environments.
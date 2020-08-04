# wp-theme-boilerplate

IOP's foundation for building WordPress themes.

This repository seeks to provide a common set of starting files for our custom themes. This should include repeated patterns and re-usable solutions, with the expectation that delivered themes will build a custom look and feel on top of this foundation.

## Getting started

This repository does not include tooling or specify any dependencies, however it will require several PHP libraries to work correctly.

Rather than cloning this, the best way to get started is to run the init command from our [ideasonpurpose/wordpress](https://hub.docker.com/r/ideasonpurpose/wordpress) Docker image which will generate a complete, ready-to-use development environment around this boilerplate including tooling and dependencies.

<!-- JavaScript notes (migrated from docker-wordpress-dev 

- All scripts are assumed to require jQuery and will include jQuery as a dependency. It's very difficult to get jQuery _out_ or WordPress, so instead of bundling in a second copy of the library, we just use what's there and assume it will already have been required by something else. (TODO: check this)






-->

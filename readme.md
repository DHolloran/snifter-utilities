## Requirements
- Git
- Laravel Valet
- WP-CLI?
- Mac OS X
- WP Migrate DB Pro?
- Composer
- PHP v?

## General Flow
- Setup config in users home directory (Initial run/setup command)
    - Database User
    - Database Password
    - Database prefix (Default to wp_)
    - WP Migrate DB Pro serial?
    - Other plugin serials
        - May need to add the option key for where the plugin stores the serial
        - This may require adding "support" for specific plugins individually
    - Download links for paid plugins?
        - Possibly location on computer that houses paid plugins
        - WP-CLI plugin update `wp plugin update` or some other way if that does not work with the paid plugins
    - List of plugins to always install
        - Add the ability to select if plugin should be activated
    - Generic user details?
    - Path to sites directory?
    - Theme URL
        - Should this be a zip or the master branch?
        - Maybe check for (.zip, .tar.gz, .tar, .git, other to allow for both)
    - Git branch?
    - Theme directory location? (Ours is WP root how is this handled?)
    - Theme rename maybe just use root directory name this may be better in the individual site config or passed as a parameter/question?
    - Should we run npm install
    - Should we run bower install
    - Should we run composer install
    - Other Commands to run in theme on completion
    - wp-config.php addtions/changes?
- Individual Site Options (CLI/Config)
    - possibly have a `$ command init --dir={directoryname}` that creates the directory then changes into the directory and creates a config file
    - then have `$ command install {options}` that takes care of installing all the things
    - Site title
    - Confirm generic user details
    - Confirm other global settings possibly at least command running options

## Database/URLs
- DB Name: wp_{directoryname}
- URL: {directoryname}.dev

## Todo
- [x] Global configuration creation.
- [ ] New name? Possibly Flint/Flint CLI other things that bring up thoughts of starting (Theme is kindling so flint and steel would start kindling)
- [ ] Add update command that runs things like plugins and new option commands:update
- [ ] Add new command that runs init/install
- [ ] Rename init to create on config?
- [ ] Documentation wiki
- [ ] Install instructions
- [ ] Tests
- [ ] Add to packagist to Composer install
- [ ] Build Plugin or Add to theme to retrieve configuration details on live site
- [ ] src/Option/Configuration.php
    - [x] Build configuration skeleton creation.
    - [x] Merge global configuration with default configuration
    - [x] Write to .kindling.yml
    - [ ] Allow for JSON configuration?
- [ ] config.php
    - [ ] **theme:style-css:client** Verify via CLI input
    - [ ] **theme:style-css:version** Verify via CLI input
    - [ ] **site:title** Get from CLI Input
    - [x] **plugins**
        - [x] Merge global/local together.
        - [x] Possibly add all global to local config so we can disable if needed.
        - [x] Add --force
        - [x] Add version number option and default to latest stable
    - [ ] **user:username** Verify via CLI input
    - [ ] **user:email** Verify via CLI input
    - [ ] **user:password** Verify via CLI input
    - [ ] **theme:type** Allow for tar and git theme types
    - [ ] **theme:name** Get/Verify from CLI Input
    - [ ] **theme:style-css:theme-name** Get/Verify from CLI Input (Possibly site title)
    - [x] **site:url** Use `$ kindling init {$name}` to create {name}.dev
    - [x] **database:name** Use `$ kindling init {$name}` to create wp_{name}

- [ ] src/Command/InstallCommand.php
    - [x] Check for .kindling.yml before executing and throw error if not found.
    - [ ] Split sections into there own commands? That way you can install via `$ kindling install:all` or `$kindling install:section`
    - [ ] Allow for disabling of certain sections via flag?
    - [ ] Post Git pull commands?
    - [ ] Install PHPUnit scaffold once theme is installed.
    - [ ] Initialize Git repository and remotes.
    - [ ] Read in files as templates. '.gitignore' => 'https://wpengine.com/wp-content/uploads/2013/10/recommended-gitignore-no-wp.txt'
    - [ ] License paid plugins
        - [ ] WP Migrate DB Pro: `define( 'WPMDB_LICENCE', 'XXXXX' );`
        - [ ] Possibly activate paid plugins separately after licensing.

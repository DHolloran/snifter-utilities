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
- Build all the things!

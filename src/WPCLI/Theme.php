<?php
namespace PressCLI\WPCLI;

use PressCLI\WPCLI\CLI;
use PressCLI\ThemeInstall\Zip;
use PressCLI\Option\Configuration;
use PressCLI\ThemeInstall\StyleCSS;
use Symfony\Component\Console\Output\OutputInterface;

trait Theme
{
    /**
     * Deletes all unused default themes.
     */
    public static function themeDeleteDefaults()
    {
        $themes = [
            'twentyfifteen',
            'twentyfourteen',
            'twentysixteen',
        ];

        foreach ($themes as $theme) {
            self::themeDelete($theme);
        }
    }

    /**
     * Deletes a theme.
     *
     * @param  string $theme Theme name to delete.
     */
    public static function themeDelete($theme)
    {
        CLI::execCommand('theme', ['delete', $theme]);
    }

    /**
     * Activates a theme.
     *
     * @param  string $theme Theme name to activate.
     */
    protected static function themeActivate($theme)
    {
        CLI::execCommand('theme', ['activate', $theme]);
    }

    /**
     * Installs a theme.
     *
     * @param  OutputInterface $output
     */
    public static function themeInstall(OutputInterface $output)
    {
        $config = Configuration::get();
        $url = isset($config['theme']['url']) ? $config['theme']['url'] : '';
        $name = isset($config['theme']['name']) ? $config['theme']['name'] : '';
        $directory = getcwd() . '/wp-content/themes';

        // Make sure we have the required configuration.
        if (!$url || !$name) {
            return;
        }

        // Make sure the theme does not already exist.
        if (file_exists("{$directory}/{$name}")) {
            $output->writeln("Warning: Theme already exists in {$directory}/{$name}.");

            // Activate theme.
            self::themeActivate($name);

            return;
        }

        // Download the theme to the themes directory.
        $theme = Zip::execute($url, $directory, $name);
        if (!$theme) {
            $output->writeln("<error>Error: Theme could not be downloaded from {$url}!</error>");
            return;
        }

        $output->writeln("Success: Theme successfully installed!");

        // Set style.css
        StyleCSS::set();

        // Activate theme.
        self::themeActivate($name);
    }
}

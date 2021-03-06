<?php
namespace PressCLI\Option;

use PressCLI\Option\DefaultConfiguration;
use Symfony\Component\Console\Output\OutputInterface;

class GlobalConfiguration
{
    use DefaultConfiguration;

    /**
     * Creates the configuration file.
     *
     * @param  OutputInterface $output
     */
    public static function create(OutputInterface $output)
    {
        $output->writeln("<info>Creating global configuration...</info>");
        $configFile = self::getConfigFile();

        if (self::exists()) {
            $output->writeln("<comment>Global configuration already exists at {$configFile}.</comment>");

            return;
        }

        // Add configuration from skeleton.
        $config = json_encode(self::configSkeleton(), JSON_PRETTY_PRINT);
        $config = stripslashes($config);
        file_put_contents($configFile, $config);

        $output->writeln("<info>Global configuration created at {$configFile}!</info>");
    }

    /**
     * Get the configuration.
     *
     * @return array
     */
    public static function get()
    {
        if (!self::exists()) {
            return [];
        }

        $config = json_decode(file_get_contents(self::getConfigFile()), true);

        return $config;
    }

    /**
     * Configuration skeleton
     *
     * @return string
     */
    protected static function configSkeleton()
    {
        $config = self::getDefaultConfiguration();

        return $config;
    }

    /**
     * Checks if the configuration exists.
     *
     * @return boolean
     */
    public static function exists()
    {
        return file_exists(self::getConfigFile());
    }

    /**
     * Retrieves the configuration file.
     *
     * @return string The path to the configuration file.
     */
    protected static function getConfigFile()
    {
        return "{$_SERVER['HOME']}/.press-cli.json";
    }
}

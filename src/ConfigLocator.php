<?php


namespace Deployee\Components\Config;


class ConfigLocator
{
    /**
     * @var array
     */
    private static $possibleConfigFileNames = [
        '.deployee.{env}.yml',
        '.deployee.yml',
        'deployee.{env}.yml',
        'deployee.yml',
        '.deployee.{env}.dist.yml',
        '.deployee.dist.yml',
        'deployee.{env}.dist.yml',
        'deployee.dist.yml',
    ];

    /**
     * @param array $searchableDirs
     * @param string $env
     * @return string
     */
    public function locate(array $searchableDirs, string $env = ''): string
    {
        foreach ($searchableDirs as $expectedDir) {
            foreach(self::$possibleConfigFileNames as $possibleConfigFileName){
                $possibleConfigFileName = str_replace('{env}', $env, $possibleConfigFileName);
                $expectedFilepath = $expectedDir . DIRECTORY_SEPARATOR . $possibleConfigFileName;
                if(is_file($expectedFilepath)){
                    return realpath($expectedDir) . DIRECTORY_SEPARATOR . $possibleConfigFileName;
                }
            }
        }

        throw new \RuntimeException(
            sprintf(
                'Could not find config file (%s)',
                implode(', ', self::$possibleConfigFileNames)
            )
        );
    }
}
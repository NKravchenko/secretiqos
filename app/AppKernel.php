<?php

use Affect\Common\Debug\ExceptionHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Debug\ErrorHandler;

class AppKernel extends Kernel
{
    const LINE_FORMAT = "[%datetime%] %level_name%: %message%\n";

    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);

        $rotatingFileHandler = new RotatingFileHandler($this->getLogDir() . '/error.log', 7, Logger::DEBUG);
        $rotatingFileHandler->setFormatter(new LineFormatter(self::LINE_FORMAT));

        $logger = new Logger('exception');
        $logger->pushHandler($rotatingFileHandler);

        ErrorHandler::register();
        ErrorHandler::setLogger($logger);

        if ('cli' !== php_sapi_name()) {
            ExceptionHandler::register($this->debug);
            ExceptionHandler::setLogger($logger);
        }
    }

    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),

            new Affect\MiniCoreBundle\MiniCoreBundle(),
            new Affect\MiniWebBundle\MiniWebBundle(),
        ];

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    /**
     * Loads the container configuration
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/../config/config_'.$this->getEnvironment().'.yml');
    }

    /**
     * Gets the cache directory.
     *
     * @return string The cache directory
     */
    public function getCacheDir()
    {
        return $this->rootDir . '/../cache/'.$this->getEnvironment();
    }

    /**
     * Gets the log directory.
     *
     * @return string The log directory
     */
    public function getLogDir()
    {
        return $this->rootDir . '/../logs';
    }
}

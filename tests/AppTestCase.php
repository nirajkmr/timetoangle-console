<?php
namespace TimeToAngle\Tests;

require '../../vendor/autoload.php';
use TimeToAngle\Command;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\StreamOutput;

abstract class AppTestCase extends \PHPUnit_Framework_TestCase
{
    private $app;

    public function setUp()
    {
        $this->app = new Application('TimeToAngle', '1.0');
        $this->app->add(new Command\TimeToAngleCommand());
        $this->app->setAutoExit(false);
    }

    /**
     * Runs a command and returns it output
     */
    protected function runCommand($command)
    {
        $fp = tmpfile();
        $input = new StringInput($command);
        $output = new StreamOutput($fp);

        $this->app->run($input, $output);

        fseek($fp, 0);
        $output = '';
        while (!feof($fp)) {
            $output = fread($fp, 4096);
        }
        fclose($fp);

        return $output;
    }
}

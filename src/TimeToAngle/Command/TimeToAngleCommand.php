<?php
namespace TimeToAngle\Command;

use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputInterface;

use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Input\InputDefinition;

use Symfony\Component\Console\Input\InputOption;

class TimeToAngleCommand extends Command
{
    protected function configure()
    {
        $this

        // the name of the command (the part after "bin/console")
        ->setName('timetoangle')

        ->setDefinition(new InputDefinition(array(new InputOption('filter', 'f'),)))
                // the short description shown while running "php bin/console list"
            ->setDescription('Converts Time To Angle.')



        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows to converts time to angle, use command as ./bin/timetoangle timetoangle 12:23')

        // configure an argument
        ->addArgument('time', InputArgument::REQUIRED, 'Time is required.')

        ->addArgument(
            '--filter',
            InputArgument::OPTIONAL,
            'get the specific data on request filter.eg --filter hourAngle'
        );

     
     
    }

    /**
     * Validate Time
     *
     * @param Boolean  $time   The time
     */
    protected function validateTime($time)
    {
        return preg_match('/([1-9][012]:[0-5][0-9])/', $time);
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $timetoangle =  new TimeAngle();
        
        $validTime = $this->validateTime($input->getArgument('time'));

        if (!$validTime) {
            $output->writeln('Please provide valid time eg: 12:15');

            return;
        }

        $timetoangle->setTime($input->getArgument('time'));
        $timetoangle->convertTime();
        //request the --filgter value
        $setFilter = $input->getArgument('--filter');
        
        //get the angle based on filter
        switch ($setFilter) {
            case "hourAngle":
                $output->writeln('Hour hand: '   .  $timetoangle->getHourAngle());
                break;
            case "minuteAngle":
                $output->writeln('Minute hand: ' .  $timetoangle->getMinuteAngle());
                break;
            case "innerAngleBetweenHands":
                $output->writeln('Inner Angle: ' .  $timetoangle->getInnerAngleBetweenHands());
                break;
            case "outerAngleBetweenHands":
                $output->writeln('External Angle: ' .  $timetoangle->getOutterAngleBetweenHands());
                break;

            default:
                $output->writeln('Hour hand: '   .  $timetoangle->getHourAngle());
                $output->writeln('Minute hand: ' .  $timetoangle->getMinuteAngle());
                $output->writeln('Inner Angle: ' .  $timetoangle->getInnerAngleBetweenHands());
                $output->writeln('External Angle:' .$timetoangle->getOutterAngleBetweenHands());
        }

               
    }
}

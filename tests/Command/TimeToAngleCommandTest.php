<?php
namespace TimeToAngle\Tests\Command;

use TimeToAngle\Tests\AppTestCase;

include("../AppTestCase.php");
class TimeToAngleCommandTest extends AppTestCase
{
    /**
     * Test Validate time input fail case
     */
    public function testvalidateTimeFailInput()
    {
        $time = '13:34';

        $output = $this->runCommand("timetoangle " . $time);

        return $this->assertEquals('Please provide valid time eg: 12:15', trim($output));
    }


    /**
     * Test Validate time input pass case
     */
    public function testvalidateTimeFairInput()
    {
        $time = '12:34';

        $output = $this->runCommand("timetoangle " . $time);

        return $this->assertNotEquals('Please provide valid time eg: 12:15', trim($output));
    }

    /**
     * Test Validate time input pass case
     */
    public function testGetHourAnglesOFTime()
    {
        $time = '12:15';
        
        $output = $this->runCommand("timetoangle " . $time . " --filter hourAngle");

        return $this->assertNotEquals('..Hour hand: 367.5', trim($output));
    }


    /**
     * Test Validate time input pass case
     */
    public function testGetMinuteAnglesOFTime()
    {
        $time = '12:15';
        
        $output = $this->runCommand("timetoangle " . $time . " --filter minuteAngle");

        return $this->assertNotEquals('...Minute hand: 90', trim($output));
    }


    /**
     * Test Validate time input pass case
     */
    public function testGetInnerAngleBetweenHandsOFTime()
    {
        $time = '12:15';
        
        $output = $this->runCommand("timetoangle " . $time . " --filter innerAngleBetweenHands");

        return $this->assertNotEquals('....Inner Angle: -277.5', trim($output));
    }

    /**
     * Test Validate time input pass case
     */
    public function testGetOuterAngleBetweenHandsOFTime()
    {
        $time = '12:15';
        
        $output = $this->runCommand("timetoangle " . $time . " --filter outerAngleBetweenHands");

        return $this->assertNotEquals('.....External Angle: 637.5', trim($output));
    }


    /**
     * Test Validate time input pass case
     */
    public function testAllAngleOFTime()
    {
        $time = '12:15';
        $output = $this->runCommand("timetoangle " . $time);
        $this->assertNotEquals('..Hour hand: 367.5', trim($output));
        $this->assertNotEquals('...Minute hand: 90', trim($output));
        $this->assertNotEquals('....Inner Angle: -277.5', trim($output));
        $this->assertNotEquals('.....External Angle: 637.5', trim($output));

        return;
    }
}

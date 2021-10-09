<?php
namespace TimeToAngle\Command;

/**
  * This class calculate the time angle.
  */
class TimeAngle
{
    /**
     * Time
     */
    protected $time;

    /**
     * Converted Time
     */
    protected $convertedTime;


    /**
     * Set Time
     *
     * @param   $time Time to convert
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
    
    /**
     * get Time
     *
     */
    public function getTime()
    {

        return $this->time;
    }

    /**
     * get hour angle
     *
     */
    public function getHourAngle()
    {
        //Get Hour Angle
        return 0.5 * (($this->convertedTime['hour'] * 60) + $this->convertedTime['min']);
    }

     /**
     * get minute angle
     *
     */
    public function getMinuteAngle()
    {

        //Get Minute Angle
        return 6 * $this->convertedTime['min'];
    }

     /**
     * get inner angle between hands
     *
     */
    public function getInnerAngleBetweenHands()
    {
        return $this->getMinuteAngle() - $this->getHourAngle();
    }

     /**
     * get outer angle between hands
     *
     */
    public function getOutterAngleBetweenHands()
    {
        return 360 - $this->getInnerAngleBetweenHands();
    }

     /**
     * convert time
     *
     */
    public function convertTime()
    {
        $explode = explode(':', $this->time);

        $time['hour'] = $explode[0];
        $time['min']  = $explode[1];

        $this->convertedTime = $time;
    }
}

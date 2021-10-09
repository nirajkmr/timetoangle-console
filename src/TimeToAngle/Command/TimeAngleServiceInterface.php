<?php
namespace TimeToAngle\Command;

/**
* Interface TimeAngleServiceInterface
*/
interface​ InterTimeAngleServiceInterface
{
/**
* @return​ string
*/
public​ function​ setTime​($time);
/**
* @return​ string
*/
public​ function​ getTime​();
*
* @return​ float

public​ function​ getHourAngle();
/**
* @return​ float
*/
public​ function​ getMinuteAngle();
/**
* @return​ float
*/
public​ function​ getInnerAngleBetweenHands();
/**
* @return​ float
*/
public​ function​ getOutterAngleBetweenHands();
}

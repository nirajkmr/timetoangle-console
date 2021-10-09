# timetoangle-console

**Problem Statement:**

Create a simple CLI application.
The code MUST follow PSR​ 1 and 2 at minimum.
The code MUST contain unit tests using phpunit​.
The code MUST follow best practices as defined by SOLID​ principles.
The application MUST take in a “--help” argument that explains how to use the application.
Dependencies MUST be managed using composer.
PHP 7 or above.
Bonus points if using symfony console commands.
Make note to properly handle invalid input (this should be noted in tests)
Make sure you handle superimposition appropriately.
The application converts time to the different angles present on a clock (Also known as the
clock​ ​angle​ ​problem​). There’s no need to implement seconds.
Eg:
$ ./bin/time2angle 12:15
Hour hand: 7.5
Minute hand: 90
Internal angle: 82.5
External Angle: 277.5
You should be able to filter the type of angle you want, by default there should be no filter. E.g.
--filter=minute should display the minute hand angle only
--filter=hour should display the hour hand angle only
--filter=internal should display the inner angle only
--filter=external should display the external angle only
Hours are 1-12.
Minutes are 0-59.
12 is both 0 and 360.
Angles must never be above 360 degrees or below 0

**Help Command:**
----------------------------------------------
1 ./bin/timetoangle timetoangle --help

Get the time angle for all:
----------------------------------------------
2 ./bin/timetoangle timetoangle 12:15

Get the specific angle based on  filter
----------------------------------------------
3 ./bin/timetoangle timetoangle 12:15 --filter hourAngle 

filter key:
----------
a. hourAngle
b. minuteAngle
c. innerAngleBetweenHands
d. outerAngleBetweenHands

echo off
echo Code to add package to meteor 
set /p package=Enter The Package to install:
meteor add %package%
echo adding %package%
pause
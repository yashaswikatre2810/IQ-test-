@echo off
setlocal

:: Define XAMPP installation directory
set XAMPP_DIR=C:\xampp

:: Define paths to MySQL and PHP directories within XAMPP
set MYSQL_DIR=%XAMPP_DIR%\mysql\bin
set PHP_DIR=%XAMPP_DIR%\php
set APACHE_DIR=%XAMPP_DIR%\apache\bin

:: Add MySQL and PHP to PATH
set PATH=%MYSQL_DIR%;%PHP_DIR%;%PATH%

echo Starting XAMPP...
START /B "" "%XAMPP_DIR%\xampp_start.exe"
timeout /t 10

echo Running Python script...
python process_results.py

echo Stopping XAMPP...
START /B "" "%XAMPP_DIR%\xampp_stop.exe"

endlocal

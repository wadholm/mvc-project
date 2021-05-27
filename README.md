# MVC-PROJECT

[![Build Status](https://www.travis-ci.com/wadholm/mvc-project.svg?branch=main)](https://www.travis-ci.com/wadholm/mvc-project)
[![Build Status](https://scrutinizer-ci.com/g/wadholm/mvc-project/badges/build.png?b=main)](https://scrutinizer-ci.com/g/wadholm/mvc-project/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wadholm/mvc-project/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/wadholm/mvc-project/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/wadholm/mvc-project/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/wadholm/mvc-project/?branch=main)

### Documentation for repo mvc-project by mack20.  
A project to examinate the course mvc at BTH. 

## Yatzy
![Dices](resources/img/dice.png)

#### Play Yatzy, and try to make it to the High Score!  

Results of the Yatzy-games are saved in a database and presented under statistics, 
where you can find statistics about the last ten games played!

### How to play?

Instructions are presented when the user is attempting to start a new game. 

The Yatzy is played with five dices. The game consists of thirteen rounds, when all rounds have been played the result is presented. 
The user rolls the dices a maxium of three rolls per round. The aim is to get as high a score as possible. 
To get the bonus of 50 additional points the user must get 63 points or more from the first six rounds (Aces to Sixes). If the user rolls five dices with the same faces you get Yatzy, also worth 50 points. 

The user is presented with a button to roll the first hand of dices. 
When rolled, the five dices are presented with a checkbox for each die. 
To the users left the scorebox is presented. 

The user shall select dices to keep, non selected dices will be rerolled.

The user shall choose where to put score into scorebox after a maximum of three rolls.
When dices are added to scorebox the accumaluted score for that round is presented and the user rolls a new hand. 
When all cells in the scorebox is filled, the result is presented to the user. 
If the user acchieved a new highscore the user will be able to add it's name to the high score.  

### Install

On the main page of this repository, below the name and above the list of files click "Code".  
Choose your preference of downloading as zip or clone the repository and change the working directory where you want the clone.  

On the command line, open repository.  
Verify installation with the following command:  
```
php -S localhost:8080 -t public
```

#### Make it run in your local server  

Open a browser to your local server (e.g., Apache, XAMPP) and find the "public/" directory.  

If an error accurs:  

> The stream or file "...storage/logs/laravel.log" could not be opened in append mode: failed to open stream: Permission denied  

Make the storage directory writable by the web server:  
```
chmod -R o+w storage/
```

#### Add database

add your database in config/database.php and in .env  

See .env example:  

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=username
DB_PASSWORD=password

Reload the page and play Yatzy!

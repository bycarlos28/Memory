# Memory

## Index

 1. [Project Definition](#project-definition)
 2. [ Install Guide ](#install-guide)
    1. [Linux](#linux)



## Project Definition
 
 Memory is a card game, there are four couple of cards upside down on the table, the user has to select a pair of cards and flip them showing the obverse, if they   have the same image, the cards will remain exposed, however if the flipped cards don't contain the same image, the cards return to the inital position. 
  When all the obverses are visible the user has win, and he is able to save the result of his match by introducing a name.

## Install guide

Let's start by installing all the dependences for this project:
 - apache2
 - php

### Linux

```bash
$ apt install apache2

$ apt install php
```

Next up, download de latest realese from this proyect and extract it

Now copy the repository to the apache path:
```bash
$ mv {folder extract name}/* /var/www/html/
```
Open the browser and search localhost/index.php

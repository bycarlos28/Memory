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
 - git
 - apache2
 - php

### Linux

```bash
$ apt install apache2

$ apt install php
```

Then we nedd to clone the repository using git. We can install git with the following comand:

```bash
$ apt install git
```

Next up, we need to clone de repository:

```bash
$ git clone https://github.com/bycarlos28/Memory.git
```
Copy repository to apache path:
```bash
$ mv Memory /var/www/html/
```
Open the browser and search localhost/Memory.

#!/bin/bash
MODULE_NAME=$1
mkdir ./app/view/$MODULE_NAME
touch ./app/view/$MODULE_NAME/$MODULE_NAME.js
touch ./app/view/$MODULE_NAME/$MODULE_NAME.scss
touch ./app/view/$MODULE_NAME/$MODULE_NAME.php
printf '\nimportModule.getModule('\'$MODULE_NAME\'');' >> ./app/js/index.js
<?php

namespace AP52\controllers;
use AP52\Views\MainView;

class MainController
{
    public function main(){
        new MainView();
    }
}
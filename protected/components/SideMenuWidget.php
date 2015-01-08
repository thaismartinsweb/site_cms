<?php

class SideMenuWidget extends CWidget
{
    public function run()
    {
        $this->render('sidemenu', array('modules' =>  Module::model()->findAll()));
    }
}
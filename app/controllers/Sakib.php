<?php

class Sakib extends DController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ayon($param)
    {
        echo "Ayon " . $param . " <br/>";
    }
}
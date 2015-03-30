<?php

    class Price
{

    private $level;
    private $id;

    function __construct($level, $id = null)
    {
        $this->level = $level;
        $this->id = $id;
    }

    function getLevel()
    {
        return $this->level;
    }

    function setLevel($new_level)
    {
        $this->level = (int) $new_level;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($new_id)
    {
        $this->id = (int) $new_id;
    }


}


?>

<?php
    Class Restaurant
    {
        private $name;
        private $price_id;
        private $vegie;
        private $opentime;
        private $closetime;
        private $id;

        function __construct($name, $price_id, $vegie, $opentime, $closetime, $id = null)
        {
            $this->name = $name;
            $this->price_id = $price_id;
            $this->vegie = $vegie;
            $this->opentime = $opentime;
            $this->closetime = $closetime;
            $this->id = $id;
        }
        //setters
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function setPrice_id($new_price_id)
        {
            $this->price_id = (int) $new_price_id;
        }

        function setVegie ($new_vegie)
        {
            $this->vegie = (int) $new_vegie;
        }

        function setOpentime($new_opentime)
        {
            $this->opentime = (int) $new_opentime;
        }

        function setClosetime($new_closetime)
        {
            $this->closetime = (int) $new_closetime;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }
        //getters
        function getName()
        {

        }

    }
?>

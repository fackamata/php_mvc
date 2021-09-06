<?php

namespace App\HTML;

class BootstrapForm extends \App\HTML\Form
{

    protected function surround($html)
    {

        return '<div class="col-12">' . $html . '</div>';
    }

    public function input($name,$type="text",$required=false){
        $validation = $required ? "required" : null;
        return $this->surround('
        <label for="'.$name.'">'.ucwords($name).'</label>
        <input type="'.$type.'" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$this->getValue($name).'"' .$validation.'>'
    );
    }

    public function submit()
    {
        return $this->surround('<button class="btn btn-primary" type="submit">envoyer</button>');
    }
}

<?php
class Todo extends Eloquent
{
    public function isDoneClass()
    {
        return ((int)$this->status == 0)? '': 'done';
    }
}
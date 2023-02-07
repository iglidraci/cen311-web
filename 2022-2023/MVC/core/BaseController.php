<?php

abstract class BaseController
{
    protected string $layout = 'main'; // in case you want to override it in subclasses
    private string $action = '';

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }



}
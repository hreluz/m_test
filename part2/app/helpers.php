<?php

function view($that, $view, $data)
{
    return $that->view->render($that->response, $view, $data);
}
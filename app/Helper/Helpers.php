<?php
function successFlash($message){
    session()->flash('success',$message);
}

function errorFlash($message){
    session()->flash('error',$message);
}

function infoFlash($message){
    session()->flash('info',$message);
}

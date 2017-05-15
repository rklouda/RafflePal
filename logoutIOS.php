<?php
session_start();
// Create connection

if(session_destroy())
{
  echo '{"success":"1"}';
  exit;
 
 }

<?php
session_start();
var_dump($_SESSION);
var_dump(session_id());
var_dump($_SESSION['user']['login_u'] == session_id());

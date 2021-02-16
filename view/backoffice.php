<?php
if (!isset($data)) {
    // GET data in case of Exception has been generated
    $data = $controller->dashboard();
}
extract($data);
?>
<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Back office</h1>
    <?= (isset($msg)) ?  $msg : '' ?>
    <?= $display->dashboard($data); ?>
</div>
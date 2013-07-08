<?php
$this->title()->set('Welcome to the world of Aura Framework!');
?>
<h1>Hey good day <?= $this->message; ?></h1>
<form method="get" action="<?php echo $this->route('example_package_greet'); ?>" class="form-search">
    <input type="text" name="name" id="name" class="input-medium search-query" placeholder="Name" />
    <input type="submit" name="greet" id="greet" value="Greet" class="btn" />
</form>

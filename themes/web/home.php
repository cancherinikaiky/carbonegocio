<?php
  $this->layout("_theme");
?>

<h1>
    Você está na página home WEB.
</h1>

<?php
    foreach ($workers as $work) {
        ?>
        <a href="<?= url("perfil/{$work->id}") ?>">teste</a>
<?php
    }
    ?>
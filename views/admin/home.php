<h1>Welcome admin <?=
$_SESSION['user']->username?></h1> 
<?=

\App\Utils::var_dump_pre($_SESSION);
?>
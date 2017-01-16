<?php
session_start();
require_once'helpers/security.php';
$errors=isset($_SESSION['errors'])?$_SESSION['errors']:[];
$fields=isset($_SESSION['fields'])?$_SESSION['fields']:[];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery-3.1.1.min.js"></script>
        <title>Kontakt</title>
         <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,400italic'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/ekko-lightbox.min.css">
<!--    <link rel="stylesheet" type="text/css" href="css/ekko-lightbox-dark.css"> -->
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="contact">
                <div class="panel">
                    <?php if(!empty($errors)):?>
                    <div class="panel">
                        <ul><li><?php echo implode('</li> <li>', $errors)?></li></ul>
                    </div>
                <?php endif; ?>
                </div>
                <h3>Kontaktirajte nas</h3>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="name">Vaše ime *</label>
                        <input type="text" name="name" autocomplete="off" class="form-control" placeholder="Unesite ime" <?php echo isset ($fields['name'])? 'value="'.e($fields['name']).'"':''?>>
                    </div>
                    <div class="form-group">
                        <label for="email">Vaša email adresa * </label>
                            <input type="email" name="email" autocomplete="off" class="form-control" placeholder="Unesite email"<?php echo isset ($fields['email'])? 'value="'.e($fields['email']).'"':''?>>
                    </div>
                    <div class="form-group" >
                        <label for="message">Vaša poruka *</label>
                            <textarea class="form-control" rows="8" id="comment" name="message"<?php echo isset ($fields['message'])? e($fields['message']):''?>></textarea>
                        <br>

                        <input type="submit" value="Send" class="form-control" class="btn btn-primary">
                    </div>
                    <p class="muted">* treba unjeti u polje</p>
                </form>
            </div>
        </div>
        <section id="Kontakt">

    <div class="container-fluid">

        <div class="row sigma-section-header">
            <div class="col-md-offset-2 col-lg-offset-3 col-lg-6 col-md-8 col-sm-12 text-center">
                <h1>Kontakt</h1>
                <p>Uvijek u potrazi za novim idejama i proizvodima možemo ponuditi čitavu lepezu izrade fotografija, Photo shootinge raznih vjenčanja, maturalnih zabava, djevojačkih tuluma. Mnoštvo individualnih poklona kao i usluge izrade Canvas platna. Lista je svakim danom duža. Provjerite i skoknite do nas u Tkalču ili nas nazovite na <b>01/4873 746</b></p>
            </div>
        </div>

    </body>
</html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>
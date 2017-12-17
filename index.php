<html>
<?php

require_once __DIR__ . '/vendor/autoload.php';

// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = '6LdISD0UAAAAAFUfApJZSRqBRuOcfiVdnT31234234';
$secret = '6LdISD0UAAAAAAkYRxJxMYahh70RCVcUn5675675';

// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = 'ru';

if (isset($_POST['g-recaptcha-response'])){
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
    if ($resp->isSuccess()):
        ?>
        <h2>Success!</h2>
        <p>That's it. Everything is working. Go integrate this into your real project.</p>
        <p><a href="/">Try again</a></p>
        <?php
    else:
        ?>
        <h2>Something went wrong</h2>
    <?php
    endif;
}
    ?>
  <body>
    <form action="" method="post">
        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
        <script type="text/javascript"
                src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
        </script>
        <br/>
        <input type="submit" value="submit" />
    </form>
  </body>
</html>

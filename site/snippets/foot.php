    <noscript>Please turn on JS to navigate this website</noscript>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <?= js([
        'assets/js/script.js',
        'assets/js/cart.js', ['defer' => true],
        '@auto', ['defer' => true],
    ]) ?>
</body>
</html>
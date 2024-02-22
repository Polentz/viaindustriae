<?php
Kirby::plugin('viaindustriae/blocks', [
    'blueprints' => [
        'blocks/contactblock' => __DIR__ . '/blueprints/blocks/contactblock.yml',
        'blocks/button' => __DIR__ . '/blueprints/blocks/button.yml',
        // 'blocks/platformblock' => __DIR__ . '/blueprints/blocks/platformblock.yml',
      ],
      'snippets' => [
        'blocks/contactblock' => __DIR__ . '/snippets/blocks/contactblock.php',
        'blocks/button' => __DIR__ . '/snippets/blocks/button.php',
        // 'blocks/platformblock' => __DIR__ . '/snippets/blocks/platformblock.php',
      ],
]);
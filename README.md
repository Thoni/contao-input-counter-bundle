# Contao Input Counter Bundle

This bundle offers character counting for backend fields for a better editing usability.

## Installation

Install via composer: `composer require heimrichhannot/contao-input-counter-bundle`

## Configuration

Configuration is easy as adding the following code to a `config.php`:

```
$GLOBALS['HUH_INPUT_COUNT'] = [
    [
        'table'  => 'tl_news', // the dca table name
        'fields' => [
            [
                'name' => 'headline', // the field's name
                'max'  => 50, // the maximum character count (if not set, the field's maxlength eval property is used if available)
                'skipColoring' => true // activate/deactivate coloring (default: false)
            ],
            // ...
        ]
    ],
    // ...
];
```

## Known limitations

- currently no support for tinyMCE due to the lack of having an event for *every* content change in tinyMCE (keyup, change, cut and paste work, but for style changes there's no event)
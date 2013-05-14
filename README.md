OhColorPickerTypeBundle
=======================

A very simple color picker for Symfony2 forms using [simplecolorpicker](https://github.com/tkrotoff/jquery-simplecolorpicker) by tkrotoff

Installation
------------

This bundle is compatible with Symfony 2.1. Add the following to your `composer.json`:

    "oh/color-picker-type-bundle": "dev-master"

In your repositories array in composer.json you need to add the javascript package

        "repositories" : [{
            "type": "package",
            "package": {
                "version": "master",
                "name": "tkrotoff/jquery-simplecolorpicker",
                "source": {
                    "url": "https://github.com/tkrotoff/jquery-simplecolorpicker.git",
                    "type": "git",
                    "reference": "master"
                }
            }
	}
	]

Register the bundle in your `app/AppKernel.php`:

```php
// app/AppKernel.php
public function registerBundles()
    {
        $bundles = array(
            new Oh\ColorPickerTypeBundle\ColorPickerTypeBundle(),
            // ...
```

You might need to change a couple of options if you are trying to use Symfony 2.0

If you want to automatically include the assets from the bundle, add OhColorPickerTypeBundle to assetic

    # app/config/config.yml
    # Assetic Configuration
    assetic:
        bundles:        [ 'OhColorPickerTypeBundle' ]


Usage
------------

This bundle contains a new FormType called ColorPickerType which can be used in your forms like so:

    use Oh\ColorPickerTypeBundle\Form\Type\ColorPickerType;
    [...]
    $builder->add('color', new ColorPickerType());

On your model you can add the validation classes

    // Your model eg, src/My/Colors/Entity/MyColor.php
    use Symfony\Component\Validator\Constraints as Assert;
    use Oh\ColorPickerTypeBundle\Validator\Constraints as OhAssertColor;

    class MyColor
    {

        /**
         * @ORM\Column(type="string", length=6, nullable=true)
         * @Assert\NotBlank()
         * @OhAssertColor\HexColor(groups={"colours"})
         */
        public $color;

    }

Include the twig template for the layout. 

    # your config.yml
    twig:
        form:
            resources:
                # This uses the default - you can put your own one here
                - 'OhColorPickerTypeBundle:Form:fields.html.twig'

    # or in your twig template
    {% form_theme my_form 'OhColorPickerTypeBundle:Form:_event.html.twig' %}

Options
-------

There are a number of options, mostly self-explanatory. It's recommended that you include the javascript and css with the rest of your libraries, but if you want a quick test you can include them with the form field using the include_* options below (you will have to add the bundle to the assetic.bundles array in your config - see above).

    array(
            'include_jquery'    => false, // include jquery from google cdn
            'include_js'        => false, // include the javascript
            'include_js_constructor'=>true, // include the constructor for each field
            'include_css'       => false, // include the css
            'picker'            => false // an openable picker rather than an expanded selection
	)

Screenshots
-------

[Default form](https://www.dropbox.com/s/e56djqezfuutlzi/colorpicker.png)

Known problems
-------

Because the form type template includes javascript, there's not yet a way to bunch it all together at the very bottom of the page, so it is included at the bottom of the field. This means that jquery and the javascript plugin needs to be included before the field. I'm not sure of a way around this, but I think it's going to be addressed in a later version of the form framework.

Credits
-------

* Ollie Harridge (ollietb) as main author.
* Tanguy Krotoff (tkrotoff) for the jQuery plugin

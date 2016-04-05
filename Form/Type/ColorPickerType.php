<?php

namespace Oh\ColorPickerTypeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorPickerType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $choices = array(
            '#ffffff' =>'White',
            '#cccccc' =>'Light Grey',
            '#777777' =>'Grey',
            '#333333' =>'Dark Grey',
            '#000000' =>'Black',
            '#2f4096' =>'Dark Blue',
            '#0082be' =>'Light Blue',
            '#32c4ec' =>'Aqua',
            '#00944f' =>'Dark Green',
            '#39af4c' =>'Light Green',
            '#b2ce40' =>'Greenish',
            '#6c2c8e' =>'Dark Purple',
            '#913990' =>'Purple',
            '#b989ba' =>'Lilac',
            '#F934C5' =>'Dark Pink',
            '#f3aebc' =>'Light Pink',
            '#e81e25' =>'Red',
            '#ed7043' =>'Peach',
            '#f39f2b' =>'Orange',
            '#ecba4b' =>'Light Orange',
            '#fce92d' =>'Yellow',
            '#f9eea9' =>'Cream',

//      Alternative Color Palette
//            "#ffffff" => 'White',
//            "#000000" => 'Black',
//            "#333333" => 'Dary Gray',
//            "#7bd148" => 'Green',
//            "#5484ed" => 'Bold blue',
//            "#a4bdfc" => 'Blue',
//            "#46d6db" => 'Turquoise',
//            "#7ae7bf" => 'Light green',
//            "#51b749" => 'Bold green',
//            "#fbd75b" => 'Yellow',
//            "#ffb878" => 'Orange',
//            "#ff887c" => 'Red',
//            "#F934C5" => 'Pink',
//            "#dc2127" => 'Bold red',
//            "#dbadff" => 'Purple',
//            "#e1e1e1" => 'Gray'
        );

        $resolver->setDefaults(array(
            'multiple'          => false,
            'expanded'          => false,
            'choices'           => $choices,
            'labels'            => $choices,
            'choices_as_values' => false,
            'include_jquery'    => false,
            'include_js'        => false,
            'include_js_constructor'=>true,
            'include_css'       => false,
            'picker'            => false,
        ));

    }
    
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
        
        $view->vars['include_jquery'] = $options['include_jquery'];
        $view->vars['include_js'] = $options['include_js'];
        $view->vars['include_js_constructor'] = $options['include_js_constructor'];
        $view->vars['include_css'] = $options['include_css'];
        $view->vars['picker'] = $options['picker'];
        
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'oh_colorpicker';
    }

    public function getParent()
    {
        return ChoiceType::class;
    }


}
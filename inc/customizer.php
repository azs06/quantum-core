<?php
/**
 * Quantum-core Theme Customizer
 *
 * @package Quantum-core
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function quantum_core_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'quantum_footer_settings' , array(
    'title'      => __( 'Footer Settings', 'quantum_core' ),
    'priority'   => 150,
) );

	/**
 * Adds textarea support to the theme customizer
 */
class Quantum_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}

$wp_customize->add_setting( 'quantum_footer_text', array('default' => 'Footer Text',) );
 
$wp_customize->add_control(
    new Quantum_Textarea_Control(
        $wp_customize,
        'quantum_footer_text',
        array(
            'label' => 'Footer Text',
            'section' => 'quantum_footer_settings',
            'settings' => 'quantum_footer_text',
            'sanitize_callback' => 'esc_textarea'
        )
    )
);

}
add_action( 'customize_register', 'quantum_core_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function quantum_core_customize_preview_js() {
	wp_enqueue_script( 'quantum_core_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'quantum_core_customize_preview_js' );

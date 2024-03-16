<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Element_Subscription_Form extends \Bricks\Element {
    
    // Element properties
    public $category = 'general';
    public $name = 'subscription-form';
    public $icon = 'ti-email';
    public $css_selector = '.subscription-form';

    // Return localized element label
    public function get_label() {
        return esc_html__('Sendy Form', 'bricks');
    }

    public function set_control_groups() {
        $this->control_groups['email'] = [
            'title' => esc_html__('Email', 'bricks'),
            'tab' => 'content',
        ];

        $this->control_groups['name'] = [
            'title' => esc_html__('Name', 'bricks'),
            'tab' => 'content',
        ];

        $this->control_groups['phone'] = [
            'title' => esc_html__('Phone', 'bricks'),
            'tab' => 'content',
        ];

        $this->control_groups['button'] = [
            'title' => esc_html__('Button', 'bricks'),
            'tab' => 'content',
        ];

        $this->control_groups['consent'] = [
            'title' => esc_html__('Consent', 'bricks'),
            'tab' => 'content',
        ];
    }

    // Set builder controls
    public function set_controls() {
        // CSS Label
        $this->controls['_cssCustom'] = [
            'tab' => 'style',
            'group' => '_css',
            'label' => esc_html__('Custom Form CSS', 'bricks'),
            'type' => 'code',
            'default' => file_get_contents(__DIR__ . '/sendy-form.css'),
            'placeholder' => 'Your custom css code',
        ];

        // List ID
        $this->controls['list_id'] = [
            'tab' => 'content',
            'label' => esc_html__('List ID', 'bricks'),
            'type' => 'text',
            'placeholder' => 'This is the ID of the Sendy list this form will subscribe the user to',
        ];

        // Form Action URL
        $this->controls['form_action_url'] = [
            'tab' => 'content',
            'label' => esc_html__('Form Action URL', 'bricks'),
            'type' => 'text',
            'placeholder' => 'This is the subscribe link of your Sendy: [install_url/subscribe]',
        ];
      
       // Form Class
       $this->controls['custom_form_class'] = [
    'tab' => 'content',
    'label' => esc_html__('Custom Form Class', 'bricks'),
    'type' => 'text',
    'placeholder' => 'Enter custom class name here',
];

        $this->controls['hide_labels'] = [
            'tab' => 'content',
            'label' => esc_html__('Hide Labels', 'bricks'),
            'type' => 'checkbox',
            'default' => false,
        ];

        // Email Label
        $this->controls['email_label'] = [
            'tab' => 'content',
            'group' => 'email',
            'label' => esc_html__('Email Label', 'bricks'),
            'type' => 'text',
            'default' => 'Email',
            'placeholder' => 'The label text for your email address field',
        ];

        // Email Field Placeholder
        $this->controls['email_placeholder'] = [
            'tab' => 'content',
            'group' => 'email',
            'label' => esc_html__('Email Placeholder', 'bricks'),
            'type' => 'text',
            'default' => 'Your email here...',
            'placeholder' => 'The placeholder text for the email address field',
        ];

        // Name Label
        $this->controls['name_label'] = [
            'tab' => 'content',
            'group' => 'name',
            'label' => esc_html__('Name Label', 'bricks'),
            'type' => 'text',
            'placeholder' => 'The label text for your name field',
            'default' => 'Name',
        ];

        // Name Field Placeholder
        $this->controls['name_placeholder'] = [
            'tab' => 'content',
            'group' => 'name',
            'label' => esc_html__('Name Placeholder', 'bricks'),
            'type' => 'text',
            'default' => 'Your name here...',
            'placeholder' => 'The placeholder text for the name field',
        ];

        $this->controls['name_field_type'] = [
            'tab' => 'content',
            'group' => 'name',
            'label' => esc_html__('Name Field Type', 'bricks'),
            'type' => 'select',
            'options' => [
                'text' => esc_html__('Text', 'bricks'),
                'hidden' => esc_html__('Hidden', 'bricks'),
            ],
            'default' => 'text',
        ];

        // Phone Field Label
        $this->controls['phone_label'] = [
            'tab' => 'content',
            'group' => 'phone',
            'label' => esc_html__('Phone Label', 'bricks'),
            'type' => 'text',
            'placeholder' => 'The label text for your phone number field',
            'default' => 'Phone',
        ];

        $this->controls['phone_placeholder'] = [
            'tab' => 'content',
            'group' => 'phone',
            'label' => esc_html__('Phone Placeholder', 'bricks'),
            'type' => 'text',
            'default' => 'Your phone here...',
            'placeholder' => 'The placeholder text for the phone number field',
        ];

        // Phone Field Type (Text or Hidden)
        $this->controls['phone_field_type'] = [
            'tab' => 'content',
            'group' => 'phone',
            'label' => esc_html__('Phone Field Type', 'bricks'),
            'type' => 'select',
            'options' => [
                'tel' => esc_html__('Tel', 'bricks'),
                'hidden' => esc_html__('Hidden', 'bricks'),
            ],
            'default' => 'hidden',
        ];

        // Submit Button Value
        $this->controls['submit_value'] = [
            'tab' => 'content',
            'group' => 'button',
            'label' => esc_html__('Submit Button Text', 'bricks'),
            'type' => 'text',
            'default' => 'Send',
            'placeholder' => 'The text for the submit button of the form',
        ];  
        $this->controls['button_style'] = [
            'tab' => 'content',
            'group' => 'button',
            'label' => esc_html__('Button Style', 'bricks'),
            'type' => 'select',
            'options' => [
                'bricks-background-primary' => esc_html__('Primary', 'bricks'),
                'bricks-background-secondary' => esc_html__('Secondary', 'bricks'),
                'bricks-background-light' => esc_html__('Light', 'bricks'),
                'bricks-background-dark' => esc_html__('Dark', 'bricks'),
                'bricks-background-muted' => esc_html__('Muted', 'bricks'),
                'bricks-background-info' => esc_html__('Info', 'bricks'),
                'bricks-background-success' => esc_html__('Success', 'bricks'),
                'bricks-background-warning' => esc_html__('Warning', 'bricks'),
                'bricks-background-danger' => esc_html__('Danger', 'bricks'),
            ],
            'default'   => 'None',
        ];

        $this->controls['button_size'] = [
            'tab' => 'content',
            'group' => 'button',
            'label' => esc_html__('Button Size', 'bricks'),
            'type' => 'select',
            'options' => [
                'sm' => esc_html__('Small', 'bricks'),
                'md' => esc_html__('Medium', 'bricks'),
                'lg' => esc_html__('Large', 'bricks'),
                'xl' => esc_html__('Extra Large', 'bricks'),
            ],
            'default'   => 'Medium',
        ];

        $this->controls['gdpr_consent_text'] = [
            'tab' => 'content',
            'group' => 'consent',
            'label' => esc_html__('GDPR Consent Text', 'bricks'),
            'type' => 'textarea',
            'placeholder' => 'This text will appear after your GDPR, Cookie Consent or Privacy Policy consent checkbox',
            'default'   => 'I agree to the {site_title} Privacy Policy',
        ];

        // GDPR Field Type (Checkbox or Hidden)
        $this->controls['gdpr_field_type'] = [
            'tab' => 'content',
            'group' => 'consent',
            'label' => esc_html__('GDPR Field Type', 'bricks'),
            'type' => 'select',
            'options' => [
                'checkbox' => esc_html__('Checkbox', 'bricks'),
                'hidden' => esc_html__('Hidden', 'bricks'),
            ],
            'default' => 'checkbox',
        ];
        
        $this->controls['message'] = [
            'tab' => 'content',
            'label' => '<br>Brought to you with ❤️ by Celemont, GitHub Repo <u><a href="https://github.com/theserban/bricks-builder-sendy-form" target="_blank">here</a></u>',
        ];
    }

    // Enqueue element styles and scripts (optional for this simple example)
    public function enqueue_scripts() {}

    private function ensureHttps($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "https://" . ltrim($url, '/');
        }
        return $url;
    }

    // Hypothetical method where you have access to modify existing control settings
    public function initialize_or_update_controls() {
        // Path to the CSS file relative to this PHP file
        $cssPath = plugin_dir_path(__FILE__) . 'sendy-form.css';
        // Read the CSS content from the file
        $cssContent = file_get_contents($cssPath);

        if ($cssContent !== false) {
            // Assuming there's a way to access and modify an existing control's default value
            // This is a placeholder and needs to be replaced with the actual way controls are modified in your application
            if (isset($this->controls['_cssCustom'])) {
                $this->controls['_cssCustom']['default'] = $cssContent;
            } else {
                // If the _cssCustom control does not exist, it might be created or handled differently
                // Handle this scenario appropriately based on your application's structure
            }
        }
    }

    public function render() {
    $post_title = get_the_title();
    $site_title = get_bloginfo('name');
    $list_id = !empty($this->settings['list_id']) ? $this->settings['list_id'] : '';
    $submit_value = !empty($this->settings['submit_value']) ? $this->settings['submit_value'] : 'Send';
    $email_placeholder = !empty($this->settings['email_placeholder']) ? $this->settings['email_placeholder'] : 'Email goes here...';
    $name_placeholder = !empty($this->settings['name_placeholder']) ? $this->settings['name_placeholder'] : 'Your name here...';
    $email_label = !empty($this->settings['email_label']) ? $this->settings['email_label'] : 'Email';
    $name_label = !empty($this->settings['name_label']) ? $this->settings['name_label'] : 'Name';
    $name_field_type = !empty($this->settings['name_field_type']) ? $this->settings['name_field_type'] : 'text';
    $phone_placeholder = !empty($this->settings['phone_placeholder']) ? $this->settings['phone_placeholder'] : 'Your phone here...';
    $phone_label = !empty($this->settings['phone_label']) ? $this->settings['phone_label'] : 'Phone';
    $phone_field_type = !empty($this->settings['phone_field_type']) ? $this->settings['phone_field_type'] : 'hidden';
    $gdpr_field_type = !empty($this->settings['gdpr_field_type']) ? $this->settings['gdpr_field_type'] : 'checkbox';
    $gdpr_consent_text = !empty($this->settings['gdpr_consent_text']) ? $this->settings['gdpr_consent_text'] : "I agree to the " . esc_html($site_title) . " Privacy Policy";
    $hide_labels = !empty($this->settings['hide_labels']) ? $this->settings['hide_labels'] : false;

    $email_label_style = $hide_labels ? 'style="display: none;"' : '';
    $name_label_style = ($hide_labels || $name_field_type === 'hidden') ? 'style="display: none;"' : '';
    $phone_label_style = ($hide_labels || $phone_field_type === 'hidden') ? 'style="display: none;"' : '';
    
    // New logic to hide divs based on field type
    $name_div_style = $name_field_type === 'hidden' ? 'style="display: none;"' : '';
    $phone_div_style = $phone_field_type === 'hidden' ? 'style="display: none;"' : '';

    $button_style = !empty($this->settings['button_style']) ? $this->settings['button_style'] : '';
    $button_size = !empty($this->settings['button_size']) ? $this->settings['button_size'] : '';
    $button_class = "bricks-button " . esc_attr($button_style) . " " . esc_attr($button_size);
    $custom_form_class = !empty($this->settings['custom_form_class']) ? $this->settings['custom_form_class'] : '';

    if ($gdpr_field_type === 'checkbox') {
        $gdpr_consent_field = "<label><input type=\"checkbox\" name=\"gdpr\" id=\"gdpr\" required /><span>{$gdpr_consent_text}</span></label>";
    } else {
        $gdpr_consent_field = "<input type=\"hidden\" name=\"gdpr\" id=\"gdpr\" value=\"1\" />";
    }

    $form_action_url_raw = !empty($this->settings['form_action_url']) ? $this->settings['form_action_url'] : '';
    $form_action_url = $this->ensureHttps($form_action_url_raw);

    $form = "<form class=\"subscription-form {$custom_form_class}\" action=\"{$form_action_url}\" method=\"POST\" accept-charset=\"utf-8\">
        <div class=\"email\">
        <label for=\"email\" {$email_label_style}>{$email_label}</label>
        <input type=\"email\" placeholder=\"{$email_placeholder}\" name=\"email\" id=\"email\" pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\" required/>
        </div>
        <div class=\"name\" {$name_div_style}>    
            <label for=\"name\" {$name_label_style}>{$name_label}</label>
            <input type=\"{$name_field_type}\" placeholder=\"{$name_placeholder}\" name=\"name\" id=\"name\" " . ($name_field_type === 'text' ? 'required' : '') . "/>
        </div>
        <div class=\"phone\" {$phone_div_style}>
            <label for=\"phone\" {$phone_label_style}>{$phone_label}</label>
            <input type=\"{$phone_field_type}\" placeholder=\"{$phone_placeholder}\" name=\"phone\" id=\"phone\" pattern=\"[0-9]+\" required />
        </div> 
        <div style=\"display:none;\">
        <input type=\"hidden\" name=\"Source\" id=\"Source\" value=\"" . esc_attr($post_title) . "\"/>
            <label for=\"hp\">HP</label><br/>
            <input type=\"text\" name=\"hp\" id=\"hp\"/>
        </div>
        <input type=\"hidden\" name=\"list\" value=\"" . esc_attr($list_id) . "\"/>
        <input type=\"hidden\" name=\"subform\" value=\"yes\"/>
        {$gdpr_consent_field}
         <button type=\"submit\" name=\"submit\" id=\"submit\" class=\"{$button_class}\">{$submit_value}</button>
    </form>";

    echo $form;
    }
  }

add_action('init', function () {
    if (class_exists('\Bricks\Elements')) {
        \Bricks\Elements::register_element(
            __DIR__ . '/sendy-form.php',
            'subscription-form',
            'Element_Subscription_Form'
        );
    }
}, 11);

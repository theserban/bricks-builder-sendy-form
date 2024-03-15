<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class Prefix_Element_Subscription_Form extends \Bricks\Element {
    // Element properties
    public $category     = 'general';
    public $name         = 'prefix-subscription-form';
    public $icon         = 'ti-email';
    public $css_selector = '.prefix-subscription-form-wrapper';

    // Return localized element label
    public function get_label() {
        return esc_html__('Sendy Form', 'bricks');
    }

    public function set_control_groups() {
        $this->control_groups['name'] = [
            'title' => esc_html__('Name', 'bricks'),
            'tab'   => 'content',
        ];

        $this->control_groups['phone'] = [
            'title' => esc_html__('Phone', 'bricks'),
            'tab'   => 'content',
        ];

        $this->control_groups['email'] = [
            'title' => esc_html__('Email', 'bricks'),
            'tab'   => 'content',
        ];

        $this->control_groups['button'] = [
            'title' => esc_html__('Button', 'bricks'),
            'tab'   => 'content',
        ];

        $this->control_groups['consent'] = [
            'title' => esc_html__('Consent', 'bricks'),
            'tab'   => 'content',
        ];
    }

    // Set builder controls
    public function set_controls() {
        // List ID
        $this->controls['list_id'] = [
            'tab'         => 'content',
            'label'       => esc_html__('List ID', 'bricks'),
            'type'        => 'text',
            'placeholder' => 'This is the ID of the Sendy list this form will subscribe the user to',
        ];

        // Form Action URL
        $this->controls['form_action_url'] = [
            'tab'         => 'content',
            'label'       => esc_html__('Form Action URL', 'bricks'),
            'type'        => 'text',
            'placeholder' => 'This is the subscribe link of your Sendy install',
        ];

        // Email Label
        $this->controls['email_label'] = [
            'tab'         => 'content',
            'group'       => 'email',
            'label'       => esc_html__('Email Label', 'bricks'),
            'type'        => 'text',
            'default'     => 'Email',
            'placeholder' => 'The label text for your email address field',
        ];

        // Email Field Placeholder
        $this->controls['email_placeholder'] = [
            'tab'         => 'content',
            'group'       => 'email',
            'label'       => esc_html__('Email Placeholder', 'bricks'),
            'type'        => 'text',
            'default'     => 'Email goes here...',
            'placeholder' => 'The placeholder text for the email address field',
        ];

        // Name Label
        $this->controls['name_label'] = [
            'tab'         => 'content',
            'group'       => 'name',
            'label'       => esc_html__('Name Label', 'bricks'),
            'type'        => 'text',
            'placeholder' => 'The label text for your name field',
        ];

        // Name Field Placeholder
        $this->controls['name_placeholder'] = [
            'tab'         => 'content',
            'group'       => 'name',
            'label'       => esc_html__('Name Placeholder', 'bricks'),
            'type'        => 'text',
            'default'     => 'Your name here...',
            'placeholder' => 'The placeholder text for the name field',
        ];

        $this->controls['name_field_type'] = [
            'tab'     => 'content',
            'group'   => 'name',
            'label'   => esc_html__('Name Field Type', 'bricks'),
            'type'    => 'select',
            'options' => [
                'text'   => esc_html__('Text', 'bricks'),
                'hidden' => esc_html__('Hidden', 'bricks'),
            ],
            'default' => 'text',
        ];

        // Phone Field Label
        $this->controls['phone_label'] = [
            'tab'         => 'content',
            'group'       => 'phone',
            'label'       => esc_html__('Phone Label', 'bricks'),
            'type'        => 'text',
            'placeholder' => 'The label text for your phone number field',
        ];

        $this->controls['phone_placeholder'] = [
            'tab'         => 'content',
            'group'       => 'phone',
            'label'       => esc_html__('Phone Placeholder', 'bricks'),
            'type'        => 'text',
            'default'     => 'Your phone number here...',
            'placeholder' => 'The placeholder text for the phone number field',
        ];

        // Phone Field Type (Text or Hidden)
        $this->controls['phone_field_type'] = [
            'tab'     => 'content',
            'group'   => 'phone',
            'label'   => esc_html__('Phone Field Type', 'bricks'),
            'type'    => 'select',
            'options' => [
                'text'   => esc_html__('Text', 'bricks'),
                'hidden' => esc_html__('Hidden', 'bricks'),
            ],
            'default' => 'text',
        ];

        // Submit Button Value
        $this->controls['submit_value'] = [
            'tab'         => 'content',
            'group'       => 'button',
            'label'       => esc_html__('Submit Button Text', 'bricks'),
            'type'        => 'text',
            'default'     => 'Send',
            'placeholder' => 'The text for the submit button of the form',
        ];

        $this->controls['gdpr_consent_text'] = [
            'tab'         => 'content',
            'group'       => 'consent',
            'label'       => esc_html__('GDPR Consent Text', 'bricks'),
            'type'        => 'textarea',
            'placeholder' => 'This text will appear after your GDPR, Cookie Consent or Privacy Policy consent checkbox',
        ];

        // GDPR Field Type (Checkbox or Hidden)
        $this->controls['gdpr_field_type'] = [
            'tab'     => 'content',
            'group'   => 'consent',
            'label'   => esc_html__('GDPR Field Type', 'bricks'),
            'type'    => 'select',
            'options' => [
                'checkbox' => esc_html__('Checkbox', 'bricks'),
                'hidden'   => esc_html__('Hidden', 'bricks'),
            ],
            'default' => 'checkbox',
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

    // Render element HTML
    public function render() {
        $post_title = get_the_title();
        $site_title = get_bloginfo('name');
        $list_id = !empty($this->settings['list_id']) ? $this->settings['list_id'] : '';
        $submit_value = !empty($this->settings['submit_value']) ? $this->settings['submit_value'] : 'Send';
        $email_placeholder = !empty($this->settings['email_placeholder']) ? $this->settings['email_placeholder'] : 'Email goes here...';
        $name_placeholder = !empty($this->settings['name_placeholder']) ? $this->settings['name_placeholder'] : 'Your name here...';
        $email_label = !empty($this->settings['email_label']) ? $this->settings['email_label'] : '';
        $name_label = !empty($this->settings['name_label']) ? $this->settings['name_label'] : '';
        $name_field_type = !empty($this->settings['name_field_type']) ? $this->settings['name_field_type'] : 'text';
        $name_label_visibility = $name_field_type === 'text' ? '' : 'style="display: none;"';
        $source_name = !empty($this->settings['source_name']) ? $this->settings['source_name'] : 'Source';
        $phone_placeholder = !empty($this->settings['phone_placeholder']) ? $this->settings['phone_placeholder'] : 'Your phone here...';
        $phone_label = !empty($this->settings['phone_label']) ? $this->settings['phone_label'] : '';
        $phone_field_type = !empty($this->settings['phone_field_type']) ? $this->settings['phone_field_type'] : 'text';
        $phone_label_visibility = $phone_field_type === 'text' ? '' : 'style="display: none;"';
        $gdpr_field_type = !empty($this->settings['gdpr_field_type']) ? $this->settings['gdpr_field_type'] : 'checkbox';
        $gdpr_label_visibility = $gdpr_field_type === 'text' ? '' : 'style="display: none;"';
        $gdpr_consent_text = !empty($this->settings['gdpr_consent_text']) ? $this->settings['gdpr_consent_text'] : "I agree to the " . esc_html($site_title) . " Privacy Policy";

        if ($gdpr_field_type === 'checkbox') {
            $gdpr_consent_field = "<label><input type=\"checkbox\" name=\"gdpr\" id=\"gdpr\" required /><span>{$gdpr_consent_text}</span></label>";
        } else {
            // For hidden field, render without the consent text
            $gdpr_consent_field = "<input type=\"hidden\" name=\"gdpr\" id=\"gdpr\" value=\"1\" />";
        }

        // Ensure form_action_url starts with https://
        $form_action_url_raw = !empty($this->settings['form_action_url']) ? $this->settings['form_action_url'] : '';
        $form_action_url = $this->ensureHttps($form_action_url_raw);

        // Adjusted form HTML to use variable type for the name field and conditional label visibility
        $form = "<form class=\"subscription-form\" action=\"{$form_action_url}\" method=\"POST\" accept-charset=\"utf-8\">
            <label for=\"email\">{$email_label}</label>
            <input type=\"email\" placeholder=\"{$email_placeholder}\" name=\"email\" id=\"email\" required/>
            <label for=\"name\" {$name_label_visibility}>{$name_label}</label>
            <input type=\"{$name_field_type}\" placeholder=\"{$name_placeholder}\" name=\"name\" id=\"name\" " . ($name_field_type === 'text' ? 'required' : '') . "/>
            <label for=\"phone\" {$phone_label_visibility}>{$phone_label}</label>
            <input type=\"{$phone_field_type}\" placeholder=\"{$phone_placeholder}\" name=\"phone\" id=\"phone\" " . ($phone_field_type === 'text' ? 'required' : '') . " />
            <input type=\"hidden\" name=\"Source\" id=\"Source\" value=\"" . esc_attr($post_title) . "\"/>
            <div style=\"display:none;\">
                <label for=\"hp\">HP</label><br/>
                <input type=\"text\" name=\"hp\" id=\"hp\"/>
            </div>
            <input type=\"hidden\" name=\"list\" value=\"" . esc_attr($list_id) . "\"/>
            <input type=\"hidden\" name=\"subform\" value=\"yes\"/>
            {$gdpr_consent_field}
            <button type=\"submit\" name=\"submit\" id=\"submit\" class=\"bricks-button\">{$submit_value}</button>
        </form>";

        // Render element HTML
        echo $form;
    }
}

// Register the custom element
add_action('init', function() {
    if (class_exists('\Bricks\Elements')) {
        \Bricks\Elements::register_element(
            __DIR__ . '/element-subscription-form.php',
            'prefix-subscription-form',
            'Prefix_Element_Subscription_Form'
        );
    }
}, 11);

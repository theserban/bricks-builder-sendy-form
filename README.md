To smoothly blend Sendy with Bricks Builder without leaning on third-party plugins, let's walk through these friendly steps together:

1.First up, let's weave a little magic into your theme's functions.php file. You'll want to add a special code snippet:
```
/**
 * Register custom element
 */

add_action( 'init', function() {
  $element_files = [
    __DIR__ . '/elements/sendy-form.php',
  ];

  foreach ( $element_files as $file ) {
    \Bricks\Elements::register_element( $file );
  }
}, 11 );
```
2.Now, grab the sendy-form.php & sendy-form.css files and cozy them into the elements folder within your child theme's directory. 

<img width="354" alt="Screenshot 2024-03-15 at 23 57 01" src="https://github.com/theserban/bricks-builder-sendy-form/assets/134176220/8bf4430f-2a53-48ee-aab3-0d79e0c66eb5">

3.Now we're going to pop into Sendy and set up a few custom fields. Click on the "Custom Fields" button to get started. Here’s what we’re planting:

- Source: This little field will help you keep track of where your lovely subscribers come from (Optional).
- Phone: Gathering phone numbers gives you a direct line to chat with your subscribers (Optional).

<img width="875" alt="Screenshot 2024-03-15 at 23 58 58" src="https://github.com/theserban/bricks-builder-sendy-form/assets/134176220/99148447-421b-4d8c-95eb-e787e3b9f37d">

4.And of course, we want to stay friends with everyone by respecting their privacy choices and selecting the gdpr checkbox from "Subscribe Form" (Optional).

5.After setting everything up, head back to Bricks and search for the "Sendy Form" in your builder. Then, snag your list ID from Sendy and finalize your subscription URL, typically in the format [installation_url]/subscribe.

<img width="460" alt="Screenshot 2024-03-16 at 00 03 08" src="https://github.com/theserban/bricks-builder-sendy-form/assets/134176220/df26a58f-a2e2-474d-aaa6-95c1578e24f3">

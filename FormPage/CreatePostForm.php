<?php

namespace SimpliWP\FormPage;

class CreatePostForm {

    public function __construct() {
        add_shortcode('create_custom_post_form', [$this, 'render_form']);
    }

    public function render_form() {
        ob_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ccpf_nonce']) && wp_verify_nonce($_POST['ccpf_nonce'], 'create_post_nonce')) {
            $title = sanitize_text_field($_POST['post_title']);
            $content = sanitize_textarea_field($_POST['post_content']);
            $meta = sanitize_text_field($_POST['post_meta']);

            $post_id = wp_insert_post([
                'post_title'   => $title,
                'post_content' => $content,
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ]);

            if (!is_wp_error($post_id)) {
                update_post_meta($post_id, 'mymeta', $meta);
                echo "<p style='color:green;'>✅ Article créé avec succès !</p>";
            } else {
                echo "<p style='color:red;'>❌ Erreur lors de la création de l'article.</p>";
            }
        }

        ?>
        <h2>Mon formulaire pour créer un post et ses metadata</h2>
        <form method="post">
            <?php wp_nonce_field('create_post_nonce', 'ccpf_nonce'); ?>
            <p>
                <label>Post name<br>
                <input type="text" name="post_title" required></label>
            </p>
            <p>
                <label>Post content<br>
                <textarea name="post_content" required></textarea></label>
            </p>
            <p>
                <label>Metadata : mymeta<br>
                <input type="text" name="post_meta" required></label>
            </p>
            <p><button type="submit">Submit</button></p>
        </form>
        <?php

        return ob_get_clean();
    }
}

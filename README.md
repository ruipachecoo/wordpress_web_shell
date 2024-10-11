# WordPress Web Shell

WordPress Web Shell is a hidden WordPress plugin designed for pentesters and system administrators. It allows for secure command execution and provides detailed system information to assist in emergency security situations. The plugin is intended to provide a backdoor-like functionality that enables authorized personnel to execute commands and view system status, while remaining hidden from regular WordPress users.

## How the Plugin Works

This plugin adds a secret entry point to your WordPress installation. It does not create any visible items in the WordPress admin interface. Instead, it can only be accessed by navigating to a specific URL with the correct parameters, including a password. When the correct conditions are met, the plugin interface is displayed, allowing authorized users to execute system-level commands and view vital system information.

### Key Features
- **Hidden Interface**: The plugin is not listed in the WordPress admin menu and can only be accessed by those with the correct URL and password.
- **Command Execution**: Shell commands can be executed directly from the WordPress admin panel, providing flexibility for maintenance, diagnostics, or emergencies.
- **System Information**: Displays useful system details such as PHP version, WordPress version, server information, and current user.
- **Secure Access**: Protected by a simple password mechanism, ensuring that only authorized users can use the functionality.

## Installation

1. **Download the Plugin**
   - Save the file as `wp-emergency-security-update.php`.

2. **Upload the Plugin**
   - Navigate to the `/wp-content/plugins/` directory of your WordPress installation.
   - Upload the PHP file into this directory.

3. **Activate the Plugin**
   - Log in to your WordPress admin dashboard.
   - Go to **Plugins** > **Installed Plugins**.
   - Find **WP Emergency Security Update** and click **Activate**.

## Usage Instructions

### Accessing the Plugin
- **URL Access**: The plugin can be accessed using a special URL:
  ```
  http://your-wordpress-site.com/wp-admin/admin.php?page=wp-emergency-security-update&pass=secure_password
  ```
- **Replace** `your-wordpress-site.com` with your site's domain and `secure_password` with the password you have set in the source code.

### Command Execution
- **Command Form**: Enter any shell command you need to execute in the **Command Execution** input box.
- **Run Command**: Click **Run Command** to execute the entered command.
- **Command Output**: The output (or any errors) from the command will be displayed in the **Command Output** section below the form.

### System Information
- The plugin also displays the following system details:
  - **System Time**: The current date and time on the server.
  - **PHP Version**: The version of PHP running on the server.
  - **WordPress Version**: The installed WordPress version.
  - **Server Software**: The web server software (e.g., Apache).
  - **User Agent**: The user agent string of the current request.
  - **Current User**: The username of the logged-in WordPress admin.

## Security Considerations

- **Password Protection**: The plugin is protected by a password set directly in the PHP code. Make sure to use a strong and unique password to prevent unauthorized access.
- **Command Execution Risks**: Executing shell commands on the server is powerful but risky. Use caution when running commands, as improper use can damage your server or compromise security.
- **Restricted Access**: The plugin uses `current_user_can('manage_options')` to ensure only authorized admins can access the functionality.

## Disclaimer

This plugin is intended for use by **pentesters** and **system administrators** with explicit permission. It is designed for educational purposes and emergency security updates only. Misuse of this plugin could lead to serious security risks and is not recommended for production environments without proper safeguards.

If you encounter issues or have questions about the plugin, please feel free to contribute or open an issue in the repository.

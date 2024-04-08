<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>
<h1 class="mepr_page_header"><?php echo esc_html_x( 'Change Password', 'ui', 'memberpress' ); ?></h1>


<div class="mepr-profile-wrapper">
    <div class="mepr-profile-wrapper__footer">
        <a class="mepr-button btn-outline btn btn-outline" href="http://localhost:8080/account/?action=subscriptions">TWW+ Membership</a>
        <a class="mepr-button btn-outline btn btn-outline" href="http://localhost:8080/account/?action=newpassword">Change Password</a>
    </div>

    <div class="mepro-login-contents">
        <form action="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>" class="mepr-newpassword-form mepr-form" method="post" novalidate>
        <input type="hidden" name="plugin" value="mepr" />
        <input type="hidden" name="action" value="updatepassword" />
        <?php wp_nonce_field( 'update_password', 'mepr_account_nonce' ); ?>

        <div class="mp-form-row mepr_new_password">
            <label for="mepr-new-password"><?php _ex('New Password', 'ui', 'memberpress'); ?></label>
            <div class="mp-hide-pw">
            <input type="password" name="mepr-new-password" id="mepr-new-password" class="mepr-form-input mepr-new-password" required />
            <button type="button" class="button mp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Show password', 'memberpress' ); ?>">
                <span class="dashicons dashicons-visibility" aria-hidden="true"></span>
            </button>
            </div>
        </div>
        <div class="mp-form-row mepr_confirm_password">
            <label for="mepr-confirm-password"><?php _ex('Confirm New Password', 'ui', 'memberpress'); ?></label>
            <div class="mp-hide-pw">
            <input type="password" name="mepr-confirm-password" id="mepr-confirm-password" class="mepr-form-input mepr-new-password-confirm" required />
            <button type="button" class="button mp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Show password', 'memberpress' ); ?>">
                <span class="dashicons dashicons-visibility" aria-hidden="true"></span>
            </button>
            </div>
        </div>
        <?php MeprHooks::do_action('mepr-account-after-password-fields', $mepr_current_user); ?>

        <div class="mepr_spacer">&nbsp;</div>

        <input type="submit" name="new-password-submit" value="<?php _ex('Update Password', 'ui', 'memberpress'); ?>" class="tww-button-primary" />
        <div class="or-cancel">
            <?php _ex('or', 'ui', 'memberpress'); ?><span>&nbsp;</span>
            <a href="<?php echo esc_url($mepr_options->account_page_url()); ?>"><?php _ex('Cancel', 'ui', 'memberpress'); ?></a>
        </div>
        <img src="<?php echo admin_url('images/loading.gif'); ?>" alt="<?php _e('Loading...', 'memberpress'); ?>" style="display: none;" class="mepr-loading-gif" />
        <?php MeprView::render('/shared/has_errors', get_defined_vars()); ?>
        </form>

        <?php MeprView::render('/readylaunch/shared/errors', get_defined_vars()); ?>
    </div>
</div>

<?php MeprHooks::do_action('mepr_account_password', $mepr_current_user); ?>


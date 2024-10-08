<?php
/**
 * This Template is used for managing other settings.
 *
 * @author  Tech Banker
 * @package wp-captcha-booster/views/general-settings
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} //exit if accessed directly
if ( ! is_user_logged_in() ) {
	return;
} else {
	$access_granted = false;
	foreach ( $user_role_permission as $permission ) {
		if ( current_user_can( $permission ) ) {
			$access_granted = true;
			break;
		}
	}
	if ( ! $access_granted ) {
		return;
	} elseif ( GENERAL_SETTINGS_CAPTCHA_BOOSTER === '1' ) {
		$captcha_booster_other_settings = wp_create_nonce( 'captcha_booster_other_settings' );
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
			<li>
				<i class="icon-custom-home"></i>
				<a href="admin.php?page=cpb_captcha_booster">
					<?php echo esc_attr( $cpb_captcha_booster_breadcrumb ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<a href="admin.php?page=cpb_alert_setup">
					<?php echo esc_attr( $cpb_general_settings_menu ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $cpb_other_settings_menu ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-settings"></i>
						<?php echo esc_attr( $cpb_other_settings_menu ); ?>
					</div>
					<p class="premium-editions-booster">
						<a href="https://tech-banker.com/captcha-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cpb_full_features ); ?></a> <?php echo esc_attr( $cpb_or ); ?> <a href="https://tech-banker.com/captcha-booster/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cpb_online_demos ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_other_settings">
						<div class="form-body">
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $cpb_other_settings_remove_tables ); ?> :
									<span class="required" aria-required="true">*</span>
								</label>
								<select name="ux_ddl_remove_tables" id="ux_ddl_remove_tables" class="form-control">
									<option value="enable"><?php echo esc_attr( $cpb_enable ); ?></option>
									<option value="disable"><?php echo esc_attr( $cpb_disable ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $cpb_other_settings_remove_tables_tootltip ); ?></i>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $cpb_other_settings_live_traffic_monitoring_label ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
										<select name="ux_ddl_live_traffic_monitoring" id="ux_ddl_live_traffic_monitoring" class="form-control">
											<option value="enable"><?php echo esc_attr( $cpb_enable ); ?></option>
											<option value="disable"><?php echo esc_attr( $cpb_disable ); ?></option>
										</select>
										<i class="controls-description"><?php echo esc_attr( $cpb_other_settings_live_traffic_monitoring_tooltip ); ?></i>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $cpb_other_settings_visitor_logs_monitoring_label ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
										<select name="ux_ddl_visitor_log_monitoring" id="ux_ddl_visitor_log_monitoring" class="form-control">
											<option value="enable"><?php echo esc_attr( $cpb_enable ); ?></option>
											<option value="disable"><?php echo esc_attr( $cpb_disable ); ?></option>
										</select>
										<i class="controls-description"><?php echo esc_attr( $cpb_other_settings_visitor_logs_monitoring_tooltip ); ?></i>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $cpb_other_settings_ip_address_fetching_method ); ?> :
									<span class="required" aria-required="true">*</span>
								</label>
								<select name="ux_ddl_ip_address_fetching_method" id="ux_ddl_ip_address_fetching_method" class="form-control">
									<option value=""><?php echo esc_attr( $cpb_other_settings_ip_address_fetching_option1 ); ?></option>
									<option value="REMOTE_ADDR"><?php echo esc_attr( $cpb_other_settings_ip_address_fetching_option2 ); ?></option>
									<option value="HTTP_X_FORWARDED_FOR"><?php echo esc_attr( $cpb_other_settings_ip_address_fetching_option3 ); ?></option>
									<option value="HTTP_X_REAL_IP"><?php echo esc_attr( $cpb_other_settings_ip_address_fetching_option4 ); ?></option>
									<option value="HTTP_CF_CONNECTING_IP"><?php echo esc_attr( $cpb_other_settings_ip_address_fetching_option5 ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $cpb_other_settings_ip_address_tooltips ); ?></i>
							</div>
							<div class="line-separator"></div>
							<div class="form-actions">
								<div class="pull-right">
									<input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo esc_attr( $cpb_save_changes ); ?>">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		<?php
	} else {
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="icon-custom-home"></i>
					<a href="admin.php?page=cpb_captcha_booster">
						<?php echo esc_attr( $cpb_captcha_booster_breadcrumb ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<a href="admin.php?page=cpb_alert_setup">
						<?php echo esc_attr( $cpb_general_settings_menu ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $cpb_other_settings_menu ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-settings"></i>
							<?php echo esc_attr( $cpb_other_settings_menu ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">
							<strong><?php echo esc_attr( $cpb_user_access_message ); ?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

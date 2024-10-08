<?php
/**
 * This Template is used for managing Blocking Options.
 *
 * @author  Tech Banker
 * @package wp-captcha-booster/views/security-settings
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
	} elseif ( ADVANCE_SECURITY_CAPTCHA_BOOSTER === '1' ) {
		$captcha_type_block = wp_create_nonce( 'captcha_booster_options' );
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
			<a href="admin.php?page=cpb_blocking_options">
					<?php echo esc_attr( $cpb_advance_security_menu ); ?>
			</a>
			<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $cpb_blocking_options ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-ban"></i>
						<?php echo esc_attr( $cpb_blocking_options ); ?>
					</div>
					<p class="premium-editions-booster">
						<a href="https://tech-banker.com/captcha-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cpb_full_features ); ?></a> <?php echo esc_attr( $cpb_or ); ?> <a href="https://tech-banker.com/captcha-booster/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $cpb_online_demos ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_blocking_options">
						<div class="form-body">
						<div class="form-group">
							<label class="control-label">
								<?php echo esc_attr( $cpb_blocking_options_title ); ?> :
								<span class="required" aria-required="true">*</span>
							</label>
							<select name="ux_ddl_auto_ip" id="ux_ddl_auto_ip" class="form-control" onchange="change_auto_ip_block_captcha_booster();">
								<option value="enable"><?php echo esc_attr( $cpb_enable ); ?></option>
								<option value="disable"><?php echo esc_attr( $cpb_disable ); ?></option>
							</select>
							<i class="controls-description"><?php echo esc_attr( $cpb_blocking_options_tooltip ); ?></i>
						</div>
						<div id="ux_div_auto_ip">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $cpb_blocking_options_login_attempts_title ); ?> :
										<span class="required" aria-required="true">*</span>
									</label>
									<input type="text" class="form-control" name="ux_txt_login" id="ux_txt_login" maxlength="4" value="<?php echo isset( $blocking_options_unserialized_data['maximum_login_attempt_in_a_day'] ) ? esc_attr( $blocking_options_unserialized_data['maximum_login_attempt_in_a_day'] ) : ''; ?>"  onfocus="paste_only_digits_captcha_booster(this.id);" placeholder="<?php echo esc_attr( $cpb_blocking_options_login_attempts_placeholder ); ?>">
									<i class="controls-description"><?php echo esc_attr( $cpb_blocking_options_login_attempts_tooltip ); ?></i>
								</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $cpb_block_for_title ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
									<div class="input-icon-custom right">
										<select name="ux_ddl_blocked_for" id="ux_ddl_blocked_for" class="form-control">
											<option value="1Hour"><?php echo esc_attr( $cpb_one_hour ); ?></option>
											<option value="12Hour"><?php echo esc_attr( $cpb_twelve_hours ); ?></option>
											<option value="24hours"><?php echo esc_attr( $cpb_twenty_four_hours ); ?></option>
											<option value="48hours"><?php echo esc_attr( $cpb_forty_eight_hours ); ?></option>
											<option value="week"><?php echo esc_attr( $cpb_one_week ); ?></option>
											<option value="month"><?php echo esc_attr( $cpb_one_month ); ?></option>
											<option value="permanently"><?php echo esc_attr( $cpb_permanently ); ?></option>
										</select>
										<i class="controls-description"><?php echo esc_attr( $cpb_block_for_tooltip ); ?></i>
									</div>
								</div>
							</div>
						</div>
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
				<a href="admin.php?page=cpb_blocking_options">
					<?php echo esc_attr( $cpb_advance_security_menu ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $cpb_blocking_options ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-ban"></i>
						<?php echo esc_attr( $cpb_blocking_options ); ?>
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

<?php
/**
 * Plugin Name: Private Page Login Redirect
 * Plugin URI:  https://github.com/wearerequired/private-page-login
 * Description: Redirects non-logged in visitors to a private page to the login page.
 * Version:     1.0.0
 * Author:      required
 * Author URI:  https://required.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Copyright (c) 2017-2020 required (email: info@required.ch)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

add_action(
	'wp',
	function () {
		$queried_object = get_queried_object();
		if ( 'private' === $queried_object->post_status && ! is_user_logged_in() ) {
			wp_safe_redirect( wp_login_url( get_permalink( $queried_object->ID ) ) );
			exit;
		}
	}
);

<?php
/**
 * Plugin Name: SSA Customization - Override Price on Specific Page
 * Plugin URI:  https://simplyscheduleappointments.com
 * Description: Override the price for the appointment types on a private booking page.
 * Version:     1.0.0
 * Author:      Simply Schedule Appointments
 * Author URI:  https://simplyscheduleappointments.com
 * Donate link: https://simplyscheduleappointments.com
 * License:     GPLv2
 * Text Domain: simply-schedule-appointments
 * Domain Path: /languages
 *
 * @link    https://simplyscheduleappointments.com
 *
 * @package Simply_Schedule_Appointments
 * @version 1.0.0
 *
 */

/**
 * Copyright (c) 2023 Simply Schedule Appointments (email : support@ssaplugin.com)
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

// Updates the price of the appointment type(s) placed on the page to the specified amount
add_filter( 'ssa/appointment_type/prepare_item_for_response', 'ssa_filter_appointment_type_apply_discount', 10, 3 );
function ssa_filter_appointment_type_apply_discount( $appointment_type_array, $appointment_type_id, $recursive )
{
    // Do nothing if the post id is not equal to 123, replace with the id of your discount page
    if ( $_GET['booking_post_id'] != 123 ) {
        return $appointment_type_array;
    }

    // Do nothing  if the appointment type doesn't have payments enabled
    if ( empty( $appointment_type_array['payments']['price'] ) ) {
        return $appointment_type_array;
    }
    
    // Replace the price of the appointment type(s) with the specified amount
    $appointment_type_array['payments']['price'] = 35.00;
    return $appointment_type_array;
}



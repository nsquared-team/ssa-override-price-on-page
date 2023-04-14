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

add_filter( 'ssa_booking_appointment_types', 'ssa_booking_filter_dynamic_pricing_atts' );
function ssa_booking_filter_dynamic_pricing_atts( $ssa_appointment_types )
{
    $page_id = get_queried_object_id();

    // Allow specific pages to bypass the dynamic booking notice
    // if ( in_array( $page_id, array( 268 ) ) ) {
    //     Allow normal booking notice behavior on Page ID 268
    //     return $ssa_appointment_types;
    // }

    if ( is_user_logged_in() ) {
        foreach ( $ssa_appointment_types as $key => $appointment_type ) {
            if ( ! isset($appointment_type['payments']['price'] ) ) {
                continue;
            }
            $appointment_type['payments']['price'] = '100.00';
            $ssa_appointment_types[$key] = $appointment_type;
        }
    }

    return $ssa_appointment_types;
}



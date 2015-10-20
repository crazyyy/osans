<?php
/**
 * Created by PhpStorm.
 * User: Gorth
 * Date: 10/20/2015
 * Time: 3:48 AM
 */
$currentID = get_the_ID();
if ($currentID == 721) $p_type = 'akb';
if ($currentID == 723) $p_type = 'dgu';
if ($currentID == 719) $p_type = 'ibp';
if ($currentID == 725) $p_type = 'skv';

if ($p_type == 'ibp') {

    $power_ibp_va = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'power-ibp-va'", ARRAY_A);
    $power_ibp_wt = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'power-ibp-va'", ARRAY_A);

    $power_ibp_va_min = isset($_REQUEST['power-ibp-va-min']) ? intval($_REQUEST['power-ibp-va-min']) : $power_ibp_va['min'];
    $power_ibp_va_max = isset($_REQUEST['power-ibp-va-max']) ? intval($_REQUEST['power-ibp-va-max']) : $power_ibp_va['max'];

    $power_ibp_wt_min = isset($_REQUEST['power-ibp-wt-min']) ? intval($_REQUEST['power-ibp-wt-min']) : $power_ibp_wt['min'];
    $power_ibp_wt_max = isset($_REQUEST['power-ibp-wt-max']) ? intval($_REQUEST['power-ibp-wt-max']) : $power_ibp_wt['max'];

    $meta_query = array(
        array(
            'key' => 'brand-ibp',
            'value' => $brand_ibp,
        ),
        array(
            'key' => 'power-ibp-va',
            'value' => array(
                $power_ibp_va_min,
                $power_ibp_va_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => 'power-ibp-wt',
            'value' => array(
                $power_ibp_wt_min,
                $power_ibp_wt_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => 'input-power',
            'value' => $input_power,
            'type' => 'numeric',
        ),
        array(
            'key' => 'time-working',
            'value' => $time_working,
            'type' => 'numeric',
        )
    );
}

if ($p_type == 'akb') {

    $nominal_u = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'nominal-u'", ARRAY_A);
    $capacity = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'capacity'", ARRAY_A);
    $weight = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'weight'", ARRAY_A);

    $meta_query = array(
        array(
            'key' => 'brand-akb',
            'value' => $brand_akb,
        ),
        array(
            'key' => 'nominal-u',
            'value' => array(
                $nominal_u_min,
                $nominal_u_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => 'capacity',
            'value' => array(
                $capacity_min,
                $capacity_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => 'final-i',
            'value' => $final_i,
            'type' => 'numeric',
        ),
        array(
            'key' => 'weight',
            'value' => array(
                $weight_min,
                $weight_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        )
    );
}

if ($p_type == 'dgu') {

    $main_power = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'main-power'", ARRAY_A);
    $reserve_power = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'reserve-power'", ARRAY_A);
    $fuel = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'fuel'", ARRAY_A);
    $weight = $wpdb->get_row("SELECT MIN(meta_value) as min, MAX(meta_value) as max FROM $wpdb->postmeta WHERE meta_key = 'weight'", ARRAY_A);

    $meta_query = array(
        array(
            'key' => 'brand-dgu',
            'value' => $brand_dgu,
        ),
        array(
            'key' => 'main-power',
            'value' => array(
                $main_power_min,
                $main_power_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => 'reserve-power',
            'value' => array(
                $reserve_power_min,
                $reserve_power_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => 'fuel',
            'value' => array(
                $fuel_min,
                $fuel_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ),
        array(
            'key' => 'weight',
            'value' => array(
                $weight_min,
                $weight_max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        )
    );
}

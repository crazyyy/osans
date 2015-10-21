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

    $ibp_power_va_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-va-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_va_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-va-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_va_min = isset($_REQUEST['ibp-power-va-min']) ? intval($_REQUEST['ibp-power-va-min']) : $ibp_power_va_min_abs;
    $ibp_power_va_max = isset($_REQUEST['ibp-power-va-max']) ? intval($_REQUEST['ibp-power-va-max']) : $ibp_power_va_max_abs;

    $ibp_power_wt_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-wt-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_wt_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-wt-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_wt_min = isset($_REQUEST['ibp-power-wt-min']) ? intval($_REQUEST['ibp-power-wt-min']) : $ibp_power_wt_min_abs;
    $ibp_power_wt_max = isset($_REQUEST['ibp-power-wt-max']) ? intval($_REQUEST['ibp-power-wt-max']) : $ibp_power_wt_max_abs;

    $ibp_input_u_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-input-u-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_input_u_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-input-u-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_input_u_min = isset($_REQUEST['ibp-input-u-min']) ? intval($_REQUEST['ibp-input-u-min']) : $ibp_input_u_min_abs;
    $ibp_input_u_max = isset($_REQUEST['ibp-input-u-max']) ? intval($_REQUEST['ibp-input-u-max']) : $ibp_input_u_max_abs;

    $ibp_worktime_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-worktime-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_worktime_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-worktime-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_worktime_min = isset($_REQUEST['ibp-worktime-min']) ? intval($_REQUEST['ibp-worktime-min']) : $ibp_worktime_min_abs;
    $ibp_worktime_max = isset($_REQUEST['ibp-worktime-max']) ? intval($_REQUEST['ibp-worktime-max']) : $ibp_worktime_max_abs;

    ?>
    <form id="ibp-form" method="post">
        <div>Мощность ИБП (ВА) от
            <input type="text" name="ibp-power-va-min" value="<?=$ibp_power_va_min;?>">
             до
            <input type="text" name="ibp-power-va-max" value="<?=$ibp_power_va_max;?>">
        </div>
        <div>Мощность ИБП (Вт) от
            <input type="text" name="ibp-power-wt-min" value="<?=$ibp_power_wt_min;?>">
            до
            <input type="text" name="ibp-power-wt-max" value="<?=$ibp_power_wt_max;?>">
        </div>
        <div>Входное напряжение (В) от
            <input type="text" name="ibp-input-u-min" value="<?=$ibp_input_u_min;?>">
            до
            <input type="text" name="ibp-input-u-max" value="<?=$ibp_input_u_max;?>">
        </div>
        <div>Время работы при 100% нагрузке от встроенных АКБ (мин) от
            <input type="text" name="ibp-worktime-min" value="<?=$ibp_worktime_min;?>">
            до
            <input type="text" name="ibp-worktime-max" value="<?=$ibp_worktime_max;?>">
        </div>
        <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
        <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
    </form>
<?php
    $meta_query = array(
        'relation' => 'AND',
        array(
            'relation' => 'OR',
            array(
                'key' => 'ibp-power-va-min',
                'value' => array(
                    $ibp_power_va_min,
                    $ibp_power_va_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'ibp-power-va-max',
                'value' => array(
                    $ibp_power_va_min,
                    $ibp_power_va_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'ibp-power-wt-min',
                'value' => array(
                    $ibp_power_wt_min,
                    $ibp_power_wt_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'ibp-power-wt-max',
                'value' => array(
                    $ibp_power_wt_min,
                    $ibp_power_wt_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'ibp-input-u-min',
                'value' => array(
                    $ibp_input_u_min,
                    $ibp_input_u_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'ibp-input-u-max',
                'value' => array(
                    $ibp_input_u_min,
                    $ibp_input_u_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'ibp-worktime-min',
                'value' => array(
                    $ibp_worktime_min,
                    $ibp_worktime_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'ibp-worktime-max',
                'value' => array(
                    $ibp_worktime_min,
                    $ibp_worktime_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        )
    );
}


if ($p_type == 'akb') {

    $akb_nominal_u_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-nominal-u-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_nominal_u_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-nominal-u-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_nominal_u_min = isset($_REQUEST['akb-nominal-u-min']) ? intval($_REQUEST['akb-nominal-u-min']) : $akb_nominal_u_min_abs;
    $akb_nominal_u_max = isset($_REQUEST['akb-nominal-u-max']) ? intval($_REQUEST['akb-nominal-u-max']) : $akb_nominal_u_max_abs;

    $akb_capacity_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-capacity-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_capacity_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-capacity-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_capacity_min = isset($_REQUEST['akb-capacity-min']) ? intval($_REQUEST['akb-capacity-min']) : $akb_capacity_min_abs;
    $akb_capacity_max = isset($_REQUEST['akb-capacity-max']) ? intval($_REQUEST['akb-capacity-max']) : $akb_capacity_max_abs;

    $akb_final_i_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-final-i-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_final_i_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-final-i-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_final_i_min = isset($_REQUEST['akb-final-i-min']) ? intval($_REQUEST['akb-final-i-min']) : $akb_final_i_min_abs;
    $akb_final_i_max = isset($_REQUEST['akb-final-i-max']) ? intval($_REQUEST['akb-final-i-max']) : $akb_final_i_max_abs;


    ?>
    <form id="akb-form" method="post">
        <div>Номинальное напряжение (В) от
            <input type="text" name="akb-nominal-u-min" value="<?=$akb_nominal_u_min;?>">
            до
            <input type="text" name="akb-nominal-u-max" value="<?=$akb_nominal_u_max;?>">
        </div>
        <div>Емкость С10 1,8В/эл, 20°С, (Ач) от
            <input type="text" name="akb-capacity-min" value="<?=$akb_capacity_min;?>">
            до
            <input type="text" name="akb-capacity-max" value="<?=$akb_capacity_max;?>">
        </div>
        <div>Ток разряда при I10, (А) от
            <input type="text" name="akb-final-i-min" value="<?=$akb_final_i_min;?>">
            до
            <input type="text" name="akb-final-i-max" value="<?=$akb_final_i_max;?>">
        </div>

        <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
        <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
    </form>
    <?php
    $meta_query = array(
        'relation' => 'AND',
        array(
            'relation' => 'OR',
            array(
                'key' => 'akb-nominal-u-min',
                'value' => array(
                    $akb_nominal_u_min,
                    $akb_nominal_u_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'akb-nominal-u-max',
                'value' => array(
                    $akb_nominal_u_min,
                    $akb_nominal_u_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'akb-capacity-min',
                'value' => array(
                    $akb_capacity_min,
                    $akb_capacity_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'akb-capacity-max',
                'value' => array(
                    $akb_capacity_min,
                    $akb_capacity_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'akb-final-i-min',
                'value' => array(
                    $akb_final_i_min,
                    $akb_final_i_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'akb-final-i-max',
                'value' => array(
                    $akb_final_i_min,
                    $akb_final_i_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        )
    );
}


if ($p_type == 'dgu') {

    $dgu_main_power_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-main-power-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_main_power_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-main-power-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_main_power_min = isset($_REQUEST['dgu-main-power-min']) ? intval($_REQUEST['dgu-main-power-min']) : $dgu_main_power_min_abs;
    $dgu_main_power_max = isset($_REQUEST['dgu-main-power-max']) ? intval($_REQUEST['dgu-main-power-max']) : $dgu_main_power_max_abs;

    $dgu_reserve_power_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-reserve-power-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_reserve_power_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-reserve-power-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_reserve_power_min = isset($_REQUEST['dgu-reserve-power-min']) ? intval($_REQUEST['dgu-reserve-power-min']) : $dgu_reserve_power_min_abs;
    $dgu_reserve_power_max = isset($_REQUEST['dgu-reserve-power-max']) ? intval($_REQUEST['dgu-reserve-power-max']) : $dgu_reserve_power_max_abs;

    $dgu_fuel_consumption_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-consumption-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_consumption_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-consumption-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_consumption_min = isset($_REQUEST['dgu-fuel-consumption-min']) ? intval($_REQUEST['dgu-fuel-consumption-min']) : $dgu_fuel_consumption_min_abs;
    $dgu_fuel_consumption_max = isset($_REQUEST['dgu-fuel-consumption-max']) ? intval($_REQUEST['dgu-fuel-consumption-max']) : $dgu_fuel_consumption_max_abs;

    $dgu_fuel_capacity_min_abs = $wpdb->get_var("SELECT MIN(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-capacity-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_capacity_max_abs = $wpdb->get_var("SELECT MAX(m.meta_value + 0.0) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-capacity-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_capacity_min = isset($_REQUEST['dgu-fuel-capacity-min']) ? intval($_REQUEST['dgu-fuel-capacity-min']) : $dgu_fuel_capacity_min_abs;
    $dgu_fuel_capacity_max = isset($_REQUEST['dgu-fuel-capacity-max']) ? intval($_REQUEST['dgu-fuel-capacity-max']) : $dgu_fuel_capacity_max_abs;

    ?>
    <form id="dgu-form" method="post">
        <div>Основная мощность (кВА/кВт) от
            <input type="text" name="dgu-main-power-min" value="<?=$dgu_main_power_min;?>">
            до
            <input type="text" name="dgu-main-power-max" value="<?=$dgu_main_power_max;?>">
        </div>
        <div>Резервная мощность (кВА/кВт) от
            <input type="text" name="dgu-reserve-power-min" value="<?=$dgu_reserve_power_min;?>">
            до
            <input type="text" name="dgu-reserve-power-max" value="<?=$dgu_reserve_power_max;?>">
        </div>
        <div>Расход топлива (л/час) от
            <input type="text" name="dgu-fuel-consumption-min" value="<?=$dgu_fuel_consumption_min;?>">
            до
            <input type="text" name="dgu-fuel-consumption-max" value="<?=$dgu_fuel_consumption_max;?>">
        </div>
        <div>Объем встроенного бака (л) от
            <input type="text" name="dgu-fuel-capacity-min" value="<?=$dgu_fuel_capacity_min;?>">
            до
            <input type="text" name="dgu-fuel-capacity-max" value="<?=$dgu_fuel_capacity_max;?>">
        </div>
        <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
        <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
    </form>
    <?php
    $meta_query = array(
        'relation' => 'AND',
        array(
            'relation' => 'OR',
            array(
                'key' => 'dgu-main-power-min',
                'value' => array(
                    $dgu_main_power_min,
                    $dgu_main_power_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'dgu-main-power-max',
                'value' => array(
                    $dgu_main_power_min,
                    $dgu_main_power_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'dgu-reserve-power-min',
                'value' => array(
                    $dgu_reserve_power_min,
                    $dgu_reserve_power_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'dgu-reserve-power-max',
                'value' => array(
                    $dgu_reserve_power_min,
                    $dgu_reserve_power_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'dgu-fuel-consumption-min',
                'value' => array(
                    $dgu_fuel_consumption_min,
                    $dgu_fuel_consumption_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'dgu-fuel-consumption-max',
                'value' => array(
                    $dgu_fuel_consumption_min,
                    $dgu_fuel_consumption_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        ),
        array(
            'relation' => 'OR',
            array(
                'key' => 'dgu-fuel-capacity-min',
                'value' => array(
                    $dgu_fuel_capacity_min,
                    $dgu_fuel_capacity_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'key' => 'dgu-fuel-capacity-max',
                'value' => array(
                    $dgu_fuel_capacity_min,
                    $dgu_fuel_capacity_max),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            )
        )
    );
}

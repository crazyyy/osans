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

    $ibp_power_va_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-va-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_va_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-va-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_va_min = isset($_REQUEST['ibp-power-va-min']) ? floatval($_REQUEST['ibp-power-va-min']) : $ibp_power_va_min_abs;
    $ibp_power_va_max = isset($_REQUEST['ibp-power-va-max']) ? floatval($_REQUEST['ibp-power-va-max']) : $ibp_power_va_max_abs;

    $ibp_power_wt_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-wt-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_wt_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-power-wt-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_power_wt_min = isset($_REQUEST['ibp-power-wt-min']) ? floatval($_REQUEST['ibp-power-wt-min']) : $ibp_power_wt_min_abs;
    $ibp_power_wt_max = isset($_REQUEST['ibp-power-wt-max']) ? floatval($_REQUEST['ibp-power-wt-max']) : $ibp_power_wt_max_abs;

    $ibp_input_u_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-input-u-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_input_u_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-input-u-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_input_u_min = isset($_REQUEST['ibp-input-u-min']) ? floatval($_REQUEST['ibp-input-u-min']) : $ibp_input_u_min_abs;
    $ibp_input_u_max = isset($_REQUEST['ibp-input-u-max']) ? floatval($_REQUEST['ibp-input-u-max']) : $ibp_input_u_max_abs;

    $ibp_worktime_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-worktime-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_worktime_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'ibp-worktime-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $ibp_worktime_min = isset($_REQUEST['ibp-worktime-min']) ? floatval($_REQUEST['ibp-worktime-min']) : $ibp_worktime_min_abs;
    $ibp_worktime_max = isset($_REQUEST['ibp-worktime-max']) ? floatval($_REQUEST['ibp-worktime-max']) : $ibp_worktime_max_abs;
    ?>

    <form id="ibp-form" class="row" method="post">
      <div class="col-md-12">
        <select name="ibp-brand">
          <option value="" <?php if ($_REQUEST['ibp-brand'] == '') echo 'selected';?>>Все производители</option>
          <option value="AEG" <?php if ($_REQUEST['ibp-brand'] == 'AEG') echo 'selected';?>>AEG</option>
          <option value="EATON" <?php if ($_REQUEST['ibp-brand'] == 'EATON') echo 'selected';?>>EATON</option>
          <option value="General Electric" <?php if ($_REQUEST['ibp-brand'] == 'General Electric') echo 'selected';?>>General Electric</option>
          <option value="Chloride" <?php if ($_REQUEST['ibp-brand'] == 'Chloride') echo 'selected';?>>Chloride</option>
          <option value="APC" <?php if ($_REQUEST['ibp-brand'] == 'APC') echo 'selected';?>>APC</option>
          <option value="VISION" <?php if ($_REQUEST['ibp-brand'] == 'VISION') echo 'selected';?>>VISION</option>
        </select>
      </div>

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Мощность ИБП (ВА)</span>
          <label for="ibp-power-va-min">от</label>
          <input type="text" name="ibp-power-va-min" id="ibp-power-va-min" value="<?=$ibp_power_va_min;?>">
          <label for="ibp-power-va-max">до</label>
          <input type="text" name="ibp-power-va-max" id="ibp-power-va-max" value="<?=$ibp_power_va_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="ibp-power-va" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Мощность ИБП (Вт)</span>
          <label for="ibp-power-wt-min">от</label>
          <input type="text" name="ibp-power-wt-min" id="ibp-power-wt-min" value="<?=$ibp_power_wt_min;?>">
          <label for="ibp-power-wt-max">до</label>
          <input type="text" name="ibp-power-wt-max" id="ibp-power-wt-max" value="<?=$ibp_power_wt_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="ibp-power-wt" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Входное напряжение (В)</span>
          <label for="ibp-input-u-min">от</label>
          <input type="text" name="ibp-input-u-min" id="ibp-input-u-min" value="<?=$ibp_input_u_min;?>">
          <label for="ibp-input-u-max">до</label>
          <input type="text" name="ibp-input-u-max" id="ibp-input-u-max" value="<?=$ibp_input_u_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="ibp-input-u" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Время работы при 100% нагрузке от встроенных АКБ (мин)</span>
          <label for="ibp-worktime-min">от</label>
          <input type="text" name="ibp-worktime-min" id="ibp-worktime-min" value="<?=$ibp_worktime_min;?>">
          <label for="ibp-worktime-max">до</label>
          <input type="text" name="ibp-worktime-max" id="ibp-worktime-max" value="<?=$ibp_worktime_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="ibp-worktime" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="col-md-4">
        <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
      </div>
      <div class="col-md-4 col-md-offset-4">
        <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
      </div>
    </form>


    <script>
      var ibpPowerVAMin = document.getElementById('ibp-power-va-min');
      var ibpPowerVAMax = document.getElementById('ibp-power-va-max');
      var ibpPowerVA = document.getElementById('ibp-power-va');

      noUiSlider.create(ibpPowerVA, {
          start: [ <?=$ibp_power_va_min_abs;?>, <?=$ibp_power_va_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$ibp_power_va_min_abs;?>,
              'max': <?=$ibp_power_va_max_abs;?>
          }
      });

      ibpPowerVA.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            ibpPowerVAMax.value = Math.round(value);
          } else {
            ibpPowerVAMin.value = Math.round(value);
          }
      });

      ibpPowerVAMax.addEventListener('change', function(){
          ibpPowerVA.noUiSlider.set([this.value, null]);
      });

      ibpPowerVAMin.addEventListener('change', function(){
          ibpPowerVA.noUiSlider.set([null, this.value]);
      });


      var ibpPowerWTMin = document.getElementById('ibp-power-wt-min');
      var ibpPowerWTMax = document.getElementById('ibp-power-wt-max');
      var ibpPowerWT = document.getElementById('ibp-power-wt');

      noUiSlider.create(ibpPowerWT, {
          start: [ <?=$ibp_power_wt_min_abs;?>, <?=$ibp_power_wt_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$ibp_power_wt_min_abs;?>,
              'max': <?=$ibp_power_wt_max_abs;?>
          }
      });

      ibpPowerWT.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            ibpPowerWTMax.value = Math.round(value);
          } else {
            ibpPowerWTMin.value = Math.round(value);
          }
      });

      ibpPowerWTMax.addEventListener('change', function(){
          ibpPowerWT.noUiSlider.set([this.value, null]);
      });

      ibpPowerWTMin.addEventListener('change', function(){
          ibpPowerWT.noUiSlider.set([null, this.value]);
      });

      var ibpInputUMin = document.getElementById('ibp-input-u-min');
      var ibpInputUMax = document.getElementById('ibp-input-u-max');
      var ibpInputU = document.getElementById('ibp-input-u');

      noUiSlider.create(ibpInputU, {
          start: [ <?=$ibp_input_u_min_abs;?>, <?=$ibp_input_u_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$ibp_input_u_min_abs;?>,
              'max': <?=$ibp_input_u_max_abs;?>
          }
      });

      ibpInputU.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            ibpInputUMax.value = Math.round(value);
          } else {
            ibpInputUMin.value = Math.round(value);
          }
      });

      ibpInputUMax.addEventListener('change', function(){
          ibpInputU.noUiSlider.set([this.value, null]);
      });

      ibpInputUMin.addEventListener('change', function(){
          ibpInputU.noUiSlider.set([null, this.value]);
      });


      var ibpWorktimeMin = document.getElementById('ibp-worktime-min');
      var ibpWorktimeMax = document.getElementById('ibp-worktime-max');
      var ibpWorktime = document.getElementById('ibp-worktime');

      noUiSlider.create(ibpWorktime, {
          start: [ <?=$ibp_worktime_min_abs;?>, <?=$ibp_worktime_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$ibp_worktime_min_abs;?>,
              'max': <?=$ibp_worktime_max_abs;?>
          }
      });

      ibpWorktime.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            ibpWorktimeMax.value = Math.round(value);
          } else {
            ibpWorktimeMin.value = Math.round(value);
          }
      });

      ibpWorktimeMax.addEventListener('change', function(){
          ibpWorktime.noUiSlider.set([this.value, null]);
      });

      ibpWorktimeMin.addEventListener('change', function(){
          ibpWorktime.noUiSlider.set([null, this.value]);
      });

    </script>

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
    if (isset($_REQUEST['ibp-brand']) && $_REQUEST['ibp-brand'] != '') {
        $brand_query = array(
            array(
                'key' => 'ibp-brand',
                'value' => $_REQUEST['ibp-brand']
            )
        );
        array_push($meta_query, $brand_query);
    }
}


if ($p_type == 'akb') {

    $akb_nominal_u_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-nominal-u-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_nominal_u_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-nominal-u-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_nominal_u_min = isset($_REQUEST['akb-nominal-u-min']) ? floatval($_REQUEST['akb-nominal-u-min']) : $akb_nominal_u_min_abs;
    $akb_nominal_u_max = isset($_REQUEST['akb-nominal-u-max']) ? floatval($_REQUEST['akb-nominal-u-max']) : $akb_nominal_u_max_abs;

    $akb_capacity_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-capacity-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_capacity_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-capacity-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_capacity_min = isset($_REQUEST['akb-capacity-min']) ? floatval($_REQUEST['akb-capacity-min']) : $akb_capacity_min_abs;
    $akb_capacity_max = isset($_REQUEST['akb-capacity-max']) ? floatval($_REQUEST['akb-capacity-max']) : $akb_capacity_max_abs;

    $akb_final_i_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-final-i-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_final_i_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'akb-final-i-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $akb_final_i_min = isset($_REQUEST['akb-final-i-min']) ? floatval($_REQUEST['akb-final-i-min']) : $akb_final_i_min_abs;
    $akb_final_i_max = isset($_REQUEST['akb-final-i-max']) ? floatval($_REQUEST['akb-final-i-max']) : $akb_final_i_max_abs;

    ?>

    <form id="akb-form" class="row" method="post">
      <div class="col-md-12">
        <select name="akb-brand">
          <option value="" <?php if ($_REQUEST['akb-brand'] == '') echo 'selected';?>>Все производители</option>
        </select>
      </div>

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Номинальное напряжение (В)</span>
          <label for="akb-nominal-u-min">от</label>
          <input type="text" name="akb-nominal-u-min" id="akb-nominal-u-min" value="<?=$akb_nominal_u_min;?>">
          <label for="akb-nominal-u-max">до</label>
          <input type="text" name="akb-nominal-u-max" id="akb-nominal-u-max" value="<?=$akb_nominal_u_max;?>">
        </div>
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="akb-nominal-u" class="selector-range-main"></div>
        </div>
      </div>

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Емкость С10 1,8В/эл, 20°С, (Ач)</span>
          <label for="akb-capacity-min">от</label>
          <input type="text" name="akb-capacity-min" id="akb-capacity-min" value="<?=$akb_capacity_min;?>">
          <label for="akb-capacity-max">до</label>
          <input type="text" name="akb-capacity-max" id="akb-capacity-max" value="<?=$akb_capacity_max;?>">
        </div>
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="akb-capacity" class="selector-range-main"></div>
        </div>
      </div>

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Ток разряда при I10, (А)</span>
          <label for="akb-final-i-min">от</label>
          <input type="text" name="akb-final-i-min" id="akb-final-i-min" value="<?=$akb_final_i_min;?>">
          <label for="akb-final-i-max">до</label>
          <input type="text" name="akb-final-i-max" id="akb-final-i-max" value="<?=$akb_final_i_max;?>">
        </div>
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="akb-final-i" class="selector-range-main"></div>
        </div>
      </div><!-- nopadding -->

      <div class="col-md-4">
        <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
      </div>
      <div class="col-md-4 col-md-offset-4">
        <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
      </div>
    </form>

      <script>
        var akbNominalUMin = document.getElementById('akb-nominal-u-min');
        var akbNominalUMax = document.getElementById('akb-nominal-u-max');
        var akbNominalU = document.getElementById('akb-nominal-u');

        noUiSlider.create(akbNominalU, {
            start: [ <?=$akb_nominal_u_min_abs;?>, <?=$akb_nominal_u_max_abs;?> ],
            connect: true,
            range: {
                'min': <?=$akb_nominal_u_min_abs;?>,
                'max': <?=$akb_nominal_u_max_abs;?>
            }
        });

        akbNominalU.noUiSlider.on('update', function( values, handle ) {

            var value = values[handle];

            if ( handle ) {
              akbNominalUMax.value = Math.round(value);
            } else {
              akbNominalUMin.value = Math.round(value);
            }
        });

        akbNominalUMax.addEventListener('change', function(){
            akbNominalU.noUiSlider.set([this.value, null]);
        });

        akbNominalUMin.addEventListener('change', function(){
            akbNominalU.noUiSlider.set([null, this.value]);
        });


        var akbCapacityMin = document.getElementById('akb-capacity-min');
        var akbCapacityMax = document.getElementById('akb-capacity-max');
        var akbCapacity = document.getElementById('akb-capacity');

        noUiSlider.create(akbCapacity, {
            start: [ <?=$akb_capacity_min_abs;?>, <?=$akb_capacity_max_abs;?> ],
            connect: true,
            range: {
                'min': <?=$akb_capacity_min_abs;?>,
                'max': <?=$akb_capacity_max_abs;?>
            }
        });

        akbCapacity.noUiSlider.on('update', function( values, handle ) {

            var value = values[handle];

            if ( handle ) {
              akbCapacityMax.value = Math.round(value);
            } else {
              akbCapacityMin.value = Math.round(value);
            }
        });

        akbCapacityMax.addEventListener('change', function(){
            akbCapacity.noUiSlider.set([this.value, null]);
        });

        akbCapacityMin.addEventListener('change', function(){
            akbCapacity.noUiSlider.set([null, this.value]);
        });

        var akbFinalIMin = document.getElementById('akb-final-i-min');
        var akbFinalIMax = document.getElementById('akb-final-i-max');
        var akbFinalI = document.getElementById('akb-final-i');

        noUiSlider.create(akbFinalI, {
            start: [ <?=$akb_final_i_min_abs;?>, <?=$akb_final_i_max_abs;?> ],
            connect: true,
            range: {
                'min': <?=$akb_final_i_min_abs;?>,
                'max': <?=$akb_final_i_max_abs;?>
            }
        });

        akbFinalI.noUiSlider.on('update', function( values, handle ) {

            var value = values[handle];

            if ( handle ) {
              akbFinalIMax.value = Math.round(value);
            } else {
              akbFinalIMin.value = Math.round(value);
            }
        });

        akbFinalIMax.addEventListener('change', function(){
            akbFinalI.noUiSlider.set([this.value, null]);
        });

        akbFinalIMin.addEventListener('change', function(){
            akbFinalI.noUiSlider.set([null, this.value]);
        });

      </script>


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
    if (isset($_REQUEST['akb-brand']) && $_REQUEST['akb-brand'] != '') {
        $brand_query = array(
            array(
                'key' => 'akb-brand',
                'value' => $_REQUEST['akb-brand']
            )
        );
        array_push($meta_query, $brand_query);
    }
}


if ($p_type == 'dgu') {

    $dgu_main_power_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-main-power-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_main_power_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-main-power-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_main_power_min = isset($_REQUEST['dgu-main-power-min']) ? floatval($_REQUEST['dgu-main-power-min']) : $dgu_main_power_min_abs;
    $dgu_main_power_max = isset($_REQUEST['dgu-main-power-max']) ? floatval($_REQUEST['dgu-main-power-max']) : $dgu_main_power_max_abs;

    $dgu_reserve_power_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-reserve-power-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_reserve_power_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-reserve-power-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_reserve_power_min = isset($_REQUEST['dgu-reserve-power-min']) ? floatval($_REQUEST['dgu-reserve-power-min']) : $dgu_reserve_power_min_abs;
    $dgu_reserve_power_max = isset($_REQUEST['dgu-reserve-power-max']) ? floatval($_REQUEST['dgu-reserve-power-max']) : $dgu_reserve_power_max_abs;

    $dgu_fuel_consumption_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-consumption-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_consumption_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-consumption-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_consumption_min = isset($_REQUEST['dgu-fuel-consumption-min']) ? floatval($_REQUEST['dgu-fuel-consumption-min']) : $dgu_fuel_consumption_min_abs;
    $dgu_fuel_consumption_max = isset($_REQUEST['dgu-fuel-consumption-max']) ? floatval($_REQUEST['dgu-fuel-consumption-max']) : $dgu_fuel_consumption_max_abs;

    $dgu_fuel_capacity_min_abs = $wpdb->get_var("SELECT MIN(FLOOR(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-capacity-min' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_capacity_max_abs = $wpdb->get_var("SELECT MAX(CEILING(m.meta_value)) FROM $wpdb->postmeta m, $wpdb->posts p WHERE m.meta_key = 'dgu-fuel-capacity-max' AND m.post_id=p.ID AND p.post_status='publish'");
    $dgu_fuel_capacity_min = isset($_REQUEST['dgu-fuel-capacity-min']) ? floatval($_REQUEST['dgu-fuel-capacity-min']) : $dgu_fuel_capacity_min_abs;
    $dgu_fuel_capacity_max = isset($_REQUEST['dgu-fuel-capacity-max']) ? floatval($_REQUEST['dgu-fuel-capacity-max']) : $dgu_fuel_capacity_max_abs;

    ?>

    <form id="dgu-form" class="row" method="post">
      <div class="col-md-12">
        <select name="dgu-brand">
          <option value="" <?php if ($_REQUEST['dgu-brand'] == '') echo 'selected';?>>Все производители</option>
          <option value="Gesan" <?php if ($_REQUEST['dgu-brand'] == 'Gesan') echo 'selected';?>>Gesan</option>
          <option value="FG Wilson" <?php if ($_REQUEST['dgu-brand'] == 'FG Wilson') echo 'selected';?>>FG Wilson</option>
        </select>
      </div>

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Основная мощность (кВА/кВт)</span>
          <label for="dgu-main-power-min">от</label>
          <input type="text" name="dgu-main-power-min" id="dgu-main-power-min" value="<?=$dgu_main_power_min;?>">
          <label for="dgu-main-power-max">до</label>
          <input type="text" name="dgu-main-power-max" id="dgu-main-power-max" value="<?=$dgu_main_power_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="dgu-main-power" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Резервная мощность (кВА/кВт)</span>
          <label for="dgu-reserve-power-min">от</label>
          <input type="text" name="dgu-reserve-power-min" id="dgu-reserve-power-min" value="<?=$dgu_reserve_power_min;?>">
          <label for="dgu-reserve-power-max">до</label>
          <input type="text" name="dgu-reserve-power-max" id="dgu-reserve-power-max" value="<?=$dgu_reserve_power_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="dgu-reserve-power" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Расход топлива (л/час)</span>
          <label for="dgu-fuel-consumption-min">от</label>
          <input type="text" name="dgu-fuel-consumption-min" id="dgu-fuel-consumption-min" value="<?=$dgu_fuel_consumption_min;?>">
          <label for="dgu-fuel-consumption-max">до</label>
          <input type="text" name="dgu-fuel-consumption-max" id="dgu-fuel-consumption-max" value="<?=$dgu_fuel_consumption_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="dgu-fuel-consumption" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="row nopadding">
        <div class="col-md-6 pretty-selectors">
          <span>Объем встроенного бака (л)</span>
          <label for="dgu-fuel-capacity-mi">от</label>
          <input type="text" name="dgu-fuel-capacity-min" id="dgu-fuel-capacity-min" value="<?=$dgu_fuel_capacity_min;?>">
          <label for="dgu-fuel-capacity-max">до</label>
          <input type="text" name="dgu-fuel-capacity-max" id="dgu-fuel-capacity-max" value="<?=$dgu_fuel_capacity_max;?>">
        </div><!-- pretty-selectors -->
        <div class="col-md-6 pretty-selectors selector-range">
          <div id="dgu-fuel-capacity" class="selector-range-main"></div>
        </div><!-- pretty-selectors -->
      </div><!-- nopadding -->

      <div class="col-md-4">
        <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
      </div>
      <div class="col-md-4 col-md-offset-4">
        <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
      </div>
    </form>


    <script>
      var dguMainPowerMin = document.getElementById('dgu-main-power-min');
      var dguMainPowerMax = document.getElementById('dgu-main-power-max');
      var dguMainPower = document.getElementById('dgu-main-power');

      noUiSlider.create(dguMainPower, {
          start: [ <?=$dgu_main_power_min_abs;?>, <?=$dgu_main_power_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$dgu_main_power_min_abs;?>,
              'max': <?=$dgu_main_power_max_abs;?>
          }
      });

      dguMainPower.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            dguMainPowerMax.value = Math.round(value);
          } else {
            dguMainPowerMin.value = Math.round(value);
          }
      });

      dguMainPowerMax.addEventListener('change', function(){
          dguMainPower.noUiSlider.set([this.value, null]);
      });

      dguMainPowerMin.addEventListener('change', function(){
          dguMainPower.noUiSlider.set([null, this.value]);
      });



      var dguReservePowerMin = document.getElementById('dgu-reserve-power-min');
      var dguReservePowerMax = document.getElementById('dgu-reserve-power-max');
      var dguReservePower = document.getElementById('dgu-reserve-power');

      noUiSlider.create(dguReservePower, {
          start: [ <?=$dgu_reserve_power_min_abs;?>, <?=$dgu_reserve_power_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$dgu_reserve_power_min_abs;?>,
              'max': <?=$dgu_reserve_power_max_abs;?>
          }
      });

      dguReservePower.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            dguReservePowerMax.value = Math.round(value);
          } else {
            dguReservePowerMin.value = Math.round(value);
          }
      });

      dguReservePowerMax.addEventListener('change', function(){
          dguReservePower.noUiSlider.set([this.value, null]);
      });

      dguReservePowerMin.addEventListener('change', function(){
          dguReservePower.noUiSlider.set([null, this.value]);
      });



      var dguFuelConsumptionMin = document.getElementById('dgu-fuel-consumption-min');
      var dguFuelConsumptionMax = document.getElementById('dgu-fuel-consumption-max');
      var dguFuelConsumption = document.getElementById('dgu-fuel-consumption');

      noUiSlider.create(dguFuelConsumption, {
          start: [ <?=$dgu_fuel_consumption_min_abs;?>, <?=$dgu_fuel_consumption_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$dgu_fuel_consumption_min_abs;?>,
              'max': <?=$dgu_fuel_consumption_max_abs;?>
          }
      });

      dguFuelConsumption.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            dguFuelConsumptionMax.value = Math.round(value);
          } else {
            dguFuelConsumptionMin.value = Math.round(value);
          }
      });

      dguFuelConsumptionMax.addEventListener('change', function(){
          dguFuelConsumption.noUiSlider.set([this.value, null]);
      });

      dguFuelConsumptionMin.addEventListener('change', function(){
          dguFuelConsumption.noUiSlider.set([null, this.value]);
      });



      var dguFuelCapacityMin = document.getElementById('dgu-fuel-capacity-min');
      var dguFuelCapacityMax = document.getElementById('dgu-fuel-capacity-max');
      var dguFuelCapacity = document.getElementById('dgu-fuel-capacity');

      noUiSlider.create(dguFuelCapacity, {
          start: [ <?=$dgu_fuel_capacity_min_abs;?>, <?=$dgu_fuel_capacity_max_abs;?> ],
          connect: true,
          range: {
              'min': <?=$dgu_fuel_capacity_min_abs;?>,
              'max': <?=$dgu_fuel_capacity_max_abs;?>
          }
      });

      dguFuelCapacity.noUiSlider.on('update', function( values, handle ) {

          var value = values[handle];

          if ( handle ) {
            dguFuelCapacityMax.value = Math.round(value);
          } else {
            dguFuelCapacityMin.value = Math.round(value);
          }
      });

      dguFuelCapacityMax.addEventListener('change', function(){
          dguFuelCapacity.noUiSlider.set([this.value, null]);
      });

      dguFuelCapacityMin.addEventListener('change', function(){
          dguFuelCapacity.noUiSlider.set([null, this.value]);
      });
    </script>

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
    if (isset($_REQUEST['dgu-brand']) && $_REQUEST['dgu-brand'] != '') {
        $brand_query = array(
            array(
                'key' => 'dgu-brand',
                'value' => $_REQUEST['dgu-brand']
            )
        );
        array_push($meta_query, $brand_query);
    }
}

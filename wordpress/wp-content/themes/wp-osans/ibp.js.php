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
            ibpPowerVAMin.value = value;
        } else {
            ibpPowerVAMax.value = value;
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
            ibpPowerWTMin.value = value;
        } else {
            ibpPowerWTMax.value = value;
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
            ibpInputUMin.value = value;
        } else {
            ibpInputUMax.value = value;
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
            ibpWorktimeMin.value = value;
        } else {
            ibpWorktimeMax.value = value;
        }
    });

    ibpWorktimeMax.addEventListener('change', function(){
        ibpWorktime.noUiSlider.set([this.value, null]);
    });

    ibpWorktimeMin.addEventListener('change', function(){
        ibpWorktime.noUiSlider.set([null, this.value]);
    });    

</script>

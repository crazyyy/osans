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
            dguMainPowerMin.value = value;
        } else {
            dguMainPowerMax.value = value;
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
            dguReservePowerMin.value = value;
        } else {
            dguReservePowerMax.value = value;
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
            dguFuelConsumptionMin.value = value;
        } else {
            dguFuelConsumptionMax.value = value;
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
            dguFuelCapacityMin.value = value;
        } else {
            dguFuelCapacityMax.value = value;
        }
    });

    dguFuelCapacityMax.addEventListener('change', function(){
        dguFuelCapacity.noUiSlider.set([this.value, null]);
    });

    dguFuelCapacityMin.addEventListener('change', function(){
        dguFuelCapacity.noUiSlider.set([null, this.value]);
    });
</script>
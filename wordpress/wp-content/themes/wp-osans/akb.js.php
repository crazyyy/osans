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
            akbNominalUMin.value = value;
        } else {
            akbNominalUMax.value = value;
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
            akbCapacityMin.value = value;
        } else {
            akbCapacityMax.value = value;
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
            akbFinalIMin.value = value;
        } else {
            akbFinalIMax.value = value;
        }
    });

    akbFinalIMax.addEventListener('change', function(){
        akbFinalI.noUiSlider.set([this.value, null]);
    });

    akbFinalIMin.addEventListener('change', function(){
        akbFinalI.noUiSlider.set([null, this.value]);
    });

</script> 
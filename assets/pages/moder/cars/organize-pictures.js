define(
    ['jquery', './car-type-picker', 'typeahead'],
    function($, CarTypePicker) {
        return {
            init: function(options) {
                CarTypePicker.init($('select[name=vehicle_type_id\\[\\]]'));
                CarTypePicker.init($('select[name=spec_ids\\[\\]]'));
            }
        };
    }
);